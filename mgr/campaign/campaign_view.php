<?include_once "../inc/header.php";?>
<?include_once "../inc/adminVO.php";?>
<style type="text/css">
	.card-block img{max-width:100%;}
</style>
<script type = "text/javascript">
	function setPhoneNumber(val){
		var numList = val.split("-");
		document.smsForm.sphone1.value=numList[0];
		document.smsForm.sphone2.value=numList[1];
		if(numList[2] != undefined){
			document.smsForm.sphone3.value=numList[2];
		}
	}
	function loadJSON(){
		var data_file = "/calljson.php";
		var http_request = new XMLHttpRequest();
		try{
			// Opera 8.0+, Firefox, Chrome, Safari
			http_request = new XMLHttpRequest();
		}catch (e){
			// Internet Explorer Browsers
			try{
				http_request = new ActiveXObject("Msxml2.XMLHTTP");

			}catch (e) {

				try{
					http_request = new ActiveXObject("Microsoft.XMLHTTP");
				}catch (e){
					// Eror
					alert("지원하지 않는브라우저!");
					return false;
				}

			}
		}
		http_request.onreadystatechange = function(){
			if (http_request.readyState == 4  ){
				// Javascript function JSON.parse to parse JSON data
				var jsonObj = JSON.parse(http_request.responseText);
				if(jsonObj['result'] == "Success"){
					var aList = jsonObj['list'];
					var selectHtml = "<select name=\"sendPhone\" onchange=\"setPhoneNumber(this.value)\">";
					selectHtml += "<option value='' selected>발신번호를 선택해주세요</option>";
					for(var i=0; i < aList.length; i++){
						selectHtml += "<option value=\"" + aList[i] + "\">";
						selectHtml += aList[i];
						selectHtml += "</option>";
					}
					selectHtml += "</select>";
					document.getElementById("sendPhoneList").innerHTML = selectHtml;
				}
			}
		}

		http_request.open("GET", data_file, true);
		http_request.send();
	}

