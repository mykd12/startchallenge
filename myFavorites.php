<!DOCTYPE html>
<html lang="ko">
<?$mode='MY_LK_LIST';?>
<?php include_once("inc/mainVO.php"); ?>

<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main mypage_01 mypage_02 campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- apply시작 -->
          <section class="section1">
            <h2 class="con_ti">관심 캠페인</h2>
            <div class="snb_wrap">
              <ul class="snb">
                <li class="pc_sns on"><a href="javascript:list_view('all');" class="btn_sns_all">전체</a></li>
                <li class="pc_sns"><a href="javascript:list_view('blog');" class="btn_blog">블로그</a></li>
                <li class="pc_sns"><a href="javascript:list_view('instar');" class="btn_insta">인스타그램</a></li>
                <li class="pc_sns"><a href="javascript:list_view('youtube');" class="btn_youtube">유튜브</a></li>
                <li class="m_select">
                  <div class="select">전체</div>
                  <ul class="depth02 array_select1">
                    <li>
                      <div class="option">
                        <input type="radio" name="group" id="blog" checked>
                        <label for="blog"><span>블로그</span></label>
                      </div>
                    </li>
                    <li>
                      <div class="option">
                        <input type="radio" name="group" id="insta">
                        <label for="insta"><span>인스타그램</span></label>
                      </div>
                    </li>
                    <li>
                      <div class="option">
                        <input type="radio" name="group" id="youtube">
                        <label for="youtube"> <span>유튜브</span></label>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- 마이페이지 캠페인들 -->
            <div class="content interest_campaign on">
              <?if($cnt > 0){?>
              <ul class="campaign_list">
                <?while($row = mysqli_fetch_array($result)){ // 반복문?>
                <?
									$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
									$result_app = mysqli_query($conn,$sql_app);
									$cnt_app = mysqli_num_rows($result_app);

									$today_date = new DateTime(date("Y-m-d")); 
									$end_date = new DateTime($row['CPT_APP_END_DATE']);
									$diff_date    = date_diff($today_date, $end_date);
									if($row['CPT_APP_END_DATE'] >= date("Y-m-d")){
										$d_day = "<span class=\"date\">".$diff_date->days."</span> 일남음";
									}else{
										$d_day = "<span class=\"date\">마감</span>";
									}
								?>
                <li class="<?if($row['CPT_CATE1']=='블로그'){ echo " cp_blog"; }else if($row['CPT_CATE1']=='인스타그램' ){
                  echo "cp_instar" ; }else if($row['CPT_CATE1']=='유튜브' ){ echo "cp_youtube" ; }?>">
                  <div class="campaign <?if($row['CPT_APP_END_DATE'] < $date){ echo " end "; }?>">
                    <span class="btn_heart on" onclick="like_cancel('<?=$row['CST_IDX']?>')">
                      <i class="xi-heart-o"></i>
                      <i class="xi-heart"></i>
                    </span>
                    <a href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row['CPT_IDX']?>&type=<?=$row['CPT_CATE2']?>">
                      <div class="image_wrap">
                        <img src="./uploads/<?=$row['CPT_IMG_SAVE']?>" alt="캠페인사진">
                      </div>
                      <div class="text_wrap">
                        <p class="sns_icon">
													<?if(strpos($row['CPT_CATE1'], "블로그") !== false){?>
														<span class="text_blog">Blog</span>
													<?}?>
													<?if(strpos($row['CPT_CATE1'], "인스타그램") !== false){?>
														<span class="text_Instagram">Instagram</span>
													<?}?>
													<?if(strpos($row['CPT_CATE1'], "유튜브") !== false){?>
														<span class="text_YouTude">YouTude</span>
													<?}?>
													<?if(strpos($row['CPT_CATE1'], "기타") !== false){?>
														<span class="text_other">기타</span>
													<?}?>
												</p>
                        <p class="campaign_count"><span class="count">신청 <?=$cnt_app?></span>/<span
                            class="total"><?=stripslashes($row['CPT_RECRUITS'])?></span>명</p>
                        <p class="campaign_date red"><span class="date"><?=$d_day?></span></p>
                        <p class="campaign_ti"><em><?=stripslashes($row['CPT_TITLE'])?></em></p>
                        <p class="campaign_de"><?=stripslashes($row['CPT_SUB_TITLE'])?></p>
                      </div>
                    </a>
                  </div>
                </li>
                <?}?>
              </ul>
              <?}else{?>
              <div class="none">
                <p>관심 캠페인이 없습니다.</p>
                <p>다양한 스타트블로그의 캠페인을 둘러보세요.</p>
                <ul>
                  <li><a href="cpList_product.php">제품 캠페인 보기</a></li>
                  <li><a href="cpList_local.php">지역 캠페인 보기</a></li>
                </ul>
              </div>
              <?}?>
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
  // 탭 이벤트
  $('.tab_menu li').on('click', function(e) {
    e.preventDefault();
    $(this).addClass('on').siblings().removeClass('on');
    //클릭한 li의 순서찾기
    var idx = $(this).index();
    // $('.content').eq(idx).addClass('on').siblings().removeClass('on');
    $('.content').eq(idx).addClass('on').siblings().removeClass('on');
  });

  $('.btn_url').on('click', function() {
    console.log('클릭')
    $(this).closest('li').toggleClass('on').siblings().removeClass('on');
  });

  $('.image_wrap .btn_heart').on('click', function() {
    $(this).toggleClass('on');
  });

  function like_cancel(CST_IDX) {
    location.href = './inc/mainDAO.php?mode=CST_DEL&CST_IDX=' + CST_IDX;
  }
  </script>
  <script type="text/javascript">
  <!--
  function list_view(type) {
    if (type == 'all') {
      $(".cp_blog").css("display", "");
      $(".cp_instar").css("display", "");
      $(".cp_youtube").css("display", "");
    } else if (type == 'blog') {
      $(".cp_blog").css("display", "");
      $(".cp_instar").css("display", "none");
      $(".cp_youtube").css("display", "none");
    } else if (type == 'instar') {
      $(".cp_blog").css("display", "none");
      $(".cp_instar").css("display", "");
      $(".cp_youtube").css("display", "none");
    } else if (type == 'youtube') {
      $(".cp_blog").css("display", "none");
      $(".cp_instar").css("display", "none");
      $(".cp_youtube").css("display", "");
    }
  }
  //
  -->
  </script>
</body>

</html>