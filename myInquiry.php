<!DOCTYPE html>
<html lang="ko">
<?$mode='MY_QNA';?>
<?php include_once("inc/mainVO.php"); ?>
<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main mypage_01 mypage_02 reviews campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- 문의내용 시작-->
          <section class="section1">
            <h2 class="con_ti">1:1 문의내역</h2>
            <!-- 내용시작 -->
            <div class="content inquiry on">
              <div class="btn_wrap">
                <a href="inquiry_write.php?mode=QNINSERT&pageNo=<?=$pageNo?>" class="btn_inquiry">바로 문의하기<i class="xi-message-o"></i></a>
              </div>  
              <ul class="inquiry_table">
                  <li class="t_head">
                      <span class="num">no</span>
                      <span class="ti">문의내역</span>
                      <span class="date">등록일</span>
                      <span class="status">상태</span>
                  </li>
									<?if($cnt > 0){?>
										<?while($row = mysqli_fetch_array($result)){ // 반복문?>
											<?
												$sql_answ = "SELECT * FROM QNA_ANSWER_TB WHERE QNT_IDX='".$row['QNT_IDX']."' AND QAT_DELETE_DATE IS NULL ORDER BY QAT_IDX DESC";
												$result_answ = mysqli_query($conn,$sql_answ);
												$row_answ = mysqli_fetch_array($result_answ);
												$cnt_answ = mysqli_num_rows($result_answ);
											?>
											<li class="t_con">
												<a href="inquiry_view.php?mode=QNVIEW&QNT_IDX=<?=$row['QNT_IDX']?>&pageNo=<?=$pageNo?>">
													<span class="num"><?=$cur_num-$i;?></span>
													<span class="ti"><?=$row['QNT_TITLE']?></span>
													<span class="date"><?=date("Y.m.d", strtotime($row['QNT_REG_DATE']));?></span>
													<span class="status"><?if($cnt_answ > 0){?>답변완료<?}else{?>답변대기<?}?></span>
												</a>
											</li>
											<?if($cnt_answ > 0){?>
												<li class="comment">
													<a href="inquiry_view.php?mode=QNVIEW&QNT_IDX=<?=$row['QNT_IDX']?>&pageNo=<?=$pageNo?>">
														<span class="num">-</span>
														<span class="ti"><i class="xi-subdirectory-arrow"></i> 답변입니다.</span>
														<span class="date"><?=date("Y.m.d", strtotime($row_answ['QAT_REG_DATE']));?></span>
														<span class="status">답변완료</span>
													</a>
												</li>
											<?}?>
										<?$i++;}?>
									<?}else{?>
										<li>
											<span class="none" colspan="4">1:1 문의한 내역이 없습니다.</span>
										</li>
									<?}?>
              </ul>
              <!-- 페이징 -->
              <? include("inc/paging.php"); ?>
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
    $('.tab_menu li').on('click', function (e) {
      e.preventDefault();
      $(this).addClass('on').siblings().removeClass('on');
      //클릭한 li의 순서찾기
      var idx = $(this).index();
      // $('.content').eq(idx).addClass('on').siblings().removeClass('on');
      $('.content').eq(idx).addClass('on').siblings().removeClass('on');
    });

    $('.btn_url').on('click', function () {
      console.log('클릭')
      $(this).closest('li').toggleClass('on').siblings().removeClass('on');
    });

  </script>
</body>

</html>