/******************************************************************


 @ Item          Gravity // Coming Soon WordPress
 @ Author		Avanzare
 @ Website		http://themeforest.net/user/avanzare


 ******************************************************************/


/******************************************************************


 ------------------------
 -- TABLE OF CONTENTS --
 ------------------------

 --  1. Text Slider
 --  2. Counter
 --  3. Team slider
 --  4. Reviews slider
 --  5. Reviews waves slider
 --  6. Contact google map
 --  7. Interne block background
 --  8. Tooltip init
 --  9. Scroll down button
 --  10. Meet the team block
 --  11. Parallax
 --  12. Menu toggle button
 --  13. ScrollReveal
 --  14. Anchor link
 --  15. Hide in IE
 --  16. blog slider

 ******************************************************************/




/** 1. Text Slider
 *******************************************************************/

;jQuery(document).ready(function($) {

    $('.df_text_slider').slick({
        dots: false,
        arrows:false,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        slidesToShow: 1,
        speed: 300,
        vertical: true,
        verticalSwiping: true,
        verticalReverse: true,
    });

    /** 2. Counter
     *******************************************************************/
    $('.counter').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');

        $({ countNum: $this.text()}).animate({
                countNum: countTo
            },
            {
                duration: 3000,
                easing: 'linear',
                step: function () {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text(this.countNum);
                    //alert('finished');
                }
        });
    });

    /** 3. Team slider
     *******************************************************************/
    $('.team-slider').slick({
        centerMode: true,
        variableWidth: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        nextArrow: $('.team-arrow-next'),
        prevArrow: $('.team-arrow-prev'),
        infinite: true,
        responsive: [
            {
                breakpoint: 880,
                settings: {
                    centerMode: false,
                    variableWidth: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    centerMode: false,
                    variableWidth: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    /** 4. Reviews slider
     *******************************************************************/
    $('.reviews-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: $('.reviews-arrow-next'),
        prevArrow: $('.reviews-arrow-prev')
    });

    /** 5. Reviews waves slider
     *******************************************************************/
    $('.reviews-waves-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: $('.reviews-waves-arrow-next'),
        prevArrow: $('.reviews-waves-arrow-prev')
    });

    /** 6. Contact google map
     *******************************************************************/


    // initMap();

    /** 7. Interne block background
     *******************************************************************/

    /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
    particlesJS.load('particles-js', df_localize.particles, function() {
        console.log('callback - particles.js config loaded');
    });

    /** 8. Tooltip init
     *******************************************************************/
    $('.target-board [data-toggle="popover"]').popover();

    /** 9. Scroll down button
     *******************************************************************/
    $('.scroll-down').on('click', function (e) {
        e.preventDefault();
        $("body, html").animate({
            scrollTop: $('.banner-block').height()
        }, 600);

    });

    /** 10. Meet the team block
     *******************************************************************/
    (function() {

        function line($el) {

            var $endEl = $('.' + $el.data('to'));

            var startP = {
                left: $el.parent().position().left + $el.parent().width()/2,
                top: $el.parent().position().top + $el.parent().height()/2
            };

            var endP = {
                left: $endEl.position().left + $endEl.width()/2,
                top: $endEl.position().top + $endEl.height()/2
            };

            var a = Math.abs(startP.left - endP.left);
            var b = Math.abs(startP.top - endP.top);

            var c = Math.sqrt((a*a) + (b*b));

            var angle = Math.asin(b/c) * (180 / Math.PI);

            var pTop = startP.top < endP.top;
            var pLeft = startP.left < endP.left;

            if (pTop && pLeft) {
                angle = angle + 0;
            } else if (pTop && !pLeft) {
                angle = 180 - angle
            } else if (!pTop && !pLeft) {
                angle = angle + 180
            } else if (!pTop && pLeft) {
                angle = 360 - angle
            }

            $el.css({width: c, transform: 'rotate(' + angle + 'deg)'});
        }

        $(document).ready(function() {
            $('.team-board__teammates .line').each(function () {
                var $this = $(this);
                line($this);
            });
            floatTeammates();
        });

        function floatTeammates() {
            if ($(document).width() > 1023) {
                $('.team-board [data-toggle="popover"]').popover();
            }
        }
    })();

    /** 11. Parallax
     *******************************************************************/
    (function () {
        function parallax($el, offsetTop = 0) {
            var elTop = $el.offset().top - offsetTop;
            var elLeft = $el.offset().left;
            var elWidth = $el.width();
            var windowH = $(window).height();
            var windowW = $(window).width();

            function scrollF($el) {
                var scrollPos = $(this).scrollTop();

                if (scrollPos + windowH < elTop || scrollPos > elTop ) {
                    $el.css({transform: 'translateX(0)'});
                    return
                }

                var elTransform;

                if (elLeft < (windowW - elWidth)/2) {
                    elTransform = (windowH + scrollPos - elTop ) / windowH * (elLeft + elWidth) - (elLeft + elWidth);
                } else {
                    elTransform = (windowW - elLeft) - (windowH + scrollPos - elTop ) / windowH * (windowW - elLeft);
                }

                $el.css({transform: 'translateX(' + elTransform + 'px)'})
            }

            $(window).scroll(function () {
                scrollF($el)
            })
        }

        $('.parallax').each(function () {
            var $this = $(this);

            parallax($this, 200);
        });
    })();

    /** 12. Menu button
     *******************************************************************/
    $('.navbar-toggler').on('click', function() {
        $(this).toggleClass('is-active');
    });

    /** 13. ScrollReveal
     *******************************************************************/
    window.sr = ScrollReveal({
        duration: 2000
    });

    sr.reveal('[data-show-from="top"]', { distance: '100%', origin: 'top' });
    sr.reveal('[data-show-from="bottom"]', { distance: '100%', origin: 'bottom' });
    sr.reveal('[data-show-from="left"]', { distance: '100%', origin: 'left' });
    sr.reveal('[data-show-from="right"]', { distance: '100%', origin: 'right' });
    sr.reveal('[data-show="opacity"]', { scale: 0.8 });

    /** 14. Anchor link
     *******************************************************************/
    $('.who-we-find-we-work').click(function () {
        $('#pills-tab .nav-link.right').tab('show');
    });
    $('.who-we-find-team').click(function () {
        $('#pills-tab .nav-link.left').tab('show');
    });

    /** 15. Hide in IE
     *******************************************************************/
    if ($.browser.msie) {
        // $("html").addClass("ie");
    }

    /** 16. Blog slider
     *******************************************************************/
    $('.blog-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        fade: true
    });

});
