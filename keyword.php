<?
if($_GET['search']){
  $search = $_GET['search'];
}else if($_POST['search']){
  $search = $_POST['search'];
}else{
  $search = $search;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>키워드 검색</title>
<!-- Favicon -->
<meta name="description" content="키워드 검색">
<meta property="og:title" content="스타트체험단">
<meta property="og:type" content="website">
<meta property="og:description" content="키워드 검색">

<!-- bootstrap css -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- webicon css -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">


<!-- custom css -->
<link href="css/reset.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link href="css/common.css" rel="stylesheet">
<link href="css/layout.css" rel="stylesheet">
<link href="css/kakao.css" rel="stylesheet">
<link rel="stylesheet" href="plugin/CSS-Circle-Menu-master/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<style media="screen">

</style>
<body>

<!-- PLUGIN-FULLPAGE -->
<link rel="stylesheet" type="text/css" href="plugin/fullpage/fullpage.css" />
<link rel="stylesheet" type="text/css" href="css/sub.css" />
<style type="text/css">
h2{line-height:1.5; font-size:40px; font-weight: 800; color:#00658e;}
.search_box{width:100%; text-align:center; }
.inner_search_box{padding: 20px; }
.inner_search_box div:nth-of-type(2){margin-top:20px;}
input:nth-child(1){width: 50%; height: 50px; border: 2px solid #00658e; padding:0 15px;}
input:nth-child(2){padding: 15px; background:#00658e; color:#fff; font-size: 18px; margin-left:-2px; border:none; vertical-align:bottom;}
.table_box.active{display: block;}
.table_box{max-width:1280px; margin:0 auto; padding:9px; margin-bottom:100px;}
.table{width:100%; max-width:100%; margin-bottom:20px; border: 1px solid #aaa; text-align:center; background:#fff;}
.table th{height: 50px; border: 1px solid #aaa; background:#dde5e8; text-align:center; vertical-align: middle !important;}
.table tr:nth-of-type(even){background:#f0f6f8;}
.table td{height: 40px; border-left: 1px solid #aaa;  border-right: 1px solid #aaa; }
@media screen and (max-width: 375px){
    body{background:url(img/sub/view/view_bg.png) no-repeat bottom/100%;}
    .inner_search_box{padding-top:20%; }
    input:nth-child(1){width: 70%;}
}
</style>
<?$search=preg_replace("/\s+/","",$_GET['search']); ?>


<div class=search_box>
    <div class=inner_search_box>
        <div>
            <h2>키워드 조회</h2>
            <p>검색된 키워드의 데이터는 N사 기준 데이터입니다.</p>
        </div>
        <div>
            <form action='keyword.php' method='get' name='frm' id='frm' >
            <input type='text' name='search' id='search' value='<?=$search?>'/>
            <input type='submit' value='검색' class="search_button"/>
            </form>
        </div>
    </div>
</div>
<?
	function parsing_data($url, $data) {
    $agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36';
    $curlsession = curl_init ();
    curl_setopt ($curlsession, CURLOPT_URL, $url); // 파싱 주소 url
    //curl_setopt ($curlsession, CURLOPT_SSL_VERIFYPEER, FALSE); // 인증서 체크같은데 true 시 안되는 경우가 많다.
    //curl_setopt ($curlsession, CURLOPT_SSLVERSION,3); // SSL 버젼 (https 접속시에 필요)
    curl_setopt ($curlsession, CURLOPT_HEADER, 0);
    curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($curlsession, CURLOPT_POST, 0); // POST = 1, GET = 0
    curl_setopt ($curlsession, CURLOPT_POSTFIELDS, "".$data.""); // POST 일경우 data 값을 받아 넣을수 ㅆ다.이
    curl_setopt ($curlsession, CURLOPT_USERAGENT, $agent);
    curl_setopt ($curlsession, CURLOPT_REFERER, "http://surffing.net/getSearchAPI.do?keyword=".$search.""); // 일부 사이트의 경우 referer 을 확인할 수 있다.
    curl_setopt ($curlsession, CURLOPT_TIMEOUT, 120); // 해당 웹사이트가 오래걸릴수 있으므로 2분동안 타임아웃 대기
    $buffer = curl_exec ($curlsession);
    $cinfo = curl_getinfo($curlsession);
    curl_close($curlsession);

    if ($cinfo['http_code'] != 200){
        return $cinfo['http_code'];
    }

    return $buffer;
}

$content = parsing_data("http://surffing.net/getSearchAPI.do?keyword=".$search."", "");

?>
<div class='table_box' <?if(!$search){ echo "style='display:none;'"; }?> >
<?

if($content != 500){
	echo $content;

}else{
 echo "<p style='text-align:center; font-size:22px; color:#555;font-weight:900'>조회량이 없습니다.</p>";
}

?>
</div>

<script>
	$(".table").eq(0).css("display", "none");
</script>
<script>
$(".search_button").click(function(){
    $(".table_box").addClass("active");
});
</script>
