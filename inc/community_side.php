<aside class="aside1">
	<div class="nickname_wrap">
		<div class="img_wrap">
			<?if($_SESSION['LOGIN_IMG']){?>
				<img src="./uploads/<?=$_SESSION['LOGIN_IMG']?>" alt="나의사진">
			<?}else{?>
				<img src="icon/smlie.png" alt="나의사진">
			<?}?>
		</div>
		<!--<form id="photo_from">
			<input type="file" accept="image/*,.txt" multiple required capture='user' onchange='aaa' class="blind">
			<input type="submit" class="blind">
			<a href="javascript:void(0);" class="btn_photo"><i class="xi-camera"></i></a>
		</form>-->
		<span class="text_nick"><?=$_SESSION['LOGIN_NIC']?></span>
	</div>
	<ul class="sns_list">
		<?if($MET_BLOG){?>
			<li><a href="<?=$MET_BLOG?>" target="_blank"><img src="icon/sns_01.png" alt="블로그"><span><?=$MET_BLOG?></span></a></li>
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
		<!--<li><a href="myInquiry.php">1:1문의</a></li>-->
		<li <?if($page=='notice.php' || $page=='notice_view.php'){ echo "class='on'";}?>><a href="notice.php">공지사항</a></li>
		<li <?if($page=='FAQ.php'){ echo "class='on'";}?>><a href="FAQ.php">FAQ</a></li>
		<li <?if($page=='serviceGuide.php'){ echo "class='on'";}?>><a href="guide.php">서비스가이드</a></li>
		<li <?if($page=='partner_write.php'){ echo "class='on'";}?>><a href="partner_write.php">광고/제휴문의</a></li>
	</ul>
	<?if($_SESSION['LOGIN_IDX']){?>
		<a href="./inc/mainDAO.php?mode=CHECK&page=<?=$page?>" class="btn_att btn_style">출석체크하기</a>
	<?}else{?>
		<a href="javascript:alert('로그인 후 서비스 가능합니다.');" class="btn_att btn_style">출석체크하기</a>
	<?}?>
</aside>