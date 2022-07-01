<!DOCTYPE html>
<html lang="ko">
<?$mode='PSINSERT';?>
<?php include_once("inc/mainVO.php"); ?>

<head>
  <?php include("inc/head.php");?>
  <script type="text/javascript" src="../mgr/SE/js/HuskyEZCreator.js" charset="utf-8"></script>
  <script type="text/javascript">
  function movelink(){
     location.href = "/partner_write.php";
}
</script>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main guide partner partner_write">
      <div class="sub_inner">
        <!-- 서비스 가이드시작 -->
        <section class="section1">
          <div class="content">
            <ul class="tab_menu clearfix">
              <li class="on">
                <a href="javascript:void(0);">
                  <p class="tab_ti">스타트체험단</p>
                </a>
              </li>
              <li class="btn_tab02">
                <a href="javascript:void(0);">
                  <p class="tab_ti">FAQ</p>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);">
                  <p class="tab_ti">진행절차</p>
                </a>
              </li>
              <li>
              <!-- onclick="movelink();" -->
                <a href="javascript:void(0);">
                  <p class="tab_ti qan_tab">비용문의</p>
                </a>
              </li>
            </ul>
            <div class="guide_con guide_con01 on">
              <img src="images/partner01.png" alt="스타트체험단소개" class="pc_image">
              <img src="images/m_partner01.png" alt="스타트체험단소개" class="m_image">
            </div>
            <div class="guide_con guide_con02">
              <img src="images/partner02.png" alt="마케팅서비스" class="pc_image">
              <img src="images/m_partner02.png" alt="마케팅서비스" class="m_image">
            </div>
            <div class="guide_con guide_con03">
              <img src="images/partner03.png" alt="광고진행절차" class="pc_image">
              <img src="images/m_partner03.png" alt="광고진행절차" class="m_image">
            </div>
            <div class="guide_con guide_con04">
              <!-- 광고제휴문의 시작-->
              <h2 class="con_ti">광고/제휴문의</h2>
              <!-- 내용시작 -->
              <form id="inqWrite_form" name="frm">
                <input type="hidden" name="mode" id="mode" value="PSINSERT" />
                <div class="row row01 sel_wrap">
                  <div class="select_box01 select_box">
                    <select class="inq_select" title="카테고리" id="PST_CATE1" name="PST_CATE1">
                      <option value="">문의 유형 선택</option>
                      <option value="이벤트 문의">이벤트 문의</option>
                      <option value="제휴 문의">제휴 문의</option>
                      <option value="광고 문의">광고 문의</option>
                      <option value="기타 문의">기타 문의</option>
                    </select>
                  </div>
                  <div class="select_box02 select_box">
                    <select class="inq_select" title="카테고리" id="PST_CATE2" name="PST_CATE2">
                      <option value="">업종 선택</option>
                      <option value="맛집">맛집</option>
                      <option value="뷰티">뷰티</option>
                      <option value="쇼핑몰">쇼핑몰</option>
                      <option value="기타">기타</option>
                    </select>
                  </div>
                  <div class="ti_box int_box">
                    <input type="text" title="제목" placeholder="제목을 입력해주세요." name="PST_TITLE" id="PST_TITLE" value="">
                  </div>
                </div>
                <div class="row row02">
                  <div class="int_box">
                    <input type="text" title="담당자" placeholder="담당자 이름" name="PST_NAME" id="PST_NAME" value="">
                  </div>
                  <div class="int_box">
                    <input type="text" title="업체명" placeholder="업체명" name="PST_COMPANY" id="PST_COMPANY" value="">
                  </div>
                </div>
                <div class="row row03 int_box">
                  <div class="int_box">
                    <input type="text" title="연락처" placeholder="연락처" name="PST_TEL" id="PST_TEL" value="">
                  </div>
                  <div class="int_box">
                    <input type="text" title="이메일" placeholder="이메일 주소" name="PST_EMAIL" id="PST_EMAIL" value="">
                  </div>
                </div>
                <div class="row row04 text_box">
                  <textarea title="내용" rows="15" name="PST_CONTENT" id="PST_CONTENT"
                    placeholder="문의 내용을 입력해주세요."></textarea>
                </div>
                <div class="row row05 text_box">
                  <input type="file" multiple="" name="UPLOAD_FILE" id="UPLOAD_FILE" class="blind">
                  <label for="UPLOAD_FILE">파일첨부</label>
                  <input type="text" class="int_fileAdd" title="첨부파일" placeholder="" readonly>
                </div>
                <div class="btn_box">
                  <a href="javascript:void(0);" class="btn_emt" id="SAVE_BTN" style="padding:7px 30px;">등록하기</a>
                  <!--<a href="javascript:void(0);" class="btn_list">목록으로</a>-->
                </div>
                <!--//inquiry-form-container-->
                </fieldset>
              </form>
            </div>
          </div>
        </section>
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
  <script type="text/javascript">
  // 탭 이벤트
	var editor_object = [];
  $('.tab_menu li').on('click', function(e) {
    e.preventDefault();
    $(this).addClass('on').siblings().removeClass('on');
    //클릭한 li의 순서찾기
    var idx = $(this).index();
    // $('.content').eq(idx).addClass('on').siblings().removeClass('on');
    $('.guide_con').eq(idx).addClass('on').siblings().removeClass('on');
  });
	var eitor_on = 0;
	$(".qan_tab").on('click',function (e){
		if(eitor_on==0){
		nhn.husky.EZCreator.createInIFrame({
      oAppRef: editor_object,
      elPlaceHolder: "PST_CONTENT",
      sSkinURI: "../mgr/SE/SmartEditor2Skin.html",
      htParams: {
        // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
        bUseToolbar: true,
        // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
        bUseVerticalResizer: true,
        // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
        bUseModeChanger: true,
      }
    });
		eitor_on++;
		}
	});

  $('.tab_menu li.btn_tab02').on('click', function(e) {
    $('.text_wrap02 .text02.on').css({
      "display": "block",
    });
    $('.text_wrap02 .text02.02').css({
      "display": "none",
    });
    return false;
  });
  </script>
  <script type="text/javascript">
  $("#UPLOAD_FILE").change(function() {
    var fileValue = $("#UPLOAD_FILE").val().split("\\");
    var fileName = fileValue[fileValue.length - 1]; // 파일명
    $(".int_fileAdd").val(fileName);
  });
  </script>
  <script type="text/javascript">
  <!--
  $(document).ready(function() {
    //전역변수선언


    $("#SAVE_BTN").click(function() {
      //id가 smarteditor인 textarea에 에디터에서 대입
      editor_object.getById["PST_CONTENT"].exec("UPDATE_CONTENTS_FIELD", []);
      var ir1 = $("#PST_CONTENT").val();

      if ($("#PST_CATE1").val() == "") {
        var PST_CATE1 = document.getElementById("PST_CATE1");
        PST_CATE1.focus();
        alert("문의 유형을 선택 해주세요.");
        return false;
      }

      if ($("#PST_CATE2").val() == "") {
        var PST_CATE2 = document.getElementById("PST_CATE2");
        PST_CATE2.focus();
        alert("업종 선택 해주세요.");
        return false;
      }

      if ($("#PST_TITLE").val() == "") {
        var PST_TITLE = document.getElementById("PST_TITLE");
        PST_TITLE.focus();
        alert("문의 제목을 입력 해주세요.");
        return false;
      }

      if ($("#PST_NAME").val() == "") {
        var PST_NAME = document.getElementById("PST_NAME");
        PST_NAME.focus();
        alert("문의 담당자 이름을 입력 해주세요.");
        return false;
      }

      if ($("#PST_COMPANY").val() == "") {
        var PST_COMPANY = document.getElementById("PST_COMPANY");
        PST_COMPANY.focus();
        alert("문의 업체명을 입력 해주세요.");
        return false;
      }

      if ($("#PST_TEL").val() == "") {
        var PST_TEL = document.getElementById("PST_TEL");
        PST_TEL.focus();
        alert("문의 연락처를 입력 해주세요.");
        return false;
      }

      if ($("#PST_EMAIL").val() == "") {
        var PST_EMAIL = document.getElementById("PST_EMAIL");
        PST_EMAIL.focus();
        alert("문의 이메일을 입력 해주세요.");
        return false;
      }


      if (ir1 == "" || ir1 == null || ir1 == '&nbsp;' || ir1 == '<p>&nbsp;</p>') {
        var PST_CONTENT = document.getElementById("PST_CONTENT");
        editor_object.getById["PST_CONTENT"].exec("FOCUS");
        alert("문의 내용을 입력 해주세요.");
        return false;
      }

      var action = "../inc/mainDAO.php";
      //폼 submit
      $('#inqWrite_form').attr("enctype", "multipart/form-data");
      $('#inqWrite_form').attr("action", action);
      $('#inqWrite_form').attr('action', action).attr('method', 'post').submit();
      return true;
    });

  });
	
  //
  -->
  </script>
</body>

</html>