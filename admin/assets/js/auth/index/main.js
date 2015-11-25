/**
 * Created by Koder on 22.11.2015.
 */

$(document).ready(function(){
    var loginAjax = false;
    $('#loginForm').submit(function(e){
        e.preventDefault();
        if(loginAjax) loginAjax.abort();
        var email = $(this).find('[name=email]').val();
        var pass = $(this).find('[name=password]').val();
        if(!checkEmail(email)){

        }

        loginAjax = $.ajax('/admin/auth/login', {
            dataType: 'json',
            data: {email: email, pass: pass},
            method: 'POST',
            success: function(data){
                checkData();
            }
        });
    });
});