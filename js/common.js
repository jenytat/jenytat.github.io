'use strict';

$(document).ready(function () {
    $('.projects__slider--main').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 7000
    });

    $('.address__wrap a').click(function () {
        $('body').addClass('hidden');
        $('.popup-wrap').addClass('is-open');
    });

    $('.popup__close').click(function () {
        $('body').removeClass('hidden');
        $('.popup-wrap').removeClass('is-open');
    });

    $('a[href^="#"').click(function () {

        var href = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(href).offset().top
        });
        return false;
    });
});