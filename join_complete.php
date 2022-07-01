<!DOCTYPE html>
<html lang="ko">

<head>
  <?php include("inc/head.php"); ?>
  <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
  <script src="js/login.js?v=<?php echo time(); ?>"></script>
</head>

<body>
  <div id="wapper">
    <div id="container" class="bg">
      <div class="contents join join_complete">
        <!-- <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1> -->
        <section class="join_complete_inner">
          <h2>회원가입 완료!</h2>
          <p>축하드립니다<br>HAVE A GOOD DAY!</p>
          <div class="sns_icon">
            <span><i class="xi-browser-text"></i></span>
            <span class="sns_blog">b</span>
            <span><i class="xi-instagram"></i></span>
            <span><i class="xi-facebook"></i></span>
            <span><i class="xi-user-plus-o"></i></span>
            <span><i class="xi-globus"></i></span>
          </div>
          <p>일단 둘러볼래요,</p>
          <a href="index.php" class="btn_home">홈으로 가기</a>
					<p>캠페인 참여를 위한,</p>
          <a href="login.php" class="btn_add">로그인</a>
          <!--<p>캠페인 참여를 위한,</p>
          <a href="javascript:void(0);" class="btn_add">추가 정보 입력하기</a>-->
        </section>
        <div class="footer">
          <p class="">(c)2020스타트체험단.All Righrs Reserved.</p>
          <ul>
            <li><a href="javascript:void(0);">회사소개</a></li>
            <li><a href="javascript:void(0);">이용약관</a></li>
            <li><a href="javascript:void(0);">개인정보처리방침</a></li>
            <li><a href="javascript:void(0);">아메일무단수집거부</a></li>
            <li><a href="javascript:void(0);">광고/제휴문의</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</body>

</html>