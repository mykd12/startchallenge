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
      <div class="contents join">
        <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1>
        <div class="join_step">
          <div class="box on">
            <p class="num">01</p>
            <p class="text">정보입력</p>
          </div>
          <div class="box">
            <p class="num">02</p>
            <p class="text">관심분야선택</p>
          </div>
          <div class="box">
            <p class="num">03</p>
            <p class="text">지역선택</p>
          </div>
          <div class="box">
            <p class="num">04</p>
            <p class="text">가입완료</p>
          </div>
        </div>
        <div class="form_wrap">
          <form id="join_form" method="post">
            <div class="id_box int_box">
              <label for="id" id="label_id" class="lbl">아이디</label>
              <input type="text" id="id" name="id" autocomplete="off" placeholder="" class="int" maxlength="50"
                value="">
              <a href="javascript:void(0);" class=btn_overlap>중복확인</a>
            </div>
            <div class="nick_box int_box">
              <label for="nick" id="label_id" class="lb2">닉네임</label>
              <input type="text" id="nick" name="nickname" autocomplete="off" placeholder="" class="int" maxlength="10"
                value="">
              <a href="javascript:void(0);" class="btn_overlap">중복확인</a>
            </div>
            <div class="pw_box int_box">
              <label for="pw1" id="label_pw1" class="lb3">비밀번호</label>
              <input type="PASSWORD" id="pw1" name="password" placeholder="" class="int" maxlength="41" value="">
            </div>
            <div class="pw_box int_box">
              <label for="pw2" id="label_pw2" class="lb4">비밀번호 확인</label>
              <input type="PASSWORD" id="pw2" name="passwordConfirmd" placeholder="" class="int" maxlength="41"
                value="">
            </div>
            <input type="submit" title="다음가입단계로" alt="다음가입단계로" value="다음 단계로" class="btn_check btn_next">

            <input type="hidden" name="agree1" value="<?=$agree1?>">
            <input type="hidden" name="agree2" value="<?=$agree2?>">
            <input type="hidden" name="agree3" value="<?=$agree3?>">
            <input type="hidden" name="id_checked" id="id_checked" value="not_checked">
          </form>
        </div>
        <a class="btn_naverJoin">네이버 아이디로 회원가입</a>
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
        <div class="error_wrap">
          <div class="error error_em1"><i class="xi-warning"></i>이메일을 입력해주세요!</div>
          <div class="error error_em2"><i class="xi-warning"></i>이메일형식에 맞게 입력해주세요!</div>
          <div class="error error_id1"><i class="xi-warning"></i>아이디를 입력해주세요!</div>
          <div class="error error_id2"><i class="xi-warning"></i>아이디는 영문 대소문자 또는 영문+숫자 4~12자리로 입력해야합니다.</div>
          <div class="error error_id3"><i class="xi-warning"></i>중복 아이디입니다. 다시 입력해주세요!</div>
          <div class="error error_pw1"><i class="xi-warning"></i>비밀번호를 입력해주세요!</div>
          <div class="error error_pw2"><i class="xi-warning"></i>비밀번호를 확인해주세요!</div>
          <div class="error error_pw3"><i class="xi-warning"></i>비밀번호는 영문 대소문자와 숫자 특수문자<br> 4~12자리로 입력해야합니다.</div>
          <div class="error error_pw4"><i class="xi-warning"></i>비밀번호가 일치하지 않습니다. 확인해주세요!</div>
          <div class="error error_id_pass"><i class="xi-check-circle"></i>사용가능한 아이디입니다.</div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>