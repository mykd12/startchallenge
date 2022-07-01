<!DOCTYPE html>
<html lang="ko">

<head>
  <?php include("inc/head.php"); ?>
  <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
  <script src="js/login.js?v=<?php echo time(); ?>"></script>
</head>
<?
if($_SESSION['LOGIN_IDX']){
	echo "<script>alert('정상적이지 않은 접근입니다.');history.go(-1)</script>";
	exit;
}
?>
	<?
	define('NAVER_CLIENT_ID', 'hmL9HScQeEXVQSMRbeA8');
	define('NAVER_CLIENT_SECRET', 't3uoIgplvH');
	define('NAVER_CALLBACK_URL', 'http://startchallenge.co.kr/Joincallback.php');

	// 네이버 로그인 접근토큰 요청 예제
	$naver_state = md5(microtime() . mt_rand());
	$_SESSION['naver_state'] = $naver_state;
	$naver_apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".NAVER_CLIENT_ID."&redirect_uri=".urlencode(NAVER_CALLBACK_URL)."&state=".$naver_state;
	?>
<body>
  <div id="wapper">
    <div id="container">
      <div class="contents agree">
        <h1 class="logo"><a href="index.php"><img src="images/logo.png" alt="logo"></a></h1>
        <div class="form_wrap">
          <form id="agree_form" method="post" action="join_step1.php" onsubmit="return submit_ck();">
            <input type="hidden" name="MET_NAME" id="MET_NAME" value="<?=$_GET['mb_name']?>" />
            <input type="hidden" name="MET_EMAIL" id="MET_EMAIL" value="<?=$_GET['mb_email']?>" />
            <input type="hidden" name="MET_NAVER" id="MET_NAVER" value="<?=$_GET['mb_uid']?>" />
            <!-- 홈페이지 이용약관 동의 -->
            <div class="agree_box">
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
                  <li>③ 신규업체정보는 약관을 개정할 경우에는 적용일자 및 개정사유를 명시하여 현행약관과 함께 신규업체정보의 초기화면에 그 적용일자 7일 이전부터 적용일자 전일까지 공지합니다.
                  </li>
                  <li>④ 신규업체정보는 약관을 개정할 경우에는 그 개정약관은 그 적용일자 이후에 체결되는 계약에만 적용되고 그 이전에 이미 체결된 계약에 대해서는 개정전의 약관조항이 그대로
                    적용됩니다.</li>
                  다만 신규업체정보의 "이용자가 상당한 기간 내에 변경 약관에 대한 동의 여부를 표명하지 아니하는 때에는 변경약관의 적용을 받는 것으로 본다"는
                  취지의 통지를 하였음에도 이용고객이 동의 여부를 표명하지 아니한 경우 또는 부득이하게 그러한 통지를 할 수 없는 경우에는 개정 전에 체결된 계약에도 개정약관이 적용됩니다.</li>
                  <li>⑤ 이 약관에서 정하지 아니한 사항과 이 약관의 해석에 관하여는 정부가 제정한 전자거래소비자보호지침 및 관계법령 또는 상관례에 따릅니다.<br><br></li>
                </ul>
                <p>
                  내용(생략)
                </p>
              </div>
              <!-- checkbox -->
              <div class="form_checkbox">
                <input type="checkbox" id="agree1" class="blind check_box" name="agree">
                <label for="agree1">이용약관에 동의합니다</label>
              </div>
            </div>
            <!-- 개인정보취급방침 -->
            <div class="agree_box">
              <h3>개인정보취급방침</h3>
              <!-- textbox -->
              <div class="text_box box2">
                <p>
                  (주) 디노랩스(이하 “회사”라 함)는 이용자들의 개인정보보호를 매우 중요시하며, 이용자가 회사의 서비스(이하 "스타트체험단")를 이용함과 동시에 온라인상에서 회사에 제공한
                  개인정보가 보호 받을 수 있도록 최선을 다하고 있습니다. <br><br>
                </p>
                <p>
                  이에 회사는 통신비밀보호법,전기통신사업법, 정보통신망 이용촉진 및 정보보호 등에 관한 법률 등 정보통신서비스제공자가 준수하여야 할 관련 법규상의 개인정보보호 규정 및 정보통신부가
                  제정한
                  개인정보보호지침을 준수하고 있습니다.<br>
                  회사는 개인정보 보호정책을 통하여 이용자들이 제공하는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.<br><br>
                </p>
                <p>
                  회사는 개인정보 보호정책을 홈페이지 첫 화면에 공개함으로써 이용자들이 언제나 용이하게 보실 수 있도록 조치하고 있습니다.<br><br>
                </p>
                <p>
                  회사의 개인정보 보호정책은 정부의 법률 및 지침 변경이나 회사의 내부 방침 변경 등으로 인하여 수시로 변경될 수 있고, 이에 따른 개인정보 보호정책의 지속적인 개선을 위하여 필요한
                  절차를 정하고
                  있습니다.그리고 개인정보 보호정책을 개정하는 경우 회사는 개인정보 보호정책 변경 시행 7일전부터 스타트체험단 공지사항을 통하여 공지하고 버전번호 및 개정일자 등을 부여하여 개정된
                  사항을 이용자들이
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
                  회사는 이용자들이 회사의 개인정보 보호정책 또는 이용약관의 내용에 대하여 「동의」버튼 또는 「취소」 버튼을 클릭할 수 있는 절차를 마련하여, 「동의」버튼을 클릭하면 개인정보 수집에
                  대해 동의한
                  것으로 봅니다.<br><br>
                </p>

                <h5>나. 개인정보의 수집목적 및 이용목적</h5>
                <p>
                  "개인정보"라 함은 생존하는 개인에 관한 정보로서 당해 정보에 포함되어 있는 성명, 주민등록번호 등의 사항에 의하여 당해 개인을 식별할 수 있는 정보(당해 정보만으로는 특정 개인을
                  식별할 수
                  없더라도 다른 정보와 용이하게 결합하여 식별할 수 있는 것을 포함)를 말합니다.<br>

                  대부분의 스타트체험단 서비스는 별도의 사용자 등록이 없이 언제든지 사용할 수 있습니다. 그러나 회사는 회원서비스(메일, 네이버폰, 카페, 블로그, 데스크톱, 포토앨범,마이스톡 등 현재
                  제공 중이거나
                  향후 제공될 로그인 기반의 서비스) 및 쥬니어네이버, 아크로드 등을 통하여 이용자들에게 맞춤식 서비스를 비롯한 보다 더 향상된 양질의 서비스를 제공하기 위하여 이용자 개인의 정보를
                  수집하고
                  있습니다.<br><br>
                </p>
                <p>내용(생략)</p>
              </div>
              <!-- checkbox -->
              <div class="form_checkbox">
                <input class="blind check_box" id="agree2" name="agree" type="checkbox">
                <label for="agree2"> 개인정보취급방침에 동의합니다</label>
              </div>
            </div>
            <!-- 개인정보 수집 및 이용동의 -->
            <div class="agree_box">
              <h3>개인정보 수집 및 이용</h3>
              <!-- textbox -->
              <div class="text_box box2">
                <p class="p3"><span class="s1">(주)디노롭스는 서비스 제공을 위해서 아래와 같이 개인정보를 수집합니다. 서비스 제공에 필요한 최소한의 개인정보이므로 동의를
                    해주셔야
                    서비스를 이용하실수 있습니다.</span></p>
                <p class="p2"><span class="s1"></span><br>
                </p>
                <p class="p3"><span class="s1">&nbsp;• 수집 및 이용 목적 : 이용자 식별 및 연령확인, 고지사항 전달, 서비스 이용 및 상담</span></p>
                <p class="p3"><span class="s1">&nbsp;• 보유 및 이용기간 : <strong><u>서비스 탈퇴 시</u></strong> 즉시 파기 또는
                    <strong><u>법령에 따른 보존기간</u></strong> 까지(단, 서비스 부정이용 예방 및 분쟁해결을 위해 탈퇴한 이용자의 이메일 주소를 암호화하여
                    <strong><u>5년간</u></strong> 보관합니다.)</span></p>
                <p class="p3"><span class="s1">&nbsp;• 수집∙이용항목 : 이름, 이메일 주소, 비밀번호, 휴대전화번호, 프로필 정보</span></p>
                <p class="p3"><span class="s1">&nbsp;</span></p>
              </div>
              <!-- checkbox -->
              <div class="form_checkbox">
                <input class="blind check_box" id="agree3" name="agree" type="checkbox">
                <label for="agree3"> 개인정보 수집 및 이용에 동의합니다</label>
              </div>
            </div>
            <!--전체 동의 -->
            <div class="all_agree">
              <input type="checkbox" id="agreeAll" class="blind check_box" name="agreeAll">
              <label for="agreeAll"> 모두 동의합니다.</label>
            </div>
            <input type="submit" title="다음가입단계로" alt="다음가입단계로" value="다음 단계로" class="btn_next" id="">
            <a href="<?=$naver_apiURL;?>" class="btn_naverLogin"><img src="icon/naver.png" alt="네이버아이콘"> 네이버 계정으로 회원가입</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
$("input:checkbox[name='agreeAll']").change(function(){
  if ($("input:checkbox[name='agreeAll']").prop('checked')){
    $('.btn_next').addClass('on')
  } else {
    $('.btn_next').removeClass('on')
  } 
}); 

function submit_ck() {
  if (!$("#agree1").is(":checked")) {
    alert("이용약관에 동의를 해주셔야 합니다.");
    $("#agree1").focus();
    return false;
  } else if (!$("#agree2").is(":checked")) {
    alert("개인정보취급방침 동의를 해주셔야 합니다.");
    $("#agree2").focus();
    return false;
  } else if (!$("#agree3").is(":checked")) {
    alert("개인정보 수집 및 이용 동의를 해주셔야합니다.");
    $("#agree3").focus();
    return false;
  } else {
    return true;
  }
}
</script>