<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>스타트체험단 ADMIN</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="/mgr/favicon.ico">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="/mgr/assets/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Global Icons -->
  <link rel="stylesheet" href="/mgr/assets/vendor/icon-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/mgr/assets/vendor/icon-line/css/simple-line-icons.css">
  <link rel="stylesheet" href="/mgr/assets/vendor/icon-etlinefont/style.css">
  <link rel="stylesheet" href="/mgr/assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="/mgr/assets/vendor/icon-hs/style.css">

  <link rel="stylesheet" href="/mgr/assets/vendor/hs-admin-icons/hs-admin-icons.css">
  <link rel="stylesheet" href="/mgr/assets/vendor/animate.css">
  <link rel="stylesheet" href="/mgr/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="/mgr/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="/mgr/assets/vendor/fancybox/jquery.fancybox.min.css">
  <link rel="stylesheet" href="/mgr/assets/vendor/flatpickr/dist/css/flatpickr.min.css">
  <link rel="stylesheet" href="/mgr/assets/vendor/hamburgers/hamburgers.min.css">
	<link  rel="stylesheet" href="/mgr/assets/vendor/custombox/custombox.min.css">
	<link rel="stylesheet" href="/mgr/assets/vendor/chartist-js/chartist.min.css">
	<link rel="stylesheet" href="/mgr/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.css">
	<link rel="stylesheet" href="/mgr/assets/vendor/fancybox/jquery.fancybox.min.css">
  <!-- CSS Unify -->
  <link rel="stylesheet" href="/mgr/assets/css/unify-admin.css">

  <!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="/mgr/plugin/remodal-demo/src/jquery.remodal.css" />

  <!-- CSS Customization -->
  <link rel="stylesheet" href="/mgr/assets/css/custom.css">
  <link rel="stylesheet" href="/mgr/css/custom.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

</head>

<body>
  <main>
    <!-- Header -->



    <section class="container-fluid px-0 g-pt-65">
      <div class="row no-gutters g-pos-rel g-overflow-x-hidden">
        <div class="col g-ml-0--lg g-overflow-hidden">

        <!-- End Sidebar Nav -->

