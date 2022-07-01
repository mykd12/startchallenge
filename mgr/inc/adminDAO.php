<?
header("Content-Type:text/html;charset=utf-8");
include_once "dbconfig.php";

if(isset($_GET['mode'])){
	$mode = $_GET['mode'];
}else if(isset($_POST['mode'])){
	$mode = $_POST['mode'];
}else if(isset($mode)){
	$mode = $mode;
}

if(isset($_GET['search'])){
	$search = $_GET['search'];
}else if(isset($_POST['search'])){
	$search = $_POST['search'];
}else if(isset($search)){
	$search = $search;
}



if(isset($_GET['search'])){		$search = $_GET['search'];		}else if(isset($_POST['search'])){		$search = $_POST['search'];		}else if(isset($search)){		$search = $search;		}

if(isset($_GET['type'])){		$type = $_GET['type'];		}else if(isset($_POST['type'])){		$type = $_POST['type'];		}else if(isset($type)){		$type = $type;		}

if(isset($_GET['cate'])){		$cate = $_GET['cate'];		}else if(isset($_POST['cate'])){		$cate = $_POST['cate'];		}else if(isset($cate)){		$cate = $cate;		}

if(isset($_GET['pageNo'])){		$pageNo = $_GET['pageNo'];		}else if(isset($_POST['pageNo'])){		$pageNo = $_POST['pageNo'];		}else if(isset($pageNo)){		$pageNo = $pageNo;		}else{		$pageNo = 1;		}


$list_num = 10; //한 페이지에 보여줄 목록 갯수
$page_num = 10; //한 화면에 보여줄 페이지 링크(묶음) 갯수
$offset = $list_num*($pageNo-1); //한 페이지의 시작 글 번호(listnum 수만큼 나누었을 때 시작하는 글의 번호)

$paging = "pageNo=".$pageNo;


$date = date("Y-m-d");
$dateTime = date("Y-m-d H:i:s");
$uploads_dir = '../../uploads/';
$md_day = date("YmdHis");

