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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">고객지원 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">이벤트 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item">
                <span class="g-valign-middle">이벤트 <?if($mode=='EINSERT'){ echo "추가"; }else{ echo "수정"; }?></span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">이벤트 <?if($mode=='EINSERT'){ echo "추가"; }else{ echo "수정"; }?></h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm'>
					 <input type='hidden' id='mode' name='mode' value='<?=$mode?>'/>
					 <input type='hidden' id='EVT_IDX' name='EVT_IDX' value='<?=$EVT_IDX?>'/>
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
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이벤트 제목</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='EVT_TITLE' id='EVT_TITLE' type="text" placeholder="이벤트 제목을 입력 해주세요." value="<?=$EVT_TITLE?>">
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이벤트 시작일</h4>
											<div id="datepickerWrapper1" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name='EVT_START_DATE' id='EVT_START_DATE' placeholder="이벤트 시작일" data-rp-wrapper="#datepickerWrapper1" data-rp-date-format="Y-m-d" value="<?=$EVT_START_DATE?>">
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이벤트 종료일</h4>
											<div id="datepickerWrapper2" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name='EVT_END_DATE' id='EVT_END_DATE' placeholder="이벤트 종료일" data-rp-wrapper="#datepickerWrapper2" data-rp-date-format="Y-m-d" value="<?=$EVT_END_DATE?>">
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
										</div>
									</div>
									<!-- End 제목 Input -->
									<!-- 내용 Textarea -->
									<div class="form-group g-mb-20">
										<textarea class='form-control g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 g-py-10'  name='EVT_CONTENT' id='EVT_CONTENT' placeholder='이벤트 내용을 해주세요.'><?=$EVT_CONTENT?></textarea>
									</div>
									<!-- End 내용 Textarea -->
									<div class="form-group">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">썸네일 이미지	</h4>
											<input type='hidden' name='EVT_IMG_SAVE' id='EVT_IMG_SAVE' value='<?=$EVT_IMG_SAVE?>'/>
											<?if($EVT_IMG_SAVE){?>
											<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
													<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
														<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$EVT_IMG_ORG?>" data-src="../../uploads/<?=$EVT_IMG_SAVE?>" data-speed="350" data-caption="<?=$EVT_IMG_ORG?>">
															<img class="img-fluid" src="../../uploads/<?=$EVT_IMG_SAVE?>" alt="<?=$EVT_IMG_ORG?>" STYLE='max-width:150px;'>
														</a>
													</div>
											</div>
											<?}?>
										<div id='up_file_div'>
											<div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
												<input class="form-control form-control-md rounded-0" placeholder="썸네일 이미지를 선택해주세요." readonly="" type="text">
												<div class="input-group-btn">
													<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">SELECT</button>
													<input type="file" name='EVT_IMG' id='EVT_IMG'>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<a href="javascript:void(0);" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" id='SAVE_BTN'><?if($mode=='EINSERT'){ echo "등 록"; }else{ echo "수 정"; }?></a>
									<a href="event_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">목 록</a>
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
	$(document).ready(function(){
		//전역변수선언
		var editor_object = [];

		nhn.husky.EZCreator.createInIFrame({
			oAppRef: editor_object,
			elPlaceHolder: "EVT_CONTENT",
			sSkinURI: "../SE/SmartEditor2Skin.html",
			htParams : {
				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
				bUseToolbar : true,
				// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
				bUseVerticalResizer : true,
				// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
				bUseModeChanger : true,
			}
		});

		$("#SAVE_BTN").click(function(){
			//id가 smarteditor인 textarea에 에디터에서 대입
			editor_object.getById["EVT_CONTENT"].exec("UPDATE_CONTENTS_FIELD", []);
			var ir1 = $("#EVT_CONTENT").val();


			if($("#EVT_TITLE").val() ==""){
				var EVT_TITLE = document.getElementById("EVT_TITLE");
				EVT_TITLE.focus();
				alert("제목을 입력 해주세요.");
				return false;
			}

			if($("#EVT_START_DATE").val() ==""){
				var EVT_START_DATE = document.getElementById("EVT_START_DATE");
				EVT_START_DATE.focus();
				alert("이벤트 시작일을 선택 해주세요.");
				return false;
			}

			if($("#EVT_END_DATE").val() ==""){
				var EVT_END_DATE = document.getElementById("EVT_END_DATE");
				EVT_END_DATE.focus();
				alert("이벤트 종료일을 선택 해주세요.");
				return false;
			}

			if(ir1 =="" || ir1 == null || ir1 == '&nbsp;' || ir1 == '<p>&nbsp;</p>'){
				var EVT_CONTENT = document.getElementById("EVT_CONTENT");
				editor_object.getById["EVT_CONTENT"].exec("FOCUS");
				alert("이벤트 내용을 입력 해주세요.");
				return false;
			}

			var action = "../inc/adminDAO.php";
			//폼 submit
			$('#frm').attr("enctype","multipart/form-data");
			$('#frm').attr("action",action);
			$('#frm').attr('action',action).attr('method', 'post').submit();
			return true;
		});

	});


//-->
</script>

</body>

</html>
