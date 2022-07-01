<!DOCTYPE html>
<html lang="ko">
<?$mode='MY_INFO';?>
<?php include_once("inc/mainVO.php"); ?>

<head>
  <?php include("inc/head.php");?>
</head>
<?
	/*define('NAVER_CLIENT_ID', 'hmL9HScQeEXVQSMRbeA8');
	define('NAVER_CLIENT_SECRET', 't3uoIgplvH');
	define('NAVER_CALLBACK_URL', 'http://startchallenge.co.kr/perist_callback.php');
	session_start();
	// 네이버 로그인 접근토큰 요청 예제
	$naver_state = md5(microtime() . mt_rand());
	$_SESSION['naver_state'] = $naver_state;
	$naver_apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".NAVER_CLIENT_ID."&redirect_uri=".urlencode(NAVER_CALLBACK_URL)."&state=".$naver_state;*/
	$client_id = "hmL9HScQeEXVQSMRbeA8";
  $redirectURI = urlencode("http://startchallenge.co.kr/perist_callback.php");
  $state = md5(date("Y-m-d H:i:s"));
  $naver_apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".$client_id."&redirect_uri=".$redirectURI."&state=".$state;
	?>
<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main mypage_01 mypage_02 campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- 회원정보수정 시작-->
          <section class="section1">
            <h2 class="con_ti">회원정보수정</h2>
            <!-- 내용시작 -->
            <div class="content account on">
              <div class="form_wrap">
                <form id="account_form" method="post" action="./inc/mainDAO.php" onsubmit="return submit_ck();">
                  <input type="hidden" name="mode" id="mode" value="MYMODIFY" />
                  <input type="hidden" name="MET_IDX" id="MET_IDX" value="<?=$MET_IDX?>" />
                  <input type="hidden" name="MET_ZIP" id="MET_ZIP" value="<?=$MET_ZIP?>" />
                  <div class="form-group top line">
                    <div class="int_box">
                      <label for="MET_ID" id="label_id">가입아이디</label>
                      <input type="text" id="MET_ID" name="MET_ID" autocomplete="off" placeholder="" class="int"
                        maxlength="50" value="<?=$MET_ID?>" readonly disabled>
                    </div>
                    <div class="int_box">
                      <label for="MET_NIC" id="label_nic">닉네임</label>
                      <input type="text" id="MET_NIC" name="MET_NIC" autocomplete="off" placeholder="" class="int"
                        maxlength="10" value="<?=$MET_NIC?>" readonly disabled>
                    </div>
                    <div class="int_box">
                      <label for="MET_NAME" id="label_name">이름<span class="red">*</span></label>
                      <input type="text" id="MET_NAME" name="MET_NAME" placeholder="" class="int" maxlength="41"
                        value="<?=$MET_NAME?>" autocomplete="off">
                    </div>
                    <div class="int_box">
                      <label for="MET_TEL" id="label_tel">휴대폰 번호<span class="red">*</span></label>
                      <input type="text" id="MET_TEL" name="MET_TEL" placeholder="" class="int" maxlength="41"
                        value="<?=$MET_TEL?>" autocomplete="off">
                    </div>
                    <div class="int_box">
                      <label id="label_gender">성별<span class="red">*</span></label>
                      <input type="radio" id="MET_FEMALE" name="MET_GENDER" placeholder="" class="int" maxlength="41"
                        value="m" autocomplete="off" <?if($MET_GENDER=='m' ){ echo "checked" ; }?>>
                      <label for="MET_FEMALE" id="label_female">여자</label>
                      <input type="radio" id="MET_MALE" name="MET_GENDER" placeholder="" class="int" maxlength="41"
                        value="w" autocomplete="off" <?if($MET_GENDER=='w' ){ echo "checked" ; }?>>
                      <label for="MET_MALE" id="label_male">남자</label>
                    </div>
                    <div class="int_box">
                      <label for="MET_BIRTH" id="label_birthday">생년월일<span class="red">*</span></label>
                      <input type="text" id="MET_BIRTH" name="MET_BIRTH" placeholder="" class="int" maxlength="41"
                        value="<?=$MET_BIRTH?>" autocomplete="off">
                    </div>
                    <div class="int_box">
                      <label for="MET_EMAIL" id="label_email">이메일<span class="red">*</span></label>
                      <input type="text" id="MET_EMAIL" name="MET_EMAIL" placeholder="" class="int" maxlength="41"
                        value="<?=$MET_EMAIL?>" autocomplete="off">
                    </div>
                    <div class="int_box">
                      <label for="MET_ADDR1" id="label_add"><span>주소</label>
                      <input type="text" id="MET_ADDR1" name="MET_ADDR1" autocomplete="off" class="link" readonly=""
                        onclick="execDaumPostcode();" value="<?=$MET_ADDR1?>" style="background:#ccc;">
                    </div>
                    <div class="int_box">
                      <label for="MET_ADDR2" id="label_deAdd"><span>상세주소</label>
                      <input type="text" id="MET_ADDR2" name="MET_ADDR2" autocomplete="off" value="<?=$MET_ADDR2?>"
                        class="link">
                    </div>
                  </div>
                  <div class="form-group line easy_login">
                    <div class="ti_wrap">
                      <h5 class="text_ti">간편로그인</h5>
                    </div>
										<?if(!$MET_NAVER){?>
                    <div class="int_box naver" onclick="location.href='<?=$naver_apiURL;?>';">
                      <input type="button" autocomplete="off" class="btn_naverId">
                      <span class="int_text">네이버 아이디 연동하기</span>
                    </div>
										<?}else{?>
                    <div class="int_box naver ok" onclick="location.href='./inc/mainDAO.php?mode=NAVER_LEASING&MET_IDX=<?=$MET_IDX?>';">
                      <input type="button" id="MET_NAVEROK" name="MET_NAVEROK" autocomplete="off" class="btn_naverOK"
                        disabled">
                      <span class="int_text">네이버 아이디 연동해제</span>
											<p style="font-size:14px; padding:10px 0 0 0; color:#1ec800; font-weight: 500; ">네이버 아이디 연결되었습니다.</p>
                    </div>
										<?}?>
                  </div>

                  <div class="form-group line">
                    <div class="ti_wrap">
                      <h5 class="text_ti">대표SNS링크<span class="red">*</span></h5>
                    </div>
                    <div class="int_wrap">
                      <div class="int_box">
                        <label for="MET_BLOG" id="label_blog">블로그</label>
                        <input type="text" id="MET_BLOG" name="MET_BLOG" placeholder="" class="int" maxlength="41"
                          value="<?=$MET_BLOG?>" autocomplete="off">
                      </div>
                      <div class="int_box">
                        <label for="MET_INSTAGRAM" id="label_insta">인스타그램</label>
                        <input type="text" id="MET_INSTAGRAM" name="MET_INSTAGRAM" placeholder="" class="int"
                          maxlength="41" value="<?=$MET_INSTAGRAM?>" autocomplete="off">
                      </div>
                      <div class="int_box">
                        <label for="MET_YOUTUBE" id="label_youtube">유튜브</label>
                        <input type="text" id="MET_YOUTUBE" name="MET_YOUTUBE" placeholder="" class="int" maxlength="41"
                          value="<?=$MET_YOUTUBE?>" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="form-group line">
                    <div class="ti_wrap">
                      <h5 class="text_ti">비밀번호</h5>
                    </div>
                    <div class="int_wrap">
                      <!--<div class="int_box">
                        <label for="MET_PW" id="label_pw">현재 비밀번호</label>
                        <input type="PASSWORD" id="MET_PW" name="MET_PW" placeholder="" class="int" maxlength="41"
                          value="" autocomplete="off">
                      </div>-->
                      <div class="int_box">
                        <label for="MET_PW1" id="label_pw1">새 비밀번호</label>
                        <input type="PASSWORD" id="MET_PW1" name="MET_PW1" placeholder="" class="int" maxlength="41"
                          value="" autocomplete="off">
                      </div>
                      <div class="int_box">
                        <label for="MET_PW2" id="label_pw2">비밀번호 확인</label>
                        <input type="PASSWORD" id="MET_PW2" name="passwordConfirmd" placeholder="" class="int"
                          maxlength="41" value="" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="form-group interest_list">
                    <div class="ti_wrap">
                      <h5 class="text_ti">추가정보<span class="red">*(중복가능)</span> </h5>
                    </div>
                    <div class="int_wrap">
                      <div class="chk_box">
                        <input type="checkbox" id="MET_POSTING1" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "맛집" )
                          !==false) { echo "checked" ; }?> value="맛집">
                        <label for="MET_POSTING1" id="" class="">맛집</label>
                      </div>
                      <div class="chk_box">
                        <input type="checkbox" id="MET_POSTING2" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "생활,리빙"
                          ) !==false) { echo "checked" ; }?> value="생활,리빙">
                        <label for="MET_POSTING2">생활/리빙</label>
                      </div>
                      <div class="chk_box">
                        <input type="checkbox" id="MET_POSTING3" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "패션" )
                          !==false) { echo "checked" ; }?> value="패션">
                        <label for="MET_POSTING3">패션</label>
                      </div>
                      <div class="chk_box">
                        <input type="checkbox" id="MET_POSTING4" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "유아" )
                          !==false) { echo "checked" ; }?> value="유아">
                        <label for="MET_POSTING4">유아</label>
                      </div>
                      <div class="chk_box">
                        <input type="checkbox" id="MET_POSTING5" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "뷰티샵,미용"
                          ) !==false) { echo "checked" ; }?> value="뷰티샵,미용">
                        <label for="MET_POSTING5">뷰티샵/미용</label>
                      </div>
                      <div class="chk_box">
                        <input type="checkbox" id="MET_POSTING6" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "도서,교육"
                          ) !==false) { echo "checked" ; }?> value="도서,교육">
                        <label for="MET_POSTING6">도서/교육</label>
                      </div>
                      <div class="chk_box">
                        <input type="checkbox" id="MET_POSTING7" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "일상" )
                          !==false) { echo "checked" ; }?> value="일상">
                        <label for="MET_POSTING7">일상</label>
                      </div>
                      <div class="chk_box">
                        <input type="checkbox" id="MET_POSTING8" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "여행,숙박"
                          ) !==false) { echo "checked" ; }?> value="여행,숙박">
                        <label for="MET_POSTING8">여행/숙박</label>
                      </div>
                      <div class="chk_box">
                        <input type="checkbox" id="MET_POSTING9" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "배달,배송"
                          ) !==false) { echo "checked" ; }?> value="배달,배송">
                        <label for="MET_POSTING9">배달/배송</label>
                      </div>
                      <!--<div class="chk_box">
                        <input type="checkbox" id="MET_POSTING10" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "화장품" )
                          !==false) { echo "checked" ; }?> value="화장품">
                        <label for="MET_POSTING10">화장품</label>
                      </div>-->
                      <div class="chk_box">
                        <input type="checkbox" id="MET_POSTING10" name="MET_POSTING[]" <?if(strpos($MET_POSTING, "기타" )
                          !==false) { echo "checked" ; }?> value="기타">
                        <label for="MET_POSTING10">기타</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group local_list line">
                    <div class="ti_wrap">
                      <h5 class="text_ti">활동<span class="red">*(중복가능)</span></h5>
                    </div>
                    <div class="int_wrap">
                      <div class="row row01">
                        <p class="lo_title"><i class="xi-full-moon"></i>서울</p>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA1" name="MET_AREA[]" <?if(strpos($MET_AREA, "강남/논현/서초" )
                            !==false) { echo "checked" ; }?> value="강남/논현/서초">
                          <label for="MET_AREA1" id="" class="">강남 · 논현 · 서초</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA2" name="MET_AREA[]" <?if(strpos($MET_AREA, "송파/잠실/강동" )
                            !==false) { echo "checked" ; }?> value="송파/잠실/강동">
                          <label for="MET_AREA2">송파 · 잠실 · 강동</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA3" name="MET_AREA[]"
                            <?if(strpos($MET_AREA, "압구정/신사/교대/사당/삼성/선릉" ) !==false) { echo "checked" ; }?>
                          value="압구정/신사/교대/사당/삼성/선릉">
                          <label for="MET_AREA3">압구정 · 신사 · 교대 · 사당 · 삼성 · 선릉</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA4" name="MET_AREA[]" <?if(strpos($MET_AREA, "노원/강북/수유/동대문"
                            ) !==false) { echo "checked" ; }?> value="노원/강북/수유/동대문">
                          <label for="MET_AREA4">노원 · 강북 · 수유 · 동대문</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA5" name="MET_AREA[]" <?if(strpos($MET_AREA, "종로/대학로/명동/이태원"
                            ) !==false) { echo "checked" ; }?> value="종로/대학로/명동/이태원">
                          <label for="MET_AREA5">종로 · 대학로 · 명동 · 이태원</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA6" name="MET_AREA[]"
                            <?if(strpos($MET_AREA, "홍대/마포/은평/신촌/이대" ) !==false) { echo "checked" ; }?>
                          value="홍대/마포/은평/신촌/이대">
                          <label for="MET_AREA6">홍대 · 마포 · 은평 · 신촌 · 이대</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA7" name="MET_AREA[]" <?if(strpos($MET_AREA, "관악/신림/동작" )
                            !==false) { echo "checked" ; }?> value="관악/신림/동작">
                          <label for="MET_AREA7">관악 · 신림 · 동작</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA8" name="MET_AREA[]" <?if(strpos($MET_AREA, "여의도/영등포/강서/목동"
                            ) !==false) { echo "checked" ; }?> value="여의도/영등포/강서/목동">
                          <label for="MET_AREA8">여의도 · 영등포 · 강서 · 목동</label>
                        </div>
                      </div>
                      <div class="row row02">
                        <p class="lo_title"><i class="xi-full-moon"></i>경기 · 인천</p>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA9" name="MET_AREA[]" <?if(strpos($MET_AREA, "인천/부천/부평" )
                            !==false) { echo "checked" ; }?> value="인천/부천/부평">
                          <label for="MET_AREA9">인천 · 부천 · 부평</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA10" name="MET_AREA[]"
                            <?if(strpos($MET_AREA, "파주/김포/의정부/남양주" ) !==false) { echo "checked" ; }?>
                          value="파주/김포/의정부/남양주">
                          <label for="MET_AREA10">파주 · 김포 · 의정부 · 남양주</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA11" name="MET_AREA[]" <?if(strpos($MET_AREA, "가평/양평/여주" )
                            !==false) { echo "checked" ; }?> value="가평/양평/여주">
                          <label for="MET_AREA11">가평 · 양평 · 여주</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA12" name="MET_AREA[]" <?if(strpos($MET_AREA, "하남/광주" )
                            !==false) { echo "checked" ; }?> value="하남/광주">
                          <label for="MET_AREA12">하남 · 광주</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA13" name="MET_AREA[]" <?if(strpos($MET_AREA, "성남/용인/분당/수원"
                            ) !==false) { echo "checked" ; }?> value="성남/용인/분당/수원">
                          <label for="MET_AREA13">성남 · 용인 · 분당 · 수원</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA14" name="MET_AREA[]" <?if(strpos($MET_AREA, "기타 경기" )
                            !==false) { echo "checked" ; }?> value="기타 경기">
                          <label for="MET_AREA14">기타 경기</label>
                        </div>
                      </div>
                      <div class="row row03">
                        <p class="lo_title"><i class="xi-full-moon"></i>기타지역</p>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA15" name="MET_AREA[]" <?if(strpos($MET_AREA, "대전/충청" )
                            !==false) { echo "checked" ; }?> value="대전/충청">
                          <label for="MET_AREA15">대전 · 충청</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA16" name="MET_AREA[]" <?if(strpos($MET_AREA, "대구/경북" )
                            !==false) { echo "checked" ; }?> value="대구/경북">
                          <label for="MET_AREA16">대구 · 경북</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA17" name="MET_AREA[]" <?if(strpos($MET_AREA, "부산/경남" )
                            !==false) { echo "checked" ; }?> value="부산/경남">
                          <label for="MET_AREA17">부산 · 경남</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA18" name="MET_AREA[]" <?if(strpos($MET_AREA, "광주/전라" )
                            !==false) { echo "checked" ; }?> value="광주/전라">
                          <label for="MET_AREA18">광주 · 전라</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA19" name="MET_AREA[]" <?if(strpos($MET_AREA, "세종" )
                            !==false) { echo "checked" ; }?> value="세종">
                          <label for="MET_AREA19">세종</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA20" name="MET_AREA[]" <?if(strpos($MET_AREA, "울산" )
                            !==false) { echo "checked" ; }?> value="울산">
                          <label for="MET_AREA20">울산</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_ARE21" name="MET_AREA[]" <?if(strpos($MET_AREA, "강원" )
                            !==false) { echo "checked" ; }?> value="강원">
                          <label for="MET_ARE21">강원</label>
                        </div>
                        <div class="chk_box">
                          <input type="checkbox" id="MET_AREA22" name="MET_AREA[]" <?if(strpos($MET_AREA, "제주" )
                            !==false) { echo "checked" ; }?> value="제주">
                          <label for="MET_AREA22">제주</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="btn_wrap">
                    <input type="submit" title="회원 정보 수정" alt="회원 정보 수정" value="회원 정보 수정" class="btn_modified">
                    <a href="./inc/mainDAO.php?mode=MDELETE&MET_IDX=<?=$MET_IDX?>" class="btn_secession" onclick="return confirm('탈퇴 하시겠습니까??');">회원탈퇴</a>
                  </div>
                </form>
              </div>
          </section>
          <? include("inc/my_side.php"); ?>
        </div>
      </div>
    </main>
    <!-- 모바일하단메뉴 -->
    <? include("inc/bottom_menu.php"); ?>
    <!----- 푸터 시작 ----->
    <? include("inc/footer.php"); ?>
    <!-- top버튼 -->
    <div id="gotop">
      <a href="javascript:void(0);" class="btn_top"><i class="xi-angle-up-thin"></i><span>TOP</span></a>
    </div>
  </div>

