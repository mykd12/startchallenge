<?include_once "../inc/header.php";?>
<?$mode='NLIST';?>
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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">고객지원 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">소식 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">소식 리스트</a>
              </li>

            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

            <div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">소식 리스트</h1>
              </div>
              <div class="media-body align-self-center text-right">
                <a class=" btn btn u-btn-primary g-width-100--md g-font-size-default g-ml-10" href="notice_write.php?mode=NINSERT&pageNo=<?=$pageNo?>&search=<?=$search?>">+ ADD
              </a>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
            <div class="media-md align-items-center g-mb-30">
              <div class="media d-md-flex align-items-center ml-auto">
                <div class="d-flex g-ml-15 g-ml-55--md">
									<form action='notice_list.php' method='get' id='frm' name='frm'>
										<div class="input-group g-pos-rel g-width-320--md">
											<input id="search" name='search' class="form-control g-font-size-default g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-rounded-20 g-pl-20 g-pr-50 " type="text" placeholder="검색어를 입력해주세요." value='<?=$search?>'>
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
										<!--<col style='width:10%;' class='g-hidden-sm-down'>-->
										<col style='width:20%;' class='g-hidden-sm-down'>
										<col style='width:40%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
									</colgroup>
                  <thead>
                    <tr>
                      <th class='g-hidden-sm-down'>
                          NO.
                      </th>
											<!--<th style='width:200px;'>
                          메인 활성화
                      </th>-->
											<th style='width:200px;'>
                          TYPE
                      </th>
                      <th style='width:200px;'>
                          TITLE
                      </th>
											<th style='width:200px;'>
                          VIEW
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
                      <td  class='g-hidden-sm-down'><?=$cur_num-$i;?></td>
											<!--<td  class='g-hidden-sm-down'>
												<input  class="form-control not_view" name='NOT_IDX[]' id='NOT_IDX<?=$row['NOT_IDX']?>' type="checkbox" placeholder="이벤트 제목을 입력 해주세요." value="<?=$row['NOT_IDX']?>" <?if($row['NOT_VIEW']=='Y'){ echo "checked"; }?>>
											</td>-->
											<td>
												<?=$row['NOT_CATE']?>
												<?if($row['NOT_CATE']=='이벤트'){?><br/>
													<?=$row['NOT_START_DATE']?>~<?=$row['NOT_END_DATE']?>
												<?}?>
											</td>
                      <td class='table_title'>
												<a href='notice_view.php?mode=NVIEW&NOT_IDX=<?=$row['NOT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>' class="g-color-black"><?=stripslashes($row['NOT_TITLE'])?></a>
											</td>
											<td><?=number_format($row['NOT_CNT'])?></td>
                      <td><?=$row['NOT_REG_DATE']?></td>
                      <td class="text-right" >
												<a href="notice_write.php?mode=NMODIFY&NOT_IDX=<?=$row['NOT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-xs u-btn-indigo g-mr-10 ">
													<i class="hs-admin-pencil g-mr-3"></i>
													MODIFY
												</a>
												<a href="../inc/adminDAO.php?mode=NDELETE&NOT_IDX=<?=$row['NOT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-xs u-btn-primary g-mr-10 " onclick="return confirm('삭제하시겠습니까?');">
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
$(".not_view").click(function (){
	var not_idx = $(this).val();
	var not_type ='';

	if($(this).is(":checked")){
		not_type='Y';
	}else{
		not_type='N';
	}

	$.ajax({
		type: 'post' ,
		url: '../inc/adminDAO.php' ,
		data: {
			mode: 'NOT_VIEW',
			type: not_type,
			NOT_IDX: not_idx
		},
		success: function(data) {
			
			if(data.indexOf('yes') !== -1){
			}else{
				alert('메인에 공개된 게시물이 전부 선택되었습니다.');
				$("#NOT_IDX"+not_idx).prop("checked", false);
			}
		}
	});
});
	
//-->
</script>