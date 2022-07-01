<div class="paging">
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
			echo "<a href=\"".$page."?pageNo=$go_page&search=$search&cate1=$cate1&cate2=$cate2&cate3=$cate3&sort=$sort\" class=\"prev\"><i class=\"xi-angle-left\"></i><span class=\"blind\">이전</span></a>";
		}
		  
		//[1] [2] [3], ... : 각 페이지를 표시한다. 
		for ($page_link=$first+1;$page_link<=$last;$page_link++) { 
			if($page_link==$pageNo) { 
				echo "<a href=\"javascript:void(0);\" class=\"current\">".$page_link."</a>";
			}else{ 
				echo "<a href=\"".$page."?pageNo=$page_link&search=$search&cate1=$cate1&cate2=$cate2&cate3=$cate3&sort=$sort\">".$page_link."</a>";
			} 
		} 
		  
		//[▶] : 다음 페이지로 이동한다. 
		if($total_page > $pageNo) { 
		$go_page=$pageNo+1; 
			echo "<a href=\"".$page."?pageNo=$go_page&search=$search&cate1=$cate1&cate2=$cate2&cate3=$cate3&sort=$sort\" class=\"next\"><i class=\"xi-angle-right\"></i><span class=\"blind\">다음</span></a>";
		}

		// MySQL 데이터베이스 연결을 닫음 
		//mysqli_close($conn); 
		?>

	</ul>
	</nav>
	<!-- Pagination #07 -->
</div>
