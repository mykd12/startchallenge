<!DOCTYPE html>
<html lang="ko">

<head>
  <?php include("inc/head.php"); ?>
	<?
		if($_POST['MET_NAVER']){
			$MET_NAVER = $_POST['MET_NAVER'];
		}else if($_GET['mb_uid']){
			$MET_NAVER = $_GET['mb_uid'];
		}

		if($_POST['MET_NAME']){
			$MET_NAME = $_POST['MET_NAME'];
		}else if($_GET['mb_name']){
			$MET_NAME = $_GET['mb_name'];
		}

		if($_POST['MET_EMAIL']){
			$MET_EMAIL = $_POST['MET_EMAIL'];
		}else if($_GET['mb_email']){
			$MET_EMAIL = $_GET['mb_email'];
		}
	?>
  <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
  <script src="js/login.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript">
	<!--
		$(document).ready(function () {
				var MET_NAVER = "<?=$MET_NAVER?>";
				join(MET_NAVER);
		});
	//-->
	</script>
	<?
	if($_SESSION['LOGIN_IDX']){
		echo "<script>alert('정상적이지 않은 접근입니다.');history.go(-1)</script>";
		exit;
	}
	/*define('NAVER_CLIENT_ID', 'hmL9HScQeEXVQSMRbeA8');
	define('NAVER_CLIENT_SECRET', 't3uoIgplvH');
	define('NAVER_CALLBACK_URL', 'http://startchallenge.co.kr/Joincallback.php');

	// 네이버 로그인 접근토큰 요청 예제
	$naver_state = md5(microtime() . mt_rand());
	$_SESSION['naver_state'] = $naver_state;
	$naver_apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".NAVER_CLIENT_ID."&redirect_uri=".urlencode(NAVER_CALLBACK_URL)."&state=".$naver_state;*/
	$client_id = "hmL9HScQeEXVQSMRbeA8";
  $redirectURI = urlencode("http://startchallenge.co.kr/Joincallback.php");
  $state = md5(date("Y-m-d H:i:s"));
  $naver_apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".$client_id."&redirect_uri=".$redirectURI."&state=".$state;
	?>
</head>

