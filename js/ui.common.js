$(document).ready(function () {


  // body 클릭하면 depth02메뉴 없어지기
  $('body').on('click', function (e) {
    var $tgPoint = $(e.target);
    var $popCallBtn = $tgPoint.hasClass('li>a')
    var $popArea = $tgPoint.hasClass('depth02')

    if (!$popCallBtn && !$popArea) {
      $('.depth02').removeClass('active');
    }
  });
  //lnb 클릭이벤트 
  $('.lnb_title>a').on('click', function (e) {
    e.stopPropagation();
    $(this).parent().find('.depth02').toggleClass('active');
  });


  //snb 클릭이벤트 
  $('.select').on('click', function (e) {
    e.stopPropagation();
    $(this).siblings('.depth02').toggleClass('active');
  });

  // 셀렉트선택이벤트
  $(".array_select1 li").on("click", function () {
    var text = $(this).find('span').html();
    $(".m_select .select").html(text);
    $(this).parent().removeClass('active')
  });
  $(".array_select li").on("click", function () {
    var text = $(this).find('span').html();
    $(".select_wrap .select").html(text);
    $(this).parent().removeClass('active')
  });

  $(document).on('click', '.array_select', function () {
    e.stopPropagation();
    e.preventDefault();
  });

  // 셀렉트 중복선택 안되게
  $('.array_select1').ready(function () {
    $('input[type="radio"][name="group"]').click(function () {
      //클릭 이벤트 발생한 요소가 체크 상태인 경우
      if ($(this).prop('checked')) {
        //그룹의 요소 전체를 체크 해제후 클릭한 요소 체크 상태지정
        $('input[type="radio"][name="group"]').prop('checked', false);
        $(this).prop('checked', true);
      }
    });
  });
  $('.array_select').ready(function () {
    $('input[type="radio"][name="group1"]').click(function () {
      //클릭 이벤트 발생한 요소가 체크 상태인 경우
      if ($(this).prop('checked')) {
        //그룹의 요소 전체를 체크 해제후 클릭한 요소 체크 상태지정
        $('input[type="radio"][name="group1"]').prop('checked', false);
        $(this).prop('checked', true);
      }
    });
  });

  // 등록 이미지 등록 미리보기
  function readInputFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('.nickname_wrap .img_wrap').html("<img src=" + e.target.result + ">");
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#file_btn').on('change', function () {
    readInputFile(this);
  });

  // 오른쪽메뉴_출석체크버튼
  $('.btn_wrap .btn_att').on('click', function () {
    console.log('sdssdsd')
    $(this).parent().addClass('on');
  });


  // top버튼 
  $(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
      $('#gotop').fadeIn();
    } else {
      $('#gotop').fadeOut();
    }
  });

  $("#gotop").click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 400);
    return false;
  });

  // 마이페이지_나의 캠페인
  // $('.mypage_01.sub_main .snb>li').on('click', function () {
  //   $(this).addClass('on').siblings().removeClass('on');
  // });
  
  // 
  $('.sub_main .snb>li').on('click', function () {
    $(this).addClass('on').siblings().removeClass('on');
  });
  
  // bng,lnb,snb_bar 함수
  function Menu_bar() {
    // gnb_bar .on 이벤트 
    $('.gnb>li.on').each(function () {
      console.log($(this).width());
      $(".gnb_bar").css({
        "width": $(this).width(),
        "left": $(this).position().left,
        "opacity": 1
      });
    });
    // gnb_bar 이벤트 발생
    $('.gnb>li').on('mouseenter', function () {
      $(".gnb_bar").css({
        "width": $(this).width(),
        "left": $(this).position().left,
        "opacity": 1
      });
    });
    // gnb_bar 이벤트 삭제
    $('.gnb').on('mouseleave', function () {
      $(".gnb_bar").css({
        "opacity": 0
      });
      $('.gnb>li.on').each(function () {
        console.log($(this).width());
        $(".gnb_bar").css({
          "width": $(this).width(),
          "left": $(this).position().left,
          "opacity": 1
        });
      });
    });

    // m_gnb_bar .on 이벤트 
    $('.m_gnb>li.on').each(function () {
      // console.log($(this).width());
      $(".m_gnb_bar").css({
        "width": $(this).width(),
        "left": $(this).position().left,
        "opacity": 1
      });
    });
    // m_gnb_bar 이벤트 발생
    $('.m_gnb>li').on('mouseenter', function () {
      $(".m_gnb_bar").css({
        "width": $(this).width(),
        "left": $(this).position().left,
        "opacity": 1
      });
    });
    // m_gnb_bar 이벤트 삭제
    $('.m_gnb').on('mouseleave', function () {
      $(".m_gnb_bar").css({
        "opacity": 0
      });
      $('.m_gnb>li.on').each(function () {
        // console.log($(this).width());
        $(".m_gnb_bar").css({
          "width": $(this).width(),
          "left": $(this).position().left,
          "opacity": 1
        });
      });
    });

    // lnb_bar .on 이벤트 
    $('.lnb>li.on').each(function () {
      $(".lnb_bar").css({
        "width": $(this).width(),
        "left": $(this).position().left,
        "opacity": 1
      });
    });
    // lnb_bar 이벤트 발생
    $('.lnb>li').on('mouseenter', function () {
      $(".lnb_bar").css({
        "width": $(this).width(),
        "left": $(this).position().left,
        "opacity": 1
      });
    });
    // lnb_bar 이벤트 삭제
    $('.lnb').on('mouseleave', function () {
      $(".lnb_bar").css({
        "opacity": 0
      });
      $('.lnb>li.on').each(function () {
        $(".lnb_bar").css({
          "width": $(this).width(),
          "left": $(this).position().left,
          "opacity": 1
        });
      });
    });
  }
  Menu_bar();

});