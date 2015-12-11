$(window).load(function() {
    $('.carousel-indicators.top').centerTop().removeClass('hidden');
});

var map;
function initMap() {
    map = new google.maps.Map(document.getElementById('mapContainer'), {
        center: {lat: 55.8641994, lng: 37.6049793},
        zoom: 17,
        scrollwheel: false,
        styles: [
            {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [
                    { "color": "#D76964" }
                ]
            },{
                "featureType": "road",
                "elementType": "labels.text",
                "stylers": [
                    { "color": "#7D2A25" },
                    { "weight": 1.3 }
                ]
            },{
                "featureType": "poi",
                "stylers": [
                    { "visibility": "off" }
                ]
            },{
                "elementType": "geometry.fill",
                "stylers": [
                    { "hue": "#ff0000" },
                    { "saturation": 72 },
                    { "lightness": -9 }
                ]
            },{
                "featureType": "administrative",
                "elementType": "labels",
                "stylers": [
                    { "color": "#A4322D" }
                ]
            },{
                "featureType": "landscape.man_made",
                "elementType": "geometry.stroke",
                "stylers": [
                    { "color": "#DB7873" }
                ]
            },{
                "featureType": "landscape.man_made",
                "elementType": "geometry.fill"  },{
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [
                    { "color": "#FFFFFF" }
                ]
            },{
                "featureType": "transit",
                "elementType": "labels",
                "stylers": [
                    { "weight": 3.3 }
                ]
            },{
                "stylers": [
                    { "hue": "#ff0000" }
                ]
            }
        ]
    });
    var marker = new google.maps.Marker({
        position: {lat: 55.8650661, lng: 37.6051401},
        map: map,
        title: 'Hello World!'
    });
}

$(document).ready(function() {
    'use strict';
    //центрирование модальных окон и кружков слайдера
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
        $('.carousel-indicators.top').centerTop();
    });

    jQuery.fn.centerTop = function () {
        var parent = this.parent();
        this.css("position","absolute");
        this.css("top", Math.max(0, ((parent.height() - $(this).outerHeight()) / 2) + parent.scrollTop()) + "px");
        //this.css("left", Math.max(0, ((parent.width() - $(this).outerWidth()) / 2) + parent.scrollLeft()) + "px");
        return this;
    };

    $('.scrollbar-inner').scrollbar();

    $.scrollport({
        delta: 120,
        mode: 'usual',
    });

    $('[href="#map"]').on('click', function(event) {
        event.preventDefault();
        $.scrollport( '#map', {
            delta: 100,
        });
    });

    $('[href="#main"]').on('click', function(event) {
        event.preventDefault();
        $.scrollport( '#main', {
            delta: 0,
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
            $.ajax({
                url: '/admin/tables/order',
                type: 'POST',
                dataType: 'json',
                data: $(form).serialize(),
            })
            .done(function(data) {
                if (data.result && data.message) {
                    jq_modal.modal('show');
                    //$('.js_any_error').removeClass('hidden').text('Заявка отправлена!');
                    setTimeout(function() {
                        //$('.js_any_error').addClass('hidden');
                        jq_modal.modal('hide');
                    } , 2000);
                    $(form).find('input, textarea').val('');
                }
            })
            .fail(function() {
            })
            .always(function() {
            });
        },
        invalidHandler: function(event, validator) {
            //$('.js_any_error').removeClass('hidden').text('Проверьте правильность ввода данных!');
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
