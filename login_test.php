<!DOCTYPE html>
<html lang="ko">
<head>
  <?php include("inc/head.php"); ?>
  <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
  <script src="js/login.js?v=<?php echo time(); ?>"></script>
	<?
	if($_SESSION['LOGIN_IDX']){
		echo "<script>alert('정상적이지 않은 접근입니다.');history.go(-1)</script>";
		exit;
	}

	$client_id = "hmL9HScQeEXVQSMRbeA8";
  $redirectURI = urlencode("http://startchallenge.co.kr/callback.php");
  $state = md5(date("Y-m-d H:i:s"));
  $apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".$client_id."&redirect_uri=".$redirectURI."&state=".$state;

	/*define('NAVER_CLIENT_ID', 'hmL9HScQeEXVQSMRbeA8');
	define('NAVER_CLIENT_SECRET', 't3uoIgplvH');
	define('NAVER_CALLBACK_URL', 'http://startchallenge.co.kr/callback.php');
	session_start();
	// 네이버 로그인 접근토큰 요청 예제
	$naver_state = md5(microtime() . mt_rand());
	$_SESSION['naver_state'] = $naver_state;
	$naver_apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".NAVER_CLIENT_ID."&redirect_uri=".urlencode(NAVER_CALLBACK_URL)."&state=".$naver_state;*/
	?>
</head>
<body>
  <div id="wapper">
    <div id="container">
      <div class="contents login">
        <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1>
        <p class="text_de">
          인플루언서 ! 블로거 ! 의<br>놀이터, 스타트 체험단
        </p>
        <div class="form_wrap">
          <form id="login_form" method="post" action="./inc/mainVO.php" onsubmit="return login_ck();">
					<input type="hidden" name="mode" id="mode" value="LOGIN"/>
            <div class="id_box int_box">
              <label for="LOGIN_ID" id="label_id"><i class="xi-profile-o"></i>아이디</label>
              <input type="text" id="LOGIN_ID" name="LOGIN_ID" maxlength="50" value="">
            </div>
            <div class="pw_box int_box">
              <label for="LOGIN_PW" id="label_pw1"><i class="xi-key"></i>비밀번호</label>
              <input type="PASSWORD" id="LOGIN_PW" name="LOGIN_PW" maxlength="41" value="">
            </div>
            <input type="submit" title="로그인" alt="로그인" value="로그인" class="btn_login">
          </form>
        </div>
        <a href="<?=$apiURL?>" class="btn_naverLogin"><img src="icon/naver.png" alt="네이버아이콘"> 네이버 아이디로 로그인</a>
        <a href="idFind.php" class="btn_idFind bottom_btn">아이디 찾기</a>
        <a href="pwFind.php" class="btn_pwFind bottom_btn">비밀번호 찾기</a>
        <a href="agree.php" class="btn_join bottom_btn">회원가입</a>
      </div>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
<!--
	function login_ck(){
		if(!$("#LOGIN_ID").val()){
			alert("아이디를 입력해주세요!");
			$("#LOGIN_ID").focus();
			return false;
		}else if(!$("#LOGIN_PW").val()){
			alert("패스워드를 입력해주세요!");
			$("#LOGIN_PW").focus();
			return false;
		}else{
			return true;
		}
	}
//-->
</script>
