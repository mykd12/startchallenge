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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">소식 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item">
                <span class="g-valign-middle">소식 <?if($mode=='NINSERT'){ echo "추가"; }else{ echo "수정"; }?></span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">소식 <?if($mode=='NINSERT'){ echo "ADD"; }else{ echo "MODIFY"; }?></h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm'>
					 <input type='hidden' id='mode' name='mode' value='<?=$mode?>'/>
					 <input type='hidden' id='NOT_IDX' name='NOT_IDX' value='<?=$NOT_IDX?>'/>
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
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">소식 제목</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='NOT_TITLE' id='NOT_TITLE' type="text" placeholder="소식 제목을 입력 해주세요." value="<?=$NOT_TITLE?>">
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">소식 구분</h4>
											<div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0">
												<select class="js-select u-select--v3-select u-sibling w-100" required="required" title="구분 선택" style="display: none;" name="NOT_CATE" id="NOT_CATE">
													<option value="공지사항" data-content='<span class="d-flex align-items-center w-100"><span>공지사항</span></span>' <?if($NOT_CATE=='공지사항'){ echo " selected "; }?>>공지사항
													</option>
													<option value="뉴스" data-content='<span class="d-flex align-items-center w-100"><span>뉴스</span></span>' <?if($NOT_CATE=='뉴스'){ echo " selected "; }?>>뉴스
													</option>
													<option value="이벤트" data-content='<span class="d-flex align-items-center w-100"><span>이벤트</span></span>' <?if($NOT_CATE=='이벤트'){ echo " selected "; }?>>이벤트
													</option>
												</select>
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-3">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이벤트 시작일 (※ 구분이 이벤트일때)</h4>
											<div id="datepickerWrapper1" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name='NOT_START_DATE' id='NOT_START_DATE' placeholder="이벤트 시작일" data-rp-wrapper="#datepickerWrapper1" data-rp-date-format="Y-m-d" value="<?=$NOT_START_DATE?>">
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-3">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이벤트 종료일 (※ 구분이 이벤트일때)</h4>
											<div id="datepickerWrapper2" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name='NOT_END_DATE' id='NOT_END_DATE' placeholder="이벤트 종료일" data-rp-wrapper="#datepickerWrapper2" data-rp-date-format="Y-m-d" value="<?=$NOT_END_DATE?>">
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
										<textarea class='form-control g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 g-py-10'  name='NOT_CONTENT' id='NOT_CONTENT' placeholder='소식 내용을 해주세요.'><?=$NOT_CONTENT?></textarea>
									</div>
									<!-- End 내용 Textarea -->
									<div class="form-group">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">썸네일 이미지	</h4>
											<input type='hidden' name='NOT_IMG_SAVE' id='NOT_IMG_SAVE' value='<?=$NOT_IMG_SAVE?>'/>
											<?if($NOT_IMG_SAVE){?>
											<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
													<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
														<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$NOT_IMG_ORG?>" data-src="../../uploads/<?=$NOT_IMG_SAVE?>" data-speed="350" data-caption="<?=$NOT_IMG_ORG?>">
															<img class="img-fluid" src="../../uploads/<?=$NOT_IMG_SAVE?>" alt="<?=$NOT_IMG_ORG?>" STYLE='max-width:150px;'>
														</a>
													</div>
											</div>
											<?}?>
										<div id='up_file_div'>
											<div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
												<input class="form-control form-control-md rounded-0" placeholder="썸네일 이미지를 선택해주세요." readonly="" type="text">
												<div class="input-group-btn">
													<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">SELECT</button>
													<input type="file" name='NOT_IMG' id='NOT_IMG'>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">첨부파일
											<a href="javascript:add_file();" class="btn btn-xs u-btn-outline-primary  g-ml-15 g-mb-5"><i class="fa fa-plus"></i></a>
											<a href="javascript:del_file();" class="btn btn-xs u-btn-outline-darkgray g-mb-5"><i class="fa fa-minus"></i></a>
										</h4>
										<?if($count_up > 0){?>
											<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10'>
												<?while($row_up = mysqli_fetch_array($result_up)){ // 반복문?>

													<a class="js-modal-markup u-link-v5  g-color-main  g-color-primary--hover g-mr-5  g-pl-10" href="../inc/down.php?sn=<?=$row_up['UP_FILE_SAVENAME']?>&on=<?=$row_up['UP_FILE_ORGNAME']?>" >
														<i class="fa fa-file"></i>    <?=$row_up['UP_FILE_ORGNAME']?>
													</a>
													<input type='hidden' name='UP_IDX[]' id='UP_IDX' value='<?=$row_up['UP_IDX']?>'/>
													<input type='hidden' name='UP_FILE_SAVENAME[]' id='UP_FILE_SAVENAME' value='<?=$row_up['UP_FILE_SAVENAME']?>'/>
													<label class='form-check-inline u-check g-pl-25 g-pr-15 g-brd-right g-brd-gray-light-v4'>
														<input class='g-hidden-xs-up g-pos-abs g-top-0 g-left-0' type='checkbox' name='UP_FILE_DEL[]' id='UP_FILE_DEL' value='<?=$row_up['UP_IDX']?>'>
														<div class='u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0'>
															<i class='fa' data-check-icon=''></i>
														</div>
														DEL
													</label>
												<?}?>
											</div>
										<?}?>
										<div id='up_file_div'>
											<div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
												<input class="form-control form-control-md rounded-0" placeholder="첨부파일 선택해주세요." readonly="" type="text" name='UPLOAD_FILE_NAME[]' id='UPLOAD_FILE_NAME'>

												<div class="input-group-btn">
												<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">SELECT</button>
												<input type="file" name='UPLOAD_FILE[]' id='UPLOAD_FILE'>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<a href="javascript:void(0);" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" id='SAVE_BTN'>SAVE</a>
									<a href="notice_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
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
			elPlaceHolder: "NOT_CONTENT",
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
			editor_object.getById["NOT_CONTENT"].exec("UPDATE_CONTENTS_FIELD", []);
			var ir1 = $("#NOT_CONTENT").val();


			if($("#NOT_TITLE").val() ==""){
				var NOT_TITLE = document.getElementById("NOT_TITLE");
				NOT_TITLE.focus();
				alert("소식 제목을 입력 해주세요.");
				return false;
			}

			if($("#NOT_CATE").val() ==""){
				var NOT_CATE = document.getElementById("NOT_CATE");
				NOT_CATE.focus();
				alert("소식 구분을 선택 해주세요.");
				return false;
			}

			if($("#NOT_CATE").val() =="이벤트" && (!$("#NOT_START_DATE").val() || !$("#NOT_END_DATE").val())){
				var NOT_START_DATE = document.getElementById("NOT_START_DATE");
				var NOT_END_DATE = document.getElementById("NOT_END_DATE");
				if(!$("#NOT_START_DATE").val()){
					NOT_START_DATE.focus();
				}else{
					NOT_END_DATE.focus();
				}
				alert("소식 이벤트 일정을 선택 해주세요.");
				return false;
			}

			if($("#NOT_CATE").val() =="이벤트" && !$("#NOT_IMG").val() && !$("#NOT_IMG_SAVE").val()){
				var NOT_IMG = document.getElementById("NOT_IMG");
				NOT_IMG.focus();
				alert("소식 이벤트 썸네일을 선택 해주세요.");
				return false;
			}

			if(ir1 =="" || ir1 == null || ir1 == '&nbsp;' || ir1 == '<p>&nbsp;</p>'){
				var NOT_CONTENT = document.getElementById("NOT_CONTENT");
				editor_object.getById["NOT_CONTENT"].exec("FOCUS");
				alert("소식 내용을 입력 해주세요.");
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

	function add_file(){

		var add_file_input ="<div class='input-group u-file-attach-v1 g-brd-gray-light-v2 add_upinput g-mt-5'>";
			add_file_input +="<input class='form-control form-control-md rounded-0  ' placeholder='첨부파일 선택해주세요.' readonly='' type='text'>";
			add_file_input +="<div class='input-group-btn'>";
			add_file_input +="<button class='btn btn-md h-100 u-btn-primary rounded-0' type='submit'>첨부</button>";
			add_file_input +="<input type='file' name='UPLOAD_FILE[]' id='UPLOAD_FILE'>";
			add_file_input +="</div>";
			add_file_input +="</div>";
			$("#up_file_div").append(add_file_input);
				// initialization of forms
			$.HSCore.helpers.HSFileAttachments.init();
			$.HSCore.components.HSFileAttachment.init('.js-file-attachment');
			$.HSCore.helpers.HSFocusState.init();
	}

	function del_file(){
		$(".add_upinput").last().remove();
	}

//-->
</script>

</body>

</html>
