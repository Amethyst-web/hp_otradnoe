/**
 * Created by Nikita on 30.11.2015.
 */

$(document).ready(function(){
    $('#date-from, #date-to').datepicker({
        onSelect: changeDate
    }).change(changeDate);

    $('#tables').dataTable(dataTableOptions);

    $('#viewOrder').on('show.bs.modal', function (event) {
        var $button = $(event.relatedTarget);
        var data = $button.data();
        $modal = $(this);
        console.log(data);
        $modal.find('.modal-title').html('Заказ №'+data.id);
        $modal.find('#modal-date').html(data.date);
        $modal.find('#modal-name').html(data.name);
        $modal.find('#modal-phone').html(data.phone);
        $modal.find('#modal-email').html(data.email);
        var commentField = $modal.find('#modal-comment');
        if(data.comment.length === 0){
            commentField.hide().html('');
            commentField.prev().hide();
        } else {
            commentField.show().html(data.comment);
            commentField.prev().show();
        }
    });

    function changeDate(){
        redirrect(homePath+'?from='+$('#date-from').val()+'&to='+$('#date-to').val());
    }
});