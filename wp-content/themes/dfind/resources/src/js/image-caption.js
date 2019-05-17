(function ($, undefined) {
    $(document).ready(function () {

        $('.single-post [class*=wp-image]').each(function () {
            var $this = $(this),
                test = this.className.match(/wp-image-[0-9]+/),
                $attachmentId = test[0].split('wp-image-').pop();

            var data = {
                'attach_id' : $attachmentId,
                'action' : 'image_caption'
            };

            $.ajax({
                url : df_localize.ajaxurl, // AJAX handler
                data : data,
                type : 'POST',
                success : function (data) {
                    if (data) {
                        $this.after(data);
                    }
                }
            });
        });

    });
})(jQuery);
