<div id="login">
    <h1>Welcome Back!</h1>

    <form enctype="multipart/form-data" id="login" action="login" method="post" autocomplete="off">

        <div class="field-wrap">
            <label for="email">
                Email Address<span class="req">*</span>
            </label>
            <input id="email" type="email" required autocomplete="off" name="email" value="{{ old('email') }}" />
        </div>

        <div class="field-wrap">
            <label for="password">
                Password<span class="req">*</span>
            </label>
            <input id="password" type="password" required autocomplete="off" name="password"/>
        </div>

        <p class="forgot"><a href="password/reset">Forgot Password?</a></p>

        <button class="button button-block" name="login">Log In</button>

    </form>

    <script type="application/javascript">
        $('.form').find('input, textarea').on('keyup blur focus', function (e) {

            var $this = $(this),
                label = $this.prev('label');

            if (e.type === 'keyup') {
                if ($this.val() === '') {
                    label.removeClass('active highlight');
                } else {
                    label.addClass('active highlight');
                }
            } else if (e.type === 'blur') {
                if( $this.val() === '' ) {
                    label.removeClass('active highlight');
                } else {
                    label.removeClass('highlight');
                }
            } else if (e.type === 'focus') {

                if( $this.val() === '' ) {
                    label.removeClass('highlight');
                }
                else if( $this.val() !== '' ) {
                    label.addClass('highlight');
                }
            }

        });

        $('form#login').on('submit',function(e){
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').remove();
            $('.alert').remove();
            let form = $(this);
            form.find(':button[name=login]').prop('disabled', true);
            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: form.serialize(),
                dataType: "json",
                success: function(data) {
                    window.location = data.url;
                },
                error: function(error) {
                    form.find(':button[name=login]').prop('disabled', false);
                    if(error.responseJSON.message){
                        form.prepend('<div class="alert alert-warning" role="alert">'+error.responseJSON.message+'</div>');
                    }
                    if(error.responseJSON.errors) {
                        $.each(error.responseJSON.errors, function (key, val) {
                            var i = $('#' + key);
                            i.addClass('is-invalid');
                            $.each(val, function (k, v) {
                                i.after('<div class="invalid-feedback">' + v + '</div>');
                            });
                        });
                    }
                }
            });

        });
    </script>

</div>
