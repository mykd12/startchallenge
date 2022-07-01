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
	$search = $_GET['search'];
	include_once "../inc/dbconfig.php";
	$where = " MET_DELETE_DATE IS NULL ";
	if($search){
		$where .= " AND (MET_ID LIKE '%".$search."%' OR MET_NAME LIKE '%".$search."%' OR MET_NIC LIKE '%".$search."%' OR MET_TEL LIKE '%".$search."%' OR MET_EMAIL LIKE '%".$search."%' OR MET_ADDR1 LIKE '%".$search."%' OR MET_ADDR2 LIKE '%".$search."%') ";
	}
	$sql = "SELECT * FROM MEM_TB WHERE ".$where." ORDER BY MET_IDX DESC ";
	$result = mysqli_query($conn,$sql);
	$cnt = mysqli_num_rows($result);
?>
<?
header( "Content-type: application/vnd.ms-excel;charset=UTF-8");
header( "Expires: 0" );
header( "Cache-Control: must-revalidate, post-check=0,pre-check=0" );
header( "Pragma: public" );
if($search){
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_회원리스트(".$search.").xls" );
}else{
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_회원리스트.xls" );
}

echo "
	<table border='1' style='width:800px' >
		<tr>
			<td colspan='14' >
				<h4 style='text-align:center;'>회원 리스트</h4>
			</td>
		</tr>
		<tr>
			<td>NO</td>
			<td>아이디</td>
			<td>이름</td>
			<td>닉네임</td>
			<td>연락처</td>
			<td>이메일</td>
			<td>생년월일</td>
			<td>성별</td>
			<td>주소</td>
			<td>블로그</td>
			<td>인스타그램</td>
			<td>기타URL</td>
			<td>보유포인트</td>
			<td>생성일</td>
		</tr>
";
$i=1;
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".stripslashes($row['MET_ID'])."</td>";
		echo "<td>".stripslashes($row['MET_NAME'])."</td>";
		echo "<td>".stripslashes($row['MET_NIC'])."</td>";
		echo "<td>".stripslashes($row['MET_TEL'])."</td>";
		echo "<td>".stripslashes($row['MET_EMAIL'])."</td>";
		echo "<td>".stripslashes($row['MET_BIRTH'])."</td>";
		echo "<td>".stripslashes($row['MET_GENDER'])."</td>";
		echo "<td>".stripslashes($row['MET_ADDR1'])." ".stripslashes($row['MET_ADDR2'])."</td>";
		echo "<td>".stripslashes($row['MET_BLOG'])."</td>";
		echo "<td>".stripslashes($row['MET_INSTAGRAM'])."</td>";
		echo "<td>".stripslashes($row['MET_ETC_URL'])."</td>";
		echo "<td>".stripslashes($row['MET_POINT'])."</td>";
		echo "<td>".stripslashes($row['MET_REG_DATE'])."</td>";
		echo "</tr>";
	$i++;}
echo "
	</table>
	";
die;
?>
	</body>
	</html>