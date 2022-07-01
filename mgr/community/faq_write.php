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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">홈</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">고객지원 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">자주하는 질문 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item">
                <span class="g-valign-middle">자주하는 질문 <?if($mode=='FINSERT'){ echo "추가"; }else{ echo "수정"; }?></span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">자주하는 질문 <?if($mode=='FINSERT'){ echo "ADD"; }else{ echo "MODIFY"; }?></h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm' method="post" action="../inc/adminDAO.php" onsubmit="return sumbit_ck();">
					 <input type='hidden' id='mode' name='mode' value='<?=$mode?>'/>
					 <input type='hidden' id='FAT_IDX' name='FAT_IDX' value='<?=$FAT_IDX?>'/>
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
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">자주하는 질문</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='FAT_QUESTION' id='FAT_QUESTION' type="text" placeholder="자주찾는 질문을 입력 해주세요." value="<?=$FAT_QUESTION?>">
										</div>
									</div>
									<!-- End 제목 Input -->
									<!-- 내용 Textarea -->
									<div class="form-group g-mb-20">
										<textarea class='form-control g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 g-py-10'  name='FAT_ANSWER' id='FAT_ANSWER' placeholder='자주찾는 질문 답변을을 해주세요.'><?=$FAT_ANSWER?></textarea>
									</div>
									<!-- End 내용 Textarea -->
								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
									<a href="faq_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
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
	function sumbit_ck(){
		if(!$("#FAT_QUESTION").val()){
			alert("질문을 입력해주세요");
			$("#FAT_QUESTION").focus();
			return false;
		}else if(!$("#FAT_ANSWER").val()){
			alert("답변을 입력해주세요");
			$("#FAT_ANSWER").focus();
			return false;
		}
	}


//-->
</script>

</body>

</html>
