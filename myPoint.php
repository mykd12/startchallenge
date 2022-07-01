<!DOCTYPE html>
<html lang="ko">
<?$mode='MY_POINT';?>
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
          <!-- 포인트 시작-->
          <section class="section1">
            <h2 class="con_ti">포인트</h2>
            <!-- 내용시작 -->
            <div class="content point on">
              <ul class="now_point">
                <li>
                  <p class="text_ti">현재 포인트</p>
                  <p class="pointCnt"><span class="cnt"><?=number_format($MET_POINT);?></span>P</p>
                </li>
                <li>
                  <p class="text_ti">누적 포인트</p>
                  <p class="pointCnt"><span class="cnt"><?=number_format($point);?></span>P</p>
                </li>
              </ul>
              <table class="point_table">
								<tr>
									<th class="date">적립일</th>
									<th>적립내역</th>
									<th>포인트</th>
									<th>상태</th>
								</tr>
								<?if($cnt > 0){?>
									<?while($row = mysqli_fetch_array($result)){?>
										<tr>
											<td><?=date("Y.m.d", strtotime($row['POT_REG_DATE']));?></td>
											<td><?=$row['POT_CONTENT']?></td>
											<td><?if($row['POT_PLUS_POINT']){ echo number_format($row['POT_PLUS_POINT']); }else if($row['POT_MINUS_POINT']){ echo number_format($row['POT_MINUS_POINT']); }?>p</td>
											<td><?if($row['POT_PLUS_POINT']){ echo "적립"; }else if($row['POT_MINUS_POINT']){ echo "차감"; }?></td>
										</tr>
									<?}?>
								<?}else{?>
                  <tr>
                    <td class="none" colspan="4">적립된 내역이 없습니다.</td>
                  </tr>
								<?}?>
              </table>
              <!-- 페이징 -->
              <? include("inc/paging.php"); ?>
              <ul class="guide_wrap">
                <li>포인트가 <b class="ng-binding">10,000</b>원 이상 모이면 출금신청을 할 수 있습니다.</li>
                <li>포인트는 한 달간 세번 신청을 받으며 신청 마감일로부터 5일 후 지급됩니다. (지급일이 공휴일인 경우, 다음 영업일에 지급됩니다.)</li>
                <li>신청기간 및 지급일 안내 (1일 ~ 10일, 당월 15일 지급), (11일 ~ 20일, 당월 25일 지급), (21일 ~ 말일, 익월 5일 지급)</li>
                <li>추가로 신청하고자 하시는 포인트가 있으신 경우, 앞선 신청을 취소하시고 다시 신청해주세요.</li>
                <li>입금계좌의 예금주는 반드시 실명과 동일해야 지급됩니다.</li>
                <li>입금액은 관련법상 사업소득에 따른 세금 3.3%를 공제하고 입금됩니다.</li>
                <li>
                    명의도용 차단이 되어 있거나 나이스평가정보에서 사용자 정보를 불러올 수 없는 경우, 나이스평가정보의 고객상담 센터(1588-2486) 또는
                    <a href="https://www.namecheck.co.kr/front/personal/register_howtoonline.jsp?menu_num=1&amp;page_num=0&amp;page_num_1=1" target="_blank">온라인 실명 등록 서비스</a> 를 이용하세요.
                </li>
              </ul>
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