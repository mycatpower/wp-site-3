'use strict';

(function ($, undefined) {
    $(document).on('click', '.blog-show-more', function () {
        console.log('test');
        var $this = $(this),
            $articlesWrapp = $this.parents('#articles-block'),
            $offset = $articlesWrapp.find('.blog-item').length;

        if (!$this.hasClass('loading')) {
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: df_localize.ajaxurl,
                data: {
                    'offset': $offset,
                    'action': 'more_articles'
                },
                beforeSend: function beforeSend() {
                    $this.addClass('loading');
                },
                success: function success(data) {
                    var $data = $(data);
                    if ($data.length) {
                        var $newElements = $data.css({ opacity: 0 });
                        $articlesWrapp.find('.row').append($newElements);
                        $newElements.animate({ opacity: 1 });
                        $this.removeClass('loading');
                        if ($data.length < 12) {
                            $this.remove();
                        } else if ($offset + $data.length === $this.data('post-count')) {
                            $this.remove();
                        }
                    } else {
                        $this.remove();
                        // $this.removeClass('loading').addClass('no-more');
                    }
                },
                error: function error(jqXHR, textStatus, errorThrown) {
                    $this.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
                    console.log(jqXHR);
                }
            });
        }
    });
})(jQuery);

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

;jQuery(document).ready(function ($) {

    $('.df_text_slider').slick({
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        slidesToShow: 1,
        speed: 300,
        vertical: true,
        verticalSwiping: true,
        verticalReverse: true
    });

    /** 2. Counter
     *******************************************************************/
    $('.counter').each(function () {
        var $this = $(this),
            countTo = $this.attr('data-count');

        $({ countNum: $this.text() }).animate({
            countNum: countTo
        }, {
            duration: 3000,
            easing: 'linear',
            step: function step() {
                $this.text(Math.floor(this.countNum));
            },
            complete: function complete() {
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
        responsive: [{
            breakpoint: 880,
            settings: {
                centerMode: false,
                variableWidth: false,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                centerMode: false,
                variableWidth: false,
                slidesToShow: 1,
                slidesToScroll: 1
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        }]
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
    particlesJS.load('particles-js', df_localize.particles, function () {
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
    (function () {

        function line($el) {

            var $endEl = $('.' + $el.data('to'));

            var startP = {
                left: $el.parent().position().left + $el.parent().width() / 2,
                top: $el.parent().position().top + $el.parent().height() / 2
            };

            var endP = {
                left: $endEl.position().left + $endEl.width() / 2,
                top: $endEl.position().top + $endEl.height() / 2
            };

            var a = Math.abs(startP.left - endP.left);
            var b = Math.abs(startP.top - endP.top);

            var c = Math.sqrt(a * a + b * b);

            var angle = Math.asin(b / c) * (180 / Math.PI);

            var pTop = startP.top < endP.top;
            var pLeft = startP.left < endP.left;

            if (pTop && pLeft) {
                angle = angle + 0;
            } else if (pTop && !pLeft) {
                angle = 180 - angle;
            } else if (!pTop && !pLeft) {
                angle = angle + 180;
            } else if (!pTop && pLeft) {
                angle = 360 - angle;
            }

            $el.css({ width: c, transform: 'rotate(' + angle + 'deg)' });
        }

        $(document).ready(function () {
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
        function parallax($el) {
            var offsetTop = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

            var elTop = $el.offset().top - offsetTop;
            var elLeft = $el.offset().left;
            var elWidth = $el.width();
            var windowH = $(window).height();
            var windowW = $(window).width();

            function scrollF($el) {
                var scrollPos = $(this).scrollTop();

                if (scrollPos + windowH < elTop || scrollPos > elTop) {
                    $el.css({ transform: 'translateX(0)' });
                    return;
                }

                var elTransform;

                if (elLeft < (windowW - elWidth) / 2) {
                    elTransform = (windowH + scrollPos - elTop) / windowH * (elLeft + elWidth) - (elLeft + elWidth);
                } else {
                    elTransform = windowW - elLeft - (windowH + scrollPos - elTop) / windowH * (windowW - elLeft);
                }

                $el.css({ transform: 'translateX(' + elTransform + 'px)' });
            }

            $(window).scroll(function () {
                scrollF($el);
            });
        }

        $('.parallax').each(function () {
            var $this = $(this);

            parallax($this, 200);
        });
    })();

    /** 12. Menu button
     *******************************************************************/
    $('.navbar-toggler').on('click', function () {
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
    if ($.browser.msie) {}
    // $("html").addClass("ie");


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

(function ($, undefined) {
    $(document).ready(function () {

        $('.single-post [class*=wp-image]').each(function () {
            var $this = $(this),
                test = this.className.match(/wp-image-[0-9]+/),
                $attachmentId = test[0].split('wp-image-').pop();

            var data = {
                'attach_id': $attachmentId,
                'action': 'image_caption'
            };

            $.ajax({
                url: df_localize.ajaxurl, // AJAX handler
                data: data,
                type: 'POST',
                success: function success(data) {
                    if (data) {
                        $this.after(data);
                    }
                }
            });
        });
    });
})(jQuery);

var facts = document.getElementById("facts-block"),
    header = document.querySelector('.home .header'),
    sticky = 0;

// Sticky header
;window.onscroll = function () {
    if (header !== null) myFunction();
};

if (facts !== null) {
    sticky = facts.offsetTop - 150;
} else {
    var content = document.getElementById('section-content');

    if (content !== null) {
        sticky = content.offsetTop - 50;
    }
}

function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}

(function ($) {
    $(window).scroll(function () {
        var scrollDistance = $(window).scrollTop();

        // Show/hide menu on scroll
        //if (scrollDistance >= 850) {
        //		$('nav').fadeIn("fast");
        //} else {
        //		$('nav').fadeOut("fast");
        //}

        // Assign active class to nav links while scolling
        $('.menu-section').each(function (i) {
            if (i !== 0) {
                if ($(this).position().top <= scrollDistance + 50) {
                    $('#menu-header a.active').removeClass('active');
                    $('#menu-header a').eq(i - 1).addClass('active');
                }
            } else {
                $('#menu-header a.active').removeClass('active');
            }
        });
    }).scroll();

    // Slick slides equal height

    $(window).on('load', function () {

        $(window).resize(function () {
            equalSlideHeight();
        });
        equalSlideHeight();
    });

    function equalSlideHeight() {
        // if ($(window).width() > 800) {
        $('.reviews-slider').on('setPosition', function () {
            $(this).find('.slick-slide').height('auto');
            var slickTrack = $(this).find('.slick-track');
            var slickTrackHeight = $(slickTrack).height();
            $(this).find('.slick-slide').css('height', slickTrackHeight + 'px');
        });
        // }
    }

    $('#navbarSupportedContent').on('show.bs.collapse', function () {
        $("header.header").addClass('menu-open');
    });

    $('#navbarSupportedContent').on('hide.bs.collapse', function () {
        $("header.header").removeClass('menu-open');
    });
})(jQuery);

;(function ($) {
    $(document).ready(function () {
        // Select all links with hashes
        $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]').not('[href="#0"]').not('[href="#pills-market"]').not('[href="#pills-position"]').click(function (event) {
            $('#navbarSupportedContent').collapse('hide');
            // On-page links
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) {
                            // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });
    });
})(jQuery);

(function ($) {
    $(document).ready(function () {
        var o = 0;
        $(window).scroll(function (t) {
            var n = $(this).scrollTop();
            n > 0 && (n > o ? n > 25 && $("header.header").addClass("nav-up") : $("header.header").removeClass("nav-up"), o = n);
            if (n < 150) $("header.header").addClass('on-top');else $("header.header").removeClass('on-top');
        });

        var n;
        $(document).bind("touchstart", function (t) {
            n = t.originalEvent.touches[0].clientY;
        }), $(document).bind("touchmove", function (t) {
            var o = t.originalEvent.changedTouches[0].clientY;
            n > o ? n > $("nav").height() + 50 && $("nav").addClass("nav-up") : $("nav").removeClass("nav-up");
        }), $(document).on("click", ".contacts__item-container", function () {
            $(".contacts__item-container").removeClass("contacts__item-container--selected"), $(this).addClass("contacts__item-container--selected");
            var t = $(this).attr("data-lat"),
                o = $(this).attr("data-lng");
            setMapCenter(t, o);
        });
    });
})(jQuery);