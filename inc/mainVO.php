<?
header("Content-Type:text/html;charset=utf-8"); 

include_once "dbconfig.php";

if(isset($_GET['mode'])){		$mode = $_GET['mode'];		}else if(isset($_POST['mode'])){		$mode = $_POST['mode'];		}else if(isset($mode)){		$mode = $mode;		}

if(isset($_GET['search'])){		$search = $_GET['search'];		}else if(isset($_POST['search'])){		$search = $_POST['search'];		}else if(isset($search)){		$search = $search;		}

if(isset($_GET['type'])){		$type = $_GET['type'];		}else if(isset($_POST['type'])){		$type = $_POST['type'];		}else if(isset($type)){		$type = $type;		}

if(isset($_GET['cate'])){		$cate = $_GET['cate'];		}else if(isset($_POST['cate'])){		$cate = $_POST['cate'];		}else if(isset($cate)){		$cate = $cate;		}
if(isset($_GET['cate1'])){		$cate1 = $_GET['cate1'];		}else if(isset($_POST['cate1'])){		$cate1 = $_POST['cate1'];		}else if(isset($cate1)){		$cate1 = $cate1;		}
if(isset($_GET['cate2'])){		$cate2 = $_GET['cate2'];		}else if(isset($_POST['cate2'])){		$cate2 = $_POST['cate2'];		}else if(isset($cate2)){		$cate2 = $cate2;		}
if(isset($_GET['cate3'])){		$cate3 = $_GET['cate3'];		}else if(isset($_POST['cate3'])){		$cate3 = $_POST['cate3'];		}else if(isset($cate3)){		$cate3 = $cate3;		}

