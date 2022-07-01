<?
header("Content-Type:text/html;charset=utf-8");

include_once "dbconfig.php";

if(isset($_GET['mode'])){		$mode = $_GET['mode'];		}else if(isset($_POST['mode'])){		$mode = $_POST['mode'];		}else if(isset($mode)){		$mode = $mode;		}

if(isset($_GET['search'])){		$search = $_GET['search'];		}else if(isset($_POST['search'])){		$search = $_POST['search'];		}else if(isset($search)){		$search = $search;		}

if(isset($_GET['type'])){		$type = $_GET['type'];		}else if(isset($_POST['type'])){		$type = $_POST['type'];		}else if(isset($type)){		$type = $type;		}

if(isset($_GET['cate'])){		$cate = $_GET['cate'];		}else if(isset($_POST['cate'])){		$cate = $_POST['cate'];		}else if(isset($cate)){		$cate = $cate;		}

if(isset($_GET['pageNo'])){		$pageNo = $_GET['pageNo'];		}else{		$pageNo = 1;		}

$list_num = 10;
$page_num = 10;
$offset = $list_num*($pageNo-1);
$paging = "pageNo=".$pageNo;


$date = date("Y-m-d");
$dateTime = date("Y-m-d H:i:s");
$uploads_dir = '../../uploads/';
$md_day = date("YmdHis");
session_start();