<body>
  <div id="wapper">
    <div id="container">
      <div class="contents join">
        <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1>
        <div class="join_step">
          <div class="box on">
            <p class="num">01</p>
            <p class="text">정보입력</p>
          </div>
          <div class="box">
            <p class="num">02</p>
            <p class="text">관심분야선택</p>
          </div>
          <div class="box">
            <p class="num">03</p>
            <p class="text">지역선택</p>
          </div>
          <div class="box">
            <p class="num">04</p>
            <p class="text">가입완료</p>
          </div>
        </div>
        <div class="form_wrap">
          <form id="join_form" method="post" action="join_step2.php" onsubmit="return submit_ck();">
					<input type="hidden" name="id_ck" id="id_ck" value=""/>
					<input type="hidden" name="nic_ck" id="nic_ck" value=""/>
						<input type="hidden" name="MET_NAVER" id="MET_NAVER" value="<?=$MET_NAVER?>"/>
            <div class="id_box int_box">
              <label for="MET_ID" id="label_id" class="lbl"><i class="xi-profile-o"></i> 아이디</label>
              <input type="text" id="MET_ID" name="MET_ID" autocomplete="off" placeholder="" class="int" maxlength="50"
                value="">
              <a href="javascript:id_ck();" class="btn_overlap">중복확인</a>
            </div>
            <div class="nick_box int_box">
              <label for="MET_NIC" id="label_id" class="lb2"><i class="xi-emoticon-happy-o"></i> 닉네임</label>
              <input type="text" id="MET_NIC" name="MET_NIC" autocomplete="off" placeholder="" class="int" maxlength="10"
                value="">
              <a href="javascript:nic_ck();" class="btn_overlap">중복확인</a>
            </div>
						<div class="pw_box int_box">
              <label for="MET_NAME" id="label_name" class="lb3"><i class="xi-emoticon-smiley-o"></i> 이름</label>
              <input type="text" id="MET_NAME" name="MET_NAME" placeholder="" class="int" maxlength="41" value="<?=$MET_NAME?>" autocomplete="off" <?if($MET_NAME){ echo "readonly"; }?>>
            </div>
						<div class="pw_box int_box">
              <label for="MET_EMAIL" id="label_email" class="lb4"><i class="xi-mail-o"></i> 이메일</label>
              <input type="text" id="MET_EMAIL" name="MET_EMAIL" placeholder="" class="int" maxlength="41" value="<?=$MET_EMAIL?>" autocomplete="off" <?if($MET_EMAIL){ echo "readonly"; }?>>
            </div>
						<div class="pw_box int_box">
              <label for="MET_TEL" id="label_email" class="lb4"><i class="xi-call"></i> 연락처</label>
              <input type="text" id="MET_TEL" name="MET_TEL" placeholder="" class="int" maxlength="41" value="" autocomplete="off">
            </div>
            <div class="pw_box int_box">
              <label for="MET_PW1" id="label_pw1" class="lb5"><i class="xi-key"></i> 비밀번호</label>
              <input type="PASSWORD" id="MET_PW1" name="MET_PW1" placeholder="" class="int" maxlength="41" value="" autocomplete="off">
            </div>
            <div class="pw_box int_box">
              <label for="MET_PW2" id="label_pw2" class="lb6">비밀번호 확인</label>
              <input type="PASSWORD" id="MET_PW2" name="passwordConfirmd" placeholder="" class="int" maxlength="41" value="" autocomplete="off">
            </div>
            <input type="submit" title="다음가입단계로" alt="다음가입단계로" value="다음 단계로" class="btn_check btn_next">

            <!--<input type="" name="agree1" value="<?=$_POST['agree1']?>">
            <input type="" name="agree2" value="<?=$_POST['agree2']?>">
            <input type="" name="agree3" value="<?=$_POST['agree3']?>">
            <input type="hidden" name="id_checked" id="id_checked" value="not_checked">-->
          </form>
        </div>
        <!--<a href="<?=$naver_apiURL;?>" class="btn_naverJoin"><img src="icon/naver.png" alt="네이버아이콘"> 네이버 아이디로 회원가입</a>-->
        <div class="footer">
          <p class="">(c)2020스타트체험단.All Righrs Reserved.</p>
          <ul>
					<li><a href="javascript:void(0);">회사소개</a></li>
            <li><a href="#jo1" rel="modal:open" class="btn_mo">이용약관</a></li>
            <li><a href="#jo2" rel="modal:open" class="btn_mo">개인정보처리방침</a></li>
            <li><a href="#jo3" rel="modal:open" class="btn_mo">이메일무단수집거부</a></li>
            <li><a href="partner_write.php">광고/제휴문의</a></li>
          </ul>
        </div>
        <div class="error_wrap">
          <div class="error error_em1"><i class="xi-warning"></i>이메일을 입력해주세요!</div>
          <div class="error error_em2"><i class="xi-warning"></i>이메일형식에 맞게 입력해주세요!</div>
          <div class="error error_id1"><i class="xi-warning"></i>아이디를 입력해주세요!</div>
          <div class="error error_id2"><i class="xi-warning"></i>아이디는 영문 대소문자 또는 영문+숫자 4~12자리로 입력해야합니다.</div>
          <div class="error error_id3"><i class="xi-warning"></i>중복 아이디입니다. 다시 입력해주세요!</div>
          <div class="error error_pw1"><i class="xi-warning"></i>비밀번호를 입력해주세요!</div>
          <div class="error error_pw2"><i class="xi-warning"></i>비밀번호를 확인해주세요!</div>
          <div class="error error_pw3"><i class="xi-warning"></i>비밀번호는 영문 대소문자와 숫자 특수문자<br> 4~12자리로 입력해야합니다.</div>
          <div class="error error_pw4"><i class="xi-warning"></i>비밀번호가 일치하지 않습니다. 확인해주세요!</div>
          <div class="error error_id_pass"><i class="xi-check-circle"></i>사용가능한 아이디입니다.</div>
        </div>
      </div>
    </div>
  </div>
	<div id="jo1" class="contact_modal footer_modal" style="display: none;">
  <div class="template t1">
    <h3>이용약관</h3>
    <!-- textbox -->
    <div class="text_box box1">
      <h4>[제1장 총칙]</h4><br>
      <h5>제1조 (목적)</h5>
      <p>
        본 약관은 (주) 디노랩스(이하 “회사”라 함)가 제공하는 스타트체험단(startchallenge.co.kr)(이하 "서비스"라 한다)를 이용함에 있어
        이용자의 권리·의무 및 책임사항을 규정함으로써 고객의 권익을 보호함을 목적으로 합니다.<br><br>
      </p>
      <h5>제2조 (정의)</h5>
      <ul>
        <li>① 신규업체정보란 신규업체정보가 재화 또는 용역을 이용자에게 제공하기 위하여 컴퓨터등 정보통신설비를 이용하여 재화 또는 용역을 거래할 수 있도록 설정한
          가상의 영업장을 말하며, 아울러 사이버몰을 운영하는 사업자의 의미로도 사용합니다.</li>
        <li>② 이용자란 신규업체정보에 접속하여 이 약관에 따라 신규업체정보가 제공하는 서비스를 받는 회원 및 비회원을 말합니다.</li>
        <li>③ 회원이라 함은 신규업체정보에 개인정보를 제공하여 회원등록을 한 자로서, 신규업체 정보의 정보를 지속적으로 제공받으며,
          신규업체정보에서 제공하는 서비스를 계속적으로 이용할 수 있는 자를 말합니다.</li>
        <li>④ 비회원이라 함은 회원에 가입하지 않고 신규업체정보가 제공하는 서비스를 이용하는 자를 말합니다.<br><br></li>
      </ul>
      <h5>제3조 (약관의 명시와 개정)</h5>
      <ul>
        <li>① 신규업체정보는 이 약관의 내용과 상호, 영업소 소재지, 대표자의 성명, 사업자등록번호, 연락처(전화, 팩스, 전자우편 주소 등) 등을 이용자가 알 수 있도록
          신규업체정보 인터넷 서비스 초기페이지에 게시합니다.</li>
        <li>② 신규업체정보는 약관의 규제등에 관한 법률, 전자거래기본법, 전자서명법, 정보통신망 이용촉진등에관한법률, 방문판매등에관한법률, 소비자보호법 등
          관련법을 위배하지 않는 범위에서 이 약관을 개정할 수 있습니다.</li>
        <li>③ 신규업체정보는 약관을 개정할 경우에는 적용일자 및 개정사유를 명시하여 현행약관과 함께 신규업체정보의 초기화면에 그 적용일자 7일 이전부터 적용일자 전일까지 공지합니다.</li>
        <li>④ 신규업체정보는 약관을 개정할 경우에는 그 개정약관은 그 적용일자 이후에 체결되는 계약에만 적용되고 그 이전에 이미 체결된 계약에 대해서는 개정전의 약관조항이 그대로 적용됩니다.</li>
        다만 신규업체정보의 "이용자가 상당한 기간 내에 변경 약관에 대한 동의 여부를 표명하지 아니하는 때에는 변경약관의 적용을 받는 것으로 본다"는
        취지의 통지를 하였음에도 이용고객이 동의 여부를 표명하지 아니한 경우 또는 부득이하게 그러한 통지를 할 수 없는 경우에는 개정 전에 체결된 계약에도 개정약관이 적용됩니다.</li>
        <li>⑤ 이 약관에서 정하지 아니한 사항과 이 약관의 해석에 관하여는 정부가 제정한 전자거래소비자보호지침 및 관계법령 또는 상관례에 따릅니다.<br><br></li>
      </ul>
      <p>
        내용(생략)
      </p>
    </div>
    <div class="btn_close">
      <a href="#close-modal" rel="modal:close" class="close-modals"><span class="blind">닫기</span><i
          class="xi-close"></i></a>
    </div>
  </div>
