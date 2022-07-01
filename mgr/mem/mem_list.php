<?include_once "../inc/header.php";?>
<?$mode='MLIST';?>
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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">회원 리스트</a>
              </li>

            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

            <div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">회원 리스트</h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
            <div class="media-md align-items-center g-mb-30">
							<div class="media d-md-flex align-items-center mr-auto ">
								<div class="d-flex align-items-center">
									<a class=" btn btn u-btn-indigo g-width-130--md g-font-size-default g-ml-10" href="excel_mem.php?search=<?=$search?>" target='_blank'>엑셀 출력</a>
									<a class=" btn btn u-btn-red g-width-130--md g-font-size-default g-ml-10" href="mem_list.php?type=BLACK">BLACK LIST</a>
								</div>
							</div>
              <div class="media d-md-flex align-items-center ml-auto">
                <div class="d-flex g-ml-15 g-ml-55--md">
									<form action='mem_list.php' method='get' id='frm' name='frm'>
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
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col style='width:5%;' class='g-hidden-sm-down'>
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col style='width:14%;' class='g-hidden-sm-down'>
										<col style='width:8%;' class='g-hidden-sm-down'>
										<col style='width:8%;' class='g-hidden-sm-down'>
									</colgroup>
                  <thead>
                    <tr>
											<th class='g-hidden-sm-down'>
                          BLACK
                      </th>
                      <th class='g-hidden-sm-down'>
                          NO.
                      </th>
                      <th style='width:200px;'>
                          ID
                      </th>
											<th style='width:200px;'>
                          NAME
                      </th>
											<th style='width:200px;'>
                          TEL
                      </th>
											<th style='width:200px;'>
                          NICK NAME
                      </th>
											<th style='width:200px;'>
                          ADDR
                      </th>
                      <th style='width:100px;'>
                          DATE
                      </th>
                      <th  style='width:180px;'></th>
                    </tr>
                  </thead>

                  <tbody>
									<?while($row = mysqli_fetch_array($result)){ // 반복문?>
                    <tr>
											<td  class='g-hidden-sm-down'>
												<select name="MET_BLACK" id="MET_BLACK" class="form-control MET_BLACK" data="<?=$row['MET_IDX']?>">
													<option value="">:: 선택 ::</option>
													<option value="<?=$row['MET_IDX']?>" <?if($row['MET_BLACK']=='y'){ echo "selected";}?>>블랙리스트 등록</option>
												</select>
												<div class="input-group g-mt-5" id="black_msg<?=$row['MET_IDX']?>" style="<?if(!$row['MET_BLACK']){?>display:none;<?}?>">
													<input type="text" class="form-control rounded-0 form-control-md" name="MET_BLACK_MSG" id="MET_BLACK_MSG<?=$row['MET_IDX']?>" value="<?=$row['MET_BLACK_MSG']?>">
													<div class="input-group-append">
														<button class="btn btn-md u-btn-cyan rounded-0" type="button" style="height:33px; line-height:1;" onclick="black_save('<?=$row['MET_IDX']?>');">저장</button>
													</div>
												</div>
											</td>
                      <td  class='g-hidden-sm-down'><?=$cur_num-$i;?></td>
                      <td class='table_title'>
												<a href='mem_write.php?mode=MMODIFY&MET_IDX=<?=$row['MET_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>' class="<?if($row['MET_BLACK']=='y'){?>g-color-red<?}else{?>g-color-black<?}?> " id="met_id<?=$row['MET_IDX']?>"><?=stripslashes($row['MET_ID'])?></a>
											</td>
											<td >
												<a href='mem_write.php?mode=MMODIFY&MET_IDX=<?=$row['MET_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>' class="g-color-black"><?=stripslashes($row['MET_NAME'])?></a>
												<a href="../inc/adminVO.php?mode=USER_LOGIN&MET_IDX=<?=$row['MET_IDX']?>" class="btn btn-xs u-btn-indigo g-ml-10 ">
													로그인
												</a>
											</td>
											<td>
												<a href='mem_write.php?mode=MMODIFY&MET_IDX=<?=$row['MET_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>' class="g-color-black"><?=stripslashes($row['MET_TEL'])?></a>
											</td>
											<td class='table_title'>
												<a href='mem_write.php?mode=MMODIFY&MET_IDX=<?=$row['MET_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>' class="g-color-black"><?=stripslashes($row['MET_NIC'])?></a>
												<a href="mem_etc.php?mode=MEMODIFY&MET_IDX=<?=$row['MET_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-xs u-btn-indigo g-ml-10 ">
													메모
												</a>
											</td>
											<td class='table_title'>
												<a href='mem_write.php?mode=MMODIFY&MET_IDX=<?=$row['MET_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>' class="g-color-black"><?=stripslashes($row['MET_ADDR1'])?></a>
											</td class='table_title'>
                      <td><?=$row['MET_REG_DATE']?></td>
                      <td class="text-right" >
												<a href="mem_write.php?mode=MMODIFY&MET_IDX=<?=$row['MET_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-xs u-btn-indigo g-mr-10 ">
													<i class="hs-admin-pencil g-mr-3"></i>
													MODIFY
												</a>
												<a href="../inc/adminDAO.php?mode=MDELETE&MET_IDX=<?=$row['MET_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-xs u-btn-primary g-mr-10 " onclick="return confirm('삭제 및 탈퇴 시키시겠습니까??');">
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
<script>
	$(".MET_BLACK").on("change",function (){
		var value = $(this).val();
		if(value){
			$("#black_msg"+value).css("display","");
		}else{
			var value = $(this).attr("data");
				$.ajax({
					type: 'post' ,
					url: '../inc/adminDAO.php' ,
					data: {
						mode: 'BLLIST_CANCEL',
						MET_IDX: value
					},
					success: function(data) {
						if(data.indexOf('yes') !== -1){
							$("#black_msg"+value).val("");
							$("#black_msg"+value).css("display","none");
							$("#met_id"+value).removeClass("g-color-red");
							$("#met_id"+value).addClass("g-color-black");
						}
					}
				});
		}
	});
	function black_save(key){
		var rlt = confirm('블랙리스트 등록하시겠습니까?'); 
		if(rlt){							
			var msg = $("#MET_BLACK_MSG"+key).val();
			var pageNo="<?=$pageNo?>";
			var search="<?=$search?>";
			location.href="../inc/adminDAO.php?mode=BLLIST&MET_IDX="+key+"&MET_BLACK_MSG="+msg+"&pageNo="+pageNo+"&search="+search+"";
		}
	}
</script>