(function ($) {
    $(document).ready(function() {
        var o = 0;
        $(window).scroll(function(t) {
            var n = $(this).scrollTop();
            n > 0 && (n > o ? n > 25 && $("header.header").addClass("nav-up") : $("header.header").removeClass("nav-up"), o = n);
            if (n < 150)
                $("header.header").addClass('on-top');
            else
                $("header.header").removeClass('on-top');
        });

        var n;
        $(document).bind("touchstart", function(t) {
            n = t.originalEvent.touches[0].clientY
        }), $(document).bind("touchmove", function(t) {
            var o = t.originalEvent.changedTouches[0].clientY;
            n > o ? n > $("nav").height() + 50 && $("nav").addClass("nav-up") : $("nav").removeClass("nav-up")
        }), $(document).on("click", ".contacts__item-container", function() {
            $(".contacts__item-container").removeClass("contacts__item-container--selected"), $(this).addClass("contacts__item-container--selected");
            var t = $(this).attr("data-lat"),
                o = $(this).attr("data-lng");
            setMapCenter(t, o)
        });

    });
})(jQuery);
