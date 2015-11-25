/**
 * Created by Nikita on 25.11.2015.
 */

function checkData(data){
    if(!isObject(data)){
        techErrorNotify('Технические неполадки!','Не удалось получить ответ от сервера, проверьте подключение к интернету и попробуйте снова.');
        return false;
    }
    return true;
}

function isObject(data){
    return !((data === null) || (data === undefined) || (data.constructor !== {}.constructor));
}

var phoneExpr = /^\+7 \(\d{3}\) \d{3}\-\d{2}-\d{2}( x\d{1,6})?$/;
var dateExpr  = /^\d\d\.\d\d\.\d\d\d\d$/;
var emailExpr = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

function checkPhone(value){
    return phoneExpr.test(value);
}

function checkDate(value){
    return dateExpr.test(value);
}

function checkEmail(value){
    return emailExpr.test(value);
}

function techErrorNotify(){
    return initNoty(message, 'error', timeout);
}

function successNoty(message, timeout){
    return initNoty(message, 'success', timeout);
}

function errorNoty(message, timeout){
    return initNoty(message, 'error', timeout);
}

function initNoty(message, type, timeout){
    type = type || 'alert';
    timeout = timeout || 1500;
    return noty({
        layout: 'topRight',
        type: type,
        text: message, // can be html or string
        timeout: timeout // delay for closing event. Set false for sticky notifications
    });
}