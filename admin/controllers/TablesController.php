<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:41
 */

namespace controllers;

use config\App;
use models\TableRequests;
use DateTime;
use PHPMailer;

class tablesController extends BaseController
{
    public function indexAction(){
        if(!$this->checkAuth()){
            $this->goToRoute('auth');
        }
        $this->currentPage = 'tables';
        $this->from = new DateTime(!empty($_GET['from']) ? $_GET['from'] : 'now');
        $this->to = !empty($_GET['to']) ? new DateTime($_GET['to']) : null;
        if($this->to !== null && $this->to < $this->from){
            $this->to = $this->from;
        }
        $this->tables = TableRequests::getAllForPeriod($this->from, $this->to);
        $this->render();
    }

    public function orderAction(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            return $this->errorJSONResponse('Метод не доступен с этим HTTP-методом', 403);
        }
        if(!isset($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['date'])){
            return $this->errorJSONResponse('Не задан один из обязательных параметров', 500);
        }
        $table = new TableRequests();
        $table->name = trim($_POST['name']);
        if(!isset($table->name{2})){
            return $this->errorJSONResponse('Имя не может быть короче 3х символов', 501);
        }
        $table->email = $_POST['email'];
        if(preg_match(App::EMAIL_REGEXP, $table->email) == 0){
            return $this->errorJSONResponse('Не верный формат email', 501);
        }
        $table->phone = preg_replace('/[^A-Za-z0-9\+]/', '', $_POST['phone']);
        if(preg_match(App::PHONE_REGEXP, $table->phone) == 0) {
            return $this->errorJSONResponse('Не верный формат телефона', 502);
        }
        if(($table->date = date_create_from_format('d/m/Y H:i',$_POST['date'])) === false){
            return $this->errorJSONResponse('Не верный формат даты', 503);
        }
        $table->date = $table->date->format('Y-m-d H:i:s');
        $table->comment = $_POST['comment'];
        if(!$table->save()){
            return $this->errorJSONResponse('Не удалось забронировать столик', 504);
        }
        $mail = new PHPMailer();
        $mail->setFrom(App::SUPPORT_FROM_EMAIL, App::SUPPORT_NAME);
        $mail->addAddress(App::NOTIFICATION_EMAIL);
        $mail->Subject = '[no-reply] Новый заказ столика';
        $mail->Body = 'У вас есть новая бронь!<br>Имя: '.$table->name.
            '<br>Телефон: '.$table->phone.
            '<br>Email: '.$table->email.
            '<br>Комментарий: <br>'.$table->comment;
        return $this->successJSONResponse('Столик успешно забронирован');
    }
}