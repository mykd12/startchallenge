<?include_once "../inc/header.php";?>
<?include_once "../inc/adminVO.php";?>

        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
          <!-- Breadcrumb-v1 -->
          <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
            <ul class="u-list-inline g-color-gray-dark-v6 add-location">

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">홈</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">메인비쥬얼 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>


              <li class="list-inline-item">
                <span class="g-valign-middle">메인비쥬얼 <?if($mode=='MVINSERT'){ echo "추가"; }else{ echo "수정"; }?></span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">메인비쥬얼 <?if($mode=='MVINSERT'){ echo "ADD"; }else{ echo "MODIFY"; }?></h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm' action="../inc/adminDAO.php" method="post" enctype="multipart/form-data" onsubmit="return submit_ck();">
					 <input type='hidden' id='mode' name='mode' value='<?=$mode?>'/>
           <input type='hidden' id='MVT_IDX' name='MVT_IDX' value='<?=$MVT_IDX?>'/>
					 <input type='hidden' id='pageNo' name='pageNo' value='<?=$pageNo?>'/>
					 <input type='hidden' id='search' name='search' value='<?=$search?>'/>
							<div class="row">
								<!-- 1-st column -->
								<div class="col-md-12 ">
								<!-- Basic Text Inputs -->
								<div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

									<!-- 제목 Input -->
									<div class="row">
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">제목</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MVT_TITLE' id='MVT_TITLE' type="text" placeholder="이미지 제목을 입력 해주세요." value="<?=stripslashes($MVT_TITLE)?>">
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">부제목</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MVT_SUB_TITLE' id='MVT_SUB_TITLE' type="text" placeholder="이미지 부제목을 입력 해주세요." value="<?=stripslashes($MVT_SUB_TITLE)?>">
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">링크 URL</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MVT_URL' id='MVT_URL' type="text" placeholder="이미지 부제목을 입력 해주세요." value="<?=stripslashes($MVT_URL)?>">
										</div>
									</div>
									<div class="form-group g-mb-20 ">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이미지	</h4>
										<input type='hidden' name='MVT_IMG_SAVE' id='MVT_IMG_SAVE' value='<?=$MVT_IMG_SAVE?>'/>
										<?if($MVT_IMG_SAVE){?>
												<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
														<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
															<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$MVT_IMG_ORG?>" data-src="../../uploads/<?=$MVT_IMG_SAVE?>" data-speed="350" data-caption="<?=$MVT_IMG_ORG?>">
																<img class="img-fluid" src="../../uploads/<?=$MVT_IMG_SAVE?>" alt="<?=$MVT_IMG_ORG?>" STYLE='max-width:350px;'>
															</a>
														</div>
												</div>
										<?}?>
										<div >
											<div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
												<input class="form-control form-control-md rounded-0" placeholder="썸네일 이미지를 선택해주세요." readonly="" type="text">
												<div class="input-group-btn">
													<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">SELECT</button>
													<input type="file" name='MVT_IMG' id='MVT_IMG'>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='<?if($mode=='MVINSERT'){ echo "ADD"; }else{ echo "MODIFY"; }?>'>
									<a href="main_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
								</div>
							</div>
						</form>
          </div>
        </div>
      </div>
  </main>

  <?include_once "../inc/footer.php";?>
	<script type="text/javascript">
<!--
  function submit_ck(){
    if(!$("#MVT_TITLE").val()){
      alert("제목을 입력해주세요.");
      $("#MVT_TITLE").focus();
      return false;
    }else if(!$("#MVT_SUB_TITLE").val()){
      alert("간략설명을 입력해주세요.");
      $("#MVT_SUB_TITLE").focus();
      return false;
    }else if(!$("#MVT_URL").val()){
      alert("링크 URL을 입력해주세요.");
      $("#MVT_URL").focus();
      return false;
    }else if(!$("#MVT_IMG_SAVE").val() && !$("#MVT_IMG").val()){
      alert("이미지를 선택 해주세요.");
      $("#MVT_IMG").focus();
      return false;
    }else {
      return true;
    }

  }
//-->
</script>

</body>

</html>
