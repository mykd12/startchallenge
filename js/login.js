$(document).ready(function () {
  // 약관동의 체크박스 
  function allCheck(a) {
    $("[name=agree]").prop("checked", $(a).prop("checked"));
  }

  function oneCheck(a) {
    var allChkBox = $('#agreeAll');
    var chkBoxName = $(a).attr("name");

    if ($(a).prop("checked")) {
      checkBoxLength = $("[name=" + chkBoxName + "]").length;
      checkedLength = $("[name=" + chkBoxName + "]:checked").length;
      if (checkBoxLength == checkedLength) {
        allChkBox.prop("checked", true);
        $('.btn_next').addClass('on')
      } else {
        allChkBox.prop("checked", false);
        
      }
    } else {
      allChkBox.prop("checked", false);
      $('.btn_next').removeClass('on')
    }
  }

  $(function () {
    $('#agreeAll').click(function () {
      allCheck(this);
    });
    $("[name=agree]").each(function () {
      $(this).click(function () {
        oneCheck(this);
      });
    });
  });

});

function join() {

  $('.btn_check').on('click', function () {
    // 회원가입 유효성검사
    var MET_ID = $("#MET_ID").val();
		var id_ck = $("#id_ck").val();
    var MET_NIC = $("#MET_NIC").val();
		var nic_ck = $("#nic_ck").val();
		var MET_NAME = $("#MET_NAME").val();
		var MET_EMAIL = $("#MET_EMAIL").val();
		var MET_TEL = $("#MET_TEL").val();
    var MET_PW1 = $("#MET_PW1").val();
    var MET_PW2 = $("#MET_PW2").val();

    // 정규 표현식
    var idPattern = /^[A-Za-z]{1}[A-Za-z0-9]{4,12}$/;
    var nickPattern = /^[ㄱ-ㅎ가-힣A-Za-z0-9]{2,12}$/;
    var pwPattern = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,16}$/;
    var pwPattern = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,16}$/;
    var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;


    // 공백 검사
    if (MET_ID == "") {
      alert("아이디를 입력해주세요");
      $("#MET_ID").focus();
      return false;
    } else if (!idPattern.test(MET_ID)) {
      alert("아이디는 영문 대소문자 또는 영문+숫자 4~12자리로 입력해야합니다");
      $("#MET_ID").focus();
      return false;
    } else if (id_ck == "") {
      alert("아이디 중복확인 해주세요");
      $("#MET_ID").focus();
      return false;
    } else if (MET_NIC == "") {
      alert("닉네임를 입력해주세요");
      $("#MET_NIC").focus();
      return false;
    } else if (!nickPattern.test(MET_NIC)) {
      alert("닉네임은 특수문자를 제외한 2~8자리로 입력해야합니다");
      $("#MET_NIC").focus();
      return false;
    } else if (nic_ck == "") {
      alert("닉네임 중복확인 해주세요");
      $("#MET_NIC").focus();
      return false;
    } else if (MET_NAME == "") {
      alert("회원 이름을 입력해주세요");
      $("#MET_NAME").focus();
      return false;
    } else if (MET_EMAIL == "") {
      alert("이메일을 입력해주세요");
      $("#MET_EMAIL").focus();
      return false;
      // 패턴 검사
    } else if (!emailPattern.test(MET_EMAIL)) {
      alert("정확한 이메일 형식으로 입력해주세요.");
      $("#MET_EMAIL").focus();
      return false;
    } else if (MET_PW1 == "") {
      alert("비밀번호를 입력해주세요");
      $("#MET_PW1").focus();
      return false;
      // 패턴 검사
    } else if (!pwPattern.test(MET_PW1)) {
      alert("비밀번호는 영문 대소문자와 숫자 특수문자\n4~12자리로 입력해야합니다");
      $("#MET_PW1").focus();
      return false;
    } else if (MET_PW2 == "") {
      alert("비밀번호를 확인 입력해주세요");
      $("#MET_PW2").focus();
      return false;
      // 패턴 검사
    } else if (MET_PW1 !== MET_PW2) {
      alert("비밀번호가 일치하지 않습니다");
      $("#MET_PW1").focus();
      return false;
    } else if (MET_TEL == "") {
      alert("연락처를 입력해주세요");
      $("#MET_TEL").focus();
      return false;
      // 패턴 검사
    } else {
      return true;
    }

  });
}
