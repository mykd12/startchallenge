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


$date = date("Y-m-d");
$dateTime = date("Y-m-d H:i:s");
$uploads_dir = '../uploads/';
$md_day = date("YmdHis");

switch ($mode) {
	case "JOIN"  : // 회원가입
		$MET_ID = $_POST['MET_ID'];
		$MET_NIC = $_POST['MET_NIC'];
		$MET_NAME = $_POST['MET_NAME'];
		$MET_EMAIL = $_POST['MET_EMAIL'];
		$MET_PW = $_POST['MET_PW'];
		$MET_POSTING = $_POST['MET_POSTING'];
		$MET_AREA = $_POST['MET_AREA'];
		$MET_ROUTE = $_POST['MET_ROUTE'];
		$MET_ROUTE_ETC = $_POST['MET_ROUTE_ETC'];
		$MET_NAVER = $_POST['MET_NAVER'];
		$MET_TEL = $_POST['MET_TEL'];

		$sql_id_ck ="SELECT * FROM MEM_TB WHERE MET_ID='".$MET_ID."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
		$result_id_ck = mysqli_query($conn,$sql_id_ck);
		$cnt_id_ck = mysqli_num_rows($result_id_ck);
		if($cnt_id_ck > 0){
			echo "<script>alert('중복된 아이디가 있습니다.');location.href='join_step1.php';</script>";
			exit;
		}

		$sql_nic_ck ="SELECT * FROM MEM_TB WHERE MET_NIC='".$MET_NIC."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
		$result_nic_ck = mysqli_query($conn,$sql_nic_ck);
		$cnt_nic_ck = mysqli_num_rows($result_nic_ck);
		if($cnt_nic_ck > 0){
			echo "<script>alert('중복된 닉네임이 있습니다.');location.href='join_step1.php';</script>";
			exit;
		}

		$sql ="INSERT INTO MEM_TB (MET_ID,MET_PW,MET_NAME,MET_TEL,MET_NIC,MET_EMAIL,MET_POSTING,MET_ROUTE,MET_POINT,MET_INFLUENT,MET_AREA,MET_NAVER,MET_REG_DATE)VALUES('".$MET_ID."','".$MET_PW."','".$MET_NAME."','".$MET_TEL."','".$MET_NIC."','".$MET_EMAIL."','".$MET_POSTING."','".$MET_ROUTE."','1000','".$MET_ROUTE_ETC."','".$MET_AREA."','".$MET_NAVER."','".$dateTime."')";
		$result = mysqli_query($conn,$sql);

		if($result){
			// 회원가입 포인트 지급
			$select_sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC LIMIT 1";
			$select_result = mysqli_query($conn,$select_sql);
			$select_row = mysqli_fetch_array($select_result);

			$mem_sql = "UPDATE MEM_TB SET MET_POINT='1000' WHERE MET_IDX='".$select_row['MET_IDX']."' ";
			$mem_result = mysqli_query($conn,$mem_sql);

			$point_sql = "INSERT INTO POINT_TB (MET_IDX,POT_CONTENT,POT_PLUS_POINT,POT_REG_DATE)VALUES('".$select_row['MET_IDX']."','회원가입 포인트','1000','".$dateTime."') ";
			$point_result = mysqli_query($conn,$point_sql);
		
			include_once "../api/curl_token.php";
			$token_key = token_get();
			/* 
			-----------------------------------------------------------------------------------
			알림톡 전송
			-----------------------------------------------------------------------------------
			버튼의 경우 템플릿에 버튼이 있을때만 버튼 파라메더를 입력하셔야 합니다.
			버튼이 없는 템플릿인 경우 버튼 파라메더를 제외하시기 바랍니다.
			*/
			$MET_TEL = str_replace("-", "", $MET_TEL); 
			$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
			$_hostInfo  =	parse_url($_apiURL);
			$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TD_2435',
				'sender'      => '07086338941',
				'receiver_1'  => $MET_TEL,
				'recvname_1'  => $MET_NAME,
				'subject_1'   => '스타트 체험단 회원가입',
				'message_1'   => '♥스타트체험단 회원가입을 환영합니다.♥

앞으로 다양한 소식과 혜택/정보를 메시지로 전달 받을 수 있습니다.
다양한 체험을 시작하는 장소 스타트체험단

▼CS 고객상담▼
1544-9537 / 070-8633-8941
▼스타트체험단 홈페이지▼
http://startchallenge.co.kr/index.php',
				'button_1'    => '{"button":[{"name":"링크","linkType":"WL","linkP":"http://startchallenge.co.kr", "linkM": "http://startchallenge.co.kr"}]}' // 템플릿에 버튼이 없는경우 제거하시기 바랍니다.
			);
		 
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

			// 리턴 JSON 문자열 확인
			//print_r($ret . PHP_EOL);

			// JSON 문자열 배열 변환
			//$retArr = json_decode($ret);

			// 결과값 출력
			//print_r($retArr);

			echo "<script>alert('정상적으로 가입 되었습니다.'); location.href='../join_complete.php';</script>";
		}else{
			echo "<script>alert('정상적으로 가입 되지 않았습니다.');history.go(-1);</script>";
		}
		
	break;

	case "PWMODIFY"  : // 비밀번호 찾기 변경
		$MET_IDX = $_POST['MET_IDX'];
		$MET_PW = $_POST['MET_PW1'];

		$sql ="UPDATE MEM_TB SET MET_PW='".$MET_PW."' WHERE MET_IDX='".$MET_IDX."' ";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 비밀번호 변경 되었습니다.'); location.href='../login.php';</script>";
		}else{
			echo "<script>alert('정상적으로 비밀번호 변경 되지 않았습니다.');history.go(-1);</script>";
		}
		
	break;


	case "CP_APP"  : // 체험단 신청
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];
		$CPT_IDX = $_POST['CPT_IDX'];
		$CAT_ZIP = $_POST['CAT_ZIP'];
		$CAT_PARTICI = $_POST['CAT_PARTICI'];
		$CAT_CAMERA = $_POST['CAT_CAMERA'];
		$CAT_CAMERA_ETC = $_POST['CAT_CAMERA_ETC'];
		$CAT_NAME = addslashes($_POST['CAT_NAME']);
		$CAT_TEL = addslashes($_POST['CAT_TEL']);
		$CAT_ADDR1 = addslashes($_POST['CAT_ADDR1']);
		$CAT_ADDR2 = addslashes($_POST['CAT_ADDR2']);
		$CAT_CHANNEL = $_POST['CAT_CHANNEL'];
		$CAT_URL = addslashes($_POST['CAT_URL']);
		$CAT_COMMENT = addslashes($_POST['CAT_COMMENT']);

		$CAT_BANK_NAME = addslashes($_POST['CAT_BANK_NAME']);
		$CAT_BANK_NUMBER = addslashes($_POST['CAT_BANK_NUMBER']);
		$CAT_BANK_USER = addslashes($_POST['CAT_BANK_USER']);
		
		$select_sql = "SELECT * FROM CAMPAIGN_APP_TB WHERE CAT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND CPT_IDX='".$CPT_IDX."' ORDER BY CAT_IDX DESC ";
		$select_result = mysqli_query($conn,$select_sql);
		$select_cnt = mysqli_num_rows($select_result);

		if($select_cnt > 0){
			echo "<script>alert('해당 캠페인에 신청내역이 있습니다. 중복신청 불가능합니다!');history.go(-1);</script>";
			exit;
		}

		$sql ="INSERT INTO CAMPAIGN_APP_TB (CPT_IDX,MET_IDX,CAT_NAME,CAT_TEL,CAT_PARTICI,CAT_CAMERA,CAT_CHANNEL,CAT_URL,CAT_COMMENT,CAT_ZIP,CAT_ADDR1,CAT_ADDR2,CAT_CAMERA_ETC,CAT_BANK_NAME,CAT_BANK_NUMBER,CAT_BANK_USER,CAT_SELECTION,CAT_REG_DATE)VALUES('".$CPT_IDX."','".$MET_IDX."','".$CAT_NAME."','".$CAT_TEL."','".$CAT_PARTICI."','".$CAT_CAMERA."','".$CAT_CHANNEL."','".$CAT_URL."','".$CAT_COMMENT."','".$CAT_ZIP."','".$CAT_ADDR1."','".$CAT_ADDR2."','".$CAT_CAMERA_ETC."','".$CAT_BANK_NAME."','".$CAT_BANK_NUMBER."','".$CAT_BANK_USER."','n','".$dateTime."') ";
		$result = mysqli_query($conn,$sql);

		if($result){

			// 캠페인 신청 포인트 지급
			$select_sql = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ORDER BY CPT_IDX DESC";
			$select_result = mysqli_query($conn,$select_sql);
			$select_row = mysqli_fetch_array($select_result);

			$mem_sql = "UPDATE MEM_TB SET MET_POINT=MET_POINT+".$select_row['CPT_APP_POINT']." WHERE MET_IDX='".$MET_IDX."' ";
			$mem_result = mysqli_query($conn,$mem_sql);

			$point_sql = "INSERT INTO POINT_TB (MET_IDX,POT_CONTENT,POT_PLUS_POINT,POT_REG_DATE)VALUES('".$MET_IDX."','캠페인 신청','".$select_row['CPT_APP_POINT']."','".$dateTime."') ";
			$point_result = mysqli_query($conn,$point_sql);

			$cpt_sql = "UPDATE CAMPAIGN_TB SET CPT_APP_CNT=CPT_APP_CNT+1 WHERE CPT_IDX='".$CPT_IDX."' ";
			$cpt_result = mysqli_query($conn,$cpt_sql);

			echo "<script>alert('정상적으로 신청 되었습니다.'); location.href='../view.php?mode=CP_VIEW&CPT_IDX=".$CPT_IDX."&type=".$type."&search=".$search."&cate1=".$cate1."&cate2=".$cate2."&cate3=".$cate3."&sort=".$sort."&pageNo=".$pageNo."';</script>";
		}else{
			//echo $sql;
			echo "<script>alert('정상적으로 신청 되지 않았습니다.');history.go(-1);</script>";
		}
		
	break;

	case "CP_APP_CANCEL"  : // 체험단 신청 취소
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];
		$CPT_IDX = $_GET['CPT_IDX'];

		$sql ="UPDATE CAMPAIGN_APP_TB SET CAT_DELETE_DATE ='".$date."' WHERE CPT_IDX='".$CPT_IDX."' AND MET_IDX='".$MET_IDX."' ";
		$result = mysqli_query($conn,$sql);

		if($result){
			// 캠페인 신청 포인트 지급
			$select_sql = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ORDER BY CPT_IDX DESC";
			$select_result = mysqli_query($conn,$select_sql);
			$select_row = mysqli_fetch_array($select_result);

			$mem_sql = "UPDATE MEM_TB SET MET_POINT=MET_POINT-".$select_row['CPT_APP_POINT']." WHERE MET_IDX='".$MET_IDX."' ";
			$mem_result = mysqli_query($conn,$mem_sql);

			$point_sql = "INSERT INTO POINT_TB (MET_IDX,POT_CONTENT,POT_MINUS_POINT,POT_REG_DATE)VALUES('".$MET_IDX."','캠페인 신청 취소','".$select_row['CPT_APP_POINT']."','".$dateTime."') ";
			$point_result = mysqli_query($conn,$point_sql);

			$cpt_sql = "UPDATE CAMPAIGN_TB SET CPT_APP_CNT=CPT_APP_CNT-1 WHERE CPT_IDX='".$CPT_IDX."' ";
			$cpt_result = mysqli_query($conn,$cpt_sql);

			echo "<script>alert('정상적으로 취소 되었습니다.'); location.href='../view.php?mode=CP_VIEW&CPT_IDX=".$CPT_IDX."&type=".$type."&search=".$search."&cate1=".$cate1."&cate2=".$cate2."&cate3=".$cate3."&sort=".$sort."&pageNo=".$pageNo."';</script>";
		}else{
			echo "<script>alert('정상적으로 취소 되지 않았습니다.');history.go(-1);</script>";
		}
		
	break;

	case "CAINSERT"  : // 리뷰 등록
		$CAT_IDX = $_POST['CAT_IDX'];
		$CAT_BLOG_URL = addslashes($_POST['CAT_BLOG_URL']);
		$CAT_KEYWORD = addslashes($_POST['CAT_KEYWORD']);
		$CAT_CHANNEL = addslashes($_POST['CAT_CHANNEL']);
		
		if($CAT_CHANNEL=='블로그'){
			// 1. https://blog.naver.com/PostView.nhn?blogId=bj8172&logNo=222462924548
			// 2. https://blog.naver.com/leehye816/222464306538
			// 3. https://m.blog.naver.com/viraloz/222420599518
			// 4. http://blog.naver.com/leehye816/222464306538
			// 5. http://m.blog.naver.com/viraloz/222420599518
			// 6. https://jamdol.tistory.com/42
			
			$url ="";

			if(strpos($CAT_BLOG_URL,'PostView') !== false){
				$url = $CAT_BLOG_URL;
			}else if(strpos($CAT_BLOG_URL,'tistory') !== false){
				$url = $CAT_BLOG_URL;
			}else{
				$CAT_BLOG_URL = explode("/", $CAT_BLOG_URL);
				$url = "https://blog.naver.com/PostView.nhn?blogId=".$CAT_BLOG_URL[3]."&logNo=".$CAT_BLOG_URL[4]."";
			}

			if ($fp = fopen($url, 'r')) { $content = ''; 
				// 전부 읽을때까지 계속 읽음 
				while ($line = fread($fp, 1024)) { 
					if(!$line){
						exit;
					}
					$content .= $line; 
					//$content .="<br/>";
				} 
				//$content=preg_replace("!<iframe(.*?)<\/iframe>!is","",$content);
				$content=preg_replace("!<script(.*?)<\/script>!is","",$content);
				$content=preg_replace("!<meta(.*?)>!is","",$content);
				$content=preg_replace("!<style(.*?)<\/style>!is","",$content);
				$title = explode(":",strip_tags($content));
				//echo $title[0]."<br/>";
				$cnt = mb_substr_count(preg_replace("/\s+/", "", $content), preg_replace("/\s+/", "", $CAT_KEYWORD))."<br/>";
				//echo "<script>console.log(".$strip_tags($content).");</script>";


				//echo trim($content);
				if(($cnt+1) < 5){
					//echo $cnt;
					echo "<script>alert('해당 리뷰 URL이 잘못되었거나 \\r\\n리뷰키워드가 5회이상 작성되지 않은 리뷰 URL입니다.\\r\\n다시 한번 확인 부탁 드리겠습니다.');history.go(-1);</script>";
					exit;
				}
				
				//echo strip_tags($content);
			} else { 
				// 파일 open시 에러 발생 
			}
		}



		$sql ="UPDATE CAMPAIGN_APP_TB SET CAT_BLOG_URL ='".$_POST['CAT_BLOG_URL']."',CAT_KEYWORD ='".$CAT_KEYWORD."' WHERE CAT_IDX='".$CAT_IDX."' ";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 등록 되었습니다.'); location.href='../myCampaign.php?tab=2';</script>";
		}else{
			echo "<script>alert('정상적으로 등록 되지 않았습니다.');history.go(-1);</script>";
		}
		
	break;

	case "CAMODIFY"  : // 리뷰 변경
		$CAT_IDX = $_POST['CAT_IDX'];
		$CAT_BLOG_URL = addslashes($_POST['CAT_BLOG_URL']);
		$CAT_KEYWORD = addslashes($_POST['CAT_KEYWORD']);
		$CAT_CHANNEL = addslashes($_POST['CAT_CHANNEL']);

		if($CAT_CHANNEL=='블로그'){
			// 1. https://blog.naver.com/PostView.nhn?blogId=bj8172&logNo=222462924548
			// 2. https://blog.naver.com/leehye816/222464306538
			// 3. https://m.blog.naver.com/viraloz/222420599518
			// 4. http://blog.naver.com/leehye816/222464306538
			// 5. http://m.blog.naver.com/viraloz/222420599518
			// 6. https://jamdol.tistory.com/42
			
			$url ="";

			if(strpos($CAT_BLOG_URL,'PostView') !== false){
				$url = $CAT_BLOG_URL;
			}else if(strpos($CAT_BLOG_URL,'tistory') !== false){
				$url = $CAT_BLOG_URL;
			}else{
				$CAT_BLOG_URL = explode("/", $CAT_BLOG_URL);
				$url = "https://blog.naver.com/PostView.nhn?blogId=".$CAT_BLOG_URL[3]."&logNo=".$CAT_BLOG_URL[4]."";
			}

			if ($fp = fopen($url, 'r')) { $content = ''; 
				// 전부 읽을때까지 계속 읽음 
				while ($line = fread($fp, 1024)) { 
					if(!$line){
						exit;
					}
					$content .= $line; 
					//$content .="<br/>";
				} 
				$content=preg_replace("!<iframe(.*?)<\/iframe>!is","",$content);
				$content=preg_replace("!<script(.*?)<\/script>!is","",$content);
				$content=preg_replace("!<meta(.*?)>!is","",$content);
				$content=preg_replace("!<style(.*?)<\/style>!is","",$content);
				$title = explode(":",strip_tags($content));
				//echo $title[0]."<br/>";
				$cnt = mb_substr_count(preg_replace("/\s+/", "", strip_tags($content)), preg_replace("/\s+/", "", $CAT_KEYWORD))."<br/>";
				//echo "<script>console.log(".mb_substr_count(trim(strip_tags($content)).");</script>";
				if($cnt < 5){
					echo "<script>alert('해당 리뷰 URL이 잘못되었거나 \\r\\n리뷰키워드가 5회이상 작성되지 않은 리뷰 URL입니다.\\r\\n다시 한번 확인 부탁 드리겠습니다.');history.go(-1);</script>";
					exit;
				}
				
				//echo strip_tags($content);
			} else { 
				// 파일 open시 에러 발생 
			}
		}



		$sql ="UPDATE CAMPAIGN_APP_TB SET CAT_BLOG_URL ='".$_POST['CAT_BLOG_URL']."',CAT_KEYWORD ='".$CAT_KEYWORD."' WHERE CAT_IDX='".$CAT_IDX."' ";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 변경 되었습니다.'); location.href='../myCampaign.php?tab=2';</script>";
		}else{
			echo "<script>alert('정상적으로 변경 되지 않았습니다.');history.go(-1);</script>";
		}
		
	break;

	case "CHECK"  : // 출석 체크
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];
		$page = $_GET['page'];

		$select_sql = "SELECT * FROM ATTEND_TB WHERE MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' AND ADT_DELETE_DATE IS NULL ";
		$select_result = mysqli_query($conn,$select_sql);
		$select_cnt = mysqli_num_rows($select_result);
		
		if($select_cnt > 0){
			echo "<script>alert('이미 출석 체크를 하였습니다.');location.href='../".$page."';</script>";
			exit;
		}else{
			$sql ="INSERT INTO ATTEND_TB (MET_IDX,ADT_DATE,ADT_REG_DATE)VALUES('".$MET_IDX."','".$date."','".$dateTime."') ";
			$result = mysqli_query($conn,$sql);
		}

		if($result){
			$mem_sql = "UPDATE MEM_TB SET MET_POINT=MET_POINT+50 WHERE MET_IDX='".$MET_IDX."' ";
			$mem_result = mysqli_query($conn,$mem_sql);

			$point_sql = "INSERT INTO POINT_TB (MET_IDX,POT_CONTENT,POT_PLUS_POINT,POT_REG_DATE)VALUES('".$MET_IDX."','출석체크','50','".$dateTime."') ";
			$point_result = mysqli_query($conn,$point_sql);

			echo "<script>alert('정상적으로 출석체크 되었습니다.'); location.href='../".$page."';</script>";
		}else{
			echo "<script>alert('정상적으로 출석체크 되지 않았습니다.');history.go(-1);</script>";
		}
		
	break;

	case "CST_DEL"  : // 관심캠페인 제거
		$CST_IDX = $_GET['CST_IDX'];

		$sql ="UPDATE CAMPAIGN_SCRAP_TB SET CST_DELETE_DATE='".$date."' WHERE CST_IDX='".$CST_IDX."' ";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>location.href='../myFavorites.php';</script>";
		}else{
			echo "<script>alert('정상적으로 제거되지 않았습니다..');history.go(-1);</script>";
		}
		
	break;

	case "MYMODIFY"  : // 회원정보 수정
		$MET_IDX = $_POST['MET_IDX'];
		$MET_NAME = $_POST['MET_NAME'];
		$MET_TEL = $_POST['MET_TEL'];
		$MET_GENDER = $_POST['MET_GENDER'];
		$MET_BIRTH = $_POST['MET_BIRTH'];
		$MET_EMAIL = $_POST['MET_EMAIL'];
		$MET_ZIP = $_POST['MET_ZIP'];
		$MET_ADDR1 = $_POST['MET_ADDR1'];
		$MET_ADDR2 = $_POST['MET_ADDR2'];
		$MET_BLOG = $_POST['MET_BLOG'];
		$MET_INSTAGRAM = $_POST['MET_INSTAGRAM'];
		$MET_YOUTUBE = $_POST['MET_YOUTUBE'];
		if($_POST['MET_PW1']){
			$MET_PW = $_POST['MET_PW1'];
		}
		$MET_POSTING = $_POST['MET_POSTING'];
		$MET_POSTING_CNT = COUNT($MET_POSTING);
		$MET_POSTING_TOTAL = "";
		for($i=0; $i < $MET_POSTING_CNT; $i++){
			if($i==0){
				$MET_POSTING_TOTAL .= $MET_POSTING[$i];
			}else{
				$MET_POSTING_TOTAL .= "|".$MET_POSTING[$i];
			}
		}
		$MET_AREA = $_POST['MET_AREA'];
		$MET_AREA_CNT = COUNT($MET_AREA);
		$MET_AREA_TOTAL = "";
		for($i=0; $i < $MET_AREA_CNT; $i++){
			if($i==0){
				$MET_AREA_TOTAL .= $MET_AREA[$i];
			}else{
				$MET_AREA_TOTAL .= "|".$MET_AREA[$i];
			}
		}


		if($_POST['MET_PW1']){
			$sql ="UPDATE MEM_TB SET MET_NAME='".$MET_NAME."',MET_TEL='".$MET_TEL."',MET_GENDER='".$MET_GENDER."',MET_BIRTH='".$MET_BIRTH."',MET_EMAIL='".$MET_EMAIL."',MET_ZIP='".$MET_ZIP."',MET_ADDR1='".$MET_ADDR1."',MET_ADDR2='".$MET_ADDR2."',MET_BLOG='".$MET_BLOG."',MET_INSTAGRAM='".$MET_INSTAGRAM."',MET_YOUTUBE='".$MET_YOUTUBE."',MET_PW='".$MET_PW."',MET_POSTING='".$MET_POSTING_TOTAL."',MET_AREA='".$MET_AREA_TOTAL."' WHERE MET_IDX='".$MET_IDX."' ";
		}else{
			$sql ="UPDATE MEM_TB SET MET_NAME='".$MET_NAME."',MET_TEL='".$MET_TEL."',MET_GENDER='".$MET_GENDER."',MET_BIRTH='".$MET_BIRTH."',MET_EMAIL='".$MET_EMAIL."',MET_ZIP='".$MET_ZIP."',MET_ADDR1='".$MET_ADDR1."',MET_ADDR2='".$MET_ADDR2."',MET_BLOG='".$MET_BLOG."',MET_INSTAGRAM='".$MET_INSTAGRAM."',MET_YOUTUBE='".$MET_YOUTUBE."',MET_POSTING='".$MET_POSTING_TOTAL."',MET_AREA='".$MET_AREA_TOTAL."' WHERE MET_IDX='".$MET_IDX."' ";
		}
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 변경 되었습니다.');location.href='../myAccount.php';</script>";
		}else{
			echo "<script>alert('정상적으로 변경 되지 않았습니다.');history.go(-1);</script>";
		}
	
	break;

	case "QNINSERT"  : // 1:1 문의 등록
		$MET_IDX = $_POST['MET_IDX'];
		$QNT_TITLE = $_POST['QNT_TITLE'];
		$QNT_CATE1 = $_POST['QNT_CATE1'];
		$QNT_CONTENT = $_POST['QNT_CONTENT'];


		$sql ="INSERT INTO QNA_TB (MET_IDX,QNT_CATE1,QNT_TITLE,QNT_CONTENT,QNT_REG_DATE)VALUES('".$MET_IDX."','".$QNT_CATE1."','".$QNT_TITLE."','".$QNT_CONTENT."','".$dateTime."') ";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 등록 되었습니다.');location.href='../myInquiry.php?pageNo=".$pageNo."';</script>";
		}else{
			echo "<script>alert('정상적으로 등록 되지 않았습니다.');history.go(-1);</script>";
		}
	
	break;

	case "QNMODIFY"  : // 1:1 문의 수정
		$QNT_IDX = $_POST['QNT_IDX'];
		$MET_IDX = $_POST['MET_IDX'];
		$QNT_TITLE = $_POST['QNT_TITLE'];
		$QNT_CATE1 = $_POST['QNT_CATE1'];
		$QNT_CONTENT = $_POST['QNT_CONTENT'];


		$sql ="UPDATE QNA_TB SET QNT_TITLE='".$QNT_TITLE."', QNT_CATE1='".$QNT_CATE1."', QNT_CONTENT='".$QNT_CONTENT."' WHERE QNT_IDX='".$QNT_IDX."' ";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 수정 되었습니다.');location.href='../inquiry_view.php?mode=QNVIEW&QNT_IDX=".$QNT_IDX."&pageNo=".$pageNo."';</script>";
		}else{
			echo "<script>alert('정상적으로 수정 되지 않았습니다.');history.go(-1);</script>";
		}
	
	break;

	case "QNDELETE"  : // 1:1 문의 삭제
		$QNT_IDX = $_GET['QNT_IDX'];


		$sql ="UPDATE QNA_TB SET QNT_DELETE_DATE='".$date."' WHERE QNT_IDX='".$QNT_IDX."' ";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 삭제 되었습니다.');location.href='../myInquiry.php?pageNo=".$pageNo."';</script>";
		}else{
			echo "<script>alert('정상적으로 삭제 되지 않았습니다.');history.go(-1);</script>";
		}
	
	break;

	case "PSINSERT"  : // 광고/제휴 문의 등록
		$PST_CATE1 = $_POST['PST_CATE1'];
		$PST_CATE2 = $_POST['PST_CATE2'];
		$PST_NAME = $_POST['PST_NAME'];
		$PST_COMPANY = $_POST['PST_COMPANY'];
		$PST_TEL = $_POST['PST_TEL'];
		$PST_EMAIL = $_POST['PST_EMAIL'];
		$PST_TITLE = $_POST['PST_TITLE'];
		$PST_CONTENT = $_POST['PST_CONTENT'];

		$sql ="INSERT INTO PARTNERSHIP_TB (PST_APP,PST_CATE1,PST_CATE2,PST_NAME,PST_COMPANY,PST_TEL,PST_EMAIL,PST_TITLE,PST_CONTENT,PST_REG_DATE)VALUES('문의요청','".$PST_CATE1."','".$PST_CATE2."','".$PST_NAME."','".$PST_COMPANY."','".$PST_TEL."','".$PST_EMAIL."','".$PST_TITLE."','".$PST_CONTENT."','".$dateTime."') ";
		$result = mysqli_query($conn,$sql);


		if($_FILES['UPLOAD_FILE']['size'] <= 0 ){

		}else{
			$sql_select ="SELECT * FROM PARTNERSHIP_TB WHERE PST_DELETE_DATE IS NULL ORDER BY PST_IDX DESC LIMIT 1";
			$result_select = mysqli_query($conn,$sql_select);
			$row_select = mysqli_fetch_array($result_select);

			$UPLOAD_FILE_CNT = count($_FILES['UPLOAD_FILE']["name"]);
				$UPLOAD_FILE = $_FILES['UPLOAD_FILE'];
				$UPLOAD_FILE_SIZE = $UPLOAD_FILE["size"];
				$UPLOAD_FILE_ORGNAME = $UPLOAD_FILE["name"];
				$EXT = array_pop(explode('.', $UPLOAD_FILE_ORGNAME));
				$UPLOAD_FILE_SAVENAME = md5($md_day.$UPLOAD_FILE_ORGNAME).".".$EXT;
				$UP_FILE = $uploads_dir.$UPLOAD_FILE_SAVENAME;
				
				if (!is_dir($uploads_dir)) { 
					mkdir($uploads_dir,0777); 
				}

				if($UPLOAD_FILE_CNT > 0){
					if(!is_uploaded_file($UPLOAD_FILE['tmp_name'])) { 
						echo "<script>alert('첨부파일이 문제가 있습니다.');history.go(-1);</script>";
						exit;
					}else{
						if (move_uploaded_file($UPLOAD_FILE['tmp_name'], $UP_FILE)) {
							$sql_up ="INSERT INTO UP_FILE (UP_TABLE_IDX, UP_TABLE_TYPE, UP_FILE_ORGNAME, UP_FILE_SAVENAME, UP_REG_DATE)VALUES('".$row_select['PST_IDX']."','partner','".$UPLOAD_FILE_ORGNAME."','".$UPLOAD_FILE_SAVENAME."','".$date."')";
							$result_up = mysqli_query($conn,$sql_up);
						}else{
							echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
						}
					}
				}
		}

		if($result){
			echo "<script>alert('정상적으로 등록 되었습니다.');location.href='../partner.php';</script>";
		}else{
			echo "<script>alert('정상적으로 등록 되지 않았습니다.');history.go(-1);</script>";
		}
	
	break;

	case "MYIMG_UPDATE"  : // MY 썸네일 수정
		
		$MET_IDX=$_POST['MET_IMG'];
		$MET_IMG_SAVENAME="";

		session_start();

		if($_FILES['MET_IMG']['size'] <= 0 ){

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
						$sql ="UPDATE MEM_TB SET MET_IMG_SAVE='".$MET_IMG_SAVENAME."', MET_IMG_ORG='".$MET_IMG_ORGNAME."' WHERE MET_IDX='".$_SESSION['LOGIN_IDX']."'";
						$result = mysqli_query($conn,$sql);
					}else{
						echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
					}
				}
			}
		}

		if($result){
			$_SESSION['LOGIN_IMG'] = $MET_IMG_SAVENAME;
			echo "success";
		}else{
			echo $sql;
		}
	break;

	case "MDELETE"  : // 회원탈퇴
		$MET_IDX = $_GET['MET_IDX'];

		$sql ="UPDATE MEM_TB SET MET_DELETE_DATE='".$date."' WHERE MET_IDX='".$MET_IDX."' ";
		$result = mysqli_query($conn,$sql);

		session_start();
		session_destroy();

		if($result){
			echo "<script>alert('정상적으로 탈퇴 처리 되었습니다.');location.href='../index.php';</script>";
		}else{
			echo "<script>alert('정상적으로 탈퇴 처리 되지 않았습니다.');history.go(-1);</script>";
		}
	
	break;

	case "NAVER_LEASING"  : // 네이버 연동 해제
		$MET_IDX = $_GET['MET_IDX'];

		$sql ="UPDATE MEM_TB SET MET_NAVER=null WHERE MET_IDX='".$MET_IDX."' ";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('정상적으로 처리 되었습니다.');location.href='../myAccount.php';</script>";
		}else{
			echo "<script>alert('정상적으로 처리 되지 않았습니다.');history.go(-1);</script>";
		}
	
	break;

	case "CP_APP_MODIFY"  : // 체험단 신청
		session_start();
		$CAT_IDX = $_POST['CAT_IDX'];
		$MET_IDX = $_SESSION['LOGIN_IDX'];
		$CPT_IDX = $_POST['CPT_IDX'];
		$CAT_ZIP = $_POST['CAT_ZIP'];
		$CAT_PARTICI = $_POST['CAT_PARTICI'];
		$CAT_CAMERA = $_POST['CAT_CAMERA'];
		$CAT_CAMERA_ETC = $_POST['CAT_CAMERA_ETC'];
		$CAT_NAME = addslashes($_POST['CAT_NAME']);
		$CAT_TEL = addslashes($_POST['CAT_TEL']);
		$CAT_ADDR1 = addslashes($_POST['CAT_ADDR1']);
		$CAT_ADDR2 = addslashes($_POST['CAT_ADDR2']);
		$CAT_CHANNEL = $_POST['CAT_CHANNEL'];
		$CAT_URL = addslashes($_POST['CAT_URL']);
		$CAT_COMMENT = addslashes($_POST['CAT_COMMENT']);

		$CAT_BANK_NAME = addslashes($_POST['CAT_BANK_NAME']);
		$CAT_BANK_NUMBER = addslashes($_POST['CAT_BANK_NUMBER']);
		$CAT_BANK_USER = addslashes($_POST['CAT_BANK_USER']);
		

		$sql ="UPDATE CAMPAIGN_APP_TB SET CAT_NAME='".$CAT_NAME."',CAT_TEL='".$CAT_TEL."',CAT_PARTICI='".$CAT_PARTICI."',CAT_CAMERA='".$CAT_CAMERA."',CAT_CHANNEL='".$CAT_CHANNEL."',CAT_URL='".$CAT_URL."',CAT_COMMENT='".$CAT_COMMENT."',CAT_ZIP='".$CAT_ZIP."',CAT_ADDR1='".$CAT_ADDR1."',CAT_ADDR2='".$CAT_ADDR2."',CAT_CAMERA_ETC='".$CAT_CAMERA_ETC."',CAT_BANK_NAME='".$CAT_BANK_NAME."',CAT_BANK_NUMBER='".$CAT_BANK_NUMBER."',CAT_BANK_USER='".$CAT_BANK_USER."',CAT_SELECTION='".$CAT_SELECTION."' WHERE CAT_IDX='".$CAT_IDX."' ";
		$result = mysqli_query($conn,$sql);

		if($result){

			echo "<script>alert('정상적으로 변경 되었습니다.'); location.href='../view.php?mode=CP_VIEW&CPT_IDX=".$CPT_IDX."&type=".$type."&search=".$search."&cate1=".$cate1."&cate2=".$cate2."&cate3=".$cate3."&sort=".$sort."&pageNo=".$pageNo."';</script>";
		}else{
			//echo $sql;
			echo "<script>alert('정상적으로 신청 되지 않았습니다.');history.go(-1);</script>";
		}
		
	break;
	
	default    : break;
}
?>

