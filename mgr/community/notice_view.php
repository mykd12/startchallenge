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

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">소식 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item">
                <span class="g-valign-middle">소식 상세보기</span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20" id="CTs-view">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">소식 상세보기</h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">

            <div class="row">
              <div class="col-md-12">
                <!-- Panel -->
                <div class="card g-brd-gray-light-v7 g-rounded-3 g-mb-30 add-view-page">
                  <header class="card-header g-bg-transparent g-brd-bottom-none g-px-15 g-px-30--sm g-pt-15 g-pt-20--sm pb-0">
                    <div class="media">
                      <h3 class="media-body d-flex align-self-center text-uppercase g-font-size-28 g-font-size-25--md g-color-black mb-0 view_title" ><?=$NOT_TITLE?></h3>

                      <div class="d-flex align-self-center justify-content-end g-width-200--sm">
                        <div class="align-self-center g-pos-rel g-z-index-2">
                          <a id="dropDown4Invoker" class="u-link-v5 g-pos-rel g-top-4 g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-lightblue-v3--hover g-ml-10 g-ml-20--md" href="#!" aria-controls="dropDown4" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click"
                          data-dropdown-target="#dropDown4" data-dropdown-type="jquery-slide">
                            <i class="hs-admin-more-alt"></i>
                          </a>

                          <div id="dropDown4" class="u-shadow-v31 g-pos-abs g-right-0 g-bg-white" aria-labelledby="dropDown4Invoker">
                            <ul class="list-unstyled g-nowrap mb-0">
                              <li>
                                <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="notice_write.php?mode=NMODIFY&NOT_IDX=<?=$NOT_IDX?>&pageNo=<?=$pageNo?>&search=<?=$search?>">
                                  <i class="hs-admin-pencil g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                  MODIFY
                                </a>
                              </li>
                              <li>
                                <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="../inc/adminDAO.php?mode=NDELETE&NOT_IDX=<?=$NOT_IDX?>&pageNo=<?=$pageNo?>&search=<?=$search?>"  onclick="return confirm('삭제하시겠습니까?');">
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
	                    <?=$NOT_CONTENT?>
										</div>
                  </div>
                </div>
                <!-- End Panel -->
              </div>
							<?if($NOT_IMG_SAVE){?>
								<div class="form-group col-md-12">
									<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">썸네일 이미지	</h4>
										<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
												<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
													<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$NOT_IMG_ORG?>" data-src="../../uploads/<?=$NOT_IMG_SAVE?>" data-speed="350" data-caption="<?=$NOT_IMG_ORG?>">
														<img class="img-fluid" src="../../uploads/<?=$NOT_IMG_SAVE?>" alt="<?=$NOT_IMG_ORG?>" STYLE='max-width:150px;'>
													</a>
												</div>
										</div>
								</div>
							<?}?>
							<?if($count_up > 0){?>
							<div class="col-md-12 col-sm-12 col-xs-12 g-mb-30 add-file">
								<h4 class="h4 g-font-size-17 g-color-blue g-mb-10 g-px-30--sm">&middot; 첨부파일</h4>
                <!-- Panel -->
                <div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 text-left ">
									<?while($row_up = mysqli_fetch_array($result_up)){ // 반복문?>
										<a class="js-modal-markup u-link-v5  g-color-main  g-color-primary--hover g-mr-5  g-pl-10 g-mb-10 g-bg-gray-light-v5" href="../inc/down.php?sn=<?=$row_up['UP_FILE_SAVENAME']?>&on=<?=$row_up['UP_FILE_ORGNAME']?>" >
											<i class="fa fa-file"></i>    <?=$row_up['UP_FILE_ORGNAME']?>
										</a>
									<?}?>
                </div>
                <!-- End Panel -->
              </div>
							<?}?>
							<div class='col-md-12 text-center'>
								<a href="notice_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
							</div>
            </div>
          </div>


        </div>
      </div>
    </section>
  </main>

    <?include_once "../inc/footer.php";?>


</body>

</html>
