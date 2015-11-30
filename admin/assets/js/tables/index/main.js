/**
 * Created by Nikita on 30.11.2015.
 */

$(document).ready(function(){
    $('#date-from, #date-to').datepicker({
        onSelect: changeDate
    }).change(changeDate);

    function changeDate(){
        redirrect(homePath+'?from='+$('#date-from').val()+'&to='+$('#date-to').val());
    }
});