<?header("Content-Type:text/html;charset=utf-8"); ?>
<html>
<head>
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/jquery.battatech.excelexport.js"></script>
<style>
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }
        table{
            width: 1050px;
            text-align: center;
            border: 1px solid black;
        }
    </style>
</head>
<body>
<?
	$CPT_IDX = $_GET['CPT_IDX'];
	$mode = $_GET['mode'];
	include_once "../inc/dbconfig.php";
	$where = " CPT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ";
	$sql = "SELECT * FROM CAMPAIGN_TB WHERE ".$where." ORDER BY CPT_IDX DESC ";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$cnt = mysqli_num_rows($result);
	$CPT_TITLE = stripslashes($row['CPT_TITLE']);
	$CPT_TITLE = str_replace(",", " ", $CPT_TITLE);

	$sql_app = "SELECT * FROM CAMPAIGN_APP_TB WHERE CAT_DELETE_DATE IS NULL AND CPT_IDX='".$CPT_IDX."' ORDER BY CAT_SELECTION='y' DESC, CAT_IDX DESC ";
	$result_app = mysqli_query($conn,$sql_app);

	
?>
<?

header( "Content-type: application/vnd.ms-excel;charset=UTF-8");
header( "Expires: 0" );
header( "Cache-Control: must-revalidate, post-check=0,pre-check=0" );
header( "Pragma: public" );

header( "Content-Disposition: attachment; filename=".date('Ymd')."_신청리스트(".$CPT_TITLE.").xls" );

