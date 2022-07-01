<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>스타트체험단 REPORT</title>

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

	$sql_recent = "SELECT DATE_FORMAT(MET_REG_DATE,'%Y-%m') m, COUNT(*) FROM MEM_TB WHERE MET_DELETE_DATE IS NULL GROUP BY m ";
  $result_recent = mysqli_query($conn,$sql_recent);
	$date_recent = "";
	$cnt_recent = "";
	$tmp_cnt=0;
	$i=0;
	while($row_recent = mysqli_fetch_array($result_recent)){
		$tmp_cnt+=$row_recent[1];
		if($i==0){
      $date_recent .= $row_recent["m"];
      $cnt_recent .= $tmp_cnt;
    }else{
      $date_recent .= ",".$row_recent["m"];
      $cnt_recent .= ",".$tmp_cnt;
    }
    $i++;
	}
	
	$sql_app = "SELECT DATE_FORMAT(CAT_REG_DATE,'%Y-%m') m, COUNT(*) FROM CAMPAIGN_APP_TB WHERE CAT_DELETE_DATE IS NULL GROUP BY m ";
  $result_app = mysqli_query($conn,$sql_app);

	$date_app = "";
	$cnt_app = "";
	$tmp_cnt=0;
	$i=0;
	while($row_app = mysqli_fetch_array($result_app)){
		$tmp_cnt+=$row_app[1];
		if($i==0){
      $date_app .= $row_app["m"];
      $cnt_app .= $tmp_cnt;
    }else{
      $date_app .= ",".$row_app["m"];
      $cnt_app .= ",".$tmp_cnt;
    }
    $i++;
	}

	
	$sql_cp = "SELECT DATE_FORMAT(CPT_REG_DATE,'%Y-%m') m, COUNT(*) FROM CAMPAIGN_TB WHERE CPT_DELETE_DATE IS NULL GROUP BY m ";
  $result_cp = mysqli_query($conn,$sql_cp);

	$date_cp = "";
	$cnt_cp = "";
	$tmp_cnt=0;
	$i=0;
	while($row_cp = mysqli_fetch_array($result_cp)){
		$tmp_cnt+=$row_cp[1];
		if($i==0){
      $date_cp .= $row_cp["m"];
      $cnt_cp .= $tmp_cnt;
    }else{
      $date_cp .= ",".$row_cp["m"];
      $cnt_cp .= ",".$tmp_cnt;
    }
    $i++;
	}

?>
<div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

  <div class="media">
    <div class="d-flex align-self-center">
      <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title"> 통계</h1>
    </div>
  </div>
  <hr class="d-flex g-brd-gray-light-v7 g-my-30">

  <div class="row">
    <div id="chartContainer" style="height: 300px; " class="col-md-6 g-mt-35"></div>
		<div id="chartContainer_app" style="height: 300px; " class="col-md-6 g-mt-35"></div>
		<div id="chartContainer_cp" style="height: 300px; " class="col-md-6 g-mt-35"></div>
   
  </div>

  <script src="/mgr/api/chart/js/canvasjs.min.js"></script>
</div>
</div>
</div>
</section>
</main>

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
<script>
window.onload = function () {
	var date_recent = "<?=$date_recent?>";
	var cnt_recent = "<?=$cnt_recent?>";
	date_recent = date_recent.split(",");
	cnt_recent = cnt_recent.split(",");
	recent_length = date_recent.length;


var data = new Array();
for(var i = 0; i < recent_length; i++){
	data.push(
	{
			x: new Date(String(date_recent[i])),
			y: Number(cnt_recent[i])
	});
}

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title:{
    text: "총회원 수"
  },
  axisY: {
    title: "회원 수",
    valueFormatString: "#0.",
    suffix: "",
    prefix: ""
  },
	axisX:{
		 valueFormatString: "YYYY-MM",
	},
  data: [{
    type: "splineArea",
    color: "rgba(54,158,173,.7)",
    markerSize: 10,
    xValueFormatString: "YYYY-MM",
    dataPoints: data
  }]
  });
chart.render();

var date_app = "<?=$date_app?>";
	var cnt_app = "<?=$cnt_app?>";
	date_app = date_app.split(",");
	cnt_app = cnt_app.split(",");
	app_length = date_app.length;

var data_app = new Array();

for(var i = 0; i < app_length; i++){
	data_app.push(
	{
			x: new Date(String(date_app[i])),
			y: Number(cnt_app[i])
	});
}


var chart_app = new CanvasJS.Chart("chartContainer_app", {
  animationEnabled: true,
  title:{
    text: "캠패인 신청"
  },
  axisY: {
    title: "신청 수",
    valueFormatString: "#0.",
    suffix: "",
    prefix: ""
  },
	axisX:{
		 valueFormatString: "YYYY-MM",
	},
  data: [{
    type: "splineArea",
    color: "rgba(54,158,173,.7)",
    markerSize: 10,
    xValueFormatString: "YYYY-MM",
    dataPoints: data_app
  }]
  });
chart_app.render();

var date_cp = "<?=$date_cp?>";
	var cnt_cp = "<?=$cnt_cp?>";
	date_cp = date_cp.split(",");
	cnt_cp = cnt_cp.split(",");
	cp_length = date_cp.length;

var data_cp = new Array();

for(var i = 0; i < cp_length; i++){
	data_cp.push(
	{
			x: new Date(String(date_cp[i])),
			y: Number(cnt_cp[i])
	});
}
var chart_cp = new CanvasJS.Chart("chartContainer_cp", {
  animationEnabled: true,
  title:{
    text: "캠페인 등록 수"
  },
  axisY: {
    title: "캠페인",
    valueFormatString: "#0.",
    suffix: "",
    prefix: ""
  },
	axisX:{
		 valueFormatString: "YYYY-MM",
	},
  data: [{
    type: "splineArea",
    color: "rgba(54,158,173,.7)",
    markerSize: 10,
    xValueFormatString: "YYYY-MM",
    dataPoints: data_cp
  }]
  });
chart_cp.render();
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