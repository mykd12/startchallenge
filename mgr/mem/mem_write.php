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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">회원 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item">
                <span class="g-valign-middle">회원 MODIFY</span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">회원 MODIFY</h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm' action="../inc/adminDAO.php" method="post" enctype="multipart/form-data" onsubmit="return submit_ck();">
					 <input type='hidden' id='mode' name='mode' value='<?=$mode?>'/>
					 <input type='hidden' id='MET_IDX' name='MET_IDX' value='<?=$MET_IDX?>'/>
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
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 아이디</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_ID' id='MET_ID' type="text" value="<?=$MET_ID?>" readonly>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 패스워드</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_PW1' id='MET_PW1' type="password" value="<?=$MET_PW?>"  placeholder='패스워드를 입력 해주세요.'>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 패스워드 확인</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_PW2' id='MET_PW2' type="password" value="<?=$MET_PW?>"  placeholder='패스워드 확인을 입력 해주세요.'>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 이름</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_NAME' id='MET_NAME' type="text" value="<?=$MET_NAME?>"  placeholder='회원이름을 입력 해주세요.'>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 닉네임</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_NIC' id='MET_NIC' type="text" value="<?=$MET_NIC?>"  placeholder='회원 닉네임을 입력 해주세요.' readonly>
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 연락처</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_TEL' id='MET_TEL' type="text" value="<?=$MET_TEL?>"  placeholder='회원 연락처를 입력 해주세요.' >
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 이메일</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_EMAIL' id='MET_EMAIL' type="text" value="<?=$MET_EMAIL?>"  placeholder='회원 이메일을 입력 해주세요.' >
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 생년월일</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_BIRTH' id='MET_BIRTH' type="text" value="<?=$MET_BIRTH?>"  placeholder='회원 생년월일을 입력 해주세요.' >
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 성별</h4>
											<div class="btn-group justified-content">
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="MET_GENDER" type="radio" value="man" <?if($MET_GENDER=='man'){ echo "checked"; }?>>
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">남성</span>
												</label>
												<label class="u-check">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="MET_GENDER" type="radio" value="girl" <?if($MET_GENDER=='girl'){ echo "checked"; }?>>
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">여성</span>
												</label>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-2">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 우편번호</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_ZIP' id='MET_ZIP' type="text" value="<?=$MET_ZIP?>"  placeholder='회원 우편번호를 입력 해주세요.' readonly onclick="execDaumPostcode();">
										</div>
										<div class="form-group g-mb-20 col-md-4">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 주소</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_ADDR1' id='MET_ADDR1' type="text" value="<?=$MET_ADDR1?>"  placeholder='회원 주소를 입력 해주세요.' readonly onclick="execDaumPostcode();" >
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 상세주소</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_ADDR2' id='MET_ADDR2' type="text" value="<?=$MET_ADDR2?>"  placeholder='회원 상세주소를 입력 해주세요.' >
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 페이스북 URL</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_FACEBOOK' id='MET_FACEBOOK' type="text" value="<?=$MET_FACEBOOK?>"  placeholder='회원 페이스북 URL 입력 해주세요.' >
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 인스타그램 URL</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_INSTAGRAM' id='MET_INSTAGRAM' type="text" value="<?=$MET_INSTAGRAM?>"  placeholder='회원 인스타그램 URL 입력 해주세요.' >
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 블로그 URL</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_BLOG' id='MET_BLOG' type="text" value="<?=$MET_BLOG?>"  placeholder='회원 블로그 URL 입력 해주세요.' >
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 유튜브 URL</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_YOUTUBE' id='MET_YOUTUBE' type="text" value="<?=$MET_YOUTUBE?>"  placeholder='회원 유튜브 URL 입력 해주세요.' >
										</div>
										<div class="form-group g-mb-20 col-md-6">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 기타 SNS URL</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_ETC_URL' id='MET_ETC_URL' type="text" value="<?=$MET_ETC_URL?>"  placeholder='회원 기타 SNS URL 입력 해주세요.' >
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 포스팅 분야</h4>
											<div class="btn-group justified-content">
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING1" <?if(in_array("맛집", $MET_POSTING)){ echo " checked "; }?> value="맛집">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">맛집</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING2" <?if(in_array("생활,리빙", $MET_POSTING)){ echo " checked "; }?> value="생활,리빙">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">생활,리빙</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING3" <?if(in_array("패션", $MET_POSTING)){ echo " checked "; }?> value="패션">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">패션</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING4" <?if(in_array("유아", $MET_POSTING)){ echo " checked "; }?> value="유아">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">유아</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING5" <?if(in_array("뷰티샵,미용", $MET_POSTING)){ echo " checked "; }?> value="뷰티샵,미용">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">뷰티샵,미용</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING6" <?if(in_array("도서,교육", $MET_POSTING)){ echo " checked "; }?> value="도서,교육">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">도서,교육</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING7" <?if(in_array("일상", $MET_POSTING)){ echo " checked "; }?> value="일상">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">일상</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING8" <?if(in_array("여행,숙박", $MET_POSTING)){ echo " checked "; }?> value="여행,숙박">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">여행,숙박</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING9" <?if(in_array("디지털가전", $MET_POSTING)){ echo " checked "; }?> value="디지털가전">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">디지털가전</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING10" <?if(in_array("배달,배송", $MET_POSTING)){ echo " checked "; }?> value="배달,배송">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">배달,배송</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING11" <?if(in_array("화장품", $MET_POSTING)){ echo " checked "; }?> value="화장품">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">화장품</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_POSTING[]' id="MET_POSTING12" <?if(in_array("기타", $MET_POSTING)){ echo " checked "; }?> value="기타">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">기타</span>
												</label>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 지역</h4>
											<div class="btn-group justified-content g-mb-10">
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA1" <?if(in_array("강남/논현/서초", $MET_AREA)){ echo " checked "; }?> value="강남/논현/서초">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">강남/논현/서초</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA2" <?if(in_array("송파/잠실/강동", $MET_AREA)){ echo " checked "; }?> value="송파/잠실/강동">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">송파/잠실/강동</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA3" <?if(in_array("압구정/신사/교대/사당/삼성/선릉", $MET_AREA)){ echo " checked "; }?> value="압구정/신사/교대/사당/삼성/선릉">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">압구정/신사/교대/사당/삼성/선릉</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA4" <?if(in_array("노원/강북/수유/동대문", $MET_AREA)){ echo " checked "; }?> value="노원/강북/수유/동대문">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">노원/강북/수유/동대문</span>
												</label>
											</div>
											<div class="btn-group justified-content g-mb-10">
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA5" <?if(in_array("종로/대학로/명동/이태원", $MET_AREA)){ echo " checked "; }?> value="종로/대학로/명동/이태원">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">종로/대학로/명동/이태원</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA6" <?if(in_array("홍대/마포/은평/신촌/이대", $MET_AREA)){ echo " checked "; }?> value="홍대/마포/은평/신촌/이대">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">홍대/마포/은평/신촌/이대</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA7" <?if(in_array("관악/신림/동작", $MET_AREA)){ echo " checked "; }?> value="관악/신림/동작">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">관악/신림/동작</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA8" <?if(in_array("여의도/영등포/강서/목동", $MET_AREA)){ echo " checked "; }?> value="여의도/영등포/강서/목동">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">여의도/영등포/강서/목동</span>
												</label>
											</div>
											<div class="btn-group justified-content g-mb-10">
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA9" <?if(in_array("인천/부천/부평", $MET_AREA)){ echo " checked "; }?> value="인천/부천/부평">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked  rounded-0">인천/부천/부평</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA10" <?if(in_array("파주/김포/의정부/남양주", $MET_AREA)){ echo " checked "; }?> value="파주/김포/의정부/남양주">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">파주/김포/의정부/남양주</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA11" <?if(in_array("가평/양평/여주", $MET_AREA)){ echo " checked "; }?> value="가평/양평/여주">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">가평/양평/여주</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA12" <?if(in_array("하남/광주", $MET_AREA)){ echo " checked "; }?> value="하남/광주">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">하남/광주</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA13" <?if(in_array("성남/용인/분당/수원", $MET_AREA)){ echo " checked "; }?> value="성남/용인/분당/수원">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">성남/용인/분당/수원</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA14" <?if(in_array("기타 경기", $MET_AREA)){ echo " checked "; }?> value="기타 경기">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">기타 경기</span>
												</label>
											</div>
											<div class="btn-group justified-content g-mb-10">
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA15" <?if(in_array("대전/충청", $MET_AREA)){ echo " checked "; }?> value="대전/충청">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked  rounded-0">대전/충청</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA16" <?if(in_array("대구/경북", $MET_AREA)){ echo " checked "; }?> value="대구/경북">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">대구/경북</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA17" <?if(in_array("부산/경남", $MET_AREA)){ echo " checked "; }?> value="부산/경남">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">부산/경남</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA18" <?if(in_array("광주/전라", $MET_AREA)){ echo " checked "; }?> value="광주/전라">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">광주/전라</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA19" <?if(in_array("세종", $MET_AREA)){ echo " checked "; }?> value="세종">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">세종</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA20" <?if(in_array("울산", $MET_AREA)){ echo " checked "; }?> value="울산">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">울산</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA21" <?if(in_array("강원", $MET_AREA)){ echo " checked "; }?> value="강원">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">강원</span>
												</label>
												<label class="u-check g-pl-0">
													<input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='MET_AREA[]' id="MET_AREA22" <?if(in_array("제주", $MET_AREA)){ echo " checked "; }?> value="제주">
													<span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">제주</span>
												</label>
											</div>
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">유입경로</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_ROUTE' id='MET_ROUTE' type="text" value="<?=$MET_ROUTE?>"  readonly >
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">보유포인트</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-px-14" name='MET_POINT' id='MET_POINT' type="text" value="<?=number_format($MET_POINT)?>"  readonly >
										</div>
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">자기소개</h4>
											<textarea  class="form-control" name='MET_MSG' id='MET_MSG'><?=$MET_MSG?></textarea>
										</div>
										<div class="form-group g-mb-20 col-md-12">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">썸네일 이미지	</h4>
											<input type='hidden' name='MET_IMG_SAVE' id='MET_IMG_SAVE' value='<?=$MET_IMG_SAVE?>'/>
											<?if($MET_IMG_SAVE){?>
											<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
													<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
														<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$MET_IMG_ORG?>" data-src="../../uploads/<?=$MET_IMG_SAVE?>" data-speed="350" data-caption="<?=$MET_IMG_ORG?>">
															<img class="img-fluid" src="../../uploads/<?=$MET_IMG_SAVE?>" alt="<?=$MET_IMG_ORG?>" STYLE='max-width:150px;'>
														</a>
													</div>
											</div>
											<?}?>
										<div id='up_file_div'>
											<div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
												<input class="form-control form-control-md rounded-0" placeholder="썸네일 이미지를 선택해주세요." readonly="" type="text">
												<div class="input-group-btn">
													<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">SELECT</button>
													<input type="file" name='MET_IMG' id='MET_IMG'>
												</div>
											</div>
										</div>
									</div>
									</div>
									<!-- End 제목 Input -->
									
								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='MODIFY'/>
									<a href="mem_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
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
			if(!$("#MET_PW1").val()){
				alert("패스워드를 입력해주세요");
				$("#MET_PW1").focus();
				return false;
			}else if(!$("#MET_PW2").val()){
				alert("패스워드를 확인을 입력해주세요");
				$("#MET_PW2").focus();
				return false;
			}else if($("#MET_PW1").val() != $("#MET_PW2").val()){
				alert("패스워드와 패스워드 확인이 일치 하지 않습니다.");
				$("#MET_PW2").focus();
				return false;
			}else if(!$("#MET_NAME").val()){
				alert("회원이름을 입력해주세요.");
				$("#MET_NAME").focus();
				return false;
			}else if(!$("#MET_TEL").val()){
				alert("회원 연락처를 입력해주세요.");
				$("#MET_TEL").focus();
				return false;
			}else if(!$("#MET_EMAIL").val()){
				alert("회원 이메일을 입력해주세요.");
				$("#MET_EMAIL").focus();
				return false;
			}
		}
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
									document.getElementById('MET_ZIP').value = data.zonecode; //5자리 새우편번호 사용
									document.getElementById('MET_ADDR1').value = fullRoadAddr;
									document.getElementById('MET_ADDR2').focus();
							}
					}).open();
			}
			function autoHypenPhone(str){
				str = str.replace(/[^0-9]/g, '');
				var tmp = '';
				if( str.length < 4){
						return str;
				}else if(str.length < 7){
						tmp += str.substr(0, 3);
						tmp += '-';
						tmp += str.substr(3);
						return tmp;
				}else if(str.length < 11){
						tmp += str.substr(0, 3);
						tmp += '-';
						tmp += str.substr(3, 3);
						tmp += '-';
						tmp += str.substr(6);
						return tmp;
				}else{
						tmp += str.substr(0, 3);
						tmp += '-';
						tmp += str.substr(3, 4);
						tmp += '-';
						tmp += str.substr(7);
						return tmp;
				}
				return str;
			}

		var cellPhone = document.getElementById('MET_TEL');
		cellPhone.onkeyup = function(event){
			event = event || window.event;
			if(this.value.length > 13){
				var tel_txt = this.value.slice(0,-1);
				this.value=tel_txt;
			}
			var _val = this.value.trim();
			this.value = autoHypenPhone(_val) ;
		}
	</script>