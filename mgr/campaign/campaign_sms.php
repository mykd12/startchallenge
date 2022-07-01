<?
header("Content-Type:text/html;charset=utf-8"); 


			if($_GET['rphone']){
				$rphone=$_GET['rphone'];
				//$rphone="01094519137";
				include_once "../inc/dbconfig.php";
				$returnurl = "http://denoblog.cafe24.com/mgr/campaign/campaign_view.php?mode=CPVIEW&CPT_IDX=".$_GET['CPT_IDX']."&pageNo=".$_GET['pageNo']."&search=".$_GET['search'];
				$testflag = "1";

				$sql = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_IDX='".$_GET['CPT_IDX']."' ORDER BY CPT_IDX DESC";
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($result);

				$msg ="축하합니다.".$row['CPT_TITLE']." 리뷰어로 선정되었습니다.\r\n";
				$msg .="발송드린 메일을 참조하여 리뷰마감일전 리뷰등록해주세요.\r\n";
				$msg .="■ 캠페인정보 \r\n http://denoblog.cafe24.com/report.php?CPT_IDX=".$_GET['CPT_IDX']."&MET_IDX=".$_GET['MET_IDX']." \r\n\r\n";
				$msg .="[안내사항]\r\n";
				$msg .="1.리뷰 등록기간내 반드시 리뷰를 등록해주세요.\r\n";
				$msg .="2.방문예약이 필요한 경우 메일로 보내드린 업체 담당자 전화로 예약 부탁 드립니다.\r\n";
				$msg .="3.기간 연장이 필요한 경우 최소 3일전 1:1 문의 및 고객센터(1644-9418)로 문의주세요.\r\n\r\n";
				$msg .="※ 발신전용문자입니다. 캠페인 문의는 고객센터로 문의 주세요.";

			   /******************** 인증정보 ********************/
				$sms_url = "http://sslsms.cafe24.com/sms_sender.php"; // HTTPS 전송요청 URL
				// $sms_url = "http://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL
				//$sms['user_id'] = base64_encode("cleanad1"); //SMS 아이디.
				//$sms['secure'] = base64_encode("2d4b5219af52f7e8f317c09593ca57f3") ;//인증키
				$sms['user_id'] = base64_encode("denoblogsms"); //SMS 아이디.
				$sms['secure'] = base64_encode("e520eb33168286b851af75253a294afc") ;//인증키
				$sms['msg'] = base64_encode(stripslashes($msg));
				$smsType = "L";
				$sms['subject'] = base64_encode("마이블로그 체험단 캠페인선정");
				$rphone = str_replace("-", "", $rphone); 
				$sms['rphone'] = base64_encode($rphone);
				/*$sms['sphone1'] = base64_encode("010");
				$sms['sphone2'] = base64_encode("8912");
				$sms['sphone3'] = base64_encode("0375");*/
				$sms['sphone1'] = base64_encode("010");
				$sms['sphone2'] = base64_encode("5589");
				$sms['sphone3'] = base64_encode("3837");
				$sms['rdate'] = base64_encode($_POST['rdate']);
				$sms['rtime'] = base64_encode($_POST['rtime']);
				$sms['mode'] = base64_encode("1"); // base64 사용시 반드시 모드값을 1로 주셔야 합니다.
				$sms['returnurl'] = base64_encode($returnurl);
				$sms['testflag'] = base64_encode($testflag);
				$sms['destination'] = strtr(base64_encode($_POST['destination']), '+/=', '-,');
				$sms['repeatFlag'] = base64_encode($_POST['repeatFlag']);
				$sms['repeatNum'] = base64_encode($_POST['repeatNum']);
				$sms['repeatTime'] = base64_encode($_POST['repeatTime']);
				$sms['smsType'] = base64_encode($smsType); // LMS일경우 L
				$nointeractive = $_POST['nointeractive']; //사용할 경우 : 1, 성공시 대화상자(alert)를 생략

				$host_info = explode("/", $sms_url);
				$host = $host_info[2];
				$path = $host_info[3]."/".$host_info[4];

				srand((double)microtime()*1000000);
				$boundary = "---------------------".substr(md5(rand(0,32000)),0,10);
				//print_r($sms);

				// 헤더 생성
				$header = "POST /".$path ." HTTP/1.0\r\n";
				$header .= "Host: ".$host."\r\n";
				$header .= "Content-type: multipart/form-data, boundary=".$boundary."\r\n";

				// 본문 생성
				foreach($sms AS $index => $value){
					$data .="--$boundary\r\n";
					$data .= "Content-Disposition: form-data; name=\"".$index."\"\r\n";
					$data .= "\r\n".$value."\r\n";
					$data .="--$boundary\r\n";
				}
				$header .= "Content-length: " . strlen($data) . "\r\n\r\n";

				$fp = fsockopen($host, 80);

				if ($fp) {
					fputs($fp, $header.$data);
					$rsp = '';
					while(!feof($fp)) {
						$rsp .= fgets($fp,8192);
					}
					fclose($fp);
					$msg = explode("\r\n\r\n",trim($rsp));
					$rMsg = explode(",", $msg[1]);
					$Result= $rMsg[0]; //발송결과
					$Count= $rMsg[1]; //잔여건수

					//발송결과 알림
					if($Result=="success") {
						$alert = "성공";
						$alert .= " 잔여건수는 ".$Count."건 입니다.";
					}
					else if($Result=="reserved") {
						$alert = "성공적으로 예약되었습니다.";
						$alert .= " 잔여건수는 ".$Count."건 입니다.";
					}
					else if($Result=="3205") {
						$alert = "잘못된 번호형식입니다.";
					}

					else if($Result=="0044") {
						$alert = "스팸문자는발송되지 않습니다.";
					}

					else {
						$alert = "[Error]".$Result;
					}
				}
				else {
					$alert = "Connection Failed";
				}
				if($nointeractive=="1" && ($Result!="success" && $Result!="Test Success!" && $Result!="reserved") ) {
					//echo "<script>alert('".$alert ."')</script>";

				}else if($nointeractive!="1") {
					echo "<script>alert('".$alert ."')</script>";
					echo "<script>location.href='".$returnurl."';</script>";
					exit;
					//echo "error";
				}
			
		}else{
			echo "<script>alert('SMS 문자를 발송할 연락처가 없습니다.');history.go(-1);</script>";
			exit;
		}

    echo "<script>alert('".$alert ."')</script>";
		echo "<script>location.href='".$returnurl."';</script>";


    $oCurl = curl_init();
    $url =  "https://sslsms.cafe24.com/smsSenderPhone.php";
    /*$aPostData['userId'] = "cleanad1"; // SMS 아이디
    $aPostData['passwd'] = "2d4b5219af52f7e8f317c09593ca57f3"; // 인증키*/
		$aPostData['userId'] = "denoblogsms"; // SMS 아이디
    $aPostData['passwd'] = "e520eb33168286b851af75253a294afc"; // 인증키
    curl_setopt($oCurl, CURLOPT_URL, $url);
    curl_setopt($oCurl, CURLOPT_POST, 1);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, $aPostData);
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, 0);
    $ret = curl_exec($oCurl);
    echo $ret;
    curl_close($oCurl);
?>