if(isset($_GET['sort'])){		$sort = $_GET['sort'];		}else if(isset($_POST['sort'])){		$sort = $_POST['sort'];		}else if(isset($sort)){		$sort = $sort;		}

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

		$sql = "SELECT * FROM MEM_TB WHERE (MET_ID='".$LOGIN_ID."' OR MET_EMAIL='".$LOGIN_ID."') AND MET_PW='".$LOGIN_PW."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet  
        $LOGIN_IP=$_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy  
        $LOGIN_IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $LOGIN_IP=$_SERVER['REMOTE_ADDR'];
    }


		if($cnt > 0){
			$row = mysqli_fetch_array($result);
				$_SESSION['LOGIN_ID'] = $row['MET_ID'];
				$_SESSION['LOGIN_NAME'] = $row['MET_NAME'];
				$_SESSION['LOGIN_IDX'] = $row['MET_IDX'];
				$_SESSION['LOGIN_NIC'] = $row['MET_NIC'];
				$_SESSION['LOGIN_IMG'] = $row['MET_IMG_SAVE'];
				$_SESSION["LOGIN_TIME"] = $dateTime;
				$_SESSION["LOGIN_IP"] = $LOGIN_IP;

				$sql = "UPDATE MEM_TB SET MET_LASTLOGIN_DATE='".$dateTime."', MET_LOGIN_IP='".$LOGIN_IP."' WHERE MET_IDX='".$row['MET_IDX']."' ";
				$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

				echo "<script>location.href='../index.php';</script>";
		}else{
			echo "<script>alert('아이디 또는 패스워드를 확인해보세요.');location.href='../login.php';</script>";
		}
		
	break;

	case "LOGOUT"  : //로그아웃
		session_start();
		session_destroy();
		echo "<script>location.href='../index.php';</script>";
	break;

	
	case "MAIN"  : // MAIN
		$sort_A = " ORDER BY CPT_IDX DESC ";

		if($_SESSION['LOGIN_IDX']){

			$mem_sql = "SELECT * FROM MEM_TB WHERE MET_IDX='".$_SESSION['LOGIN_IDX']."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
			$mem_result = mysqli_query($conn,$mem_sql);
			$mem_row = mysqli_fetch_array($mem_result);
			if($mem_row['MET_AREA']){
				$sort_A = " ORDER BY ";
				$area_arr = explode(",", $mem_row['MET_AREA']);
				for($i=0; $i<COUNT($area_arr);$i++){
					$tmp_area = $area_arr[$i];
					if($i==0){
						if($tmp_area=='서울'){
							$sort_A .= " CPT_AREA='강남/논현/서초' DESC, CPT_AREA='송파/잠실/강동' DESC, CPT_AREA='압구정/신사/교대/사당/삼성/선릉' DESC, CPT_AREA='노원/강북/수유/동대문' DESC, CPT_AREA='종로/대학로/명동/이태원' DESC, CPT_AREA='홍대/마포/은평/신촌/이대' DESC, CPT_AREA='관악/신림/동작' DESC, CPT_AREA='여의도/영등포/강서/목동' DESC, CPT_IDX DESC";
						}else if($tmp_area=='경기'){
							$sort_A .= " CPT_AREA='파주/김포/의정부/남양주' DESC, CPT_AREA='가평/양평/여주' DESC, CPT_AREA='하남/광주' DESC, CPT_AREA='성남/용인/분당/수원' DESC, CPT_AREA='기타 경기' DESC, CPT_IDX DESC";
						}else if($tmp_area=='인천'){
							$sort_A .= " CPT_AREA='인천/부천/부평' DESC, CPT_IDX DESC";
						}else{
							$sort_A .= " CPT_AREA='".$tmp_area."' DESC, CPT_IDX DESC ";
						}
					}else{
						if($tmp_area=='서울'){
							$sort_A .= ", CPT_AREA='강남/논현/서초' DESC, CPT_AREA='송파/잠실/강동' DESC, CPT_AREA='압구정/신사/교대/사당/삼성/선릉' DESC, CPT_AREA='노원/강북/수유/동대문' DESC, CPT_AREA='종로/대학로/명동/이태원' DESC, CPT_AREA='홍대/마포/은평/신촌/이대' DESC, CPT_AREA='관악/신림/동작' DESC, CPT_AREA='여의도/영등포/강서/목동' DESC, CPT_IDX DESC";
						}else if($tmp_area=='경기'){
							$sort_A .= ", CPT_AREA='파주/김포/의정부/남양주' DESC, CPT_AREA='가평/양평/여주' DESC, CPT_AREA='하남/광주' DESC, CPT_AREA='성남/용인/분당/수원' DESC, CPT_AREA='기타 경기' DESC, CPT_IDX DESC";
						}else if($tmp_area=='인천'){
							$sort_A .= ", CPT_AREA='인천/부천/부평' DESC, CPT_IDX DESC";
						}else{
							$sort_A .= ", CPT_AREA='".$tmp_area."' DESC, CPT_IDX DESC ";
						}
					}
				}
			}
		}
		$sort_A = " ORDER BY rand()";
		// 추천 캠페인
		$sql_A = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_MAIN IS NOT NULL AND CPT_APP_END_DATE >= '".$date."' AND  CPT_VIEW_DATE > '".$date."' AND  CPT_APP_START_DATE <= '".$date."' AND CPT_VIEW='Y' ".$sort_A." ";
		$result_A = mysqli_query($conn,$sql_A);
		$cnt_A = mysqli_num_rows($result_A);

		// 메인 비쥬얼
		$sql_V = "SELECT * FROM MAIN_VISUAL_TB WHERE MVT_DELETE_DATE IS NULL ORDER BY MVT_IDX DESC";
		$result_V = mysqli_query($conn,$sql_V);
		$cnt_V = mysqli_num_rows($result_V);

		// 인기 캠페인
		//$sql_B = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_APP_END_DATE >= '".$date."' AND CPT_APP_START_DATE <= '".$date."' ORDER BY CPT_APP_START_DATE DESC,  CPT_APP_CNT ASC LIMIT 12";

		//$sql_B = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_APP_END_DATE >= '".$date."' AND CPT_APP_START_DATE <= '".$date."' AND CPT_VIEW='Y' ORDER BY rand() LIMIT 14";
		//$sql_B = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_APP_END_DATE >= '".$date."' AND CPT_APP_START_DATE <= '".$date."' ORDER BY rand() LIMIT 14";
		$sql_B = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_VIEW='Y' AND CPT_APP_CNT > 50 ORDER BY rand() LIMIT 21";
		$result_B = mysqli_query($conn,$sql_B);
		$cnt_B = mysqli_num_rows($result_B);

		$sql_C = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_APP_END_DATE >= '".$date."' AND CPT_APP_START_DATE <= '".$date."' AND CPT_VIEW='Y' ORDER BY CPT_APP_START_DATE DESC LIMIT 7";
		$result_C = mysqli_query($conn,$sql_C);
		$cnt_C = mysqli_num_rows($result_C);
		$pop_idx="1";
		$IMG ="/img/pop/01.jpg";
		//include "layerpopup1.php";
		$pop_idx="2";
		$IMG ="/img/pop/02.jpg";
		//include "layerpopup3.php";

	break;

	case "CP_LIST"  : // CP_LIST
		
		$list_num = 14;
		$page_num = 10;
		$offset = $list_num*($pageNo-1);
		$paging = "pageNo=".$pageNo;

		if($type=='ALL'){
			$where=" CPT_DELETE_DATE IS NULL AND  CPT_VIEW_DATE > '".$date."' AND  CPT_APP_START_DATE <= '".$date."' AND CPT_VIEW='Y' ";
		}else{
			$where=" CPT_DELETE_DATE IS NULL AND CPT_CATE2 ='".$type."' AND  CPT_VIEW_DATE > '".$date."' AND  CPT_APP_START_DATE <= '".$date."' AND CPT_VIEW='Y' ";
		}

		if($search){ // input 검색 필터
			$where .= " AND (CPT_TITLE LIKE '%".$search."%' OR CPT_SUB_TITLE LIKE '%".$search."%' OR CPT_REQ_CONTENT LIKE '%".$search."%' OR CPT_CONTENT LIKE '%".$search."%' OR CPT_NOTICE LIKE '%".$search."%' OR CPT_AREA LIKE '%".$search."%' OR CPT_ADDR1 LIKE '%".$search."%' OR CPT_ADDR2 LIKE '%".$search."%' OR CPT_CATE1 LIKE '%".$search."%' OR CPT_CATE2 LIKE '%".$search."%' OR CPT_CATE3 LIKE '%".$search."%' OR CPT_OFFER LIKE '%".$search."%' OR CPT_KEYWORD LIKE '%".$search."%')";
		}

		if($cate1){
			if($cate1=='서울'){ // 지역선택 필터
				$where .=" AND (CPT_AREA='강남/논현/서초' OR CPT_AREA='송파/잠실/강동' OR CPT_AREA='압구정/신사/교대/사당/삼성/선릉' OR CPT_AREA='노원/강북/수유/동대문' OR CPT_AREA='종로/대학로/명동/이태원' OR CPT_AREA='홍대/마포/은평/신촌/이대' OR CPT_AREA='관악/신림/동작' OR CPT_AREA='여의도/영등포/강서/목동') ";
			}else if($cate1=='경기/인천'){
				$where .=" AND (CPT_AREA='인천/부천/부평' OR CPT_AREA='파주/김포/의정부/남양주' OR CPT_AREA='가평/양평/여주' OR CPT_AREA='하남/광주' OR CPT_AREA='성남/용인/분당/수원' OR CPT_AREA='기타 경기') ";
			}else if($cate=='기타 지역'){
				$where .=" AND (CPT_AREA='대전/충청' OR CPT_AREA='대구/경북' OR CPT_AREA='부산/경남' OR CPT_AREA='광주/전라' OR CPT_AREA='세종' OR CPT_AREA='울산' OR CPT_AREA='강원' OR CPT_AREA='제주') ";
			}else{
				$where .=" AND CPT_AREA = '".$cate1."' ";
			}
		}

		if($cate2){ // 캠페인 구분 필터
			if($cate2 !='ALL'){
				$where .=" AND CPT_CATE3='".$cate2."' ";
			}
		}

		if($cate3){ // 캠페인 체널 필터
			if($cate3 !='전체'){
				$where .=" AND CPT_CATE1 LIKE '%".$cate3."%' ";
			}
		}

		if($sort){
			if($sort=='최신순'){ 
				//$order_sort = " ORDER BY CPT_IDX DESC ";
				$order_sort = " ORDER BY DATEDIFF(CPT_APP_END_DATE, NOW()) DESC ";
			}else if($sort=='인기순'){
				$order_sort = " ORDER BY CPT_APP_CNT DESC ";
			}else if($sort=='마감순'){
				$order_sort = " ORDER BY CPT_VIEW_DATE ASC ";
			}else if($sort=='선정 높은순'){
				$order_sort = " ORDER BY CPT_APP_END_DATE DESC, CPT_APP_CNT ASC ";
			}else if($sort=='선정 마감순'){
				$order_sort = " ORDER BY CPT_APP_END_DATE ASC ";
			}
		}else{
			$order_sort = " ORDER BY DATEDIFF(CPT_APP_END_DATE, NOW()) DESC ";
		}

		$query="SELECT count(*) FROM CAMPAIGN_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입 
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 . 
	
		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다. 
		//전체 페이지 수와 현재 글 번호를 구합니다. 
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다. 
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호 

		$sql = "SELECT * FROM CAMPAIGN_TB WHERE ".$where." ".$order_sort." LIMIT $offset, $list_num";
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

	break;

	case "TOTAL_CNT"  : // TOTAL_CNT
	header('Content-Type: application/json');

		$sql_a = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
		$result_a = mysqli_query($conn,$sql_a);
		$cnt_a = mysqli_num_rows($result_a);

		$sql_b = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL ORDER BY CPT_IDX DESC";
		$result_b = mysqli_query($conn,$sql_b);
		$cnt_b = mysqli_num_rows($result_b);

		$sql_c = "SELECT * FROM CAMPAIGN_APP_TB WHERE CAT_DELETE_DATE IS NULL AND CAT_URL IS NOT NULL ORDER BY CAT_IDX DESC";
		$result_c = mysqli_query($conn,$sql_c);
		$cnt_c = mysqli_num_rows($result_c);


		$result_arr["influen_cnt"] = $cnt_a;
		$result_arr["campaign_cnt"] = $cnt_b;
		$result_arr["contents_cnt"] = $cnt_c;
		print_r(urldecode(json_encode($result_arr)));
	break;

	case "CHECKID"  : // CHECKID
		header('Content-Type: application/json');
		
		$MET_ID = $_POST['MET_ID'];
		$sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_ID='".$MET_ID."' ORDER BY MET_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);

		if($cnt == 0){
			$result_msg = 1;
		}else{
			$result_msg = 0;
		}
		print_r(urldecode(json_encode($result_msg)));
	break;

	case "CHECKNIC"  : // CHECKNIC
		header('Content-Type: application/json');
		
		$MET_NIC = $_POST['MET_NIC'];
		$sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_NIC='".$MET_NIC."' ORDER BY MET_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);

		if($cnt == 0){
			$result_msg = 1;
		}else{
			$result_msg = 0;
		}
		print_r(urldecode(json_encode($result_msg)));
	break;

	case "FINDID"  : // FINDID
		
		$MET_NAME = $_POST['name'];
		$MET_EMAIL = $_POST['email'];
		$sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_NAME='".$MET_NAME."' AND MET_EMAIL='".$MET_EMAIL."' ORDER BY MET_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$cnt = mysqli_num_rows($result);
		if($cnt > 0){
			echo "<script>location.href='../idResult.php?idx=".$row['MET_IDX']."';</script>";
		}else{
			echo "<script>location.href='../idResult.php';</script>";
		}
	break;

	case "IDFINDRESULT"  : // FINDID
		
		$MET_IDX = $_GET['idx'];
		$sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		
		$MET_ID = $row['MET_ID'];
		$MET_NAME = $row['MET_NAME'];
	break;

	case "FINDPW"  : // FINDPW
		
		$MET_ID = $_POST['id'];
		$MET_NAME = $_POST['name'];
		$MET_EMAIL = $_POST['email'];
		$MET_TEL = $_POST['tel'];
		$sql = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_ID='".$MET_ID."' AND MET_NAME='".$MET_NAME."' AND MET_EMAIL='".$MET_EMAIL."' AND MET_TEL='".$MET_TEL."' ORDER BY MET_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$cnt = mysqli_num_rows($result);
		if($cnt > 0){
			echo "<script>location.href='../pwChange.php?idx=".$row['MET_IDX']."';</script>";
		}else{
			echo "<script>location.href='../pwResult.php';</script>";
		}
	break;

	case "CP_VIEW"  : // CP_VIEW
		
		$CPT_IDX = $_GET['CPT_IDX'];
		$sql = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ORDER BY CPT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		
		$CPT_TITLE = stripslashes($row['CPT_TITLE']);
		$CPT_SUB_TITLE = stripslashes($row['CPT_SUB_TITLE']);
		$CPT_TEL = stripslashes($row['CPT_TEL']);
		$CPT_REQ_CONTENT = stripslashes($row['CPT_REQ_CONTENT']);
		$CPT_CONTENT = stripslashes($row['CPT_CONTENT']);
		$CPT_NOTICE = stripslashes($row['CPT_NOTICE']);
		$CPT_AREA = stripslashes($row['CPT_AREA']);
		$CPT_ADDR1 = stripslashes($row['CPT_ADDR1']);
		$CPT_ADDR2 = stripslashes($row['CPT_ADDR2']);
		$CPT_CATE1 = stripslashes($row['CPT_CATE1']);
		$CPT_CATE2 = stripslashes($row['CPT_CATE2']);
		$CPT_CATE3 = stripslashes($row['CPT_CATE3']);
		$CPT_OFFER = stripslashes($row['CPT_OFFER']);
		$CPT_KEYWORD = stripslashes($row['CPT_KEYWORD']);
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
		$CPT_MISSION = stripslashes($row['CPT_MISSION']);
		$CPT_KEYWORD_ETC = stripslashes($row['CPT_KEYWORD_ETC']);
		$CPT_IMG1_SAVE = stripslashes($row['CPT_IMG1_SAVE']);
		$CPT_IMG1_ORG = stripslashes($row['CPT_IMG1_ORG']);


		$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$CPT_IDX."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
		$result_app = mysqli_query($conn,$sql_app);
		$cnt_app = mysqli_num_rows($result_app);

		$sql_app_my = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$CPT_IDX."' AND MET_IDX='".$_SESSION['LOGIN_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
		$result_app_my = mysqli_query($conn,$sql_app_my);
		$cnt_app_my = mysqli_num_rows($result_app_my);

		$sql_like = "SELECT * FROM CAMPAIGN_SCRAP_TB WHERE CPT_IDX='".$CPT_IDX."' AND MET_IDX='".$_SESSION['LOGIN_IDX']."' AND CST_DELETE_DATE IS NULL ORDER BY CST_IDX DESC";
		$result_like = mysqli_query($conn,$sql_like);
		$cnt_like = mysqli_num_rows($result_like);
			
		$where = " CPT_DELETE_DATE IS NULL AND CPT_APP_END_DATE >= '".$date."' AND  CPT_VIEW_DATE > '".$date."' AND  CPT_APP_START_DATE <= '".$date."' AND CPT_VIEW='Y' ";

		if($type){
			$where .= " AND CPT_CATE2 ='".$type."' ";
		}

		$add_sort = " ORDER BY ";

		if($cate3){
			$add_sort .= " CPT_CATE1='".$cate3."' DESC, ";
		}

		if($cate2){
			$add_sort .= " CPT_CATE3='".$cate2."' DESC, ";
		}


		$sql_add = "SELECT * FROM CAMPAIGN_TB WHERE ".$where." AND CPT_IDX != '".$CPT_IDX."' ".$add_sort." CPT_IDX DESC LIMIT 10";
		$result_add = mysqli_query($conn,$sql_add);
		$cnt_add = mysqli_num_rows($result_add);

		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];

		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BIRTH = $row_mem['MET_BIRTH'];
		$MET_GENDER = $row_mem['MET_GENDER'];
		$MET_POSTING = $row_mem['MET_POSTING'];
		$MET_AREA = $row_mem['MET_AREA'];
		
	break;

	case "CPT_LIKE"  : // CPT_LIKE
		
		$CPT_LIKE = $_POST['CPT_LIKE'];
		$CPT_IDX = $_POST['CPT_IDX'];
		$MET_IDX = $_POST['MET_IDX'];

		if($CPT_LIKE == 0){
			$select_sql = "SELECT * FROM CAMPAIGN_SCRAP_TB WHERE CST_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' AND MET_IDX='".$MET_IDX."' ORDER BY CST_IDX DESC";
			$select_result = mysqli_query($conn,$select_sql);
			$select_cnt = mysqli_num_rows($select_result);
			
			if($select_cnt > 0){
				$select_sql = "UPDATE CAMPAIGN_SCRAP_TB SET CST_DELETE_DATE='".$date."' WHERE CPT_IDX='".$CPT_IDX."' AND MET_IDX='".$MET_IDX."' ";
				$select_result = mysqli_query($conn,$select_sql);
			}

			$sql = "INSERT INTO CAMPAIGN_SCRAP_TB (CPT_IDX,MET_IDX,CST_REG_DATE)VALUES('".$CPT_IDX."','".$MET_IDX."','".$dateTime."')";
			$result = mysqli_query($conn,$sql);
			$result_msg = 1;
		}else{
			$sql = "UPDATE CAMPAIGN_SCRAP_TB SET CST_DELETE_DATE='".$date."' WHERE CPT_IDX='".$CPT_IDX."' AND MET_IDX='".$MET_IDX."' ";
			$result = mysqli_query($conn,$sql);
			$result_msg = 0;
		}
		print_r(urldecode(json_encode($result_msg)));

	break;

	case "CP_APP"  : // CP_APP
		
		$CPT_IDX = $_GET['CPT_IDX'];
		$sql = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ORDER BY CPT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		
		$CPT_TITLE = stripslashes($row['CPT_TITLE']);
		$CPT_SUB_TITLE = stripslashes($row['CPT_SUB_TITLE']);
		$CPT_CATE1 = stripslashes($row['CPT_CATE1']);
		$CPT_CATE2 = stripslashes($row['CPT_CATE2']);
		$CPT_CATE3 = stripslashes($row['CPT_CATE3']);
		$CPT_OFFER = stripslashes($row['CPT_OFFER']);
		$CPT_ADDR1 = stripslashes($row['CPT_ADDR1']);
		$CPT_ADDR2 = stripslashes($row['CPT_ADDR2']);
		$CPT_APP_START_DATE = stripslashes($row['CPT_APP_START_DATE']);
		$CPT_APP_END_DATE = stripslashes($row['CPT_APP_END_DATE']);
		$CPT_ANNO_DATE = stripslashes($row['CPT_ANNO_DATE']);
		$CPT_REVIEW_START_DATE = stripslashes($row['CPT_REVIEW_START_DATE']);
		$CPT_REVIEW_END_DATE = stripslashes($row['CPT_REVIEW_END_DATE']);
		$CPT_RECRUITS = stripslashes($row['CPT_RECRUITS']);
		$CPT_END_DATE = stripslashes($row['CPT_END_DATE']);
		$CPT_IMG_SAVE = stripslashes($row['CPT_IMG_SAVE']);
		$CPT_IMG_ORG = stripslashes($row['CPT_IMG_ORG']);
		$CPT_IMG1_SAVE = stripslashes($row['CPT_IMG1_SAVE']);
		$CPT_CATE2_1 = $row['CPT_CATE2_1'];

		$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$CPT_IDX."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
		$result_app = mysqli_query($conn,$sql_app);
		$cnt_app = mysqli_num_rows($result_app);
		
		$where = " CPT_DELETE_DATE IS NULL AND CPT_APP_END_DATE >= '".$date."' AND  CPT_VIEW_DATE > '".$date."' AND  CPT_APP_START_DATE <= '".$date."' ";

		if($type){
			$where .= " AND CPT_CATE2 ='".$type."' ";
		}

		$add_sort = " ORDER BY ";

		if($cate3){
			$add_sort .= " CPT_CATE1='".$cate3."' DESC, ";
		}

		if($cate2){
			$add_sort .= " CPT_CATE3='".$cate2."' DESC, ";
		}


		$sql_add = "SELECT * FROM CAMPAIGN_TB WHERE ".$where." AND CPT_IDX != '".$CPT_IDX."' ".$add_sort." CPT_IDX DESC LIMIT 10";
		$result_add = mysqli_query($conn,$sql_add);
		$cnt_add = mysqli_num_rows($result_add);
		

		$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CAT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ORDER BY CAT_IDX DESC";
		$result_app = mysqli_query($conn,$sql_app);

		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$_SESSION['LOGIN_IDX']."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);

		$MET_BLOG = stripslashes($row_mem['MET_BLOG']);
		$MET_INSTAGRAM = stripslashes($row_mem['MET_INSTAGRAM']);
		$MET_YOUTUBE  = stripslashes($row_mem['MET_YOUTUBE']);
		$MET_YOUTUBE  = stripslashes($row_mem['MET_YOUTUBE']);
		$MET_NAME  = stripslashes($row_mem['MET_NAME']);
		$MET_TEL  = stripslashes($row_mem['MET_TEL']);
		$MET_ADDR1  = stripslashes($row_mem['MET_ADDR1']);
		$MET_ADDR2  = stripslashes($row_mem['MET_ADDR2']);


	break;

	case "CP_APP_MODIFY"  : // CP_APP
		
		$CPT_IDX = $_GET['CPT_IDX'];
		$sql = "SELECT * FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ORDER BY CPT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		
		$CPT_TITLE = stripslashes($row['CPT_TITLE']);
		$CPT_SUB_TITLE = stripslashes($row['CPT_SUB_TITLE']);
		$CPT_CATE1 = stripslashes($row['CPT_CATE1']);
		$CPT_CATE2 = stripslashes($row['CPT_CATE2']);
		$CPT_CATE3 = stripslashes($row['CPT_CATE3']);
		$CPT_OFFER = stripslashes($row['CPT_OFFER']);
		$CPT_ADDR1 = stripslashes($row['CPT_ADDR1']);
		$CPT_ADDR2 = stripslashes($row['CPT_ADDR2']);
		$CPT_APP_START_DATE = stripslashes($row['CPT_APP_START_DATE']);
		$CPT_APP_END_DATE = stripslashes($row['CPT_APP_END_DATE']);
		$CPT_ANNO_DATE = stripslashes($row['CPT_ANNO_DATE']);
		$CPT_REVIEW_START_DATE = stripslashes($row['CPT_REVIEW_START_DATE']);
		$CPT_REVIEW_END_DATE = stripslashes($row['CPT_REVIEW_END_DATE']);
		$CPT_RECRUITS = stripslashes($row['CPT_RECRUITS']);
		$CPT_END_DATE = stripslashes($row['CPT_END_DATE']);
		$CPT_IMG_SAVE = stripslashes($row['CPT_IMG_SAVE']);
		$CPT_IMG_ORG = stripslashes($row['CPT_IMG_ORG']);
		$CPT_IMG1_SAVE = stripslashes($row['CPT_IMG1_SAVE']);
		$CPT_CATE2_1 = $row['CPT_CATE2_1'];

		$myAppSql="SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$CPT_IDX."' AND MET_IDX='".$_SESSION['LOGIN_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC LIMIT 1";
		$myAppResult = mysqli_query($conn,$myAppSql);
		$myAppRow = mysqli_fetch_array($myAppResult);
		$CAT_PARTICI = $myAppRow['CAT_PARTICI'];
		$CAT_CAMERA = $myAppRow['CAT_CAMERA'];
		$CAT_CAMERA_ETC = $myAppRow['CAT_CAMERA_ETC'];
		$CAT_IDX = $myAppRow['CAT_IDX'];
		$CAT_NAME = $myAppRow['CAT_NAME'];
		$CAT_TEL = $myAppRow['CAT_TEL'];
		$CAT_CHANNEL = $myAppRow['CAT_CHANNEL'];
		$CAT_URL = $myAppRow['CAT_URL'];
		$CAT_COMMENT = $myAppRow['CAT_COMMENT'];
		$CAT_ADDR1 = $myAppRow['CAT_ADDR1'];
		$CAT_ADDR2 = $myAppRow['CAT_ADDR2'];
		$CAT_BANK_NAME = $myAppRow['CAT_BANK_NAME'];
		$CAT_BANK_NUMBER = $myAppRow['CAT_BANK_NUMBER'];
		$CAT_BANK_USER = $myAppRow['CAT_BANK_USER'];

		$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$CPT_IDX."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
		$result_app = mysqli_query($conn,$sql_app);
		$cnt_app = mysqli_num_rows($result_app);
		
		$where = " CPT_DELETE_DATE IS NULL AND CPT_APP_END_DATE >= '".$date."' AND  CPT_VIEW_DATE > '".$date."' AND  CPT_APP_START_DATE <= '".$date."' ";

		if($type){
			$where .= " AND CPT_CATE2 ='".$type."' ";
		}

		$add_sort = " ORDER BY ";

		if($cate3){
			$add_sort .= " CPT_CATE1='".$cate3."' DESC, ";
		}

		if($cate2){
			$add_sort .= " CPT_CATE3='".$cate2."' DESC, ";
		}


		$sql_add = "SELECT * FROM CAMPAIGN_TB WHERE ".$where." AND CPT_IDX != '".$CPT_IDX."' ".$add_sort." CPT_IDX DESC LIMIT 10";
		$result_add = mysqli_query($conn,$sql_add);
		$cnt_add = mysqli_num_rows($result_add);
		

		$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CAT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ORDER BY CAT_IDX DESC";
		$result_app = mysqli_query($conn,$sql_app);

		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$_SESSION['LOGIN_IDX']."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);

		$MET_BLOG = stripslashes($row_mem['MET_BLOG']);
		$MET_INSTAGRAM = stripslashes($row_mem['MET_INSTAGRAM']);
		$MET_YOUTUBE  = stripslashes($row_mem['MET_YOUTUBE']);
		$MET_YOUTUBE  = stripslashes($row_mem['MET_YOUTUBE']);
		$MET_NAME  = stripslashes($row_mem['MET_NAME']);
		$MET_TEL  = stripslashes($row_mem['MET_TEL']);
		$MET_ADDR1  = stripslashes($row_mem['MET_ADDR1']);
		$MET_ADDR2  = stripslashes($row_mem['MET_ADDR2']);


	break;


	case "MY_CP_LIST"  : // MY_CP_LIST
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];
		

		// 신청한 캠페인
		$sql_A = "SELECT * FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='n' AND b.CPT_APP_START_DATE <= '".$date."' AND b.CPT_APP_END_DATE >= '".$date."' ORDER BY a.CAT_IDX DESC";
		$result_A = mysqli_query($conn,$sql_A);
		$cnt_A = mysqli_num_rows($result_A);

		// 선정된 캠페인
		$sql_B = "SELECT * FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='y' AND (b.CPT_REVIEW_END_DATE >= '".$date."' OR a.CAT_BLOG_URL IS NULL) ORDER BY a.CAT_IDX DESC";
		$result_B = mysqli_query($conn,$sql_B);
		$cnt_B = mysqli_num_rows($result_B);

		// 등록한 캠페인
		$sql_C = "SELECT * FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='y' AND b.CPT_REVIEW_START_DATE <= '".$date."' AND b.CPT_REVIEW_END_DATE >= '".$date."' AND a.CAT_BLOG_URL IS NOT NULL AND a.CAT_KEYWORD IS NOT NULL ORDER BY a.CAT_IDX DESC";
		$result_C = mysqli_query($conn,$sql_C);
		$cnt_C = mysqli_num_rows($result_C);

		// 종료 캠페인
		$sql_D = "SELECT * FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='y' AND b.CPT_REVIEW_END_DATE < '".$date."' ORDER BY a.CAT_IDX DESC";
		$result_D = mysqli_query($conn,$sql_D);
		$cnt_D = mysqli_num_rows($result_D);
		
		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);

	break;

	case "MY_RV_LIST"  : // MY_RV_LIST
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];

		$list_num = 12;
		$page_num = 10;
		$offset = $list_num*($pageNo-1);
		$paging = "pageNo=".$pageNo;

		
		$query="SELECT count(*) FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='y' AND b.CPT_REVIEW_START_DATE <= '".$date."' AND a.CAT_BLOG_URL IS NOT NULL AND a.CAT_KEYWORD IS NOT NULL"; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입 
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 . 
	
		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다. 
		//전체 페이지 수와 현재 글 번호를 구합니다. 
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다. 
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호 

		$sql = "SELECT * FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='y' AND b.CPT_REVIEW_START_DATE <= '".$date."' AND a.CAT_BLOG_URL IS NOT NULL AND a.CAT_KEYWORD IS NOT NULL ORDER BY CAT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);


		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);

	break;

	case "MY_LK_LIST"  : // MY_LK_LIST
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];
		

		// 관심 캠페인
		$sql = "SELECT * FROM CAMPAIGN_SCRAP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CST_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' ORDER BY a.CST_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);
		
		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);

	break;

	case "MY_POINT"  : // MY_POINT
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];

		$query="SELECT count(*) FROM POINT_TB WHERE POT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."'"; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입 
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 . 
	
		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다. 
		//전체 페이지 수와 현재 글 번호를 구합니다. 
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다. 
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호 

		$sql = "SELECT * FROM POINT_TB WHERE POT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY POT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);

		$point ="0";

		while($row = mysqli_fetch_array($result)){
			if($row['POT_PLUS_POINT']){
				$point+=$row['POT_PLUS_POINT'];
			}
		}mysqli_data_seek($result,0);


		
		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];
		$MET_POINT = $row_mem['MET_POINT'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);

	break;

	case "MY_INFO"  : // MY_INFO
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];
			
		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];
		$MET_ID = $row_mem['MET_ID'];
		$MET_NAME = $row_mem['MET_NAME'];
		$MET_NIC = $row_mem['MET_NIC'];
		$MET_TEL = $row_mem['MET_TEL'];
		$MET_EMAIL = $row_mem['MET_EMAIL'];
		$MET_BIRTH = $row_mem['MET_BIRTH'];
		$MET_GENDER = $row_mem['MET_GENDER'];
		$MET_ZIP = $row_mem['MET_ZIP'];
		$MET_ADDR1 = $row_mem['MET_ADDR1'];
		$MET_ADDR2 = $row_mem['MET_ADDR2'];
		$MET_POSTING = $row_mem['MET_POSTING'];
		$MET_AREA = $row_mem['MET_AREA'];
		$MET_ROUTE = $row_mem['MET_ROUTE'];
		$MET_NAVER = $row_mem['MET_NAVER'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);


	break;

	case "MY_QNA"  : // MY_QNA
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];

		
		$query="SELECT count(*) FROM QNA_TB WHERE QNT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."'"; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입 
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 . 
	
		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다. 
		//전체 페이지 수와 현재 글 번호를 구합니다. 
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다. 
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호 

		$sql = "SELECT * FROM QNA_TB WHERE QNT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY QNT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);


		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);

	break;

	case "QNINSERT"  : // QNA INSERT
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];

		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);

	break;

	case "QNMODIFY"  : // QNA MODIFY
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];

		$QNT_IDX = $_GET['QNT_IDX'];

		$sql = "SELECT * FROM QNA_TB WHERE QNT_DELETE_DATE IS NULL AND QNT_IDX='".$QNT_IDX."' ORDER BY QNT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		
		$QNT_CATE1 = $row['QNT_CATE1'];
		$QNT_TITLE = $row['QNT_TITLE'];
		$QNT_CONTENT = $row['QNT_CONTENT'];

		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);

	break;

	case "QNVIEW"  : // QNA VIEW
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];

		$QNT_IDX = $_GET['QNT_IDX'];

		$sql = "SELECT * FROM QNA_TB WHERE QNT_DELETE_DATE IS NULL AND QNT_IDX='".$QNT_IDX."' ORDER BY QNT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		
		$QNT_CATE1 = $row['QNT_CATE1'];
		$QNT_TITLE = $row['QNT_TITLE'];
		$QNT_CONTENT = $row['QNT_CONTENT'];
		$QNT_REG_DATE = $row['QNT_REG_DATE'];

		$sql_answ = "SELECT * FROM QNA_ANSWER_TB WHERE QNT_IDX='".$row['QNT_IDX']."' AND QAT_DELETE_DATE IS NULL ORDER BY QAT_IDX DESC";
		$result_answ = mysqli_query($conn,$sql_answ);
		$row_answ = mysqli_fetch_array($result_answ);
		$cnt_answ = mysqli_num_rows($result_answ);

		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);

	break;


	case "NOLIST"  : // NOTICE LIST

		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];
		$where =" NOT_DELETE_DATE IS NULL "; 

		if($type){
			if($type != 'all'){
				$where .=" AND NOT_CATE='".$type."' "; 
			}
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


		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

	break;

	case "FALIST"  : // FAQ LIST

		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];
		$where =" FAT_DELETE_DATE IS NULL "; 

		if($search){
			$where .=" AND ( FAT_QUESTION LIKE '%".$search."%' OR FAT_ANSWER LIKE '%".$search."%' ) "; 
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


		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

	break;

	case "NOVIEW"  : // NOTICE VIEW
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];

		$NOT_IDX = $_GET['NOT_IDX'];

		$sql = "SELECT * FROM NOTICE_TB WHERE NOT_DELETE_DATE IS NULL AND NOT_IDX='".$NOT_IDX."' ORDER BY NOT_IDX DESC";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		
		$NOT_TITLE = $row['NOT_TITLE'];
		$NOT_CONTENT = $row['NOT_CONTENT'];
		$NOT_CATE = $row['NOT_CATE'];
		$NOT_REG_DATE = $row['NOT_REG_DATE'];
		$NOT_START_DATE = $row['NOT_START_DATE'];
		$NOT_END_DATE = $row['NOT_END_DATE'];
		$NOT_CNT = $row['NOT_CNT'];

		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

		$sql_view = "UPDATE NOTICE_TB SET NOT_CNT=NOT_CNT+1 WHERE NOT_IDX='".$NOT_IDX."'";
		$result_view = mysqli_query($conn,$sql_view);

	break;

	case "PSINSERT"  : // PARTNER INSERT
		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];

		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

	break;

	case "MY_ATT"  : // MY_ATT

		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];
		$where =" ADT_DELETE_DATE IS NULL "; 

		if($type){
			$where .=" AND MET_IDX='".$MET_IDX."' "; 
		}

		$query="SELECT count(*) FROM ATTEND_TB WHERE ".$where; // SQL 쿼리문을 문자열 변수에 일단 저장하고

		$result=mysqli_query($conn,$query) or die (mysqli_error()); // 위의 쿼리문을 실제로 실행하여 결과를 result에 대입 
		$row=mysqli_fetch_row($result); //위 결과 값을 하나하나 배열로 저장합니다 . 
	
		$total_no=$row['0']; //배열의 첫번째 요소의 값, 즉 테이블의 전체 글 수를 저장합니다. 
		//전체 페이지 수와 현재 글 번호를 구합니다. 
		$total_page=ceil($total_no/$list_num); // 전체글수를 페이지당글수로 나눈 값의 올림 값을 구합니다. 
		$cur_num=$total_no - $list_num*($pageNo-1); //현재 글번호 

		$sql = "SELECT * FROM ATTEND_TB WHERE ".$where." ORDER BY ADT_IDX DESC LIMIT $offset, $list_num";
		$result = mysqli_query($conn,$sql);
		$cnt = mysqli_num_rows($result);


		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);

	break;

	case "MYPAGE"  : // MYPAGE

		session_start();
		$MET_IDX = $_SESSION['LOGIN_IDX'];

		// 등록 컨텐츠
		$sql_A = "SELECT * FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='y' AND b.CPT_REVIEW_START_DATE <= '".$date."' AND a.CAT_BLOG_URL IS NOT NULL AND a.CAT_KEYWORD IS NOT NULL ORDER BY CAT_IDX DESC";
		$result_A = mysqli_query($conn,$sql_A);
		$cnt_A = mysqli_num_rows($result_A);

		// 관심 캠페인
		$sql_B = "SELECT * FROM CAMPAIGN_SCRAP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CST_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' ORDER BY a.CST_IDX DESC";
		$result_B = mysqli_query($conn,$sql_B);
		$cnt_B = mysqli_num_rows($result_B);

		// 신청한 캠페인
		$sql_C = "SELECT * FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='n' AND b.CPT_APP_START_DATE <= '".$date."' AND b.CPT_APP_END_DATE >= '".$date."' ORDER BY a.CAT_IDX DESC";
		$result_C = mysqli_query($conn,$sql_C);
		$cnt_C = mysqli_num_rows($result_C);

		// 선정된 캠페인
		$sql_D = "SELECT * FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='y' AND b.CPT_REVIEW_END_DATE >= '".$date."' ORDER BY a.CAT_IDX DESC";
		$result_D = mysqli_query($conn,$sql_D);
		$cnt_D = mysqli_num_rows($result_D);

		// 등록한 캠페인
		$sql_E = "SELECT * FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='y' AND b.CPT_REVIEW_START_DATE <= '".$date."' AND b.CPT_REVIEW_END_DATE >= '".$date."' AND a.CAT_BLOG_URL IS NOT NULL AND a.CAT_KEYWORD IS NOT NULL ORDER BY a.CAT_IDX DESC";
		$result_E = mysqli_query($conn,$sql_E);
		$cnt_E = mysqli_num_rows($result_E);

		// 종료 캠페인
		$sql_F = "SELECT * FROM CAMPAIGN_APP_TB as a RIGHT JOIN CAMPAIGN_TB as b ON a.CPT_IDX = b.CPT_IDX WHERE a.CAT_DELETE_DATE IS NULL AND b.CPT_DELETE_DATE IS NULL AND a.MET_IDX='".$MET_IDX."' AND a.CAT_SELECTION='y' AND b.CPT_REVIEW_END_DATE < '".$date."' ORDER BY a.CAT_IDX DESC";
		$result_F = mysqli_query($conn,$sql_F);
		$cnt_F = mysqli_num_rows($result_F);


		// 로그인 회원정보
		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);
		
		$MET_BLOG = $row_mem['MET_BLOG'];
		$MET_INSTAGRAM = $row_mem['MET_INSTAGRAM'];
		$MET_YOUTUBE = $row_mem['MET_YOUTUBE'];

		// 출책정보
		$sql_adt_A = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE='".$date."' ORDER BY ADT_IDX DESC";
		$result_adt_A = mysqli_query($conn,$sql_adt_A);
		$cnt_adt_A = mysqli_num_rows($result_adt_A);

		// 출책정보 이번달
		$sql_adt_B = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' AND ADT_DATE >= '".date('Y')."-".date('m')."-01' ORDER BY ADT_IDX DESC";
		$result_adt_B = mysqli_query($conn,$sql_adt_B);
		$cnt_adt_B = mysqli_num_rows($result_adt_B);

		// 출책정보 총
		$sql_adt_C = "SELECT * FROM ATTEND_TB WHERE ADT_DELETE_DATE IS NULL AND MET_IDX='".$MET_IDX."' ORDER BY ADT_IDX DESC";
		$result_adt_C = mysqli_query($conn,$sql_adt_C);
		$cnt_adt_C = mysqli_num_rows($result_adt_C);

	break;


	
	default    : break;
}
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet  
			$VST_IP=$_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy  
			$VST_IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
			$VST_IP=$_SERVER['REMOTE_ADDR'];
	}

	$VST_AGENT = $_SERVER['HTTP_USER_AGENT'];

	$date = date("Y-m-d");
	$dateTime = date("Y-m-d H:i:s");

	$sql_v_select = "SELECT * FROM VISIT_TB WHERE VST_IP='".$VST_IP."' AND VST_DATE='".$date."' AND VST_DELETE_DATE IS NULL ORDER BY VST_IDX DESC";
	$result_v_select = mysqli_query($conn,$sql_v_select);
	$cnt_v_select = mysqli_num_rows($result_v_select);

	if($cnt_v_select == 0){
		$sql_visit = "INSERT INTO VISIT_TB (VST_IP, VST_DATE, VST_AGENT, VST_REG_DATE)VALUES('".$VST_IP."','".$date."','".$VST_AGENT."','".$dateTime."')";
		$result_visit = mysqli_query($conn,$sql_visit);
	}

?>