<?
  header("Content-Type:text/html;charset=utf-8");
	$db_host = "localhost";
	$db_user = "denoblog";
	$db_passwd = "tjdcks11";
	$db_name = "denoblog";
	$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

	if (mysqli_connect_errno($conn)) {
		echo "데이터베이스 연결 실패: " . mysqli_connect_error();
	} else {
		//echo "성공~!!!";
	}

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
?>
<div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

  <div class="media">
    <div class="d-flex align-self-center">
      <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">회원 통계</h1>
    </div>
  </div>
  <hr class="d-flex g-brd-gray-light-v7 g-my-30">
  <div class="row">
    <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
    <!-- Panel -->
    <div class="card h-100 g-brd-gray-light-v7 g-rounded-3">
      <div class="card-block g-font-weight-300 g-pa-20">
        <div class="media">
          <div class="d-flex g-mr-15">
            <div class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-lightblue-v3 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
              <i class="hs-admin-exchange-vertical g-absolute-centered"></i>
            </div>
          </div>

          <div class="media-body align-self-center">
            <div class="d-flex align-items-center g-mb-5">
              <span class="g-font-size-24 g-line-height-1 g-color-black"><?=number_format($cnt_visit);?></span>
            </div>

            <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">총 방문자수</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- End Panel -->
  </div>

  <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
    <!-- Panel -->
    <div class="card h-100 g-brd-gray-light-v7 g-rounded-3">
      <div class="card-block g-font-weight-300 g-pa-20">
        <div class="media">
          <div class="d-flex g-mr-15">
            <div class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-teal-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
              <i class="hs-admin-user g-absolute-centered"></i>
            </div>
          </div>

          <div class="media-body align-self-center">
            <div class="d-flex align-items-center g-mb-5">
              <span class="g-font-size-24 g-line-height-1 g-color-black"><?=number_format($cnt_mem);?></span>
            </div>

            <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">총 회원수</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- End Panel -->
  </div>

  <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
    <!-- Panel -->
    <div class="card h-100 g-brd-gray-light-v7 g-rounded-3">
      <div class="card-block g-font-weight-300 g-pa-20">
        <div class="media">
          <div class="d-flex g-mr-15">
            <div class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-darkblue-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
              <i class="hs-admin-bookmark-alt g-absolute-centered"></i>
            </div>
          </div>

          <div class="media-body align-self-center">
            <div class="d-flex align-items-center g-mb-5">
              <span class="g-font-size-24 g-line-height-1 g-color-black"><?=number_format($cnt_cpt);?></span>
            </div>

            <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">총 캠페인수</h6>
            <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">지역(<?=number_format($cnt_cpt_A);?>) / 제품(<?=number_format($cnt_cpt_B);?>)</h6>
            <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">배달(<?=number_format($cnt_cpt_C);?>) / 기자단(<?=number_format($cnt_cpt_D);?>)</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- End Panel -->
  </div>

  <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
    <!-- Panel -->
    <div class="card h-100 g-brd-gray-light-v7 g-rounded-3">
      <div class="card-block g-font-weight-300 g-pa-20">
        <div class="media">
          <div class="d-flex g-mr-15">
            <div class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-lightred-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
              <i class="hs-admin-user g-absolute-centered"></i>
            </div>
          </div>

          <div class="media-body align-self-center">
            <div class="d-flex align-items-center g-mb-5">
              <span class="g-font-size-24 g-line-height-1 g-color-black"><?=number_format($cnt_cat);?></span>
            </div>

            <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">총 캠페인 신청횟수</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- End Panel -->
  </div>
  </div>
  <div class="row">
    <div id="chartContainer" style="height: 400px; " class="col-md-12 g-mt-35"></div>
    <div id="chartContainer_device" style="height: 400px;" class="col-md-12 g-mt-35"></div>
    <div id="chartContainer_join" style="height: 400px;" class="col-md-12 g-mt-35"></div>
    <div id="chartContainer_area" style="height: 400px;" class="col-md-6 g-mt-35"></div>
    <div id="chartContainer_area_p" style="height: 400px;" class="col-md-6 g-mt-35"></div>
    <div id="chartContainer_posting" style="height: 400px;" class="col-md-6 g-mt-35"></div>
    <div id="chartContainer_posting_p" style="height: 400px;" class="col-md-6 g-mt-35"></div>
  </div>

  <script src="/mgr/api/chart/js/canvasjs.min.js"></script>
</div>
</div>
</div>
</section>
</main>
<script>
window.onload = function () {
var recent_date = "<?=$recent_date?>";
var recent_visit = "<?=$recent_visit?>";
recent_date = recent_date.split(",");
recent_visit = recent_visit.split(",");
recent_cnt = recent_date.length;
var data = new Array();
for(var i = 0; i < recent_cnt; i++){
  data.push(
    {
        x: new Date(String(recent_date[i])),
        y: Number(recent_visit[i])
    });
}
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title:{
    text: "최근 10일 방문자"
  },
  axisY: {
    title: "방문자수",
    valueFormatString: "#0.",
    suffix: "",
    prefix: ""
  },
	axisX:{
		 valueFormatString: "YYYY-MM-DD DDD",
	},
  data: [{
    type: "splineArea",
    color: "rgba(54,158,173,.7)",
    markerSize: 5,
    xValueFormatString: "YYYY-MM-DD DDD",
    dataPoints: data
  }]
  });
chart.render();

