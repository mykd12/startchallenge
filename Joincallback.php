<?php header("Content-Type:text/html;charset=utf-8"); ?>
<?php session_start(); 
include_once "./inc/dbconfig.php";
// NAVER LOGIN 
		if (!$_GET['state']) { 
				// 오류가 발생하였습니다. 잘못된 경로로 접근 하신것 같습니다. 
				echo "<script>alert('정상적인 접근이 아닙니다.');history.go(-1)</script>";
				exit;
			} 
			
			$client_id = "hmL9HScQeEXVQSMRbeA8";
			$client_secret = "t3uoIgplvH";
			$code = $_GET["code"];;
			$state = $_GET["state"];;
			$redirectURI = urlencode("http://yesyo.com/naver_callback.php");
				
			$naver_curl = "https://nid.naver.com/oauth2.0/token?grant_type=authorization_code&client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirectURI."&code=".$code."&state=".$state; 
			// 토큰값 가져오기 
			$is_post = false; 
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, $naver_curl); 
			curl_setopt($ch, CURLOPT_POST, $is_post); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$response = curl_exec ($ch); 
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
			curl_close ($ch);

			if($status_code == 200) { 
				$responseArr = json_decode($response, true); 
				$_SESSION['naver_access_token'] = $responseArr['access_token']; 
				$_SESSION['naver_refresh_token'] = $responseArr['refresh_token']; 
				// 토큰값으로 네이버 회원정보 가져오기 
				$me_headers = array( 'Content-Type: application/json', sprintf('Authorization: Bearer %s', $responseArr['access_token']) ); 
				$me_is_post = false; $me_ch = curl_init(); 
				curl_setopt($me_ch, CURLOPT_URL, "https://openapi.naver.com/v1/nid/me"); 
				curl_setopt($me_ch, CURLOPT_POST, $me_is_post); 
				curl_setopt($me_ch, CURLOPT_HTTPHEADER, $me_headers); 
				curl_setopt($me_ch, CURLOPT_RETURNTRANSFER, true); 
				$me_response = curl_exec ($me_ch); 
				$me_status_code = curl_getinfo($me_ch, CURLINFO_HTTP_CODE); 
				curl_close ($me_ch); 
				$me_responseArr = json_decode($me_response, true); 
				if ($me_responseArr['response']['id']) { 
					// 회원아이디(naver_ 접두사에 네이버 아이디를 붙여줌) 
					$mb_uid = 'naver_'.$me_responseArr['response']['id']; 
					$mb_name = $me_responseArr['response']['name']; 
					$mb_email = $me_responseArr['response']['email']; 
					$mb_nick = $me_responseArr['response']['nickname'];
					$mb_gender = $me_responseArr['response']['gender']; 
					//$sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_NAME='".$mb_name."' AND MET_EMAIL='".$mb_email."' AND MET_NAVER='".$mb_uid."' ORDER BY MET_IDX DESC";
					$sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_NAVER='".$mb_uid."' ORDER BY MET_IDX DESC";
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($result);
					$cnt = mysqli_num_rows($result);


					if ($cnt > 0) { 
						// 멤버 DB에 토큰값 업데이트 	$responseArr['access_token'] 
							// 로그인 
							if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet  
									$LOGIN_IP=$_SERVER['HTTP_CLIENT_IP'];
							} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy  
									$LOGIN_IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
							} else {
									$LOGIN_IP=$_SERVER['REMOTE_ADDR'];
							}
							$dateTime = date("Y-m-d H:i:s");
							$_SESSION['LOGIN_ID'] = $row['MET_ID'];
							$_SESSION['LOGIN_NAME'] = $row['MET_NAME'];
							$_SESSION['LOGIN_IDX'] = $row['MET_IDX'];
							$_SESSION['LOGIN_NIC'] = $row['MET_NIC'];
							$_SESSION['LOGIN_IMG'] = $row['MET_IMG_SAVE'];
							$_SESSION["LOGIN_TIME"] = $dateTime;
							$_SESSION["LOGIN_IP"] = $LOGIN_IP;

							echo "<script>location.href='../index.php';</script>";
					} else { 
						$mb_nick = explode("@", $mb_email);

						$sql_insert = "INSERT INTO MEM_TB (MET_ID, MET_NIC, MET_NAME, MET_EMAIL, MET_NAVER, MET_POINT, MET_REG_DATE)VALUES('".$mb_email."','".$mb_nick[0]."','".$mb_name."','".$mb_email."','".$mb_uid."','1000','".date("Y-m-d H:i:s")."')";
						$result_insert = mysqli_query($conn,$sql_insert);
						if($result_insert){
							// 회원가입 포인트 지급
							$select_sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC LIMIT 1";
							$select_result = mysqli_query($conn,$select_sql);
							$select_row = mysqli_fetch_array($select_result);
							$point_sql = "INSERT INTO POINT_TB (MET_IDX,POT_CONTENT,POT_PLUS_POINT,POT_REG_DATE)VALUES('".$select_row['MET_IDX']."','회원가입 포인트','1000','".date("Y-m-d H:i:s")."') ";
							$point_result = mysqli_query($conn,$point_sql);
							echo "<script>alert('정상적으로 가입 되었습니다.'); location.href='../join_complete.php';</script>";
						}else{
							echo "<script>alert('정상적으로 가입 되지 않았습니다.');history.go(-1);</script>";
						}
						/*
						// 회원아이디 $mb_uid 
						$mb_nickname = $me_responseArr['response']['nickname']; 
						// 닉네임 
						$mb_email = $me_responseArr['response']['email']; 
						// 이메일 
						$mb_gender = $me_responseArr['response']['gender']; 
						// 성별 F: 여성, M: 남성, U: 확인불가 
						$mb_age = $me_responseArr['response']['age']; 
						// 연령대 $mb_birthday = $me_responseArr['response']['birthday']; 
						// 생일(MM-DD 형식) 
						$mb_profile_image = $me_responseArr['response']['profile_image']; 
						// 프로필 이미지 // 멤버 DB에 토큰과 회원정보를 넣고 로그인 
						echo "<script>location.href='./join_step1.php?mb_name=".$mb_name."&mb_email=".$mb_email."&mb_uid=".$mb_uid."';</script>";
						*/
					} // 회원정보가 없다면 회원가입 

					// 회원가입 DB에서 회원이 있으면(이미 가입되어 있다면) 토큰을 업데이트 하고 로그인함 
					/*if (회원정보가 있다면) { 
						// 멤버 DB에 토큰값 업데이트 
						$responseArr['access_token'] 
						// 로그인 
					} */

				} else { 
					// 회원정보를 가져오지 못했습니다. 
				} 
			} else { 
				// 토큰값을 가져오지 못했습니다. 
			}