if($row['CPT_CATE2']=='제품' || $row['CPT_CATE2']=='배달'){
	echo "
		<table border='1' style='width:800px' >
			<tr>
				<td colspan='18' >
					<h4 style='text-align:center;'>[".$CPT_TITLE."] 신청자 리스트</h4>
				</td>
			</tr>
			<tr>
				<td>NO</td>
				<td>신청날짜</td>
				<td>채널</td>
				<td>닉네임</td>
				<td>이름</td>
				<td>연락처</td>
				<td>채널 URL</td>
				<td>카메라</td>
				<td>배송주소</td>
				<td>신청한마디</td>
				<td>".date("Y-m-d", strtotime("-4 day"))."</td>
				<td>".date("Y-m-d", strtotime("-3 day"))."</td>
				<td>".date("Y-m-d", strtotime("-2 day"))."</td>
				<td>".date("Y-m-d", strtotime("-1 day"))."</td>
				<td>".date("Y-m-d")."</td>
				<td>은행</td>
				<td>계좌번호</td>
				<td>예금주</td>
			</tr>
	";
	$i=1;
	while($row_app = mysqli_fetch_array($result_app)){
		if(strpos($row_app['CAT_URL'], "PostList.nhn?blogId") !== false) {  
			$CAT_URL=explode("=", $row_app['CAT_URL']);
			$blog_url = $CAT_URL[1];	
		}else if(strpos($row_app['CAT_URL'], "blog.naver.com") !== false) {  
			$CAT_URL=explode("/", $row_app['CAT_URL']);
			$blog_url = $CAT_URL[3];	
		}else if(strpos($row_app['CAT_URL'], "blog.me") !== false) {  
			$CAT_URL=explode("/", $row_app['CAT_URL']);
			$CAT_URL=explode(".", $CAT_URL[2]);
			$blog_url = $CAT_URL[0];	
		}

		$xml = file_get_contents("http://blog.naver.com/NVisitorgp4Ajax.nhn?blogId=".$blog_url);
		$object = simplexml_load_string($xml);
		$cnt_visit = COUNT($object->visitorcnt);

		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_IDX='".$row_app['MET_IDX']."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);

		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".stripslashes($row_app['CAT_REG_DATE'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_CHANNEL'])."</td>";
		echo "<td>".stripslashes($row_mem['MET_NIC'])."</td>";
		if($row_mem['MET_BLACK']){
			echo "<td style='color:#ff0000;'>".stripslashes($row_app['CAT_NAME'])."</td>";
		}else{
			echo "<td>".stripslashes($row_app['CAT_NAME'])."</td>";
		}
		echo "<td>".stripslashes($row_app['CAT_TEL'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_URL'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_CAMERA'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_ADDR1'])." ".stripslashes($row_app['CAT_ADDR2'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_COMMENT'])."</td>";

			for($j=0; $j < $cnt_visit; $j++){
				echo "<td>";
				echo $object->visitorcnt[$j]["cnt"];
				echo "</td>";
			}
		echo "<td>".stripslashes($row_app['CAT_BANK_NAME'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_BANK_NUMBER'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_BANK_USER'])."</td>";
		echo "</tr>";
	$i++;}
}else{
	echo "
	<table border='1' style='width:800px' >
		<tr>
			<td colspan='14' >
				<h4 style='text-align:center;'>[".$CPT_TITLE."] 신청자 리스트</h4>
			</td>
		</tr>
		<tr>
				<td>NO</td>
				<td>신청날짜</td>
				<td>채널</td>
				<td>닉네임</td>
				<td>이름</td>
				<td>연락처</td>
				<td>채널 URL</td>
				<td>카메라</td>
				<td>신청한마디</td>
				<td>".date("Y-m-d", strtotime("-4 day"))."</td>
				<td>".date("Y-m-d", strtotime("-3 day"))."</td>
				<td>".date("Y-m-d", strtotime("-2 day"))."</td>
				<td>".date("Y-m-d", strtotime("-1 day"))."</td>
				<td>".date("Y-m-d")."</td>
			</tr>
";
$i=1;
	while($row_app = mysqli_fetch_array($result_app)){
		if(strpos($row_app['CAT_URL'], "PostList.nhn?blogId") !== false) {  
			$CAT_URL=explode("=", $row_app['CAT_URL']);
			$blog_url = $CAT_URL[1];	
		}else if(strpos($row_app['CAT_URL'], "blog.naver.com") !== false) {  
			$CAT_URL=explode("/", $row_app['CAT_URL']);
			$blog_url = $CAT_URL[3];	
		}else if(strpos($row_app['CAT_URL'], "blog.me") !== false) {  
			$CAT_URL=explode("/", $row_app['CAT_URL']);
			$CAT_URL=explode(".", $CAT_URL[2]);
			$blog_url = $CAT_URL[0];	
		}

		$xml = file_get_contents("http://blog.naver.com/NVisitorgp4Ajax.nhn?blogId=".$blog_url);
		$object = simplexml_load_string($xml);
		$cnt_visit = COUNT($object->visitorcnt);

		$sql_mem = "SELECT * FROM MEM_TB WHERE MET_IDX='".$row_app['MET_IDX']."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC";
		$result_mem = mysqli_query($conn,$sql_mem);
		$row_mem = mysqli_fetch_array($result_mem);

		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".stripslashes($row_app['CAT_REG_DATE'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_CHANNEL'])."</td>";
		echo "<td>".stripslashes($row_mem['MET_NIC'])."</td>";
		if($row_mem['MET_BLACK']){
			echo "<td style='color:#ff0000;'>".stripslashes($row_app['CAT_NAME'])."</td>";
		}else{
			echo "<td>".stripslashes($row_app['CAT_NAME'])."</td>";
		}
		echo "<td>".stripslashes($row_app['CAT_TEL'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_URL'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_CAMERA'])."</td>";
		echo "<td>".stripslashes($row_app['CAT_COMMENT'])."</td>";
		for($j=0; $j < $cnt_visit; $j++){
				echo "<td>";
				echo $object->visitorcnt[$j]["cnt"];
				echo "</td>";
			}
		echo "</tr>";
	$i++;}
}
echo "
	</table>
	";
die;
?>
	</body>
	</html>