var join_date = "<?=$join_date?>";
var join_cnt = "<?=$join_cnt?>";
join_date = join_date.split(",");
join_cnt = join_cnt.split(",");
join_leng = join_date.length;
var data_join = new Array();
for(var i = 0; i < join_leng; i++){
  data_join.push(
    {
        x: new Date(String(join_date[i])),
        y: Number(join_cnt[i])
    });
}
var chart_join = new CanvasJS.Chart("chartContainer_join", {
  animationEnabled: true,
  title:{
    text: "최근 10일 회원 가입자"
  },
  axisY: {
    title: "가입자수",
    valueFormatString: "#0.",
    suffix: "",
    prefix: ""
  },
	axisX:{
		 valueFormatString: "YYYY-MM-DD DDD",
	},
  data: [{
    type: "splineArea",
    color: "rgba(54,158,173,.7)",
    markerSize: 5,
    xValueFormatString: "YYYY-MM-DD DDD",
    dataPoints: data_join
  }]
  });
chart_join.render();
var A_A = "<?=$A_A?>";
var A_B = "<?=$A_B?>";
var A_C = "<?=$A_C?>";
var A_D = "<?=$A_D?>";
var A_E = "<?=$A_E?>";
var A_F = "<?=$A_F?>";
var A_G = "<?=$A_G?>";
var A_H = "<?=$A_H?>";
var B_A = "<?=$B_A?>";
var B_B = "<?=$B_B?>";
var B_C = "<?=$B_C?>";
var B_D = "<?=$B_D?>";
var B_E = "<?=$B_E?>";
var B_F = "<?=$B_F?>";
var C_A = "<?=$C_A?>";
var D_A = "<?=$D_A?>";
var E_A = "<?=$E_A?>";
var F_A = "<?=$F_A?>";
var G_A = "<?=$G_A?>";
var H_A = "<?=$H_A?>";
var I_A = "<?=$I_A?>";
var J_A = "<?=$J_A?>";
var K_A = "<?=$K_A?>";

var chart_area = new CanvasJS.Chart("chartContainer_area", {
exportEnabled: true,
animationEnabled: true,
title:{
  text: "선호지역"
},
legend:{
  cursor: "pointer",
  itemclick: explodePie
},
data: [{
  type: "pie",
  showInLegend: true,
  toolTipContent: "{name}: <strong>{y}</strong>",
  indexLabel: "{name} - {y}",
  dataPoints: [
    { y: A_A, name: "강남 · 논현 · 서초" },
    { y: A_B, name: "송파 · 잠실 · 강동" },
    { y: A_C, name: "압구정 · 신사 · 교대 · 사당 · 삼성 · 선릉" },
    { y: A_D, name: "노원 · 강북 · 수유 · 동대문" },
    { y: A_E, name: "종로 · 대학로 · 명동 · 이태원" },
    { y: A_F, name: "홍대 · 마포 · 은평 · 신촌 · 이대" },
    { y: A_G, name: "관악 · 신림 · 동작"},
    { y: A_H, name: "여의도 · 영등포 · 강서 · 목동"},
    { y: B_A, name: "인천 · 부천 · 부평"},
    { y: B_B, name: "파주 · 김포 · 의정부 · 남양주"},
    { y: B_C, name: "가평 · 양평 · 여주"},
    { y: B_D, name: "하남 · 광주"},
    { y: B_E, name: "성남 · 용인 · 분당 · 수원"},
    { y: B_F, name: "기타 경기"},
    { y: C_A, name: "대전 · 충청"},
    { y: D_A, name: "대구 · 경북"},
    { y: E_A, name: "부산 · 경남"},
    { y: F_A, name: "광주 · 전라"},
    { y: G_A, name: "세종"},
    { y: H_A, name: "울산"},
    { y: I_A, name: "강원"},
    { y: J_A, name: "제주"},
    { y: K_A, name: "기타 서울"}
  ]
}]
});
chart_area.render();

var area_a_p = "<?=$area_a_p?>";
var area_b_p = "<?=$area_b_p?>";
var area_c_p = "<?=$area_c_p?>";
var area_d_p = "<?=$area_d_p?>";
var area_e_p = "<?=$area_e_p?>";
var area_f_p = "<?=$area_f_p?>";
var area_g_p = "<?=$area_g_p?>";
var area_h_p = "<?=$area_h_p?>";
var area_i_p = "<?=$area_i_p?>";
var area_j_p = "<?=$area_j_p?>";
var area_k_p = "<?=$area_k_p?>";

