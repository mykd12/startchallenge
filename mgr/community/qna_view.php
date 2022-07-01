<?include_once "../inc/header.php";?>
<?include_once "../inc/adminVO.php";?>
<style type="text/css">
	.card-block img{max-width:100%;}
</style>


        <div class="col g-ml-50 g-ml-0--lg ">
          <!-- Breadcrumb-v1 -->
          <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
            <ul class="u-list-inline g-color-gray-dark-v6 add-location">

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">홈</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">고객지원 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>


              <li class="list-inline-item">
                <span class="g-valign-middle">1:1 문의 상세보기</span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20" id="CTs-view">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">1:1 문의 상세보기</h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
						<form action="../inc/adminDAO.php" method="post" name="frm" id="frm" onsubmit="return submit_ck();">
						<input type="hidden" name="mode" id="mode" value="<?=$mode?>"/>
						<input type="hidden" name="QNT_IDX" id="QNT_IDX" value="<?=$QNT_IDX?>"/>
							<div class="row">
								<div class="col-md-12">
									<!-- Panel -->
									<div class="card g-brd-gray-light-v7 g-rounded-3 g-mb-30 add-view-page">
										<header class="card-header g-bg-transparent g-brd-bottom-none g-px-15 g-px-30--sm g-pt-15 g-pt-20--sm pb-0">
											<div class="media">
												<h3 class="media-body d-flex align-self-center text-uppercase g-font-size-28 g-font-size-25--md g-color-black mb-0 view_title" ><?=$QNT_TITLE?></h3>

												<div class="d-flex align-self-center justify-content-end g-width-200--sm">
													<div class="align-self-center g-pos-rel g-z-index-2">
														<a id="dropDown4Invoker" class="u-link-v5 g-pos-rel g-top-4 g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-lightblue-v3--hover g-ml-10 g-ml-20--md" href="#!" aria-controls="dropDown4" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click"
														data-dropdown-target="#dropDown4" data-dropdown-type="jquery-slide">
															<i class="hs-admin-more-alt"></i>
														</a>

														<div id="dropDown4" class="u-shadow-v31 g-pos-abs g-right-0 g-bg-white" aria-labelledby="dropDown4Invoker">
															<ul class="list-unstyled g-nowrap mb-0">
																<li>
																	<a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="../inc/adminDAO.php?mode=QDELETE&QNT_IDX=<?=$QNT_IDX?>&pageNo=<?=$pageNo?>&search=<?=$search?>"  onclick="return confirm('삭제하시겠습니까?');">
																		<i class="hs-admin-trash g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
																		DELETE
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</header>

										<div class="card-block">
											<div class="card g-brd-gray-light-v7 g-pt-30 g-pb-30 g-px-30--sm g-bg-gray-light-v5">
												<div class="row">
													<div class="form-group g-mb-10  col-sm-4 g-mb-20">
														<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">질문 유형</h4>
															<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 " style="height:48px;" value="<?=$QNT_CATE1?>" readonly>
													</div>
													<div class="form-group g-mb-10  col-sm-4 g-mb-20">
														<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">아이디</h4>
															<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 " style="height:48px;" value="<?=$MET_ID?>" readonly>
													</div>
													<div class="form-group g-mb-10  col-sm-4 g-mb-20">
														<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이름</h4>
															<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 " style="height:48px;" value="<?=$MET_NAME?>" readonly>
													</div>
													<div class="form-group g-mb-10  col-sm-4 g-mb-20">
														<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">닉네임</h4>
															<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 " style="height:48px;" value="<?=$MET_NIC?>" readonly>
													</div>
													<div class="form-group g-mb-10  col-sm-4 g-mb-20">
														<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">연락처</h4>
															<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 " style="height:48px;" value="<?=$MET_TEL?>" readonly>
													</div>
													<div class="form-group g-mb-10  col-sm-4 g-mb-20">
														<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이메일</h4>
															<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 " style="height:48px;" value="<?=$MET_EMAIL?>" readonly>
													</div>
													<div class="form-group g-mb-10  col-sm-2 g-mb-20">
														<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">우편번호</h4>
															<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 " style="height:48px;" value="<?=$MET_ZIP?>" readonly>
													</div>
													<div class="form-group g-mb-10  col-sm-5 g-mb-20">
														<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">주소</h4>
															<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 " style="height:48px;" value="<?=$MET_ADDR1?>" readonly>
													</div>
													<div class="form-group g-mb-10  col-sm-5 g-mb-20">
														<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">상세주소</h4>
															<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" style="height:48px;" value="<?=$MET_ADDR2?>" readonly>
													</div>
													<div class="form-group g-mt-10  col-sm-12">
														<?=$QNT_CONTENT?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End Panel -->
								</div>
								<div class='col-md-12 text-center g-mt-20'  id="CTs-write">
									<input type="hidden" name="QAT_IDX" id="QAT_IDX" value="<?=$QAT_IDX?>"/>
									<textarea class='form-control g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 g-py-10'  name='QAT_CONTENT' id='QAT_CONTENT' placeholder='답변을 해주세요.'><?=$QAT_CONTENT?></textarea>
								</div>
								<div class='col-md-12 text-center'>
									<input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
									<a href="qna_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
								</div>
							</div>
						</form>
          </div>
        </div>
      </div>
    </section>
  </main>

    <?include_once "../inc/footer.php";?>


</body>

</html>
<script type="text/javascript">
<!--
	function submit_ck(){
		if(!$("#QAT_CONTENT").val()){
			alert("답변을 입력해주세요!");
			$("#QAT_CONTENT").focus();
			return false;
		}else{
			return true;
		}
	}
//-->
</script>