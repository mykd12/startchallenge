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
					//$sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_EMAIL='".$mb_email."' AND MET_NAVER='".$mb_uid."' ORDER BY MET_IDX DESC";
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
						echo "<script>alert('가입된 정보가 없습니다.\\r\\n회원가입 후 서비스 이용가능합니다.');location.href='./agree.php?mb_name=".$mb_name."&mb_email=".$mb_email."&mb_uid=".$mb_uid."';</script>";
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