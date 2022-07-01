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
          <img src="images/landing.jpg" width="100%">
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

</body>

</html>