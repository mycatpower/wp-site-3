(function ($) {
    $(document).ready(function() {

        var body = $('body'),
            subscribeModal = $('#success-subscribe');

        body.on('submit', '.mc-subscribe', function(e) {
            e.preventDefault();

            var submitted_form = $( this ),
                email = submitted_form.find('[type=email]').val();

            submitted_form.find('.error').remove();

            if (!email) {
                submitted_form.find('.group-field').append('<p class="error">' + appmc.no_exists + '</p>');
                return;
            }

            if (!validateEmail(email)) {
                submitted_form.find('.group-field').append('<p class="error">' + appmc.invalid_email + '</p>');
                return;
            }

            var terms = this.elements['checkbox'];

            if ( !terms.checked ) {
                submitted_form.find('.group-field').append('<p class="error">Please accept the Terms and Conditions</p>');
                return;
            }

            var data = {
                'action' : 'am_subscribe',
                'form_data' : submitted_form.serialize()
            };

            $.ajax({
                url: appmc.ajaxurl,
                type: 'POST',
                data: data,
                success : function( response, textStatus, jqXHR) {
                    if (response.success) {
                        response = response.data;

                        if (response.status == 'subscribed') {
                            // console.log('User already subscribed');

                            subscribeModal.find('.modal-body').html(appmc.subscribed);
                            $('#success-subscribe').modal('show');
                        } else {
                            // console.log('New user');

                            subscribeModal.find('.modal-body').html(appmc.pending);
                            $('#success-subscribe').modal('show');
                        }
                    } else {
                        response = response.data;

                        if (response.status === 'empty key') {
                            // console.log('Empty key');
                            submitted_form.find('.group-field').append('<p class="error">' + appmc.subscribe_error + '</p>');
                        } else if (response.status === 'invalid email') {
                            submitted_form.find('.group-field').append('<p class="error">' + appmc.invalid_email + '</p>');
                        } else {
                            submitted_form.find('.group-field').append('<p class="error">' + appmc.subscribe_error + '</p>');
                        }
                    }
                },
                error : function( jqXHR, textStatus, errorThrown ) {  /* someother error is happening, and should be investigated... */
                    /* alert( errorThrown ); */
                    console.error( errorThrown );
                    console.log( jqXHR );
                    console.log( textStatus );
                }
            });

        });

        function validateEmail(email) {
            var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
            return re.test(email.toLowerCase());
        }

    });
})(jQuery);