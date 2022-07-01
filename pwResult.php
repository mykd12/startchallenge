<!DOCTYPE html>
<html lang="ko">

<head>
  <?php include("inc/head.php"); ?>
  <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
  <script src="js/login.js?v=<?php echo time(); ?>"></script>
</head>

<body>
  <div id="wapper">
    <div id="container">
      <div class="contents pwResult result">
        <!-- <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1> -->
        <h2 class="con_ti"><i class="xi-search"></i>비밀번호 찾기</h2>
        <h4>
          <span>
            <i class="xi-close-thin"></i>
          </span>
        </h4>
        <!--<div class="result_box success">
          <p class="text_ti"><i class="xi-emoticon-smiley-o"></i><?=$MET_NAME?></p>
          <p class="value">비밀번호가 변경되었습니다.</p>
        </div>-->
        <div class="result_box">
          <p class="value">확인된 회원정보가 없습니다.<br>계정 정보를 확인해주세요.</p>
        </div>
        <!--<a href="login.php" class="btn_login">로그인하러 가기</a>-->
        <a href="idFind.php" class="btn_findAgain">다시 찾기</a>
        <a href="login.php" class="btn_pwFindGo bottom_btn">아이디 찾기</a>
        <a href="index.php" class="btn_homeGo bottom_btn">홈으로</a>
      </div>
    </div>
  </div>
</body>

</html>