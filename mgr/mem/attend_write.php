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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">회원 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">환급 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item">
                <span class="g-valign-middle">환급 관리 수정</span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">환급 관리 수정</h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm' action="../inc/adminDAO.php" method='post' enctype="multipart/form-data" onsubmit="return submit_ck();">
					 <input type='hidden' id='mode' name='mode' value='<?=$mode?>'/>
					 <input type='hidden' id='RFT_IDX' name='RFT_IDX' value='<?=$RFT_IDX?>'/>
					 <input type='hidden' id='pageNo' name='pageNo' value='<?=$pageNo?>'/>
					 <input type='hidden' id='search' name='search' value='<?=$search?>'/>
							<div class="row">
								<!-- 1-st column -->
								<div class="col-md-12 ">
								<!-- Basic Text Inputs -->
								<div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

									<!-- 제목 Input -->
									<div class="row">
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">입금자 이름</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='RFT_NAME' id='RFT_NAME' type="text" placeholder="입금자 이름 입력 해주세요." value="<?=$RFT_NAME?>">
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">입금자 이름</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='RFT_TEL' id='RFT_TEL' type="text" placeholder="연락처를 입력해주세요." value="<?=$RFT_TEL?>">
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">은행 명</h4>
											<div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0">
												<select class="js-select u-select--v3-select u-sibling w-100" required="required" title="구분 선택" style="display: none;" name="RFT_BANK" id="RFT_BANK">
													<option value="국민은행" data-content='<span class="d-flex align-items-center w-100"><span>국민은행</span></span>' <?if($RFT_BANK=='국민은행'){ echo " selected "; }?>>국민은행
													</option>
													<option value="기업은행" data-content='<span class="d-flex align-items-center w-100"><span>기업은행</span></span>' <?if($RFT_BANK=='기업은행'){ echo " selected "; }?>>기업은행
													</option>
													<option value="농협" data-content='<span class="d-flex align-items-center w-100"><span>농협</span></span>' <?if($RFT_BANK=='농협'){ echo " selected "; }?>>농협
													</option>
													<option value="신한(구조흥)" data-content='<span class="d-flex align-items-center w-100"><span>신한(구조흥)</span></span>' <?if($RFT_BANK=='신한(구조흥)'){ echo " selected "; }?>>신한(구조흥)
													</option>
													<option value="우체국" data-content='<span class="d-flex align-items-center w-100"><span>우체국</span></span>' <?if($RFT_BANK=='우체국'){ echo " selected "; }?>>우체국
													</option>
													<option value="SC(스텐다드차타드)" data-content='<span class="d-flex align-items-center w-100"><span>SC(스텐다드차타드)</span></span>' <?if($RFT_BANK=='SC(스텐다드차타드)'){ echo " selected "; }?>>SC(스텐다드차타드)
													</option>
													<option value="한국씨티(구한미)" data-content='<span class="d-flex align-items-center w-100"><span>한국씨티(구한미)</span></span>' <?if($RFT_BANK=='한국씨티(구한미)'){ echo " selected "; }?>>한국씨티(구한미)
													</option>
													<option value="우리은행" data-content='<span class="d-flex align-items-center w-100"><span>우리은행</span></span>' <?if($RFT_BANK=='우리은행'){ echo " selected "; }?>>우리은행
													</option>
													<option value="경남은행" data-content='<span class="d-flex align-items-center w-100"><span>경남은행</span></span>' <?if($RFT_BANK=='경남은행'){ echo " selected "; }?>>경남은행
													</option>
													<option value="광주은행" data-content='<span class="d-flex align-items-center w-100"><span>광주은행</span></span>' <?if($RFT_BANK=='광주은행'){ echo " selected "; }?>>광주은행
													</option>
													<option value="대구은행" data-content='<span class="d-flex align-items-center w-100"><span>대구은행</span></span>' <?if($RFT_BANK=='대구은행'){ echo " selected "; }?>>대구은행
													</option>
													<option value="도이치뱅크" data-content='<span class="d-flex align-items-center w-100"><span>도이치뱅크</span></span>' <?if($RFT_BANK=='도이치뱅크'){ echo " selected "; }?>>도이치뱅크
													</option>
													<option value="부산은행" data-content='<span class="d-flex align-items-center w-100"><span>부산은행</span></span>' <?if($RFT_BANK=='부산은행'){ echo " selected "; }?>>부산은행
													</option>
													<option value="산업은행" data-content='<span class="d-flex align-items-center w-100"><span>산업은행</span></span>' <?if($RFT_BANK=='산업은행'){ echo " selected "; }?>>산업은행
													</option>
													<option value="수협" data-content='<span class="d-flex align-items-center w-100"><span>수협</span></span>' <?if($RFT_BANK=='수협'){ echo " selected "; }?>>수협
													</option>
													<option value="전북은행" data-content='<span class="d-flex align-items-center w-100"><span>전북은행</span></span>' <?if($RFT_BANK=='전북은행'){ echo " selected "; }?>>전북은행
													</option>
													<option value="제주은행" data-content='<span class="d-flex align-items-center w-100"><span>제주은행</span></span>' <?if($RFT_BANK=='제주은행'){ echo " selected "; }?>>제주은행
													</option>
													<option value="새마을금고" data-content='<span class="d-flex align-items-center w-100"><span>새마을금고</span></span>' <?if($RFT_BANK=='새마을금고'){ echo " selected "; }?>>새마을금고
													</option>
													<option value="신용협동조합" data-content='<span class="d-flex align-items-center w-100"><span>신용협동조합</span></span>' <?if($RFT_BANK=='신용협동조합'){ echo " selected "; }?>>신용협동조합
													</option>
													<option value="홍콩상하이(HSBC)" data-content='<span class="d-flex align-items-center w-100"><span>홍콩상하이(HSBC)</span></span>' <?if($RFT_BANK=='홍콩상하이(HSBC)'){ echo " selected "; }?>>홍콩상하이(HSBC)
													</option>
													<option value="상호저축은행중앙회" data-content='<span class="d-flex align-items-center w-100"><span>상호저축은행중앙회</span></span>' <?if($RFT_BANK=='상호저축은행중앙회'){ echo " selected "; }?>>상호저축은행중앙회
													</option>
													<option value="뱅크오브아메리카" data-content='<span class="d-flex align-items-center w-100"><span>뱅크오브아메리카</span></span>' <?if($RFT_BANK=='뱅크오브아메리카'){ echo " selected "; }?>>뱅크오브아메리카
													</option>
													<option value="케이뱅크" data-content='<span class="d-flex align-items-center w-100"><span>케이뱅크</span></span>' <?if($RFT_BANK=='케이뱅크'){ echo " selected "; }?>>케이뱅크
													</option>
													<option value="카카오뱅크" data-content='<span class="d-flex align-items-center w-100"><span>카카오뱅크</span></span>' <?if($RFT_BANK=='카카오뱅크'){ echo " selected "; }?>>카카오뱅크
													</option>
													<option value="제이피모간체이스" data-content='<span class="d-flex align-items-center w-100"><span>제이피모간체이스</span></span>' <?if($RFT_BANK=='제이피모간체이스'){ echo " selected "; }?>>제이피모간체이스
													</option>
													<option value="비엔피파리바" data-content='<span class="d-flex align-items-center w-100"><span>비엔피파리바</span></span>' <?if($RFT_BANK=='비엔피파리바'){ echo " selected "; }?>>비엔피파리바
													</option>
													<option value="중국건설은행" data-content='<span class="d-flex align-items-center w-100"><span>중국건설은행</span></span>' <?if($RFT_BANK=='중국건설은행'){ echo " selected "; }?>>중국건설은행
													</option>
													<option value="산림조합" data-content='<span class="d-flex align-items-center w-100"><span>산림조합</span></span>' <?if($RFT_BANK=='산림조합'){ echo " selected "; }?>>산림조합
													</option>
													<option value="중국공상" data-content='<span class="d-flex align-items-center w-100"><span>중국공상</span></span>' <?if($RFT_BANK=='중국공상'){ echo " selected "; }?>>중국공상
													</option>
												</select>
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">계좌 번호</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='RFT_NUMBER' id='RFT_NUMBER' type="text" placeholder="계좌번호를 입력 해주세요." value="<?=$RFT_NUMBER?>">
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">포인트</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='RFT_POINT' id='RFT_POINT' type="text" placeholder="포인트 입력 해주세요." value="<?=number_format($RFT_POINT)?>" readonly>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">지급일</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='RFT_DATE' id='RFT_DATE' type="text" placeholder="지급일 입력 해주세요." value="<?=$RFT_DATE?>" readonly>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">단계</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='RFT_APP' id='RFT_APP' type="text" placeholder="단계를 입력 해주세요." value="<?=$RFT_APP?>" readonly>
										</div>
									</div>
									<!-- End 제목 Input -->
									<!-- End 내용 Textarea -->
								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<input type='submit' class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='수 정' />
									<a href="attend_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">목 록</a>
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
		if(!$("#RFT_NAME").val()){
			alert("입금자 이름을 입력해주세요.");
			$("#RFT_NAME").focus();
			return false;
		}else if(!$("#RFT_TEL").val()){
			alert("연락처를 입력해주세요.");
			$("#RFT_TEL").focus();
			return false;
		}else if(!$("#RFT_BANK").val()){
			alert("은행명을 입력해주세요.");
			$("#RFT_BANK").focus();
			return false;
		}else if(!$("#RFT_NUMBER").val()){
			alert("계좌번호를 입력해주세요.");
			$("#RFT_NUMBER").focus();
			return false;
		}else{
			return true;
		}
	}


//-->
</script>

</body>

</html>
