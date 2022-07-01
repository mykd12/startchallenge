
<div id="shortcode7" class='g-mt-30'>
  <div class="shortcode-html">
	<!-- Pagination #07 -->
	<nav class="text-center" aria-label="Page Navigation">
	  <ul class="list-inline">
		<?
		//여기서부터 각종 페이지 링크 
		//먼저, 한 화면에 보이는 블록($page_num 기본값 이상일 때 블록으로 나뉘어짐 ) 
		$total_block=ceil($total_page/$page_num); 
		$block=ceil($pageNo/$page_num); //현재 블록 
		  
		$first=($block-1)*$page_num; // 페이지 블록이 시작하는 첫 페이지 
		$last=$block*$page_num; //페이지 블록의 끝 페이지 
		  
		if($block >= $total_block) { 
		$last=$total_page; 
		} 

		//[◀] 이전 페이지로 이동한다. 
		if($pageNo > 1) { 
		$go_page=$pageNo-1; 
			echo "<li class='list-inline-item'>";
			echo "<a class='u-pagination-v1__item u-pagination-v1-1 g-pa-6-8' href='".$page."?pageNo=1&search=$search&cate=$cate&type=$type' aria-label='PREV'>";
			echo "<span aria-hidden='true'>";
			echo "<i class='fa fa-angle-double-left g-mr-5 g-ml-5'></i>";
			echo "</span>";
			echo "</a>";
			echo "</li>";
			echo "<li class='list-inline-item'>";
			echo "<a class='u-pagination-v1__item u-pagination-v1-1 g-pa-6-8' href='".$page."?pageNo=$go_page&search=$search&cate=$cate&type=$type' aria-label='Prev'>";
			echo "<span aria-hidden='true'>";
			echo "<i class='fa fa-angle-left g-mr-5 g-ml-5'></i>";
			echo "</span>";
			echo "</a>";
			echo "</li>";
		}else{
			echo "<li class='list-inline-item'>";
			echo "<a class='u-pagination-v1__item u-pagination-v1-1 u-pagination-v1__item--disabled g-pa-6-8' href='#!' aria-label='PREV'>";
			echo "<span aria-hidden='true'>";
			echo "<i class='fa fa-angle-left g-mr-5 g-ml-5'></i>";
			echo "</span>";
			echo "</a>";
			echo "</li>";
		}
		  
		//[1] [2] [3], ... : 각 페이지를 표시한다. 
		for ($page_link=$first+1;$page_link<=$last;$page_link++) { 
			if($page_link==$pageNo) { 
				echo "<li class='list-inline-item g-hidden-sm-down'>";
				echo "<a class='u-pagination-v1__item u-pagination-v1-1 u-pagination-v1-1--active g-pa-5-10' href='#!'>".$page_link."</a>";
				echo "</li>";
			}else{ 
				echo "<li class='list-inline-item g-hidden-sm-down'>";
				echo "<a class='u-pagination-v1__item u-pagination-v1-1 g-pa-5-10' href='".$page."?pageNo=$page_link&search=$search&cate=$cate&type=$type'>".$page_link."</a>";
				echo "</li>";
			} 
		} 
		  
		//[▶] : 다음 페이지로 이동한다. 
		if($total_page > $pageNo) { 
		$go_page=$pageNo+1; 
			echo "<li class='list-inline-item'>";
			echo "<a class='u-pagination-v1__item u-pagination-v1-1 g-pa-6-8' href='".$page."?pageNo=$go_page&search=$search&cate=$cate' aria-label='NEXT'>";
			echo "<span aria-hidden='true'>";
			echo "<i class='fa fa-angle-right g-ml-5 g-mr-5'></i>";
			echo "</span>";
			echo "</a>";
			echo "</li>";
			echo "<li class='list-inline-item'>";
			echo "<a class='u-pagination-v1__item u-pagination-v1-1 g-pa-6-8' href='".$page."?pageNo=$total_page&search=$search&cate=$cate' aria-label='NEXT'>";
			echo "<span aria-hidden='true'>";
			echo "<i class='fa fa-angle-double-right g-ml-5 g-mr-5'></i>";
			echo "</span>";
			echo "</a>";
			echo "</li>";
		}else{
			echo "<li class='list-inline-item'>";
			echo "<a class='u-pagination-v1__item u-pagination-v1-1 u-pagination-v1__item--disabled g-pa-6-8' href='#!' aria-label='NEXT'>";
			echo "<span aria-hidden='true'>";
			echo "<i class='fa fa-angle-right g-ml-5 g-mr-5'></i>";
			echo "</span>";
			echo "</a>";
			echo "</li>";

		}


		  
		// MySQL 데이터베이스 연결을 닫음 
		//mysqli_close($conn); 
		?>

	  </ul>
	</nav>
	<!-- Pagination #07 -->
  </div>
</div>
