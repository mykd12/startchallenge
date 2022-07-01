<?include_once "../inc/header.php";?>
<?$mode="POINT_MANAGE";?>
<?include_once "../inc/adminVO.php";?>

        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
          <!-- Breadcrumb-v1 -->
          <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
            <ul class="u-list-inline g-color-gray-dark-v6 add-location">
              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">Home</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>
							<li class="list-inline-item g-mr-10">
								<a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">포인트 관리</a>
								<i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>
              <li class="list-inline-item">
                <span class="g-valign-middle">포인트 관리</span>
              </li>
            </ul>
          </div>
          <div class="g-pa-20" id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">포인트 관리</h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
						<div class="row">
							<!-- 1-st column -->
							<form method="get" name="search_frm" action="point_write.php"  class='col-md-12 row'>
								<div class="form-group g-mb-20 col-sm-12" >
									<div class="g-pos-rel">
										<button class="btn u-input-btn--v1 g-width-40 g-bg-primary g-rounded-right-4" type="submit" onclick="search_submit();">
											<i class="hs-admin-search g-absolute-centered g-font-size-16 g-color-white"></i>
										</button>
										<input id="sarch_input" name='sarch_input' class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3 g-rounded-4 g-px-14 g-py-10" type="text" value="<?=$_GET['sarch_input']?>"; placeholder="회원 검색">
									</div>
								</div>
							</form>
							<div class="col-md-12 ">
								<form method="post" name="frm" action="../inc/adminDAO.php" onsubmit='return submit_ck()' class='row'>
									<input type="hidden" name="mode" id="mode" value="<?=$mode?>">
									<div class='col-md-12 row g-mb-20'>
										<?while($row = mysqli_fetch_array($result)){ // 반복문?>
											<div class="form-group g-mb-20 col-md-3 col-sm-3">
													<div class="btn-group justified-content">
														<label class="u-check g-pl-0">
															<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="MET_IDX[]" id='MET_IDX<?=$row['MET_IDX']?>' value="<?=$row['MET_IDX']?>">
															<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0"><?=stripslashes($row['MET_NIC'])?> (<?=stripslashes($row['MET_NAME'])?>)</span>
														</label>
													</div>
											</div>
										<?}?>
									</div>
									<div class='col-md-12 row g-mb-20'>
										<hr class="d-flex g-brd-gray-light-v7 g-my-30">
									</div>
									<div class="form-group g-mb-20 col-md-3 col-sm-3">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">지급/차감 선택</h4>
										<label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
											<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="radio" name="POINT_TYPE" id="POINT_TYPE1" checked value="지급">
											<div class="u-check-icon-font g-absolute-centered--y g-left-0">
												<i class="fa" data-check-icon="&#xf192" data-uncheck-icon="&#xf1db"></i>
											</div>
											지급
										</label>
										<label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
											<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="radio" name="POINT_TYPE" id="POINT_TYPE2" value="차감">
											<div class="u-check-icon-font g-absolute-centered--y g-left-0">
												<i class="fa" data-check-icon="&#xf192" data-uncheck-icon="&#xf1db"></i>
											</div>
											차감
										</label>
									</div>
									<div class="form-group g-mb-20 col-md-3 col-sm-3">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">포인트</h4>
										<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_POINT' id='MET_POINT' type="text" numberOnly >
									</div>
									<div class="form-group g-mb-20 col-md-6 col-sm-6">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">사유</h4>
										<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='POT_CONTENT' id='POT_CONTENT' type="text">
									</div>
									<div class="form-group text-center col-md-12  ">
										<input class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" type='submit' value='발행'/>
									</div>
								</form>
							</div>
						</div>
          </div>
        </div>
      </div>
  </main>
  <?include_once "../inc/footer.php";?>
</body>
</html>
<script type="text/javascript">
<!--
	function submit_ck(){
		if($("input:checkbox[name='MET_IDX[]']:checked").length == 0){
			alert('회원을 선택해주세요!.');
			$("input:checkbox[name='MET_IDX[]']").eq(0).focus();
			return false;
		}else if(!$("#MET_POINT").val()){
			alert('포인트를 입력해주세요.');
			$("#MET_POINT").focus();
			return false;
		}else if(!$("#POT_CONTENT").val()){
			alert('포인트 가/감 사유를 입력해주세요.');
			$("#POT_CONTENT").focus();
			return false;
		}else{
			return true;
		}
	}
//-->
</script>
<script type="text/javascript">
<!--
	function search_submit(){
		var search = $("#sarch_input").val();
		location.href='point_write.php?sarch_input='+search;
	}
	$("input:text[numberOnly]").on("keyup", function() {
			$(this).val($(this).val().replace(/[^0-9]/g,""));
	});
//-->
</script>