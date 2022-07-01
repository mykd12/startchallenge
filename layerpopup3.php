
<?
$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";
	
	/*if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
		$pop_width = "auto";
		$pop_top = "550";
		$pop_left = "0";
		$pop_height = "auto";
	}else{
		$pop_top = "160";
		$pop_left = "600";		
		$pop_Maxwidth = "500px";
	}*/
	if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
		$pop_width = "auto";
		$pop_top = "150";
		$pop_left = "0";
		$pop_height = "auto";
	}else{
		$pop_top = "160";
		$pop_left = "50";		
		$pop_Maxwidth = "500px";
	}
	
	$pop_idx = "2";
?>
<style type="text/css">
	.popup_div<?=$pop_idx?>{width: <?=$pop_width?>px; height: <?=$pop_height?>; position:absolute; z-index:11; left: <?=$pop_left?>px; top: <?=$pop_top?>px !important; max-width:<?=$pop_Maxwidth?>}
	.layerpopup .content{background-color:transparent;}
	#_hidden_layer_<?=$pop_idx?>{display:none;}
	
	.layerpopup {
			position: absolute;
			z-index: 30;
			background-color: rgba(136,95,201,0.4);
			border: 1px solid rgba(0,0,0,0.15);
			box-shadow: 1px 1px 1px rgb(0 0 0 / 10%);
	}
@media screen and (max-width: 850px) { 
		.layerpopup{width:60%; top: 60px;left: 50%; transform: translateX(-50%);}
	}
    .layerpopup .content img{
        width:100%
    }
.layerpopup .layerpopup-container {
    margin: 0 auto;
    width: 90%;
}
.layerpopup .layerpopup-upper {
    padding-top: .75rem;
    padding-bottom: .75rem;
    height: 50px;
    text-align: right;
}
.layerpopup .layerpopup-upper a {
    font-size: 1.875rem;
    color: #fff;
    line-height: 1;
    display: inline-block;
}
.layerpopup .content {
    width: 100%;
    font-size: 0;
    background-color: #fff;
    overflow: hidden;
		background-color: transparent;
}

.layerpopup .layerpopup-lower {
    position: relative;
    height: 50px;
}
.layerpopup .layerpopup-lower label {
    font-family: "Barlow","Malgun Gothic","맑은 고딕","NotoSans",sans-serif;
    font-size: .8375rem;
    color: #fff;
    line-height: 1;
    letter-spacing: -.1rem;
		margin-left:10px;
    text-shadow: 1px 1px 1px rgb(0 0 0 / 15%);
}
@media (max-width: 640px){
    .layerpopup{
        width:80% !important;
    }
    
}

</style>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<div class="layerpopup popup_div<?=$pop_idx?>" id='_hidden_layer_<?=$pop_idx?>'>
		<div class="layerpopup-container" id="pop-layer-<?=$pop_idx?>" >
			<div class="layerpopup-upper">
				<a href="javascript:closePopup('<?=$pop_idx?>');" class="close-btn"><i class="xi-close-thin"></i></a>
			</div>
			
			<div class="content">
				<?if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){?>
					<img src="<?=$IMG?>" alt="image" style="max-width:100%; cursor: pointer;" onclick="location.href='http://startchallenge.co.kr/notice_view.php?mode=NOVIEW&NOT_IDX=8&type=&pageNo=1';">
				<?}else{?>
					<img src="<?=$IMG?>" alt="image" style="cursor: pointer;" onclick="location.href='http://startchallenge.co.kr/notice_view.php?mode=NOVIEW&NOT_IDX=8&type=&pageNo=1';">
				<?}?>
			</div>

			<div class="layerpopup-lower">
				<span><label for="CLOSE" onclick="hideLayerPopup('<?=$pop_idx?>')"><input type="checkbox" id="CLOSE" onclick="hideLayerPopup('<?=$pop_idx?>')">오늘 하루 열지 않기</label></span>
			</div>
		</div>
	</div>
	


<script type="text/javascript">
	   $("#_hidden_layer_<?=$pop_idx?>").draggable({
			containment: 'window',
			scroll: true
	   });
 </script> 
    <script type="text/javascript">
    <!--
    /*쿠키삭제*/
    function delPopupCookie(id){
        var nowcookie = getPopupCookie('popview');
        setPopupCookie('popview', '['+id+']' + nowcookie , 0);
    }
    /*쿠키세팅*/
    function setPopupCookie(name,value,expiredays) { 
        var todayDate = new Date(); 
        todayDate.setDate( todayDate.getDate() + expiredays ); 
        document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";" 
    }
    /*쿠키추출*/
    function getPopupCookie( name ){
        var nameOfCookie = name + "=";
        var x = 0;
        while ( x <= document.cookie.length ){
            var y = (x+nameOfCookie.length);
            if ( document.cookie.substring( x, y ) == nameOfCookie ) {
                if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 ) endOfCookie = document.cookie.length;
                return unescape( document.cookie.substring( y, endOfCookie ) );
            }
            x = document.cookie.indexOf( " ", x ) + 1;
            if ( x == 0 ) break;
        }
        return "";
    }
    /*객체얻기*/
    function getElm(id){
        return document.getElementById(id);
    }
    /*닫기동작*/
    function hideLayerPopup(PT_IDX) { 
        var nowcookie = getPopupCookie('popview');
            setPopupCookie('popview', '['+PT_IDX+']' + nowcookie , 1);    
			$("#_hidden_layer_"+PT_IDX).hide('fade');
    }
    /*숨기기체크*/
    if (getPopupCookie('popview').indexOf('[<?=$pop_idx?>]') == -1){
		$("#_hidden_layer_<?=$pop_idx?>").show('fade');
    }else{
		$("#_hidden_layer_<?=$pop_idx?>").hide('fade');
	}

	function closePopup(PT_IDX){
		$("#_hidden_layer_"+PT_IDX).hide('fade');
	}
    //-->
    </script>