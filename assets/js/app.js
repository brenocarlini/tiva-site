$(function() {
  var header = $(".navbar");

  $(window).scroll(function() {    
      var scroll = $(window).scrollTop();
      if (scroll >= 20) {
          header.addClass("scrolled");
      } else {
          header.removeClass("scrolled");
      }
  });

});




$(document).ready(function() {

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $('.dropdown-toggle').dropdown();

  if (window.matchMedia("(max-width:768px)").matches) {
    
    // $('li.active').addClass('show');

    $('.dropdown').on('show.dropdown', function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $('.dropdown').on('hide.dropdown', function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });

  } 
  
});



jQuery("document").ready(function($){
 
  $('#slide-home .carousel').carousel({
      interval: 6000,
      pause: false
  });


  $('.slider-players').slick({
      centerMode: false,
      centerPadding: '15',
      infinite: false,
      slidesToShow: 4,
      slidesToScroll: 4,
      initialSlide: 0,
      speed: 1000,
      arrows: false,
      dots: false,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '0',
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '0',
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
          }
        }
      ]
  });
  $('#squad .slick-left').click(function(){
    $('.slider-players').slick('slickPrev');
  })
  $('#squad .slick-right').click(function(){
    $('.slider-players').slick('slickNext');
  })

  $('.slider-symbols').slick({
    centerMode: false,
    centerPadding: '15',
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    initialSlide: 0,
    speed: 1000,
    arrows: false,
    dots: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
  $('#symbols .slick-left').click(function(){
    $('.slider-symbols').slick('slickPrev');
  })
  $('#symbols .slick-right').click(function(){
    $('.slider-symbols').slick('slickNext');
  })
 
});

AOS.init();