var chart_area_p = new CanvasJS.Chart("chartContainer_area_p", {
exportEnabled: true,
animationEnabled: true,
title:{
text: "선호지역 %"
},
legend:{
cursor: "pointer",
itemclick: explodePie
},
data: [{
type: "pie",
showInLegend: true,
toolTipContent: "{name}: <strong>{y} %</strong>",
indexLabel: "{name} - {y} %",
dataPoints: [
  { y: area_a_p, name: "서울" },
  { y: area_b_p, name: "부산/경남" },
  { y: area_c_p, name: "대구/경북" },
  { y: area_d_p, name: "대전/충청" },
  { y: area_e_p, name: "광주/전라" },
  { y: area_f_p, name: "울산" },
  { y: area_g_p, name: "인천/부천/부평"},
  { y: area_h_p, name: "경기도"},
  { y: area_i_p, name: "세종"},
  { y: area_j_p, name: "강원"},
  { y: area_k_p, name: "제주"}
]
}]
});
chart_area_p.render();

var P_A = "<?=$P_A?>";
var P_B = "<?=$P_B?>";
var P_C = "<?=$P_C?>";
var P_D = "<?=$P_D?>";
var P_E = "<?=$P_E?>";
var P_F = "<?=$P_F?>";
var P_G = "<?=$P_G?>";
var P_H = "<?=$P_H?>";
var P_I = "<?=$P_I?>";
var P_J = "<?=$P_J?>";
var P_K = "<?=$P_K?>";
var P_L = "<?=$P_L?>";
console.log(P_F);
var chart_posting = new CanvasJS.Chart("chartContainer_posting", {
exportEnabled: true,
animationEnabled: true,
title:{
text: "관심분야"
},
legend:{
cursor: "pointer",
itemclick: explodePie
},
data: [{
type: "pie",
showInLegend: true,
toolTipContent: "{name}: <strong>{y}</strong>",
indexLabel: "{name} - {y}",
dataPoints: [
  { y: P_A, name: "맛집" },
  { y: P_B, name: "생활/리빙" },
  { y: P_C, name: "패션" },
  { y: P_D, name: "유아" },
  { y: P_E, name: "뷰티샵/미용" },
  { y: P_F, name: "도서/교육" },
  { y: P_G, name: "일상"},
  { y: P_H, name: "여행/숙박"},
  { y: P_I, name: "디지털가전"},
  { y: P_J, name: "배달/배송"},
  { y: P_K, name: "화장품"},
  { y: P_L, name: "기타"}
]
}]
});
chart_posting.render();

var posting_a_p = "<?=$posting_a_p?>";
var posting_b_p = "<?=$posting_b_p?>";
var posting_c_p = "<?=$posting_c_p?>";
var posting_d_p = "<?=$posting_d_p?>";
var posting_e_p = "<?=$posting_e_p?>";
var posting_f_p = "<?=$posting_f_p?>";
var posting_g_p = "<?=$posting_g_p?>";
var posting_h_p = "<?=$posting_h_p?>";
var posting_i_p = "<?=$posting_i_p?>";
var posting_j_p = "<?=$posting_j_p?>";
var posting_k_p = "<?=$posting_k_p?>";
var posting_l_p = "<?=$posting_l_p?>";

var chart_posting_p = new CanvasJS.Chart("chartContainer_posting_p", {
exportEnabled: true,
animationEnabled: true,
title:{
text: "관심분야 %"
},
legend:{
cursor: "pointer",
itemclick: explodePie
},
data: [{
type: "pie",
showInLegend: true,
toolTipContent: "{name}: <strong>{y} %</strong>",
indexLabel: "{name} - {y} %",
dataPoints: [
  { y: posting_a_p, name: "맛집" },
  { y: posting_b_p, name: "생활/리빙" },
  { y: posting_c_p, name: "패션" },
  { y: posting_d_p, name: "유아" },
  { y: posting_e_p, name: "뷰티샵/미용" },
  { y: posting_f_p, name: "도서/교육" },
  { y: posting_g_p, name: "일상"},
  { y: posting_h_p, name: "여행/숙박"},
  { y: posting_i_p, name: "디지털가전"},
  { y: posting_j_p, name: "배달/배송"},
  { y: posting_k_p, name: "화장품"},
  { y: posting_l_p, name: "기타"}
]
}]
});
chart_posting_p.render();

