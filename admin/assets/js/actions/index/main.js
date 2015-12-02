/**
 * Created by Nikita on 02.12.2015.
 */

$(document).ready(function(){
    dataTableOptions.oLanguage.oPaginate.sEmptyTable = 'Акций не найдено';
    dataTableOptions.oLanguage.sZeroRecords = 'Акций не найдено';
    $('#actions').dataTable(dataTableOptions);

    $('button.remove').click(function(){
        var $this = $(this);
        if(!confirm('Вы действительно хотите удалить эту акцию?')) return false;
        $.post(removePath, {id: $this.siblings('[name="action-id"]').val()}, function(data){
            if(data.result){
                successNoty(data.message);
                $this.parents('tr').remove();
            }else{
                errorNoty(data.error);
            }
        });
    });
    $('button.change-visible').click(function(){
        var $this = $(this);
        $.post(playPausePath, {status: $this.hasClass('btn-warning') ? 1 : 0, id: $this.siblings('[name="action-id"]').val()}, function(data){
            if(data.result){
                successNoty(data.message);
                if($this.hasClass('btn-warning')){
                    $this.removeClass('btn-warning').addClass('btn-success').html('<i class="fa fa-play"></i>');
                }else{
                    $this.removeClass('btn-success').addClass('btn-warning').html('<i class="fa fa-pause"></i>');
                }
            }else{
                errorNoty(data.error);
            }
        });
    });
});
