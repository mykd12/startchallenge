<!DOCTYPE html>
<html lang="ko">
<?$mode='CP_LIST';?>
<?$type='배달';?>
<?php include_once("inc/mainVO.php"); ?>

<head>
  <?php include("inc/head.php"); ?>
</head>
<style type="text/css">
.service_img {
  width: 30%;
}

@media (max-width:960px) {
  .service_img {
    width: 70%;
  }
}
</style>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main cpList">
      <!-- 서브페이지 lnb -->
      <div class="lnb_wrap">
        <h2 class="lnb_title another">배달 캠페인</h2>
      </div>
      <div class="snb_wrap another">
        <ul class="snb">
          <li class="pc_sns <?if($cate3=='전체' || !$cate3){ echo "on"; }?>"><a href="./<?=$page?>?search=<?=$search?>&cate3=전체&sort=<?=$sort?>"
              class="btn_sns_all">All</a></li>
          <li class="pc_sns <?if($cate3=='블로그'){ echo "on"; }?>"><a href="./<?=$page?>?search=<?=$search?>&cate3=블로그&sort=<?=$sort?>"
              class="btn_blog">Blog</a></li>
          <li class="pc_sns <?if($cate3=='인스타그램'){ echo "on"; }?>"><a href="./<?=$page?>?search=<?=$search?>&cate3=인스타그램&sort=<?=$sort?>"
              class="btn_insta">Instagram</a></li>
          <li class="pc_sns <?if($cate3=='유튜브'){ echo "on"; }?>"><a href="./<?=$page?>?search=<?=$search?>&cate3=유튜브&sort=<?=$sort?>"
              class="btn_youtube">YouTube</a></li>
          <li class="m_select">
            <div class="select">
              <?if($cate3){ echo $cate3;}else if($cate3=='전체' || !$cate3){ echo "전체"; }?>
            </div>
            <ul class="depth02 array_select1">
              <li>
                <div class="option">
                  <input type="radio" name="cate3" id="cate3_all" class="cate3" value="전체" <?if($cate3=='전체' ||
                    !$cate3){ echo "checked" ; }?>>
                  <label for="cate3_all"><span>전체</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="cate3" id="cate3_blog" class="cate3" value="블로그" <?if($cate3=='블로그' ){
                    echo "checked" ; }?>>
                  <label for="cate3_blog"><span>블로그</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="cate3" id="cate3_insta" class="cate3" value="인스타그램" <?if($cate3=='인스타그램' ){
                    echo "checked" ; }?>>
                  <label for="cate3_insta"><span>인스타그램</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="cate3" id="cate3_youtube" class="cate3" value="유튜브" <?if($cate3=='유튜브' ){
                    echo "checked" ; }?>>
                  <label for="cate3_youtube"> <span>유튜브</span></label>
                </div>
              </li>
            </ul>
          </li>
          <li class="select_wrap">
            <div class="select">
              <?if($sort){ echo $sort;}else{ echo "최신순"; }?>
            </div>
            <ul class="depth02 array_select">
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_new" class="sort" value="최신순" <?if($sort=='최신순' || !$sort){
                    echo "checked" ; }?>>
                  <label for="sort_new"><span>최신순</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_best" class="sort" value="인기순" <?if($sort=='인기순' ){
                    echo "checked" ; }?>>
                  <label for="sort_best"><span>인기순</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_end" class="sort" value="마감순" <?if($sort=='마감순' ){
                    echo "checked" ; }?>>
                  <label for="sort_end"> <span>마감순</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_hit" class="sort" value="선정 높은순" <?if($sort=='선정 높은순' ){
                    echo "checked" ; }?>>
                  <label for="sort_hit"> <span>선정 높은순</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_app" class="sort" value="선정 마감순" <?if($sort=='선정 마감순' ){
                    echo "checked" ; }?>>
                  <label for="sort_app"> <span>선정 마감순</span></label>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- 리스트 섹션 시작 -->
      <section class="section1">
        <ul class="campaign_list">
          <?if($cnt > 0){?>
          <?while($row = mysqli_fetch_array($result)){ // 반복문?>
          <?
						$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
						$result_app = mysqli_query($conn,$sql_app);
						$cnt_app = mysqli_num_rows($result_app);

						$today_date = new DateTime(date("Y-m-d")); 
						$end_date = new DateTime($row['CPT_APP_END_DATE']);
						$diff_date    = date_diff($today_date, $end_date);
						if($row['CPT_APP_END_DATE'] >= date("Y-m-d")){
							$d_day = "<span class=\"date red\">".$diff_date->days."</span> 일남음";
						}else{
							$d_day = "<span class=\"date red\">마감</span>";
						}
					?>
          <li>
            <div class="campaign <?if($row['CPT_APP_END_DATE'] < $date){ echo " end "; }?>">
              <a
                href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row['CPT_IDX']?>&search=<?=$search?>&type=<?=$type?>&cate2=<?=$cate2?>&cate3=<?=$cate3?>&sort=<?=$sort?>&pageNo=<?=$pageNo?>">
                <div class="image_wrap">
                  <!-- 캠페인 이미지 -->
                  <img src="/uploads/<?=$row['CPT_IMG_SAVE']?>" alt="캠페인사진">
                  <!-- 마감 bg -->
                  <div class="bg"></div>
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
											<span class="text_YouTude">YouTube</span>
										<?}?>
										<?if(strpos($row['CPT_CATE1'], "기타") !== false){?>
											<span class="text_other">기타</span>
										<?}?>
									</p>
                  <p class="campaign_count">신청<span class="count"><?=$cnt_app?></span>/<span
                      class="total"><?=stripslashes($row['CPT_RECRUITS'])?></span>명</p=>
                  <p class="campaign_date"><?=$d_day?></p>
                  <p class="campaign_ti"><em><?=stripslashes($row['CPT_TITLE'])?></em></p>
                  <p class="campaign_de"><?=stripslashes($row['CPT_SUB_TITLE'])?></p>
                </div>
              </a>
            </div>
          </li>
          <?}?>
          <?}else{?>
          <li style="text-align:center; width:100%; padding:80px 0">
            <img src="/img/service_wait.png" class="service_img" />
          </li>
          <?}?>
        </ul>
        <!-- 페이징 -->
        <? include("inc/paging.php"); ?>
      </section>
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
</body>

</html>
<script type="text/javascript">
<!--
$(".sort").click(function() {
  var sort = $(this).val();
  var cate1 = "<?=$cate1?>";
  var cate2 = "<?=$cate2?>";
  var cate3 = "<?=$cate3?>";
  var search = "<?=$search?>";
  var page = "<?=$page?>";
  location.href = page + "?search=" + search + "&cate3=" + cate3 + "&sort=" + sort;
});
//
-->
</script>
<script type="text/javascript">
<!--
$(".cate3").click(function() {
  var cate3 = $(this).val();
  var cate1 = "<?=$cate1?>";
  var cate2 = "<?=$cate2?>";
  var sort = "<?=$sort?>";
  var search = "<?=$search?>";
  var page = "<?=$page?>";
  location.href = page + "?search=" + search + "&cate3=" + cate3 + "&sort=" + sort;
});
//
-->
</script>