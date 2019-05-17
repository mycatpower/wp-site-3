(function($) {
    $(document).ready(function() {
        /**
         * Hide preloader function
         */
        function hidePreloader() {
            $("#df-page-loader").addClass("hide-this");
        }

        $(window).on('load', function () {
            hidePreloader();
        });

        setTimeout(function () {
            if (! $("#df-page-loader").hasClass('hide-this')) {
                hidePreloader();
            }
        }, 3500);
    });
})(jQuery);
