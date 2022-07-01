<?include_once "../inc/header.php";?>
<?$mode='QLIST';?>
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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">1:1 문의 리스트</a>
              </li>

            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

            <div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">1:1 문의 리스트</h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
            <div class="media-md align-items-center g-mb-30">
              <div class="media d-md-flex align-items-center ml-auto">
                <div class="d-flex g-ml-15 g-ml-55--md">
									<form action='qna_list.php' method='get' id='frm' name='frm'>
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
										<col style='width:10%;' class='g-hidden-sm-down'>
										<col style='width:20%;' class='g-hidden-sm-down'>
										<col style='width:40%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
										<col style='width:15%;' class='g-hidden-sm-down'>
									</colgroup>
                  <thead>
                    <tr>
                      <th class='g-hidden-sm-down'>
                          NO.
                      </th>
											<th style='width:200px;'>
                          답변/미답변
                      </th>
											<th style='width:200px;'>
                          문의자
                      </th>
                      <th style='width:200px;'>
                          문의 제목
                      </th>
                      <th style='width:100px;'>
                          날짜
                      </th>
                      <th  style='width:180px;'></th>
                    </tr>
                  </thead>

                  <tbody>
									<?while($row = mysqli_fetch_array($result)){ // 반복문?>
									<?
										$sql_mem = "SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$row['MET_IDX']."' ORDER BY MET_IDX DESC";
										$result_mem = mysqli_query($conn,$sql_mem);
										$row_mem = mysqli_fetch_array($result_mem);

										$sql_ans = "SELECT * FROM QNA_ANSWER_TB WHERE QAT_DELETE_DATE IS NULL AND QNT_IDX='".$row['QNT_IDX']."' ORDER BY QAT_IDX DESC";
										$result_ans = mysqli_query($conn,$sql_ans);
										$cnt_ans = mysqli_num_rows($result_ans);
									?>
                    <tr>
                      <td  class='g-hidden-sm-down'><?=$cur_num-$i;?></td>
											<td>
												<?if($cnt_ans > 0){?>
													<span style='color:#ff5500; font-weight:600;'>답변</span>
												<?}else{?>
													미답변
												<?}?>
											</td>
											<td><?=$row_mem['MET_NAME']?>(<?=$row_mem['MET_NIC']?>)</td>
                      <td class='table_title'>
												<a href='qna_view.php?mode=QVIEW&QNT_IDX=<?=$row['QNT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>' class="g-color-black"><?=stripslashes($row['QNT_TITLE'])?></a>
											</td>
                      <td><?=$row['QNT_REG_DATE']?></td>
                      <td class="text-right" >
												<a href="../inc/adminDAO.php?mode=QDELETE&QNT_IDX=<?=$row['QNT_IDX']?>&pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-xs u-btn-primary g-mr-10 " onclick="return confirm('삭제하시겠습니까?');">
													<i class="hs-admin-trash g-mr-3"></i>
													삭제
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
