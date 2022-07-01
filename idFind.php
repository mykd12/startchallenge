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
      <div class="contents idFind find">
        <!-- <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1> -->
        <h2 class="con_ti"><i class="xi-search"></i>아이디 찾기</h2>  
        <div class="form_wrap">
          <form id="login_form" method="post" action="../inc/mainVO.php" onsubmit="return findId_ck();">
					<input type="hidden" name="mode" id="mode" value="FINDID"/>
					<input type="hidden" name="idx" id="idx" value=""/>
            <div class="name_box int_box">
              <label for="name" id="label_name"><i class="xi-emoticon-smiley-o"></i>이름</label>
              <input type="text" id="name" name="name" autocomplete="off" maxlength="30" value="">
            </div>
            <div class="email_box int_box">
              <label for="email" id="label_email"><i class="xi-mail-o"></i>이메일</label>
              <input type="email" name="email" id="email1" autocomplete="off" value="" >
            </div>
            <!--<div class="tel_box int_box">
              <label for="tel" id="label_tel"><i class="xi-call"></i>핸드폰번호</label>
              <input type="tel" id="tel" name="tel" autocomplete="off" >
            </div>-->
            <input type="submit" title="확인" alt="확인" value="확인" class="btn_con">
          </form>
        </div>
        <a href="login.php" class="btn_pwFindGo bottom_btn">비밀번호찾기</a>
        <a href="index.php" class="btn_homeGo bottom_btn">홈으로</a>
      </div>
    </div>
  </div>
</body>
</html>