switch ($mode) {
	case "LOGIN"  : //로그인
		$LOGIN_ID = $_POST['LOGIN_ID'];
		$LOGIN_PW = $_POST['LOGIN_PW'];

		$sql = "SELECT * FROM MEM_TB WHERE MET_ID='".$LOGIN_ID."' AND MET_PW='".$LOGIN_PW."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet
        $LOGIN_IP=$_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
        $LOGIN_IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $LOGIN_IP=$_SERVER['REMOTE_ADDR'];
    }


		if($cnt > 0 && $LOGIN_ID == 'admin'){
			$row = mysqli_fetch_array($result);
				$_SESSION['LOGIN_ID'] = "admin";
				$_SESSION['LOGIN_NAME'] = "관리자";
				$_SESSION['LOGIN_IDX'] = $row['MET_IDX'];
				$_SESSION['LOGIN_NIC'] = "관리자";
				$_SESSION['LOGIN_IMG'] = $row['MET_IMG_SAVE'];
				$_SESSION["LOGIN_TIME"] = $dateTime;
				$_SESSION["LOGIN_IP"] = $LOGIN_IP;

				$sql = "UPDATE MEM_TB SET MET_LASTLOGIN_DATE='".$dateTime."', MET_LOGIN_IP='".$LOGIN_IP."' WHERE MET_IDX='".$row['MET_IDX']."' ";
				$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

				echo "<script>location.href='../campaign/campaign_list.php';</script>";
		}else{
			//echo $sql;
			echo "<script>alert('아이디 또는 패스워드를 확인해보세요.');history.go(-1);</script>";
		}

	break;

	case "LOGOUT"  : //로그아웃
		session_start();
		session_destroy();
		echo "<script>location.href='../index.php';</script>";
	break;


	case "MLIST"  : // MEM LIST
		$where=" MET_DELETE_DATE IS NULL ";

		if($search){
			$where .= " AND (MET_ID LIKE '%".$search."%' OR MET_NAME LIKE '%".$search."%' OR MET_NIC LIKE '%".$search."%' OR MET_TEL LIKE '%".$search."%' OR MET_EMAIL LIKE '%".$search."%' OR MET_ADDR1 LIKE '%".$search."%' OR MET_ADDR2 LIKE '%".$search."%')";
		}
		if($type){
			$where .= " AND MET_BLACK='y' ";
		}

		$query="SELECT count(*) FROM MEM_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 .

		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다.
		//전체 페이지 수와 현재 글 번호를 구합니다.
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다.
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호

		$sql = "SELECT * FROM MEM_TB WHERE ".$where." ORDER BY MET_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
	break;

	case "MMODIFY"  : // MEM MODIFY
		$MET_IDX = $_GET['MET_IDX'];

		$where=" MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ";

		$sql = "SELECT * FROM MEM_TB WHERE ".$where." ORDER BY MET_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);

		$row = mysqli_fetch_array($result);

		$MET_ID = stripslashes($row['MET_ID']);
		$MET_PW = stripslashes($row['MET_PW']);
		$MET_NAME = stripslashes($row['MET_NAME']);
		$MET_NIC = stripslashes($row['MET_NIC']);
		$MET_TEL = stripslashes($row['MET_TEL']);
		$MET_TEL_CK = stripslashes($row['MET_TEL_CK']);
		$MET_EMAIL = stripslashes($row['MET_EMAIL']);
		$MET_BIRTH = stripslashes($row['MET_BIRTH']);
		$MET_GENDER = stripslashes($row['MET_GENDER']);
		$MET_ZIP = stripslashes($row['MET_ZIP']);
		$MET_ADDR1 = stripslashes($row['MET_ADDR1']);
		$MET_ADDR2 = stripslashes($row['MET_ADDR2']);
		$MET_FACEBOOK = stripslashes($row['MET_FACEBOOK']);
		$MET_INSTAGRAM = stripslashes($row['MET_INSTAGRAM']);
		$MET_BLOG = stripslashes($row['MET_BLOG']);
		$MET_ETC_URL = stripslashes($row['MET_ETC_URL']);
		$MET_YOUTUBE = stripslashes($row['MET_YOUTUBE']);

		$MET_POSTING = $row['MET_POSTING'];
		$MET_POSTING = explode('|', $MET_POSTING);
		$MET_AREA = $row['MET_AREA'];
		$MET_AREA = explode('|', $MET_AREA);

		$MET_ROUTE = stripslashes($row['MET_ROUTE']);
		$MET_KAKAO = stripslashes($row['MET_KAKAO']);
		$MET_NAVER = stripslashes($row['MET_NAVER']);
		$MET_GOOGLE = stripslashes($row['MET_GOOGLE']);
		$MET_IMG_SAVE = stripslashes($row['MET_IMG_SAVE']);
		$MET_IMG_ORG = stripslashes($row['MET_IMG_ORG']);
		$MET_POINT = stripslashes($row['MET_POINT']);
		$MET_MSG = stripslashes($row['MET_MSG']);
		$MET_ETC = stripslashes($row['MET_ETC']);

	break;

	case "MEMODIFY"  : // MEM ETC
		$MET_IDX = $_GET['MET_IDX'];

		$where=" MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ";

		$sql = "SELECT * FROM MEM_TB WHERE ".$where." ORDER BY MET_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);

		$row = mysqli_fetch_array($result);

		$MET_ID = stripslashes($row['MET_ID']);
		$MET_NAME = stripslashes($row['MET_NAME']);
		$MET_NIC = stripslashes($row['MET_NIC']);
		$MET_ADDR1 = stripslashes($row['MET_ADDR1']);
		$MET_ADDR2 = stripslashes($row['MET_ADDR2']);
		$MET_INSTAGRAM = stripslashes($row['MET_INSTAGRAM']);
		$MET_BLOG = stripslashes($row['MET_BLOG']);
		$MET_YOUTUBE = stripslashes($row['MET_YOUTUBE']);

		$MET_POSTING = $row['MET_POSTING'];
		$MET_POSTING = explode('|', $MET_POSTING);
		$MET_AREA = $row['MET_AREA'];
		$MET_AREA = explode('|', $MET_AREA);
		$MET_ETC = stripslashes($row['MET_ETC']);

	break;

	case "POINT_MANAGE"  : // 포인트 관리
		$sarch_input=$_GET['sarch_input'];
		if($sarch_input){
			$where=" MET_DELETE_DATE IS NULL AND (MET_ID LIKE '%".$sarch_input."%' OR MET_NAME LIKE '%".$sarch_input."%' OR MET_NIC LIKE '%".$sarch_input."%' OR MET_TEL LIKE '%".$sarch_input."%' OR MET_EMAIL LIKE '%".$sarch_input."%' OR MET_ADDR1 LIKE '%".$sarch_input."%' OR MET_ADDR2 LIKE '%".$sarch_input."%') ";

			$sql = "SELECT * FROM MEM_TB WHERE ".$where." ORDER BY MET_IDX DESC";
			$result = mysqli_query($conn,$sql);
			$cnt = mysqli_num_rows($result);
		}

	break;

	case "RLIST"  : // 환급신청
		$where=" RFT_DELETE_DATE IS NULL ";

		if($search){
			$where .= " AND (RFT_NAME LIKE '%".$search."%' OR RFT_BANK LIKE '%".$search."%' OR RFT_NUMBER LIKE '%".$search."%')";
		}

		$query="SELECT count(*) FROM REFUND_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 .

		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다.
		//전체 페이지 수와 현재 글 번호를 구합니다.
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다.
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호

		$sql = "SELECT * FROM REFUND_TB WHERE ".$where." ORDER BY RFT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
	break;

	case "RVIEW"  : // 환급신청 상세보기
		$RFT_IDX = $_GET['RFT_IDX'];

		$where=" RFT_DELETE_DATE IS NULL AND RFT_IDX='".$RFT_IDX."' ";

		$sql = "SELECT * FROM REFUND_TB WHERE ".$where." ORDER BY RFT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);

		$row = mysqli_fetch_array($result);

		$RFT_NAME = stripslashes($row['RFT_NAME']);
		$RFT_BANK = stripslashes($row['RFT_BANK']);
		$RFT_NUMBER = stripslashes($row['RFT_NUMBER']);
		$RFT_POINT = stripslashes($row['RFT_POINT']);
		$RFT_TEL = stripslashes($row['RFT_TEL']);



	break;

	case "RMODIFY"  : // 환급신청 수정
		$RFT_IDX = $_GET['RFT_IDX'];

		$where=" RFT_DELETE_DATE IS NULL AND RFT_IDX='".$RFT_IDX."' ";

		$sql = "SELECT * FROM REFUND_TB WHERE ".$where." ORDER BY RFT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);

		$row = mysqli_fetch_array($result);

		$RFT_NAME = stripslashes($row['RFT_NAME']);
		$RFT_BANK = stripslashes($row['RFT_BANK']);
		$RFT_NUMBER = stripslashes($row['RFT_NUMBER']);
		$RFT_POINT = stripslashes($row['RFT_POINT']);
		$RFT_TEL = stripslashes($row['RFT_TEL']);

		$RFT_DATE = stripslashes($row['RFT_DATE']);
		$RFT_POINT = stripslashes($row['RFT_POINT']);
		$RFT_APP = stripslashes($row['RFT_APP']);


	break;

	case "CPLIST"  : // CAMPAIGN LIST
		$where=" CPT_DELETE_DATE IS NULL ";

		if($search){
			$where .= " AND (CPT_TITLE LIKE '%".$search."%' OR CPT_SUB_TITLE LIKE '%".$search."%' OR CPT_REQ_CONTENT LIKE '%".$search."%' OR CPT_CONTENT LIKE '%".$search."%' OR CPT_NOTICE LIKE '%".$search."%' OR CPT_AREA LIKE '%".$search."%' OR CPT_ADDR1 LIKE '%".$search."%' OR CPT_ADDR2 LIKE '%".$search."%' OR CPT_CATE1 LIKE '%".$search."%' OR CPT_CATE2 LIKE '%".$search."%' OR CPT_CATE3 LIKE '%".$search."%' OR CPT_OFFER LIKE '%".$search."%' OR CPT_KEYWORD LIKE '%".$search."%')";
		}

		if($cate){
			if($cate=='캠페인 신청대기'){
				$where .=" AND CPT_APP_START_DATE > '".$date."' ";
			}else if($cate=='캠페인 신청기간'){
				$where .=" AND CPT_APP_START_DATE <= '".$date."' AND CPT_APP_END_DATE >= '".$date."' ";
			}else if($cate=='인플언서 선정'){
				$where .=" AND CPT_ANNO_DATE = '".$date."' ";
			}else if($cate=='콘텐츠 등록기간'){
				$where .=" AND CPT_REVIEW_START_DATE <= '".$date."' AND CPT_REVIEW_END_DATE >= '".$date."' ";
			}else if($cate=='캠페인 결과발표'){
				$where .=" AND CPT_REVIEW_END_DATE <= '".$date."' AND CPT_END_DATE > '".$date."' ";
			}else if($cate=='캠페인 종료'){
				$where .=" AND CPT_REVIEW_END_DATE < '".$date."' ";
			}else if($cate=='비활성화'){
				$where .=" AND CPT_VIEW = 'N' ";
			}
		}

		$query="SELECT count(*) FROM CAMPAIGN_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 .

		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다.
		//전체 페이지 수와 현재 글 번호를 구합니다.
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다.
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호

		$sql = "SELECT * FROM CAMPAIGN_TB WHERE ".$where." ORDER BY CPT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
	break;

	case "CPMODIFY"  : // CAMPAIGN MODIFY
		$CPT_IDX = $_GET['CPT_IDX'];

		$where=" CPT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ";

		$sql = "SELECT * FROM CAMPAIGN_TB WHERE ".$where." ORDER BY CPT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);

		$row = mysqli_fetch_array($result);

		$CPT_TITLE = stripslashes($row['CPT_TITLE']);
		$CPT_VIEW = stripslashes($row['CPT_VIEW']);
		$CPT_TEL = stripslashes($row['CPT_TEL']);
		$CPT_NAME = stripslashes($row['CPT_NAME']);
		$CPT_SUB_TITLE = stripslashes($row['CPT_SUB_TITLE']);
		$CPT_REQ_CONTENT = stripslashes($row['CPT_REQ_CONTENT']);
		$CPT_CONTENT = stripslashes($row['CPT_CONTENT']);
		$CPT_NOTICE = stripslashes($row['CPT_NOTICE']);
		$CPT_AREA = $row['CPT_AREA'];
		$CPT_AREA = explode('|', $CPT_AREA);
		$CPT_ADDR1 = stripslashes($row['CPT_ADDR1']);
		$CPT_ADDR2 = stripslashes($row['CPT_ADDR2']);
		$CPT_CATE1 = stripslashes($row['CPT_CATE1']);
		$CPT_CATE2 = stripslashes($row['CPT_CATE2']);
		$CPT_CATE2_1 = stripslashes($row['CPT_CATE2_1']);
		$CPT_CATE3 = stripslashes($row['CPT_CATE3']);
		$CPT_OLD_CONTENT = stripslashes($row['CPT_OLD_CONTENT']);
		$CPT_OFFER = stripslashes($row['CPT_OFFER']);
		$CPT_KEYWORD = stripslashes($row['CPT_KEYWORD']);
		$CPT_KEYWORD_ETC = stripslashes($row['CPT_KEYWORD_ETC']);
		$CPT_MISSION = stripslashes($row['CPT_MISSION']);
		$CPT_RECRUITS = stripslashes($row['CPT_RECRUITS']);
		$CPT_APP_START_DATE = stripslashes($row['CPT_APP_START_DATE']);

		$CPT_APP_END_DATE = stripslashes($row['CPT_APP_END_DATE']);
		$CPT_ANNO_DATE = stripslashes($row['CPT_ANNO_DATE']);
		$CPT_REVIEW_START_DATE = stripslashes($row['CPT_REVIEW_START_DATE']);
		$CPT_REVIEW_END_DATE = stripslashes($row['CPT_REVIEW_END_DATE']);
		$CPT_END_DATE = stripslashes($row['CPT_END_DATE']);
		$CPT_APP_POINT = stripslashes($row['CPT_APP_POINT']);
		$CPT_ANNO_POINT = stripslashes($row['CPT_ANNO_POINT']);
		$CPT_PLUS_POINT = stripslashes($row['CPT_PLUS_POINT']);
		$CPT_VIEW_DATE = stripslashes($row['CPT_VIEW_DATE']);
		$CPT_IMG_SAVE = stripslashes($row['CPT_IMG_SAVE']);
		$CPT_IMG_ORG = stripslashes($row['CPT_IMG_ORG']);
		$CPT_IMG1_SAVE = stripslashes($row['CPT_IMG1_SAVE']);
		$CPT_IMG1_ORG = stripslashes($row['CPT_IMG1_ORG']);
		$CPT_REG_DATE = stripslashes($row['CPT_REG_DATE']);

		$CPT_ETC = stripslashes($row['CPT_ETC']);

		$sql_cot = "SELECT * FROM CAMPAIGN_OPTION_TB WHERE COT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ORDER BY COT_IDX ASC";
		$result_cot = mysqli_query($conn,$sql_cot);
		$cnt_cot = mysqli_num_rows($result_cot);

		$sql_ckt = "SELECT * FROM CAMPAIGN_KEYWORD_TB WHERE CKT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ORDER BY CKT_IDX ASC";
		$result_ckt = mysqli_query($conn,$sql_ckt);
		$cnt_ckt = mysqli_num_rows($result_ckt);

	break;

	case "CPLIST"  : // CAMPAIGN LIST
		$where=" CPT_DELETE_DATE IS NULL ";

		if($search){
			$where .= " AND (CPT_TITLE LIKE '%".$search."%' OR CPT_SUB_TITLE LIKE '%".$search."%' OR CPT_REQ_CONTENT LIKE '%".$search."%' OR CPT_CONTENT LIKE '%".$search."%' OR CPT_NOTICE LIKE '%".$search."%' OR CPT_AREA LIKE '%".$search."%' OR CPT_ADDR1 LIKE '%".$search."%' OR CPT_ADDR2 LIKE '%".$search."%' OR CPT_CATE1 LIKE '%".$search."%' OR CPT_CATE2 LIKE '%".$search."%' OR CPT_CATE3 LIKE '%".$search."%' OR CPT_OFFER LIKE '%".$search."%' OR CPT_KEYWORD LIKE '%".$search."%')";
		}

		$query="SELECT count(*) FROM CAMPAIGN_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 .

		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다.
		//전체 페이지 수와 현재 글 번호를 구합니다.
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다.
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호

		$sql = "SELECT * FROM CAMPAIGN_TB WHERE ".$where." ORDER BY CPT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
	break;

	case "CPVIEW"  : // CAMPAIGN VIEW
		$CPT_IDX = $_GET['CPT_IDX'];
		$where=" CAT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ";

		if($_GET['search_detail']){
			$where .= " AND (CAT_NAME LIKE '%".$_GET['search_detail']."%' OR CAT_TEL LIKE '%".$_GET['search_detail']."%')";
		}

		$sql = "SELECT * FROM CAMPAIGN_APP_TB WHERE ".$where." ORDER BY CAT_BLOG_URL DESC, CAT_SELECTION ='y' DESC,  CPT_IDX ASC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
		$i=0;

	break;

	case "NLIST"  : // NOTICE LIST
		$where=" NOT_DELETE_DATE IS NULL ";

		if($search){
			$where .= " AND (NOT_TITLE LIKE '%".$search."%' OR NOT_CONTENT LIKE '%".$search."%')";
		}

		$query="SELECT count(*) FROM NOTICE_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 .

		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다.
		//전체 페이지 수와 현재 글 번호를 구합니다.
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다.
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호

		$sql = "SELECT * FROM NOTICE_TB WHERE ".$where." ORDER BY NOT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
	break;

	case "NVIEW"  : // NOTICE VIEW
		$NOT_IDX = $_GET['NOT_IDX'];

		$where=" NOT_DELETE_DATE IS NULL AND NOT_IDX='".$NOT_IDX."' ";
		$sql = "SELECT * FROM NOTICE_TB WHERE ".$where." ORDER BY NOT_IDX DESC";
		$result = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($result);

		$NOT_TITLE = stripslashes($row['NOT_TITLE']);
		$NOT_CATE = stripslashes($row['NOT_CATE']);
		$NOT_START_DATE = stripslashes($row['NOT_START_DATE']);
		$NOT_END_DATE = stripslashes($row['NOT_END_DATE']);
		$NOT_CONTENT = stripslashes($row['NOT_CONTENT']);
		$NOT_IMG_SAVE = stripslashes($row['NOT_IMG_SAVE']);
		$NOT_IMG_ORG = stripslashes($row['NOT_IMG_ORG']);

		$sql_up = "SELECT * FROM UP_FILE WHERE UP_TABLE_IDX = '".$NOT_IDX."' AND UP_TABLE_TYPE='notice' AND UP_DELETE_DATE IS NULL ORDER BY UP_IDX DESC";
		$result_up = mysqli_query($conn,$sql_up);
		$count_up = mysqli_num_rows($result_up);

	break;

	case "NMODIFY"  : // NOTICE MODIFY
		$NOT_IDX = $_GET['NOT_IDX'];

		$where=" NOT_DELETE_DATE IS NULL AND NOT_IDX='".$NOT_IDX."' ";
		$sql = "SELECT * FROM NOTICE_TB WHERE ".$where." ORDER BY NOT_IDX DESC";
		$result = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($result);

		$NOT_TITLE = stripslashes($row['NOT_TITLE']);
		$NOT_CATE = stripslashes($row['NOT_CATE']);
		$NOT_START_DATE = stripslashes($row['NOT_START_DATE']);
		$NOT_END_DATE = stripslashes($row['NOT_END_DATE']);
		$NOT_CONTENT = stripslashes($row['NOT_CONTENT']);
		$NOT_IMG_SAVE = stripslashes($row['NOT_IMG_SAVE']);
		$NOT_IMG_ORG = stripslashes($row['NOT_IMG_ORG']);

		$sql_up = "SELECT * FROM UP_FILE WHERE UP_TABLE_IDX = '".$NOT_IDX."' AND UP_TABLE_TYPE='notice' AND UP_DELETE_DATE IS NULL ORDER BY UP_IDX DESC";
		$result_up = mysqli_query($conn,$sql_up);
		$count_up = mysqli_num_rows($result_up);

	break;

	case "FLIST"  : // FAQ LIST
		$where=" FAT_DELETE_DATE IS NULL ";

		if($search){
			$where .= " AND (FAT_QUESTION LIKE '%".$search."%' OR FAT_ANSWER LIKE '%".$search."%')";
		}

		$query="SELECT count(*) FROM FAQ_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 .

		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다.
		//전체 페이지 수와 현재 글 번호를 구합니다.
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다.
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호

		$sql = "SELECT * FROM FAQ_TB WHERE ".$where." ORDER BY FAT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
	break;

	case "FMODIFY"  : // FAQ MODIFY
		$FAT_IDX = $_GET['FAT_IDX'];

		$where=" FAT_DELETE_DATE IS NULL AND FAT_IDX='".$FAT_IDX."' ";
		$sql = "SELECT * FROM FAQ_TB WHERE ".$where." ORDER BY FAT_IDX DESC";
		$result = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($result);

		$FAT_QUESTION = $row['FAT_QUESTION'];
		$FAT_ANSWER = $row['FAT_ANSWER'];

	break;

	case "QLIST"  : // QNA LIST
		$where=" QNT_DELETE_DATE IS NULL ";

		if($search){
			$where .= " AND (QNT_CATE1 LIKE '%".$search."%' OR QNT_CATE2 LIKE '%".$search."%' OR QNT_TITLE LIKE '%".$search."%' OR QNT_CONTENT LIKE '%".$search."%')";
		}

		$query="SELECT count(*) FROM QNA_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 .

		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다.
		//전체 페이지 수와 현재 글 번호를 구합니다.
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다.
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호

		$sql = "SELECT * FROM QNA_TB WHERE ".$where." ORDER BY QNT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
	break;

	case "QVIEW"  : // QNA VIEW
		$QNT_IDX = $_GET['QNT_IDX'];

		$where=" QNT_DELETE_DATE IS NULL AND QNT_IDX='".$QNT_IDX."' ";
		$sql = "SELECT * FROM QNA_TB WHERE ".$where." ORDER BY QNT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);

		$QNT_TITLE = stripslashes($row['QNT_TITLE']);
		$QNT_CONTENT = stripslashes($row['QNT_CONTENT']);
		$QNT_CATE1 = stripslashes($row['QNT_CATE1']);
		$QNT_CATE2 = stripslashes($row['QNT_CATE2']);

		$where_ans=" QAT_DELETE_DATE IS NULL AND QNT_IDX='".$QNT_IDX."' ";
		$sql_ans = "SELECT * FROM QNA_ANSWER_TB WHERE ".$where_ans." ORDER BY QAT_IDX DESC";
		$result_ans = mysqli_query($conn,$sql_ans);
		$row_ans = mysqli_fetch_array($result_ans);

		$QAT_IDX = $row_ans['QAT_IDX'];
		$QAT_CONTENT = stripslashes($row_ans['QAT_CONTENT']);

		$where_mem=" MET_DELETE_DATE IS NULL AND MET_IDX='".$row['MET_IDX']."' ";
		$sql_mem = "SELECT * FROM MEM_TB WHERE ".$where_mem." ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		$MET_ID = stripslashes($row_mem['MET_ID']);
		$MET_NIC = stripslashes($row_mem['MET_NIC']);
		$MET_NAME = stripslashes($row_mem['MET_NAME']);
		$MET_TEL = stripslashes($row_mem['MET_TEL']);
		$MET_EMAIL = stripslashes($row_mem['MET_EMAIL']);
		$MET_ZIP = stripslashes($row_mem['MET_ZIP']);
		$MET_ADDR1 = stripslashes($row_mem['MET_ADDR1']);
		$MET_ADDR2 = stripslashes($row_mem['MET_ADDR2']);

	break;

	case "PLIST"  : // PARTNERSHIP LIST
		$where=" PST_DELETE_DATE IS NULL ";

		if($search){
			$where .= " AND (PST_CATE1 LIKE '%".$search."%' OR PST_CATE2 LIKE '%".$search."%' OR PST_NAME LIKE '%".$search."%' OR PST_COMPANY LIKE '%".$search."%' OR PST_TEL LIKE '%".$search."%' OR PST_EMAIL LIKE '%".$search."%' OR PST_TITLE LIKE '%".$search."%' OR PST_CONTENT LIKE '%".$search."%')";
		}

		$query="SELECT count(*) FROM PARTNERSHIP_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 .

		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다.
		//전체 페이지 수와 현재 글 번호를 구합니다.
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다.
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호

		$sql = "SELECT * FROM PARTNERSHIP_TB WHERE ".$where." ORDER BY PST_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
	break;

	case "PVIEW"  : // PARTNERSHIP VIEW
		$PST_IDX = $_GET['PST_IDX'];

		$where=" PST_DELETE_DATE IS NULL AND PST_IDX='".$PST_IDX."' ";
		$sql = "SELECT * FROM PARTNERSHIP_TB WHERE ".$where." ORDER BY PST_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);

		$PST_CATE1 = stripslashes($row['PST_CATE1']);
		$PST_CATE2 = stripslashes($row['PST_CATE2']);
		$PST_NAME = stripslashes($row['PST_NAME']);
		$PST_COMPANY = stripslashes($row['PST_COMPANY']);
		$PST_TEL = stripslashes($row['PST_TEL']);
		$PST_EMAIL = stripslashes($row['PST_EMAIL']);
		$PST_TITLE = stripslashes($row['PST_TITLE']);
		$PST_CONTENT = stripslashes($row['PST_CONTENT']);

		$sql_up = "SELECT * FROM UP_FILE WHERE UP_TABLE_IDX = '".$PST_IDX."' AND UP_TABLE_TYPE='partner' AND UP_DELETE_DATE IS NULL ORDER BY UP_IDX DESC";
		$result_up = mysqli_query($conn,$sql_up);
		$count_up = mysqli_num_rows($result_up);


	break;

	case "MVLIST"  : // MAIN LIST
		$where=" MVT_DELETE_DATE IS NULL ";

		if($search){
			$where .= " AND (MVT_TITLE LIKE '%".$search."%' OR MVT_SUB_TITLE LIKE '%".$search."%')";
		}

		$query="SELECT count(*) FROM MAIN_VISUAL_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 .

		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다.
		//전체 페이지 수와 현재 글 번호를 구합니다.
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다.
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호

		$sql = "SELECT * FROM MAIN_VISUAL_TB WHERE ".$where." ORDER BY MVT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
	break;

	case "MVMODIFY"  : // MAIN MODIFY
		$MVT_IDX = $_GET['MVT_IDX'];

		$where=" MVT_DELETE_DATE IS NULL AND MVT_IDX='".$MVT_IDX."' ";
		$sql = "SELECT * FROM MAIN_VISUAL_TB WHERE ".$where." ORDER BY MVT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);

		$MVT_TITLE = stripslashes($row['MVT_TITLE']);
		$MVT_SUB_TITLE = stripslashes($row['MVT_SUB_TITLE']);
		$MVT_URL = stripslashes($row['MVT_URL']);
		$MVT_IMG_SAVE = stripslashes($row['MVT_IMG_SAVE']);
		$MVT_IMG_ORG = stripslashes($row['MVT_IMG_ORG']);

	break;

	case "USER_LOGIN"  : //유저로그임
		$MET_IDX = stripslashes($_GET['MET_IDX']);

		$sql = "SELECT * FROM MEM_TB WHERE MET_IDX='".$MET_IDX."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);

		$_SESSION['LOGIN_ID'] = $row['MET_ID'];
		$_SESSION['LOGIN_NAME'] = $row['MET_NAME'];
		$_SESSION['LOGIN_IDX'] = $row['MET_IDX'];
		$_SESSION['LOGIN_NIC'] = $row['MET_NIC'];
		$_SESSION['LOGIN_IMG'] = $row['MET_IMG_SAVE'];

		echo "<script>location.href='../../index.php';</script>";

	break;

	case "VSMCNT"  : // 회원 통계(월방문자)

		$sql_recent = "SELECT DATE(`VST_DATE`) AS `date`, sum(1) FROM VISIT_TB GROUP BY `date` ORDER BY VST_DATE DESC LIMIT 10; ";
		$result_recent = mysqli_query($conn,$sql_recent);
		$recent_date = "";
		$recent_visit = "";
		$i=0;
		while($row_recent = mysqli_fetch_array($result_recent)){
			if($i==0){
				$recent_date .= $row_recent["date"];
				$recent_visit .= $row_recent["sum(1)"];
			}else{
				$recent_date .= ",".$row_recent["date"];
				$recent_visit .= ",".$row_recent["sum(1)"];
			}
			$i++;
		}

		$sql_join = "SELECT DATE(`MET_REG_DATE`) AS `date`, sum(1) FROM MEM_TB WHERE MET_DELETE_DATE IS NULL GROUP BY `date` ORDER BY MET_REG_DATE DESC LIMIT 10;";
		$result_join = mysqli_query($conn,$sql_join);
		$join_date = "";
		$join_cnt = "";
		$i=0;
		while($row_join = mysqli_fetch_array($result_join)){
			if($i==0){
				$join_date .= $row_join["date"];
				$join_cnt .= $row_join["sum(1)"];
			}else{
				$join_date .= ",".$row_join["date"];
				$join_cnt .= ",".$row_join["sum(1)"];
			}
			$i++;
		}

		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$cnt_mem = mysqli_num_rows($result_mem);

		$sql_visit = "SELECT * FROM VISIT_TB WHERE VST_DELETE_DATE IS NULL ORDER BY VST_IDX DESC";
		$result_visit = mysqli_query($conn,$sql_visit);
		$cnt_visit = mysqli_num_rows($result_visit);

		$sql_cpt = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL ORDER BY CPT_IDX DESC";
		$result_cpt = mysqli_query($conn,$sql_cpt);
		$cnt_cpt = mysqli_num_rows($result_cpt);

		$sql_cpt_A = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_CATE2='지역' ORDER BY CPT_IDX DESC";
		$result_cpt_A = mysqli_query($conn,$sql_cpt_A);
		$cnt_cpt_A = mysqli_num_rows($result_cpt_A);

		$sql_cpt_B = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_CATE2='제품' ORDER BY CPT_IDX DESC";
		$result_cpt_B = mysqli_query($conn,$sql_cpt_B);
		$cnt_cpt_B = mysqli_num_rows($result_cpt_B);

		$sql_cpt_C = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_CATE2='배달' ORDER BY CPT_IDX DESC";
		$result_cpt_C = mysqli_query($conn,$sql_cpt_C);
		$cnt_cpt_C = mysqli_num_rows($result_cpt_C);

		$sql_cpt_D = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_CATE2='기자단' ORDER BY CPT_IDX DESC";
		$result_cpt_D = mysqli_query($conn,$sql_cpt_D);
		$cnt_cpt_D = mysqli_num_rows($result_cpt_D);

		$sql_cat = "SELECT * FROM CAMPAIGN_APP_TB WHERE CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
		$result_cat = mysqli_query($conn,$sql_cat);
		$cnt_cat = mysqli_num_rows($result_cat);

		$sql_area = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
		$result_area = mysqli_query($conn,$sql_area);
		$cnt_area = mysqli_num_rows($result_area);

		$A_A=0; $A_B=0; $A_C=0; $A_D=0; $A_E=0; $A_F=0; $A_G=0; $A_H=0;
		$B_A=0; $B_B=0; $B_C=0; $B_D=0; $B_E=0; $B_F=0;
		$C_A=0; $D_A=0; $E_A=0; $F_A=0; $G_A=0; $H_A=0; $I_A=0; $J_A=0; $K_A=0; $L_A=0;  $M_A=0;

		$area_a = 0; // 서울
		$area_b = 0; // 부산/경남
		$area_c = 0; // 대구/경북
		$area_d = 0; // 대전/충청
		$area_e = 0; // 광주/전라
		$area_f = 0; // 울산
		$area_g = 0; // 인천/부천/부평
		$area_h = 0; // 경기도
		$area_i = 0; // 세종
		$area_j = 0; // 강원
		$area_k = 0; // 제주
		$area_total = 0;

		$P_A=0; $P_B=0; $P_C=0; $P_D=0; $P_E=0; $P_F=0; $P_G=0; $P_H=0; $P_I=0; $P_J=0; $P_K=0; $P_L=0;

		$posting_a=0; // 맛집
		$posting_b=0; // 생활,리빙
		$posting_c=0; // 패션
		$posting_d=0; // 유아
		$posting_e=0; // 뷰티샵,미용
		$posting_f=0; // 도서,교육
		$posting_g=0; // 일상
		$posting_h=0; // 여행,숙박
		$posting_i=0; // 디지털가전
		$posting_j=0;	// 배달,배송
		$posting_k=0; // 화장품
		$posting_l=0; // 기타
		$posting_total=0; // 기타

		while($row_area = mysqli_fetch_array($result_area)){
			if(strpos($row_area['MET_AREA'], "강남/논현/서초") !== false) {
			  $A_A++;
				$area_total++;
				$area_a++;
			}
			if(strpos($row_area['MET_AREA'], "송파/잠실/강동") !== false){
				$A_B++;
				$area_total++;
				$area_a++;
			}
			if(strpos($row_area['MET_AREA'], "압구정/신사/교대/사당/삼성/선릉") !== false){
				$A_C++;
				$area_total++;
				$area_a++;
			}
			if(strpos($row_area['MET_AREA'], "노원/강북/수유/동대문") !== false){
				$A_D++;
				$area_total++;
				$area_a++;
			}
			if(strpos($row_area['MET_AREA'], "종로/대학로/명동/이태원") !== false){
				$A_E++;
				$area_total++;
				$area_a++;
			}
			if(strpos($row_area['MET_AREA'], "홍대/마포/은평/신촌/이대") !== false){
				$A_F++;
				$area_total++;
				$area_a++;
			}
			if(strpos($row_area['MET_AREA'], "관악/신림/동작") !== false){
				$A_G++;
				$area_total++;
				$area_a++;
			}
			if(strpos($row_area['MET_AREA'], "여의도/영등포/강서/목동") !== false){
				$A_H++;
				$area_total++;
				$area_a++;
			}
			if(strpos($row_area['MET_AREA'], "인천/부천/부평") !== false || strpos($row_area['MET_AREA'], "인천") !== false){
				$B_A++;
				$area_total++;
				$area_g++;
			}
			if(strpos($row_area['MET_AREA'], "파주/김포/의정부/남양주") !== false){
				$B_B++;
				$area_total++;
				$area_h++;
			}
			if(strpos($row_area['MET_AREA'], "가평/양평/여주") !== false){
				$B_C++;
				$area_total++;
				$area_h++;
			}
			if(strpos($row_area['MET_AREA'], "하남/광주") !== false){
				$B_D++;
				$area_total++;
				$area_h++;
			}
			if(strpos($row_area['MET_AREA'], "성남/용인/분당/수원") !== false){
				$B_E++;
				$area_total++;
				$area_h++;
			}
			if(strpos($row_area['MET_AREA'], "기타 경기") !== false || strpos($row_area['MET_AREA'], "경기") !== false){
				$B_F++;
				$area_total++;
				$area_h++;
			}
			if(strpos($row_area['MET_AREA'], "대전/충청") !== false){
				$C_A++;
				$area_total++;
				$area_d++;
			}
			if(strpos($row_area['MET_AREA'], "대구/경북") !== false){
				$D_A++;
				$area_total++;
				$area_c++;
			}
			if(strpos($row_area['MET_AREA'], "부산/경남") !== false){
				$E_A++;
				$area_total++;
				$area_b++;
			}
			if(strpos($row_area['MET_AREA'], "광주/전라") !== false){
				$F_A++;
				$area_total++;
				$area_e++;
			}
			if(strpos($row_area['MET_AREA'], "세종") !== false){
				$G_A++;
				$area_total++;
				$area_i++;
			}
			if(strpos($row_area['MET_AREA'], "울산") !== false){
				$H_A++;
				$area_total++;
				$area_f++;
			}
			if(strpos($row_area['MET_AREA'], "강원") !== false){
				$I_A++;
				$area_total++;
				$area_j++;
			}
			if(strpos($row_area['MET_AREA'], "제주") !== false){
				$J_A++;
				$area_total++;
				$area_k++;
			}
			if(strpos($row_area['MET_AREA'], "서울") !== false){
				$K_A++;
				$area_total++;
				$area_a++;
			}

			if(strpos($row_area['MET_POSTING'], "맛집") !== false) {
			  $P_A++;
				$posting_a++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "생활,리빙") !== false){
				$P_B++;
				$posting_b++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "패션") !== false){
				$P_C++;
				$posting_c++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "유아") !== false){
				$P_D++;
				$posting_d++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "뷰티샵,미용") !== false){
				$P_E++;
				$posting_e++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "도서,교육") !== false){
				$P_F++;
				$posting_f++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "일상") !== false){
				$P_G++;
				$posting_g++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "여행,숙박") !== false){
				$P_H++;
				$posting_h++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "디지털가전") !== false){
				$P_I++;
				$posting_i++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "배달,배송") !== false){
				$P_J++;
				$posting_j++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "화장품") !== false){
				$P_K++;
				$posting_k++;
				$posting_total++;
			}
			if(strpos($row_area['MET_POSTING'], "기타") !== false){
				$P_L++;
				$posting_l++;
				$posting_total++;
			}
		}mysqli_data_seek($result_area,0);

		$area_a_p = round($area_a/$area_total*100); // 서울 퍼센트
		$area_b_p = round($area_b/$area_total*100); // 부산/경남
		$area_c_p = round($area_c/$area_total*100); // 대구/경북
		$area_d_p = round($area_d/$area_total*100); // 대전/충청
		$area_e_p = round($area_e/$area_total*100); // 광주/전라
		$area_f_p = round($area_f/$area_total*100); // 울산
		$area_g_p = round($area_g/$area_total*100); // 인천/부천/부평
		$area_h_p = round($area_h/$area_total*100); // 경기도
		$area_i_p = round($area_i/$area_total*100); // 세종
		$area_j_p = round($area_j/$area_total*100); // 강원
		$area_k_p = round($area_k/$area_total*100); // 제주

		$posting_a_p = round($posting_a/$posting_total*100); // 맛집
		$posting_b_p = round($posting_b/$posting_total*100); // 생활,리빙
		$posting_c_p = round($posting_c/$posting_total*100); // 패션
		$posting_d_p = round($posting_d/$posting_total*100); // 유아
		$posting_e_p = round($posting_e/$posting_total*100); // 뷰티샵,미용
		$posting_f_p = round($posting_f/$posting_total*100); // 도서,교육
		$posting_g_p = round($posting_g/$posting_total*100); // 일상
		$posting_h_p = round($posting_h/$posting_total*100); // 여행,숙박
		$posting_i_p = round($posting_i/$posting_total*100); // 디지털가전
		$posting_j_p = round($posting_j/$posting_total*100);	// 배달,배송
		$posting_k_p = round($posting_k/$posting_total*100); // 화장품
		$posting_l_p = round($posting_l/$posting_total*100); // 기타


		$sql_device = "SELECT * FROM VISIT_TB WHERE VST_DELETE_DATE IS NULL ORDER BY VST_IDX DESC";
		$result_device = mysqli_query($conn,$sql_device);
		$cnt_device = mysqli_num_rows($result_device);
		$DEVICE_A=""; $DEVICE_B=""; $DEVICE_C="";
		while($row_device = mysqli_fetch_array($result_device)){
			if(strpos($row_device['VST_AGENT'], "Android") !== false || strpos($row_device['VST_AGENT'], "iPhone") !== false) {
			  $DEVICE_A++;
			}else if(strpos($row_device['VST_AGENT'], "Windows") !== false){
				$DEVICE_B++;
			}else{
				$DEVICE_C++;
			}
		}
		$device_a_p = round($DEVICE_A/$cnt_device*100);
		$device_b_p = round($DEVICE_B/$cnt_device*100);
		$device_c_p = round($DEVICE_C/$cnt_device*100);

	break;


	default    : break;
}
?>
