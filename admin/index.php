<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 16:32
 */

header('Content-Type: text/html; charset=utf-8');
require 'core/Autoload.php';

if(isset($_GET['dev'])){
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
$controller = $_GET['controller'];
$action = $_GET['action'];

try{
    if(!file_exists('../controllers/' . $controller . 'Controller.php')) {
        throw new Exception();
    }
    $selectedController = new $controller();
} catch(Exception $ex){
    die('Такого контроллера не существует.');
}
if(method_exists($selectedController, $action)) {
    $selectedController->{$action}();
} else {
    die('Нет такого action\'a');
}
