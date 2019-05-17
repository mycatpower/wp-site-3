(function ($, undefined) {
    $(document).ready(function () {

        // Show more articles on Blog page
        $(document).on('click', '.blog-show-more', function() {
            var $this          = $(this),
                $articlesWrapp = $this.parents('#articles-block'),
                $offset        = $articlesWrapp.find('.blog-item').length,
                $term          = $articlesWrapp.data('cat') || 'all',
                $found_posts   = $this.data('found-posts');

            if (!($this.hasClass('loading'))) {
                $.ajax({
                    type: 'POST',
                    dataType: 'html',
                    url: df_localize.ajaxurl,
                    data: {
                        'offset' : $offset,
                        'term'   : $term,
                        'action' : 'more_articles'
                    },
                    beforeSend : function () {
                        $this.addClass('loading');
                    },
                    success: function (data) {
                        var $data = $(data);
                        if ($data.length) {
                            var $newElements = $data.css({ opacity: 0 });
                            $articlesWrapp.find('.row').append($newElements);
                            $newElements.animate({ opacity: 1 });

                            if ($data.length < 1) {
                                $this.addClass('d-none');
                            } else if ($offset + $data.length == $this[0].dataset.foundPosts) {
                                $this.addClass('d-none');
                            }
                        } else {
                            $this.addClass('d-none');
                            // $this.removeClass('loading').addClass('no-more');
                        }
                        $this.removeClass('loading');
                    },
                    error : function (jqXHR, textStatus, errorThrown) {
                        $this.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
                        console.log(jqXHR);
                    }
                });
            }
        });

        // Filter articles by category
        $('.blog-tags button').on('click', function () {
            var $showMoreBtn = $('.blog-show-more');

            var $this = $(this),
                term = $this.data('id') || 'all',
                articlesWrapp = $('#articles-block'),
                offset = articlesWrapp.find('.blog-item').length;

            $('.blog-tags button').removeClass("active");  // remove active class from all
            $this.addClass('active');

            articlesWrapp.data('cat', term);

            if (!($this.hasClass('loading'))) {
                $.ajax({
                    url: df_localize.ajaxurl,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'term': term,
                        'action': 'filter_articles'
                    },
                    beforeSend: function (xhr) {
                        // ...
                    },
                    success: function (data) {
                        if (data) {
                            var $html = $(data.html);
                            $showMoreBtn.attr('data-found-posts', data.found_posts);
                            var $newElements = $html.css({opacity: 0});
                            articlesWrapp.find('.row').html($newElements);
                            $newElements.animate({opacity: 1});
                            $this.removeClass('loading');

                            if ($html.length < 1) {
                                $showMoreBtn.addClass('d-none');
                            } else if ($html.length == data.found_posts) {
                                $showMoreBtn.addClass('d-none');
                            } else if (offset + $html.length === data.found_posts) {
                                $showMoreBtn.addClass('d-none');
                            } else {
                                $showMoreBtn.removeClass('d-none');
                            }
                        } else {
                            articlesWrapp.find('.row').html('No articles yet.');
                            $showMoreBtn.addClass('d-none');
                            // $this.removeClass('loading').addClass('no-more');
                        }
                    }
                });
            }
            return false;

        });
    });
})(jQuery);
