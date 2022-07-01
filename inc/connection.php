<?
	$db_host = "localhost"; 
	$db_user = "denoblog"; 
	$db_passwd = "tjdcks11";
	$db_name = "denoblog"; 
	$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

	if (mysqli_connect_errno($conn)) {
		echo "데이터베이스 연결 실패: " . mysqli_connect_error();
	} else {
		//echo "성공~!!!";
	}

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet  
			$VST_IP=$_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy  
			$VST_IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
			$VST_IP=$_SERVER['REMOTE_ADDR'];
	}

	$date = date("Y-m-d");
	$dateTime = date("Y-m-d H:i:s");

	$sql = "SELECT * FROM VISIT_TB WHERE VST_IP='".$VST_IP."' AND VST_DATE='".$date."' AND VST_DELETE_DATE IS NULL ORDER BY VST_IDX DESC";
	$result = mysqli_query($conn,$sql);
	$cnt = mysqli_num_rows($result);

	if($cnt == 0){
		$sql_visit = "INSERT INTO VISIT_TB (VST_IP, VST_DATE, VST_REG_DATE)VALUES('".$VST_IP."','".$date."','".$dateTime."')";
		$result_visit = mysqli_query($conn,$sql_visit);
	}
	
?>
