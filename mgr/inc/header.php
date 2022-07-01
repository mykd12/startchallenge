<?$page=basename($_SERVER['PHP_SELF']);?>
<?$path="/mgr/";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>스타트체험단 ADMIN</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../favicon.ico">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Global Icons -->
  <link rel="stylesheet" href="../assets/vendor/icon-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/vendor/icon-line/css/simple-line-icons.css">
  <link rel="stylesheet" href="../assets/vendor/icon-etlinefont/style.css">
  <link rel="stylesheet" href="../assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="../assets/vendor/icon-hs/style.css">

  <link rel="stylesheet" href="../assets/vendor/hs-admin-icons/hs-admin-icons.css">
  <link rel="stylesheet" href="../assets/vendor/animate.css">
  <link rel="stylesheet" href="../assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="../assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="../assets/vendor/fancybox/jquery.fancybox.min.css">
  <link rel="stylesheet" href="../assets/vendor/flatpickr/dist/css/flatpickr.min.css">
  <link rel="stylesheet" href="../assets/vendor/hamburgers/hamburgers.min.css">
	<link  rel="stylesheet" href="../assets/vendor/custombox/custombox.min.css">
	<link rel="stylesheet" href="../assets/vendor/chartist-js/chartist.min.css">
	<link rel="stylesheet" href="../assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.css">
	<link rel="stylesheet" href="../assets/vendor/fancybox/jquery.fancybox.min.css">
  <!-- CSS Unify -->
  <link rel="stylesheet" href="../assets/css/unify-admin.css">

  <!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="../plugin/remodal-demo/src/jquery.remodal.css" />

  <!-- CSS Customization -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" href="../css/custom.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="<?=$path?>SE/js/HuskyEZCreator.js" charset="utf-8"></script>
  <?
	session_start();
	if(!$_SESSION['LOGIN_ID'] || !$_SESSION['LOGIN_NAME'] || $_SESSION['LOGIN_ID'] !='admin'){
		echo "<script>location.href='../index.php';</script>";
	}
  ?>
</head>

