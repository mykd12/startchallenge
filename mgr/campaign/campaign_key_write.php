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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">캠페인 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item">
                <span class="g-valign-middle">캠페인 <?if($mode=='CPINSERT'){ echo "ADD"; }else{ echo "MODIFY"; }?></span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">캠페인 <?if($mode=='CPINSERT'){ echo "ADD"; }else{ echo "MODIFY"; }?></h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm'>
						 <input type='hidden' id='mode' name='mode' value='<?=$mode?>'/>
						 <input type='hidden' id='CPT_IDX' name='CPT_IDX' value='<?=$CPT_IDX?>'/>
						 <input type='hidden' id='pageNo' name='pageNo' value='<?=$pageNo?>'/>
						 <input type='hidden' id='search' name='search' value='<?=$search?>'/>
						 <input type='hidden' id='cate' name='cate' value='<?=$cate?>'/>
							<div class="row">
								<!-- 1-st column -->
								<div class="col-md-12 ">
								<!-- Basic Text Inputs -->
								<div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

									<!-- 제목 Input -->
									<div class="row">
										<div class="form-group g-mb-20 col-md-8">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인명</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_TITLE' id='CPT_TITLE' type="text" value="<?=$CPT_TITLE?>" placeholder='캠페인명을 입력 해주세요.' autocomplete='off'>
										</div>
										<div class="form-group g-mb-20 col-md-4">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">활성화/비활성화</h4>
											<div class="btn-group justified-content">
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_VIEW" id="CPT_VIEW1" type="radio" value="Y" <?if($CPT_VIEW=='Y' || !$CPT_VIEW){?>checked<?}?>>
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">활성화</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_VIEW" id="CPT_VIEW2" type="radio" value="N" <?if($CPT_VIEW=='N'){?>checked<?}?>>
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">비활성화</span>
												</label>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">업체명</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_NAME' id='CPT_NAME' type="text" value="<?=$CPT_NAME?>" placeholder='업체 명' autocomplete='off'>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">예약문의 업체 연락처</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_TEL' id='CPT_TEL' type="text" value="<?=$CPT_TEL?>" placeholder='예약 문의 연락처' autocomplete='off'>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 비고 (관리자 업체관리용)</h4>
											<textarea  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_ETC' id='CPT_ETC' placeholder='캠페인 비고 사항' autocomplete='off'><?=$CPT_ETC?></textarea>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">구분 1</h4>
											<div class="btn-group justified-content">
												<label class="u-check">

													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE1[]" id="CPT_CATE11" value="블로그" <?if(strpos($CPT_CATE1, "블로그") !== false){ echo " checked "; }?>  type="checkbox">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">블로그</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE1[]" id="CPT_CATE12" value="인스타그램" <?if(strpos($CPT_CATE1, "인스타그램") !== false){ echo " checked "; }?> type="checkbox">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">인스타그램</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE1[]" id="CPT_CATE12" value="유튜브" <?if(strpos($CPT_CATE1, "유튜브") !== false){ echo " checked "; }?> type="checkbox">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">유튜브</span>
												</label>
												<!--<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE1" id="CPT_CATE13" value="쇼핑" <?if($CPT_CATE1=='쇼핑'){ echo " checked "; }?> type="checkbox">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">쇼핑</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE1" id="CPT_CATE14" value="기자단" <?if($CPT_CATE1=='기자단'){ echo " checked "; }?> type="checkbox">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">기자단</span>
												</label>-->
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE1[]" id="CPT_CATE15" value="기타" <?if(strpos($CPT_CATE1, "기타") !== false){ echo " checked "; }?> type="checkbox">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">기타</span>
												</label>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">구분 2</h4>
											<div class="btn-group justified-content">
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE2" id="CPT_CATE21" <?if($CPT_CATE2=='지역'){ echo " checked "; }?> value="지역" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">지역</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE2" id="CPT_CATE22" <?if($CPT_CATE2=='제품'){ echo " checked "; }?> value="제품" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">제품</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE2" id="CPT_CATE24" <?if($CPT_CATE2=='배달'){ echo " checked "; }?> value="배달" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">배달</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE2" id="CPT_CATE23" <?if($CPT_CATE2=='기자단'){ echo " checked "; }?> value="기자단" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">기자단</span>
												</label>
												<!--<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE2" id="CPT_CATE24" <?if($CPT_CATE2=='쇼핑/구매평'){ echo " checked "; }?> value="쇼핑/구매평" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">쇼핑/구매평</span>
												</label>-->
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">구분 3</h4>
											<div class="btn-group justified-content">
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE31" <?if($CPT_CATE3=='맛집'){ echo " checked "; }?> value="맛집" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">맛집</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE32" <?if($CPT_CATE3=='뷰티'){ echo " checked "; }?> value="뷰티" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">뷰티</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE33" <?if($CPT_CATE3=='숙박'){ echo " checked "; }?> value="숙박" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">숙박</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE34" <?if($CPT_CATE3=='문화'){ echo " checked "; }?> value="문화" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">문화</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE35" <?if($CPT_CATE3=='생활리빙'){ echo " checked "; }?> value="생활리빙" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">생활리빙</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE36" <?if($CPT_CATE3=='유아동'){ echo " checked "; }?> value="유아동" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">유아동</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE37" <?if($CPT_CATE3=='디지털가전'){ echo " checked "; }?> value="디지털가전" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">디지털가전</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE38" <?if($CPT_CATE3=='패션'){ echo " checked "; }?> value="패션" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">패션</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE39" <?if($CPT_CATE3=='교육도서'){ echo " checked "; }?> value="교육도서" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">교육도서</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE310" <?if($CPT_CATE3=='식품'){ echo " checked "; }?> value="식품" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">식품</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="CPT_CATE3" id="CPT_CATE311" <?if($CPT_CATE3=='기타'){ echo " checked "; }?> value="기타" type="radio">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">기타</span>
												</label>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">지역</h4>
											<div class="btn-group justified-content g-mb-10">
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA1" <?if(in_array("강남/논현/서초", $CPT_AREA)){ echo " checked "; }?> value="강남/논현/서초">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">강남/논현/서초</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA2" <?if(in_array("송파/잠실/강동", $CPT_AREA)){ echo " checked "; }?> value="송파/잠실/강동">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">송파/잠실/강동</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA3" <?if(in_array("압구정/신사/교대/사당/삼성/선릉", $CPT_AREA)){ echo " checked "; }?> value="압구정/신사/교대/사당/삼성/선릉">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">압구정/신사/교대/사당/삼성/선릉</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA4" <?if(in_array("노원/강북/수유/동대문", $CPT_AREA)){ echo " checked "; }?> value="노원/강북/수유/동대문">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">노원/강북/수유/동대문</span>
												</label>
											</div>
											<div class="btn-group justified-content g-mb-10">
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA5" <?if(in_array("종로/대학로/명동/이태원", $CPT_AREA)){ echo " checked "; }?> value="종로/대학로/명동/이태원">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked  rounded-0">종로/대학로/명동/이태원</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA6" <?if(in_array("홍대/마포/은평/신촌/이대", $CPT_AREA)){ echo " checked "; }?> value="홍대/마포/은평/신촌/이대">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">홍대/마포/은평/신촌/이대</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA7" <?if(in_array("관악/신림/동작", $CPT_AREA)){ echo " checked "; }?> value="관악/신림/동작">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">관악/신림/동작</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA8" <?if(in_array("여의도/영등포/강서/목동", $CPT_AREA)){ echo " checked "; }?> value="여의도/영등포/강서/목동">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">여의도/영등포/강서/목동</span>
												</label>
											</div>
											<div class="btn-group justified-content g-mb-10">
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA9" <?if(in_array("인천/부천/부평", $CPT_AREA)){ echo " checked "; }?> value="인천/부천/부평">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked  rounded-0">인천/부천/부평</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA10" <?if(in_array("파주/김포/의정부/남양주", $CPT_AREA)){ echo " checked "; }?> value="파주/김포/의정부/남양주">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">파주/김포/의정부/남양주</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA11" <?if(in_array("가평/양평/여주", $CPT_AREA)){ echo " checked "; }?> value="가평/양평/여주">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">가평/양평/여주</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA12" <?if(in_array("하남/광주", $CPT_AREA)){ echo " checked "; }?> value="하남/광주">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">하남/광주</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA13" <?if(in_array("성남/용인/분당/수원", $CPT_AREA)){ echo " checked "; }?> value="성남/용인/분당/수원">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">성남/용인/분당/수원</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA14" <?if(in_array("기타 경기", $CPT_AREA)){ echo " checked "; }?> value="기타 경기">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">기타 경기</span>
												</label>
											</div>
											<div class="btn-group justified-content g-mb-10">
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA15" <?if(in_array("대전/충청", $CPT_AREA)){ echo " checked "; }?> value="대전/충청">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked  rounded-0">대전/충청</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA16" <?if(in_array("대구/경북", $CPT_AREA)){ echo " checked "; }?> value="대구/경북">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">대구/경북</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA17" <?if(in_array("부산/경남", $CPT_AREA)){ echo " checked "; }?> value="부산/경남">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">부산/경남</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA18" <?if(in_array("광주/전라", $CPT_AREA)){ echo " checked "; }?> value="광주/전라">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">광주/전라</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA19" <?if(in_array("세종", $CPT_AREA)){ echo " checked "; }?> value="세종">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">세종</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA20" <?if(in_array("울산", $CPT_AREA)){ echo " checked "; }?> value="울산">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">울산</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA21" <?if(in_array("강원", $CPT_AREA)){ echo " checked "; }?> value="강원">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">강원</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='CPT_AREA[]' id="CPT_AREA22" <?if(in_array("제주", $CPT_AREA)){ echo " checked "; }?> value="제주">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">제주</span>
												</label>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">주소</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_ADDR1' id='CPT_ADDR1' type="text" value="<?=$CPT_ADDR1?>"  placeholder='주소를 입력 해주세요.'  readonly onclick="execDaumPostcode();" autocomplete='off'>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">상세 주소</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_ADDR2' id='CPT_ADDR2' type="text" value="<?=$CPT_ADDR2?>"  placeholder='상세주소를 입력 해주세요.'  autocomplete='off'>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">썸네일 이미지	</h4>
											<input type='hidden' name='CPT_IMG_SAVE' id='CPT_IMG_SAVE' value='<?=$CPT_IMG_SAVE?>'/>
											<?if($CPT_IMG_SAVE){?>
												<?if(strpos($CPT_IMG_SAVE, "http") !== false) {?>
													<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
															<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
																<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$CPT_IMG_ORG?>" data-src="<?=$CPT_IMG_SAVE?>" data-speed="350" data-caption="<?=$CPT_IMG_ORG?>">
																	<img class="img-fluid" src="<?=$CPT_IMG_SAVE?>" alt="<?=$CPT_IMG_ORG?>" STYLE='max-width:150px;'>
																</a>
															</div>
													</div>
												<?}else{?>
													<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
															<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
																<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$CPT_IMG_ORG?>" data-src="../../uploads/<?=$CPT_IMG_SAVE?>" data-speed="350" data-caption="<?=$CPT_IMG_ORG?>">
																	<img class="img-fluid" src="../../uploads/<?=$CPT_IMG_SAVE?>" alt="<?=$CPT_IMG_ORG?>" STYLE='max-width:150px;'>
																</a>
															</div>
													</div>
												<?}?>
											<?}?>
											<div >
												<div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
													<input class="form-control form-control-md rounded-0" placeholder="썸네일 이미지를 선택해주세요." readonly="" type="text">
													<div class="input-group-btn">
														<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">SELECT</button>
														<input type="file" name='CPT_IMG' id='CPT_IMG'>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 이미지	</h4>
											<input type='hidden' name='CPT_IMG1_SAVE' id='CPT_IMG1_SAVE' value='<?=$CPT_IMG1_SAVE?>'/>
											<?if($CPT_IMG1_SAVE){?>
												<?if(strpos($CPT_IMG1_SAVE, "http") !== false) {?>
													<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
															<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
																<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$CPT_IMG1_ORG?>" data-src="<?=$CPT_IMG1_SAVE?>" data-speed="350" data-caption="<?=$CPT_IMG1_ORG?>">
																	<img class="img-fluid" src="<?=$CPT_IMG1_SAVE?>" alt="<?=$CPT_IMG1_ORG?>" STYLE='max-width:150px;'>
																</a>
															</div>
													</div>
												<?}else{?>
													<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
															<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
																<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$CPT_IMG1_ORG?>" data-src="../../uploads/<?=$CPT_IMG1_SAVE?>" data-speed="350" data-caption="<?=$CPT_IMG1_ORG?>">
																	<img class="img-fluid" src="../../uploads/<?=$CPT_IMG1_SAVE?>" alt="<?=$CPT_IMG1_ORG?>" STYLE='max-width:150px;'>
																</a>
															</div>
													</div>
												<?}?>
											<?}?>
											<div>
												<div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
													<input class="form-control form-control-md rounded-0" placeholder="캠페인 이미지를 선택해주세요." readonly="" type="text">
													<div class="input-group-btn">
														<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">SELECT</button>
														<input type="file" name='CPT_IMG1' id='CPT_IMG1'>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 제공내역</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_SUB_TITLE' id='CPT_SUB_TITLE' type="text" value="<?=$CPT_SUB_TITLE?>" placeholder='캠페인 제공내역을 입력 해주세요.' autocomplete='off'>
										</div>
										<!--<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">
												캠페인 필수 선택 옵션
												<a href="javascript:add_file();" class="btn btn-xs u-btn-outline-primary  g-ml-15 g-mb-5"><i class="fa fa-plus"></i></a>
												<a href="javascript:del_file();" class="btn btn-xs u-btn-outline-darkgray g-mb-5"><i class="fa fa-minus"></i></a>
											</h4>
											<?if($cnt_cot > 0){?>
												<?while($row_cot = mysqli_fetch_array($result_cot)){ // 반복문?>
													<input type="hidden" name="COT_IDX[]" id="COT_IDX<?=$row_cot['COT_IDX']?>" value="<?=$row_cot['COT_IDX']?>" />
													<input type="hidden" name="COT_UPDATE[]" id="COT_UPDATE<?=$row_cot['COT_IDX']?>" value="" />
													<div class='col-md-12'>
														<div class="row" id='div_<?=$row_cot['COT_IDX']?>'>
															<div class="col-md-1">
																<a href="javascript:div_del('<?=$row_cot['COT_IDX']?>');" class="btn btn-lg u-btn-primary g-mr-10 g-mb-15">
																	<i class="hs-admin-trash"></i>
																</a>
															</div>
															<div class="col-md-11">
																<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 g-mb-10" name='CPT_OPTION_UPDATE[]' id='CPT_OPTION_UPDATE' type="text" placeholder='필수 선택옵션을 입력 해주세요.' value="<?=$row_cot['COT_TITLE']?>">
															</div>
														</div>
													</div>
												<?}?>
											<?}?>
											<div  id='up_file_div'>
												<?if(!$cnt_cot || $cnt_cot == 0){?>
													<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_OPTION[]' id='CPT_OPTION' type="text" placeholder='필수 선택옵션을 입력 해주세요.'>
												<?}?>
											</div>
										</div>-->
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">모집인원</h4>
											<div class="form-group mb-0">
												<div class="js-quantity input-group u-quantity--v2 g-width-140 g-brd-gray-light-v7 g-rounded-4">
													<div class="js-minus input-group-addon d-flex align-items-center g-width-40 g-color-gray-light-v11 g-brd-right g-brd-gray-light-v7">
														<i class="hs-admin-minus"></i>
													</div>
													<input class="js-result form-control g-color-gray-dark-v6 rounded-0 g-pa-9" type="text" value="<?if($CPT_RECRUITS){ echo $CPT_RECRUITS; }else{ echo "0"; }?>" readonly name="CPT_RECRUITS" id="CPT_RECRUITS">
													<div class="js-plus input-group-addon d-flex align-items-center g-width-40 g-color-gray-light-v11 g-brd-left g-brd-gray-light-v7">
														<i class="hs-admin-plus"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-4">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 모집 시작일</h4>
											<input type="text" name="CPT_APP_START_DATE" id="CPT_APP_START_DATE" value="<?=$CPT_APP_START_DATE?>" class="form-control" placeholder="캠페인 모집 시작일" autocomplete='off' />
											<!--
											<div id="datepickerWrapper1" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name="CPT_APP_START_DATE" id="CPT_APP_START_DATE" value="<?=$CPT_APP_START_DATE?>" placeholder="캠페인 모집 시작일" data-rp-wrapper="#datepickerWrapper1" data-rp-date-format="Y-m-d">
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
											-->
										</div>
										<div class="form-group g-mb-20 col-md-4">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 모집 마감일</h4>
											<input type="text" name="CPT_APP_END_DATE" id="CPT_APP_END_DATE" class="form-control" value="<?=$CPT_APP_END_DATE?>" placeholder="캠페인 모집 마감일" autocomplete='off' />
											<!--
											<div id="datepickerWrapper2" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name="CPT_APP_END_DATE" id="CPT_APP_END_DATE" value="<?=$CPT_APP_END_DATE?>" placeholder="캠페인 모집 마감일" data-rp-wrapper="#datepickerWrapper2" data-rp-date-format="Y-m-d">
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
											-->
										</div>
										<div class="form-group g-mb-20 col-md-4">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 리뷰어발표일</h4>
											<input type="text" name="CPT_ANNO_DATE" id="CPT_ANNO_DATE" value="<?=$CPT_ANNO_DATE?>" class="form-control" placeholder="캠페인 리뷰어발표일" autocomplete='off' />
											<!--
											<div id="datepickerWrapper3" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name="CPT_ANNO_DATE" id="CPT_ANNO_DATE" value="<?=$CPT_ANNO_DATE?>" placeholder="캠페인 리뷰어발표일" data-rp-wrapper="#datepickerWrapper3" data-rp-date-format="Y-m-d">
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
											-->
										</div>
										<div class="form-group g-mb-20 col-md-4">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 리뷰등록 시작일</h4>
											<input type="text" name="CPT_REVIEW_START_DATE" id="CPT_REVIEW_START_DATE" value="<?=$CPT_REVIEW_START_DATE?>" class="form-control" placeholder="캠페인 리뷰등록 시작일" autocomplete='off' />
											<!--
											<div id="datepickerWrapper4" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name="CPT_REVIEW_START_DATE" id="CPT_REVIEW_START_DATE" value="<?=$CPT_REVIEW_START_DATE?>" placeholder="캠페인 리뷰등록 시작일" data-rp-wrapper="#datepickerWrapper4" data-rp-date-format="Y-m-d">
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
											-->
										</div>
										<div class="form-group g-mb-20 col-md-4">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 리뷰등록 마감일</h4>
											<input type="text" name="CPT_REVIEW_END_DATE" id="CPT_REVIEW_END_DATE" value="<?=$CPT_REVIEW_END_DATE?>" class="form-control" placeholder="캠페인 리뷰등록 마감일" autocomplete='off' />
											<!--
											<div id="datepickerWrapper5" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name="CPT_REVIEW_END_DATE" id="CPT_REVIEW_END_DATE" value="<?=$CPT_REVIEW_END_DATE?>" placeholder="캠페인 리뷰등록 마감일" data-rp-wrapper="#datepickerWrapper5" data-rp-date-format="Y-m-d">
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
											-->
										</div>
										<!--<div class="form-group g-mb-20 col-md-3">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 결과발표일</h4>
											<div id="datepickerWrapper8" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name="CPT_END_DATE" id="CPT_END_DATE" value="<?=$CPT_END_DATE?>" placeholder="캠페인 결과발표일" data-rp-wrapper="#datepickerWrapper8" data-rp-date-format="Y-m-d">
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
										</div>-->
										<div class="form-group g-mb-20 col-md-4">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 노출 만료일</h4>
											<input type="text" name="CPT_VIEW_DATE" id="CPT_VIEW_DATE" value="<?=$CPT_VIEW_DATE?>" class="form-control" placeholder="캠페인 노출 만료일" autocomplete='off' />
											<!--
											<div id="datepickerWrapper7" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
												<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name="CPT_VIEW_DATE" id="CPT_VIEW_DATE" value="<?=$CPT_VIEW_DATE?>" placeholder="캠페인 노출 만료일" data-rp-wrapper="#datepickerWrapper7" data-rp-date-format="Y-m-d">
												<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
													<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
													<i class="hs-admin-angle-down"></i>
												</div>
											</div>
											-->
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 신청자 포인트</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_APP_POINT' id='CPT_APP_POINT' type="text" value="<?=$CPT_APP_POINT?>" placeholder='캠페인 신청자 포인트를 입력 해주세요.' numberOnly  autocomplete='off'>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 선정자 포인트</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_ANNO_POINT' id='CPT_ANNO_POINT' type="text" value="<?=$CPT_ANNO_POINT?>" placeholder='캠페인 선정자 포인트를 입력 해주세요.'numberOnly autocomplete='off' >
										</div>
										<!--<div class="form-group g-mb-20 col-md-4">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 추가 포인트</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_PLUS_POINT' id='CPT_PLUS_POINT' type="text" value="<?=$CPT_PLUS_POINT?>" placeholder='캠페인 추가 포인트를 입력 해주세요.' numberOnly >
										</div>-->
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 신청필수 확인사항</h4>
											<textarea  class="form-control " name='CPT_REQ_CONTENT' id='CPT_REQ_CONTENT' placeholder='캠페인 신청필수확인사항을 입력 해주세요.' autocomplete='off'><?=$CPT_REQ_CONTENT?></textarea>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">제공 내용</h4>
											<textarea  class="form-control " name='CPT_OFFER' id='CPT_OFFER' placeholder='캠페인 제공내용을 입력 해주세요.' autocomplete='off'><?=$CPT_OFFER?></textarea>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">키워드</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='CPT_KEYWORD' id='CPT_KEYWORD' type="text" value="<?=$CPT_KEYWORD?>" placeholder='키워드를 입력 해주세요.' autocomplete='off'/>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">키워드 정보</h4>
											<textarea  class="form-control " name='CPT_KEYWORD_ETC' id='CPT_KEYWORD_ETC' placeholder='캠페인 제공내용을 입력 해주세요.' autocomplete='off'><?=$CPT_KEYWORD_ETC?></textarea>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 정보</h4>
											<textarea  class="form-control " name='CPT_CONTENT' id='CPT_CONTENT' placeholder='캠페인 정보을 입력 해주세요.' autocomplete='off'><?=$CPT_CONTENT?></textarea>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 미션</h4>
											<textarea  class="form-control " name='CPT_MISSION' id='CPT_MISSION' placeholder='캠페인 제공내용을 입력 해주세요.' autocomplete='off'><?=$CPT_MISSION?></textarea>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">캠페인 공통 안내사항</h4>
											<textarea  class="form-control " name='CPT_NOTICE' id='CPT_NOTICE' placeholder='캠페인 안내사항을 입력 해주세요.' autocomplete='off'>
												<?if($mode=='CPMODIFY'){?>
													<?=$CPT_NOTICE?>
												<?}else{?>
													<p><span style="font-family: 한컴바탕; letter-spacing: 0pt;">​※ </span><span style="font-family: 한컴바탕;">리뷰 등록 및 방문이 어려울 경우 카톡</span><span lang="EN-US" style="letter-spacing: 0pt;">(start0202) </span><span style="font-family: 한컴바탕;">또는 </span><span lang="EN-US" style="letter-spacing: 0pt;">1:1</span><span style="font-family: 한컴바탕;">문의로 사전에 연락 주세요</span><span lang="EN-US" style="letter-spacing: 0pt;">.</span></p><p class="0"><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">※ </span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">배송 </span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">(</span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">제품</span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">) </span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">캠페인은 선정 이후 단순 변심</span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">(</span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">개인 사정</span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">)</span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">으로 인한 제품 변경</span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">/</span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">반품</span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">/</span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">환불 불가능합니다</span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">.</span></p><p class="0"><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">※ </span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">스타트체험단 </span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">: 070-8633-8941(</span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">월</span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">-</span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">금 </span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">10am-17pm) / </span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">토</span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">·</span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">일</span><span lang="EN-US" style="mso-fareast-font-family:한컴바탕;mso-font-width:100%;letter-spacing:0pt;mso-text-raise:0pt;">·</span><span style="font-family:한컴바탕;mso-fareast-font-family:한컴바탕;">공휴일 휴무</span></p><p class="0">  <!--[if !supportEmptyParas]-->&nbsp;<!--[endif]-->  <o:p></o:p></p><p class="0">1. 리뷰 게시글 하단에는 체험 제공 스폰서 배너 이미지를 등록해주세요.</p><p class="0">- 공정위문구는 공정거래위원회에서 요청하는 의무사항입니다. 공정위문구 미 기재시 표시광고법위반으로 처벌</p><p class="0">2. 등록한 리뷰 및 이미지는 광고주에 의해 활용될 수 있습니다.</p><p class="0">3. 정당한 사유 없이 등록 기간 내 리뷰를 작성하지 않을 경우 관련 법 조항 (형법 제347조)에 따라 법적 처벌 대상이 될 수 있습니다.</p>4. 등록된 콘텐츠는 6개월 이상 유지해야하며, 미유지 시 패널티가 부과됩니다.<p>&nbsp;​&nbsp;</p>
													<p><img src="/img/banner_2.png"/></p>
																							
												<?}?>
											</textarea>
										</div>
									</div>
									<!-- End 제목 Input -->
									
								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<a href="javascript:void(0);" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" id='SAVE_BTN'><?if($mode=='CPINSERT'){ echo "ADD"; }else{ echo "MODIFY"; }?></a>
									<a href="campaign_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
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
		$("input:text[numberOnly]").on("keyup", function() {
			$(this).val($(this).val().replace(/[^0-9]/g,""));
		});
	//-->
	</script>
	<script type="text/javascript">
