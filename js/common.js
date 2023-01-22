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

    $('a[href="#address"').click(function () {

        var href = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(href).offset().top
        });
        return false;
    });
    $('a[href="#form"').click(function () {

        var href = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(href).offset().top - 140
        });
        return false;
    });
});
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImNvbW1vbi5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImNvbW1vbi5qcyIsInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JztcblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICQoJy5wcm9qZWN0c19fc2xpZGVyLS1tYWluJykuc2xpY2soe1xuICAgICAgICBzbGlkZXNUb1Nob3c6IDEsXG4gICAgICAgIHNsaWRlc1RvU2Nyb2xsOiAxLFxuICAgICAgICBkb3RzOiB0cnVlLFxuICAgICAgICBhcnJvd3M6IHRydWUsXG4gICAgICAgIGF1dG9wbGF5OiB0cnVlLFxuICAgICAgICBhdXRvcGxheVNwZWVkOiA3MDAwXG4gICAgfSk7XG5cbiAgICAkKCcuYWRkcmVzc19fd3JhcCBhJykuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICAkKCdib2R5JykuYWRkQ2xhc3MoJ2hpZGRlbicpO1xuICAgICAgICAkKCcucG9wdXAtd3JhcCcpLmFkZENsYXNzKCdpcy1vcGVuJyk7XG4gICAgfSk7XG5cbiAgICAkKCcucG9wdXBfX2Nsb3NlJykuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICAkKCdib2R5JykucmVtb3ZlQ2xhc3MoJ2hpZGRlbicpO1xuICAgICAgICAkKCcucG9wdXAtd3JhcCcpLnJlbW92ZUNsYXNzKCdpcy1vcGVuJyk7XG4gICAgfSk7XG5cbiAgICAkKCdhW2hyZWY9XCIjYWRkcmVzc1wiJykuY2xpY2soZnVuY3Rpb24gKCkge1xuXG4gICAgICAgIHZhciBocmVmID0gJCh0aGlzKS5hdHRyKCdocmVmJyk7XG5cbiAgICAgICAgJCgnaHRtbCwgYm9keScpLmFuaW1hdGUoe1xuICAgICAgICAgICAgc2Nyb2xsVG9wOiAkKGhyZWYpLm9mZnNldCgpLnRvcFxuICAgICAgICB9KTtcbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH0pO1xuICAgICQoJ2FbaHJlZj1cIiNmb3JtXCInKS5jbGljayhmdW5jdGlvbiAoKSB7XG5cbiAgICAgICAgdmFyIGhyZWYgPSAkKHRoaXMpLmF0dHIoJ2hyZWYnKTtcblxuICAgICAgICAkKCdodG1sLCBib2R5JykuYW5pbWF0ZSh7XG4gICAgICAgICAgICBzY3JvbGxUb3A6ICQoaHJlZikub2Zmc2V0KCkudG9wIC0gMTQwXG4gICAgICAgIH0pO1xuICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgfSk7XG59KTsiXX0=
