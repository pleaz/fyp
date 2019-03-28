<div id="signup">
    <h1>Sign Up for Free</h1>

    <form enctype="multipart/form-data" id="register" action="register" method="post" autocomplete="off">

        <div class="top-row">
            <div class="field-wrap name">
                <label for="name">
                    First Name<span class="req">*</span>
                </label>
                <input id="name" type="text" required autocomplete="off" name='name' />
            </div>

            <div class="field-wrap surname">
                <label for="surname">
                    Last Name<span class="req">*</span>
                </label>
                <input id="surname" type="text" required autocomplete="off" name='surname' />
            </div>
        </div>

        <div class="field-wrap email">
            <label for="email">
                Email Address<span class="req">*</span>
            </label>
            <input id="email" type="email" required autocomplete="off" name='email' />
        </div>

        <div class="field-wrap password">
            <label for="password">
                Set A Password<span class="req">*</span>
            </label>
            <input id="password" type="password" required autocomplete="off" name='password'/>
        </div>

        <div class="field-wrap password-confirm">
            <label for="password-confirm">
                Confirm A Password<span class="req">*</span>
            </label>
            <input id="password-confirm" type="password" required autocomplete="off" name='password_confirmation'/>
        </div>

        <div class="field-wrap street_number">
            <label for="street_number">
                Street Number<span class="req">*</span>
            </label>
            <input id="street_number" type="text" autocomplete="off" name='street_number'/>
        </div>

        <div class="field-wrap street">
            <label for="street">
                Street Name<span class="req">*</span>
            </label>
            <input id="street" type="text" autocomplete="off" name='street'/>
        </div>

        <div class="field-wrap city">
            <label for="city">
                City<span class="req">*</span>
            </label>
            <input id="city" type="text" autocomplete="off" name='city'/>
        </div>

        <div class="field-wrap postcode">
            <label for="postcode">
                Postcode<span class="req">*</span>
            </label>
            <input id="postcode" type="text" autocomplete="off" name='postcode'/>
        </div>

        <div class="field-wrap description">
            <label for="description">
                Description<span class="req">*</span>
            </label>
            <input id="description" type="text" required autocomplete="off" name='description'/>
        </div>

        <div class="field-wrap" style="display: flex">
            <label>
                Are you an artist or customer?<span class="req">*</span>
            </label>
            <label for="artist" class="container"><input id="artist" value="artist" type="radio" checked="checked" name="user_type">Artist</label>
            <label for="customer" class="container"><input id="customer" value="customer" type="radio" name="user_type">Customer</label>
        </div>

        <div class="field-wrap">
            <div class="avatar">
                <label for="avatar">
                    Avatar<span class="req">*</span>
                </label>
                <input id="avatar" type="file" name="avatar" accept="image/*" style="color: transparent"/>
            </div>
        </div>

        <button type="submit" class="button button-block" name="register">Register</button>

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

        $('input#artist').on('change',function(e){
            $('.street_number, .street, .city, .postcode').show();
        });
        $('input#customer').on('change',function(e){
            $('.street_number, .street, .city, .postcode').hide();
        });

        $('form#register').on('submit',function(e){
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').remove();
            $('.alert').remove();
            let form = $(this);
            form.find(':button[name=register]').prop('disabled', true);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: new FormData(form[0]),
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(data) {
                    window.location = data.url;
                },
                error: function(error) {
                    form.find(':button[name=register]').prop('disabled', false);
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
