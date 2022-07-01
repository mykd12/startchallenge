<div id="m_bottom_menu">
  <div class="bottom_menu_wrap">
    <ul class="bottom_menu">
			<?if(!$_SESSION['LOGIN_IDX']){?>
      <li><a href="index.php"><i class="xi-home-o"></i><br>홈</a></li>
      <li><a href="m_notice.php"><i class="xi-help-o"></i><br>고객센터</a></li>
      <li><a href="agree.php"><i class="xi-user-plus-o"></i><br>회원가입</span></a></li>
      <li><a href="login.php"><i class="xi-log-in"></i><br>로그인</span></a></li>
			<?}else{?>
      <li><a href="index.php"><i class="xi-home-o"></i><br>홈</a></li>
      <li><a href="m_notice.php"><i class="xi-help-o"></i><br>고객센터</a></li>
      <li><a href="m_mypage.php"><i class="xi-user-o"></i><br>마이페이지</span></a></li>
      <li><a href="/inc/mainVO.php?mode=LOGOUT"><i class="xi-log-out"></i><br>로그아웃</span></a></li>
			<?}?>
    </ul>
  </div>
</div>