var DEVICE_A = "<?=$device_a_p?>";
var DEVICE_B = "<?=$device_b_p?>";
var DEVICE_C = "<?=$device_c_p?>";


var chart_device = new CanvasJS.Chart("chartContainer_device", {
exportEnabled: true,
animationEnabled: true,
title:{
text: "접속디바이스"
},
legend:{
cursor: "pointer",
itemclick: explodePie
},
data: [{
type: "pie",
showInLegend: true,
toolTipContent: "{name}: <strong>{y} %</strong>",
indexLabel: "{name} - {y} %",
dataPoints: [
  { y: DEVICE_A, name: "모바일" },
  { y: DEVICE_B, name: "PC" },
  { y: DEVICE_C, name: "기타"}
]
}]
});
chart_device.render();

}

function explodePie (e) {
  if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
  } else {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
  }
  e.chart.render();

}
</script>
<!-- JS Global Compulsory -->
 <script src="/mgr/assets/vendor/jquery/jquery.min.js"></script>
 <script src="/mgr/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>

 <script src="/mgr/assets/vendor/popper.min.js"></script>
 <script src="/mgr/assets/vendor/bootstrap/bootstrap.min.js"></script>

 <script src="/mgr/assets/vendor/cookiejs/jquery.cookie.js"></script>

 <script src="/mgr/assets/vendor/jquery-ui/ui/widget.js"></script>
 <script src="/mgr/assets/vendor/jquery-ui/ui/version.js"></script>
 <script src="/mgr/assets/vendor/jquery-ui/ui/keycode.js"></script>
 <script src="/mgr/assets/vendor/jquery-ui/ui/position.js"></script>
 <script src="/mgr/assets/vendor/jquery-ui/ui/unique-id.js"></script>
 <script src="/mgr/assets/vendor/jquery-ui/ui/safe-active-element.js"></script>

 <!-- jQuery UI Helpers -->
 <script src="/mgr/assets/vendor/jquery-ui/ui/widgets/menu.js"></script>
 <script src="/mgr/assets/vendor/jquery-ui/ui/widgets/mouse.js"></script>

 <!-- jQuery UI Widgets -->
 <script src="/mgr/assets/vendor/jquery-ui/ui/widgets/datepicker.js"></script>


 <!-- JS Plugins Init. -->
 <script src="/mgr/assets/vendor/appear.js"></script>
 <script src="/mgr/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
 <script src="/mgr/assets/vendor/flatpickr/dist/js/flatpickr.min.js"></script>
 <script src="/mgr/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
 <script src="/mgr/assets/vendor/bloodhound-js/js/bloodhound.min.js"></script>
 <script src="/mgr/assets/vendor/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
 <script src="/mgr/assets/vendor/bloodhound-js/js/typeahead.jquery.min.js"></script>
 <script src="/mgr/assets/vendor/datatables/media/js/jquery.dataTables.js"></script>
 <script src="/mgr/assets/vendor/datatables/media/js/dataTables.select.js"></script>
 <script src="/mgr/assets/vendor/chartist-js/chartist.min.js"></script>
 <script src="/mgr/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.js"></script>
 <script src="/mgr/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
 <script src="/mgr/assets/vendor/multiselect/js/jquery.multi-select.js"></script>

 <!-- JS Unify -->
 <script src="/mgr/assets/js/hs.core.js"></script>
 <script src="/mgr/assets/js/components/hs.side-nav.js"></script>
 <script src="/mgr/assets/js/helpers/hs.hamburgers.js"></script>
 <script src="/mgr/assets/js/components/hs.dropdown.js"></script>
 <script src="/mgr/assets/js/components/hs.scrollbar.js"></script>
 <script src="/mgr/assets/js/helpers/hs.focus-state.js"></script>
 <script src="/mgr/assets/js/components/hs.datatables.js"></script>
 <script src="/mgr/assets/js/components/hs.datepicker.js"></script>
 <script src="/mgr/assets/js/components/hs.area-chart.js"></script>
 <script src="/mgr/assets/js/helpers/hs.file-attachments.js"></script>
 <script src="/mgr/assets/js/components/hs.file-attachement.js"></script>
 <script src="/mgr/assets/js/components/hs.popup.js"></script>
 <script src="/mgr/assets/js/components/hs.range-datepicker.js"></script>
   <script src="/mgr/assets/js/components/hs.count-qty.js"></script>
 <script src="/mgr/assets/js/components/hs.multi-select.js"></script>
 <script src="/mgr/assets/js/components/hs.donut-chart.js"></script>
 <script src="/mgr/assets/js/components/hs.bar-chart.js"></script>
 <!-- JS Implementing Plugins -->
