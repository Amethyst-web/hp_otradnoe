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

    $('body').scrollspy({
        target: 'nav.navbar-fixed-top',
        offset: 150
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

    $('#carousel_news').find('.item:eq(0)').addClass('active');
    $('#full_action').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var data = button.data();
        var modal = $(this);
        $(modal).find('img').attr('src',data.image);
        modal.find('#title').html(data.name);
        modal.find('#text').html(data.text);
        if(data.forever == 0){
            var interval = 'Время действия акции: ' + data.from;
            if(data.to.length !== 0){
                interval+=' - '+data.to;
            }
            modal.find('#interval').html(interval).show();
        } else {
            modal.find('#interval').hide();
        }
    })
});
