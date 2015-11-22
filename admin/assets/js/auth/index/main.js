/**
 * Created by Koder on 22.11.2015.
 */

$(document).ready(function(){
    $('#loginForm').submit(function(e){
        e.preventDefault();
    }).validate({
        submitHandler: function(form){
            console.log($(form));
            $.ajax('/admin/auth/login', {
                dataType: 'json',
                data: {email: $(form).find('[name=email]').val(), pass: $(form).find('[name=password]')},
                method: 'GET'
            });
            return false;
        }
    });
});