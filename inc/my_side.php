<aside class="aside1">
  <div class="nickname_wrap">
    <?if($_SESSION['LOGIN_IMG']){?>
		<form id="photo_from">
			<input type="hidden" name="mode" id="mode" value="MYIMG_UPDATE"/>
      <div class="img_wrap">
        <img src="./uploads/<?=$_SESSION['LOGIN_IMG']?>" alt="나의사진">
      </div>
      <input type="file" id="file_btn" name="MET_IMG" accept="image/*" multiple required onchange='aaa'
        class="blind">
      <input type="submit" class="blind">
      <label for="file_btn" class="btn_photo"><i class="xi-camera"></i></label>
    </form>
    <?}else{?>
		<form id="photo_from">
			<input type="hidden" name="mode" id="mode" value="MYIMG_UPDATE"/>
      <div class="img_wrap">
				<img src="icon/smlie.png" alt="나의사진">
			</div>
      <input type="file" id="file_btn" name="MET_IMG" accept="image/*" multiple required onchange='aaa'
        class="blind">
      <input type="submit" class="blind">
      <label for="file_btn" class="btn_photo"><i class="xi-camera"></i></label>
    </form>
    <?}?>
    <span class="text_nick"><?=$_SESSION['LOGIN_NIC']?></span>
  </div>
  <ul class="sns_list">
    <?if($MET_BLOG){?>
    <li><a href="<?=$MET_BLOG?>" target="_blank"><img src="icon/sns_01.png" alt="블로그"><span><?=$MET_BLOG?></span></a>
    </li>
    <?}else{?>
    <li><a href="myAccount.php"><img src="icon/sns_01.png" alt="블로그"><span>블로그계정을 연결해주세요!</span></a></li>
    <?}?>
    <?if($MET_INSTAGRAM){?>
    <li><a href="<?=$MET_INSTAGRAM?>" target="_blank"><img src="icon/sns_02.png" alt="인스타"><span><?=$MET_INSTAGRAM?></span></a></li>
    <?}else{?>
    <li><a href="myAccount.php"><img src="icon/sns_02.png" alt="인스타"><span>인스타계정을 연결해주세요!</span></a></li>
    <?}?>
    <?if($MET_YOUTUBE){?>
    <li><a href="<?=$MET_YOUTUBE?>" target="_blank"><img src="icon/sns_03.png" alt="유튜브"><span><?=$MET_YOUTUBE?></span></a></li>
    <?}else{?>
    <li><a href="myAccount.php"><img src="icon/sns_03.png" alt="유튜브"><span>유튜브계정을 연결해주세요!</span></a></li>
    <?}?>
  </ul>
  <ul class="menu_list">
    <li <?if($page=='myCampaign.php' ){ echo "class='on'" ;}?>><a href="myCampaign.php">나의 캠페인</a></li>
    <li <?if($page=='myFavorites.php' ){ echo "class='on'" ;}?>><a href="myFavorites.php">관심 캠페인</a></li>
    <li <?if($page=='myReview.php' ){ echo "class='on'" ;}?>><a href="myReview.php">등록한 컨텐츠</a></li>
<!--    <li <?if($page=='myPoint.php' ){ echo "class='on'" ;}?>><a href="myPoint.php">포인트</a></li>-->
    <li <?if($page=='myAccount.php' ){ echo "class='on'" ;}?>><a href="myAccount.php">회원정보 수정</a></li>
    <li <?if($page=='myInquiry.php' || $page=='inquiry_view.php' || $page=='inquiry_write.php' ){ echo "class='on'" ;}?>
      ><a href="myInquiry.php">1:1 문의</a></li>
<!--    <li <?if($page=='myAttendance.php' ){ echo "class='on'" ;}?>><a href="myAttendance.php">출석부</a></li>-->
  </ul>
  <?if($_SESSION['LOGIN_IDX']){?>
	<?if($cnt_adt_A == 0){?>
  <a href="./inc/mainDAO.php?mode=CHECK&page=<?=$page?>" class="btn_att btn_style">출석체크하기</a>
	<?}else{?>
	<ul class="confirm_attendance">
		<li class="cnt">
			<span class="text">이번달 출석 </span>
			<span class="num"> <?=number_format($cnt_adt_B)?></span>
		</li>
		<li class="all_cnt">
			<span class="text">총 누적 출석 </span>
			<span class="num"> <?=number_format($cnt_adt_C)?></span>
		</li>
	</ul>
	<?}?>
  <?}else{?>
  <a href="javascript:alert('로그인 후 서비스 가능합니다.');" class="btn_att btn_style">출석체크하기</a>
  <?}?>
</aside>
<script type="text/javascript">
<!--
	$( "#file_btn" ).change(function() {
		var form = $('#photo_from')[0]
    var data = new FormData(form);

		$.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "./inc/mainDAO.php",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
        	console.log("success");
					console.log(data);
        },
        error: function (e) {
					console.log("fail");
        }
    });
	});
//-->
</script>