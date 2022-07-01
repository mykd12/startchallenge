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
      <div class="contents pwFind find">
        <!-- <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1> -->
        <h2 class="con_ti"><i class="xi-search"></i>비밀번호 찾기</h2>  
        <div class="form_wrap">
          <form id="login_form" method="post" action="./inc/mainVO.php" onsubmit="return findPw_ck();">
						<input type="hidden" name="mode" id="mode" value="FINDPW"/>
            <div class="id_box int_box">
              <label for="id" id="label_id"><i class="xi-profile-o"></i>아이디</label>
              <input type="text" id="id" name="id" autocomplete="off" maxlength="50" value="">
            </div>
            <div class="name_box int_box">
              <label for="name" id="label_name"><i class="xi-emoticon-smiley-o"></i>이름</label>
              <input type="text" id="name" name="name" autocomplete="off" maxlength="30" value="">
            </div>
            <div class="email_box int_box">
              <label for="email" id="label_email"><i class="xi-mail-o"></i>이메일</label>
              <input type="email" name="email" id="email1" value="" autocomplete="off" >
            </div>
            <div class="tel_box int_box">
              <label for="tel" id="label_tel"><i class="xi-call"></i>핸드폰번호</label>
              <input type="tel" id="tel" name="tel" autocomplete="off" >
            </div>
            <input type="submit" title="확인" alt="확인" value="확인" class="btn_con">
          </form>
        </div>
        <a href="login.php" class="btn_loginGo bottom_btn">로그인하기</a>
        <a href="index.php" class="btn_homeGo bottom_btn">홈으로</a>
      </div>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
<!--
	function autoHypenPhone(str){
			str = str.replace(/[^0-9]/g, '');
			var tmp = '';
			if( str.length < 4){
					return str;
			}else if(str.length < 7){
					tmp += str.substr(0, 3);
					tmp += '-';
					tmp += str.substr(3);
					return tmp;
			}else if(str.length < 11){
					tmp += str.substr(0, 3);
					tmp += '-';
					tmp += str.substr(3, 3);
					tmp += '-';
					tmp += str.substr(6);
					return tmp;
			}else{
					tmp += str.substr(0, 3);
					tmp += '-';
					tmp += str.substr(3, 4);
					tmp += '-';
					tmp += str.substr(7);
					return tmp;
			}
			return str;
		}

	var cellPhone = document.getElementById('tel');
	cellPhone.onkeyup = function(event){
		event = event || window.event;
		if(this.value.length > 13){
			var tel_txt = this.value.slice(0,-1);
			this.value=tel_txt;
		}
		var _val = this.value.trim();
		this.value = autoHypenPhone(_val) ;
	}
//-->
</script>