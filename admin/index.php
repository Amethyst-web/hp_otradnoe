<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 16:32
 */

header('Content-Type: text/html; charset=utf-8');
require 'core/Autoload.php';

define('DEV', isset($_GET['dev']));
define('INCLUDE_PATH', $_SERVER['DOCUMENT_ROOT'].'/admin/');

if(DEV){
    error_reporting(-1);
    ini_set('display_errors', 'On');
}


core\Autoload::load();

use config\App;

if(empty($_GET['action'])) {
    $_GET['action'] = App::DEFAULT_ACTION;
    if(empty($_GET['controller'])) {
        $_GET['controller'] = App::DEFAULT_CONTROLLER;
    }
}
$controller = $_GET['controller'].'Controller';
$action = $_GET['action'].'Action';

try{
    $controllerPath = INCLUDE_PATH.'controllers/' . $controller . '.php';
    if(!file_exists($controllerPath)) {
        throw new Exception($controllerPath);
    }
    require $controllerPath;
    $controllerClass = '\controllers\\'.$controller;
    if(!class_exists($controllerClass)){
        throw new Exception($controllerClass);
    }
    $selectedController = new $controllerClass();
} catch(Exception $ex){
    die('Такого контроллера не существует: '.$ex->getMessage());
}
if(method_exists($selectedController, 'beforeAction')){
    $selectedController->beforeAction();
}
if(!method_exists($selectedController, $action)) {
    die('Нет такого action\'a: '.$action);
}
$selectedController->{$action}();