</script>

        <div class="col g-ml-50 g-ml-0--lg ">
          <!-- Breadcrumb-v1 -->
          <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
            <ul class="u-list-inline g-color-gray-dark-v6 add-location">

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">홈</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">캠페인 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item">
                <span class="g-valign-middle">캠페인 신청자/선정자 보기</span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20" id="CTs-view">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">캠페인 신청자/선정자 보기</h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">

            <div class="media flex-wrap g-mb-30">
              <div class="d-flex align-self-center align-items-center">
                <span class="g-hidden-sm-down g-color-gray-dark-v6 g-mr-12">Type:</span>

                <div class="u-select--v1 g-pr-20">
                  <select class="js-select u-select--v1-select w-100" style="display: none;" id="sort_select">
										<option data-content='<span class="d-flex align-items-center"><span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-indigo g-mr-8--sm"></span><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">전체</span></span>' value="전체">전체</option>
                    <option data-content='<span class="d-flex align-items-center"><span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-teal-v2 g-mr-8--sm"></span><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">신청자</span></span>' value="신청자">신청자</option>
                    <option data-content='<span class="d-flex align-items-center"><span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-lightblue-v3 g-mr-8--sm"></span><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">선정자</span></span>' value="선정자">선정자</option>
										<option data-content='<span class="d-flex align-items-center"><span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-purple g-mr-8--sm"></span><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">리뷰완료</span></span>' value="리뷰완료">리뷰완료</option>
                  </select>
                  <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto"></i>
                </div>
              </div>

              <div class="d-flex g-hidden-md-up w-100"></div>

              <div class="media-body align-self-center g-mt-10 g-mt-0--md">
								<form action="campaign_view.php" method="get">
									<input type="hidden" name="mode" id="mode" value="<?=$mode?>">
									<input type="hidden" name="CPT_IDX" id="CPT_IDX" value="<?=$_GET['CPT_IDX']?>">
									<input type="hidden" name="pageNo" id="pageNo" value="<?=$pageNo?>">
									<input type="hidden" name="search" id="search" value="<?=$search?>">
									<div class="input-group g-pos-rel g-max-width-380 float-right">
										<input class="form-control g-font-size-default g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-rounded-20 g-pl-20 g-pr-50 g-py-10" type="text" placeholder="아이디 또는 이름을 입력해주세요" name="search_detail" id="search_detail" value="<?=$_GET['search_detail']?>">
										<button class="btn g-pos-abs g-top-0 g-right-0 g-z-index-2 g-width-60 h-100 g-bg-transparent g-font-size-16 g-color-primary g-color-secondary--hover rounded-0" type="submit">
											<i class="hs-admin-search g-absolute-centered"></i>
										</button>
									</div>
								</form>
              </div>
            </div>

            <table class="table w-100 g-mb-25">
							<colgroup class='g-hidden-sm-down'>
										<col style='width:5%;' class='g-hidden-sm-down'>
										<col style='width:5%;' class='g-hidden-sm-down'>
										<col style='width:5%;' class='g-hidden-sm-down'>
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col style='width:10%;' class='g-hidden-sm-down'>
									</colgroup>
              <thead class="g-hidden-sm-down g-color-gray-dark-v6">
                <tr>
									<th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                    <div class="d-flex align-items-center justify-content-between">
                      <a href="javascript:all_arlam();" class="btn btn u-btn-teal g-ml-5" onclick="return confirm('선정 알림톡을 전달 할까요??');">
												<i class="hs-admin-comment-alt"></i>
											</a>
                    </div>
                  </th>
									<th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                    <div class="d-flex align-items-center justify-content-between">
                      <a href="javascript:all_review_arlam();" class="btn btn u-btn-orange g-ml-5" onclick="return confirm('리뷰등록 알림톡을 전달 할까요??');">
												<i class="icon-bubbles"></i>
											</a>
                    </div>
                  </th>
                  <th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15 g-pl-25">
                    <div class="d-flex align-items-center justify-content-between">
                      No.
                    </div>
                  </th>
									<th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                    <div class="d-flex align-items-center justify-content-between">
                      방문자수
                    </div>
                  </th>
                  <th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                    <div class="d-flex align-items-center justify-content-between">
                      아이디
                    </div>
                  </th>
                  <th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                    <div class="d-flex align-items-center justify-content-between">
                      이름
                    </div>
                  </th>
									<th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                    <div class="d-flex align-items-center justify-content-between">
                      연락처
                    </div>
                  </th>
                  <th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                    <div class="d-flex align-items-center justify-content-between">
                      상태
                    </div>
                  </th>
									<th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                    <div class="d-flex align-items-center justify-content-between">
                      선정/리뷰등록 알림톡
                    </div>
                  </th>

									<th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                    <div class="d-flex align-items-center justify-content-between">
                      신청날짜
                    </div>
                  </th>
                  <th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15 g-pr-25"></th>
                </tr>
              </thead>

              <tbody class="g-font-size-default g-color-black" id="accordion-09" role="tablist" aria-multiselectable="true">
								<?while($row = mysqli_fetch_array($result)){ // 반복문?>
								<?
									$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$row['MET_IDX']."' ORDER BY MET_IDX ASC";
									$result_mem = mysqli_query($conn,$sql_mem);
									$cnt_mem = mysqli_num_rows($result_mem);
									$row_mem = mysqli_fetch_array($result_mem);
								?>
                <tr id="contact-1-header" role="tab" class="<?if($row['CAT_SELECTION']=='y'){?> select_y <?}else{?> select_n <?}?> <?if($row['CAT_SELECTION']=='y' && $row['CAT_BLOG_URL']){?> select_review <?}?>">
									<td class="g-hidden-sm-down g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md g-pl-25--sm">
										<?if($row['CAT_SELECTION']=='y' && !$row['CAT_BLOG_URL']){?>
										<input type="checkbox" name="alram_ckb[]" id="alram_ckb" value="<?=$row['CAT_IDX']?>" class="form-control" checked>
										<?}?>
									</td>
									<td class="g-hidden-sm-down g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md g-pl-25--sm">
										<?if($row['CAT_SELECTION']=='y' && !$row['CAT_BLOG_URL']){?>
										<input type="checkbox" name="review_ckb[]" id="review_ckb" value="<?=$row['CAT_IDX']?>" class="form-control" checked>
										<?}?>
									</td>
                  <td class="g-hidden-sm-down g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md g-pl-25--sm"><?=$cnt-$i?></td>
									<td class="g-hidden-sm-down g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md g-pl-25--sm">
										<a class="d-flex align-items-center u-link-v5 g-color-black g-color-secondary--hover g-color-secondary--opened" href="#modal_visit<?=$i?>" data-modal-target="#modal_visit<?=$i?>" data-modal-effect="fadein">조회
										</a>
									</td>
                  <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md g-px-5 g-px-10--sm">
                    <a class="d-flex align-items-center u-link-v5 g-color-black g-color-secondary--hover g-color-secondary--opened" href="#modal<?=$i?>" data-modal-target="#modal<?=$i?>" data-modal-effect="fadein">
											<?if($row_mem['MET_IMG_SAVE']){?>
												<img class="g-width-40 g-width-50--md g-height-40 g-height-50--md g-brd-around g-brd-2 g-brd-transparent g-brd-lightblue-v3--parent-opened rounded-circle g-mr-20--sm" src="../../uploads/<?=$row_mem['MET_IMG_SAVE']?>" alt="<?=$row_mem['MET_IMG_ORG']?>">
											<?}else{?>
												<img class="g-width-40 g-width-50--md g-height-40 g-height-50--md g-brd-around g-brd-2 g-brd-transparent g-brd-lightblue-v3--parent-opened rounded-circle g-mr-20--sm" src="../img/no-image.png" alt="no-image">
											<?}?>
                      <span class="g-hidden-sm-down <?if($row_mem['MET_BLACK']){?>g-color-red<?}else{?>g-color-black<?}?>"><?=$row_mem['MET_ID']?></span>
                    </a>
                  </td>
                  <td class="g-hidden-sm-down g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md"><?=$row['CAT_NAME']?></td>
									<td class="g-hidden-sm-down g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md"><?=$row['CAT_TEL']?></td>
                  <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md g-px-5 g-px-10--sm">
										<?if($row['CAT_SELECTION']=='y' && $row['CAT_BLOG_URL']){?>
											<span class="d-flex align-items-center justify-content-center u-tags-v1 g-hidden-sm-down text-center g-width-150--sm g-brd-around g-bg-gray-light-v8 g-bg-gray-light-v8 g-font-size-default g-color-gray-dark-v6 g-rounded-50 g-py-4 g-px-15" onclick="window.open('<?=$row['CAT_BLOG_URL']?>','cat_url<?=$row['CAT_IDX']?>','','');">
											<span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-purple g-mr-8"></span>
											리뷰등록
											<span class="g-hidden-sm-up u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-purple"></span>
										<?}else if($row['CAT_SELECTION']=='y'){?>
											<span class="d-flex align-items-center justify-content-center u-tags-v1 g-hidden-sm-down text-center g-width-150--sm g-brd-around g-bg-gray-light-v8 g-bg-gray-light-v8 g-font-size-default g-color-gray-dark-v6 g-rounded-50 g-py-4 g-px-15" onclick="CP_SUBMIT('cancel','<?=$row['CAT_IDX']?>','<?=$CPT_IDX?>','<?=$row_mem['MET_IDX']?>','<?=$pageNo?>','<?=$search?>');">
											<span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-lightblue-v3 g-mr-8"></span>
											선정자
											<span class="g-hidden-sm-up u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-lightblue-v3"></span>
										<?}else{?>
											<span class="d-flex align-items-center justify-content-center u-tags-v1 g-hidden-sm-down text-center g-width-150--sm g-brd-around g-bg-gray-light-v8 g-bg-gray-light-v8 g-font-size-default g-color-gray-dark-v6 g-rounded-50 g-py-4 g-px-15" onclick="CP_SUBMIT('submit','<?=$row['CAT_IDX']?>','<?=$CPT_IDX?>','<?=$row_mem['MET_IDX']?>','<?=$pageNo?>','<?=$search?>');">
											<span class="d-flex align-items-center justify-content-center u-tags-v1 g-hidden-sm-down text-center g-width-150--sm g-brd-around g-bg-gray-light-v8 g-bg-gray-light-v8 g-font-size-default g-color-gray-dark-v6 g-rounded-50 g-py-4 g-px-15">
											<span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-teal-v2 g-mr-8"></span>
											신청자
											<span class="g-hidden-sm-up u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-teal-v2"></span>
										<?}?>
                  </td>
									<td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md g-px-5 g-px-10--sm">
										<?if($row['CAT_SELECTION']=='y' && !$row['CAT_BLOG_URL']){?>
										<a href="../inc/adminDAO.php?mode=CA_ARLIM&CAT_IDX=<?=$row['CAT_IDX']?>&CPT_IDX=<?=$CPT_IDX?>&pageNo=<?=$pageNo?>&search=<?=$search?>&cate=<?=$cate?>" class="btn btn u-btn-teal g-ml-5 "  onclick="return confirm('선정 알림톡을 전달 할까요??');">
											<i class="hs-admin-comment-alt"></i>
										</a>
										<?}?>
										<?if($row['CAT_SELECTION']=='y' && !$row['CAT_BLOG_URL']){?>
										<a href="../inc/adminDAO.php?mode=CA_REVIEW_ARLIM&CAT_IDX=<?=$row['CAT_IDX']?>&CPT_IDX=<?=$CPT_IDX?>&pageNo=<?=$pageNo?>&search=<?=$search?>&cate=<?=$cate?>" class="btn btn u-btn-orange g-ml-5 "  onclick="return confirm('리뷰등록 알림톡을 전달 할까요??');">
											<i class="icon-bubbles"></i>
										</a>
										<?}?>
									</td>

									<td class="g-hidden-sm-down g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md"><?=$row['CAT_REG_DATE']?></td>
                  <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md g-px-5 g-px-10--sm g-pr-25">
                    <div class="d-flex align-items-center g-line-height-1">
                      <a class="u-link-v5 g-color-gray-light-v6 g-color-secondary--hover" href="../inc/adminDAO.php?mode=CADELETE&CAT_IDX=<?=$row['CAT_IDX']?>&CPT_IDX=<?=$CPT_IDX?>&pageNo=<?=$pageNo?>&search=<?=$search?>" onclick="return confirm('삭제 시키시겠습니까??');">
                        <i class="hs-admin-trash g-font-size-18"></i>
                      </a>
                    </div>
                  </td>
                </tr>
								<?
									if(strpos($row['CAT_URL'], "PostList.nhn?blogId") !== false) {
										$CAT_URL=explode("=", $row['CAT_URL']);
										$blog_url = $CAT_URL[1];
									}else if(strpos($row['CAT_URL'], "blog.naver.com") !== false) {
										$CAT_URL=explode("/", $row['CAT_URL']);
										$blog_url = $CAT_URL[3];
									}else if(strpos($row['CAT_URL'], "blog.me") !== false) {
										$CAT_URL=explode("/", $row['CAT_URL']);
										$CAT_URL=explode(".", $CAT_URL[2]);
										$blog_url = $CAT_URL[0];
									}
									$xml = file_get_contents("http://blog.naver.com/NVisitorgp4Ajax.nhn?blogId=".$blog_url);
									$object = simplexml_load_string($xml);
									$cnt_visit = COUNT($object->visitorcnt);

								?>
								<div id="modal_visit<?=$i?>" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
									<button type="button" class="close" onclick="Custombox.modal.close();">
										<i class="hs-icon hs-icon-close"></i>
									</button>
									<p>&nbsp;</p>
									<?for($j=0; $j < $cnt_visit; $j++){?>
										<p><span class="g-brd-4 g-brd-primary">날짜</span> : <?=$object->visitorcnt[$j]["id"]?> / <span class="g-brd-4 g-brd-primary">조회수</span> : <?=$object->visitorcnt[$j]["cnt"]?></p>
									<?}?>
								</div>
								<div id="modal<?=$i?>" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
									<button type="button" class="close" onclick="Custombox.modal.close();">
										<i class="hs-icon hs-icon-close"></i>
									</button>
									<h4 class="g-mb-20"><?=$row['MET_ID']?>[<?=$row['CAT_NAME']?>]</h4>
									<p><span class="g-brd-4 g-brd-primary">연락처</span> : <?=$row['CAT_TEL']?></p>
									<p><span class="g-brd-4 g-brd-primary">본인/대리인</span> : <?=$row['CAT_PARTICI']?></p>
									<p><span class="g-brd-4 g-brd-primary">카메라</span> : <?=$row['CAT_CAMERA']?></p>
									<p><span class="g-brd-4 g-brd-primary">채널</span> : <?=$row['CAT_CHANNEL']?></p>
									<p><span class="g-brd-4 g-brd-primary">채널링크</span> : <?=$row['CAT_URL']?></p>
									<p><span class="g-brd-4 g-brd-primary">신청자 한마디</span><br/><?=$row['CAT_COMMENT']?></p>
									<?if($row['CAT_ZIP']){?>
										<p><span class="g-brd-4 g-brd-primary">우편번호</span> : <?=$row['CAT_ZIP']?></p>
										<p><span class="g-brd-4 g-brd-primary">주소</span> : <?=$row['CAT_ADDR1']?> <?=$row['CAT_ADDR2 ']?></p>
									<?}?>
									<p><span class="g-brd-4 g-brd-primary">유저 메모</span> : <br/><?=$row_mem['MET_ETC']?></p>
								</div>
								<?$i++;}?>
              </tbody>
            </table>


            <div class="row">
							<div class='col-md-12 text-center'>
								<a href="campaign_list.php?pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">목 록</a>
							</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

    <?include_once "../inc/footer.php";?>


