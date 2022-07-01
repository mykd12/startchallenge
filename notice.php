<!DOCTYPE html>
<html lang="ko">
	<?$mode='NOLIST';?>
	<?php include("inc/mainVO.php");?>
<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main mypage_01 mypage_02 notice campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- 공지사항 시작-->
          <section class="section1">
            <h2 class="con_ti">공지사항</h2>
            <!-- 내용시작 -->
            <div class="snb_wrap">
              <ul class="snb">
                <li class="pc <?if(!$type || $type=='all'){ echo "on";}?>"><a href="./notice.php?type=all">전체</a></li>
                <li class="pc <?if($type=='공지사항'){ echo "on";}?>"><a href="./notice.php?type=공지사항">공지사항</a></li>
                <li class="pc <?if($type=='뉴스'){ echo "on";}?>"><a href="./notice.php?type=뉴스">뉴스</a></li>
                <li class="pc <?if($type=='이벤트'){ echo "on";}?>"><a href="./notice.php?type=이벤트">이벤트</a></li>
                <li class="m_select">
                  <div class="select">전체</div>
                  <ul class="depth02 array_select1">
                    <li>
                      <div class="option">
                        <input type="radio" name="group" id="all" checked>
                        <label for="all"><span>전체</span></label>
                      </div>
                    </li>
                    <li>
                      <div class="option">
                        <input type="radio" name="group" id="notice">
                        <label for="notice"><span>공지사항</span></label>
                      </div>
                    </li>
                    <li>
                      <div class="option">
                        <input type="radio" name="group" id="news">
                        <label for="news"><span>소식</span></label>
                      </div>
                    </li>
                    <li>
                      <div class="option">
                        <input type="radio" name="group" id="event">
                        <label for="event"> <span>이벤트</span></label>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="content inquiry on">
              <ul class="inquiry_table">
                <li class="t_head">
                  <span class="num">No</span>
                  <span class="list">List</span>
                  <span class="ti">제목</span>
                  <span class="date">등록일</span>
                </li>
								<?while($row = mysqli_fetch_array($result)){ // 반복문?>
                <li class="t_con">
                  <a href="notice_view.php?mode=NOVIEW&NOT_IDX=<?=$row['NOT_IDX']?>&type=<?=$type?>&pageNo=<?=$pageNo?>">
                    <span class="num"><?=$cur_num-$i;?></span>
                    <span class="list red"><?=$row['NOT_CATE']?></span></span>
                    <span class="ti"><?=$row['NOT_TITLE']?></span>
                    <span class="date"><?=date("Y.m.d", strtotime($row['NOT_REG_DATE']));?></span>
                  </a>
                </li>
								<?$i++;}?>
              </ul>
              <!-- 페이징 -->
              <? include("inc/paging.php"); ?>
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

  </script>
</body>

</html>