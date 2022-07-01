<!DOCTYPE html>
<html lang="ko">
<?$mode='MYPAGE';?>
<?php include("inc/mainVO.php");?>
<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper" class="mobile">
    <!----- 헤더 시작 ----->
    <header class="m_header">
      <h2 class="title">마이페이지</h2>
    </header>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main m_mypage">
      <div class="sub_inner">
        <!-- 마이페이지 시작-->
        <section class="section1">
          <!-- 내용시작 -->
          <div class="content on">
            <div class="con_head">
              <ul>
                <li class="cnt_wrap"><span class="text">등록 컨텐츠</span><span class="num"><?=number_format($cnt_A);?></span></li>
                <li class="nickname_wrap">
										<?if($_SESSION['LOGIN_IMG']){?>
											<form id="photo_from">
												<input type="hidden" name="mode" id="mode" value="MYIMG_UPDATE"/>
												<div class="img_wrap">
													<img src="./uploads/<?=$_SESSION['LOGIN_IMG']?>" alt="나의사진">
												</div>
												<input type="file" id="file_btn" name="MET_IMG" accept="image/*" multiple required onchange='aaa'
													class="blind" >
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
                  <!-- <form id="photo_from">
                    <input type="file" accept="image/*,.txt" multiple required capture='user' onchange='aaa'
                      class="blind">
                    <input type="submit" class="blind">
                    <a href="javascript:void(0);" class="btn_photo"><i class="xi-camera"></i></a>
                  </form> -->
                  <span class="text_nick text"><?=$_SESSION['LOGIN_NIC']?></span>
                </li>
                <li class="cnt_wrap"><span class="text">관심 캠페인</span><span class="num"><?=number_format($cnt_B);?></span></li>
              </ul>
            </div>
            <ul class="sns_list">
							<?if($MET_BLOG){?>
								<li><a href="<?=$MET_BLOG?>"><img src="icon/sns_01.png" alt="블로그"><span>Blog 연동</span></a></li>
							<?}else{?>
								<li><a href="myAccount.php"><img src="icon/sns_01.png" alt="블로그"><span>Blog 미연동</span></a></li>
							<?}?>
							<?if($MET_INSTAGRAM){?>
								<li><a href="<?=$MET_INSTAGRAM?>"><img src="icon/sns_02.png" alt="인스타"><span>인스타 연동</span></a></li>
							<?}else{?>
								<li><a href="myAccount.php"><img src="icon/sns_02.png" alt="인스타"><span>인스타 미연동</span></a></li>
							<?}?>
							<?if($MET_YOUTUBE){?>
								<li><a href="<?=$MET_YOUTUBE?>"><img src="icon/sns_03.png" alt="유튜브"><span>유튜브 연동</span></a></li>
							<?}else{?>
								<li><a href="myAccount.php"><img src="icon/sns_03.png" alt="유튜브"><span>유튜브 미연동</span></a></li>
							<?}?>
            </ul>
            <!--<div class="btn_wrap">
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
            </div>-->
            <ul class="menu_list">
              <li><a href="myCampaign.php"><span class="menu_ti">나의 캠페인</span><i class="xi-angle-right-thin"></i>
                  <ul class="cpNm_list">
                    <li><span class="num red"><?=$cnt_C?></span><span class="text">신청</span></li>
                    <li><span class="num red"><?=$cnt_D?></span><span class="text">선정</span></li>
                    <li><span class="num red"><?=$cnt_E?></span><span class="text">등록</span></li>
                    <li><span class="num red"><?=$cnt_F?></span><span class="text">종료</span></li>
                  </ul>
                </a>
              </li>
              <li onclick="location.href='myFavorites.php';"><a href="javascript:void(0)">관심 캠페인<i class="xi-angle-right-thin"></i></a></li>
              <li onclick="location.href='myReview.php';"><a href="javascript:void(0)">등록한 컨텐츠<i class="xi-angle-right-thin"></i></a></li>
              <!--<li onclick="location.href='myPoint.php';"><a href="javascript:void(0)">포인트<i class="xi-angle-right-thin"></i></a></li>-->
              <li onclick="location.href='myAccount.php';"><a href="javascript:void(0)">내 정보 수정<i class="xi-angle-right-thin"></i></a></li>
              <li onclick="location.href='myInquiry.php';"><a href="javascript:void(0)">1:1 문의<i class="xi-angle-right-thin"></i></a></li>
              <!--<li onclick="location.href='myAttendance.php';"><a href="javascript:void(0)">출석부<i class="xi-angle-right-thin"></i></a></li>-->
            </ul>
        </section>
      </div>
    </main>
    <!-- 모바일하단메뉴 -->
    <? include("inc/bottom_menu.php"); ?>
    <!----- 푸터 시작 ----->
    <? include("inc/footer.php"); ?>
    <!-- top버튼 -->
    <div id="gotop">
      <a href="javascript:void(0);" class="btn_top"><i class="xi-angle-up-thin"></i><span>TOP</span></a>
    </div>
  </div>
  <script type="text/javascript">

  </script>
</body>

</html>
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