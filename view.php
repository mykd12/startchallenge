<!DOCTYPE html>
<html lang="ko">
<?php include_once("inc/mainVO.php"); ?>

<head>
  <?php include("inc/head.php");?>
</head>

<body>
  <div id="wrapper" class="sub_wrapper campaignView_wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- 캠페인 상세페이지 시작 -->
          <section class="section1">
            <div class="campaign_head">
              <h2 class="cp_title"><?=$CPT_TITLE?>
                <?if($CPT_ADDR1 || $CPT_ADDR2){?><span class="add">주소&nbsp;&nbsp; <?=$CPT_ADDR1?>
                  <?=$CPT_ADDR2?></span>
                <?}?>
              </h2>
              <p class="text_de"><?=$CPT_SUB_TITLE?></p>
              <ul class="sns">
                <?if($CPT_CATE1=='블로그'){?>
                <li class="blog">Blog</li>
                <?}else if($CPT_CATE1=='인스타그램'){?>
                <li class="instagram">Instagram</li>
                <?}else if($CPT_CATE1=='유튜브'){?>
                <li class="youTude">YouTude</li>
                <?}else if($CPT_CATE1=='기타'){?>
                <li class="other">기타</li>
                <?}?>
              </ul>
            </div>
            <aside class="m_aside">
              <ul class="period">
                <li <?if($CPT_APP_START_DATE <=date("Y-m-d") && $CPT_APP_END_DATE>= date("Y-m-d")){ echo
                  "class='on'";}?>>캠페인 신청기간 <span class="date"><?=date("m.d", strtotime($CPT_APP_START_DATE));?> -
                    <?=date("m.d", strtotime($CPT_APP_END_DATE));?></span></li>
                <li <?if($CPT_ANNO_DATE==date("Y-m-d")){ echo "class='on'" ;}?>>인플루언서 선정 <span
                    class="date"><?=date("m.d", strtotime($CPT_ANNO_DATE));?></span></li>
                <li <?if($CPT_REVIEW_START_DATE <=date("Y-m-d") && $CPT_REVIEW_END_DATE>= date("Y-m-d")){ echo
                  "class='on'";}?>>콘텐츠 등록기간 <span class="date"><?=date("m.d", strtotime($CPT_REVIEW_START_DATE));?> -
                    <?=date("m.d", strtotime($CPT_REVIEW_END_DATE));?></span></li>
                <li <?if($CPT_REVIEW_END_DATE < date("Y-m-d")){ echo "class='on'" ;}?>>캠페인 결과발표 <span
                    class="date"><?=date("m.d", strtotime($CPT_REVIEW_END_DATE));?></span></li>
              </ul>
              <div class="apply">
                <?if(!$_SESSION['LOGIN_IDX']){?>
                <a href="login.php" class="btn_login btn_style">
                  <span class="btn_text">로그인하기</span>
                </a>
                <a href="javascript:alert('로그인을 해주세요!');location.href='login.php';" class="btn_hart"><i
                    class="xi-heart-o"></i><i class="xi-heart"></i><span>스크랩</span></a>
                <?}else{?>
                <?if($CPT_APP_START_DATE <= date("Y-m-d") && $CPT_APP_END_DATE >= date("Y-m-d") && $cnt_app_my == 0){?>
                <div class="int_box" style="padding-top:20px;">
                  <input type="checkbox" id="m_cp_agree" name="m_cp_agree">
                  <label for="m_cp_agree">캠페인의 신청확인사항 숙지 및 제공내역 캠페인 정보,<br />캠페인 미션, 공통 안내사항에 숙지 및 이행에 동의합니다.</label>
                  <!-- <div class="btn_wrap">
                  <a href="#view_modal01" rel="modal:open" class="btn_more" onclick="return false">자세히보기</a>
                </div>-->
                </div>
                <a href="javascript:camp_app();" class="btn_apply btn_style"><span class="btn_text">신청하기</span></a>
                <?}else if($CPT_APP_START_DATE <= date("Y-m-d") && $CPT_APP_END_DATE >= date("Y-m-d")){?>
								<a href="javascript:camp_app_modify();"
                  class="btn_applyCancel btn_style" style="background:#444;"><span
                    class="btn_text">신청정보변경</span></a>
                <a href="./inc/mainDAO.php?mode=CP_APP_CANCEL&CPT_IDX=<?=$CPT_IDX?>&search=<?=$search?>&type=<?=$type?>&cate1=<?=$cate1?>&cate2=<?=$cate2?>&cate3=<?=$cate3?>&sort=<?=$sort?>&pageNo=<?=$pageNo?>"
                  class="btn_applyCancel btn_style" onclick="return confirm('취소 하시겠습니까?');"><span
                    class="btn_text">신청취소</span></a>
                <?}else{?>
                <a href="javascript:alert('종료된 캠페인입니다.');" class="btn_applyEnd btn_style"><span
                    class="btn_text">신청종료</span></a>
                <?}?>
                <a href="javascript:cp_like(0);" class="btn_hart <?if($cnt_like > 0){ echo " on"; }?>"><i
                    class="xi-heart-o"></i><i class="xi-heart"></i><span>스크랩</span></a>
                <?}?>
              </div>
            </aside>
            <ul class="tab_menu">
              <li class="on"><a href="javascript:void(0);" class="camp_content">캠페인 정보</a></li>
              <li><a href="javascript:void(0);" class="applicants_cnt">신청자<span class="cnt"><?=$cnt_app?></span>/<span
                    class="num"><?=$CPT_RECRUITS?></span></a></li>
            </ul>
            <!-- 캠페인 정보 -->
            <div class="campaign_content on">
              <div class="img_box">
                <div class="image_wrap spoiler">
                  <img src="./uploads/<?=$CPT_IMG1_SAVE?>" alt="캠페인사진" id="detail_img">
                </div>
                <a href="javascript:more_view('more');" class="btn_plus" id="more_btn"><i class="xi-plus"></i> 더 보기</a>
              </div>
              <div id="scroll_check" class="text_box">
                <h4 class="text_ti red">신청전 확인사항</h4>
                <div class="text_list">
                  <?=$CPT_REQ_CONTENT?>
                </div>
                <!--<ul class="text_list">
                  <li>- 방문 후 3 일 이내 포스팅 부탁드립니다.</li>
                  <li>- 최소 1일 전 예약 필수입니다. (당일 예약 불가)</li>
                  <li>- 안내 없이 예약시간에 늦거나 노쇼 시 다음 캠패인 이용에 차질이 생길 수 있습니다. </li>
                </ul>-->
              </div>
              <div id="scroll_reward" class="text_box">
                <h4 class="text_ti">제공 내역</h4>
                <div class="text_list">
                  <?=$CPT_OFFER?>
                </div>
                <!--<ul class="text_list">
                  <li>- 체험금액/메뉴 외 추가금액 및 별도 주문 시 추가 비용이 지불됩니다.</li>
                  <li>- 매장 체험시 테이크아웃이나 포장은 불가능합니다.</li>
                  <li>- 타쿠폰 및 이벤트 중복 할인은 불가능합니다.</li>
                </ul>-->
              </div>
              <div id="scroll_keyword" class="text_box">
                <h4 class="text_ti">검색 키워드</h4>
                <div class="text_list">
                  <?=$CPT_KEYWORD_ETC?>
                </div>
                <!--<span class="red">#광주꽃집 #예은꽃집 #꽃집 #꽃다발</span>
                <ul class="text_list">
                  <li>- 제시한 키워드를 제목 가장 첫머리에 올 수 있도록 작성해주세요.</li>
                  <li>- 본문에 제목 키워드 및 검색 #해시태그 5개 이상 삽입 부탁드립니다.</li>
                  <li>- 제목에는 검색키워드 1개 이상 + 업체명(필라바디필라테스) 이(가) 반드시 들어가야 합니다.</li>
                </ul>-->
              </div>
              <div id="scroll_cpInfor" class="text_box">
                <h4 class="text_ti">캠페인 정보</h4>
                <div class="text_list">
                  <?=$CPT_CONTENT?>
                </div>
                <!--<ul class="text_list">
                  <li>- 상호 : 예은꽃집</li>
                  <li>- 위치 : 광주 서남로 14</li>
                  <li>- 이용가능시간 : 13:00-18:00</li>
                  <li>- 예약 안내
                    <ul>
                      <li>방문 후 3일 이내 포스팅 부탁드립니다.</li>
                      <li>최소 1일 전 예약 필수입니다. (당일 예약 불가)</li>
                      <li>안내 없이 예약시간에 늦거나 노쇼 시 다음 캠패인 이용에 차질이 생길 수 있습니다.</li>
                    </ul>
                  </li>
                </ul>-->
              </div>
              <div id="scroll_mission" class="text_box">
                <h4 class="text_ti">캠페인 미션</h4>
                <div class="text_list">
                  <?=$CPT_MISSION?>
                </div>
                <!--<ul class="text_list">
                  <li>1. 제공되는 제품을 상세하게 기입해주세요.</li>
                  <li>2. 매장 인테리어 및 제공 받은 서비스를 상세하게 소개해주세요.</li>
                  <li>3. (네이버)지도+번호를 넣어주세요.</li>
                  <li>4. 사진은 최소 15장 이상 필수 등록해주세요.</li>
                  <li>5. 동영상or움짤 10초 이상으로 넣어주세요.</li>
                  <li>6. 체험한 내용을 바탕으로 성의 있게 작성해주세요.</li>
                  <li>7. 제목에 반드시 제목키워드를 사용해주세요.</li>
                  <li>8. 키워드 및 미션 가이드 미 준수 시 수정 요청 드립니다.</li>
                  <li>※ 광고목적으로 진행되는 체험으로 포스팅 내용에 부정적인 내용은 피해주세요.</li>
                  <li>(업체 요청으로 수정 안내 될 수 있습니다)</li>
                </ul>-->
              </div>
              <div id="scroll_notice" class="text_box">
                <h4 class="text_ti">공통 안내사항</h4>
                <div class="text_list">
                  <?=$CPT_NOTICE?>
                </div>
                <!--<ul class="text_list">
                  <li>※ 리뷰 등록 및 방문이 어려울 경우 카톡 (-) 또는 1:1문의로 사전에 연락 주세요.</li>
                  <li>※ 배송 (제품) 캠페인은 선정 이후 단순 변심(개인 사정)으로 인한 제품 변경/반품/환불 불가능합니다.</li>
                  <li>※ (네임명) : 0000-0000 (월-금) / 토·일·공휴일 휴무</li>
                </ul>
                <ul class="text_list">
                  <li>1. 등록한 리뷰 및 이미지는 광고주에 의해 활용할 수 있습니다.</li>
                  <li>2. 기간 내 리뷰 등록이 어려울 경우 1:1 문의를 통해 문의해주세요.</li>
                  <li>3. 업체 사정으로 인해 모집 기간 및 인원은 추후 변경될 수 있습니다.</li>
                  <li>4. 제공된 캠페인은 타인에게 양도 및 판매는 불가능합니다.</li>
                  <li>5. 핸드폰 촬영으로 리뷰 작성을 삼가주세요. (폰카 촬영 허용 캠페인은 가능)</li>
                  <li>6. 정당한 사유 없이 등록 기간 내 리뷰를 작성하지 않을 경우 관련 법 조항 (형법 제347조)에 따라 법적 처벌 대상이 될 수 있습니다.</li>
                  <li>7. 리뷰 게시글 하단에는 체험 제공 스폰서 배너 이미지를 등록해주세요.</li>
                  <li>8. 사진 및 동영상 첨부 시 초상권 문제가 있을 수 있으니 노출에 신경써주세요.</li>
                </ul>-->
              </div>
            </div>
            <!-- 신청자 -->
            <div class="campaign_content">
              <ul class="applicants">
                <?while($row_app = mysqli_fetch_array($result_app)){ // 반복문?>
                <?
									$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$row_app['MET_IDX']."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
									$result_mem = mysqli_query($conn,$sql_mem);
									$row_mem = mysqli_fetch_array($result_mem);
								?>
                <li>
                  <ul>
                    <li class="img_box">
                      <div class="image_wrap">
												<img src="icon/smlie.png" alt="나의사진">
                        <!--<?if($row_mem['MET_IMG_SAVE']){?>
                        <img src="./uploads/<?=$row_mem['MET_IMG_SAVE']?>" alt="나의사진">
                        <?}else{?>
                        <img src="icon/smlie.png" alt="나의사진">
                        <?}?>-->
                      </div>
                    </li>
                    <li style="line-height:2;">
                      <div class="text_box"><?=stripslashes($row_app['CAT_COMMENT'])?></div>
                      <!--<p class="nickname"><?=stripslashes($row_mem['MET_NIC'])?></p>-->
                    </li>
                  </ul>
                </li>
                <?}?>
              </ul>
              <!--<a href="javascript:void(0)" class="btn_plus"><i class="xi-plus"></i>더 보기</a></a>-->
            </div>
          </section>
          <aside class="aside1">
            <div class="image_wrap">
              <img src="./uploads/<?=$CPT_IMG_SAVE?>" alt="캠페인사진">
            </div>
            <ul class="period">
              <li <?if($CPT_APP_START_DATE <=date("Y-m-d") && $CPT_APP_END_DATE>= date("Y-m-d")){ echo
                "class='on'";}?>>캠페인 신청기간 <span class="date"><?=date("m.d", strtotime($CPT_APP_START_DATE));?> -
                  <?=date("m.d", strtotime($CPT_APP_END_DATE));?></span></li>
              <li <?if($CPT_ANNO_DATE==date("Y-m-d")){ echo "class='on'" ;}?>>인플루언서 선정 <span
                  class="date"><?=date("m.d", strtotime($CPT_ANNO_DATE));?></span></li>
              <li <?if($CPT_REVIEW_START_DATE <=date("Y-m-d") && $CPT_REVIEW_END_DATE>= date("Y-m-d")){ echo
                "class='on'";}?>>콘텐츠 등록기간 <span class="date"><?=date("m.d", strtotime($CPT_REVIEW_START_DATE));?> -
                  <?=date("m.d", strtotime($CPT_REVIEW_END_DATE));?></span></li>
              <li <?if($CPT_REVIEW_END_DATE < date("Y-m-d")){ echo "class='on'" ;}?>>캠페인 결과발표 <span
                  class="date"><?=date("m.d", strtotime($CPT_REVIEW_END_DATE));?></span></li>
            </ul>
            <ul class="scroll_menu">
              <li><a href="#scroll_check">신청전 확인사항</a></li>
              <li><a href="#scroll_reward">제공내역</a></li>
              <li><a href="#scroll_keyword">검색키워드</a></li>
              <li><a href="#scroll_cpInfor">캠페인 정보</a></li>
              <li><a href="#scroll_mission">캠페인 미션</a></li>
              <li><a href="#scroll_notice">공통 안내 사항</a></li>
            </ul>
            <p class="applicants_cnt">신청자 <span class="cnt"><?=$cnt_app?></span> / <span
                class="num"><?=$CPT_RECRUITS?></span></p>
            <div class="apply">
              <?if(!$_SESSION['LOGIN_IDX']){?>
              <a href="login.php" class="btn_login btn_style">
                <span class="btn_text">로그인하기</span>
              </a>
              <a href="javascript:alert('로그인을 해주세요!');location.href='login.php';" class="btn_hart"><i
                  class="xi-heart-o"></i><i class="xi-heart"></i><span>스크랩</span></a>
              <?}else{?>
              <?if($CPT_APP_START_DATE <= date("Y-m-d") && $CPT_APP_END_DATE >= date("Y-m-d") && $cnt_app_my == 0){?>
              <a href="javascript:camp_app();" class="btn_apply btn_style" style="width:80%;"><span class="btn_text">신청하기</span></a>
              <div class="int_box" style="padding-top:20px;">
                <input type="checkbox" id="cp_agree" name="cp_agree">
                <label for="cp_agree">캠페인의 신청확인사항 숙지 및 제공내역 캠페인 정보,<br />캠페인 미션, 공통 안내사항에 숙지 및 이행에 동의합니다.</label>
                <!-- <div class="btn_wrap">
                  <a href="#view_modal01" rel="modal:open" class="btn_more" onclick="return false">자세히보기</a>
                </div>-->
              </div>
              <?}else if($CPT_APP_START_DATE <= date("Y-m-d") && $CPT_APP_END_DATE >= date("Y-m-d") && $cnt_app_my > 0){?>
              <a href="javascript:camp_app_modify();"
                class="btn_applyCancel btn_style" style="background:#444;"><span
                  class="btn_text">신청정보변경</span></a>
									<a href="./inc/mainDAO.php?mode=CP_APP_CANCEL&CPT_IDX=<?=$CPT_IDX?>&search=<?=$search?>&type=<?=$type?>&cate1=<?=$cate1?>&cate2=<?=$cate2?>&cate3=<?=$cate3?>&sort=<?=$sort?>&pageNo=<?=$pageNo?>"
                class="btn_applyCancel btn_style" onclick="return confirm('취소 하시겠습니까?');"><span
                  class="btn_text">신청취소</span></a>
              <?}else{?>
              <a href="javascript:alert('종료된 캠페인입니다.');" class="btn_applyEnd btn_style"><span
                  class="btn_text">신청종료</span></a>
              <?}?>
              <a href="javascript:cp_like();" class="btn_hart <?if($cnt_like > 0){ echo " on"; }?>"><i
                  class="xi-heart-o"></i><i class="xi-heart"></i><span>스크랩</span></a>
              <?}?>
            </div>
          </aside>
        </div>
        <div class="content_bottom"></div>
        <?if($cnt_add > 0){?>
        <section class="bottom_cpList section2">
          <h2 class="text_ti">이런 캠페인은 어때</h2>
          <div class="campaign_slider_wrap">
            <div class="swiper-container campaign_slider">
              <div class="swiper-wrapper">
                <?while($row_add = mysqli_fetch_array($result_add)){ // 반복문?>
                <?
									$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row_add['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
									$result_app = mysqli_query($conn,$sql_app);
									$cnt_app = mysqli_num_rows($result_app);

									$today_date = new DateTime(date("Y-m-d")); 
									$end_date = new DateTime($row_add['CPT_APP_END_DATE']);
									$diff_date    = date_diff($today_date, $end_date);
									if($row_add['CPT_APP_END_DATE'] >= date("Y-m-d")){
										$d_day = "<span class=\"date red\">".$diff_date->days."</span> 일남음";
									}else{
										$d_day = "<span class=\"date\">마감</span>";
									}
								?>
                <div class="swiper-slide">
                  <div class="campaign">
                    <a
                      href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row_add['CPT_IDX']?>&search=<?=$search?>&type=<?=$type?>&cate1=<?=$cate1?>&cate2=<?=$cate2?>&cate3=<?=$cate3?>&sort=<?=$sort?>&pageNo=<?=$pageNo?>">
                      <div class="image_wrap">
                        <img src="./uploads/<?=$row_add['CPT_IMG_SAVE']?>" alt="캠페인사진">
                      </div>
                      <div class="text_wrap">
                        <p class="sns_icon">
                          <?if($row_add['CPT_CATE1']=='블로그'){?>
                          <span class="text_blog">Blog</span>
                          <?}else if($row_add['CPT_CATE1']=='인스타그램'){?>
                          <span class="text_Instagram">Instagram</span>
                          <?}else if($row_add['CPT_CATE1']=='유튜브'){?>
                          <span class="text_YouTude">YouTude</span>
                          <?}else if($row_add['CPT_CATE1']=='기타'){?>
                          <span class="text_other">기타</span>
                          <?}?>
                        </p>
                        <p class="campaign_count">신청 <span class="count"><?=$cnt_app?></span>/<span
                            class="total"><?=stripslashes($row_add['CPT_RECRUITS'])?></span>명</p>
                        <p class="campaign_date"><?=$d_day?></p>
                        <p class="campaign_ti"><em><?=stripslashes($row_add['CPT_TITLE'])?></em></p>
                        <p class="campaign_de"><?=stripslashes($row_add['CPT_SUB_TITLE'])?></p>
                      </div>
                    </a>
                  </div>
                </div>
                <?}?>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
          </div>
        </section>
        <?}?>
      </div>
      <div id="view_modal01" class="contact_modal modal modal1 position" style="display: none;">
        <div class="template t1">
          <h4>캠페인 신청 전 꼭 확인해주세요.</h4>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>제공받는 자</th>
                  <th>제공목적</th>
                  <th>제공항목</th>
                  <th>보유 및 이용기간</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="ng-binding">사운드바디사운드스킨 성신여대점</td>
                  <td>본인인증, 물품배송</td>
                  <td>회원정보 (이름, 성별, 휴대전화번호, 캠페인 참여를 위한 추가 개인정보)<br>
                    배송정보 (이름, 휴대전화번호, 주소)</td>
                  <td>회원정보 (이름, 생년월일, 성별, 휴대전화번호, 캠페인 참여를 위한 추가 개인정보)
                    : 캠페인 종료 후 1개월<br>
                    배송정보 (이름, 휴대전화번호, 주소)<br>
                    : 캠페인 신청 후 3개월</td>
                </tr>
              </tbody>
            </table>
          </div>
          <ul>
            <li>- 제공내역은 양도 및 판매가 불가능하며 적발 시 제공된 서비스에 대한 비용이 청구될 수 있습니다.</li>
            <li>- 해당 콘텐츠 가이드라인을 준수하며 추후 광고주 요청에 의해 수정 요청이 있을 수 있습니다.</li>
            <li>- 등록한 콘텐츠는 6개월 이상 유지해야하며 미 준수 시 비용이 청구될 수 있습니다.</li>
            <li>- 콘텐츠 초상권 및 사진에 대한 소유권은 업체 및 위 플랫폼에서 사용될 수 있습니다.</li>
            <li>- 정당한 사유 없이 등록 기간 내 리뷰를 작성하지 않을 경우, 제공 상품 및 용역의 대가를 환불해야하며 관련 법 조항 (형법 제347조)에 따라 법적 처벌 대상이 될 수 있습니다.
            </li>
          </ul>
        </div>
      </div>
    </main>
    <!----- 푸터 시작 ----->
    <? include("inc/footer.php"); ?>
    <!-- top버튼 -->
    <div id="gotop">
      <a href="javascript:void(0);" class="btn_top"><i class="xi-angle-up-thin"></i><span>TOP</span></a>
    </div>
    <div id="quick">
      <div class="tel btn_box">
        <a href="tel:1544-9537" class="btn_tel btn_quick"><span class="blind">전화상담</span><img src="icon/m_tel.png"
            alt="고객센터"></a>
      </div>
      <div class="kakaoTalk btn_box">
        <a href="http://pf.kakao.com/_RxcxkFK" target="_blank" class="btn_kakaotalk btn_quick"><span
            class="blind">카카오톡</span><img src="icon/kakao.png" alt="카카오톡채널"></a>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  <!--
  $.ajax({
    type: 'post',
    url: '/inc/mainVO.php',
    dataType: "json",
    data: {
      "mode": "TOTAL_CNT"
    },

    success: function(data) {
      $("#influencer_cnt").html(data.influen_cnt);
      $("#campaign_cnt").html(data.campaign_cnt);
      $("#contents_cnt").html(data.contents_cnt);
    }
  });

  function comma(str) {
    str = String(str);
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
  }
  //
  -->
  </script>
  <script type="text/javascript">
  // 탭메뉴 이벤트
  $('.tab_menu li').on('click', function() {
    $(this).addClass('on').siblings().removeClass('on');
    //클릭한 li의 순서찾기
    var idx = $(this).index();
    $('.campaign_content').eq(idx).addClass('on').siblings().removeClass('on');

  });

  $('.scroll_menu a[href^="#"]').on('click', function(e) {
    e.preventDefault();

    var target = this.hash;
    var $target = $(target);

    $('html, body').stop().animate({
      'scrollTop': $target.offset().top - 168
    }, 900, 'swing');
  });

  function scrollUSection1Ani() {
    var aside1 = $('.aside1').offset().top;
    var section2 = $('.content_bottom').offset().top - 800;
    $(window).scroll(function() {
      var section1 = $('.campaign_content.on').height() - 500;
      var sectionH = $('#main').height();
      //console.log(sectionH);
      //console.log(section1);
      var _scrollTop = $(this).scrollTop();
      //console.log(_scrollTop);
      if (_scrollTop >= aside1) {
        $('.aside1').addClass('on');
        if (_scrollTop >= section1) {
          $('.aside1').addClass('active');
        } else {
          $('.aside1').removeClass('active');
        }
      } else {
        $('.aside1').removeClass('on');
      }
    });
  };
  scrollUSection1Ani(); //실행시키기위한()  


  // 스크랩 하트 클릭
  $('.btn_hart').on('click', function() {
    console.log('클릭');
    $(this).toggleClass('on');
  });
  </script>
  <script type="text/javascript">
  <!--
  function cp_like() {
    var cnt_like = "<?=$cnt_like?>";
    var CPT_IDX = "<?=$CPT_IDX?>";
    var MET_IDX = "<?=$_SESSION['LOGIN_IDX']?>";
    if (cnt_like > 0) {
      var CPT_LIKE = "1";
    } else {
      var CPT_LIKE = "0";
    }
    $.ajax({
      type: 'post',
      url: 'inc/mainVO.php',
      data: {
        mode: 'CPT_LIKE',
        CPT_LIKE: CPT_LIKE,
        CPT_IDX: CPT_IDX,
        MET_IDX: MET_IDX
      },
      // success: function(data) {
      //   if (jQuery.parseJSON(data) == 0) { //아이디가 중복되지 않으면
      //     $(".btn_hart").toggleClass('on');
      //   } else if (jQuery.parseJSON(data) == 1) { //아이디가 중복된다면
      //     $(".btn_hart").toggleClass('on');
      //   }
      // }
    });
  }
  var filter = "win16|win32|win64|mac|macintel";
  setTimeout(function() {
    if (navigator.platform) {
      if (filter.indexOf(navigator.platform.toLowerCase()) < 0) {
        if ($("#detail_img").height() <= 230) {
          $("#more_btn").css("display", "none");
        }
      } else {
        if ($("#detail_img").height() <= 530) {
          $("#more_btn").css("display", "none");
        }
      }
    }
  }, 500);



  function more_view(type) {
    var detail_img = $("#detail_img").height();
    if (type == 'more') {
      if (navigator.platform) {
        if (filter.indexOf(navigator.platform.toLowerCase()) < 0) {
          if (detail_img > 230) {
            $(".spoiler").animate({
              height: detail_img
            }, 500);
          }
        } else {
          if (detail_img > 530) {
            $(".spoiler").animate({
              height: detail_img
            }, 500);
          }
        }
      }

      $("#more_btn").empty();
      $("#more_btn").attr("href", "javascript:more_view();");
      $("#more_btn").html("<i class='xi-minus'></i> 접기");
    } else {
      if (navigator.platform) {
        if (filter.indexOf(navigator.platform.toLowerCase()) < 0) {
          if (detail_img > 230) {
            $(".spoiler").animate({
              height: 230
            }, 500);
          }
        } else {
          if (detail_img > 530) {
            $(".spoiler").animate({
              height: 530
            }, 500);
          }
        }
      }

      $("#more_btn").empty();
      $("#more_btn").attr("href", "javascript:more_view('more');");
      $("#more_btn").html("<i class='xi-plus'></i> 더 보기");
    }
  }

  function camp_app() {
    var mode = "<?=$mode?>";
    var CPT_IDX = "<?=$CPT_IDX?>";
    var search = "<?=$search?>";
    var type = "<?=$type?>";
    var cate1 = "<?=$cate1?>";
    var cate2 = "<?=$cate2?>";
    var cate3 = "<?=$cate3?>";
    var sort = "<?=$sort?>";
    var pageNo = "<?=$pageNo?>";

    var MET_BIRTH = "<?=$MET_BIRTH?>";
    var MET_GENDER = "<?=$MET_GENDER?>";
    var MET_POSTING = "<?=$MET_POSTING?>";
    var MET_AREA = "<?=$MET_AREA?>";

    if (!MET_BIRTH || !MET_GENDER || !MET_POSTING || !MET_AREA) {
      alert("추가정보를 입력 후 서비스 이용가능합니다.");
      location.href = 'myAccount.php';
    } else {
      if (!$("#cp_agree").is(":checked") && !$("#m_cp_agree").is(":checked")) {
        alert("캠페인의 상세내용을 정확히 확인 하셨으면 \r\n상세내용에 대한 동의를 체크 해주세요!");
        $("#m_cp_agree").focus();
        return false;
      } else {
        location.href = 'apply.php?mode=CP_APP&CPT_IDX=' + CPT_IDX + '&search=' + search + '&type=' + type + '&cate1=' +
          cate1 + '&cate2=' + cate2 + '&cate3=' + cate3 + '&sort=' + sort + '&pageNo=' + pageNo;
      }
    }
  }

	function camp_app_modify() {
    var CPT_IDX = "<?=$CPT_IDX?>";
    var search = "<?=$search?>";
    var type = "<?=$type?>";
    var cate1 = "<?=$cate1?>";
    var cate2 = "<?=$cate2?>";
    var cate3 = "<?=$cate3?>";
    var sort = "<?=$sort?>";
    var pageNo = "<?=$pageNo?>";

    var MET_BIRTH = "<?=$MET_BIRTH?>";
    var MET_GENDER = "<?=$MET_GENDER?>";
    var MET_POSTING = "<?=$MET_POSTING?>";
    var MET_AREA = "<?=$MET_AREA?>";

    if (!MET_BIRTH || !MET_GENDER || !MET_POSTING || !MET_AREA) {
      alert("추가정보를 입력 후 서비스 이용가능합니다.");
      location.href = 'myAccount.php';
    } else {
      location.href = 'apply.php?mode=CP_APP_MODIFY&CPT_IDX=' + CPT_IDX + '&search=' + search + '&type=' + type + '&cate1=' + cate1 + '&cate2=' + cate2 + '&cate3=' + cate3 + '&sort=' + sort + '&pageNo=' + pageNo;
    }
  }

	$(".applicants_cnt").click(function (){
		$(".scroll_menu").css("display","none");
	});
	$(".camp_content").click(function (){
		$(".scroll_menu").css("display","");
	});
  //
  -->
  </script>
</body>

</html>