</div>
<div id="jo2" class="contact_modal footer_modal" style="display: none;">
  <div class="template t1">
    <h3>개인정보취급방침</h3>
    <!-- textbox -->
    <div class="text_box box2">
      <p>
        (주) 디노랩스(이하 “회사”라 함)는 이용자들의 개인정보보호를 매우 중요시하며, 이용자가 회사의 서비스(이하 "스타트체험단")를 이용함과 동시에 온라인상에서 회사에 제공한
        개인정보가 보호 받을 수 있도록 최선을 다하고 있습니다. <br><br>
      </p>
      <p>
        이에 회사는 통신비밀보호법,전기통신사업법, 정보통신망 이용촉진 및 정보보호 등에 관한 법률 등 정보통신서비스제공자가 준수하여야 할 관련 법규상의 개인정보보호 규정 및 정보통신부가 제정한
        개인정보보호지침을 준수하고 있습니다.<br>
        회사는 개인정보 보호정책을 통하여 이용자들이 제공하는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.<br><br>
      </p>
      <p>
        회사는 개인정보 보호정책을 홈페이지 첫 화면에 공개함으로써 이용자들이 언제나 용이하게 보실 수 있도록 조치하고 있습니다.<br><br>
      </p>
      <p>
        회사의 개인정보 보호정책은 정부의 법률 및 지침 변경이나 회사의 내부 방침 변경 등으로 인하여 수시로 변경될 수 있고, 이에 따른 개인정보 보호정책의 지속적인 개선을 위하여 필요한 절차를 정하고
        있습니다.그리고 개인정보 보호정책을 개정하는 경우 회사는 개인정보 보호정책 변경 시행 7일전부터 스타트체험단 공지사항을 통하여 공지하고 버전번호 및 개정일자 등을 부여하여 개정된 사항을 이용자들이
        쉽게 알아볼 수 있도록 하고 있습니다.<br><br>
      </p>
      <p>
        스타트체험단 개인정보 보호정책은 다음과 같은 내용을 담고 있습니다.<br><br>
      </p>
      <ul>
        <li>가. 개인정보 수집에 대한 동의</li>
        <li>나. 개인정보의 수집목적 및 이용목적</li>
        <li>다. 스타트체험단이 수집하는 개인정보 항목 및 수집방법</li>
        <li>라. 스타트체험단이 수집하는 개인정보의 보유 및 이용기간</li>
        <li>마. 스타트체험단이 수집한 개인정보의 공유 및 제공</li>
        <li>바. 이용자 자신의 개인정보 관리(열람,정정,삭제 등)에 관한 사항</li>
        <li>사. 쿠키(cookie)의 운영에 관한 사항</li>
        <li>아. 개인정보관련 기술적-관리적 대책</li>
        <li>자. 개인정보의 위탁처리</li>
        <li>차. 개인정보관련 의견수렴 및 불만처리에 관한 사항</li>
        <li>카. 어린이 정보보호에 관한 사항</li>
        <li>타. 스타트체험단 개인정보 관리책임자 및 담당자의 소속-성명 및 연락처</li>
        <li>파. 네이버 고객센터 안내</li>
        <li>하. 고지의 의무<br><br> </li>
      </ul>

      <h5>가. 개인정보 수집에 대한 동의</h5>
      <p>
        회사는 이용자들이 회사의 개인정보 보호정책 또는 이용약관의 내용에 대하여 「동의」버튼 또는 「취소」 버튼을 클릭할 수 있는 절차를 마련하여, 「동의」버튼을 클릭하면 개인정보 수집에 대해 동의한
        것으로 봅니다.<br><br>
      </p>

      <h5>나. 개인정보의 수집목적 및 이용목적</h5>
      <p>
        "개인정보"라 함은 생존하는 개인에 관한 정보로서 당해 정보에 포함되어 있는 성명, 주민등록번호 등의 사항에 의하여 당해 개인을 식별할 수 있는 정보(당해 정보만으로는 특정 개인을 식별할 수
        없더라도 다른 정보와 용이하게 결합하여 식별할 수 있는 것을 포함)를 말합니다.<br>

        대부분의 스타트체험단 서비스는 별도의 사용자 등록이 없이 언제든지 사용할 수 있습니다. 그러나 회사는 회원서비스(메일, 네이버폰, 카페, 블로그, 데스크톱, 포토앨범,마이스톡 등 현재 제공 중이거나
        향후 제공될 로그인 기반의 서비스) 및 쥬니어네이버, 아크로드 등을 통하여 이용자들에게 맞춤식 서비스를 비롯한 보다 더 향상된 양질의 서비스를 제공하기 위하여 이용자 개인의 정보를 수집하고
        있습니다.<br><br>
      </p>
      <p>내용(생략)</p>
    </div>
  </div>
  <div class="btn_close">
    <a href="#close-modal" rel="modal:close" class="close-modals"><span class="blind">닫기</span><i
        class="xi-close"></i></a>
  </div>
