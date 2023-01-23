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

    if ($(window).width() <= 768) {
        $('a[href="#form"').click(function () {

            var href = $(this).attr('href');

            $('html, body').animate({
                scrollTop: $(href).offset().top - 290
            });
            return false;
        });
    } else {
        $('a[href="#form"').click(function () {

            var href = $(this).attr('href');

            $('html, body').animate({
                scrollTop: $(href).offset().top
            });
            return false;
        });
    }
});
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImNvbW1vbi5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoiY29tbW9uLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgJCgnLnByb2plY3RzX19zbGlkZXItLW1haW4nKS5zbGljayh7XG4gICAgICAgIHNsaWRlc1RvU2hvdzogMSxcbiAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDEsXG4gICAgICAgIGRvdHM6IHRydWUsXG4gICAgICAgIGFycm93czogdHJ1ZSxcbiAgICAgICAgYXV0b3BsYXk6IHRydWUsXG4gICAgICAgIGF1dG9wbGF5U3BlZWQ6IDcwMDBcbiAgICB9KTtcblxuICAgICQoJy5hZGRyZXNzX193cmFwIGEnKS5jbGljayhmdW5jdGlvbiAoKSB7XG4gICAgICAgICQoJ2JvZHknKS5hZGRDbGFzcygnaGlkZGVuJyk7XG4gICAgICAgICQoJy5wb3B1cC13cmFwJykuYWRkQ2xhc3MoJ2lzLW9wZW4nKTtcbiAgICB9KTtcblxuICAgICQoJy5wb3B1cF9fY2xvc2UnKS5jbGljayhmdW5jdGlvbiAoKSB7XG4gICAgICAgICQoJ2JvZHknKS5yZW1vdmVDbGFzcygnaGlkZGVuJyk7XG4gICAgICAgICQoJy5wb3B1cC13cmFwJykucmVtb3ZlQ2xhc3MoJ2lzLW9wZW4nKTtcbiAgICB9KTtcblxuICAgICQoJ2FbaHJlZj1cIiNhZGRyZXNzXCInKS5jbGljayhmdW5jdGlvbiAoKSB7XG5cbiAgICAgICAgdmFyIGhyZWYgPSAkKHRoaXMpLmF0dHIoJ2hyZWYnKTtcblxuICAgICAgICAkKCdodG1sLCBib2R5JykuYW5pbWF0ZSh7XG4gICAgICAgICAgICBzY3JvbGxUb3A6ICQoaHJlZikub2Zmc2V0KCkudG9wXG4gICAgICAgIH0pO1xuICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgfSk7XG5cbiAgICBpZiAoJCh3aW5kb3cpLndpZHRoKCkgPD0gNzY4KSB7XG4gICAgICAgICQoJ2FbaHJlZj1cIiNmb3JtXCInKS5jbGljayhmdW5jdGlvbiAoKSB7XG5cbiAgICAgICAgICAgIHZhciBocmVmID0gJCh0aGlzKS5hdHRyKCdocmVmJyk7XG5cbiAgICAgICAgICAgICQoJ2h0bWwsIGJvZHknKS5hbmltYXRlKHtcbiAgICAgICAgICAgICAgICBzY3JvbGxUb3A6ICQoaHJlZikub2Zmc2V0KCkudG9wIC0gMjkwXG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfSk7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgJCgnYVtocmVmPVwiI2Zvcm1cIicpLmNsaWNrKGZ1bmN0aW9uICgpIHtcblxuICAgICAgICAgICAgdmFyIGhyZWYgPSAkKHRoaXMpLmF0dHIoJ2hyZWYnKTtcblxuICAgICAgICAgICAgJCgnaHRtbCwgYm9keScpLmFuaW1hdGUoe1xuICAgICAgICAgICAgICAgIHNjcm9sbFRvcDogJChocmVmKS5vZmZzZXQoKS50b3BcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICB9KTtcbiAgICB9XG59KTsiXX0=
