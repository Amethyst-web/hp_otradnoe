/**
 * Created by Nikita on 05.12.2015.
 */
$(document).ready(function(){
    $("textarea[name=text]").wysihtml5();
    $("#start_at, #end_at").inputmask("dd.mm.yyyy", {"placeholder": "дд.мм.гггг"});
});