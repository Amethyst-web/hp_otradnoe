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

    $.scrollport({
        delta: 120,
        mode: 'soft',
    });
    $('[href="#map"]').on('click', function(event) {
        event.preventDefault();
        console.log('click');
        $.scrollport( '#map', {
            delta: 100,
        });
    });



    var $form = $("#zakaz_form");
    $form.validate({
      lang: 'ru',
      rules: {
        name: {
            required: true,
            minlength: 3
        },
        phone: {
            required: true,
        },
        date: {
            required: true
        },
        email: {
          required: true,
          email: true
        },
        comment: {
            maxlength: 5000
        }
      },
        submitHandler: function(form) {
            var jq_modal = $('#zakaz_form_modal');
            console.log('submit');
            $.ajax({
                url: '/admin/tables/order',
                type: 'POST',
                dataType: 'json',
                data: $(form).serialize(),
            })
            .done(function(data) {
                if (data.result && data.message) {
                    jq_modal.find('modal-content').append('<p>' + data.message + '</p>');
                    jq_modal.modal('show');
                    console.log("success");
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        }
    });

    $form.find("[name='phone']").inputmask("+7(999)999-99-99");
    $form.find("[name='date']").inputmask("datetime", { "placeholder": "дд.мм.гггг чч:мм" });

});
