<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 16:32
 */

header('Content-Type: text/html; charset=utf-8');
require 'core/Autoload.php';

//define('DEV', isset($_GET['dev']));
define('DEV', true);
define('INCLUDE_PATH', $_SERVER['DOCUMENT_ROOT'].'/admin/');
define('CONTROLLERS_PATH', $_SERVER['DOCUMENT_ROOT'].'/admin/controllers/');
define('VIEWS_PATH', $_SERVER['DOCUMENT_ROOT'].'/admin/views/');

if(DEV){
    error_reporting(-1);
    ini_set('display_errors', 'On');
}


core\Autoload::load();

use config\App;

if(empty($_GET['action'])) {
    $_GET['action'] = App::DEFAULT_ACTION;
    if(empty($_GET['controller'])) {
        $_GET['controller'] = App::DEFAULT_ADMIN_CONTROLLER;
    }
}
$controller = $_GET['controller'].'Controller';
$action = $_GET['action'].'Action';

$params = explode('?',$_SERVER['REQUEST_URI'], 2);
if(isset($params[1])) {
    $params = explode('&',$params[1]);
    foreach ($params as $param) {
        $values = explode('=', $param, 2);
        $_GET[$values[0]] = $values[1];
    }
}

try{
    $controllerPath = CONTROLLERS_PATH . $controller . '.php';
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
$retData = $selectedController->{$action}();
if($retData !== null){
    die($retData);
}