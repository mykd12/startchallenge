<?
	if($page=='cpList_product.php'){
		$action_url = "cpList_product.php";
	}else if($page=='cpList_delivery.php'){
		$action_url = "cpList_delivery.php";
	}else if($page=='cpList_reporters.php'){
		$action_url = "cpList_reporters.php";
	}else if($page=='cpList_all.php'){
		$action_url = "cpList_all.php";
	}else if($page=='cpList_local.php'){
		$action_url = "cpList_local.php";
	}else{
		$action_url = "cpList_all.php";
	}
?>
<div class="top_banner">
  <a href="partner.php" class="btn_banner">
    <div class="banner_wrap">
  시작하는 즐거움이 있다. 스타트체험단 마케팅 스토리 !
  <i class="xi-angle-right-thin"></i>
    </div>
  </a>
  <a href="javascript:void(0)" class="btn_close"><i class="xi-close-thin"></i> <span class="blind">닫기</span></a>
</div>
<header id="header">
  <!-- 데스크탑 헤더 -->
  <div class="header_wrap">
    <div class="top_header">
      <!-- 유틸 -->
      <ul class="util depth01">
        <?if(!$_SESSION['LOGIN_IDX']){?>
        <li>
          <a href="javascript:void(0);">고객센터</a>
          <ul class="depth02">
            <!--<li><a href="myInquiry.php">1:1문의</a></li>-->
            <li><a href="notice.php">공지사항</a></li>
            <li><a href="FAQ.php">FAQ</a></li>
            <li><a href="guide.php">서비스 가이드</a></li>
            <li><a href="partner.php">광고 문의</a></li>
          </ul>
        </li>
        <li><a href="login.php" class="btn_indexLogin">로그인</a></li>
        <li><a href="agree.php">회원가입</span></a></li>
        <?}else{?>
        <li>
          <a href="javascript:void(0);" class="btn_myPage">고객센터</a>
          <ul class="depth02">
            <!--<li><a href="myInquiry.php">1:1문의</a></li>-->
            <li><a href="notice.php">공지사항</a></li>
            <li><a href="FAQ.php">FAQ</a></li>
            <li><a href="guide.php">서비스 가이드</a></li>
            <li><a href="partner.php">광고 문의</a></li>
          </ul>
        </li>
        <li><a href="/inc/mainVO.php?mode=LOGOUT">로그아웃</a></li>
        <?}?>
      </ul>
    </div>
    <div class="center_header">
      <!-- 로고 -->
      <h1 class="logo"><a href="index.php"><img src="images/logo.png" alt="logo"></a></h1>
      <!-- 데스크탑 gnb -->
      <div class="gnb_wrap">
        <ul class="gnb">
          <li <?if($page=="cpList_all.php" ){ echo " class='on' " ; }?>><a href="cpList_all.php">전체</a>
          <li <?if($page=="cpList_local.php" ){ echo " class='on' " ; }?>><a href="cpList_local.php">지역</a>
            <ul class="depth02">
              <li><a href="cpList_local.php">전체</a>
              <li><a href="cpList_local.php?cate2=맛집">맛집</a>
              <li><a href="cpList_local.php?cate2=뷰티">뷰티</a>
              <li><a href="cpList_local.php?cate2=숙박">숙박</a>
              <li><a href="cpList_local.php?cate2=문화">문화</a>
              <li><a href="cpList_local.php?cate2=기타">기타</a>
            </ul>
          </li>
          <li <?if($page=="cpList_product.php" ){ echo " class='on' " ; }?>><a href="cpList_product.php">제품</a>
            <ul class="depth02">
              <li><a href="cpList_product.php">전체</a>
              <li><a href="cpList_product.php?cate2=뷰티">뷰티</a>
              <li><a href="cpList_product.php?cate2=생활리빙">생활리빙</a>
              <li><a href="cpList_product.php?cate2=디지털가전">디지털가전</a>
              <li><a href="cpList_product.php?cate2=교육도서">교육도서</a>
              <li><a href="cpList_product.php?cate2=식품">식품</a>
              <li><a href="cpList_product.php?cate2=기타">기타</a>
            </ul>
          </li>
          <li <?if($page=="cpList_delivery.php" ){ echo " class='on' " ; }?>><a href="cpList_delivery.php">배달</a></li>
          <li <?if($page=="cpList_reporters.php" ){ echo " class='on' " ; }?>><a href="cpList_reporters.php">기자단</a>
          </li>
        </ul>
        <span class="gnb_bar"></span>
      </div>
      <div class="right_wrap clearfix">
        <!-- 서치바 -->
        <?if($page != 'index.php'){?>
				<div class="search_form_wrap">
          <i class="xi-search"></i>
          <form class="search_form" method="get" name="frm" action="<?=$action_url?>" autocomplete="off">
            <input type="text" placeholder="" id="searchint" name="search" value="<?=$search?>" class="searchint"
              autocomplete="off">
            <button type="submit" class="submit blind">
          </form>
          <button class="btn_close"><i class="xi-close"></i></button>
        </div>
				<?}else{?>
				<div class="search_form_wrap">
					<i class="xi-search" ></i>
				</div>
				<?}?>
        <!-- 닉네임 -->
        <?if($_SESSION['LOGIN_IDX']){?>
        <div class="nickname_wrap">
          <a href="javascript:void(0);" class="nickname">
            <?if(!$_SESSION['LOGIN_IMG']){?>
            <span class="img_wrap"><img src="icon/smlie.png" alt="나의사진"></span>
            <?}else{?>
            <span class="img_wrap"><img src="./uploads/<?=$_SESSION['LOGIN_IMG']?>" alt="나의사진"></span>
            <?}?>
            <span class="text_nick"><?=$_SESSION['LOGIN_NIC']?></span>
          </a>
          <ul class="depth02">
            <li><a href="myCampaign.php">나의 캠페인</a></li>
            <li><a href="myFavorites.php">관심 캠페인</a></li>
            <li><a href="myReview.php">등록한 컨텐츠</a></li>
            <!--<li><a href="myPoint.php">포인트</a></li>-->
            <li><a href="myAccount.php">회원정보 수정</a></li>
            <li><a href="myInquiry.php">1:1 문의</a></li>
            <!--<li><a href="myAttendance.php">출석부</a></li>-->
            <li><a href="/inc/mainVO.php?mode=LOGOUT">로그아웃</a></li>
          </ul>
        </div>
        <?}?>
      </div>
    </div>

  </div>
  <!-- 모바일 헤더 -->
  <div class="m_header_wrap">
    <div class="top_header">
      <!-- 햄버거버튼 -->
      <a href="#" class="btn_menu">
        <em class="blind">전체메뉴</em>
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </a>
      <h1 class="logo"><a href="index.php"><img src="images/logo.png" alt="logo"></a></h1>
      <!-- 서치바 -->
      <div class="search_form_wrap">
        <i class="xi-search"></i>
        <form class="search_form" method="get" name="frm" action="<?=$action_url?>">
          <input type="text" placeholder="" id="searchint" name="search" value="<?=$search?>" class="searchint">
          <button type="submit" class="submit blind">
        </form>
        <button class="btn_close"><i class="xi-close"></i></button>
      </div>
    </div>
    <div class="m_gnb_wrap">
      <ul class="m_gnb clearfix">
        <li <?if($page=="cpList_local.php" ){ echo " class='on' " ; }?>><a href="javascript:void(0);">지역</a>
          <ul class="depth02">
            <li><a href="cpList_local.php">전체</a>
            <li><a href="cpList_local.php?cate2=맛집">맛집</a>
            <li><a href="cpList_local.php?cate2=뷰티">뷰티</a>
            <li><a href="cpList_local.php?cate2=숙박">숙박</a>
            <li><a href="cpList_local.php?cate2=문화">문화</a>
            <li><a href="cpList_local.php?cate2=기타">기타</a>
          </ul>
        </li>
        <li <?if($page=="cpList_product.php" ){ echo " class='on' " ; }?>><a href="javascript:void(0);">제품</a>
          <ul class="depth02">
            <li><a href="cpList_product.php">전체</a>
            <li><a href="cpList_product.php?cate2=뷰티">뷰티</a>
            <li><a href="cpList_product.php?cate2=생활리빙">생활리빙</a>
            <li><a href="cpList_product.php?cate2=디지털가전">디지털가전</a>
            <li><a href="cpList_product.php?cate2=교육도서">교육도서</a>
            <li><a href="cpList_product.php?cate2=식품">식품</a>
            <li><a href="cpList_product.php?cate2=기타">기타</a>
          </ul>
        </li>
        <li <?if($page=="cpList_delivery.php" ){ echo " class='on' " ; }?>><a href="cpList_delivery.php">배달</a></li>
        <li <?if($page=="cpList_reporters.php" ){ echo " class='on' " ; }?>><a href="cpList_reporters.php">기자단</a></li>
      </ul>
      <span class="m_gnb_bar"></span>
    </div>
  </div>
</header>