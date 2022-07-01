<!DOCTYPE html>
<html lang="ko">
<?$mode='MY_CP_LIST';?>
<?php include_once("inc/mainVO.php"); ?>

<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main mypage_01 campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- apply시작 -->
          <section class="section1">
            <h2 class="con_ti">나의 캠페인</h2>
            <ul class="tab_menu">
              <li class="on"><a href="javascript:void(0);" class="tab1">신청한<br> 캠페인<span class="cnt"> <?=$cnt_A?></span>
                </a></li>
              <li><a href="javascript:void(0);" class="tab2">선정된<br> 캠페인<span class="cnt"> <?=$cnt_B?></span></a></li>
              <li><a href="javascript:void(0);" class="tab3">등록한<br> 캠페인<span class="cnt"> <?=$cnt_C?></span></a></li>
              <li><a href="javascript:void(0);" class="tab4">종료된<br> 캠페인<span class="cnt"> <?=$cnt_D?></span></a></li>
            </ul>
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
                        <input type="radio" name="group" id="blog" checked onclick="list_view('blog');">
                        <label for="blog"><span>블로그</span></label>
                      </div>
                    </li>
                    <li>
                      <div class="option">
                        <input type="radio" name="group" id="insta" onclick="list_view('instar');">
                        <label for="insta"><span>인스타그램</span></label>
                      </div>
                    </li>
                    <li>
                      <div class="option">
                        <input type="radio" name="group" id="youtube" onclick="list_view('youtube');">
                        <label for="youtube"> <span>유튜브</span></label>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>

            <!-- 마이페이지 캠페인들 -->
            <div class="content apply_campaign on">
              <?if($cnt_A > 0){?>
              <ul class="campaign_list">
                <?while($row_A = mysqli_fetch_array($result_A)){ // 반복문?>
                <?
									$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row_A['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
									$result_app = mysqli_query($conn,$sql_app);
									$cnt_app = mysqli_num_rows($result_app);

									$today_date = new DateTime(date("Y-m-d")); 
									$end_date = new DateTime($row_A['CPT_APP_END_DATE']);
									$diff_date    = date_diff($today_date, $end_date);
									if($row_A['CPT_APP_END_DATE'] >= date("Y-m-d")){
										$d_day = "<span class=\"date\">".$diff_date->days."</span> 일남음";
									}else{
										$d_day = "<span class=\"date\">마감</span>";
									}
								?>
                <li class="<?if($row_A['CPT_CATE1']=='블로그'){ echo " cp_blog"; }else if($row_A['CPT_CATE1']=='인스타그램' ){
                  echo "cp_instar" ; }else if($row_A['CPT_CATE1']=='유튜브' ){ echo "cp_youtube" ; }?>" >
                  <div class="campaign <?if($row_A['CPT_APP_END_DATE'] < $date){ echo " end "; }?>"">
                    <a href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row_A['CPT_IDX']?>&type=<?=$row_A['CPT_CATE2']?>">
                    <div class="image_wrap">
                      <img src="./uploads/<?=$row_A['CPT_IMG_SAVE']?>" alt="캠페인사진">
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
                        <span class="text_YouTude">YouTude</span>
                        <?}?>
                        <?if(strpos($row_A['CPT_CATE1'], "기타") !== false){?>
                        <span class="text_other">기타</span>
                        <?}?>
                      </p>
                      <p class="campaign_count"><span class="count">신청 <?=$cnt_app?></span>/<span
                          class="total"><?=stripslashes($row_A['CPT_RECRUITS'])?></span>명</p>
                      <p class="campaign_date red"><span class="date"><?=$d_day?></span></p>
                      <p class="campaign_ti"><em><?=stripslashes($row_A['CPT_TITLE'])?></em></p>
                      <p class="campaign_de"><?=stripslashes($row_A['CPT_SUB_TITLE'])?></p>
                    </div>
                    </a>
                  </div>
                </li>
                <?}?>
              </ul>
              <!-- 페이징 -->
              <?}else{?>
              <div class="none">
                <p>신청한 캠페인이 없습니다.</p>
                <p>다양한 스타트블로그의 캠페인을 둘러보세요.</p>
                <ul>
                  <li><a href="cpList_product.php">제품 캠페인 보기</a></li>
                  <li><a href="cpList_local.php">지역 캠페인 보기</a></li>
                </ul>
              </div>
              <?}?>
            </div>
            <div class="content select_campaign">
              <?if($cnt_B > 0){?>
              <ul class="campaign_list">
                <?while($row_B = mysqli_fetch_array($result_B)){ // 반복문?>
                <?
									$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row_B['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
									$result_app = mysqli_query($conn,$sql_app);
									$cnt_app = mysqli_num_rows($result_app);

									$today_date = new DateTime(date("Y-m-d")); 
									$end_date = new DateTime($row_B['CPT_APP_END_DATE']);
									$diff_date    = date_diff($today_date, $end_date);
									if($row_B['CPT_APP_END_DATE'] >= date("Y-m-d")){
										$d_day = "<span class=\"date\">".$diff_date->days."</span> 일남음";
									}else{
										$d_day = "<span class=\"date\">마감</span>";
									}

									$sql_ckt = "SELECT * FROM CAMPAIGN_KEYWORD_TB WHERE CPT_IDX='".$row_B['CPT_IDX']."' AND CKT_DELETE_DATE IS NULL ORDER BY CKT_IDX DESC";
									$result_ckt = mysqli_query($conn,$sql_ckt);
								?>
                <li class="<?if($row_B['CPT_CATE1']=='블로그'){ echo " cp_blog"; }else if($row_B['CPT_CATE1']=='인스타그램' ){
                  echo "cp_instar" ; }else if($row_B['CPT_CATE1']=='유튜브' ){ echo "cp_youtube" ; }?>">
                  <div class="campaign">
                    <a href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row_B['CPT_IDX']?>&type=<?=$row_B['CPT_CATE2']?>">
                      <div class="image_wrap">
                        <span class="sns_icon">
                          <?if($row_B['CPT_CATE1']=='블로그'){?>
                          <img src="icon/sns_01.png" alt="">
                          <?}else if($row_B['CPT_CATE1']=='인스타그램'){?>
                          <img src="icon/sns_02.png" alt="">
                          <?}else if($row_B['CPT_CATE1']=='유튜브'){?>
                          <img src="icon/sns_03.png" alt="">
                          <?}else if($row_B['CPT_CATE1']=='기타'){?>
                          <img src="icon/sns_04.png" alt="">
                          <?}?>
                        </span>
                        <img src="./uploads/<?=$row_B['CPT_IMG_SAVE']?>" alt="캠페인사진">
                      </div>
                      <div class="text_wrap">
                        <p class="campaign_count"><span class="count">신청 <?=$cnt_app?></span>/<span
                            class="total"><?=stripslashes($row_B['CPT_RECRUITS'])?></span>명</p>
                        <p class="campaign_date red"><span class="date"><?=$d_day?></span></p>
                        <p class="campaign_ti"><em><?=stripslashes($row_B['CPT_TITLE'])?></em></p>
                        <p class="campaign_de"><?=stripslashes($row_B['CPT_SUB_TITLE'])?></p>
                      </div>
                    </a>
                    <div class="url_wrap">
                      <?if(!$row_B['CAT_BLOG_URL']){?>
                      <a href="javascript:void(0);" class="btn_url">리뷰 등록하기</a>
                      <?}else{?>
                      <a href="javascript:void(0);" class="btn_url">리뷰 수정</a>
                      <?}?>
                      <form id="url_form<?=$row_B['CAT_IDX']?>" class="url_form" action="./inc/mainDAO.php"
                        method="post" onsubmit="return submit_ck('<?=$row_B['CAT_IDX']?>');" data="">
                        <?if($row_B['CAT_BLOG_URL']){?>
                        <input type="hidden" name="mode" id="mode" value="CAMODIFY">
                        <?}else{?>
                        <input type="hidden" name="mode" id="mode" value="CAINSERT">
                        <?}?>
                        <input type="hidden" name="CAT_IDX" id="CAT_IDX" value="<?=$row_B['CAT_IDX']?>">
                        <input type="hidden" name="CAT_CHANNEL" id="CAT_CHANNEL<?=$row_B['CAT_IDX']?>" value="<?=$row_B['CAT_CHANNEL']?>">
                        <div class="int_box">
                          <label for="CAT_BLOG_URL">리뷰 url <span class="red">*</span></label>
                          <input type="text" name="CAT_BLOG_URL" id="CAT_BLOG_URL" class="CAT_BLOG_URL"
                            value="<?=stripslashes($row_B['CAT_BLOG_URL'])?>">
                        </div>
												<?if($row_B['CAT_CHANNEL']=='블로그'){?>
													<?if($row_B['CPT_KEYWORD']){?>
													<div class="int_box">
														<label for="CAT_KEYWORD">리뷰 키워드 <span class="red">*</span></label>
														<input type="text" name="CAT_KEYWORD" id="CAT_KEYWORD" class="CAT_KEYWORD"
															value="<?=stripslashes($row_B['CAT_KEYWORD'])?>">
													</div>
													<?}else{?>
													<div class="int_box">
														<label for="CAT_KEYWORD">리뷰 키워드 <span class="red">*</span></label>
														<select name="CAT_KEYWORD" id="CAT_KEYWORD" class="CAT_KEYWORD select-keyword">
															<?while($row_ckt = mysqli_fetch_array($result_ckt)){ // 반복문?>
															<option value="<?=$row_ckt['CKT_KEY_WORD']?>"
																<?if($row_B['CAT_KEYWORD']==$row_ckt['CKT_KEY_WORD']){ echo " selected " ;}?>
																><?=$row_ckt['CKT_KEY_WORD']?></option>
															<?}?>
														</select>
													</div>
													<?}?>
												<?}?>
                        <div class="btn_wrap">
                          <input type="submit" class="btn_l" value="등록">
                        </div>
                      </form>
                    </div>
                  </div>
                </li>
                <?}?>
              </ul>
              <!-- 페이징 -->
              <?}else{?>
              <div class="none">
                <p>선정된 캠페인이 없습니다.</p>
                <p>다양한 스타트블로그의 캠페인을 둘러보세요.</p>
                <ul>
                  <li><a href="cpList_product.php">제품 캠페인 보기</a></li>
                  <li><a href="cpList_local.php">지역 캠페인 보기</a></li>
                </ul>
              </div>
              <?}?>
            </div>
            <div class="content registered_campaign">
              <?if($cnt_C > 0){?>
              <ul class="campaign_list">
                <?while($row_C = mysqli_fetch_array($result_C)){ // 반복문?>
                <?
									$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row_C['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
									$result_app = mysqli_query($conn,$sql_app);
									$cnt_app = mysqli_num_rows($result_app);

									$today_date = new DateTime(date("Y-m-d")); 
									$end_date = new DateTime($row_C['CPT_APP_END_DATE']);
									$diff_date    = date_diff($today_date, $end_date);
									if($row_C['CPT_APP_END_DATE'] >= date("Y-m-d")){
										$d_day = "<span class=\"date\">".$diff_date->days."</span> 일남음";
									}else{
										$d_day = "<span class=\"date\">마감</span>";
									}
								?>
                <li class="<?if($row_C['CPT_CATE1']=='블로그'){ echo " cp_blog"; }else if($row_C['CPT_CATE1']=='인스타그램' ){
                  echo "cp_instar" ; }else if($row_C['CPT_CATE1']=='유튜브' ){ echo "cp_youtube" ; }?>">
                  <div class="campaign">
                    <a href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row_C['CPT_IDX']?>&type=<?=$row_C['CPT_CATE2']?>">
                      <div class="image_wrap">
                        <span class="sns_icon">
                          <?if($row_C['CPT_CATE1']=='블로그'){?>
                          <img src="icon/sns_01.png" alt="">
                          <?}else if($row_C['CPT_CATE1']=='인스타그램'){?>
                          <img src="icon/sns_02.png" alt="">
                          <?}else if($row_C['CPT_CATE1']=='유튜브'){?>
                          <img src="icon/sns_03.png" alt="">
                          <?}else if($row_C['CPT_CATE1']=='기타'){?>
                          <img src="icon/sns_04.png" alt="">
                          <?}?>
                        </span>
                        <img src="./uploads/<?=$row_C['CPT_IMG_SAVE']?>" alt="캠페인사진">
                      </div>
                      <div class="text_wrap">
                        <p class="campaign_count"><span class="count">신청 <?=$cnt_app?></span>/<span
                            class="total"><?=stripslashes($row_C['CPT_RECRUITS'])?></span>명</p>
                        <p class="campaign_date red"><span class="date"><?=$d_day?></span></p>
                        <p class="campaign_ti"><em><?=stripslashes($row_C['CPT_TITLE'])?></em></p>
                        <p class="campaign_de"><?=stripslashes($row_C['CPT_SUB_TITLE'])?></p>
                      </div>
                    </a>
                  </div>
                </li>
                <?}?>
              </ul>
              <!-- 페이징 -->
              <?}else{?>
              <div class="none">
                <p>선정된 캠페인이 없습니다.</p>
                <p>다양한 스타트블로그의 캠페인을 둘러보세요.</p>
                <ul>
                  <li><a href="cpList_product.php">제품 캠페인 보기</a></li>
                  <li><a href="cpList_local.php">지역 캠페인 보기</a></li>
                </ul>
              </div>
              <?}?>
            </div>
            <div class="content end_campaign">
              <?if($cnt_D > 0){?>
              <ul class="campaign_list">
                <?while($row_D = mysqli_fetch_array($result_D)){ // 반복문?>
                <?
									$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row_D['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
									$result_app = mysqli_query($conn,$sql_app);
									$cnt_app = mysqli_num_rows($result_app);

									$today_date = new DateTime(date("Y-m-d")); 
									$end_date = new DateTime($row_D['CPT_APP_END_DATE']);
									$diff_date    = date_diff($today_date, $end_date);
									if($row_D['CPT_APP_END_DATE'] >= date("Y-m-d")){
										$d_day = "<span class=\"date\">".$diff_date->days."</span> 일남음";
									}else{
										$d_day = "<span class=\"date\">마감</span>";
									}
								?>
                <li class="<?if($row_D['CPT_CATE1']=='블로그'){ echo " cp_blog"; }else if($row_D['CPT_CATE1']=='인스타그램' ){
                  echo "cp_instar" ; }else if($row_D['CPT_CATE1']=='유튜브' ){ echo "cp_youtube" ; }?>">
                  <div class="campaign end">
                    <a href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row_D['CPT_IDX']?>&type=<?=$row_D['CPT_CATE2']?>">
                      <div class="image_wrap">
                        <span class="sns_icon">
                          <?if($row_D['CPT_CATE1']=='블로그'){?>
                          <img src="icon/sns_01.png" alt="">
                          <?}else if($row_D['CPT_CATE1']=='인스타그램'){?>
                          <img src="icon/sns_02.png" alt="">
                          <?}else if($row_D['CPT_CATE1']=='유튜브'){?>
                          <img src="icon/sns_03.png" alt="">
                          <?}else if($row_D['CPT_CATE1']=='기타'){?>
                          <img src="icon/sns_04.png" alt="">
                          <?}?>
                        </span>
                        <img src="./uploads/<?=$row_D['CPT_IMG_SAVE']?>" alt="캠페인사진">
                      </div>
                      <div class="text_wrap">
                        <p class="campaign_count"><span class="count">신청 <?=$cnt_app?></span>/<span
                            class="total"><?=stripslashes($row_D['CPT_RECRUITS'])?></span>명</p>
                        <p class="campaign_date red"><span class="date"><?=$d_day?></span></p>
                        <p class="campaign_ti"><em><?=stripslashes($row_D['CPT_TITLE'])?></em></p>
                        <p class="campaign_de"><?=stripslashes($row_D['CPT_SUB_TITLE'])?></p>
                      </div>
                    </a>
                  </div>
                </li>
                <?}?>
              </ul>
              <!-- 페이징 -->

              <?}else{?>
              <div class="none">
                <p>선정된 캠페인이 없습니다.</p>
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

  // $(window).resize(function () {
  //   $('.content .image_wrap>img')(function (i, e) {
  //     var imgHeight = $(this).height();
  //     var imgWidth = $(this).width();
  //     var wrapWidth = $(this).parent().width();
  //     $(this).parent().css({
  //       'height': wrapWidth * 0.7 + 'px'
  //     });
  //     var wrapHeight = $(this).parent().height();

  //     var imgRatio = imgWidth / imgHeight
  //     var wrapRatio = wrapWidth / wrapHeight
  //     var imgWidthActual = wrapWidth / imgRatio;
  //     var imgWidthToBe = wrapWidth / wrapRatio;
  //     var marginLeft = Math.round((imgWidthActual - imgWidthToBe) / 2);

  //     if (imgRatio < wrapRatio) {
  //       $(this).css({
  //         'max-width': 'none',
  //         'width': '100%',
  //         'height': 'auto',
  //       });
  //     }
  //     if (imgRatio >= wrapRatio) {
  //       $(this).css({
  //         'max-width': 'none',
  //         'width': '100%',
  //         'height': '100%',
  //         'object-fit': 'cover'
  //       });
  //     }
  //   });
  // }).trigger('resize');
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
  <script type="text/javascript">
  <!--
  function submit_ck(CAT_IDX) {
		if($("#CAT_CHANNEL" + CAT_IDX).val()=='인스타그램'){
			if (!$('#url_form' + CAT_IDX + ' [name="CAT_BLOG_URL"]').val()) {
				alert("리뷰 URL을 입력해주세요.");
				return false;
			}
		}else{
			if (!$('#url_form' + CAT_IDX + ' [name="CAT_BLOG_URL"]').val()) {
				alert("리뷰 URL을 입력해주세요.");
				return false;
			}else if ($('#url_form' + CAT_IDX + ' [name="CAT_BLOG_URL"]').val().indexOf("https://") == -1 && $('#url_form' + CAT_IDX + ' [name="CAT_BLOG_URL"]').val().indexOf("http://") == -1){
				alert("http:// 또는 https:// 포함하여 리뷰 url을 입력해주세요.");
				return false;
			 
			}else if (!$('#url_form' + CAT_IDX + ' [name="CAT_KEYWORD"]').val()) {
				alert("리뷰 키워드를 입력해주세요.");
				return false;
			}
		}
  }
  //
  -->
  </script>
  <script type="text/javascript">
  <!--
  var tab = "<?=$_GET['tab']?>";
  if (tab == '2') {
    $(".tab2").trigger("click");
  }
  //
  -->
  </script>
</body>

</html>