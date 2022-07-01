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
      <div class="contents pwChange result">
        <!-- <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1> -->
        <h2 class="con_ti"><i class="xi-search"></i>비밀번호 찾기</h2>
        <h4><span><i class="xi-check-thin"></i></span></h4>
        <div class="result_box success">
          <form id="pwChange_form" method="post" action="./inc/mainDAO.php" onsubmit="return pwchange();">
					<input type="hidden" name="mode" id="mode" value="PWMODIFY" />
					<input type="hidden" name="MET_IDX" id="MET_IDX" value="<?=$_GET['idx']?>" />
          <div class="pw_box int_box">
            <label for="MET_PW1" id="label_pw1"><i class="xi-key"></i>새 비밀번호</label>
            <input type="PASSWORD" id="MET_PW1" name="MET_PW1" placeholder="" class="int" maxlength="20" value=""
              autocomplete="off">
          </div>
          <div class="pw_box int_box">
            <label for="MET_PW2" id="label_pw2">새비밀번호 확인</label>
            <input type="PASSWORD" id="MET_PW2" name="passwordConfirmd" placeholder="" maxlength="20"
              value="" autocomplete="off">
          </div>
          <input type="submit" title="비밀번호 변경" alt="비밀번호 변경" value="비밀번호 변경" class="btn_change btn_con">
        </div>
        <a href="login.php" class="btn_login  bottom_btn">로그인하러 가기</a>
        <a href="index.php" class="btn_homeGo bottom_btn">홈으로</a>
      </div>
    </div>
  </div>
</body>

</html>