/**
 * Created by Koder on 22.11.2015.
 */

$(document).ready(function(){
    var loginAjax = false;
    $('#loginForm').submit(function(e){
        e.preventDefault();
        $('.has-error').removeClass('has-error');
        var $form = $(this),
            $email = $form.find('[name=email]'),
            $pass = $form.find('[name=password]');
        $email.tooltip('destroy');
        $pass.tooltip('destroy');
        if(loginAjax) loginAjax.abort();
        var email = $email.val().trim();
        var pass = $pass.val().trim();
        var errors = 0;
        if(!checkEmail(email)){
            $email.parents('.form-group').addClass('has-error');
            $email.tooltip({
                placement: 'right',
                title: 'Не верный email (example@example.com)'
            }).tooltip('show');
            errors++;
        }
        if(pass.length === 0){
            $pass.parents('.form-group').addClass('has-error');
            $pass.tooltip({
                placement: 'right',
                title: 'Введите пароль'
            }).tooltip('show');
            errors++;
        }
        if(errors !== 0) return false;

        loginAjax = $.ajax(loginPath, {
            dataType: 'json',
            data: {email: email, pass: pass},
            method: 'POST',
            success: function(data){
                if(!checkData(data)) return false;
                if(!data.result){
                    errorNoty(data.error);
                    return false;
                } else {
                    var options = {
                        expires: $form.find('[name=remember_me]').is(':checked') ? 3650 : null,
                        path: '/'
                    };
                    $.cookie('UID', data.data.UID, options);
                    $.cookie('token', data.data.token, options);
                    redirrect(homePath);
                }

            },
            error: function(){
                techErrorNotify();
                return false;
            }
        });
    });
});