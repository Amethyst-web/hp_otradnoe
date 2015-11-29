/**
 * Created by Nikita on 25.11.2015.
 */

function checkData(data){
    console.log(data);
    if(!isObject(data)){
        techErrorNotify();
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

function techErrorNotify(timeout){
    return warningNoty('Не удалось получить ответ от сервера, проверьте подключение к интернету и попробуйте снова.', timeout);
}

function warningNoty(message, timeout, callback){
    return initNoty(message, 'warning', timeout, callback);
}

function successNoty(message, timeout, callback){
    return initNoty(message, 'success', timeout, callback);
}

function errorNoty(message, timeout, callback){
    return initNoty(message, 'error', timeout, callback);
}

function initNoty(message, type, timeout, callback){
    type = type || 'alert';
    timeout = typeof timeout !== 'undefined' && timeout !== null ? timeout : 2000;
    return noty({
        layout: 'topRight',
        type: type,
        text: message, // can be html or string
        timeout: timeout, // delay for closing event. Set false for sticky notifications
        callback: {
            onClose: callback
        }
    });
}

function timeoutRedirect(path, timeout){
    path = path || '/';
    timeout = timeout || 2000;
    setTimeout(function(){
        redirrect(path);
    }, timeout)
}

function redirrect(path){
    location.href = path;
}