</div>
<div id="jo3" class="contact_modal footer_modal" style="display: none;">
  <div class="template t1">
    <h3>이메일 무단 수집거부</h3>
    <!-- textbox -->
    <div class="text_box box3">
      <p>본 사이트에 게시된 이메일 주소가 전자우편 수집 프로그램이나 그 밖의 기술적 장치를 이용하여 무단으로 수집되는 것을 거부하며 이를 위반 시 정보통신망법에 의해 처벌됨을 유념하시기 바랍니다.<br><br>
불법 대응 센터 http://www.spamcop.or.kr<br><br></p>

    </div>
  </div>
  <div class="btn_close">
    <a href="#close-modal" rel="modal:close" class="close-modals"><span class="blind">닫기</span><i
        class="xi-close"></i></a>
  </div>
</div>


</body>

</html>
<script type="text/javascript">
<!--
	var idPattern = /^[A-Za-z]{1}[A-Za-z0-9]{4,12}$/;
  var nickPattern = /^[ㄱ-ㅎ가-힣A-Za-z0-9]{2,12}$/;

	function id_ck(){
		var MET_ID = $("#MET_ID").val();
		if(!MET_ID){
			alert("아이디를 입력해주세요.");
			$("#MET_ID").focus();
			return false;
		}else if(!idPattern.test(MET_ID)){
			alert("아이디는 영문 대소문자 또는 영문+숫자 4~12자리로 입력해야합니다");
      $("#MET_ID").focus();
			return false;
		}

		$.ajax({
			type: 'post' ,
			url: './inc/mainVO.php' ,
			data: { mode: "CHECKID", MET_ID: MET_ID },
			dataType : 'json' ,
			success: function(data) {
				if(data==0){
					alert("중복되는 아이디가 있습니다.");
					$("#MET_ID").focus();
					return false;
				}else{
					alert("사용가능한 아이디 입니다.");
					$("#MET_ID").attr("readonly",true);
					$("#id_ck").val("y");
					$("#MET_ID").css("background","#ccc");
				}
			}
		});
	}
	function nic_ck(){
		var MET_NIC = $("#MET_NIC").val();
		if(!MET_NIC){
			alert("닉네임을 입력해주세요.");
			$("#MET_NIC").focus();
			return false;
		}else if(!nickPattern.test(MET_NIC)){
			alert("닉네임은 특수문자를 제외한 2~8자리로 입력해야합니다");
      $("#MET_NIC").focus();
			return false;
		}

		$.ajax({
			type: 'post' ,
			url: './inc/mainVO.php' ,
			data: { mode: "CHECKNIC", MET_NIC: MET_NIC },
			dataType : 'json' ,
			success: function(data) {
				if(data==0){
					alert("중복되는 닉네임을 있습니다.");
					$("#MET_NIC").focus();
					return false;
				}else{
					alert("사용가능한 닉네임을 입니다.");
					$("#MET_NIC").attr("readonly",true);
					$("#nic_ck").val("y");
					$("#MET_NIC").css("background","#ccc");
				}
			}
		});
	}

	function autoHypenPhone(str){
			str = str.replace(/[^0-9]/g, '');
			var tmp = '';
			if( str.length < 4){
					return str;
			}else if(str.length < 7){
					tmp += str.substr(0, 3);
					tmp += '-';
					tmp += str.substr(3);
					return tmp;
			}else if(str.length < 11){
					tmp += str.substr(0, 3);
					tmp += '-';
					tmp += str.substr(3, 3);
					tmp += '-';
					tmp += str.substr(6);
					return tmp;
			}else{
					tmp += str.substr(0, 3);
					tmp += '-';
					tmp += str.substr(3, 4);
					tmp += '-';
					tmp += str.substr(7);
					return tmp;
			}
			return str;
		}

	var cellPhone = document.getElementById('MET_TEL');
	cellPhone.onkeyup = function(event){
		event = event || window.event;
		if(this.value.length > 13){
			var tel_txt = this.value.slice(0,-1);
			this.value=tel_txt;
		}
		var _val = this.value.trim();
		this.value = autoHypenPhone(_val) ;
	}
//-->
</script>
