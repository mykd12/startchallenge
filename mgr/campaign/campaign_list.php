<?include_once "../inc/header.php";?>
<?$mode='CPLIST';?>
<?include_once "../inc/adminVO.php";?>

        <div class="col g-ml-50 g-ml-0--lg g-overflow-hidden">
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

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">캠페인 리스트</a>
              </li>

            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

            <div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">캠페인 리스트</h1>
              </div>
							<div class="media-body align-self-center text-right">
                <a class=" btn btn u-btn-primary g-width-100--md g-font-size-default g-ml-10" href="campaign_write.php?mode=CPINSERT&pageNo=<?=$pageNo?>&search=<?=$search?>&cate=<?=$cate?>">+ ADD
              </a>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
            <div class="media-md align-items-center g-mb-30">
              <div class="media d-md-flex align-items-center ml-auto">
								<div class="d-flex align-self-center align-items-center">
									<span class="g-hidden-sm-down g-color-gray-dark-v6 g-mr-12">진행과정:</span>

									<div class="u-select--v1 g-pr-20">
										<select class="js-select u-select--v1-select w-100" style="display: none;" name="cate" id="cate">
											<option data-content='<span class="d-flex align-items-center"><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">전체</span></span>' value="전체" <?if($cate=='전체'){ echo "selected"; }?>>전체</option>
											<option data-content='<span class="d-flex align-items-center"><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">캠페인 신청대기</span></span>' value="캠페인 신청대기" <?if($cate=='캠페인 신청대기'){ echo "selected"; }?>>캠페인 신청대기</option>
											<option data-content='<span class="d-flex align-items-center"><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">캠페인 신청기간</span></span>' value="캠페인 신청기간" <?if($cate=='캠페인 신청기간'){ echo "selected"; }?>>캠페인 신청기간</option>
											<option data-content='<span class="d-flex align-items-center"><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">인플언서 선정</span></span>' value="인플언서 선정" <?if($cate=='인플언서 선정'){ echo "selected"; }?>>인플언서 선정</option>
											<option data-content='<span class="d-flex align-items-center"><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">콘텐츠 등록기간</span></span>' value="콘텐츠 등록기간" <?if($cate=='콘텐츠 등록기간'){ echo "selected"; }?>>콘텐츠 등록기간</option>
											<!--<option data-content='<span class="d-flex align-items-center"><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">캠페인 결과발표</span></span>' value="캠페인 결과발표" <?if($cate=='캠페인 결과발표'){ echo "selected"; }?>>캠페인 결과발표</option>-->
											<option data-content='<span class="d-flex align-items-center"><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">캠페인 종료</span></span>' value="캠페인 종료" <?if($cate=='캠페인 종료'){ echo "selected"; }?>>캠페인 종료</option>
											<option data-content='<span class="d-flex align-items-center"><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">비활성화</span></span>' value="비활성화" <?if($cate=='비활성화'){ echo "selected"; }?>>비활성화</option>
										</select>
										<i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto"></i>
									</div>
								</div>
                <div class="d-flex g-ml-15 g-ml-55--md">
									<form action='campaign_list.php' method='get' id='frm' name='frm'>
										<input id="cate" name='cate' type="hidden" value='<?=$cate?>'>
										<div class="input-group g-pos-rel g-width-320--md">
											<input id="search" name='search' class="form-control g-font-size-default g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-rounded-20 g-pl-20 g-pr-50 " type="text" placeholder="Enter search keyword." value='<?=$search?>'>

											<button class="btn g-pos-abs g-top-0 g-right-0 g-z-index-2 g-width-60 h-100 g-bg-transparent g-font-size-16 g-color-lightred-v2 g-color-lightblue-v3--hover rounded-0" type="submit">
												<i class="hs-admin-search g-absolute-centered"></i>
											</button>
										</div>
									</form>
                </div>
              </div>
            </div>

            <div class="add-table-responsive-wrapper">
              <div class="table-responsive">
                <table class="table table-striped">
									<colgroup class='g-hidden-sm-down'>
										<col style='width:5%;' class='g-hidden-sm-down'>
										<col style='width:5%;' class='g-hidden-sm-down'>
										<col style='width:13%;' class='g-hidden-sm-down'>
										<col style='width:13%;' class='g-hidden-sm-down'>
										<col style='width:30%;' class='g-hidden-sm-down'>
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
									</colgroup>
                  <thead>
                    <tr>
                      <th class='g-hidden-sm-down'>
                          NO.
                      </th>
											<th style='width:200px;'>
													추천
                      </th>
											<th style='width:200px;'>
													진행과정
                      </th>
											<th style='width:200px;'>
													신청자/선정자 확인
                      </th>
                      <th style='width:200px;'>
                          TITLE
                      </th>
                      <th style='width:100px;'>
                          DATE
                      </th>
                      <th  style='width:180px;'></th>
                    </tr>
                  </thead>

                  <tbody>
									<?while($row = mysqli_fetch_array($result)){ // 반복문?>
									<?
										$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row['CPT_IDX']."' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
										$result_app = mysqli_query($conn,$sql_app);
										$cnt_app = mysqli_num_rows($result_app);

										$sql_app1 = "SELECT * FROM CAMPAIGN_APP_TB WHERE CPT_IDX='".$row['CPT_IDX']."'AND CAT_SELECTION ='y' AND CAT_DELETE_DATE IS NULL ORDER BY CAT_IDX DESC";
										$result_app1 = mysqli_query($conn,$sql_app1);
										$cnt_app1 = mysqli_num_rows($result_app1);
									?>
                    <tr>
                      <td  class='g-hidden-sm-down'><?=$cur_num-$i;?></td>
											<td  class='g-hidden-sm-down'><input  class="form-control cpt_main" name='CPT_IDX[]' id='CPT_IDX<?=$row['CPT_IDX']?>' type="checkbox" value="<?=$row['CPT_IDX']?>" <?if($row['CPT_MAIN']=='Y'){ echo "checked"; }?>></td>
											<td  class='g-hidden-sm-down'>
												<?
													if($row['CPT_APP_START_DATE'] > $date){
														echo "캠페인 신청대기";
													}else if($date >= $row['CPT_APP_START_DATE'] && $date <= $row['CPT_APP_END_DATE']){
														echo "캠페인 신청기간";
													}else if($date == $row['CPT_ANNO_DATE']){
														echo "인플언서 선정";
													}else if($date >= $row['CPT_REVIEW_START_DATE'] && $date <= $row['CPT_REVIEW_END_DATE']){
														echo "콘텐츠 등록기간";
													}else if($date >= $row['CPT_REVIEW_END_DATE '] && $date < $row['CPT_END_DATE ']){
														echo "캠페인 결과발표";
													}else if($date >= $row['CPT_END_DATE ']){
														echo "캠페인 종료";
													}
												?>
											</td>
											<td>
												[<?=$cnt_app?> / <?=$cnt_app1?>]
												<a href="campaign_view.php?mode=CPVIEW&CPT_IDX=<?=$row['CPT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>&cate=<?=$cate?>" class="btn btn-xs u-btn-teal g-ml-10 g-pt-5 ">
													<i class="icon-magnifier"></i>
												</a>
												<?if($date >= $row['CPT_APP_START_DATE'] && $date <= $row['CPT_ANNO_DATE']){?>
													<a href="excel_app_mem.php?CPT_IDX=<?=$row['CPT_IDX']?>&mode=신청자" class="btn btn-xs u-btn-teal g-ml-5 g-pt-5">
														<i class="icon-cloud-download"></i>
													</a>
												<?}?>
												<?if($date > $row['CPT_ANNO_DATE'] && $date <= $row['CPT_REVIEW_END_DATE']){?>
													<a href="excel_app_mem.php?CPT_IDX=<?=$row['CPT_IDX']?>&mode=선정자" class="btn btn-xs u-btn-teal g-ml-5 g-pt-5 ">
														<i class="icon-cloud-download"></i>
													</a>
												<?}?>
												<?if($date > $row['CPT_REVIEW_END_DATE']){?>
													<a href="excel_app_mem.php?CPT_IDX=<?=$row['CPT_IDX']?>&mode=결과발표" class="btn btn-xs u-btn-teal g-ml-5 g-pt-5 ">
														<i class="icon-cloud-download"></i>
													</a>
												<?}?>

											</td>
                      <td class='table_title'>
												<a href='/view.php?mode=CP_VIEW&CPT_IDX=<?=$row['CPT_IDX']?>' target="_blank" class="g-color-black"><?=stripslashes($row['CPT_TITLE'])?> </a>
											</td>
                      <td><?=$row['CPT_REG_DATE']?></td>
                      <td class="text-right" >
												<a href="campaign_write.php?mode=CPMODIFY&CPT_IDX=<?=$row['CPT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>&cate=<?=$cate?>" class="btn btn-xs u-btn-indigo g-mr-10 ">
													<i class="hs-admin-pencil g-mr-3"></i>
													MODIFY
												</a>
												<a href="../inc/adminDAO.php?mode=CPDELETE&CPT_IDX=<?=$row['CPT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>&cate=<?=$cate?>" class="btn btn-xs u-btn-primary g-mr-10 " onclick="return confirm('삭제 시키시겠습니까??');">
													<i class="hs-admin-trash g-mr-3"></i>
													DELETE
												</a>
                      </td>
                    </tr>
									<?$i++;}?>
                  </tbody>
                </table>
              </div>
            </div>
							<?include_once "../inc/paging.php";?>
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
	$("#cate").change(function (){
		var cate = $("#cate").val();
		var search = "<?=$search?>";
		var pageNo = "<?=$pageNo?>";
		location.href='campaign_list.php?cate='+cate+'&search='+search;
	});
//-->
</script>
<script type="text/javascript">
<!--
$(".cpt_main").click(function (){
	var cpt_idx = $(this).val();

	if($(this).is(":checked")){
		cpt_main='Y';
	}else{
		cpt_main='N';
	}

	$.ajax({
		type: 'post' ,
		url: '../inc/adminDAO.php' ,
		data: {
			mode: 'CPT_MAIN',
			CPT_MAIN: cpt_main,
			CPT_IDX: cpt_idx
		},
		success: function(data) {
			if(data.indexOf('yes') !== -1){
			}else{
				$("#CPT_IDX"+cpt_idx).prop("checked", false);
			}
		}
	});
});
//-->
</script>
