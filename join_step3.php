<!DOCTYPE html>
<html lang="ko">
<?
	$MET_POSTING = $_POST['MET_POSTING'];
	$POSTING_CNT = COUNT($MET_POSTING);
	$POSTING="";
	for($i=0; $i < $POSTING_CNT; $i++){
		if($i==0){
			$POSTING .= $MET_POSTING[$i];
		}else{
			$POSTING .= "|".$MET_POSTING[$i];
		}
	}
?>
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
      <div class="contents join join_03">
        <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1>
        <div class="join_step">
          <div class="box">
            <p class="num">01</p>
            <p class="text">정보입력</p>
          </div>
          <div class="box">
            <p class="num">02</p>
            <p class="text">관심분야선택</p>
          </div>
          <div class="box on">
            <p class="num">03</p>
            <p class="text">지역선택</p>
          </div>
          <div class="box">
            <p class="num">04</p>
            <p class="text">가입완료</p>
          </div>
        </div>
        <div class="form_wrap">
            <h4><i class="xi-flag-o"></i>활동지역선택<span class="red">(*중복가능)</span> </h4>
          <form id="join_form" method="post" action="join_step4.php"  onsubmit="return join_step3();">
						<input type="hidden" name="MET_ID" id="MET_ID" value="<?=$_POST['MET_ID']?>"/>
						<input type="hidden" name="MET_TEL" id="MET_TEL" value="<?=$_POST['MET_TEL']?>"/>
						<input type="hidden" name="MET_NIC" id="MET_NIC" value="<?=$_POST['MET_NIC']?>"/>
						<input type="hidden" name="MET_NAME" id="MET_NAME" value="<?=$_POST['MET_NAME']?>"/>
						<input type="hidden" name="MET_EMAIL" id="MET_EMAIL" value="<?=$_POST['MET_EMAIL']?>"/>
						<input type="hidden" name="MET_PW" id="MET_PW" value="<?=$_POST['MET_PW']?>"/>
						<input type="hidden" name="MET_POSTING" id="MET_POSTING" value="<?=$POSTING?>"/>
						<input type="hidden" name="MET_NAVER" id="MET_NAVER" value="<?=$_POST['MET_NAVER']?>"/>
            <div class="chk_box left">
              <input type="checkbox" id="MET_AREA1" name="MET_AREA[]" value="서울">
              <label for="MET_AREA1">서울</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_AREA2" name="MET_AREA[]" value="경기">
              <label for="MET_AREA2">경기</label>
            </div>
            <div class="chk_box left">
              <input type="checkbox" id="MET_AREA3" name="MET_AREA[]" value="인천">
              <label for="MET_AREA3">인천</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_AREA4" name="MET_AREA[]" value="강원">
              <label for="MET_AREA4">강원</label>
            </div>
            <div class="chk_box left">
              <input type="checkbox" id="MET_AREA5" name="MET_AREA[]" value="대전/충청">
              <label for="MET_AREA5">대전 · 충청 </label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_AREA6" name="MET_AREA[]" value="대구/경북">
              <label for="MET_AREA6">대구 · 경북</label>
            </div>
            <div class="chk_box left">
              <input type="checkbox" id="MET_AREA7" name="MET_AREA[]" value="부산/경남">
              <label for="MET_AREA7">부산 · 경남</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_AREA8" name="MET_AREA[]" value="광주/전라">
              <label for="MET_AREA8">광주 · 전라</label>
            </div>
            <div class="chk_box left">
              <input type="checkbox" id="MET_AREA9" name="MET_AREA[]" value="세종">
              <label for="MET_AREA9">세종</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_AREA10" name="MET_AREA[]" value="울산">
              <label for="MET_AREA10">울산</label>
            </div>
            <div class="chk_box left">
              <input type="checkbox" id="MET_AREA11" name="MET_AREA[]" value="제주">
              <label for="MET_AREA11">제주</label>
            </div>
            <div class="chk_box right">
              <input type="checkbox" id="MET_AREA12" name="MET_AREA[]" value="기타">
              <label for="MET_AREA12">기타</label>
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

$("input:checkbox[name='MET_AREA[]']").change(function(){
  if ($("input:checkbox[name='MET_AREA[]']").is(":checked") == true){
    $('.btn_check').addClass('on')
  }else{
    $('.btn_check').removeClass('on')
  }  
}); 
$('.btn_check').on('click', function () {
if ($("input:checkbox[name='MET_AREA[]']").is(":checked") == true){
  return true;
}else{
  alert('하나 이상 체크 부탁드립니다');
  return false;
}
});
</script>

</html>