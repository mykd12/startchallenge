<!DOCTYPE html>
<html lang="ko">
	<?$mode='FALIST';?>
	<?php include("inc/mainVO.php");?>
<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main mypage_01 mypage_02 faq campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- FAQ 시작-->
          <section class="section1">
            <h2 class="con_ti">FAQ</h2>
            <!-- 내용시작 -->
            <div class="content on">
              <!-- 서치바 -->
              <div class="search_form_wrap">
                <form class="faqSearch_form" method="get" action="FAQ.php">
                  <input type="text" placeholder="" id="faqSearchInt" class="faqSearchInt" name="search" value="<?=$search?>">
                  <button type="submit" class="btn_submit"><i class="xi-search"></i></button>
                </form>
              </div>
              <!-- faq_list -->
              <div class="faqList_wrap">
                <div class="faq_list">
									<?while($row = mysqli_fetch_array($result)){ // 반복문?>
                  <div class="faq_con">
                    <a href="javascript:void(0);" class="btn_click">
                      <p class="faq_p"><?=$row['FAT_QUESTION']?></p>
                    </a>
                    <div class="faq_a">
                      <?=$row['FAT_ANSWER']?>
                    </div>
                  </div>
									<?}?>
                </div>
                <!-- 페이징 -->
                <? include("inc/paging.php"); ?>
              </div>
            </div>
          </section>
          <? include("inc/community_side.php"); ?>
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
  $('.btn_click').on('click', function() {
    $(this).siblings('.faq_a').stop().slideToggle(300);
  });
  </script>
</body>

</html>