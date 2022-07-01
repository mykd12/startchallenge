<!DOCTYPE html>
<html lang="ko">
<?$mode='MAIN';?>
<?php include_once("./inc/mainVO.php"); ?>

<head>
  <?php include("inc/main_head.php"); ?>
</head>

<body>
  <div id="wrapper">
    <div class=""></div>
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>

    <!-----  메인 시작 ----->
    <main id="main">
      <section class="section1">
        <h2 class="text_ti">추천 캠페인<span class="text_de">블로그·인스타그램·유튜브 캠페인를 추천해 드립니다.</span></h2>
        <div class="campaign_slider_wrap">
          <div class="swiper-container campaign_slider">
            <div class="swiper-wrapper">
              <?while($row_A = mysqli_fetch_array($result_A)){?>
              <?
								$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row_A['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
								$result_app = mysqli_query($conn,$sql_app);
								$cnt_app = mysqli_num_rows($result_app);

								$today_date = new DateTime(date("Y-m-d")); 
								$end_date = new DateTime($row_A['CPT_APP_END_DATE']);
								$diff_date    = date_diff($today_date, $end_date);
								if($row_A['CPT_APP_END_DATE'] >= date("Y-m-d")){
									$d_day = "<span class=\"date red\">".$diff_date->days."</span> 일남음";
								}else{
									$d_day = "<span class=\"date red\">마감</span>";
								}
							?>
              <div class="swiper-slide">
                <div class="campaign">
                  <a href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row_A['CPT_IDX']?>&type=<?=$row_A['CPT_CATE2']?>">
                    <div class="image_wrap">
                      <!-- 캠페인 이미지 -->
                      <img src="/uploads/<?=stripslashes($row_A['CPT_IMG_SAVE'])?>" alt="캠페인사진">
                    </div>
                    <div class="text_wrap">
                      <p class="sns_icon">
                        <?if(strpos($row_A['CPT_CATE1'], "블로그") !== false){?>
													<span class="text_blog">Blog</span>
												<?}?>
												<?if(strpos($row_A['CPT_CATE1'], "인스타그램") !== false){?>
													<span class="text_Instagram">Instagram</span>
												<?}?>
												<?if(strpos($row_A['CPT_CATE1'], "유튜브") !== false){?>
													<span class="text_YouTude">YouTube</span>
												<?}?>
												<?if(strpos($row_A['CPT_CATE1'], "기타") !== false){?>
													<span class="text_other">기타</span>
												<?}?>
                      </p>
                      <p class="campaign_count">신청 <span class="count"><?=$cnt_app?></span>/<span
                          class="total"><?=stripslashes($row_A['CPT_RECRUITS'])?></span>명</p>
                      <p class="campaign_date"><?=$d_day?></p>
                      <p class="campaign_ti"><em><?=stripslashes($row_A['CPT_TITLE'])?></em></p>
                      <p class="campaign_de"><?=stripslashes($row_A['CPT_SUB_TITLE'])?></p>
                    </div>
                  </a>
                </div>
              </div>
              <?}?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </section>
      <section class="section2">
        <div class="event_slider_wrap">
          <div class="swiper-container event_slider">
            <div class="swiper-wrapper">
              <?while($row_V = mysqli_fetch_array($result_V)){?>
              <div class="swiper-slide">
                <div class="event">
                  <a href="<?=$row_V['MVT_URL']?>">
                    <div class="image_wrap1">
                      <img src="/uploads/<?=stripslashes($row_V['MVT_IMG_SAVE'])?>" alt="이벤트사진">
                    </div>
                    <div class="text_wrap">
                      <p class="event_de"><?=stripslashes($row_V['MVT_SUB_TITLE'])?></p>
                      <p class="line blind"><span class="blind">-</span></p>
                      <h3 class="event_ti"><?=stripslashes($row_V['MVT_TITLE'])?></h3>
                    </div>
                  </a>
                </div>
              </div>
              <?}?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </section>
      <section class="section3">
        <h2 class="text_ti">인기 캠페인</h2>
        <ul class="campaign_list">
          <?while($row_B = mysqli_fetch_array($result_B)){?>
          <?
						$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row_B['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
						$result_app = mysqli_query($conn,$sql_app);
						$cnt_app = mysqli_num_rows($result_app);
            
						$today_date = new DateTime(date("Y-m-d")); 
						$end_date = new DateTime($row_B['CPT_APP_END_DATE']);
						$diff_date = date_diff($today_date, $end_date);

						if($row_B['CPT_APP_END_DATE'] >= date("Y-m-d")){
							$d_day = "<span class=\"date red\">".$diff_date->days."</span> 일남음";
						}else{
							$d_day = "<span class=\"date red\">마감</span>";
						}

            ?>
          <li>
            <div class="campaign <?if($row_B['CPT_APP_END_DATE'] < $date){ echo " end "; }?>">
              <a href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row_B['CPT_IDX']?>&type=<?=$row_B['CPT_CATE2']?>">
                <div class="image_wrap">
                  <!-- 캠페인 이미지 -->
                  <img src="/uploads/<?=stripslashes($row_B['CPT_IMG_SAVE'])?>" alt="캠페인사진">
									<div class="bg"></div>
                </div>
                <div class="text_wrap">
                  <p class="sns_icon">
                    <?if(strpos($row_B['CPT_CATE1'], "블로그") !== false){?>
											<span class="text_blog">Blog</span>
										<?}?>
										<?if(strpos($row_B['CPT_CATE1'], "인스타그램") !== false){?>
											<span class="text_Instagram">Instagram</span>
										<?}?>
										<?if(strpos($row_B['CPT_CATE1'], "유튜브") !== false){?>
											<span class="text_YouTude">YouTube</span>
										<?}?>
										<?if(strpos($row_B['CPT_CATE1'], "기타") !== false){?>
											<span class="text_other">기타</span>
										<?}?>
                  </p>
                  <p class="campaign_count">신청 <span class="count"><?=$cnt_app?></span>/<span
                      class="total"><?=stripslashes($row_B['CPT_RECRUITS'])?></span>명</p>
                  <p class="campaign_date"><?=$d_day?></p>
                  <p class="campaign_ti"><em><?=stripslashes($row_B['CPT_TITLE'])?></em></p>
                  <p class="campaign_de"><?=stripslashes($row_B['CPT_SUB_TITLE'])?></p>
                </div>
              </a>
            </div>
          </li>
          <?}?>
        </ul>
      </section>
      <!--<section class="section4">
        <h2 class="text_ti">신규 캠페인</h2>
        <ul class="campaign_list">
          <?while($row_C = mysqli_fetch_array($result_C)){?>
          <?
						$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row_C['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
						$result_app = mysqli_query($conn,$sql_app);
						$cnt_app = mysqli_num_rows($result_app);
            
						$today_date = new DateTime(date("Y-m-d")); 
						$end_date = new DateTime($row_C['CPT_APP_END_DATE']);
						$diff_date = date_diff($today_date, $end_date);
						$d_day = "<span class=\"date red\">".$diff_date->days."</span> 일남음";
            ?>
          <li>
            <div class="campaign">
              <a href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row_C['CPT_IDX']?>&type=<?=$row_C['CPT_CATE2']?>">
                <div class="image_wrap">
                  <img src="/uploads/<?=stripslashes($row_C['CPT_IMG_SAVE'])?>" alt="캠페인사진">
                </div>
                <div class="text_wrap">
                  <p class="sns_icon">
                    <?if(strpos($row_C['CPT_CATE1'], "블로그") !== false){?>
											<span class="text_blog">Blog</span>
										<?}?>
										<?if(strpos($row_C['CPT_CATE1'], "인스타그램") !== false){?>
											<span class="text_Instagram">Instagram</span>
										<?}?>
										<?if(strpos($row_C['CPT_CATE1'], "유튜브") !== false){?>
											<span class="text_YouTude">YouTude</span>
										<?}?>
										<?if(strpos($row_C['CPT_CATE1'], "기타") !== false){?>
											<span class="text_other">기타</span>
										<?}?>
                  </p>
                  <p class="campaign_count">신청 <span class="count"><?=$cnt_app?></span>/<span
                      class="total"><?=stripslashes($row_C['CPT_RECRUITS'])?></span>명</p>
                  <p class="campaign_date"><?=$d_day?></p>
                  <p class="campaign_ti"><em><?=stripslashes($row_C['CPT_TITLE'])?></em></p>
                  <p class="campaign_de"><?=stripslashes($row_C['CPT_SUB_TITLE'])?></p>
                </div>
              </a>
            </div>
          </li>
          <?}?>
        </ul>
      </section>-->
      <section class="section5">
        <ul class="banner_wrap">
          <li><a href="partner.php">
              <div class="image_wrap">
                <img src="images/bann_01.png" alt="배너사진1">
              </div>
            </a></li>
          <li><a href="FAQ.php">
              <div class="image_wrap">
                <img src="images/bann_02.png" alt="배너사진2">
              </div>
            </a></li>
        </ul>
      </section>
    </main>
		<div class="search_modal">
			<div class="search_close">
				<i class="xi-close"></i>
			</div>
			<form  method="get" name="frm" action="<?=$action_url?>" style="width:100%;">
			<input placeholder="Search..." class="main_search_input" type="search" name="search" id="search" title="Search" autocomplete="off" value="">
			</form>
		</div>
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
  // top버튼 
  $(window).scroll(function() {
    if ($(this).scrollTop() > 200) {
      $('#gotop').fadeIn();
    } else {
      $('#gotop').fadeOut();
    }
  });

  $("#gotop").click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 400);
    return false;
  });
  </script>
	<script type="text/javascript">
<!--
	  

	$(".xi-search").on("click",function (){
		$( ".search_modal" ).css( 'z-index', '9995' );
		$( "body" ).css( 'overflow', 'hidden' );
		$(".search_modal").animate({
      opacity : "1"
    },150 );
		$( "#search" ).focus();
	});
	$(".xi-close").on("click",function (){
		$( ".search_modal" ).css( 'z-index', '-1' );
		$( "body" ).css( 'overflow', 'auto' );
		$(".search_modal").animate({
      opacity : "0"
    },150 );
	});
//-->
</script>
</body>

</html>