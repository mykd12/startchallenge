<?include_once "../inc/header.php";?>
<?include_once "../inc/adminVO.php";?>
<style type="text/css">
	.u-datepicker--v3 .flatpickr-month{height:50px;}
</style>


        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
          <!-- Breadcrumb-v1 -->
          <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
            <ul class="u-list-inline g-color-gray-dark-v6 add-location">

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">베스트 캠페인 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">베스트 리뷰 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item">
                <span class="g-valign-middle">베스트 리뷰 <?if($mode=='RVINSERT'){ echo "추가"; }else{ echo "수정"; }?></span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">베스트 리뷰 <?if($mode=='RVINSERT'){ echo "추가"; }else{ echo "수정"; }?></h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm' action="../inc/adminDAO.php" method='post' onsubmit="return submit_ck();" enctype="multipart/form-data">
					 <input type='hidden' id='mode' name='mode' value='<?=$mode?>'/>
					 <input type='hidden' id='RVT_IDX' name='RVT_IDX' value='<?=$RVT_IDX?>'/>
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
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">베스트 리뷰 제목</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='RVT_TITLE' id='RVT_TITLE' type="text" placeholder="리뷰 제목을 입력 해주세요." value="<?=$RVT_TITLE?>">
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">베스트 리뷰 내용</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='RVT_CONTENT' id='RVT_CONTENT' type="text" placeholder="리뷰 내용을 입력 해주세요." value="<?=$RVT_CONTENT?>">
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">베스트 리뷰 URL</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='RVT_URL' id='RVT_URL' type="text" placeholder="리뷰 URL을 입력 해주세요." value="<?=$RVT_URL?>">
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">베스트 리뷰 작성자</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='RVT_NAME' id='RVT_NAME' type="text" placeholder="리뷰 작성자를 입력 해주세요." value="<?=$RVT_NAME?>">
										</div>
									</div>
									<!-- End 제목 Input -->
									<!-- End 내용 Textarea -->
									<div class="form-group">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">썸네일 이미지	</h4>
											<input type='hidden' name='RVT_IMG_SAVE' id='RVT_IMG_SAVE' value='<?=$RVT_IMG_SAVE?>'/>
											<?if($RVT_IMG_SAVE){?>
											<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
													<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
														<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$RVT_IMG_ORG?>" data-src="../../uploads/<?=$RVT_IMG_SAVE?>" data-speed="350" data-caption="<?=$RVT_IMG_ORG?>">
															<img class="img-fluid" src="../../uploads/<?=$RVT_IMG_SAVE?>" alt="<?=$RVT_IMG_ORG?>" STYLE='max-width:150px;'>
														</a>
													</div>
											</div>
											<?}?>
										<div id='up_file_div'>
											<div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
												<input class="form-control form-control-md rounded-0" placeholder="썸네일 이미지를 선택해주세요." readonly="" type="text">
												<div class="input-group-btn">
													<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">SELECT</button>
													<input type="file" name='RVT_IMG' id='RVT_IMG'>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='<?if($mode=='RVINSERT'){ echo "등 록"; }else{ echo "수 정"; }?>' />
									<a href="review_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">목 록</a>
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
		if(!$("#RVT_TITLE").val()){
			alert("제목을 입력해주세요");
			$("#RVT_TITLE").focus();
			return false;
		}else if(!$("#RVT_CONTENT").val()){
			alert("내용을 입력해주세요");
			$("#RVT_CONTENT").focus();
			return false;
		}else if(!$("#RVT_URL").val()){
			alert("URL을 입력해주세요");
			$("#RVT_URL").focus();
			return false;
		}else if(!$("#RVT_NAME").val()){
			alert("작성자를 입력해주세요");
			$("#RVT_NAME").focus();
			return false;
		}else if(!$("#RVT_IMG").val() && !$("#RVT_IMG_SAVE").val()){
			alert("썸네일 이미지를 등록해주세요");
			$("#RVT_IMG").focus();
			return false;
		}else{
			return true;
		}
	}

//-->
</script>

</body>

</html>
