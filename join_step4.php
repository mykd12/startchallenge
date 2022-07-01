<!DOCTYPE html>
<html lang="ko">
<?
	$MET_AREA = $_POST['MET_AREA'];
	$AREA_CNT = COUNT($MET_AREA);
	$AREA="";
	for($i=0; $i < $AREA_CNT; $i++){
		if($i==0){
			$AREA .= $MET_AREA[$i];
		}else{
			$AREA .= "|".$MET_AREA[$i];
		}
	}
?>

<head>
  <?php include("inc/head.php"); ?>
  <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
  <script src="js/login.js?v=<?php echo time(); ?>"></script>
  <?
	if($_SESSION['LOGIN_IDX']){
		echo "<script>alert('정상적이지 않은 접근입니다.');history.go(-1)</script>";
		exit;
	}
	?>
</head>

<body>
  <div id="wapper">
    <div id="container">
      <div class="contents join join04">
        <h1 class="logo"><a href="index.php"> <img src="images/logo.png" alt="logo"></a></h1>
        <div class="join_step">
          <div class="box">
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
          <div class="box on">
            <p class="num">04</p>
            <p class="text">가입완료</p>
          </div>
        </div>
        <div class="form_wrap">
          <h4><i class="xi-share-alt-o"></i>스타트 체험단 유입경로<span class="red">(*선택항목)</span> </h4>
          <form id="join_form" method="post" action="./inc/mainDAO.php">
            <input type="hidden" name="mode" id="mode" value="JOIN" />
            <input type="hidden" name="MET_ID" id="MET_ID" value="<?=$_POST['MET_ID']?>" />
						<input type="hidden" name="MET_TEL" id="MET_TEL" value="<?=$_POST['MET_TEL']?>"/>
            <input type="hidden" name="MET_NIC" id="MET_NIC" value="<?=$_POST['MET_NIC']?>" />
            <input type="hidden" name="MET_NAME" id="MET_NAME" value="<?=$_POST['MET_NAME']?>" />
            <input type="hidden" name="MET_EMAIL" id="MET_EMAIL" value="<?=$_POST['MET_EMAIL']?>" />
            <input type="hidden" name="MET_PW" id="MET_PW" value="<?=$_POST['MET_PW']?>" />
            <input type="hidden" name="MET_POSTING" id="MET_POSTING" value="<?=$_POST['MET_POSTING']?>" />
            <input type="hidden" name="MET_AREA" id="MET_AREA" value="<?=$AREA?>" />
            <input type="hidden" name="MET_NAVER" id="MET_NAVER" value="<?=$_POST['MET_NAVER']?>" />
            <div class="checkbox_box">
              <input type="checkbox" name="MET_ROUTE" id="MET_ROUTE1" value="검색광고">
              <label for="MET_ROUTE1"><i class="xi-browser-text"></i><br><span>검색광고</span></label>
            </div>
            <div class="checkbox_box">
              <input type="checkbox" name="MET_ROUTE" id="MET_ROUTE2" value="블로그">
              <label for="MET_ROUTE2"><span class="sns_icon">b</span><br><span>블로그</span></label>
            </div>
            <div class="checkbox_box">
              <input type="checkbox" name="MET_ROUTE" id="MET_ROUTE3" value="인스타그램">
              <label for="MET_ROUTE3"><i class="xi-instagram"></i><br><span>인스타그램</span></label>
            </div>
            <div class="checkbox_box">
              <input type="checkbox" name="MET_ROUTE" id="MET_ROUTE4" value="페이스북">
              <label for="MET_ROUTE4"><i class="xi-facebook"></i><br><span>페이스북</span></label>
            </div>
            <div class="checkbox_box">
              <input type="checkbox" name="MET_ROUTE" id="MET_ROUTE5" value="지인소개">
              <label for="MET_ROUTE5"><i class="xi-user-plus-o"></i><br><span>지인소개</span></label>
            </div>
            <div class="checkbox_box">
              <input type="checkbox" name="MET_ROUTE" id="MET_ROUTE6" value="타사이트">
              <label for="MET_ROUTE6"><i class="xi-globus"></i><br><span>타사이트</span></label>
            </div>
            <div class="checkbox_box etc">
              <input type="checkbox" name="MET_ROUTE" id="MET_ROUTE7" value="기타">
              <label for="MET_ROUTE7"><span>기타</span>
                <input type="text" name="MET_ROUTE_ETC" id="7"></label>
            </div>
            <input type="submit" title="완료" alt="완료" value="완료" class="btn_check btn_next">
          </form>
        </div>
        <div class="footer">
          <p class="">(c)2020스타트체험단.All Righrs Reserved.</p>
          <ul>
            <li><a href="javascript:void(0);">회사소개</a></li>
            <li><a href="#fo1" rel="modal:open" class="btn_mo">이용약관</a></li>
            <li><a href="#fo2" rel="modal:open" class="btn_mo">개인정보처리방침</a></li>
            <li><a href="#fo4" rel="modal:open" class="btn_mo">이메일무단수집거부</a></li>
            <li><a href="partner_write.php">광고/제휴문의</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div id="fo1" class="contact_modal footer_modal" style="display: none;">
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
            <li>④ 신규업체정보는 약관을 개정할 경우에는 그 개정약관은 그 적용일자 이후에 체결되는 계약에만 적용되고 그 이전에 이미 체결된 계약에 대해서는 개정전의 약관조항이 그대로 적용됩니다.
            </li>
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
    <div id="fo2" class="contact_modal footer_modal" style="display: none;">
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
            있습니다.그리고 개인정보 보호정책을 개정하는 경우 회사는 개인정보 보호정책 변경 시행 7일전부터 스타트체험단 공지사항을 통하여 공지하고 버전번호 및 개정일자 등을 부여하여 개정된 사항을
            이용자들이
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

            대부분의 스타트체험단 서비스는 별도의 사용자 등록이 없이 언제든지 사용할 수 있습니다. 그러나 회사는 회원서비스(메일, 네이버폰, 카페, 블로그, 데스크톱, 포토앨범,마이스톡 등 현재 제공
            중이거나
            향후 제공될 로그인 기반의 서비스) 및 쥬니어네이버, 아크로드 등을 통하여 이용자들에게 맞춤식 서비스를 비롯한 보다 더 향상된 양질의 서비스를 제공하기 위하여 이용자 개인의 정보를 수집하고
            있습니다.<br><br>
          </p>
          <p>내용(생략)</p>
        </div>
        <!-- checkbox -->
      </div>
      <div class="btn_close">
        <a href="#close-modal" rel="modal:close" class="close-modals"><span class="blind">닫기</span><i
            class="xi-close"></i></a>
      </div>
    </div>
    <div id="fo3" class="contact_modal footer_modal" style="display: none;">
      <div class="template t1">
        <h3>운영정책</h3>
        <!-- textbox -->
        <div class="text_box box3">
          <p>서비스 운영정책은 다음과 같은 내용을 담고 있습니다.<br><br></p>

          <p>
            스타트체험단 캠페인에 참여하는 사용자께서는 다음의 운영 정책을 준수하셔야 합니다.<br>
            약관과 운영정책을 위반한 사용자에게는 불이익이 발생할 수 있습니다. 서비스 특성상 운영 정책은 수시로 바뀔 수 있으며 약관과 운영정책 위반에 대한 책임은 사용자에게 있습니다.<br><br>
          </p>

          <h5>제 1 조 목적</h5>
          - 본 운영정책은 (주) 디노랩스(이하 “회사”라 함)가 제공하는 스타트체험단(startchallenge.co.kr) 서비스(이하 “서비스”라 함)를 이용하는데 있어
          회원이 준수하여야 할 사항을 규정함을 목적으로 합니다.<br><br>

          <h5>제 2 조 용어의 정의</h5>
          <ul>
            <li>나. '담당자'란 서비스의 전반적인 관리와 원활한 운영을 위해 회사에서 선정한 자를 말합니다.</li>
            <li>가. '회원'이라 함은 스타트체험단에 회원가입을 하여 스타트체험단 서비스를 이용하는 자를 가리킵니다.</li>
            <li>다. '미디어'란 회원이 주소를 직접 입력하거나, 권한허용을 통해 스타트체험단 서비스에 등록한 소셜 미디어를 말합니다.</li>
            <li>라. '콘텐츠'란 회원이 미디어에 등록한 콘텐츠을 스타트체험단에 게재한 글을 말합니다.<br><br></li>
          </ul>


          <h5>제 3 조 약관의 효력 및 적용과 변경</h5>
          <p>
            - 현 정책에 규정되지 않은 사항에 대해서는 관계법령, 회사가 정한 서비스의 개별이용약관, 세부이용지침 및 규칙 등의 규정을 따르게 됩니다.<br><br>
          </p>

          <h5>제 4 조 스타트체험단 서비스 이용 제한 기준</h5>
          <ul>
            <li>1. 아래와 같은 콘텐츠 등이 스타트체험단 서비스에 노출되었을 경우 스타트체험단를 통한 해당 글의 접속이 제한될 수 있습니다.
              <ul>
                <li>가. 헌법에 위배되거나 국가의 존립을 해하는 콘텐츠</li>
                <li>나. 범죄 기타 법령에 위반되는 행위에 관련된 콘텐츠</li>
                <li>다. 선량한 풍속 기타 사회질서를 현저히 해할 우려가 있는 내용의 콘텐츠
                  <ul>
                    <li>- 사회통념상 일반인의 성욕을 자극하여 성적 흥분을 유발하고 정상적인 성적 수치심을 해하여 성적도의관념에 반하는 콘텐츠</li>
                    <li>- 폭력성, 잔혹성, 혐오성 등이 심각한 콘텐츠</li>
                    <li>- 사회통합을 저해하는 콘텐츠</li>
                    <li>- 타인의 권리를 침해하는 콘텐츠</li>
                    <li>- 반인륜적 패륜적 행위 등 선량한 풍속 기타 사회질서를 현저히 저해하는 콘텐츠</li>
                  </ul>
                </li>
                <li>라. 기타 관련 법률 및 법령에 위배되는 콘텐츠</li>
                <li>마. 권리를 침해 당한 당사자가 직접 삭제를 요청한 콘텐츠</li>
                <li>바. 확인되지 않은 소문 유포로 타인의 명예를 손상시키는 콘텐츠</li>
                <li>사. 욕설 또는 게시 글 도배 콘텐츠</li>
                <li>아. 1항 내지 4항에 위배되는 정보를 배포·판매·임대 등을 하거나 공연히 전시 또는 전송을 할 목적으로 매개·광고·선전 등을 하는 내용의 콘텐츠</li>
                <li>자. 명시되지 않은 자세한 기준은 정보통신윤리위원회의 정보통신윤리심의규정을 따릅니다.
                </li>
              </ul>
            </li>
            <li>2. 서비스 이용에 있어, 회원의 귀책으로 인해 운영상 손해를 끼치는 경우 서비스이용에 제재가 적용될 수 있습니다.
              <ul>
                <li>가. 운영상 손해를 끼치는 항목은 서비스내에서 별도로 공지하며, 이는 운영방침에 따라 수시로 변경될 수 있습니다.</li>
                <li>나. 서비스 제재의 범위는 캠페인 신청, 게시판 이용, 포인트 출금 제한의 방식으로 제한됩니다.<br><br></li>
              </ul>
            </li>
          </ul>
          <h5>제 5 조 스타트체험단 서비스 이용 제한 처리 방법</h5>
          <p>
            - 제 4조의 사항을 위반한 부정 콘텐츠로 판정되었을 경우, 스타트체험단를 통한 해당 글 접근이 제한되며 해당 콘텐츠를올린 회원의 이메일로 경고를 보냅니다.<br>
            부정 콘텐츠 경고를 받을 경우, 사안의 경중에 따라서 해당 미디어 및 계정은 즉시 이용정지될 수 있습니다.<br>
          </p>
          <ul>
            <li>가. 부정 콘텐츠로 판정된 게시글의 미디어를 등록하는 회원</li>
            <li>나. 악의적 목적으로 부정 콘텐츠을 등록하는 회원</li>
            <li>다. 타인의 미디어를 무단 등록하는 회원</li>
            <li>라. 타인의 미디어 저작물을 무단 등록하는 회원</li>
            <li>마. 허위정보를 이용하여 회원가입을 한 회원</li>
          </ul>
          <p>
            부정콘텐츠 경고 시, 회원이 등록한 연락수단으로경고가 발송되었음을 알리며, 단, 영업일 5일 이내에 경고에 대한 사유서를 회원이 스타트체험단로 보내어,
            사유가 타당할 경우 경고를 해제할 수 있습니다. 바이러스를 유포하거나 악성 코드가 포함된 미디어, 피싱 미디어, 특정 수익목적을 위한 불펌 미디어 및 스팸미디어는
            사전 통보 없이 발견 즉시 임의 삭제될 수 있습니다.<br><br>
          </p>
          </ul>
          <p>
            내용(생략)
          </p>
        </div>
      </div>
      <div class="btn_close">
        <a href="#close-modal" rel="modal:close" class="close-modals"><span class="blind">닫기</span><i
            class="xi-close"></i></a>
      </div>
    </div>
    <div id="fo4" class="contact_modal footer_modal" style="display: none;">
      <div class="template t1">
        <h3>이메일 무단 수집 거부</h3>
        <!-- textbox -->
        <div class="text_box box4">
          <p>본 사이트에 게시된 이메일 주소가 전자우편 수집 프로그램이나 그 밖의 기술적 장치를 이용하여 무단으로 수집되는 것을 거부하며 이를 위반 시 정보통신망법에 의해 처벌됨을 유념하시기
            바랍니다.<br><br></p>
          <p>불법 대응 센터 http://www.spamcop.or.kr</p>
        </div>
      </div>
      <div class="btn_close">
        <a href="#close-modal" rel="modal:close" class="close-modals"><span class="blind">닫기</span><i
            class="xi-close"></i></a>
      </div>
    </div>
  </div>
</body>
<script>
$("input:checkbox[name='MET_ROUTE']").change(function(){
  if ($("input:checkbox[name='MET_ROUTE']").is(":checked") == true){
    $('.btn_check').addClass('on')
  }else{
    $('.btn_check').removeClass('on')
  }  
}); 

</script>
</html>