</body>

</html>
<script type="text/javascript">
<!--
	function CP_SUBMIT(type,CAT_IDX,CPT_IDX,MET_IDX,pageNo,search){
		if(type=='submit'){
			var rlt = confirm('캠페인 선정하시겠습니까?');
			if(rlt){
				location.href="../inc/adminDAO.php?mode=CAMODIFY&type="+type+"&CAT_IDX="+CAT_IDX+"&CPT_IDX="+CPT_IDX+"&MET_IDX="+MET_IDX+"&pageNo="+pageNo+"&search="+search+"";
			}
		}else{
			var rlt = confirm('캠페인 선정 취소하시겠습니까?');
			if(rlt){
				location.href="../inc/adminDAO.php?mode=CAMODIFY&type="+type+"&CAT_IDX="+CAT_IDX+"&CPT_IDX="+CPT_IDX+"&MET_IDX="+MET_IDX+"&pageNo="+pageNo+"&search="+search+"";
			}
		}

	}
//-->
</script>
<script type="text/javascript">
<!--
	$("#sort_select").change(function (){
		var sort_type = $(this).val();
		if(sort_type=='전체'){
			$(".select_y").css("display","");
			$(".select_n").css("display","");
			$(".select_review").css("display","");
		}else if(sort_type=='신청자'){
			$(".select_y").css("display","none");
			$(".select_review").css("display","none");
			$(".select_n").css("display","");
		}else if(sort_type=='선정자'){
			$(".select_n").css("display","none");
			$(".select_review").css("display","none");
			$(".select_y").css("display","");
		}else if(sort_type=='리뷰완료'){
			$(".select_n").css("display","none");
			$(".select_y").css("display","none");
			$(".select_review").css("display","");
		}
	});

	function all_arlam(){
		var checked_cnt = $("input:checkbox[name='alram_ckb[]']:checked").length;
		
		if(checked_cnt > 0){
			var v="";
			var c=0;
			for ( var i = 0; i < $("input:checkbox[name='alram_ckb[]']:checked" ).length; i++) {
				if ($( "input:checkbox[name='alram_ckb[]']:checked")[i]) {
					if (c > 0) v = v + "|" ;
					v = v + $( "input:checkbox[name='alram_ckb[]']:checked" )[i].value;
					c++;
				}
			}
			var CPT_IDX="<?=$CPT_IDX?>";
			var pageNo="<?=$pageNo?>";
			var search="<?=$search?>";
			var cate="<?=$cate?>";
			location.href="../inc/adminDAO.php?mode=CA_ARLIM_ALL&CAT_IDX=" + v + "&CPT_IDX=" + CPT_IDX + "&pageNo=" + pageNo + "&search=" + search + "&cate=" + cate + "";
		}else{
			alert("전송할 리스트를 선택해주세요!");
			return false;
		}
	}
	function all_review_arlam(){
		var checked_cnt = $("input:checkbox[name='review_ckb[]']:checked").length;
		if(checked_cnt > 0){
			var v="";
			var c=0;
			for ( var i = 0; i < $("input:checkbox[name='review_ckb[]']:checked" ).length; i++) {
				if ($( "input:checkbox[name='review_ckb[]']:checked")[i]) {
					if (c > 0) v = v + "|" ;
					v = v + $( "input:checkbox[name='review_ckb[]']:checked" )[i].value;
					c++;
				}
			} 
			var CPT_IDX="<?=$CPT_IDX?>";
			var pageNo="<?=$pageNo?>";
			var search="<?=$search?>";
			var cate="<?=$cate?>";
			location.href="../inc/adminDAO.php?mode=CA_REVIEW_ARLIM_ALL&CAT_IDX=" + v + "&CPT_IDX=" + CPT_IDX + "&pageNo=" + pageNo + "&search=" + search + "&cate=" + cate + "";
		}else{
			alert("전송할 리스트를 선택해주세요!");
			return false;
		}
	}
//-->
</script>
