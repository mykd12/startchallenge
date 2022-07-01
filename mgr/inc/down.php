<? 
//------------------------------------------------------ 
// download.php로 저장 
//------------------------------------------------------ 

$_ServerFileName=$_GET['sn'];	// 서버에 저장된 파일 이름 
$_RealSaveFileName=$_GET['on'];	// 실제 사용자가 저장한 파일이름 & 사용자가 저장할 파일 이름 

$_DataDir = "../../uploads/"; 
$_FilePath =  $_DataDir.$_ServerFileName; 

$filename = "서버상에 업로드 된 파일명"; 
$reail_filename = urldecode($_RealSaveFileName); 
$file_dir = $_DataDir."/".$_ServerFileName; 

if (is_file($_FilePath)) 
{ 


header('Content-Type: application/x-octetstream');
header('Content-Length: '.filesize($file_dir));
header('Content-Disposition: attachment; filename='.$reail_filename);
header('Content-Transfer-Encoding: binary');

$fp = fopen($file_dir, "r");
fpassthru($fp);
fclose($fp);

}else{ 
  echo "해당 파일이나 경로가 존재하지 않습니다."; 
  exit; 
} 
?>
