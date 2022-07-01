<!DOCTYPE html>
<html lang="ko">

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
                  <li class="date">등록일 : <span>2021-01-06 09:37:50</span></li>
                  <li class="author">작성자 : <span>돼지가방</span></li>
                  <li class="author">문의 유형 : <span>캠페인 관련</span></li>
                </ul>
              </div>
              <div class="text_box">
                ■ 캠페인명 : [광주 서석동] 예은 꽃집 <br><br><br>■ 문의내용 : 문의드립니다.문의드립니다.문의드립니다.문의드립니다.
              </div>
              <div class="re_box">
                <span class="re_ti"><i class="xi-subdirectory-arrow"></i> 답변내용 : </span>
                <span class="re_con">답변내용입니다.</span>
              </div>
              <div class="btn_box">
                  <a href="javascript:void(0);" class="btn_list">목록으로</a>
                </div>
            </div>
          </section>
          <aside class="aside1">
            <div class="nickname_wrap">
              <div class="img_wrap">
                <!-- <img src="icon/smlie.png" alt="나의사진"> -->
              </div>
              <form id="photo_from">
                <input type="file" accept="image/*,.txt" multiple required capture='user' onchange='aaa' class="blind">
                <input type="submit" class="blind">
                <a href="javascript:void(0);" class="btn_photo"><i class="xi-camera"></i></a>
              </form>
              <span class="text_nick">돼지가방</span>
            </div>
            <ul class="sns_list">
              <li><a href="javascript:void(0);"><img src="icon/sns_01.png" alt="블로그"><span>블로그계정을 연결해주세요!</span></a>
              </li>
              <li><a href="javascript:void(0);"><img src="icon/sns_02.png" alt="인스타"><span>인스타계정을 연결해주세요!</span></a>
              </li>
              <li><a href="javascript:void(0);"><img src="icon/sns_03.png" alt="유튜브"><span>유튜브계정을 연결해주세요!</span></a>
              </li>
            </ul>
            <ul class="menu_list">
              <li><a href="myCampaign.php">나의 캠페인</a></li>
              <li><a href="myFavorites.php">관심 캠페인</a></li>
              <li><a href="myReview.php">등록한 컨텐츠</a></li>
              <li><a href="myPoint.php">포인트</a></li>
              <li><a href="myAccount.php">회원정보 수정</a></li>
              <li class="on"><a href="myInquiry.php">1:1 문의</a></li>
              <li><a href="myAttendance.php">출석부</a></li>
            </ul>
            <a href="javascript:void(0);" class="btn_att btn_style">출석체크하기</a>
          </aside>
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
</body>

</html>