<script  src="/mgr/assets/vendor/custombox/custombox.min.js"></script>

<!-- JS Unify -->
<script  src="/mgr/assets/js/components/hs.modal-window.js"></script>

 <script src="/mgr/assets/js/helpers/hs.rating.js"></script>

 <!-- JS Custom -->
 <script src="/mgr/assets/js/custom.js"></script>





   <!-- JS Plugins Init. -->
 <script>
   $(document).on('ready', function () {
     // initialization of custom select
     $('.js-select').selectpicker();

   $('.js-select').on('shown.bs.select', function (e) {
       $(this).addClass('opened');
     });

     // initialization of charts
     $.HSCore.components.HSAreaChart.init('.js-area-chart');
     $.HSCore.components.HSDonutChart.init('.js-donut-chart');
     $.HSCore.components.HSBarChart.init('.js-bar-chart');


   $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

     // initialization of sidebar navigation component
      $.HSCore.components.HSSideNav.init('.js-side-nav', {
       afterOpen: function() {
         setTimeout(function() {
           $.HSCore.components.HSAreaChart.init('.js-area-chart');
           $.HSCore.components.HSDonutChart.init('.js-donut-chart');
           $.HSCore.components.HSBarChart.init('.js-bar-chart');
         }, 400);
       },
       afterClose: function() {
         setTimeout(function() {
           $.HSCore.components.HSAreaChart.init('.js-area-chart');
           $.HSCore.components.HSDonutChart.init('.js-donut-chart');
           $.HSCore.components.HSBarChart.init('.js-bar-chart');
         }, 400);
       }
     });
   $.HSCore.components.HSModalWindow.init('[data-modal-target]');

     // initialization of hamburger
     $.HSCore.helpers.HSHamburgers.init('.hamburger');

     // initialization of HSDropdown component
     $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
       dropdownHideOnScroll: false,
     dropdownType: 'css-animation',
       dropdownAnimationIn: 'fadeIn',
       dropdownAnimationOut: 'fadeOut'
     });

   // initialization of forms
     $.HSCore.helpers.HSFileAttachments.init();
     $.HSCore.components.HSFileAttachment.init('.js-file-attachment');
     $.HSCore.helpers.HSFocusState.init();
    $.HSCore.helpers.HSRating.init();

     // initialization of custom scrollbar
     $.HSCore.components.HSScrollBar.init($('.js-custom-scroll'));

     // initialization of forms
     $.HSCore.components.HSCountQty.init('.js-quantity');
   $.HSCore.components.HSPopup.init('.js-fancybox', {
       btnTpl: {
         smallBtn: '<button data-fancybox-close class="btn g-pos-abs g-top-25 g-right-30 g-line-height-1 g-bg-transparent g-font-size-16 g-color-gray-light-v6 g-brd-none p-0" title=""><i class="hs-admin-close"></i></button>'
       }
     });
    $.HSCore.components.HSMultiSelect.init('.js-multi-select');

   });



 </script>
