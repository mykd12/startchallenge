<?include_once "../inc/header.php";?>
<?$mode='RLIST';?>
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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">회원관리 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">환급 리스트</a>
              </li>

            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

            <div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">환급 리스트</h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
            <div class="media-md align-items-center g-mb-30">
              <div class="media d-md-flex align-items-center ml-auto">
                <div class="d-flex g-ml-15 g-ml-55--md">
									<form action='attend_list.php' method='get' id='frm' name='frm'>
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
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col style='width:20%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
										<col style='width:10%;' class='g-hidden-sm-down'>
									</colgroup>
                  <thead>
                    <tr>
                      <th class='g-hidden-sm-down'>
                          NO.
                      </th>
                      <th style='width:200px;'>
                          NAME
                      </th>
											<th style='width:200px;'>
                          회원이름(NICK NAME)
                      </th>
											<th style='width:200px;'>
                          TEL
                      </th>
                      <th style='width:100px;'>
                          DATE
                      </th>
											<th>지급일 선택</th>
											<th>단계</th>
                      <th  style='width:180px;'></th>
                    </tr>
                  </thead>

                  <tbody>
									<?while($row = mysqli_fetch_array($result)){ // 반복문?>
									<?
										$sql_mem="SELECT * FROM MEM_TB WHERE MET_IDX='".$row['MET_IDX']."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
										$result_mem = mysqli_query($conn,$sql_mem);
										$row_mem = mysqli_fetch_array($result_mem);
									?>
                    <tr>
                      <td  class='g-hidden-sm-down'><?=$cur_num-$i;?></td>
                      <td >
												<a href='attend_view.php?mode=RVIEW&RFT_IDX=<?=$row['RFT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>' class="g-color-black"><?=stripslashes($row['RFT_NAME'])?></a>
											</td>
											<td class='table_title'>
												<a href='attend_view.php?mode=RVIEW&RFT_IDX=<?=$row['RFT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>' class="g-color-black"><?=stripslashes($row_mem['MET_NAME'])?>(<?=stripslashes($row_mem['MET_NIC'])?>)</a>
											</td>
											<td>
												<a href='attend_view.php?mode=RVIEW&RFT_IDX=<?=$row['RFT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>' class="g-color-black"><?=stripslashes($row['RFT_TEL'])?></a>
											</td>
                      <td><?=$row['RFT_REG_DATE']?></td>
											<td>
												<div id="datepickerWrapper<?=$row['RFT_IDX']?>" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
													<input class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" name='RFT_DATE[]' id='RFT_DATE<?=$row['RFT_IDX']?>' placeholder="지급일 선택" data-rp-wrapper="#datepickerWrapper<?=$row['RFT_IDX']?>" data-rp-date-format="Y-m-d" value="<?=$row['RFT_DATE']?>">
													<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
														<i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
														<i class="hs-admin-angle-down"></i>
													</div>
												</div>
												<a href="javascript:void(0);" class="btn btn-xs btn-block u-btn-primary g-mr-10 g-mt-10" onclick="ref_date_submit('<?=$row['RFT_IDX']?>');">
													<i class="hs-admin-check g-mr-3"></i>
													저장
												</a>
											</td>
											<td>
												<div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0">
													<select class="js-select u-select--v3-select u-sibling w-100" required="required" title="단계 선택" style="display: none;" name="RFT_APP[]" id="RFT_APP<?=$row['RFT_IDX']?>">
														<option value="환급신청" data-content='<span class="d-flex align-items-center w-100"><span>환급신청</span></span>' <?if($row['RFT_APP']=='환급신청'){ echo " selected "; }?>>환급신청
														</option>
														<option value="환급보류" data-content='<span class="d-flex align-items-center w-100"><span>환급보류</span></span>' <?if($row['RFT_APP']=='환급보류'){ echo " selected "; }?>>환급보류
														</option>
														<option value="환급처리" data-content='<span class="d-flex align-items-center w-100"><span>환급처리</span></span>' <?if($row['RFT_APP']=='환급처리'){ echo " selected "; }?>>환급처리
														</option>
													</select>
													<div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
														<i class="hs-admin-angle-down"></i>
													</div>
												</div>
												<a href="javascript:void(0);" class="btn btn-xs btn-block u-btn-primary g-mr-10 g-mt-10" onclick="ref_app_submit('<?=$row['RFT_IDX']?>','<?=$row['MET_IDX']?>');">
													<i class="hs-admin-check g-mr-3"></i>
													저장
												</a>
											</td>
                      <td class="text-right" >
												<a href="attend_write.php?mode=RMODIFY&RFT_IDX=<?=$row['RFT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-xs u-btn-indigo g-mr-10 ">
													<i class="hs-admin-pencil g-mr-3"></i>
													MODIFY
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
	function ref_date_submit(RFT_IDX){
		var RET_DATE = $("#RFT_DATE"+RFT_IDX).val();
		if(RET_DATE){
			var search="<?=$search?>";
			var pageNo="<?=$pageNo?>";
			var url = '../inc/adminDAO.php?mode=RDATE&RFT_IDX='+RFT_IDX+'&RET_DATE='+RET_DATE+'&pageNo='+pageNo+'&search='+search;
			location.href=url;
			
		}else{
			alert("지급일을 선택해주세요");
			$("#RFT_DATE"+RFT_IDX).focus();
			return false;
		}
	}

	function ref_app_submit(RFT_IDX,MET_IDX){
		var RFT_APP = $("#RFT_APP"+RFT_IDX).val();
		if(RFT_APP){
			var search="<?=$search?>";
			var pageNo="<?=$pageNo?>";
			var url = '../inc/adminDAO.php?mode=RAPP&RFT_IDX='+RFT_IDX+'&RFT_APP='+RFT_APP+'&MET_IDX='+MET_IDX+'&pageNo='+pageNo+'&search='+search;
			location.href=url;
		}else{
			alert("단계를 선택해주세요");
			$("#RFT_APP"+RFT_IDX).focus();
			return false;
		}
	}
//-->
</script>