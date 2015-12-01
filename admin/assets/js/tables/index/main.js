/**
 * Created by Nikita on 30.11.2015.
 */

$(document).ready(function(){
    $('#date-from, #date-to').datepicker({
        onSelect: changeDate
    }).change(changeDate);

    $('#tables').dataTable({
        "oLanguage": {
            "oAria": {
                "sSortAscending": 'Сортировать по возрастанию',
                "sSortDescending": 'Сортировать по убыванию'
            },
            "oPaginate": {
                "sFirst": 'В начало',
                'sLast': 'В конец',
                'sNext': 'Следующая',
                'sPrevious': 'Предыдущая',
                'sEmptyTable': 'Не найдено забронированных столиков'
            },
            'sInfo': 'Показано с _START_ по _END_ из _TOTAL_ записей',
            'sInfoEmpty': 'Нет записей',
            'sInfoFiltered': '(отфильтровано из всего _MAX_ записей)',
            'sLengthMenu': 'Показывать по _MENU_ записей',
            'sLoadingRecords': 'Загрузка...',
            'sProcessing': 'Обработка...',
            'sSearch': 'Поиск:',
            'sZeroRecords': 'Не найдено забронированных столиков'
        }
    });

    function changeDate(){
        redirrect(homePath+'?from='+$('#date-from').val()+'&to='+$('#date-to').val());
    }
});