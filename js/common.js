'use strict';

$(document).ready(function () {
  $('.benefits__item img, .footer__item img').each(function () {
    var $img = $(this);
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');
    $.get(imgURL, function (data) {
      var $svg = $(data).find('svg');
      if (typeof imgClass !== 'undefined') {
        $svg = $svg.attr('class', imgClass + ' replaced-svg');
      }
      $svg = $svg.removeAttr('xmlns:a');
      if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
        $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
      }
      $img.replaceWith($svg);
    }, 'xml');
  });

  $('.mobile-menu').click(function () {
    $('.showMobileMenuWrap').toggleClass('animated');
    $('.mobile-menu').toggleClass('open');
  });

  $("body").addClass("showMobileMenuWrap");

  $('a[href^="#about"]').click(function () {
    var anchor = $(this).attr('href');

    $('html, body').animate({
      scrollTop: $(anchor).offset().top
    }, 600);
  });
  $('a[href^="#benefits"]').click(function () {
    var anchor = $(this).attr('href');

    $('html, body').animate({
      scrollTop: $(anchor).offset().top
    }, 600);
  });
  $('a[href^="#contacts"]').click(function () {
    var anchor = $(this).attr('href');

    $('html, body').animate({
      scrollTop: $(anchor).offset().top
    }, 600);
  });
  $('a[href^="#rent"]').click(function () {
    var anchor = $(this).attr('href');

    $('html, body').animate({
      scrollTop: $(anchor).offset().top
    }, 600);
  });

  $(window).scroll(function (e) {
    var scrolled = $(window).scrollTop();
    if (scrolled < 750) {
      parallax();
    }
  });

  function parallax() {
    var scrolled = $(window).scrollTop();
    $('.banner').css('background-positionY', scrolled * -0.5 + 'px');
  };

  var sticky_navigation = function sticky_navigation() {
    if ($(window).scrollTop() > 74) {
      $('.header').addClass("is-sticky");
    } else {
      $('.header').removeClass("is-sticky");
    }
  };

  sticky_navigation();

  $(window).on('scroll', function () {
    sticky_navigation();
  });
});
