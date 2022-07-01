<!DOCTYPE html>
<html lang="ko">
<?php include_once("inc/mainVO.php"); ?>
<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main mypage_01 mypage_02 reviews inquiry_view inquiry_reply campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- 문의내용 시작-->
          <section class="section1">
            <h2 class="con_ti">1:1 문의하기</h2>
            <!-- 내용시작 -->
            <div class="content on">
              <div class="title_box">
                <h3 class="text_ti">문의한 제목</h3>
                <ul class="info">
                  <li class="date">등록일 : <span><?=$QNT_REG_DATE?></span></li>
                  <li class="author">작성자 : <span><?=$_SESSION['LOGIN_NIC']?></span></li>
                  <li class="author">문의 유형 : <span><?=$QNT_CATE1?></span></li>
                </ul>
              </div>
              <div class="text_box">
                <?=$QNT_CONTENT?>
              </div>
							<?if($cnt_answ > 0){?>
							<div class="re_box" style="margin-bottom:50px;">
                <span class="re_ti"><i class="xi-subdirectory-arrow"></i> 답변내용 : </span>
                <span class="re_con"><?=$row_answ['QAT_CONTENT']?></span>
              </div>
							<?}?>
              <div class="btn_box">
                  <a href="inquiry_write.php?mode=QNMODIFY&QNT_IDX=<?=$QNT_IDX?>&pageNo=<?=$pageNo?>" class="btn_re">수정하기</a>
									<a href="./inc/mainDAO.php?mode=QNDELETE&QNT_IDX=<?=$QNT_IDX?>&pageNo=<?=$pageNo?>" class="btn_re"  onclick="return confirm('삭제 시키시겠습니까??');">삭제하기</a>
                  <a href="myInquiry.php?pageNo=<?=$pageNo?>" class="btn_list">목록으로</a>
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
  
</body>

</html>