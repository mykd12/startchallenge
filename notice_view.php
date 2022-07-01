<!DOCTYPE html>
<html lang="ko">
	<?php include("inc/mainVO.php");?>
<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main mypage_01 mypage_02 notice_view campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- 공지사항 시작-->
          <section class="section1">
            <h2 class="con_ti">공지사항</h2>
            <!-- 내용시작 -->
            <div class="content on">
              <div class="con_head">
                <div class="list">
                  <span class="notice <?if($NOT_CATE=='공지사항'){ echo "on";}?>">공지사항</span>
                  <span class="news <?if($NOT_CATE=='뉴스'){ echo "on";}?>">뉴스</span>
                  <span class="event <?if($NOT_CATE=='이벤트'){ echo "on";}?>">이벤트</span>
                </div>
                <div class="con_ti">
                  <h3 class="text_ti"><?=$NOT_TITLE?></h3>
                  <ul class="de_list">
                    <?if($NOT_START_DATE && $NOT_END_DATE){?><li>기간<span class="term"> <?=date("Y.m.d", strtotime($NOT_START_DATE));?>~<?=date("Y.m.d", strtotime($NOT_END_DATE));?></span></li><?}?>
                    <li>등록일<span class="date"> <?=date("Y.m.d", strtotime($NOT_REG_DATE));?></span></li>
										<li>조회수<span class="date"> <?=Number_format($NOT_CNT);?></span></li>
                  </ul>
                </div>
              </div>
              <div class="con_text">
                <?=$NOT_CONTENT?>
              </div>
              <div class="btn_box">
                <a href="notice.php?type=<?=$type?>&pageNo=<?=$pageNo?>" class="btn_list">목록으로</a>
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
  

  </script>
</body>

</html>