switch ($mode) {

	case "MMODIFY"  : // MEM MODIFY
		$MET_IDX = $_POST['MET_IDX'];
		$MET_PW = addslashes($_POST['MET_PW1']);
		$MET_NAME = addslashes($_POST['MET_NAME']);
		$MET_TEL = addslashes($_POST['MET_TEL']);
		$MET_EMAIL = addslashes($_POST['MET_EMAIL']);
		$MET_BIRTH = addslashes($_POST['MET_BIRTH']);
		$MET_GENDER = addslashes($_POST['MET_GENDER']);
		$MET_ZIP = addslashes($_POST['MET_ZIP']);
		$MET_ADDR1 = addslashes($_POST['MET_ADDR1']);
		$MET_ADDR2 = addslashes($_POST['MET_ADDR2']);
		$MET_FACEBOOK = addslashes($_POST['MET_FACEBOOK']);
		$MET_INSTAGRAM = addslashes($_POST['MET_INSTAGRAM']);
		$MET_BLOG = addslashes($_POST['MET_BLOG']);
		$MET_ETC_URL = addslashes($_POST['MET_ETC_URL']);
		$MET_YOUTUBE = addslashes($_POST['MET_YOUTUBE']);
		$MET_POSTING = $_POST['MET_POSTING'];
		$MET_POSTING_CNT = COUNT($_POST['MET_POSTING']);
		$MET_AREA = $_POST['MET_AREA'];
		$MET_AREA_CNT = COUNT($_POST['MET_AREA']);
		$MET_ROUTE = addslashes($_POST['MET_ROUTE']);
		for($i=0; $i <$MET_POSTING_CNT; $i++){
			if($i==0){
				$MET_POSTING_TOTAL .=  $MET_POSTING[$i];
			}else{
				$MET_POSTING_TOTAL .=  "|".$MET_POSTING[$i];
			}
		}

		for($j=0; $j <$MET_AREA_CNT; $j++){
			if($j==0){
				$MET_AREA_TOTAL .=  $MET_AREA[$j];
			}else{
				$MET_AREA_TOTAL .=  "|".$MET_AREA[$j];
			}
		}

		if($_FILES['MET_IMG']['size'] <= 0 ){
			$sql ="UPDATE MEM_TB SET MET_PW='".$MET_PW."', MET_NAME='".$MET_NAME."', MET_TEL='".$MET_TEL."', MET_EMAIL='".$MET_EMAIL."', MET_BIRTH='".$MET_BIRTH."', MET_GENDER='".$MET_GENDER."', MET_ZIP='".$MET_ZIP."', MET_ADDR1='".$MET_ADDR1."', MET_ADDR2='".$MET_ADDR2."', MET_FACEBOOK='".$MET_FACEBOOK."', MET_INSTAGRAM='".$MET_INSTAGRAM."', MET_BLOG='".$MET_BLOG."', MET_YOUTUBE='".$MET_YOUTUBE."', MET_ETC_URL='".$MET_ETC_URL."', MET_POSTING='".$MET_POSTING_TOTAL."', MET_AREA='".$MET_AREA_TOTAL."', MET_ROUTE='".$MET_ROUTE."' WHERE MET_IDX='".$MET_IDX."'";
			$result = mysqli_query($conn,$sql);
		}else{
			$MET_IMG_CNT = count($_FILES['MET_IMG']["name"]);
				$MET_IMG = $_FILES['MET_IMG'];
				$MET_IMG_SIZE = $MET_IMG["size"];
				$MET_IMG_ORGNAME = $MET_IMG["name"];
				$EXT = array_pop(explode('.', $MET_IMG_ORGNAME));
				$MET_IMG_SAVENAME = md5($md_day.$MET_IMG_ORGNAME).".".$EXT;
				$UP_FILE = $uploads_dir.$MET_IMG_SAVENAME;

				if (!is_dir($uploads_dir)) {
					mkdir($uploads_dir,0777);
				}

				if($MET_IMG_CNT > 0){
					if(!is_uploaded_file($MET_IMG['tmp_name'])) {
						echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
						exit;
					}else{
						if (move_uploaded_file($MET_IMG['tmp_name'], $UP_FILE)) {
							$sql ="UPDATE MEM_TB SET MET_PW='".$MET_PW."', MET_NAME='".$MET_NAME."', MET_TEL='".$MET_TEL."', MET_EMAIL='".$MET_EMAIL."', MET_BIRTH='".$MET_BIRTH."', MET_GENDER='".$MET_GENDER."', MET_ZIP='".$MET_ZIP."', MET_ADDR1='".$MET_ADDR1."', MET_ADDR2='".$MET_ADDR2."', MET_FACEBOOK='".$MET_FACEBOOK."', MET_INSTAGRAM='".$MET_INSTAGRAM."', MET_BLOG='".$MET_BLOG."', MET_YOUTUBE='".$MET_YOUTUBE."', MET_ETC_URL='".$MET_ETC_URL."', MET_POSTING='".$MET_POSTING."', MET_AREA='".$MET_AREA."', MET_ROUTE='".$MET_ROUTE."', MET_IMG_SAVE='".$MET_IMG_SAVENAME."', MET_IMG_ORG='".$MET_IMG_ORGNAME."' WHERE MET_IDX='".$MET_IDX."'";
							$result = mysqli_query($conn,$sql);
						}else{
							echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
						}
					}
				}
		}

		if($result){
			echo "<script>alert('정상적으로 변경 되었습니다.'); location.href='../mem/mem_write.php?mode=MMODIFY&MET_IDX=".$MET_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 변경 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "MDELETE"  : // MEM DELETE
		$MET_IDX = $_GET['MET_IDX'];

		$sql ="UPDATE MEM_TB SET MET_DELETE_DATE ='".$date."' WHERE MET_IDX='".$MET_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 및 탈퇴 되었습니다.'); location.href='../mem/mem_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 및 탈퇴 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "POINT_MANAGE"  : // 포인트 관리
		$MET_IDX = $_POST['MET_IDX'];
		$MET_IDX_CNT = COUNT($_POST['MET_IDX']);
		$POINT_TYPE = addslashes($_POST['POINT_TYPE']);
		$MET_POINT = addslashes($_POST['MET_POINT']);
		$POT_CONTENT = addslashes($_POST['POT_CONTENT']);

		for($i=0; $i < $MET_IDX_CNT; $i++){
			if($POINT_TYPE=='지급'){
				$sql ="UPDATE MEM_TB SET MET_POINT = MET_POINT+".$MET_POINT." WHERE MET_IDX='".$MET_IDX[$i]."'";
				$result = mysqli_query($conn,$sql);
				$sql_point = "INSERT INTO POINT_TB (MET_IDX,POT_CONTENT,POT_PLUS_POINT,POT_REG_DATE)VALUES('".$MET_IDX[$i]."','".$POT_CONTENT."','".$MET_POINT."','".$dateTime."')";
				$result_point = mysqli_query($conn,$sql_point);
			}else{
				$sql ="UPDATE MEM_TB SET MET_POINT = MET_POINT-".$MET_POINT." WHERE MET_IDX='".$MET_IDX[$i]."'";
				$result = mysqli_query($conn,$sql);
				$sql_point = "INSERT INTO POINT_TB (MET_IDX,POT_CONTENT,POT_MINUS_POINT,POT_REG_DATE)VALUES('".$MET_IDX[$i]."','".$POT_CONTENT."','".$MET_POINT."','".$dateTime."')";
				$result_point = mysqli_query($conn,$sql_point);
			}
		}
		if($result && $result_point){
			echo "<script>alert('정상적으로 처리 되었습니다.'); location.href='../mem/point_write.php';</script>";
		}else{
			echo "<script>alert('정상적으로 처리 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "RDATE"  : // 환급 지급일 선택
		$RET_DATE = $_GET['RET_DATE'];
		$RFT_IDX = $_GET['RFT_IDX'];

		$sql ="UPDATE REFUND_TB SET	RFT_DATE='".$RET_DATE."'	WHERE RFT_IDX='".$RFT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 적용 되었습니다.'); location.href='../mem/attend_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 적용 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "RAPP"  : // 환급 단계 설정
		$RFT_APP = $_GET['RFT_APP'];
		$RFT_IDX = $_GET['RFT_IDX'];
		$MET_IDX = $_GET['MET_IDX'];

		$sql ="UPDATE REFUND_TB SET	RFT_APP='".$RFT_APP."'	WHERE RFT_IDX='".$RFT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			if($RFT_APP=='환급처리'){
				$mem_sql = "SELECT * FROM MEM_TB WHERE MET_IDX='".$MET_IDX."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
				$mem_result = mysqli_query($conn,$mem_sql);
				$mem_row = mysqli_fetch_array($mem_result);
				$rphone = str_replace("-", "", $mem_row["MET_TEL"]);

				$returnurl = "";
				$testflag = "1";
				$msg = $mem_row["MET_NAME"]." 님이 신청하신 포인트 환급이 완료되었습니다.\r\n 확인하세요.";

				$sms_url = "http://sslsms.cafe24.com/sms_sender.php"; // HTTPS 전송요청 URL
				/*$sms['user_id'] = base64_encode("cleanad1"); //SMS 아이디.
				$sms['secure'] = base64_encode("2d4b5219af52f7e8f317c09593ca57f3") ;//인증키*/
				$sms['user_id'] = base64_encode("sms 아이디"); //SMS 아이디.
				$sms['secure'] = base64_encode("sms 인증키") ;//인증키
				$sms['msg'] = base64_encode(stripslashes($msg));
				$smsType = "S";
				$sms['rphone'] = base64_encode($rphone);
				$sms['sphone1'] = base64_encode("010");
				$sms['sphone2'] = base64_encode("8912");
				$sms['sphone3'] = base64_encode("0375");
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

					//echo "error";
				}
			}
			echo "<script>alert('정상적으로 적용 되었습니다.'); location.href='../mem/attend_list.php?pageNo=".$pageNo."&search=".$search."';</script>";

			$oCurl = curl_init();
			$url =  "https://sslsms.cafe24.com/smsSenderPhone.php";
			/*$aPostData['userId'] = "cleanad1"; // SMS 아이디
			$aPostData['passwd'] = "2d4b5219af52f7e8f317c09593ca57f3"; // 인증키*/
			$aPostData['userId'] = "sms 아이디"; // SMS 아이디
			$aPostData['passwd'] = "sms 인증키"; // 인증키
			curl_setopt($oCurl, CURLOPT_URL, $url);
			curl_setopt($oCurl, CURLOPT_POST, 1);
			curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($oCurl, CURLOPT_POSTFIELDS, $aPostData);
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, 0);
			$ret = curl_exec($oCurl);
			//echo $ret;
			curl_close($oCurl);

		}else{
			echo "<script>alert('정상적으로 적용 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "RMODIFY"  : // 환급신청 수정
		$RFT_IDX = $_POST['RFT_IDX'];
		$RFT_NAME = addslashes($_POST['RFT_NAME']);
		$RFT_BANK = addslashes($_POST['RFT_BANK']);
		$RFT_NUMBER = addslashes($_POST['RFT_NUMBER']);
		$RFT_TEL = addslashes($_POST['RFT_TEL']);


		$sql ="UPDATE REFUND_TB SET RFT_NAME='".$RFT_NAME."', RFT_BANK='".$RFT_BANK."', RFT_NUMBER='".$RFT_NUMBER."', RFT_TEL='".$RFT_TEL."' WHERE RFT_IDX='".$RFT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 변경 되었습니다.'); location.href='../mem/attend_view.php?mode=RVIEW&RFT_IDX=".$RFT_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 변경 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "CPINSERT"  : // CAMPAIGN INSERT
		$CPT_TITLE = addslashes($_POST['CPT_TITLE']);
		$CPT_TEL = addslashes($_POST['CPT_TEL']);
		$CPT_NAME = addslashes($_POST['CPT_NAME']);
		$CPT_SUB_TITLE = addslashes($_POST['CPT_SUB_TITLE']);
		$CPT_REQ_CONTENT = addslashes($_POST['CPT_REQ_CONTENT']);
		$CPT_CONTENT = addslashes($_POST['CPT_CONTENT']);
		$CPT_NOTICE = addslashes($_POST['CPT_NOTICE']);
		$CPT_AREA = $_POST['CPT_AREA'];
		$CPT_VIEW = $_POST['CPT_VIEW'];
		$CPT_AREA_CNT = COUNT($_POST['CPT_AREA']);
		$CPT_AREA_TOTAL = "";
		for($i =0; $i < $CPT_AREA_CNT; $i++){
			if($i==0){
				$CPT_AREA_TOTAL .=$CPT_AREA[$i];
			}else{
				$CPT_AREA_TOTAL .="|".$CPT_AREA[$i];
			}
		}
		$CPT_ADDR1 = addslashes($_POST['CPT_ADDR1']);
		$CPT_ADDR2 = addslashes($_POST['CPT_ADDR2']);
		$CPT_CATE1 = $_POST['CPT_CATE1'];
		$CPT_CATE1_CNT = COUNT($_POST['CPT_CATE1']);
		$CPT_CATE1_TOTAL = "";
		for($i =0; $i < $CPT_CATE1_CNT; $i++){
			if($i==0){
				$CPT_CATE1_TOTAL .=$CPT_CATE1[$i];
			}else{
				$CPT_CATE1_TOTAL .="|".$CPT_CATE1[$i];
			}
		}

		$CPT_CATE2 = addslashes($_POST['CPT_CATE2']);
		$CPT_CATE2_1 = addslashes($_POST['CPT_CATE2_1']);
		$CPT_CATE3 = addslashes($_POST['CPT_CATE3']);
		$CPT_OFFER = addslashes($_POST['CPT_OFFER']);
		$CPT_KEYWORD = addslashes($_POST['CPT_KEYWORD']);
		$CPT_KEYWORD_ETC = addslashes($_POST['CPT_KEYWORD_ETC']);

		$CKT_KEYWORD = $_POST['CKT_KEYWORD'];
		$CKT_KEYWORD_CNT = COUNT($_POST['CKT_KEYWORD']);
		

		$CPT_MISSION = addslashes($_POST['CPT_MISSION']);
		$CPT_RECRUITS = addslashes($_POST['CPT_RECRUITS']);
		$CPT_APP_START_DATE = addslashes($_POST['CPT_APP_START_DATE']);
		$CPT_APP_END_DATE = addslashes($_POST['CPT_APP_END_DATE']);
		$CPT_ANNO_DATE = addslashes($_POST['CPT_ANNO_DATE']);
		$CPT_REVIEW_START_DATE = addslashes($_POST['CPT_REVIEW_START_DATE']);
		$CPT_REVIEW_END_DATE = addslashes($_POST['CPT_REVIEW_END_DATE']);
		$CPT_APP_POINT = addslashes($_POST['CPT_APP_POINT']);
		$CPT_ANNO_POINT = addslashes($_POST['CPT_ANNO_POINT']);
		$CPT_PLUS_POINT = addslashes($_POST['CPT_PLUS_POINT']);
		$CPT_VIEW_DATE = addslashes($_POST['CPT_VIEW_DATE']);
		$CPT_END_DATE = addslashes($_POST['CPT_END_DATE']);

		$CPT_ETC = addslashes($_POST['CPT_ETC']);

		if($_FILES['CPT_IMG']['size'] <= 0 ){

		}else{
			$CPT_IMG_CNT = count($_FILES['CPT_IMG']["name"]);
				$CPT_IMG = $_FILES['CPT_IMG'];
				$CPT_IMG_SIZE = $CPT_IMG["size"];
				$CPT_IMG_ORGNAME = $CPT_IMG["name"];
				$EXT = array_pop(explode('.', $CPT_IMG_ORGNAME));
				$CPT_IMG_SAVENAME = md5($md_day.$CPT_IMG_ORGNAME).".".$EXT;
				$UP_FILE = $uploads_dir.$CPT_IMG_SAVENAME;

				if (!is_dir($uploads_dir)) {
					mkdir($uploads_dir,0777);
				}

				if($CPT_IMG_CNT > 0){
					if(!is_uploaded_file($CPT_IMG['tmp_name'])) {
						echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
						exit;
					}else{
						if (move_uploaded_file($CPT_IMG['tmp_name'], $UP_FILE)) {
							$CPT_IMG_SAVE = $CPT_IMG_SAVENAME;
							$CPT_IMG_ORG = $CPT_IMG_ORGNAME;
						}else{
							echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
						}
					}
				}
		}

		if($_FILES['CPT_IMG1']['size'] <= 0 ){

		}else{
			$CPT_IMG1_CNT = count($_FILES['CPT_IMG1']["name"]);
				$CPT_IMG1 = $_FILES['CPT_IMG1'];
				$CPT_IMG1_SIZE = $CPT_IMG1["size"];
				$CPT_IMG1_ORGNAME = $CPT_IMG1["name"];
				$EXT = array_pop(explode('.', $CPT_IMG1_ORGNAME));
				$CPT_IMG1_SAVENAME = md5($md_day.$CPT_IMG1_ORGNAME).".".$EXT;
				$UP_FILE = $uploads_dir.$CPT_IMG1_SAVENAME;

				if (!is_dir($uploads_dir)) {
					mkdir($uploads_dir,0777);
				}

				if($CPT_IMG1_CNT > 0){
					if(!is_uploaded_file($CPT_IMG1['tmp_name'])) {
						echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
						exit;
					}else{
						if (move_uploaded_file($CPT_IMG1['tmp_name'], $UP_FILE)) {
							$CPT_IMG1_SAVE = $CPT_IMG1_SAVENAME;
							$CPT_IMG1_ORG = $CPT_IMG1_ORGNAME;
						}else{
							echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
						}
					}
				}
		}
		
		if($CPT_KEYWORD){
			$sql ="INSERT INTO CAMPAIGN_TB(
							CPT_TITLE,
							CPT_TEL,
							CPT_NAME,
							CPT_VIEW,
							CPT_SUB_TITLE,
							CPT_REQ_CONTENT,
							CPT_CONTENT,
							CPT_NOTICE,
							CPT_AREA,
							CPT_ADDR1,
							CPT_ADDR2,
							CPT_CATE1,
							CPT_CATE2,
							CPT_CATE2_1,
							CPT_CATE3,
							CPT_OFFER,
							CPT_KEYWORD,
							CPT_KEYWORD_ETC,
							CPT_MISSION,
							CPT_RECRUITS,
							CPT_ETC,
							CPT_APP_START_DATE,
							CPT_APP_END_DATE,
							CPT_ANNO_DATE,
							CPT_REVIEW_START_DATE,
							CPT_REVIEW_END_DATE,
							CPT_APP_POINT,
							CPT_ANNO_POINT,
							CPT_PLUS_POINT,
							CPT_VIEW_DATE,
							CPT_IMG_SAVE,
							CPT_IMG_ORG,
							CPT_IMG1_SAVE,
							CPT_IMG1_ORG,
							CPT_END_DATE,
							CPT_APP_CNT,
							CPT_REG_DATE
							)VALUES(
							'".$CPT_TITLE."',
							'".$CPT_TEL."',
							'".$CPT_NAME."',
							'".$CPT_VIEW."',
							'".$CPT_SUB_TITLE."',
							'".$CPT_REQ_CONTENT."',
							'".$CPT_CONTENT."',
							'".$CPT_NOTICE."',
							'".$CPT_AREA_TOTAL."',
							'".$CPT_ADDR1."',
							'".$CPT_ADDR2."',
							'".$CPT_CATE1_TOTAL."',
							'".$CPT_CATE2."',
							'".$CPT_CATE2_1."',
							'".$CPT_CATE3."',
							'".$CPT_OFFER."',
							'".$CPT_KEYWORD."',
							'".$CPT_KEYWORD_ETC."',
							'".$CPT_MISSION."',
							'".$CPT_RECRUITS."',
							'".$CPT_ETC."',
							'".$CPT_APP_START_DATE."',
							'".$CPT_APP_END_DATE."',
							'".$CPT_ANNO_DATE."',
							'".$CPT_REVIEW_START_DATE."',
							'".$CPT_REVIEW_END_DATE."',
							'".$CPT_APP_POINT."',
							'".$CPT_ANNO_POINT."',
							'".$CPT_PLUS_POINT."',
							'".$CPT_VIEW_DATE."',
							'".$CPT_IMG_SAVE."',
							'".$CPT_IMG_ORG."',
							'".$CPT_IMG1_SAVE."',
							'".$CPT_IMG1_ORG."',
							'".$CPT_END_DATE."',
							'0',
							'".$dateTime."'
							)";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT INTO CAMPAIGN_TB(
							CPT_TITLE,
							CPT_TEL,
							CPT_NAME,
							CPT_VIEW,
							CPT_SUB_TITLE,
							CPT_REQ_CONTENT,
							CPT_CONTENT,
							CPT_NOTICE,
							CPT_AREA,
							CPT_ADDR1,
							CPT_ADDR2,
							CPT_CATE1,
							CPT_CATE2,
							CPT_CATE2_1,
							CPT_CATE3,
							CPT_OFFER,
							CPT_KEYWORD_ETC,
							CPT_MISSION,
							CPT_RECRUITS,
							CPT_ETC,
							CPT_APP_START_DATE,
							CPT_APP_END_DATE,
							CPT_ANNO_DATE,
							CPT_REVIEW_START_DATE,
							CPT_REVIEW_END_DATE,
							CPT_APP_POINT,
							CPT_ANNO_POINT,
							CPT_PLUS_POINT,
							CPT_VIEW_DATE,
							CPT_IMG_SAVE,
							CPT_IMG_ORG,
							CPT_IMG1_SAVE,
							CPT_IMG1_ORG,
							CPT_END_DATE,
							CPT_APP_CNT,
							CPT_REG_DATE
							)VALUES(
							'".$CPT_TITLE."',
							'".$CPT_TEL."',
							'".$CPT_NAME."',
							'".$CPT_VIEW."',
							'".$CPT_SUB_TITLE."',
							'".$CPT_REQ_CONTENT."',
							'".$CPT_CONTENT."',
							'".$CPT_NOTICE."',
							'".$CPT_AREA_TOTAL."',
							'".$CPT_ADDR1."',
							'".$CPT_ADDR2."',
							'".$CPT_CATE1_TOTAL."',
							'".$CPT_CATE2."',
							'".$CPT_CATE2_1."',
							'".$CPT_CATE3."',
							'".$CPT_OFFER."',
							'".$CPT_KEYWORD_ETC."',
							'".$CPT_MISSION."',
							'".$CPT_RECRUITS."',
							'".$CPT_ETC."',
							'".$CPT_APP_START_DATE."',
							'".$CPT_APP_END_DATE."',
							'".$CPT_ANNO_DATE."',
							'".$CPT_REVIEW_START_DATE."',
							'".$CPT_REVIEW_END_DATE."',
							'".$CPT_APP_POINT."',
							'".$CPT_ANNO_POINT."',
							'".$CPT_PLUS_POINT."',
							'".$CPT_VIEW_DATE."',
							'".$CPT_IMG_SAVE."',
							'".$CPT_IMG_ORG."',
							'".$CPT_IMG1_SAVE."',
							'".$CPT_IMG1_ORG."',
							'".$CPT_END_DATE."',
							'0',
							'".$dateTime."'
							)";
			$result = mysqli_query($conn,$sql);
			$select_sql ="SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL ORDER BY CPT_IDX DESC LIMIT 1";
			$select_result = mysqli_query($conn,$select_sql);
			$select_row = mysqli_fetch_array($select_result);
			for($i=0; $i < $CKT_KEYWORD_CNT; $i++){
				$sql_ckt = "INSERT INTO CAMPAIGN_KEYWORD_TB (CPT_IDX,CKT_KEY_WORD,CKT_REG_DATE)VALUES('".$select_row['CPT_IDX']."','".$CKT_KEYWORD[$i]."','".$date."')";
				$result_ckt = mysqli_query($conn,$sql_ckt);
			}
		}
		


		if($result){
			echo "<script>alert('정상적으로 추가 되었습니다.'); location.href='../campaign/campaign_list.php?pageNo=".$pageNo."&search=".$search."&cate=".$cate."';</script>";
		}else{
			echo "<script>alert('정상적으로 추가 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "CPMODIFY"  : // CAMPAIGN MODIFY
		$CPT_IDX = $_POST['CPT_IDX'];
		$CPT_TITLE = addslashes($_POST['CPT_TITLE']);
		$CPT_TEL = addslashes($_POST['CPT_TEL']);
		$CPT_NAME = addslashes($_POST['CPT_NAME']);
		$CPT_VIEW = addslashes($_POST['CPT_VIEW']);
		$CPT_SUB_TITLE = addslashes($_POST['CPT_SUB_TITLE']);
		$CPT_REQ_CONTENT =addslashes( $_POST['CPT_REQ_CONTENT']);
		$CPT_CONTENT = addslashes($_POST['CPT_CONTENT']);
		$CPT_NOTICE = addslashes($_POST['CPT_NOTICE']);
		$CPT_AREA = $_POST['CPT_AREA'];
		$CPT_AREA_CNT = COUNT($_POST['CPT_AREA']);
		$CPT_AREA_TOTAL = "";
		for($i =0; $i < $CPT_AREA_CNT; $i++){
			if($i==0){
				$CPT_AREA_TOTAL .=$CPT_AREA[$i];
			}else{
				$CPT_AREA_TOTAL .="|".$CPT_AREA[$i];
			}
		}
		$CPT_ADDR1 = addslashes($_POST['CPT_ADDR1']);
		$CPT_ADDR2 = addslashes($_POST['CPT_ADDR2']);
		$CPT_CATE1 = $_POST['CPT_CATE1'];
		$CPT_CATE1_CNT = COUNT($_POST['CPT_CATE1']);
		$CPT_CATE1_TOTAL = "";
		for($i =0; $i < $CPT_CATE1_CNT; $i++){
			if($i==0){
				$CPT_CATE1_TOTAL .=$CPT_CATE1[$i];
			}else{
				$CPT_CATE1_TOTAL .="|".$CPT_CATE1[$i];
			}
		}

		$CPT_CATE2 = addslashes($_POST['CPT_CATE2']);
		$CPT_CATE2_1 = addslashes($_POST['CPT_CATE2_1']);
		$CPT_CATE3 = addslashes($_POST['CPT_CATE3']);
		$CPT_OFFER = addslashes($_POST['CPT_OFFER']);
		$CPT_KEYWORD = addslashes($_POST['CPT_KEYWORD']);
		$CPT_KEYWORD_ETC = addslashes($_POST['CPT_KEYWORD_ETC']);

		$CKT_KEYWORD = $_POST['CKT_KEYWORD'];
		$CKT_KEYWORD_CNT = COUNT($_POST['CKT_KEYWORD']);

		$CPT_MISSION = addslashes($_POST['CPT_MISSION']);
		$CPT_RECRUITS = addslashes($_POST['CPT_RECRUITS']);
		$CPT_APP_START_DATE = addslashes($_POST['CPT_APP_START_DATE']);
		$CPT_APP_END_DATE = addslashes($_POST['CPT_APP_END_DATE']);
		$CPT_ANNO_DATE = addslashes($_POST['CPT_ANNO_DATE']);
		$CPT_REVIEW_START_DATE = addslashes($_POST['CPT_REVIEW_START_DATE']);
		$CPT_REVIEW_END_DATE = addslashes($_POST['CPT_REVIEW_END_DATE']);
		$CPT_APP_POINT = addslashes($_POST['CPT_APP_POINT']);
		$CPT_ANNO_POINT = addslashes($_POST['CPT_ANNO_POINT']);
		$CPT_PLUS_POINT = addslashes($_POST['CPT_PLUS_POINT']);
		$CPT_VIEW_DATE = addslashes($_POST['CPT_VIEW_DATE']);
		$CPT_END_DATE = addslashes($_POST['CPT_END_DATE']);

		$CPT_ETC = addslashes($_POST['CPT_ETC']);

		if($_FILES['CPT_IMG']['size'] <= 0 ){

		}else{
			$CPT_IMG_CNT = count($_FILES['CPT_IMG']["name"]);
			$CPT_IMG = $_FILES['CPT_IMG'];
			$CPT_IMG_SIZE = $CPT_IMG["size"];
			$CPT_IMG_ORGNAME = $CPT_IMG["name"];
			$EXT = array_pop(explode('.', $CPT_IMG_ORGNAME));
			$CPT_IMG_SAVENAME = md5($md_day.$CPT_IMG_ORGNAME).".".$EXT;
			$UP_FILE = $uploads_dir.$CPT_IMG_SAVENAME;

			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir,0777);
			}

			if($CPT_IMG_CNT > 0){
				if(!is_uploaded_file($CPT_IMG['tmp_name'])) {
					echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
					exit;
				}else{
					if (move_uploaded_file($CPT_IMG['tmp_name'], $UP_FILE)) {
						$CPT_IMG_SAVE = ",CPT_IMG_SAVE='".$CPT_IMG_SAVENAME."'";
						$CPT_IMG_ORG = ",CPT_IMG_ORG='".$CPT_IMG_ORGNAME."'";
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}

		if($_FILES['CPT_IMG1']['size'] <= 0 ){

		}else{
			$CPT_IMG1_CNT = count($_FILES['CPT_IMG1']["name"]);
			$CPT_IMG1 = $_FILES['CPT_IMG1'];
			$CPT_IMG1_SIZE = $CPT_IMG1["size"];
			$CPT_IMG1_ORGNAME = $CPT_IMG1["name"];
			$EXT = array_pop(explode('.', $CPT_IMG1_ORGNAME));
			$CPT_IMG1_SAVENAME = md5($md_day.$CPT_IMG1_ORGNAME).".".$EXT;
			$UP_FILE = $uploads_dir.$CPT_IMG1_SAVENAME;

			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir,0777);
			}

			if($CPT_IMG1_CNT > 0){
				if(!is_uploaded_file($CPT_IMG1['tmp_name'])) {
					echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
					exit;
				}else{
					if (move_uploaded_file($CPT_IMG1['tmp_name'], $UP_FILE)) {
						$CPT_IMG1_SAVE = ",CPT_IMG1_SAVE='".$CPT_IMG1_SAVENAME."'";
						$CPT_IMG1_ORG = ",CPT_IMG1_ORG='".$CPT_IMG1_ORGNAME."'";
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}
		
		if($CPT_KEYWORD){
			$sql ="UPDATE CAMPAIGN_TB SET
						CPT_TITLE='".$CPT_TITLE."',
						CPT_TEL='".$CPT_TEL."',
						CPT_NAME='".$CPT_NAME."',
						CPT_VIEW='".$CPT_VIEW."',
						CPT_SUB_TITLE='".$CPT_SUB_TITLE."',
						CPT_REQ_CONTENT='".$CPT_REQ_CONTENT."',
						CPT_CONTENT='".$CPT_CONTENT."',
						CPT_NOTICE='".$CPT_NOTICE."',
						CPT_AREA='".$CPT_AREA_TOTAL."',
						CPT_ADDR1='".$CPT_ADDR1."',
						CPT_ADDR2='".$CPT_ADDR2."',
						CPT_CATE1='".$CPT_CATE1_TOTAL."',
						CPT_CATE2='".$CPT_CATE2."',
						CPT_CATE2_1='".$CPT_CATE2_1."',
						CPT_CATE3='".$CPT_CATE3."',
						CPT_OFFER='".$CPT_OFFER."',
						CPT_KEYWORD='".$CPT_KEYWORD."',
						CPT_KEYWORD_ETC='".$CPT_KEYWORD_ETC."',
						CPT_MISSION='".$CPT_MISSION."',
						CPT_RECRUITS='".$CPT_RECRUITS."',
						CPT_ETC='".$CPT_ETC."',
						CPT_APP_START_DATE='".$CPT_APP_START_DATE."',
						CPT_APP_END_DATE='".$CPT_APP_END_DATE."',
						CPT_ANNO_DATE='".$CPT_ANNO_DATE."',
						CPT_REVIEW_START_DATE='".$CPT_REVIEW_START_DATE."',
						CPT_REVIEW_END_DATE='".$CPT_REVIEW_END_DATE."',
						CPT_APP_POINT='".$CPT_APP_POINT."',
						CPT_ANNO_POINT='".$CPT_ANNO_POINT."',
						CPT_PLUS_POINT='".$CPT_PLUS_POINT."',
						CPT_VIEW_DATE='".$CPT_VIEW_DATE."',
						CPT_END_DATE='".$CPT_END_DATE."'
						".$CPT_IMG_SAVE."
						".$CPT_IMG_ORG."
						".$CPT_IMG1_SAVE."
						".$CPT_IMG1_ORG."
						WHERE
						CPT_IDX='".$CPT_IDX."'";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="UPDATE CAMPAIGN_TB SET
						CPT_TITLE='".$CPT_TITLE."',
						CPT_TEL='".$CPT_TEL."',
						CPT_NAME='".$CPT_NAME."',
						CPT_VIEW='".$CPT_VIEW."',
						CPT_SUB_TITLE='".$CPT_SUB_TITLE."',
						CPT_REQ_CONTENT='".$CPT_REQ_CONTENT."',
						CPT_CONTENT='".$CPT_CONTENT."',
						CPT_NOTICE='".$CPT_NOTICE."',
						CPT_AREA='".$CPT_AREA_TOTAL."',
						CPT_ADDR1='".$CPT_ADDR1."',
						CPT_ADDR2='".$CPT_ADDR2."',
						CPT_CATE1='".$CPT_CATE1_TOTAL."',
						CPT_CATE2='".$CPT_CATE2."',
						CPT_CATE2_1='".$CPT_CATE2_1."',
						CPT_CATE3='".$CPT_CATE3."',
						CPT_OFFER='".$CPT_OFFER."',
						CPT_KEYWORD_ETC='".$CPT_KEYWORD_ETC."',
						CPT_MISSION='".$CPT_MISSION."',
						CPT_RECRUITS='".$CPT_RECRUITS."',
						CPT_ETC='".$CPT_ETC."',
						CPT_APP_START_DATE='".$CPT_APP_START_DATE."',
						CPT_APP_END_DATE='".$CPT_APP_END_DATE."',
						CPT_ANNO_DATE='".$CPT_ANNO_DATE."',
						CPT_REVIEW_START_DATE='".$CPT_REVIEW_START_DATE."',
						CPT_REVIEW_END_DATE='".$CPT_REVIEW_END_DATE."',
						CPT_APP_POINT='".$CPT_APP_POINT."',
						CPT_ANNO_POINT='".$CPT_ANNO_POINT."',
						CPT_PLUS_POINT='".$CPT_PLUS_POINT."',
						CPT_VIEW_DATE='".$CPT_VIEW_DATE."',
						CPT_END_DATE='".$CPT_END_DATE."'
						".$CPT_IMG_SAVE."
						".$CPT_IMG_ORG."
						".$CPT_IMG1_SAVE."
						".$CPT_IMG1_ORG."
						WHERE
						CPT_IDX='".$CPT_IDX."'";
			$result = mysqli_query($conn,$sql);
			for($i=0; $i < $CKT_KEYWORD_CNT; $i++){
				$sql_ckt = "INSERT INTO CAMPAIGN_KEYWORD_TB (CPT_IDX,CKT_KEY_WORD,CKT_REG_DATE)VALUES('".$CPT_IDX."','".$CKT_KEYWORD[$i]."','".$date."')";
				$result_ckt = mysqli_query($conn,$sql_ckt);
			}
			$CKT_IDX = $_POST['CKT_IDX'];
			$CKT_CNT = COUNT($_POST['CKT_IDX']);
			$CKT_UPDATE = $_POST['CKT_UPDATE'];
			$CKT_KEYWORD_UPDATE = $_POST['CKT_KEYWORD_UPDATE'];
			for($i=0; $i < $CKT_CNT; $i++){
				if($CKT_UPDATE[$i]=='del'){
					$sql_up = "UPDATE CAMPAIGN_KEYWORD_TB SET CKT_DELETE_DATE ='".$date."' WHERE CKT_IDX='".$CKT_IDX[$i]."'";
					$result_up = mysqli_query($conn,$sql_up);
				}else{
					$sql_up = "UPDATE CAMPAIGN_KEYWORD_TB SET CKT_KEY_WORD ='".$CKT_KEYWORD_UPDATE[$i]."' WHERE CKT_IDX='".$CKT_IDX[$i]."'";
					$result_up = mysqli_query($conn,$sql_up);
				}
			}
		}


		if($result){
			echo "<script>alert('정상적으로 수정 되었습니다.'); location.href='../campaign/campaign_list.php?pageNo=".$pageNo."&search=".$search."&cate=".$cate."';</script>";
			//echo $CPT_CATE1[0];
		}else{
			//echo $sql;
			echo "<script>alert('정상적으로 수정 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "CPDELETE"  : // CAMPAIGN DELETE
		$CPT_IDX = $_GET['CPT_IDX'];

		$sql ="UPDATE CAMPAIGN_TB SET	CPT_DELETE_DATE='".$date."'	WHERE CPT_IDX='".$CPT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.'); location.href='../campaign/campaign_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "CAMODIFY"  : // CAMPAIGN APP MODIFY
		$type = $_GET['type'];
		$CAT_IDX = $_GET['CAT_IDX'];
		$CPT_IDX = $_GET['CPT_IDX'];
		$MET_IDX = $_GET['MET_IDX'];
		if($type=='cancel'){
			$sql ="UPDATE CAMPAIGN_APP_TB SET	CAT_SELECTION='n'	WHERE CAT_IDX='".$CAT_IDX."'";
			$result = mysqli_query($conn,$sql);

			$sql_select1 ="SELECT * FROM CAMPAIGN_TB WHERE CPT_IDX='".$CPT_IDX."' AND CPT_DELETE_DATE IS NULL ORDER BY CPT_IDX DESC";
			$result_select1 = mysqli_query($conn,$sql_select1);
			$row_select1 = mysqli_fetch_array($result_select1);
			if($row_select1['CPT_ANNO_POINT'] > 0){
				// 캠페인 선정 포인트 차감
				$sql_mem_point = "UPDATE MEM_TB SET MET_POINT=MET_POINT-".$row_select1['CPT_ANNO_POINT']." WHERE MET_IDX='".$MET_IDX."'";
				$result_mem_point = mysqli_query($conn,$sql_mem_point);

				// 캠페인 선정 포인트 차감 이력 등록
				$sql_point = "INSERT INTO POINT_TB (MET_IDX,POT_CONTENT,POT_MINUS_POINT,POT_REG_DATE)VALUES('".$MET_IDX."','캠페인 선정 취소','".$row_select1['CPT_ANNO_POINT']."','".$dateTime."')";
				$result_point = mysqli_query($conn,$sql_point);
			}



		}else{
			$sql_select1 ="SELECT * FROM CAMPAIGN_TB WHERE CPT_IDX='".$CPT_IDX."' AND CPT_DELETE_DATE IS NULL ORDER BY CPT_IDX DESC";
			$result_select1 = mysqli_query($conn,$sql_select1);
			$row_select1 = mysqli_fetch_array($result_select1);

			$sql_select ="SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$CPT_IDX."' AND CAT_SELECTION='y' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
			$result_select = mysqli_query($conn,$sql_select);
			$cnt_select = mysqli_num_rows($result_select);

			$sql_select2 ="SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$CPT_IDX."' AND MET_IDX='".$MET_IDX."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
			$result_select2 = mysqli_query($conn,$sql_select2);
			$row_select2 = mysqli_fetch_array($result_select2);

			$cnt = $row_select1['CPT_RECRUITS'];
			if($cnt > $cnt_select){
				$sql ="UPDATE CAMPAIGN_APP_TB SET	CAT_SELECTION='y'	WHERE CAT_IDX='".$CAT_IDX."'";
				$result = mysqli_query($conn,$sql);

				if($row_select1['CPT_ANNO_POINT']){
					// 캠페인 선정 포인트 지급
					$sql_mem_point = "UPDATE MEM_TB SET MET_POINT=MET_POINT+".$row_select1['CPT_ANNO_POINT']." WHERE MET_IDX='".$MET_IDX."'";
					$result_mem_point = mysqli_query($conn,$sql_mem_point);

					// 캠페인 선정 포인트 지급 이력 등록
					$sql_point = "INSERT INTO POINT_TB (MET_IDX,POT_CONTENT,POT_PLUS_POINT,POT_REG_DATE)VALUES('".$MET_IDX."','캠페인 선정','".$row_select1['CPT_ANNO_POINT']."','".$dateTime."')";
					$result_point = mysqli_query($conn,$sql_point);
				}

			}else{
				echo "<script>alert('모집 선정자가 전부 선택 되었습니다.');history.go(-1);</script>";
				exit;
			}
		}

		if($result){
			echo "<script>alert('정상적으로 처리 되었습니다.'); location.href='../campaign/campaign_view.php?mode=CPVIEW&CPT_IDX=".$CPT_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 처리 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "CADELETE"  : // CAMPAIGN APP DELETE
		$CAT_IDX = $_GET['CAT_IDX'];
		$CPT_IDX = $_GET['CPT_IDX'];

		$sql ="UPDATE CAMPAIGN_APP_TB SET	CAT_DELETE_DATE='".$date."'	WHERE CAT_IDX='".$CAT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.'); location.href='../campaign/campaign_view.php?mode=CPVIEW&CPT_IDX=".$CPT_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "NINSERT"  : // NOTICE INSERT
		$NOT_TITLE = addslashes($_POST['NOT_TITLE']);
		$NOT_CONTENT = addslashes($_POST['NOT_CONTENT']);
		$NOT_CATE = addslashes($_POST['NOT_CATE']);
		$NOT_START_DATE = addslashes($_POST['NOT_START_DATE']);
		$NOT_END_DATE = addslashes($_POST['NOT_END_DATE']);

		if($_FILES['NOT_IMG']['size'] <= 0 ){
			if(!$NOT_START_DATE && !$NOT_END_DATE){
				$sql ="INSERT INTO NOTICE_TB (NOT_TITLE,NOT_CATE,NOT_START_DATE,NOT_END_DATE,NOT_CONTENT,NOT_VIEW,NOT_CNT,NOT_REG_DATE)VALUES('".$NOT_TITLE."','".$NOT_CATE."',null,null,'".$NOT_CONTENT."','N','0','".$date."')";
			}else{
				$sql ="INSERT INTO NOTICE_TB (NOT_TITLE,NOT_CATE,NOT_START_DATE,NOT_END_DATE,NOT_CONTENT,NOT_VIEW,NOT_CNT,NOT_REG_DATE)VALUES('".$NOT_TITLE."','".$NOT_CATE."','".$NOT_START_DATE."','".$NOT_END_DATE."','".$NOT_CONTENT."','N','0','".$date."')";
			}
			
			$result = mysqli_query($conn,$sql);
		}else{
			$NOT_IMG_CNT = count($_FILES['NOT_IMG']["name"]);
			$NOT_IMG = $_FILES['NOT_IMG'];
			$NOT_IMG_SIZE = $NOT_IMG["size"];
			$NOT_IMG_ORGNAME = $NOT_IMG["name"];
			$EXT = array_pop(explode('.', $NOT_IMG_ORGNAME));
			$NOT_IMG_SAVENAME = md5($md_day.$NOT_IMG_ORGNAME).".".$EXT;
			$UP_FILE = $uploads_dir.$NOT_IMG_SAVENAME;

			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir,0777);
			}

			if($NOT_IMG_CNT > 0){
				if(!is_uploaded_file($NOT_IMG['tmp_name'])) {
					echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
					exit;
				}else{
					if (move_uploaded_file($NOT_IMG['tmp_name'], $UP_FILE)) {
						if(!$NOT_START_DATE && !$NOT_END_DATE){
							$sql ="INSERT INTO NOTICE_TB (NOT_TITLE,NOT_CATE,NOT_START_DATE,NOT_END_DATE,NOT_CONTENT,NOT_IMG_SAVE,NOT_IMG_ORG,NOT_VIEW,NOT_CNT,NOT_REG_DATE)VALUES('".$NOT_TITLE."','".$NOT_CATE."',null,null,'".$NOT_CONTENT."','".$NOT_IMG_SAVENAME."','".$NOT_IMG_ORGNAME."','N','0','".$date."')";
							$result = mysqli_query($conn,$sql);
						}else{
							$sql ="INSERT INTO NOTICE_TB (NOT_TITLE,NOT_CATE,NOT_START_DATE,NOT_END_DATE,NOT_CONTENT,NOT_IMG_SAVE,NOT_IMG_ORG,NOT_VIEW,NOT_CNT,NOT_REG_DATE)VALUES('".$NOT_TITLE."','".$NOT_CATE."','".$NOT_START_DATE."','".$NOT_END_DATE."','".$NOT_CONTENT."','".$NOT_IMG_SAVENAME."','".$NOT_IMG_ORGNAME."','N','0','".$date."')";
							$result = mysqli_query($conn,$sql);
						}
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}


		if($_FILES['UPLOAD_FILE']['size']['0'] <= 0 ){
		}else{
			$sql_select ="SELECT * FROM NOTICE_TB WHERE NOT_DELETE_DATE IS NULL ORDER BY NOT_IDX DESC LIMIT 1";
			$result_select = mysqli_query($conn,$sql_select);
			$row_select = mysqli_fetch_array($result_select);

			$UPLOAD_FILE_CNT = count($_FILES['UPLOAD_FILE']["name"]);
			for($i = 0; $i < $UPLOAD_FILE_CNT; $i++){
				$UPLOAD_FILE = $_FILES['UPLOAD_FILE'];
				$UPLOAD_FILE_SIZE = $UPLOAD_FILE["size"][$i];
				$UPLOAD_FILE_ORGNAME = $UPLOAD_FILE["name"][$i];
				$EXT = array_pop(explode('.', $UPLOAD_FILE_ORGNAME));
				$UPLOAD_FILE_SAVENAME = md5($md_day.$UPLOAD_FILE_ORGNAME).".".$EXT;
				$UP_FILE = $uploads_dir.$UPLOAD_FILE_SAVENAME;

				if (!is_dir($uploads_dir)) {
					mkdir($uploads_dir,0777);
				}

				if($UPLOAD_FILE_CNT > 0){
					if(!is_uploaded_file($UPLOAD_FILE['tmp_name'][$i])) {
						echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
						exit;
					}else{
						if (move_uploaded_file($UPLOAD_FILE['tmp_name'][$i], $UP_FILE)) {
							$sql_up ="INSERT INTO UP_FILE (UP_TABLE_IDX, UP_TABLE_TYPE, UP_FILE_ORGNAME, UP_FILE_SAVENAME, UP_REG_DATE)VALUES('".$row_select['NOT_IDX']."','notice','".$UPLOAD_FILE_ORGNAME."','".$UPLOAD_FILE_SAVENAME."','".$date."')";
							$result_up = mysqli_query($conn,$sql_up);
						}else{
							echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
						}
					}
				}
			}
		}

		if($result){
			echo "<script>alert('정상적으로 등록 되었습니다.'); location.href='../community/notice_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 등록 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "NMODIFY"  : // NOTICE MODIFY
		$NOT_IDX = $_POST['NOT_IDX'];
		$NOT_TITLE = addslashes($_POST['NOT_TITLE']);
		$NOT_CONTENT = addslashes($_POST['NOT_CONTENT']);
		$NOT_CATE = addslashes($_POST['NOT_CATE']);
		$NOT_START_DATE = addslashes($_POST['NOT_START_DATE']);
		$NOT_END_DATE = addslashes($_POST['NOT_END_DATE']);

		if($_FILES['NOT_IMG']['size'] <= 0 ){
			if(!$NOT_START_DATE && !$NOT_END_DATE){
				$sql ="UPDATE NOTICE_TB SET NOT_TITLE='".$NOT_TITLE."',NOT_CATE='".$NOT_CATE."',NOT_START_DATE=null,NOT_END_DATE=null,NOT_CONTENT='".$NOT_CONTENT."' WHERE NOT_IDX='".$NOT_IDX."'";
			}else{
				$sql ="UPDATE NOTICE_TB SET NOT_TITLE='".$NOT_TITLE."',NOT_CATE='".$NOT_CATE."',NOT_START_DATE='".$NOT_START_DATE."',NOT_END_DATE='".$NOT_END_DATE."',NOT_CONTENT='".$NOT_CONTENT."' WHERE NOT_IDX='".$NOT_IDX."'";
			}
			$result = mysqli_query($conn,$sql);
		}else{
			$NOT_IMG_CNT = count($_FILES['NOT_IMG']["name"]);
			$NOT_IMG = $_FILES['NOT_IMG'];
			$NOT_IMG_SIZE = $NOT_IMG["size"];
			$NOT_IMG_ORGNAME = $NOT_IMG["name"];
			$EXT = array_pop(explode('.', $NOT_IMG_ORGNAME));
			$NOT_IMG_SAVENAME = md5($md_day.$NOT_IMG_ORGNAME).".".$EXT;
			$UP_FILE = $uploads_dir.$NOT_IMG_SAVENAME;

			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir,0777);
			}

			if($NOT_IMG_CNT > 0){
				if(!is_uploaded_file($NOT_IMG['tmp_name'])) {
					echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
					exit;
				}else{
					if (move_uploaded_file($NOT_IMG['tmp_name'], $UP_FILE)) {
						if(!$NOT_START_DATE && !$NOT_END_DATE){
							$sql ="UPDATE NOTICE_TB SET NOT_TITLE='".$NOT_TITLE."',NOT_CATE='".$NOT_CATE."',NOT_START_DATE=null,NOT_END_DATE=null,NOT_CONTENT='".$NOT_CONTENT."',NOT_IMG_SAVE='".$NOT_IMG_SAVENAME."',NOT_IMG_ORG='".$NOT_IMG_ORGNAME."' WHERE NOT_IDX='".$NOT_IDX."'";
						}else{
							$sql ="UPDATE NOTICE_TB SET NOT_TITLE='".$NOT_TITLE."',NOT_CATE='".$NOT_CATE."',NOT_START_DATE='".$NOT_START_DATE."',NOT_END_DATE='".$NOT_END_DATE."',NOT_CONTENT='".$NOT_CONTENT."',NOT_IMG_SAVE='".$NOT_IMG_SAVENAME."',NOT_IMG_ORG='".$NOT_IMG_ORGNAME."' WHERE NOT_IDX='".$NOT_IDX."'";
						}
						$result = mysqli_query($conn,$sql);
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}

		if($_FILES['UPLOAD_FILE']['size']['0'] <= 0 ){
		}else{
			$UPLOAD_FILE_CNT = count($_FILES['UPLOAD_FILE']["name"]);
			for($i = 0; $i < $UPLOAD_FILE_CNT; $i++){
				$UPLOAD_FILE = $_FILES['UPLOAD_FILE'];
				$UPLOAD_FILE_SIZE = $UPLOAD_FILE["size"][$i];
				$UPLOAD_FILE_ORGNAME = $UPLOAD_FILE["name"][$i];
				$EXT = array_pop(explode('.', $UPLOAD_FILE_ORGNAME));
				$UPLOAD_FILE_SAVENAME = md5($md_day.$UPLOAD_FILE_ORGNAME).".".$EXT;
				$UP_FILE = $uploads_dir.$UPLOAD_FILE_SAVENAME;

				if (!is_dir($uploads_dir)) {
					mkdir($uploads_dir,0777);
				}

				if($UPLOAD_FILE_CNT > 0){
					if(!is_uploaded_file($UPLOAD_FILE['tmp_name'][$i])) {
						echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
						exit;
					}else{
						if (move_uploaded_file($UPLOAD_FILE['tmp_name'][$i], $UP_FILE)) {
							$sql_up ="INSERT INTO UP_FILE (UP_TABLE_IDX, UP_TABLE_TYPE, UP_FILE_ORGNAME, UP_FILE_SAVENAME, UP_REG_DATE)VALUES('".$NOT_IDX."','notice','".$UPLOAD_FILE_ORGNAME."','".$UPLOAD_FILE_SAVENAME."','".$date."')";
							$result_up = mysqli_query($conn,$sql_up);
						}else{
							echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
						}
					}
				}
			}
		}

		$UPLOAD_DEL_CNT = count($_POST['UP_FILE_DEL']);
		for($i = 0; $i < $UPLOAD_DEL_CNT; $i++){
			if($_POST['UP_FILE_DEL'][$i]){
				$sql_up_del ="UPDATE UP_FILE SET UP_DELETE_DATE ='".$date."' WHERE UP_IDX='".$_POST['UP_FILE_DEL'][$i]."' ";
				$result_up_del = mysqli_query($conn,$sql_up_del);
				unlink($uploads_dir.$_POST['UP_FILE_SAVENAME'][$i]);
			}
		}

		if($result){
			echo "<script>alert('정상적으로 수정 되었습니다.'); location.href='../community/notice_view.php?mode=NVIEW&NOT_IDX=".$NOT_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 수정 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "NDELETE"  : // NOTICE DELETE
		$NOT_IDX = $_GET['NOT_IDX'];

		$sql ="UPDATE NOTICE_TB SET	NOT_DELETE_DATE='".$date."'	WHERE NOT_IDX='".$NOT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.'); location.href='../community/notice_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "NOT_VIEW"  : // 소식 메인 활성화
		$NOT_IDX = $_POST['NOT_IDX'];
		$type = $_POST['type'];
		$msg='';
		if($type=='N'){
			$sql ="UPDATE NOTICE_TB SET	NOT_VIEW='N' WHERE NOT_IDX='".$NOT_IDX."'";
			$result = mysqli_query($conn,$sql);
			$msg='yes';
		}else{
			$sql_search ="SELECT * FROM NOTICE_TB WHERE NOT_VIEW='Y' AND NOT_DELETE_DATE IS NULL ORDER BY NOT_IDX DESC";
			$result_search = mysqli_query($conn,$sql_search);
			$cnt_search = mysqli_num_rows($result_search);
			if($cnt_search < 5){
				$sql ="UPDATE NOTICE_TB SET	NOT_VIEW='Y' WHERE NOT_IDX='".$NOT_IDX."'";
				$result = mysqli_query($conn,$sql);
				$msg='yes';
			}else{
				$msg='cnt_over';
			}
		}

		echo $msg;
	break;



	case "EINSERT"  : // EVENT INSERT
		$EVT_TITLE = $_POST['EVT_TITLE'];
		$EVT_START_DATE = $_POST['EVT_START_DATE'];
		$EVT_END_DATE = $_POST['EVT_END_DATE'];
		$EVT_CONTENT = $_POST['EVT_CONTENT'];

		if($_FILES['EVT_IMG']['size'] <= 0 ){
			$sql ="INSERT INTO EVENT_TB (EVT_TITLE,EVT_CONTENT,EVT_START_DATE,EVT_END_DATE,EVT_REG_DATE)VALUES('".$EVT_TITLE."','".$EVT_CONTENT."','".$EVT_START_DATE."','".$EVT_END_DATE."','".$date."')";
			$result = mysqli_query($conn,$sql);
		}else{
			$EVT_IMG_CNT = count($_FILES['EVT_IMG']["name"]);
			$EVT_IMG = $_FILES['EVT_IMG'];
			$EVT_IMG_SIZE = $EVT_IMG["size"];
			$EVT_IMG_ORGNAME = $EVT_IMG["name"];
			$EXT = array_pop(explode('.', $EVT_IMG_ORGNAME));
			$EVT_IMG_SAVENAME = md5($md_day.$EVT_IMG_ORGNAME).".".$EXT;
			$UP_FILE = $uploads_dir.$EVT_IMG_SAVENAME;

			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir,0777);
			}

			if($EVT_IMG_CNT > 0){
				if(!is_uploaded_file($EVT_IMG['tmp_name'])) {
					echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
					exit;
				}else{
					if (move_uploaded_file($EVT_IMG['tmp_name'], $UP_FILE)) {
						$sql ="INSERT INTO EVENT_TB (EVT_TITLE,EVT_CONTENT,EVT_START_DATE,EVT_END_DATE,EVT_IMG_SAVE,EVT_IMG_ORG,EVT_REG_DATE)VALUES('".$EVT_TITLE."','".$EVT_CONTENT."','".$EVT_START_DATE."','".$EVT_END_DATE."','".$EVT_IMG_SAVENAME."','".$EVT_IMG_ORGNAME."','".$date."')";
						$result = mysqli_query($conn,$sql);
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}

		if($result){
			echo "<script>alert('정상적으로 등록 되었습니다.'); location.href='../community/event_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 등록 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "EMODIFY"  : // EVENT
		$EVT_IDX = $_POST['EVT_IDX'];
		$EVT_TITLE = $_POST['EVT_TITLE'];
		$EVT_START_DATE = $_POST['EVT_START_DATE'];
		$EVT_END_DATE = $_POST['EVT_END_DATE'];
		$EVT_CONTENT = $_POST['EVT_CONTENT'];

		if($_FILES['EVT_IMG']['size'] <= 0 ){
			$sql ="UPDATE EVENT_TB SET EVT_TITLE='".$EVT_TITLE."',EVT_CONTENT='".$EVT_CONTENT."',EVT_START_DATE='".$EVT_START_DATE."',EVT_END_DATE='".$EVT_END_DATE."' WHERE EVT_IDX='".$EVT_IDX."'";
			$result = mysqli_query($conn,$sql);
		}else{
			$EVT_IMG_CNT = count($_FILES['EVT_IMG']["name"]);
			$EVT_IMG = $_FILES['EVT_IMG'];
			$EVT_IMG_SIZE = $EVT_IMG["size"];
			$EVT_IMG_ORGNAME = $EVT_IMG["name"];
			$EXT = array_pop(explode('.', $EVT_IMG_ORGNAME));
			$EVT_IMG_SAVENAME = md5($md_day.$EVT_IMG_ORGNAME).".".$EXT;
			$UP_FILE = $uploads_dir.$EVT_IMG_SAVENAME;

			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir,0777);
			}

			if($EVT_IMG_CNT > 0){
				if(!is_uploaded_file($EVT_IMG['tmp_name'])) {
					echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
					exit;
				}else{
					if (move_uploaded_file($EVT_IMG['tmp_name'], $UP_FILE)) {
						$sql ="UPDATE EVENT_TB SET EVT_TITLE='".$EVT_TITLE."',EVT_CONTENT='".$EVT_CONTENT."',EVT_START_DATE='".$EVT_START_DATE."',EVT_END_DATE='".$EVT_END_DATE."',EVT_IMG_SAVE='".$EVT_IMG_SAVENAME."',EVT_IMG_ORG='".$EVT_IMG_ORGNAME."' WHERE EVT_IDX='".$EVT_IDX."'";
						$result = mysqli_query($conn,$sql);
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}

		if($result){
			echo "<script>alert('정상적으로 수정 되었습니다.'); location.href='../community/event_write.php?mode=EMODIFY&EVT_IDX=".$EVT_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 수정 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "EDELETE"  : // EVENT DELETE
		$EVT_IDX = $_GET['EVT_IDX'];

		$sql ="UPDATE EVENT_TB SET	EVT_DELETE_DATE='".$date."'	WHERE EVT_IDX='".$EVT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.'); location.href='../community/event_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "FINSERT"  : // FAQ INSERT
		$FAT_QUESTION = addslashes($_POST['FAT_QUESTION']);
		$FAT_ANSWER = addslashes($_POST['FAT_ANSWER']);

		$sql ="INSERT INTO FAQ_TB (FAT_QUESTION,FAT_ANSWER,FAT_REG_DATE)VALUES('".$FAT_QUESTION."','".$FAT_ANSWER."','".$date."')";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 등록 되었습니다.'); location.href='../community/faq_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 등록 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "FMODIFY"  : // FAQ MODIFY
		$FAT_IDX = $_POST['FAT_IDX'];
		$FAT_QUESTION = addslashes($_POST['FAT_QUESTION']);
		$FAT_ANSWER = addslashes($_POST['FAT_ANSWER']);

		$sql ="UPDATE FAQ_TB SET FAT_QUESTION='".$FAT_QUESTION."',FAT_ANSWER='".$FAT_ANSWER."' WHERE FAT_IDX='".$FAT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 수정 되었습니다.'); location.href='../community/faq_write.php?mode=FMODIFY&FAT_IDX=".$FAT_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 수정 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "FDELETE"  : // FAQ DELETE
		$FAT_IDX = $_GET['FAT_IDX'];

		$sql ="UPDATE FAQ_TB SET	FAT_DELETE_DATE='".$date."'	WHERE FAT_IDX='".$FAT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.'); location.href='../community/faq_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "SINSERT"  : // SERVICE INSERT
		$SVT_QUESTION = $_POST['SVT_QUESTION'];
		$SVT_ANSWER = $_POST['SVT_ANSWER'];

		$sql ="INSERT INTO SERVICE_TB (SVT_QUESTION,SVT_ANSWER,SVT_REG_DATE)VALUES('".$SVT_QUESTION."','".$SVT_ANSWER."','".$date."')";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 등록 되었습니다.'); location.href='../community/service_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 등록 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "SMODIFY"  : // SERVICE MODIFY
		$SVT_IDX = $_POST['SVT_IDX'];
		$SVT_QUESTION = $_POST['SVT_QUESTION'];
		$SVT_ANSWER = $_POST['SVT_ANSWER'];

		$sql ="UPDATE SERVICE_TB SET SVT_QUESTION='".$SVT_QUESTION."',SVT_ANSWER='".$SVT_ANSWER."' WHERE SVT_IDX='".$SVT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 수정 되었습니다.'); location.href='../community/service_write.php?mode=SMODIFY&SVT_IDX=".$SVT_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 수정 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "SDELETE"  : // SERVICE DELETE
		$SVT_IDX = $_GET['SVT_IDX'];

		$sql ="UPDATE SERVICE_TB SET SVT_DELETE_DATE='".$date."' WHERE SVT_IDX='".$SVT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.'); location.href='../community/service_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "QVIEW"  : // QNA ANSWER
		$QNT_IDX = $_POST['QNT_IDX'];
		$QAT_IDX = $_POST['QAT_IDX'];
		$QAT_CONTENT = addslashes($_POST['QAT_CONTENT']);

		if($QAT_IDX){
			$sql ="UPDATE QNA_ANSWER_TB SET QAT_CONTENT='".$QAT_CONTENT."' WHERE QAT_IDX='".$QAT_IDX."'";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT INTO QNA_ANSWER_TB (QNT_IDX,QAT_CONTENT,QAT_REG_DATE)VALUES('".$QNT_IDX."','".$QAT_CONTENT."','".$dateTime."')";
			$result = mysqli_query($conn,$sql);
		}

		if($result){
			echo "<script>alert('정상적으로 등록 되었습니다.'); location.href='../community/qna_view.php?mode=QVIEW&QNT_IDX=".$QNT_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 등록 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "QDELETE"  : // QNA DELETE
		$QNT_IDX = $_GET['QNT_IDX'];

		$sql ="UPDATE QNA_TB SET QNT_DELETE_DATE='".$date."' WHERE QNT_IDX='".$QNT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.'); location.href='../community/qna_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "PDELETE"  : // PARTNERSHIP DELETE
		$PST_IDX = $_GET['PST_IDX'];

		$sql ="UPDATE PARTNERSHIP_TB SET PST_DELETE_DATE='".$date."' WHERE PST_IDX='".$PST_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.'); location.href='../community/partnership_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "RVINSERT"  : // 리뷰등록
		$RVT_TITLE = addslashes($_POST['RVT_TITLE']);
		$RVT_CONTENT = addslashes($_POST['RVT_CONTENT']);
		$RVT_URL = addslashes($_POST['RVT_URL']);
		$RVT_NAME = addslashes($_POST['RVT_NAME']);

		if($_FILES['RVT_IMG']['size'] <= 0 ){
			$sql ="INSERT INTO REVIEW_TB (RVT_TITLE,RVT_CONTENT,RVT_URL,RVT_NAME,RVT_REG_DATE)VALUES('".$RVT_TITLE."','".$RVT_CONTENT."','".$RVT_URL."','".$RVT_NAME."','".$date."')";
			$result = mysqli_query($conn,$sql);
		}else{
			$RVT_IMG_CNT = count($_FILES['RVT_IMG']["name"]);
			$RVT_IMG = $_FILES['RVT_IMG'];
			$RVT_IMG_SIZE = $RVT_IMG["size"];
			$RVT_IMG_ORGNAME = $RVT_IMG["name"];
			$EXT = array_pop(explode('.', $RVT_IMG_ORGNAME));
			$RVT_IMG_SAVENAME = md5($md_day.$RVT_IMG_ORGNAME).".".$EXT;
			$UP_FILE = $uploads_dir.$RVT_IMG_SAVENAME;

			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir,0777);
			}

			if($RVT_IMG_CNT > 0){
				if(!is_uploaded_file($RVT_IMG['tmp_name'])) {
					echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
					exit;
				}else{
					if (move_uploaded_file($RVT_IMG['tmp_name'], $UP_FILE)) {
						$sql ="INSERT INTO REVIEW_TB (RVT_TITLE,RVT_CONTENT,RVT_URL,RVT_NAME,RVT_IMG_SAVE,RVT_IMG_ORG,RVT_REG_DATE)VALUES('".$RVT_TITLE."','".$RVT_CONTENT."','".$RVT_URL."','".$RVT_NAME."','".$RVT_IMG_SAVENAME."','".$RVT_IMG_ORGNAME."','".$date."')";
						$result = mysqli_query($conn,$sql);
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}

		if($result){
			echo "<script>alert('정상적으로 등록 되었습니다.'); location.href='../campaign/review_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 등록 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "RVMODIFY"  : // 리뷰수정
		$RVT_IDX = $_POST['RVT_IDX'];
		$RVT_TITLE = addslashes($_POST['RVT_TITLE']);
		$RVT_CONTENT = addslashes($_POST['RVT_CONTENT']);
		$RVT_URL = addslashes($_POST['RVT_URL']);
		$RVT_NAME = addslashes($_POST['RVT_NAME']);

		if($_FILES['RVT_IMG']['size'] <= 0 ){
			$sql ="UPDATE REVIEW_TB SET RVT_TITLE='".$RVT_TITLE."',RVT_CONTENT='".$RVT_CONTENT."',RVT_URL='".$RVT_URL."',RVT_NAME='".$RVT_NAME."' WHERE RVT_IDX='".$RVT_IDX."'";
			$result = mysqli_query($conn,$sql);
		}else{
			$RVT_IMG_CNT = count($_FILES['RVT_IMG']["name"]);
			$RVT_IMG = $_FILES['RVT_IMG'];
			$RVT_IMG_SIZE = $RVT_IMG["size"];
			$RVT_IMG_ORGNAME = $RVT_IMG["name"];
			$EXT = array_pop(explode('.', $RVT_IMG_ORGNAME));
			$RVT_IMG_SAVENAME = md5($md_day.$RVT_IMG_ORGNAME).".".$EXT;
			$UP_FILE = $uploads_dir.$RVT_IMG_SAVENAME;

			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir,0777);
			}

			if($RVT_IMG_CNT > 0){
				if(!is_uploaded_file($RVT_IMG['tmp_name'])) {
					echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
					exit;
				}else{
					if (move_uploaded_file($RVT_IMG['tmp_name'], $UP_FILE)) {
						$sql ="UPDATE REVIEW_TB SET RVT_TITLE='".$RVT_TITLE."',RVT_CONTENT='".$RVT_CONTENT."',RVT_URL='".$RVT_URL."',RVT_NAME='".$RVT_NAME."',RVT_IMG_SAVE='".$RVT_IMG_SAVENAME."',RVT_IMG_ORG='".$RVT_IMG_ORGNAME."' WHERE RVT_IDX='".$RVT_IDX."'";
						$result = mysqli_query($conn,$sql);
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}

		if($result){
			echo "<script>alert('정상적으로 수정 되었습니다.'); location.href='../campaign/review_write.php?mode=RVMODIFY&RVT_IDX=".$RVT_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 수정 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "RVDELETE"  : // 리뷰 삭제
		$RVT_IDX = $_GET['RVT_IDX'];

		$sql ="UPDATE REVIEW_TB SET RVT_DELETE_DATE='".$date."' WHERE RVT_IDX='".$RVT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.'); location.href='../campaign/review_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}
	break;

	case "PST_APP"  : // 광고/제휴문의 상태 업데이트
		$PST_APP = $_POST['PST_APP'];
		$PST_IDX = $_POST['PST_IDX'];

		$sql ="UPDATE PARTNERSHIP_TB SET PST_APP='".$PST_APP."' WHERE PST_IDX='".$PST_IDX."'";
		$result = mysqli_query($conn,$sql);

	break;

	case "CPT_MAIN"  : // 메인페이지 추천
		$CPT_MAIN = $_POST['CPT_MAIN'];
		$CPT_IDX = $_POST['CPT_IDX'];
		if($CPT_MAIN=="Y"){
			$sql ="UPDATE CAMPAIGN_TB SET CPT_MAIN='".$CPT_MAIN."' WHERE CPT_IDX='".$CPT_IDX."'";
		}else{
			$sql ="UPDATE CAMPAIGN_TB SET CPT_MAIN=null WHERE CPT_IDX='".$CPT_IDX."'";
		}
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "yes";
		}else{
			echo "no";
		}
	break;

	case "MVINSERT"  : // 메인 비쥬얼 등록
		$MVT_TITLE = $_POST['MVT_TITLE'];
		$MVT_SUB_TITLE = $_POST['MVT_SUB_TITLE'];
		$MVT_URL = $_POST['MVT_URL'];

		if($_FILES['MVT_IMG']['size'] <= 0 ){
			$sql ="INSERT INTO MAIN_VISUAL_TB (MVT_TITLE,MVT_SUB_TITLE,MVT_URL,MVT_REG_DATE)VALUES('".$MVT_TITLE."','".$MVT_SUB_TITLE."','".$MVT_URL."','".$date."')";
			$result = mysqli_query($conn,$sql);
		}else{
			$MVT_IMG_CNT = count($_FILES['MVT_IMG']["name"]);
			$MVT_IMG = $_FILES['MVT_IMG'];
			$MVT_IMG_SIZE = $MVT_IMG["size"];
			$MVT_IMG_ORGNAME = $MVT_IMG["name"];
			$EXT = array_pop(explode('.', $MVT_IMG_ORGNAME));
			$MVT_IMG_SAVENAME = md5($md_day.$MVT_IMG_ORGNAME).".".$EXT;
			$UP_FILE = $uploads_dir.$MVT_IMG_SAVENAME;

			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir,0777);
			}

			if($MVT_IMG_CNT > 0){
				if(!is_uploaded_file($MVT_IMG['tmp_name'])) {
					echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
					exit;
				}else{
					if (move_uploaded_file($MVT_IMG['tmp_name'], $UP_FILE)) {
						$sql ="INSERT INTO MAIN_VISUAL_TB (MVT_TITLE,MVT_SUB_TITLE,MVT_URL,MVT_IMG_SAVE,MVT_IMG_ORG,MVT_REG_DATE)VALUES('".$MVT_TITLE."','".$MVT_SUB_TITLE."','".$MVT_URL."','".$MVT_IMG_SAVENAME."','".$MVT_IMG_ORGNAME."','".$date."')";
						$result = mysqli_query($conn,$sql);
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}
		if($result){
			echo "<script>alert('정상적으로 등록 되었습니다.'); location.href='../main/main_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 등록 되지 않았습니다.');history.go(-1);</script>";
		}

	break;

	case "MVMODIFY"  : // 메인 비쥬얼 수정
		$MVT_IDX = $_POST['MVT_IDX'];
		$MVT_TITLE = $_POST['MVT_TITLE'];
		$MVT_SUB_TITLE = $_POST['MVT_SUB_TITLE'];
		$MVT_URL = $_POST['MVT_URL'];

		if($_FILES['MVT_IMG']['size'] <= 0 ){
			$sql ="UPDATE MAIN_VISUAL_TB SET MVT_TITLE='".$MVT_TITLE."',MVT_SUB_TITLE='".$MVT_SUB_TITLE."',MVT_URL='".$MVT_URL."' WHERE MVT_IDX='".$MVT_IDX."'";
			$result = mysqli_query($conn,$sql);
		}else{
			$MVT_IMG_CNT = count($_FILES['MVT_IMG']["name"]);
			$MVT_IMG = $_FILES['MVT_IMG'];
			$MVT_IMG_SIZE = $MVT_IMG["size"];
			$MVT_IMG_ORGNAME = $MVT_IMG["name"];
			$EXT = array_pop(explode('.', $MVT_IMG_ORGNAME));
			$MVT_IMG_SAVENAME = md5($md_day.$MVT_IMG_ORGNAME).".".$EXT;
			$UP_FILE = $uploads_dir.$MVT_IMG_SAVENAME;

			if (!is_dir($uploads_dir)) {
				mkdir($uploads_dir,0777);
			}

			if($MVT_IMG_CNT > 0){
				if(!is_uploaded_file($MVT_IMG['tmp_name'])) {
					echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
					exit;
				}else{
					if (move_uploaded_file($MVT_IMG['tmp_name'], $UP_FILE)) {
						$sql ="UPDATE MAIN_VISUAL_TB SET MVT_TITLE='".$MVT_TITLE."',MVT_SUB_TITLE='".$MVT_SUB_TITLE."',MVT_URL='".$MVT_URL."',MVT_IMG_SAVE='".$MVT_IMG_SAVENAME."',MVT_IMG_ORG='".$MVT_IMG_ORGNAME."' WHERE MVT_IDX='".$MVT_IDX."'";
						$result = mysqli_query($conn,$sql);
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}
		if($result){
			echo "<script>alert('정상적으로 수정 되었습니다.'); location.href='../main/main_write.php?mode=MVMODIFY&MVT_IDX=".$MVT_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 수정 되지 않았습니다.');history.go(-1);</script>";
		}

	break;

	case "MVDELETE"  : // 메인 비쥬얼 수정
		$MVT_IDX = $_GET['MVT_IDX'];

		$sql ="UPDATE MAIN_VISUAL_TB SET MVT_DELETE_DATE='".$date."' WHERE MVT_IDX='".$MVT_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.'); location.href='../main/main_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}

	break;

	case "MEMODIFY"  : // 메인 비쥬얼 수정
		$MET_IDX = $_POST['MET_IDX'];
		$MET_ETC = addslashes($_POST['MET_ETC']);

		$sql ="UPDATE MEM_TB SET MET_ETC='".$MET_ETC."' WHERE MET_IDX='".$MET_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 저장 되었습니다.'); location.href='../mem/mem_etc.php?mode=MEMODIFY&MET_IDX=".$MET_IDX."&pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 저장 되지 않았습니다.');history.go(-1);</script>";
		}

	break;

	case "CA_ARLIM"  : // 선정자 알림톡 전달
		$CAT_IDX = $_GET['CAT_IDX'];
		$CPT_IDX = $_GET['CPT_IDX'];

		$sql_select1 ="SELECT * FROM CAMPAIGN_TB WHERE CPT_IDX='".$CPT_IDX."' AND CPT_DELETE_DATE IS NULL ORDER BY CPT_IDX DESC";
		$result_select1 = mysqli_query($conn,$sql_select1);
		$row_select1 = mysqli_fetch_array($result_select1);

		$sql_select2 ="SELECT * FROM CAMPAIGN_APP_TB WHERE CAT_IDX='".$CAT_IDX."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
		$result_select2 = mysqli_query($conn,$sql_select2);
		$row_select2 = mysqli_fetch_array($result_select2);

		include_once "../../api/curl_token.php";
		$token_key = token_get();

		$CPT_REVIEW_END_DATE = date("m.d", strtotime($row_select1['CPT_REVIEW_END_DATE']));
		$yoil = array("일","월","화","수","목","금","토");
		$CPT_REVIEW_END_DATE.= "(".$yoil[date('w', strtotime($row_select1['CPT_REVIEW_END_DATE']))].")";
		$CAT_TEL = str_replace("-", "", $row_select2['CAT_TEL']);

		$CPT_IDX = $row_select1['CPT_IDX'];
		$CPT_NAME = $row_select1['CPT_NAME'];
		$CPT_TEL = $row_select1['CPT_TEL'];
		$CPT_SUB_TITLE = $row_select1['CPT_SUB_TITLE'];
		$CPT_KEYWORD = $row_select1['CPT_KEYWORD'];

		$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
		$_hostInfo  =	parse_url($_apiURL);
		$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;

		if($row_select1['CPT_CATE2']=='지역'){

		$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TE_3981',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '방문형캠페인_선정알림',
			'message_1'   => '♥스타트체험단 당첨축하드립니다.♥

가이드 url : http://startchallenge.co.kr/view.php?mode=CP_VIEW&CPT_IDX='.$CPT_IDX.'&type=지역
- 캠페인 내용이 숙지 되셨으면 카카오톡 회신 부탁드립니다.

▶업체명 : '.$CPT_NAME.'
▶예약전화 : '.$CPT_TEL.'
(방문 전 2~3일 전 예약전화/문자 부탁드립니다. 시간 준수는 필수입니다.)

▶제공내역 : '.$CPT_SUB_TITLE.'
▶이용기간 : ~ '.$CPT_REVIEW_END_DATE.'
▶방문 후 3일 이내로 포스팅 부탁드립니다.
▶스폰서 배너이미지 : http://startchallenge.co.kr/img/banner.png

★이용기간을 정확히 확인하여 사전예약 후 방문 부탁드립니다.
★키워드 및 캠페인 미션을 정확히 엄수하여 포스팅 부탁드립니다.

<검색 키워드 안내> : '.$CPT_KEYWORD.'

※ 1번 키워드를 메인키워드로 작성 부탁드립니다
※ 제목 : 키워드 1개와 업체명 필수
※ 본문 : 키워드 2개 이상 작성 필수 (제목과 중복 키워드 가능)',
			'button_1'    => '{"button":[{"name":"스폰서 배너","linkType":"WL","linkP":"http://startchallenge.co.kr/img/banner.png", "linkM": "http://startchallenge.co.kr/img/banner.png"}]}'
		);

		}else if($row_select1['CPT_CATE2']=='제품'){

			$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TF_7618',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '배송캠페인_선정알림',
			'message_1'   => '♥스타트체험단 당첨축하드립니다.♥

가이드 url : http://startchallenge.co.kr/view.php?mode=CP_VIEW&CPT_IDX='.$CPT_IDX.'&type=제품
- 캠페인 내용이 숙지 되셨으면 카카오톡 회신 부탁드립니다.

▶제공내역 : '.$CPT_SUB_TITLE.'
▶등록기간 : ~ '.$CPT_REVIEW_END_DATE.'
▶제품수령 후 5일 이내로 포스팅 부탁드립니다.
▶스폰서 배너이미지 : http://startchallenge.co.kr/img/banner.png

★체험하실 제품은 등록하신 주소로 일괄배송 예정입니다.
(배송지 수정은 불가한 점 양해 부탁드립니다.)
★콘텐츠 등록기간을 정확히 확인하여 등록 부탁드립니다.
★키워드 및 캠페인 미션을 정확히 엄수하여 포스팅 부탁드립니다.

■ 포스팅시에 : (업체 링크) 첨부부탁드립니다

<검색 키워드 안내> : '.$CPT_KEYWORD.'

※ 1번 키워드를 메인키워드로 작성 부탁드립니다
※ 제목 : 키워드 1개와 업체명 필수
※ 본문 : 키워드 2개 이상 작성 필수 (제목과 중복 키워드 가능)',
			'button_1'    => '{"button":[{"name":"스폰서 배너","linkType":"WL","linkP":"http://startchallenge.co.kr/img/banner.png", "linkM": "http://startchallenge.co.kr/img/banner.png"}]}'
		);

		}else if($row_select1['CPT_CATE2']=='배달'){

			$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TD_2524',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '배달캠페인_선정알림',
			'message_1'   => '♥스타트체험단 당첨축하드립니다.♥

가이드 url : http://startchallenge.co.kr/view.php?mode=CP_VIEW&CPT_IDX='.$CPT_IDX.'&type=배달
- 체험단 관련 자세한 내용은 링크를 통해 확인부탁드립니다.

▶업체명 : '.$CPT_NAME.'
▶사이트 : (요기요, 배달의민족)
(배달 결제 전 업체에 사전 전화 부탁드립니다.)

▶제공내역 : '.$CPT_SUB_TITLE.'
▶이용기간 : ~ '.$CPT_REVIEW_END_DATE.'
▶스폰서 배너이미지 : http://startchallenge.co.kr/img/banner.png

★어플에서 결제 시 직접 결제로 선택 부탁드립니다.
★고객 요청란에 체험단 명, 닉네임을 적어주세요.
★키워드 및 캠페인 미션을 정확히 엄수하여 포스팅 부탁드립니다.

<검색 키워드 안내> : '.$CPT_KEYWORD.'

※ 1번 키워드를 메인키워드로 작성 부탁드립니다
※ 제목 : 키워드 1개와 업체명 필수
※ 본문 : 키워드 2개 이상 작성 필수 (제목과 중복 키워드 가능)',
			'button_1'    => '{"button":[{"name":"스폰서 배너","linkType":"WL","linkP":"http://startchallenge.co.kr/img/banner.png", "linkM": "http://startchallenge.co.kr/img/banner.png"}]}'
		);

		}else if($row_select1['CPT_CATE2']=='기자단'){

			$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TD_2525',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '기자단캠페인_선정알림',
			'message_1'   => '♥스타트체험단 당첨축하드립니다.♥

가이드 url : http://startchallenge.co.kr/view.php?mode=CP_VIEW&CPT_IDX='.$CPT_IDX.'&type=기자단
- 체험단 관련 자세한 내용은 링크를 통해 확인부탁드립니다.

▶제공내역 : '.$CPT_SUB_TITLE.'
▶등록기간 : ~ '.$CPT_REVIEW_END_DATE.'
▶스폰서 배너이미지 : http://startchallenge.co.kr/img/banner.png

★기자단 캠페인은 가이드라인과 사진이 별도로 제공될 예정입니다.
★키워드 및 캠페인 미션을 정확히 엄수하여 포스팅 부탁드립니다.

■ 포스팅시에 : (업체 링크) 첨부부탁드립니다

<검색 키워드 안내> : '.$CPT_KEYWORD.'

※ 1번 키워드를 메인키워드로 작성 부탁드립니다
※ 제목 : 키워드 1개와 업체명 필수
※ 본문 : 키워드 2개 이상 작성 필수 (제목과 중복 키워드 가능)',
			'button_1'    => '{"button":[{"name":"스폰서 배너","linkType":"WL","linkP":"http://startchallenge.co.kr/img/banner.png", "linkM": "http://startchallenge.co.kr/img/banner.png"}]}'
			);
		}


		$oCurl = curl_init();
		curl_setopt($oCurl, CURLOPT_PORT, $_port);
		curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
		curl_setopt($oCurl, CURLOPT_POST, 1);
		curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
		curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);

		$ret = curl_exec($oCurl);
		$error_msg = curl_error($oCurl);
		curl_close($oCurl);
		if($ret){
			echo "<script>alert('정상적으로 알림톡을 전달하였습니다.');location.href='../campaign/campaign_view.php?mode=CPVIEW&CPT_IDX=".$CPT_IDX."&pageNo=".$pageNo."&search=".$search."'</script>";
		}
	break;

	case "CA_ARLIM_ALL"  : // 선정자 알림톡 전달(다량)
		$CAT_IDX = $_GET['CAT_IDX'];
		$CAT_IDX = explode("|", $CAT_IDX);
		$CAT_IDX_CNT = COUNT($CAT_IDX);
		$CPT_IDX = $_GET['CPT_IDX'];
		
		$sql_select1 ="SELECT * FROM CAMPAIGN_TB WHERE CPT_IDX='".$CPT_IDX."' AND CPT_DELETE_DATE IS NULL ORDER BY CPT_IDX DESC";
		$result_select1 = mysqli_query($conn,$sql_select1);
		$row_select1 = mysqli_fetch_array($result_select1);

		$CPT_IDX = $row_select1['CPT_IDX'];
		$CPT_NAME = $row_select1['CPT_NAME'];
		$CPT_TEL = $row_select1['CPT_TEL'];
		$CPT_SUB_TITLE = $row_select1['CPT_SUB_TITLE'];
		$CPT_KEYWORD = $row_select1['CPT_KEYWORD'];

		$ret="";
		for($i=0; $i < $CAT_IDX_CNT; $i++){
		$sql_select2 ="SELECT * FROM CAMPAIGN_APP_TB WHERE CAT_IDX='".$CAT_IDX[$i]."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
		$result_select2 = mysqli_query($conn,$sql_select2);
		$row_select2 = mysqli_fetch_array($result_select2);

		include_once "../../api/curl_token.php";
		$token_key = token_get();

		$CPT_REVIEW_END_DATE = date("m.d", strtotime($row_select1['CPT_REVIEW_END_DATE']));
		$yoil = array("일","월","화","수","목","금","토");
		$CPT_REVIEW_END_DATE.= "(".$yoil[date('w', strtotime($row_select1['CPT_REVIEW_END_DATE']))].")";
		$CAT_TEL = str_replace("-", "", $row_select2['CAT_TEL']);

		$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
		$_hostInfo  =	parse_url($_apiURL);
		$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;

		if($row_select1['CPT_CATE2']=='지역'){

		$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TE_3981',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '방문형캠페인_선정알림',
			'message_1'   => '♥스타트체험단 당첨축하드립니다.♥

가이드 url : http://startchallenge.co.kr/view.php?mode=CP_VIEW&CPT_IDX='.$CPT_IDX.'&type=지역
- 캠페인 내용이 숙지 되셨으면 카카오톡 회신 부탁드립니다.

▶업체명 : '.$CPT_NAME.'
▶예약전화 : '.$CPT_TEL.'
(방문 전 2~3일 전 예약전화/문자 부탁드립니다. 시간 준수는 필수입니다.)

▶제공내역 : '.$CPT_SUB_TITLE.'
▶이용기간 : ~ '.$CPT_REVIEW_END_DATE.'
▶방문 후 3일 이내로 포스팅 부탁드립니다.
▶스폰서 배너이미지 : http://startchallenge.co.kr/img/banner.png

★이용기간을 정확히 확인하여 사전예약 후 방문 부탁드립니다.
★키워드 및 캠페인 미션을 정확히 엄수하여 포스팅 부탁드립니다.

<검색 키워드 안내> : '.$CPT_KEYWORD.'

※ 1번 키워드를 메인키워드로 작성 부탁드립니다
※ 제목 : 키워드 1개와 업체명 필수
※ 본문 : 키워드 2개 이상 작성 필수 (제목과 중복 키워드 가능)',
			'button_1'    => '{"button":[{"name":"스폰서 배너","linkType":"WL","linkP":"http://startchallenge.co.kr/img/banner.png", "linkM": "http://startchallenge.co.kr/img/banner.png"}]}'
		);

		}else if($row_select1['CPT_CATE2']=='제품'){

			$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TF_7618',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '배송캠페인_선정알림',
			'message_1'   => '♥스타트체험단 당첨축하드립니다.♥

가이드 url : http://startchallenge.co.kr/view.php?mode=CP_VIEW&CPT_IDX='.$CPT_IDX.'&type=제품
- 캠페인 내용이 숙지 되셨으면 카카오톡 회신 부탁드립니다.

▶제공내역 : '.$CPT_SUB_TITLE.'
▶등록기간 : ~ '.$CPT_REVIEW_END_DATE.'
▶제품수령 후 5일 이내로 포스팅 부탁드립니다.
▶스폰서 배너이미지 : http://startchallenge.co.kr/img/banner.png

★체험하실 제품은 등록하신 주소로 일괄배송 예정입니다.
(배송지 수정은 불가한 점 양해 부탁드립니다.)
★콘텐츠 등록기간을 정확히 확인하여 등록 부탁드립니다.
★키워드 및 캠페인 미션을 정확히 엄수하여 포스팅 부탁드립니다.

■ 포스팅시에 : (업체 링크) 첨부부탁드립니다

<검색 키워드 안내> : '.$CPT_KEYWORD.'

※ 1번 키워드를 메인키워드로 작성 부탁드립니다
※ 제목 : 키워드 1개와 업체명 필수
※ 본문 : 키워드 2개 이상 작성 필수 (제목과 중복 키워드 가능)',
			'button_1'    => '{"button":[{"name":"스폰서 배너","linkType":"WL","linkP":"http://startchallenge.co.kr/img/banner.png", "linkM": "http://startchallenge.co.kr/img/banner.png"}]}'
		);

		}else if($row_select1['CPT_CATE2']=='배달'){

			$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TD_2524',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '배달캠페인_선정알림',
			'message_1'   => '♥스타트체험단 당첨축하드립니다.♥

가이드 url : http://startchallenge.co.kr/view.php?mode=CP_VIEW&CPT_IDX='.$CPT_IDX.'&type=배달
- 체험단 관련 자세한 내용은 링크를 통해 확인부탁드립니다.

▶업체명 : '.$CPT_NAME.'
▶사이트 : (요기요, 배달의민족)
(배달 결제 전 업체에 사전 전화 부탁드립니다.)

▶제공내역 : '.$CPT_SUB_TITLE.'
▶이용기간 : ~ '.$CPT_REVIEW_END_DATE.'
▶스폰서 배너이미지 : http://startchallenge.co.kr/img/banner.png

★어플에서 결제 시 직접 결제로 선택 부탁드립니다.
★고객 요청란에 체험단 명, 닉네임을 적어주세요.
★키워드 및 캠페인 미션을 정확히 엄수하여 포스팅 부탁드립니다.

<검색 키워드 안내> : '.$CPT_KEYWORD.'

※ 1번 키워드를 메인키워드로 작성 부탁드립니다
※ 제목 : 키워드 1개와 업체명 필수
※ 본문 : 키워드 2개 이상 작성 필수 (제목과 중복 키워드 가능)',
			'button_1'    => '{"button":[{"name":"스폰서 배너","linkType":"WL","linkP":"http://startchallenge.co.kr/img/banner.png", "linkM": "http://startchallenge.co.kr/img/banner.png"}]}'
		);

		}else if($row_select1['CPT_CATE2']=='기자단'){

			$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TD_2525',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '기자단캠페인_선정알림',
			'message_1'   => '♥스타트체험단 당첨축하드립니다.♥

가이드 url : http://startchallenge.co.kr/view.php?mode=CP_VIEW&CPT_IDX='.$CPT_IDX.'&type=기자단
- 체험단 관련 자세한 내용은 링크를 통해 확인부탁드립니다.

▶제공내역 : '.$CPT_SUB_TITLE.'
▶등록기간 : ~ '.$CPT_REVIEW_END_DATE.'
▶스폰서 배너이미지 : http://startchallenge.co.kr/img/banner.png

★기자단 캠페인은 가이드라인과 사진이 별도로 제공될 예정입니다.
★키워드 및 캠페인 미션을 정확히 엄수하여 포스팅 부탁드립니다.

■ 포스팅시에 : (업체 링크) 첨부부탁드립니다

<검색 키워드 안내> : '.$CPT_KEYWORD.'

※ 1번 키워드를 메인키워드로 작성 부탁드립니다
※ 제목 : 키워드 1개와 업체명 필수
※ 본문 : 키워드 2개 이상 작성 필수 (제목과 중복 키워드 가능)',
			'button_1'    => '{"button":[{"name":"스폰서 배너","linkType":"WL","linkP":"http://startchallenge.co.kr/img/banner.png", "linkM": "http://startchallenge.co.kr/img/banner.png"}]}'
			);
		}


		$oCurl = curl_init();
		curl_setopt($oCurl, CURLOPT_PORT, $_port);
		curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
		curl_setopt($oCurl, CURLOPT_POST, 1);
		curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
		curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);

		$ret = curl_exec($oCurl);
		$error_msg = curl_error($oCurl);
		curl_close($oCurl);
		}

		if($ret){
			echo "<script>alert('정상적으로 알림톡을 전달하였습니다.');location.href='../campaign/campaign_view.php?mode=CPVIEW&CPT_IDX=".$CPT_IDX."&pageNo=".$pageNo."&search=".$search."'</script>";
		}
	break;

	case "CA_REVIEW_ARLIM"  : // 리뷰등록 알림톡 전달
		$CAT_IDX = $_GET['CAT_IDX'];
		$CPT_IDX = $_GET['CPT_IDX'];

		$sql_select1 ="SELECT * FROM CAMPAIGN_TB WHERE CPT_IDX='".$CPT_IDX."' AND CPT_DELETE_DATE IS NULL ORDER BY CPT_IDX DESC";
		$result_select1 = mysqli_query($conn,$sql_select1);
		$row_select1 = mysqli_fetch_array($result_select1);

		$sql_select2 ="SELECT * FROM CAMPAIGN_APP_TB WHERE CAT_IDX='".$CAT_IDX."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
		$result_select2 = mysqli_query($conn,$sql_select2);
		$row_select2 = mysqli_fetch_array($result_select2);

		include_once "../../api/curl_token.php";
		$token_key = token_get();

		$CAT_TEL = str_replace("-", "", $row_select2['CAT_TEL']);

		$CPT_IDX = $row_select1['CPT_IDX'];
		$CPT_TITLE = $row_select1['CPT_TITLE'];
		$CPT_CATE2 = $row_select1['CPT_CATE2'];

		$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
		$_hostInfo  =	parse_url($_apiURL);
		$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;

		$cpt_link = "http://startchallenge.co.kr/view.php?mode=CP_VIEW&CPT_IDX=".$CPT_IDX."&type=".$CPT_CATE2;

		$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TE_2204',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '리뷰미등록시 등록요청',
			'message_1'   => '스타트체험단입니다.
회원님의 선정된 캠페인 ‘'.$CPT_TITLE.'’ 포스팅이 확인 되지 않아 연락드립니다.
'.$cpt_link.'

포스팅이 완료된 경우에는 ‘나의 캠페인’에 등록바랍니다.
http://startchallenge.co.kr/myCampaign.php

사전 연락 없이 캠페인을 등록하지 않는 경우에는 체험비/제품비 등 환불 요청이 있을 수 있으며,
다음 캠페인 선정에 영향을 끼칠 수 있습니다.

◆필수◆
· 스폰서 배너는 필수 등록입니다.
· 검색 키워드와 캠페인 미션에 맞춰 작성 부탁드립니다.
· 캠페인 등록 시 업체명 띄어쓰기나 철자가 틀린 경우에는 수정요청이 있을 수 있습니다.',
			'button_1'    => '{"button":[{"name":"나의 캠페인 연결","linkType":"WL","linkP":"http://startchallenge.co.kr/myCampaign.php", "linkM": "http://startchallenge.co.kr/myCampaign.php"}]}'
		);

		/*$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TD_6848',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '캠페인리뷰등록요청',
			'message_1'   => '스타트체험단입니다.
'.$cpt_link.'
'.$CPT_TITLE.' 체험은 잘 하셨나요?
캠페인 등록이 안돼서 연락드립니다.

캠페인 등록이 완료된 경우에는 나의 캠페인에 등록해 주시면 됩니다.
http://startchallenge.co.kr/myCampaign.php
체험 불가 및 포스팅 기한 연장이 필요한 사항은 1:1문의 or 카카오톡으로 남겨주세요.
https://pf.kakao.com/_RxcxkFK
빠른 피드백 부탁드립니다:)

■필수■
캠페인 등록 시 업체명 띄어쓰기나 철자가 틀린 경우에는 재검토가 있을 수 있습니다.
스폰서 배너는 필수 등록입니다.

양식에 맞춰 기입을 부탁드립니다.',
			'button_1'    => '{"button":[{"name":"선정된 캠페인","linkType":"WL","linkP":"http://startchallenge.co.kr/myCampaign.php", "linkM": "http://startchallenge.co.kr/myCampaign.php"},{"name":"문의링크","linkType":"WL","linkP":"https://pf.kakao.com/_RxcxkFK", "linkM": "https://pf.kakao.com/_RxcxkFK"}]}'
		);*/

		$oCurl = curl_init();
		curl_setopt($oCurl, CURLOPT_PORT, $_port);
		curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
		curl_setopt($oCurl, CURLOPT_POST, 1);
		curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
		curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);

		$ret = curl_exec($oCurl);
		$error_msg = curl_error($oCurl);
		curl_close($oCurl);
		if($ret){
			echo "<script>alert('정상적으로 알림톡을 전달하였습니다.');location.href='../campaign/campaign_view.php?mode=CPVIEW&CPT_IDX=".$CPT_IDX."&pageNo=".$pageNo."&search=".$search."'</script>";
		}
	break;

	case "CA_REVIEW_ARLIM_ALL"  : // 리뷰등록 알림톡 전달(다량)
		$CAT_IDX = $_GET['CAT_IDX'];
		$CAT_IDX = explode("|", $CAT_IDX);
		$CAT_IDX_CNT = COUNT($CAT_IDX);

		$CPT_IDX = $_GET['CPT_IDX'];

		$sql_select1 ="SELECT * FROM CAMPAIGN_TB WHERE CPT_IDX='".$CPT_IDX."' AND CPT_DELETE_DATE IS NULL ORDER BY CPT_IDX DESC";
		$result_select1 = mysqli_query($conn,$sql_select1);
		$row_select1 = mysqli_fetch_array($result_select1);
		
		$CPT_IDX = $row_select1['CPT_IDX'];
		$CPT_TITLE = $row_select1['CPT_TITLE'];
		$CPT_CATE2 = $row_select1['CPT_CATE2'];

		for($i=0; $i < $CAT_IDX_CNT; $i++){
		$sql_select2 ="SELECT * FROM CAMPAIGN_APP_TB WHERE CAT_IDX='".$CAT_IDX[$i]."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
		$result_select2 = mysqli_query($conn,$sql_select2);
		$row_select2 = mysqli_fetch_array($result_select2);

		include_once "../../api/curl_token.php";
		$token_key = token_get();

		$CAT_TEL = str_replace("-", "", $row_select2['CAT_TEL']);


		$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
		$_hostInfo  =	parse_url($_apiURL);
		$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;

		$cpt_link = "http://startchallenge.co.kr/view.php?mode=CP_VIEW&CPT_IDX=".$CPT_IDX."&type=".$CPT_CATE2;

		$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TE_2204',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '리뷰미등록시 등록요청',
			'message_1'   => '스타트체험단입니다.
회원님의 선정된 캠페인 ‘'.$CPT_TITLE.'’ 포스팅이 확인 되지 않아 연락드립니다.
'.$cpt_link.'

포스팅이 완료된 경우에는 ‘나의 캠페인’에 등록바랍니다.
http://startchallenge.co.kr/myCampaign.php

사전 연락 없이 캠페인을 등록하지 않는 경우에는 체험비/제품비 등 환불 요청이 있을 수 있으며,
다음 캠페인 선정에 영향을 끼칠 수 있습니다.

◆필수◆
· 스폰서 배너는 필수 등록입니다.
· 검색 키워드와 캠페인 미션에 맞춰 작성 부탁드립니다.
· 캠페인 등록 시 업체명 띄어쓰기나 철자가 틀린 경우에는 수정요청이 있을 수 있습니다.',
			'button_1'    => '{"button":[{"name":"나의 캠페인 연결","linkType":"WL","linkP":"http://startchallenge.co.kr/myCampaign.php", "linkM": "http://startchallenge.co.kr/myCampaign.php"}]}'
		);

		/*$_variables =	array(
			'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3',
			'userid'      => 'realdeno',
			'token'       => $token_key,
			'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff',
			'tpl_code'    => 'TD_6848',
			'sender'      => '07086338941',
			'receiver_1'  => $CAT_TEL,
			'recvname_1'  => $row_select2['CAT_NAME'],
			'subject_1'   => '캠페인리뷰등록요청',
			'message_1'   => '스타트체험단입니다.
'.$cpt_link.'
'.$CPT_TITLE.' 체험은 잘 하셨나요?
캠페인 등록이 안돼서 연락드립니다.

캠페인 등록이 완료된 경우에는 나의 캠페인에 등록해 주시면 됩니다.
http://startchallenge.co.kr/myCampaign.php
체험 불가 및 포스팅 기한 연장이 필요한 사항은 1:1문의 or 카카오톡으로 남겨주세요.
https://pf.kakao.com/_RxcxkFK
빠른 피드백 부탁드립니다:)

■필수■
캠페인 등록 시 업체명 띄어쓰기나 철자가 틀린 경우에는 재검토가 있을 수 있습니다.
스폰서 배너는 필수 등록입니다.

양식에 맞춰 기입을 부탁드립니다.',
			'button_1'    => '{"button":[{"name":"선정된 캠페인","linkType":"WL","linkP":"http://startchallenge.co.kr/myCampaign.php", "linkM": "http://startchallenge.co.kr/myCampaign.php"},{"name":"문의링크","linkType":"WL","linkP":"https://pf.kakao.com/_RxcxkFK", "linkM": "https://pf.kakao.com/_RxcxkFK"}]}'
		);*/

		$oCurl = curl_init();
		curl_setopt($oCurl, CURLOPT_PORT, $_port);
		curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
		curl_setopt($oCurl, CURLOPT_POST, 1);
		curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
		curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);

		$ret = curl_exec($oCurl);
		$error_msg = curl_error($oCurl);
		curl_close($oCurl);
		}
		if($ret){
			echo "<script>alert('정상적으로 알림톡을 전달하였습니다.');location.href='../campaign/campaign_view.php?mode=CPVIEW&CPT_IDX=".$CPT_IDX."&pageNo=".$pageNo."&search=".$search."'</script>";
		}
	break;

	case "BLLIST"  : // 블랙리스트 선정
		$MET_IDX = $_GET['MET_IDX'];
		$MET_BLACK_MSG = addslashes($_GET['MET_BLACK_MSG']);

		$sql ="UPDATE MEM_TB SET MET_BLACK_MSG='".$MET_BLACK_MSG."',MET_BLACK='y' WHERE MET_IDX='".$MET_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 저장 되었습니다.'); location.href='../mem/mem_list.php?pageNo=".$pageNo."&search=".$search."';</script>";
		}else{
			echo "<script>alert('정상적으로 저장 되지 않았습니다.');history.go(-1);</script>";
		}

	break;

	case "BLLIST_CANCEL"  : // 블랙리스트 취소
		$MET_IDX = $_POST['MET_IDX'];

		$sql ="UPDATE MEM_TB SET MET_BLACK_MSG=null,MET_BLACK=null WHERE MET_IDX='".$MET_IDX."'";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "yes";
		}else{
			echo "no";
		}

	break;

	default    : break;
}
?>
