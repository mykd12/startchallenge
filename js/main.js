$(document).ready(function () {

  function cp_slider() {
    // 캠페인 슬라이더
    if ($(".campaign_slider .swiper-slide").length < 7) {
      var campaignSwiper = new Swiper('.campaign_slider', {
        loop: true,
        slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
      });
      $(window).resize(function () {
        let options01 = {};
        var winW = $(window).width();
        if ($(".campaign_slider .swiper-slide").length <= 6) {
          $('.campaign_slider').addClass('disabled');
          options01 = {
            loop: false,
            slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
          }
        }
        if ($(".campaign_slider .swiper-slide").length == 9) {
          // $('.campaign_slider').addClass('disabled');
          if (winW > 640) {
            $('.campaign_slider').addClass('disabled');
          }
          if (winW <= 640) {
            $('.campaign_slider').removeClass('disabled');
            options01 = {
              loop: true,
              slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
            }
          }
        }
        if ($(".campaign_slider .swiper-slide").length == 12) {
          // $('.campaign_slider').addClass('disabled');
          if (winW > 800) {
            $('.campaign_slider').addClass('disabled');
          }
          if (winW <= 800) {
            $('.campaign_slider').removeClass('disabled');
            var campaignSwiper = new Swiper('.campaign_slider', {
              loop: true,
              slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
            });
          }
        }
        if ($(".campaign_slider .swiper-slide").length == 15) {
          // $('.campaign_slider').addClass('disabled');
          if (winW > 1080) {
            $('.campaign_slider').addClass('disabled');
          }
          if (winW <= 1080) {
            $('.campaign_slider').removeClass('disabled');
            var campaignSwiper = new Swiper('.campaign_slider', {
              loop: true,
              slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
            });
          }
        }
        if ($(".campaign_slider .swiper-slide").length == 18) {
          // $('.campaign_slider').addClass('disabled');
          if (winW > 1280) {
            $('.campaign_slider').addClass('disabled');
          }
          if (winW <= 1280) {
            $('.campaign_slider').removeClass('disabled');
            var campaignSwiper = new Swiper('.campaign_slider', {
              loop: true,
              slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
            });
          }
        }
        var campaignSwiper = new Swiper('.campaign_slider', options01);
      }).trigger('resize');
    } else {
      $('.campaign_slider').addClass('on');
      var campaignSwiper = new Swiper('.campaign_slider', {
        loop: true,
        slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
        autoplay: { // 자동 슬라이드 설정 , 비 활성화 시 false
          delay: 3000, // 시간 설정
          // disableOnInteraction : false,  // false로 설정하면 스와이프 후 자동 재생이 비활성화 되지 않음
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    }
  }
  cp_slider();




  let options02 = {};

  if ($(".event_slider .swiper-slide").length >= 2) {
    options02 = {
      loop: true,
      slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
      speed: 1000,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    }
  } else {
    $('.event_slider').addClass('disabled');
    options02 = {
      loop: false,
    }
  }
  var eventSwiper = new Swiper('.event_slider', options02)

  $(".event_slider").mouseenter(function () {
    eventSwiper.autoplay.stop();
  });

  $(".event_slider").mouseleave(function () {
    eventSwiper.autoplay.start();
  });

  // 푸터 info 버튼 이벤트
  $('.btn_footer').on('click', function () {
    $('#footer .bottom_footer').addClass('active');
    $('#footer .bottom_footer').stop().slideDown(1000);
  });
  $('.bottom_footer .btn_close').on('click', function () {
    $('#footer .bottom_footer').stop().slideUp(1000);
  });
});