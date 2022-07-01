<!DOCTYPE html>
<html lang="ko">
<?$mode='IDFINDRESULT';?>
<?php include_once("inc/mainVO.php"); ?>

<head>
  <?php include("inc/head.php"); ?>
  <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
  <script src="js/login.js?v=<?php echo time(); ?>"></script>
</head>
<body>
  <div id="wapper">
    <div id="container">
      <div class="contents idResult result">
        <!-- <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1> -->
        <h2 class="con_ti"><i class="xi-search"></i>아이디 찾기</h2>
        <h4>
					<span>
						<?if($MET_IDX){?><i class="xi-check-thin"></i><?}else{?><i class="xi-close-thin"></i><?}?>
					</span>
				</h4>
				<?if($MET_IDX){?>
        <div class="result_box ">
          <p class="text_ti"><i class="xi-emoticon-smiley-o"></i><?=$MET_NAME?>님의 아이디입니다.</p>
          <p class="value"><?=$MET_ID?></p>
        </div> 
				<?}else{?>
        <div class="result_box ">
          <p class="value">확인된 계정이 없습니다.<br>계정 정보를 확인해주세요.</p>
        </div> 
				<?}?>
        <a href="idFind.php" class="btn_findAgain">다시 찾기</a>
        <a href="login.php" class="btn_login">아이디로 로그인</a>
        <a href="pwFind.php" class="btn_pwFindGo bottom_btn">비밀번호찾기</a>
        <a href="index.php" class="btn_homeGo bottom_btn">홈으로</a>
      </div>
    </div>
  </div>
</body>
</html>