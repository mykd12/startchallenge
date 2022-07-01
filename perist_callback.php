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
					$sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_NAVER='".$mb_uid."' ORDER BY MET_IDX DESC";
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($result);
					$cnt = mysqli_num_rows($result);



					$MET_IDX = $_SESSION['LOGIN_IDX'];

					$sql_up = "UPDATE MEM_TB SET MET_NAVER='".$mb_uid."' WHERE MET_IDX='".$MET_IDX."'";
					$result_up = mysqli_query($conn,$sql_up);
					if($result_up){
						echo "<script>alert('정상적으로 연동 되었습니다.');location.href='./myAccount.php';</script>";
					}else{
						echo "<script>alert('정상적으로 연동 되지 않았습니다.');history.go(-1);';</script>";
					}

				} else { 
					// 회원정보를 가져오지 못했습니다. 
				} 
			} else { 
				// 토큰값을 가져오지 못했습니다. 
			}
