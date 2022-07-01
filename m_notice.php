<!DOCTYPE html>
<html lang="ko">

<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper" class="mobile">
    <!----- 헤더 시작 ----->
    <header class="m_header">
      <h2 class="title">고객센터</h2>
    </header>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main m_mypage m_notice">
      <div class="sub_inner">
        <!-- 마이페이지 시작-->
        <section class="section1">
          <!-- 내용시작 -->
          <div class="content on">
            <div class="con_head">
							<?if($_SESSION['LOGIN_ID']){?>
              <p>계정 : <span class="id"><?=$_SESSION['LOGIN_ID']?></span></p>
							<?}else{?>
							<p>미 로그인</span></p>
							<?}?>
            </div>
            <ul class="menu_list">
             <!-- <li onclick="location.href='myInquiry.php';"><a href="javascript:void(0);">도움말<i class="xi-angle-right-thin"></i></a></li>-->
              <li class="inquiry" onclick="location.href='myInquiry.php';"><a href="javascript:void(0);">1:1문의<i class="xi-angle-right-thin"></i></a></li>
              <li onclick="location.href='FAQ.php';"><a href="javascript:void(0);">FAQ<i class="xi-angle-right-thin"></i></a></li>
              <li onclick="location.href='notice.php';"><a href="javascript:void(0);">공지사항<i class="xi-angle-right-thin"></i></a></li>
              <li onclick="location.href='partner_write.php';"><a href="javascript:void(0);">광고/제휴문의<i class="xi-angle-right-thin"></i></a></li>
              <li onclick="location.href='guide.php';"><a href="javascript:void(0);">서비스가이드<i class="xi-angle-right-thin"></i></a></li>
            </ul>
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
</body>

</html>