</body>

</html>
<script type="text/javascript">
  // 등록 이미지 등록 미리보기
  function readInputFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('.nickname_wrap .img_wrap').html("<img src=" + e.target.result + ">");
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#file_btn').on('change', function() {
    readInputFile(this);
  });

</script>
<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
function execDaumPostcode() {
  new daum.Postcode({
    oncomplete: function(data) {
      var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
      var extraRoadAddr = ''; // 도로명 조합형 주소 변수
      if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
        extraRoadAddr += data.bname;
      }
      if (data.buildingName !== '' && data.apartment === 'Y') {
        extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
      }
      if (extraRoadAddr !== '') {
        extraRoadAddr = ' (' + extraRoadAddr + ')';
      }
      if (fullRoadAddr !== '') {
        fullRoadAddr += extraRoadAddr;
      }
      document.getElementById('MET_ZIP').value = data.zonecode; //5자리 새우편번호 사용
      document.getElementById('MET_ADDR1').value = fullRoadAddr;
      document.getElementById('MET_ADDR2').focus();
    }
  }).open();
}

function autoHypenPhone(str) {
  str = str.replace(/[^0-9]/g, '');
  var tmp = '';
  if (str.length < 4) {
    return str;
  } else if (str.length < 7) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3);
    return tmp;
  } else if (str.length < 11) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3, 3);
    tmp += '-';
    tmp += str.substr(6);
    return tmp;
  } else {
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
cellPhone.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}
</script>
<script type="text/javascript">
<!--
function submit_ck() {
  var pwPattern = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,16}$/;

  if (!$("#MET_NAME").val()) {
    alert("회원 이름을 입력해주세요.");
    $("#MET_NAME").focus();
    return false;
  } else if (!$("#MET_TEL").val()) {
    alert("회원 연락처를 입력해주세요.");
    $("#MET_TEL").focus();
    return false;
  } else if (!$("input:radio[name=MET_GENDER]").is(":checked")) {
    alert("회원 성별을 선택 해주세요.");
    $("#MET_FEMALE").focus();
    return false;
  } else if (!$("#MET_BIRTH").val()) {
    alert("회원 생년월일을 입력해주세요.");
    $("#MET_BIRTH").focus();
    return false;
  } else if (!$("#MET_EMAIL").val()) {
    alert("회원 이메일을 입력해주세요.");
    $("#MET_EMAIL").focus();
    return false;
  } else if ($("input:checkbox[name='MET_POSTING[]']:checked").length == 0) {
    alert("추가정보를 선택해주세요.");
    $("#MET_POSTING1").focus();
    return false;
  } else if ($("input:checkbox[name='MET_AREA[]']:checked").length == 0) {
    alert("활동지역을 선택해주세요.");
    $("#MET_AREA1").focus();
    return false;
  } else if ($("#MET_PW").val() && !$("#MET_PW1").val()) {
    alert("밴경할 비밀번호를 입력해주세요.");
    $("#MET_PW1").focus();
    return false;
  } else if ($("#MET_PW1").val() && !pwPattern.test($("#MET_PW1").val())) {
    alert("비밀번호는 영문 대소문자와 숫자 특수문자\n4~12자리로 입력해야합니다");
    $("#MET_PW1").focus();
    return false;
  } else if ($("#MET_PW").val() && !$("#MET_PW2").val()) {
    alert("변경할 비밀번호 확인을 입력해주세요.");
    $("#MET_PW2").focus();
    return false;
  } else if (!$("#MET_BLOG").val() && !$("#MET_INSTAGRAM").val() && !$("#MET_YOUTUBE").val()) {
    alert("대표 SNS 링크를 하나 이상은 입력해주세요.");
    $("#MET_BLOG").focus();
    return false;
  } else if ($("#MET_BLOG").val() && ($("#MET_BLOG").val().indexOf("http://") === -1 && $("#MET_BLOG").val().indexOf("https://") === -1)) {
    alert("블로그 주소에 http:// 또는 https:// 를 포함하여 입력해주세요.");
    $("#MET_BLOG").focus();
    return false;
  } else if ($("#MET_INSTAGRAM").val() && ($("#MET_INSTAGRAM").val().indexOf("http://") === -1 && $("#MET_INSTAGRAM").val().indexOf("https://") === -1)) {
    alert("인스타그램 주소에 http:// 또는 https:// 를 포함하여 입력해주세요.");
    $("#MET_INSTAGRAM").focus();
    return false;
  } else if ($("#MET_YOUTUBE").val() && ($("#MET_YOUTUBE").val().indexOf("http://") === -1 && $("#MET_YOUTUBE").val().indexOf("https://") === -1)) {
    alert("유투브 주소에 http:// 또는 https:// 를 포함하여 입력해주세요.");
    $("#MET_YOUTUBE").focus();
    return false;
  } else {
    return true;
  }
}
//
-->
</script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>

<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js">