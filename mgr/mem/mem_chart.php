<?include_once "../inc/header.php";?>
<?$mode='VSMCNT';?>
<?include_once "../inc/adminVO.php";?>

        <div class="col g-ml-50 g-ml-0--lg g-overflow-hidden">
          <!-- Breadcrumb-v1 -->
          <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
            <ul class="u-list-inline g-color-gray-dark-v6 add-location">

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">홈</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">회원관리 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">회원 통계</a>
              </li>

            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->

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
              <div id="chartContainer" style="height: 400px; margin: 50px auto;" class="col-md-12"></div>
              <div id="chartContainer_device" style="height: 400px; margin: 50px auto;" class="col-md-12"></div>
  						<div id="chartContainer_join" style="height: 400px; margin: 50px auto;" class="col-md-12"></div>
              <div id="chartContainer_area" style="height: 400px; margin: 50px auto;" class="col-md-6"></div>
              <div id="chartContainer_area_p" style="height: 400px; margin: 50px auto;" class="col-md-6"></div>
              <div id="chartContainer_posting" style="height: 400px; margin: 50px auto;" class="col-md-6"></div>
              <div id="chartContainer_posting_p" style="height: 400px; margin: 50px auto;" class="col-md-6"></div>
            </div>

						<script src="../api/chart/js/canvasjs.min.js"></script>
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


<?include_once "../inc/footer.php";?>

</body>

</html>
