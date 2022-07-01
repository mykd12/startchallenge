<!DOCTYPE html>
<html lang="ko">
<?$mode='MY_ATT';?>
<?php include_once("inc/mainVO.php"); ?>
<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main mypage_01 mypage_02 myAttendance campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- 문의내용 시작-->
          <section class="section1">
            <h2 class="con_ti">출석부</h2>
            <!-- 내용시작 -->
            <div class="content on">
              <div class="con_head">
                <a href="./myAttendance.php?type=my" class="btn_my">내 출석보기</a>
              </div>
              <div class="con_attendance">
                <ul class="attendance_list">
									<?while($row = mysqli_fetch_array($result)){ // 반복문?>
									<?
										$sql_select="SELECT * FROM MEM_TB WHERE MET_IDX='".$row['MET_IDX']."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
										$result_select = mysqli_query($conn,$sql_select);
										$row_select = mysqli_fetch_array($result_select);
									?>

                  <li>
                    <ul class="row">
                      <li class="img">
                        <div class="image_wrap">
													<?if($row_select['MET_IMG_SAVE']){?>
														<img src="./uploads/<?=$row_select['MET_IMG_SAVE']?>" alt="나의사진">
													<?}else{?>
														<img src="icon/smlie.png" alt="나의사진">
													<?}?>
                        </div>
                      </li>
                      <li class="subject">
                        <span class="date"><?=date("Y.m.d H:i:s", strtotime($row['ADT_REG_DATE']));?></span>
                        <span class="subject_com">출석체크완료</span>
                        <span class="nickname"><?=$row_select['MET_NIC']?></span>
                      </li>
                      <li class="point"><span class="accumulate">적립</span><span class="red num">50p</span></li>
                    </ul>
                  </li>
									<?}?>
                </ul>
                <!-- 페이징 -->
                <? include("inc/paging.php"); ?>
              </div>
            </div>
          </section>
          <? include("inc/my_side.php"); ?>
        </div>
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
  $('.btn_wrap .btn_att').on('click', function() {
    console.log('sdssdsd')
    $(this).parent().addClass('on');
  });
  </script>
</body>

</html>