<body>
  <main>
    <!-- Header -->
    <header id="js-header" class="u-header u-header--sticky-top">
      <div class="u-header__section u-header__section--admin-dark g-min-height-65">
        <nav class="navbar no-gutters g-pa-0">
          <div class="col-auto d-flex flex-nowrap u-header-logo-toggler g-py-12">
            <!-- Logo -->
            <a href="<?=$path?>index.php" class="navbar-brand d-flex align-self-center g-hidden-xs-down g-line-height-1 py-0 g-mt-5">스타트체험단 Admin</a>
            <!-- End Logo -->
            <!-- Sidebar Toggler -->
            <a class="js-side-nav u-header__nav-toggler d-flex align-self-center ml-auto" href="#!" data-hssm-class="u-side-nav--mini u-sidebar-navigation-v1--mini" data-hssm-body-class="u-side-nav-mini" data-hssm-is-close-all-except-this="true" data-hssm-target="#sideNav">
              <i class="hs-admin-align-left"></i>
            </a>
            <!-- End Sidebar Toggler -->
          </div>
            <!-- Top Search Bar (Mobi) -->
            <a id="searchInvoker" class="g-hidden-sm-up text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="searchMenu" aria-haspopup="true" aria-expanded="false" data-is-mobile-only="true" data-dropdown-event="click"
            data-dropdown-target="#searchMenu" data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
              <i class="hs-admin-search g-absolute-centered"></i>
            </a>
            <!-- End Top Search Bar (Mobi) -->
            <!-- Top User -->
            <div class="col-auto d-flex g-pt-5 g-pt-0--sm g-pl-10 g-pl-20--sm">
              <div class="g-pos-rel g-px-10--lg">
                <a id="profileMenuInvoker" class="d-block" href="#!" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#profileMenu" data-dropdown-type="css-animation" data-dropdown-duration="300"
                data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                  <span class="g-pos-rel g-top-2">
										<i class="hs-admin-user g-pos-rel g-top-2 g-mr-5"></i>
										<span class="g-hidden-sm-down">&nbsp;&nbsp;&nbsp;<?=$_SESSION['LOGIN_NAME']?>&nbsp;&nbsp;&nbsp;</span>
										<i class="hs-admin-angle-down g-pos-rel g-top-2 g-ml-10 g-mr-25"></i>
                  </span>
                </a>

                <!-- Top User Menu -->
                <ul id="profileMenu" class="g-pos-abs g-left-0 g-width-100x--lg g-nowrap g-font-size-14 g-py-20 g-mt-17 rounded" aria-labelledby="profileMenuInvoker">
                  <li class="mb-0">
                    <a class="media g-color-lightred-v2--hover g-py-5 g-px-20" href="../inc/adminVO.php?mode=LOGOUT">
                      <span class="d-flex align-self-center g-mr-12">
												<i class="hs-admin-shift-right"></i>
				  					  </span>
                      <span class="media-body align-self-center">LOGOUT</span>
                    </a>
                  </li>
                </ul>
                <!-- End Top User Menu -->
              </div>
            </div>
            <!-- End Top User -->
          </div>
          <!-- End Messages/Notifications/Top Search Bar/Top User -->
        </nav>
      </div>
    </header>
    <!-- End Header -->


    <section class="container-fluid px-0 g-pt-65">
      <div class="row no-gutters g-pos-rel g-overflow-x-hidden">
        <!-- Sidebar Nav -->
        <div id="sideNav" class="col-auto u-sidebar-navigation-v1 u-sidebar-navigation--dark">
          <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu g-min-height-100vh mb-0">
						<li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item  <?if($page=='campaign_list.php' || $page=='campaign_write.php' || $page=='campaign_view.php'){ echo "u-side-nav-opened has-active"; }?>">
              <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#!" data-hssm-target="#subMenu1">
                <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-40">
									<i class="icon-communication-021 u-line-icon-pro"></i>
								</span>
								<span class="media-body align-self-center">캠페인 관리</span>
								<span class="d-flex align-self-center u-side-nav--control-icon">
									<i class="hs-admin-angle-right"></i>
								</span>
                <span class="u-side-nav--has-sub-menu__indicator"></span>
              </a>

              <!-- Panels/Cards: Submenu-1 -->
              <ul id="subMenu1" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0"  <?if($page=='campaign_list.php' || $page=='campaign_write.php' || $page=='campaign_view.php'){ echo "style='display: block;'"; }?>>
                <!-- Panel Variations -->
								<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='campaign_list.php' || $page=='campaign_write.php' || $page=='campaign_view.php'){ echo "active"; }?>" href="../campaign/campaign_list.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">캠페인 관리</span>
									</a>
								</li>
								<!--<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='review_list.php' || $page=='review_write.php'){ echo "active"; }?>" href="../campaign/review_list.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">베스트 리뷰 관리</span>
									</a>
								</li>-->
								
              </ul>
              <!-- End Panels/Cards: Submenu-1 -->
            </li>
						<li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item  <?if($page=='mem_list.php' || $page=='mem_write.php' || $page=='mem_view.php' || $page=='point_write.php' || $page=='mem_etc.php' || $page=='mem_chart.php'){ echo "u-side-nav-opened has-active"; }?>">
              <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#!" data-hssm-target="#subMenu0">
                <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-40">
									<i class="icon-people"></i>
								</span>
								<span class="media-body align-self-center">회원 관리</span>
								<span class="d-flex align-self-center u-side-nav--control-icon">
									<i class="hs-admin-angle-right"></i>
								</span>
                <span class="u-side-nav--has-sub-menu__indicator"></span>
              </a>

              <!-- Panels/Cards: Submenu-1 -->
              <ul id="subMenu0" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0"  <?if($page=='mem_list.php' || $page=='mem_write.php' || $page=='mem_view.php' || $page=='point_write.php' || $page=='mem_etc.php' || $page=='mem_chart.php'){ echo "style='display: block;'"; }?>>
                <!-- Panel Variations -->
								<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='mem_list.php' || $page=='mem_write.php' || $page=='mem_view.php' || $page=='mem_etc.php'){ echo "active"; }?>" href="../mem/mem_list.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">회원 관리</span>
									</a>
								</li>
								<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='point_write.php'){ echo "active"; }?>" href="../mem/point_write.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">포인트 관리</span>
									</a>
								</li>
								<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='mem_chart.php'){ echo "active"; }?>" href="../mem/mem_chart.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">통계 관리</span>
									</a>
								</li>
								<!--<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='attend_list.php' || $page=='attend_write.php' || $page=='attend_view.php'){ echo "active"; }?>" href="../mem/attend_list.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">환급 관리</span>
									</a>
								</li>-->
								
              </ul>
              <!-- End Panels/Cards: Submenu-1 -->
            </li>
						

						<li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item  <?if($page=='notice_list.php' || $page=='notice_view.php' || $page=='notice_write.php' || $page=='event_list.php' || $page=='event_view.php' || $page=='event_write.php' || $page=='faq_list.php' || $page=='faq_write.php' || $page=='service_list.php' || $page=='service_write.php' || $page=='qna_list.php' || $page=='qna_view.php' || $page=='partnership_list.php' || $page=='partnership_view.php'){ echo "u-side-nav-opened has-active"; }?>">
              <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#!" data-hssm-target="#subMenu2">
                <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-40">
									<i class="icon-electronics-024 u-line-icon-pro"></i>
								</span>
								<span class="media-body align-self-center">고객지원 관리</span>
								<span class="d-flex align-self-center u-side-nav--control-icon">
									<i class="hs-admin-angle-right"></i>
								</span>
                <span class="u-side-nav--has-sub-menu__indicator"></span>
              </a>

              <!-- Panels/Cards: Submenu-1 -->
              <ul id="subMenu2" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0"  <?if($page=='notice_list.php' || $page=='notice_view.php' || $page=='notice_write.php' || $page=='event_list.php' || $page=='event_view.php' || $page=='event_write.php' || $page=='faq_list.php' || $page=='faq_write.php' || $page=='service_list.php' || $page=='service_write.php' || $page=='qna_list.php' || $page=='qna_view.php' || $page=='partnership_list.php' || $page=='partnership_view.php'){ echo "style='display: block;'"; }?>>
                <!-- Panel Variations -->
								<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='notice_list.php' || $page=='notice_view.php' || $page=='notice_write.php'){ echo "active"; }?>" href="../community/notice_list.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">소식</span>
									</a>
								</li>
								<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='faq_list.php' || $page=='faq_write.php'){ echo "active"; }?>" href="../community/faq_list.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">자주하는 질문 관리</span>
									</a>
								</li>
								<!--<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='event_list.php' || $page=='event_view.php' || $page=='event_write.php'){ echo "active"; }?>" href="../community/event_list.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">이벤트</span>
									</a>
								</li>
								<!--<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='service_list.php' || $page=='service_write.php'){ echo "active"; }?>" href="../community/service_list.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">서비스 가이드 관리</span>
									</a>
								</li>-->
								<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='qna_list.php' || $page=='qna_view.php'){ echo "active"; }?>" href="../community/qna_list.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">1:1문의</span>
									</a>
								</li>
								<li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($page=='partnership_list.php' || $page=='partnership_view.php'){ echo "active"; }?>" href="../community/partnership_list.php">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
											<i class="icon-options"></i>
										</span>
									<span class="media-body align-self-center">광고/제휴 문의</span>
									</a>
								</li>
              </ul>
              <!-- End Panels/Cards: Submenu-1 -->
            </li>
						<li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item">
							<a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?if($page=='main_list.php' || $page=='main_write.php'){ echo "active"; }?>" href="../main/main_list.php">
								<span class="d-flex align-self-center g-font-size-18 g-mr-40">
									<i class="icon-communication-118 u-line-icon-pro"></i>
								</span>
								<span class="media-body align-self-center">메인 비쥬얼 관리</span>
							</a>
						</li>
						
          </ul>
        </div>
        <!-- End Sidebar Nav -->