<!--
	$(document).ready(function(){
		//전역변수선언
		var editor_object = [];

		nhn.husky.EZCreator.createInIFrame({
			oAppRef: editor_object,
			elPlaceHolder: "CPT_REQ_CONTENT",
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
		nhn.husky.EZCreator.createInIFrame({
			oAppRef: editor_object,
			elPlaceHolder: "CPT_CONTENT",
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
		nhn.husky.EZCreator.createInIFrame({
			oAppRef: editor_object,
			elPlaceHolder: "CPT_NOTICE",
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
		
		nhn.husky.EZCreator.createInIFrame({
			oAppRef: editor_object,
			elPlaceHolder: "CPT_OFFER",
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
		nhn.husky.EZCreator.createInIFrame({
			oAppRef: editor_object,
			elPlaceHolder: "CPT_MISSION",
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
		nhn.husky.EZCreator.createInIFrame({
			oAppRef: editor_object,
			elPlaceHolder: "CPT_KEYWORD_ETC",
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
			editor_object.getById["CPT_REQ_CONTENT"].exec("UPDATE_CONTENTS_FIELD", []);
			editor_object.getById["CPT_CONTENT"].exec("UPDATE_CONTENTS_FIELD", []);
			editor_object.getById["CPT_NOTICE"].exec("UPDATE_CONTENTS_FIELD", []);
			editor_object.getById["CPT_OFFER"].exec("UPDATE_CONTENTS_FIELD", []);
			editor_object.getById["CPT_MISSION"].exec("UPDATE_CONTENTS_FIELD", []);
			editor_object.getById["CPT_KEYWORD_ETC"].exec("UPDATE_CONTENTS_FIELD", []);
			var ir1 = $("#CPT_REQ_CONTENT").val();
			var ir2 = $("#CPT_CONTENT").val();
			var ir3 = $("#CPT_NOTICE").val();
			var ir4 = $("#CPT_OLD_CONTENT").val();
			var ir5 = $("#CPT_OFFER").val();
			var ir6 = $("#CPT_MISSION").val();
			var ir7 = $("#CPT_OLD_CONTENT").val();
			var ir8 = $("#CPT_KEYWORD_ETC").val();

			if($("#CPT_VIEW2").is(":checked")){
				if($("#CPT_TITLE").val() ==""){
					var CPT_TITLE = document.getElementById("CPT_TITLE");
					CPT_TITLE.focus();
					alert("캠페인명을 입력 해주세요.");
					return false;
				}
			}else{
				if($("#CPT_TITLE").val() ==""){
					var CPT_TITLE = document.getElementById("CPT_TITLE");
					CPT_TITLE.focus();
					alert("캠페인명을 입력 해주세요.");
					return false;
				}
				if($("#CPT_NAME").val() ==""){
					var CPT_NAME = document.getElementById("CPT_NAME");
					CPT_NAME.focus();
					alert("업체명을 입력 해주세요.");
					return false;
				}
				if($("#CPT_TEL").val() ==""){
					var CPT_TEL = document.getElementById("CPT_TEL");
					CPT_TEL.focus();
					alert("업체연락처를 입력 해주세요.");
					return false;
				}
				if($("#CPT_SUB_TITLE").val() ==""){
					var CPT_SUB_TITLE = document.getElementById("CPT_SUB_TITLE");
					CPT_SUB_TITLE.focus();
					alert("제공 내역을 입력 해주세요.");
					return false;
				}
				if(ir7 =="" || ir7 == null || ir7 == '&nbsp;' || ir7 == '<p>&nbsp;</p>'){
					if(ir1 =="" || ir1 == null || ir1 == '&nbsp;' || ir1 == '<p>&nbsp;</p>'){
						var CPT_REQ_CONTENT = document.getElementById("CPT_REQ_CONTENT");
						editor_object.getById["CPT_REQ_CONTENT"].exec("FOCUS");
						alert("캠페인 신청필수정보를 입력 해주세요.");
						return false;
					}
					if(ir2 =="" || ir2 == null || ir2 == '&nbsp;' || ir2 == '<p>&nbsp;</p>'){
						var CPT_CONTENT = document.getElementById("CPT_CONTENT");
						editor_object.getById["CPT_CONTENT"].exec("FOCUS");
						alert("캠페인 내용을 입력 해주세요.");
						return false;
					}
					if(ir3 =="" || ir3 == null || ir3 == '&nbsp;' || ir3 == '<p>&nbsp;</p>'){
						var CPT_NOTICE = document.getElementById("CPT_NOTICE");
						editor_object.getById["CPT_NOTICE"].exec("FOCUS");
						alert("캠페인 안내사항을 입력 해주세요.");
						return false;
					}
					if(ir6 =="" || ir6 == null || ir6 == '&nbsp;' || ir6 == '<p>&nbsp;</p>'){
						var CPT_MISSION = document.getElementById("CPT_MISSION");
						editor_object.getById["CPT_MISSION"].exec("FOCUS");
						alert("캠페인 미션을 입력 해주세요.");
						return false;
					}
					if(ir8 =="" || ir8 == null || ir8 == '&nbsp;' || ir8 == '<p>&nbsp;</p>'){
						var CPT_KEYWORD_ETC = document.getElementById("CPT_KEYWORD_ETC");
						editor_object.getById["CPT_KEYWORD_ETC"].exec("FOCUS");
						alert("캠페인 키워드 정보를 입력 해주세요.");
						return false;
					}
				}

				if($('input:checkbox[name=\'CPT_CATE1[]\']:checked').length < 1){
					$("#CPT_CATE11").focus();
					alert("구분1을 선택 해주세요.");
					return false;
				}

				if(!$('input:radio[name=CPT_CATE2]').is(":checked")){
					$("#CPT_CATE21").focus();
					alert("구분2을 선택 해주세요.");
					return false;
				}

				if(!$("input:radio[name=CPT_CATE3]").is(":checked")){
					$("#CPT_CATE31").focus();
					alert("구분3을 선택 해주세요.");
					return false;
				}

				if(ir5 =="" || ir5 == null || ir5 == '&nbsp;' || ir5 == '<p>&nbsp;</p>'){
					var CPT_OFFER = document.getElementById("CPT_OFFER");
					editor_object.getById["CPT_OFFER"].exec("FOCUS");
					alert("캠페인 제공내용을 입력 해주세요.");
					return false;
				}

				if($("#CPT_KEYWORD").val() ==""){
					var CPT_KEYWORD = document.getElementById("CPT_KEYWORD");
					CPT_KEYWORD.focus();
					alert("키워드를 입력 해주세요.");
					return false;
				}

				if($("#CPT_RECRUITS").val() < 1){
					var CPT_RECRUITS = document.getElementById("CPT_RECRUITS");
					CPT_RECRUITS.focus();
					alert("모집인원을 입력 해주세요.");
					return false;
				}

				if($("#CPT_VIEW_DATE").val() ==""){
					var CPT_VIEW_DATE = document.getElementById("CPT_VIEW_DATE");
					CPT_VIEW_DATE.focus();
					alert("캠페인 노출만료일을 선택 해주세요.");
					return false;
				}

				if($("#CPT_APP_START_DATE").val() ==""){
					var CPT_APP_START_DATE = document.getElementById("CPT_APP_START_DATE");
					CPT_APP_START_DATE.focus();
					alert("캠페인 모집 시작일 선택 해주세요.");
					return false;
				}

				if($("#CPT_APP_END_DATE").val() ==""){
					var CPT_APP_END_DATE = document.getElementById("CPT_APP_END_DATE");
					CPT_APP_END_DATE.focus();
					alert("캠페인 모집 마감일 선택 해주세요.");
					return false;
				}

				/*if($("#CPT_ANNO_DATE").val() ==""){
					var CPT_ANNO_DATE = document.getElementById("CPT_ANNO_DATE");
					CPT_ANNO_DATE.focus();
					alert("캠페인 리뷰어 발표일 선택 해주세요.");
					return false;
				}*/

				if($("#CPT_REVIEW_START_DATE").val() ==""){
					var CPT_REVIEW_START_DATE = document.getElementById("CPT_REVIEW_START_DATE");
					CPT_REVIEW_START_DATE.focus();
					alert("캠페인 리뷰등록 시작일 선택 해주세요.");
					return false;
				}

				if($("#CPT_REVIEW_END_DATE").val() ==""){
					var CPT_REVIEW_END_DATE = document.getElementById("CPT_REVIEW_END_DATE");
					CPT_REVIEW_END_DATE.focus();
					alert("캠페인 리뷰등록 마감일 선택 해주세요.");
					return false;
				}

				if($("#CPT_IMG_SAVE").val() =="" && $("#CPT_IMG").val() ==""){
					var CPT_IMG = document.getElementById("CPT_IMG");
					CPT_IMG.focus();
					alert("캠페인 썸네일을 선택 해주세요.");
					return false;
				}
				if($("#CPT_IMG1_SAVE").val() =="" && $("#CPT_IMG1").val() ==""){
					var CPT_IMG1 = document.getElementById("CPT_IMG1");
					CPT_IMG1.focus();
					alert("캠페인 썸네일을 선택 해주세요.");
					return false;
				}
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
	<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
	<script>
			function execDaumPostcode() {
					new daum.Postcode({
							oncomplete: function(data) {
									var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
									var extraRoadAddr = ''; // 도로명 조합형 주소 변수
									if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
											extraRoadAddr += data.bname;
									}
									if(data.buildingName !== '' && data.apartment === 'Y'){
										 extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
									}
									if(extraRoadAddr !== ''){
											extraRoadAddr = ' (' + extraRoadAddr + ')';
									}
									if(fullRoadAddr !== ''){
											fullRoadAddr += extraRoadAddr;
									}
									document.getElementById('CPT_ADDR1').value = fullRoadAddr;
									document.getElementById('CPT_ADDR2').focus();
							}
					}).open();
			}
			function add_file(){
			var add_file_input ="<input  class=\"form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14 add_upinput g-mt-5\" name='CPT_OPTION[]' id='CPT_OPTION' type=\"text\" placeholder='필수 선택옵션을 입력 해주세요.'>";
				$("#up_file_div").append(add_file_input);
					// initialization of forms
				$.HSCore.helpers.HSFileAttachments.init();
				$.HSCore.components.HSFileAttachment.init('.js-file-attachment');
				$.HSCore.helpers.HSFocusState.init();
		}

		function del_file(){
			$(".add_upinput").last().remove();
		}
		function div_del(COT_IDX){
			$("#COT_UPDATE"+COT_IDX).val('del');
			$("#div_"+COT_IDX).css('display','none');
		}
	</script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
  $( function() {
    $( "#CPT_APP_START_DATE, #CPT_APP_END_DATE, #CPT_ANNO_DATE, #CPT_REVIEW_START_DATE, #CPT_REVIEW_END_DATE, #CPT_VIEW_DATE" ).datepicker({
			dateFormat: 'yy-mm-dd'
			,monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'] //달력의 월 부분 텍스트
			,monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'] //달력의 월 부분 Tooltip 텍스트
			,dayNamesMin: ['일','월','화','수','목','금','토'] //달력의 요일 부분 텍스트
			,dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'] //달력의 요일 부분 Tooltip 텍스트
		});
		
  } );
  </script>