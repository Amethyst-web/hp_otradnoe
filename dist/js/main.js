$(document).ready(function() {
    'use strict';
    function centerModal() {
        $(this).css('display', 'block');
        var $dialog  = $(this).find(".modal-dialog"),
        offset       = ($(window).height() - $dialog.height()) / 2,
        bottomMargin = parseInt($dialog.css('marginBottom'), 10);

        if(offset < bottomMargin) offset = bottomMargin;
        $dialog.css("margin-top", offset);
    }

    $(document).on('show.bs.modal', '.modal', centerModal);
    $(window).on("resize", function () {
        $('.modal:visible').each(centerModal);
    });

    $('.scrollbar-inner').scrollbar();

    $("#zakaz_form").validate({
      lang: 'ru',
      rules: {
        name: {
            required: true,
            minlength: 3
        },
        tel: "required",
        date: {
            required: true
        },
        email: {
          required: true,
          email: true
        },
        message: {
            maxlength: 5000
        }
      },
        submitHandler: function(form) {
            console.log('submit');
            $.ajax({
                url: '/',
                type: 'POST',
                dataType: 'json',
                data: $(form).serialize(),
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        }
    });

    $("#zakaz_form [name='tel']").inputmask("+7(999)999-99-99");
    $("#zakaz_form [name='date']").inputmask("d.m.y h:m", { "placeholder": "дд.мм.гггг чч:мин" });

});
