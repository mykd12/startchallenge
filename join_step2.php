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
	?>
</head>

<body>
  <div id="wapper">
    <div id="container">
      <div class="contents join">
        <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1>
        <div class="join_step">
          <div class="box">
            <p class="num">01</p>
            <p class="text">정보입력</p>
          </div>
          <div class="box on">
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
            <h4><i class="xi-zoom-in"></i> 관심분야선택<span class="red">(*중복가능)</span> </h4>
          <form id="join_form" method="post" action="join_step3.php" onsubmit="return join_step2();">
						<input type="hidden" name="MET_ID" id="MET_ID" value="<?=$_POST['MET_ID']?>"/>
						<input type="hidden" name="MET_TEL" id="MET_TEL" value="<?=$_POST['MET_TEL']?>"/>
						<input type="hidden" name="MET_NIC" id="MET_NIC" value="<?=$_POST['MET_NIC']?>"/>
						<input type="hidden" name="MET_NAME" id="MET_NAME" value="<?=$_POST['MET_NAME']?>"/>
						<input type="hidden" name="MET_EMAIL" id="MET_EMAIL" value="<?=$_POST['MET_EMAIL']?>"/>
						<input type="hidden" name="MET_PW" id="MET_PW" value="<?=$_POST['MET_PW1']?>"/>
						<input type="hidden" name="MET_NAVER" id="MET_NAVER" value="<?=$_POST['MET_NAVER']?>"/>
            <div class="chk_box left">
              <input type="checkbox" id="MET_POSTING1" name="MET_POSTING[]" value="맛집">
              <label for="MET_POSTING1" id="" class="">맛집</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_POSTING2" name="MET_POSTING[]" value="생활,리빙">
              <label for="MET_POSTING2">생활/리빙</label>
            </div>
            <div class="chk_box left">
              <input type="checkbox" id="MET_POSTING3" name="MET_POSTING[]" value="패션">
              <label for="MET_POSTING3">패션</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_POSTING4" name="MET_POSTING[]" value="유아">
              <label for="MET_POSTING4">유아</label>
            </div>
            <div class="chk_box left">
              <input type="checkbox" id="MET_POSTING5" name="MET_POSTING[]" value="뷰티샵,미용">
              <label for="MET_POSTING5">뷰티샵/미용</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_POSTING6" name="MET_POSTING[]" value="도서,교육">
              <label for="MET_POSTING6">도서/교육</label>
            </div>
            <div class="chk_box left">
              <input type="checkbox" id="MET_POSTING7" name="MET_POSTING[]" value="일상">
              <label for="MET_POSTING7">일상</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_POSTING8" name="MET_POSTING[]" value="여행,숙박">
              <label for="MET_POSTING8">여행/숙박</label>
            </div>
            <div class="chk_box left">
              <input type="checkbox" id="MET_POSTING9" name="MET_POSTING[]" value="디지털가전">
              <label for="MET_POSTING9">디지털가전</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_POSTING10" name="MET_POSTING[]" value="배달,배송">
              <label for="MET_POSTING10">배달/배송</label>
            </div>
            <div class="chk_box left">
              <input type="checkbox" id="MET_POSTING11" name="MET_POSTING[]" value="화장품">
              <label for="MET_POSTING11">화장품</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_POSTING12" name="MET_POSTING[]" value="기타">
              <label for="MET_POSTING12">기타</label>
            </div>
            <input type="submit" title="다음가입단계로" alt="다음가입단계로" value="다음 단계로" class="btn_check btn_next">
          </form>
        </div>
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
<script>
$("input:checkbox[name='MET_POSTING[]']").change(function(){
  if ($("input:checkbox[name='MET_POSTING[]']").is(":checked") == true){
    $('.btn_check').addClass('on')
  }else{
    $('.btn_check').removeClass('on')
  }  
}); 
$('.btn_check').on('click', function () {
if ($("input:checkbox[name='MET_POSTING[]']").is(":checked") == true){
  return true;
}else{
  alert('하나 이상 체크 부탁드립니다');
  return false;
}
});
</script>

</html>