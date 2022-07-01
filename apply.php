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
    <main id="main" class="sub_main apply campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- apply시작 -->
          <section class="section1">
            <div class="campaign_head">
              <h2 class="cp_title"><?=$CPT_TITLE?><span class="add">주소&nbsp;&nbsp; <?=$CPT_ADDR1?>
                  <?=$CPT_ADDR2?></span>
              </h2>
              <p class="text_de"><?=$CPT_SUB_TITLE?></p>
              <ul class="sns">
                <?if($CPT_CATE1=='인스타그램'){?>
                <li class="instagram">Instagram</li>
                <?}else if($CPT_CATE1=='블로그'){?>
                <li class="blog">Blog</li>
                <?}else if($CPT_CATE1=='유튜브'){?>
                <li class="youTude">YouTude</li>
                <?}else if($CPT_CATE1=='기타'){?>
                <li class="other">기타</li>
                <?}?>
              </ul>
            </div>
            <aside class="m_aside">
              <ul class="period">
                <li>캠페인 신청기간 <span class="date"><?=date("m.d", strtotime($CPT_APP_START_DATE));?> -
                    <?=date("m.d", strtotime($CPT_APP_END_DATE));?></span></li>
                <li>인플루언서 선정 <span class="date"><?=date("m.d", strtotime($CPT_ANNO_DATE));?></span></li>
                <li>콘텐츠 등록기간 <span class="date"><?=date("m.d", strtotime($CPT_REVIEW_START_DATE));?> -
                    <?=date("m.d", strtotime($CPT_REVIEW_END_DATE));?></span></li>
                <li>캠페인 결과발표 <span class="date"><?=date("m.d", strtotime($CPT_REVIEW_END_DATE));?></span></li>
              </ul>
            </aside>
            <!-- 신청하기 폼 -->
            <div class="apply_con">
              <div class="apply_ti_wrap">
                <h3 class="apply_ti">캠페인 신청하기</h3><span class="red">* 필수 정보는 모두 기입해주셔야 캠페인신청이 완료 됩니다.</span>
              </div>
              <form id="apply_form" method="post" action="./inc/mainDAO.php" onsubmit="return submit_ck();">
                <input type="hidden" name="mode" id="mode" value="<?=$mode?>" />
                <input type="hidden" name="CAT_ZIP" id="CAT_ZIP" value="" />
								<input type="hidden" name="CAT_IDX" id="CAT_IDX" value="<?=$CAT_IDX?>" />
                <input type="hidden" name="CPT_IDX" id="CPT_IDX" value="<?=$CPT_IDX?>" />
                <input type="hidden" name="search" id="search" value="<?=$search?>" />
                <input type="hidden" name="type" id="type" value="<?=$type?>" />
                <input type="hidden" name="cate1" id="cate1" value="<?=$cate1?>" />
                <input type="hidden" name="cate2" id="cate2" value="<?=$cate2?>" />
                <input type="hidden" name="cate3" id="cate3" value="<?=$cate3?>" />
                <input type="hidden" name="sort" id="sort" value="<?=$sort?>" />
                <input type="hidden" name="pageNo" id="pageNo" value="<?=$pageNo?>" />
                <div class="box">
                  <h3 class="text_ti">1.리뷰어 정보</h3>
                  <div class="inp_wrap">
                    <p class="inp_ti">캠페인 참여인<span class="red">*</span> </p>
                    <input type="radio" name="CAT_PARTICI" id="me" value="본인" <?if(!$CAT_PARTICI || $CAT_PARTICI=='본인'){ echo "checked";}?>>
                    <label for="me"><span>본인</span></label>
                    <input type="radio" name="CAT_PARTICI" id="agent" value="대리인" <?if($CAT_PARTICI=='대리인'){ echo "checked";}?>>
                    <label for="agent"><span>대리인</span></label>
                  </div>
                  <div class="inp_wrap">
                    <p class="inp_ti">카메라촬영<span class="red">*</span> </p>
                    <input type="radio" name="CAT_CAMERA" id="DSLR" value="DSLR" <?if(!$CAT_CAMERA || $CAT_CAMERA=='DSLR'){ echo "checked";}?>>
                    <label for="DSLR"><span>DSLR</span></label>
                    <input type="radio" name="CAT_CAMERA" id="mirrorless" value="미러리스(디카)" <?if($CAT_CAMERA=='미러리스(디카)'){ echo "checked";}?>>
                    <label for="mirrorless"><span>미러리스(디카)</span></label>
                    <input type="radio" name="CAT_CAMERA" id="phone" value="휴대폰" <?if($CAT_CAMERA=='휴대폰'){ echo "checked";}?>>
                    <label for="phone"><span>휴대폰</span></label>
                    <input type="radio" name="CAT_CAMERA" id="etc" value="기타" <?if($CAT_CAMERA=='기타'){ echo "checked";}?>>
                    <label for="etc"><span>기타</span></label>
                    <input type="text" name="CAT_CAMERA_ETC" id="etc_txt" <?if(!$CAT_CAMERA_ETC){?>readonly style="background:#ccc;"<?}?> value="<?=$CAT_CAMERA_ETC?>">
                  </div>
                  <div class="inp_wrap">
                    <label for="CAT_NAME" class="inp_ti">이름<span class="red">*</span></label>
                    <input type="text" id="CAT_NAME" name="CAT_NAME" maxlength="40" autocomplete="off" <?if($mode=='CP_APP_MODIFY'){ echo "value='".$CAT_NAME."'"; }else{?>value="<?=$MET_NAME?>"<?}?>>
                  </div>
                  <div class="inp_wrap">
                    <label for="CAT_TEL" class="inp_ti"><span>연락처</span><span class="red">*</span></label>
                    <input type="text" id="CAT_TEL" name="CAT_TEL" autocomplete="off" <?if($mode=='CP_APP_MODIFY'){ echo "value='".$CAT_TEL."'"; }else{?>value="<?=$MET_TEL?>"<?}?>>
                  </div>
                  <?if($type=="제품" || $type=="배달"){?>
                  <div class="inp_wrap">
                    <label for="CAT_ADDR1" class="inp_ti"><span>주소</span><span class="red">*</span></label>
                    <input type="text" id="CAT_ADDR1" name="CAT_ADDR1" autocomplete="off" class="link" readonly
                      onclick="openDaumPostcode();" style="background:#ccc;" value="<?=$MET_ADDR1?>" <?if($mode=='CP_APP_MODIFY'){ echo "value='".$CAT_ADDR1."'"; }else{?>value="<?=$MET_ADDR1?>"<?}?>>
                  </div>
                  <div class="inp_wrap">
                    <label for="CAT_ADDR2" class="inp_ti"><span>상세주소</span><span class="red">*</span></label>
                    <input type="text" id="CAT_ADDR2" name="CAT_ADDR2" autocomplete="off" class="link"
                       <?if($mode=='CP_APP_MODIFY'){ echo "value='".$CAT_ADDR2."'"; }else{?>value="<?=$MET_ADDR2?>"<?}?>>
                  </div>
                  <?}?>

                </div>
								<?if($CPT_CATE2_1=='페이백'){?>
									<div class="box">
										<h3 class="text_ti">2.계좌정보</h3>
										<div class="inp_wrap">
											<label for="CAT_BANK_NAME" class="inp_ti"><span>은행명</span><span class="red">*</span></label>
											<input type="text" id="CAT_BANK_NAME" name="CAT_BANK_NAME" autocomplete="off" class="link"
												value="<?=$CAT_BANK_NAME?>">
										</div>
										<div class="inp_wrap">
											<label for="CAT_BANK_NUMBER" class="inp_ti"><span>계좌번호</span><span class="red">*</span></label>
											<input type="text" id="CAT_BANK_NUMBER" name="CAT_BANK_NUMBER" autocomplete="off" class="link"
												value="<?=$CAT_BANK_NUMBER?>">
										</div>
										<div class="inp_wrap">
											<label for="CAT_BANK_USER" class="inp_ti"><span>예금주</span><span class="red">*</span></label>
											<input type="text" id="CAT_BANK_USER" name="CAT_BANK_USER" autocomplete="off" class="link"
												value="<?=$CAT_BANK_USER?>">
										</div>
									</div>
									<div class="box">
										<input type="checkbox" id="agree3" class="blind check_box" name="agree">
										<label for="agree3">이용약관의 동의합니다.</label><a style="font-size:11px; color:#bbb; text-decoration: underline;" href="#fo5" rel="modal:open" class="btn_mo">자세히 보기</a><br/>
										<input type="checkbox" id="agree4" class="blind check_box" name="agree">
										<label for="agree4">페이백을 위한 개인정보 수집/취급에 동의합니다.</label><a style="font-size:11px; color:#bbb; text-decoration: underline;" href="#fo4" rel="modal:open" class="btn_mo">자세히 보기</a>
									</div>
								<?}?>
                <div class="box">
                  <h3 class="text_ti"><?if($CPT_CATE2_1){?>3<?}else{?>2<?}?>.채널등록</h3>
                  <div class="inp_wrap">
                    <p class="inp_ti">등록채널<span class="red">*</span></p>
                    <?if(strpos($row['CPT_CATE1'], "블로그") !== false){?>
											<input type="radio" name="CAT_CHANNEL" id="blog" <?if(strpos($row['CPT_CATE1'], "블로그") !== false || $CAT_CHANNEL=='블로그'){?> checked <?}?> value="블로그">
											<label for="blog"><span>블로그</span></label>
                    <?}?>
										<?if(strpos($row['CPT_CATE1'], "인스타그램") !== false){?>
											<input type="radio" name="CAT_CHANNEL" id="insta" <?if(strpos($row['CPT_CATE1'], "인스타그램") !== false || $CAT_CHANNEL=='인스타그램'){?> checked <?}?> value="인스타그램">
											<label for="insta"><span>인스타그램</span></label>
                    <?}?>
										<?if(strpos($row['CPT_CATE1'], "유튜브") !== false){?>
											<input type="radio" name="CAT_CHANNEL" id="youtube" <?if(strpos($row['CPT_CATE1'], "유튜브") !== false || $CAT_CHANNEL=='유튜브'){?> checked <?}?> value="유튜브">
											<label for="youtube"><span>유튜브</span></label>
                    <?}?>
										<?if(strpos($row['CPT_CATE1'], "기타") !== false){?>
											<input type="radio" name="CAT_CHANNEL" id="sns_etc" <?if(strpos($row['CPT_CATE1'], "기타") !== false || $CAT_CHANNEL=='기타'){?> checked <?}?> value="기타">
											<label for="sns_etc"><span>기타</span></label>
											<input type="text" name="CAT_CHANNEL" id="sns_etc">
                    <?}?>
                  </div>
                  <div class="inp_wrap">
                    <label for="CAT_URL" class="inp_ti"><span>링크</span><span class="red">*</span></label>
										<?if($CAT_URL){?>
											<input type="text" name="CAT_URL" id="CAT_URL" class="link" value="<?=$CAT_URL?>">
                    <?}else if(strpos($row['CPT_CATE1'], "블로그") !== false){?>
											<input type="text" name="CAT_URL" id="CAT_URL" class="link" value="<?=$MET_BLOG?>">
                    <?}else if(strpos($row['CPT_CATE1'], "인스타그램") !== false){?>
											<input type="text" name="CAT_URL" id="CAT_URL" class="link" value="<?=$MET_INSTAGRAM?>">
                    <?}else if(strpos($row['CPT_CATE1'], "유튜브") !== false){?>
											<input type="text" name="CAT_URL" id="CAT_URL" class="link" value="<?=$MET_YOUTUBE?>">
                    <?}else if(strpos($row['CPT_CATE1'], "기타") !== false){?>
										 <input type="text" name="CAT_URL" id="CAT_URL" class="link">
                    <?}?>
                  </div>
                </div>
                <div class="box">
                  <h3 class="text_ti"><?if($CPT_CATE2_1){?>4<?}else{?>3<?}?>.신상정보 입력</h3>
                  <div class="inp_wrap textarea_wrap">
                    <p class="inp_ti">한줄남기기<span class="red">*</span> </p>
                    <textarea name="CAT_COMMENT" id="CAT_COMMENT" class="contact_area" required=""><?=$CAT_COMMENT?></textarea>
                  </div>
                </div>
                <div class="box">
                  <input type="checkbox" id="agree1" class="blind check_box" name="agree">
                  <label for="agree1">초상권 활용에 동의 합니다.</label>
                  <input type="checkbox" id="agree2" class="blind check_box" name="agree">
                  <label for="agree2">캠페인 유의사항 및 제3자 제공에 모두 동의합니다.</label>
                </div>
                <div class="btn_wrap">
                  <a href="javascript:$('#apply_form').submit()" class="btn_apply btn_style"><?if($mode=='CP_APP_MODIFY'){?>변경하기<?}else{?>신청하기<?}?></a>
                </div>
              </form>
            </div>
          </section>
          <aside class="aside1">
            <div class="image_wrap" style="height: 0px;">
              <img src="./uploads/<?=$CPT_IMG_SAVE?>" alt="캠페인사진"
                style="max-width: none; width: 100%; height: 100%; object-fit: cover;">
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
            <p class="applicants_cnt">신청자<span class="cnt"><?=$cnt_app?></span>/<span
                class="num"><?=$CPT_RECRUITS?></span></p>
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
										$d_day = "<span class=\"date\">".$diff_date->days."</span> 일남음";
									}else{
										$d_day = "<span class=\"date\">마감</span>";
									}
								?>
                <div class="swiper-slide">
                  <div class="campaign">
                    <a
                      href="view.php?mode=CP_VIEW&CPT_IDX=<?=$row_add['CPT_IDX']?>&search=<?=$search?>&type=<?=$type?>&cate1=<?=$cate1?>&cate2=<?=$cate2?>&cate3=유튜브&sort=<?=$sort?>&pageNo=<?=$pageNo?>">
                      <div class="image_wrap">
                        <span class="sns_icon">
                          <?if($row_add['CPT_CATE1']=='블로그'){?>
                          <img src="icon/sns_01.png" alt="">
                          <?}else if($row_add['CPT_CATE1']=='인스타그램'){?>
                          <img src="icon/sns_02.png" alt="">
                          <?}else if($row_add['CPT_CATE1']=='유튜브'){?>
                          <img src="icon/sns_03.png" alt="">
                          <?}else if($row_add['CPT_CATE1']=='기타'){?>
                          <img src="icon/sns_04.png" alt="">
                          <?}?>
                        </span>
                        <img src="./uploads/<?=$row_add['CPT_IMG_SAVE']?>" alt="캠페인사진">
                      </div>
                      <div class="text_wrap">
                        <p class="campaign_count"><span class="count">신청 <?=$cnt_app?></span>/<span
                            class="total"><?=stripslashes($row_add['CPT_RECRUITS'])?></span>명</p>
                        <p class="campaign_date red"><?=$d_day?></p>
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
  <script src="//dmaps.daum.net/map_js_init/postcode.v2.js"></script>
  <script type="text/javascript">
  <!--
  function openDaumPostcode() {
    new daum.Postcode({
      oncomplete: function(data) {
        // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분. 우편번호와 주소 정보를 해당 필드에 넣고, 커서를 상세주소 필드로 이동한다.
        document.getElementById('CAT_ZIP').value = data.zonecode;
        document.getElementById("CAT_ADDR1").value = data.address;
        document.getElementById("CAT_ADDR2").focus();
      }
    }).open();
  }

  function submit_ck() {
    var type = "<?=$type?>";
		var cate = "<?=$CPT_CATE2_1?>";
    if (type == '제품' || type == '배달') {
			if(cate=='페이백'){
				if (!$("#agree1").is(":checked")) {
					alert("초상권 활용에 동의 해주셔야합니다.");
					$("#agree1").focus();
					return false;
				} else if (!$("#agree2").is(":checked")) {
					alert("캠페인 유의사항 및 제3자 제공에 동의 해주셔야합니다.");
					$("#agree2").focus();
					return false;
				}else if (!$("#agree3").is(":checked")) {
					alert("이용약관에 동의 해주셔야합니다.");
					$("#agree3").focus();
					return false;
				} else if (!$("#agree4").is(":checked")) {
					alert("페이백을 위한 개인정보 수집/취급에 동의 해주셔야합니다.");
					$("#agree3").focus();
					return false;
				} else if (!$("#CAT_NAME").val()) {
					alert("신청자 성함을 입력해주세요.");
					$("#CAT_NAME").focus();
					return false;
				} else if (!$("#CAT_TEL").val()) {
					alert("신청자 연락처를 입력해주세요.");
					$("#CAT_TEL").focus();
					return false;
				} else if (!$("#CAT_ADDR1").val()) {
					alert("신청자 주소를 입력해주세요.");
					$("#CAT_ADDR1").focus();
					return false;
				} else if (!$("#CAT_ADDR2").val()) {
					alert("신청자 상세주소를 입력해주세요.");
					$("#CAT_ADDR2").focus();
					return false;
				} else if (!$("#CAT_BANK_NAME").val()) {
					alert("은행명을 입력해주세요.");
					$("#CAT_BANK_NAME").focus();
					return false;
				} else if (!$("#CAT_BANK_NUMBER").val()) {
					alert("계좌번호를 입력해주세요.");
					$("#CAT_BANK_NUMBER").focus();
					return false;
				} else if (!$("#CAT_BANK_USER").val()) {
					alert("예금주를 입력해주세요.");
					$("#CAT_BANK_USER").focus();
					return false;
				} else if (!$("#CAT_URL").val()) {
					alert("채널 링크를 입력해주세요.");
					$("#CAT_URL").focus();
					return false;
				} else if ($("#CAT_URL").val() && ($("#CAT_URL").val().indexOf("http://") === -1 && $("#CAT_URL").val().indexOf(
						"https://") === -1)) {
					alert("채널 링크에 http:// 또는 https:// 를 포함하여 입력해주세요.");
					$("#CAT_URL").focus();
					return false;
				} else if (!$("#CAT_COMMENT").val()) {
					alert("한줄 남기기 입력해주세요.");
					$("#CAT_COMMENT").focus();
					return false;
				} else {
					return true;
				}
			}else{
				if (!$("#agree1").is(":checked")) {
					alert("초상권 활용에 동의 해주셔야합니다.");
					$("#agree1").focus();
					return false;
				} else if (!$("#agree2").is(":checked")) {
					alert("캠페인 유의사항 및 제3자 제공에 동의 해주셔야합니다.");
					$("#agree2").focus();
					return false;
				} else if (!$("#CAT_NAME").val()) {
					alert("신청자 성함을 입력해주세요.");
					$("#CAT_NAME").focus();
					return false;
				} else if (!$("#CAT_TEL").val()) {
					alert("신청자 연락처를 입력해주세요.");
					$("#CAT_TEL").focus();
					return false;
				} else if (!$("#CAT_ADDR1").val()) {
					alert("신청자 주소를 입력해주세요.");
					$("#CAT_ADDR1").focus();
					return false;
				} else if (!$("#CAT_ADDR2").val()) {
					alert("신청자 상세주소를 입력해주세요.");
					$("#CAT_ADDR2").focus();
					return false;
				} else if (!$("#CAT_URL").val()) {
					alert("채널 링크를 입력해주세요.");
					$("#CAT_URL").focus();
					return false;
				} else if ($("#CAT_URL").val() && ($("#CAT_URL").val().indexOf("http://") === -1 && $("#CAT_URL").val().indexOf(
						"https://") === -1)) {
					alert("채널 링크에 http:// 또는 https:// 를 포함하여 입력해주세요.");
					$("#CAT_URL").focus();
					return false;
				} else if (!$("#CAT_COMMENT").val()) {
					alert("한줄 남기기 입력해주세요.");
					$("#CAT_COMMENT").focus();
					return false;
				} else {
					return true;
				}
			}
    } else {
      if (!$("#agree1").is(":checked")) {
        alert("초상권 활용에 동의 해주셔야합니다.");
        $("#agree1").focus();
        return false;
      } else if (!$("#agree2").is(":checked")) {
        alert("캠페인 유의사항 및 제3자 제공에 동의 해주셔야합니다.");
        $("#agree2").focus();
        return false;
      } else if (!$("#CAT_NAME").val()) {
        alert("신청자 성함을 입력해주세요.");
        $("#CAT_NAME").focus();
        return false;
      } else if (!$("#CAT_TEL").val()) {
        alert("신청자 연락처를 입력해주세요.");
        $("#CAT_TEL").focus();
        return false;
      } else if (!$("#CAT_URL").val()) {
        alert("채널 링크를 입력해주세요.");
        $("#CAT_URL").focus();
        return false;
      } else if ($("#CAT_URL").val() && ($("#CAT_URL").val().indexOf("http://") === -1 && $("#CAT_URL").val().indexOf(
          "https://") === -1)) {
        alert("채널 링크에 http:// 또는 https:// 를 포함하여 입력해주세요.");
        $("#CAT_URL").focus();
        return false;
      } else if (!$("#CAT_COMMENT").val()) {
        alert("한줄 남기기 입력해주세요.");
        $("#CAT_COMMENT").focus();
        return false;
      } else {
        return true;
      }
    }
  }
  //
  -->
  </script>
  <script type="text/javascript">
  <!--
  $("input:radio[name='CAT_CAMERA']").change(function() {
    var this_val = $(this).val();
    if (this_val == '기타') {
      $("#etc_txt").attr("readonly", false);
      $("#etc_txt").css("background", "#f6f6f6");
      $("#etc_txt").val("");
    } else {
      $("#etc_txt").attr("readonly", true);
      $("#etc_txt").css("background", "#ccc");
      $("#etc_txt").val("");
    }
  });

  function autoHypenPhone(str) {
    str = str.replace(/[^0-9]/g, '');
    var tmp = '';
    if (str.length < 4) {
      return str;
    } else if (str.length < 7) {
      tmp += str.substr(0, 3);
      tmp += '-';
      tmp += str.substr(3);
      return tmp;
    } else if (str.length < 11) {
      tmp += str.substr(0, 3);
      tmp += '-';
      tmp += str.substr(3, 3);
      tmp += '-';
      tmp += str.substr(6);
      return tmp;
    } else {
      tmp += str.substr(0, 3);
      tmp += '-';
      tmp += str.substr(3, 4);
      tmp += '-';
      tmp += str.substr(7);
      return tmp;
    }
    return str;
  }

  var cellPhone = document.getElementById('CAT_TEL');
  cellPhone.onkeyup = function(event) {
    event = event || window.event;
    if (this.value.length > 13) {
      var tel_txt = this.value.slice(0, -1);
      this.value = tel_txt;
    }
    var _val = this.value.trim();
    this.value = autoHypenPhone(_val);
  }
  //
  -->
  </script>

</body>

</html>