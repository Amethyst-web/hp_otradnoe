/**
 * Created by Nikita on 30.11.2015.
 */
(function( factory ) {
    if ( typeof define === "function" && define.amd ) {

        // AMD. Register as an anonymous module.
        define([ "../jquery.ui.datepicker" ], factory );
    } else {

        // Browser globals
        factory( jQuery.datepicker );
    }
}(function( datepicker ) {
    datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Назад',
        nextText: 'Вперёд',
        currentText: 'Сейчас',
        monthNames: ['январь', 'февраль', 'март', 'апрель', 'май', 'июнь',
            'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'],
        monthNamesShort: ['янв.', 'февр.', 'март', 'апр.', 'май', 'июнь',
            'июль', 'авг.', 'сент.', 'окт.', 'нояб.', 'дек.'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вс.', 'пн.', 'вт.', 'ср.', 'чт.', 'пт.', 'сб.'],
        dayNamesMin: ['В','П','В','С','Ч','П','С'],
        weekHeader: 'нед.',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    datepicker.setDefaults(datepicker.regional['ru']);

    return datepicker.regional['ru'];

}));