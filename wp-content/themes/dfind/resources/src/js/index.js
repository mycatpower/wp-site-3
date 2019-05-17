var facts  = document.getElementById("facts-block"),
    header = document.querySelector('.home .header'),
    sticky = 0;

// Sticky header
;window.onscroll = function() {
    if (header !== null)
        myFunction()
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
    $(window).scroll(function() {
        var scrollDistance = $(window).scrollTop();

        // Show/hide menu on scroll
        //if (scrollDistance >= 850) {
        //		$('nav').fadeIn("fast");
        //} else {
        //		$('nav').fadeOut("fast");
        //}

        // Assign active class to nav links while scolling
        $('.menu-section').each(function(i) {
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

    $(window).on('load', function() {

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
    })

    $('#navbarSupportedContent').on('hide.bs.collapse', function () {
        $("header.header").removeClass('menu-open');
    })


})(jQuery);
