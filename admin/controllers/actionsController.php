<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.12.2015
 * Time: 21:26
 */

namespace controllers;

use config\App;
use Exception;
use models\Actions;
use DateTime;

class actionsController extends BaseController
{
    public function indexAction(){
        if(!$this->checkAuth()){
            $this->goToRoute('auth');
        }
        $this->currentPage = 'actions';

        $this->actions = Actions::getAllNotRemoved();
        $this->render();
    }

    public function createAction(){
        if(!$this->checkAuth()){
            $this->goToRoute('auth');
        }
        $this->currentPage = 'actions';

        if(isset($_GET['id'])){
            if(($this->action = Actions::getOne(['id' => $_GET['id']])) === false){
                throw new Exception('Такой акции не существует');
            }
        } else {
            $this->action = new Actions();
        }
        if(!empty($this->action->start_at)) {
            $this->action->start_at = DateTime::createFromFormat('Y-m-d H:i:s', $this->action->start_at)->format('d.m.Y');
        }
        if(!empty($this->action->end_at)) {
            $this->action->end_at = DateTime::createFromFormat('Y-m-d H:i:s', $this->action->end_at)->format('d.m.Y');
        }
        $this->errors = [];
        if(isset($_POST['save'])){
            $this->action->name = $_POST['name'];
            if(!isset($this->action->name{0})){
                $this->errors['name'] = 'Название акции не может быть пустым';
            }if(isset($this->action->name{255})){
                $this->errors['short_text'] = 'Название акции не может быть длиннее 255 символов';
            }
            $this->action->short_text = $_POST['short_text'];
            if(!isset($this->action->short_text{0})){
                $this->errors['short_text'] = 'Краткое описание акции не может быть пустым';
            }elseif(isset($this->action->short_text{255})){
                $this->errors['short_text'] = 'Краткое описание акции не может быть длиннее 255 символов';
            }
            $this->action->text = $_POST['text'];
            if(!isset($this->action->text{0})){
                $this->errors['text'] = 'Полное описание акции не может быть пустым';
            }
            if(($this->action->start_at = DateTime::createFromFormat('d.m.Y', $_POST['start_at'])) === false){
                $this->errors['start_at'] = 'Дата не верного формата';
            }
            $this->action->forever = isset($_POST['forever']);
            if(!$this->action->forever) {
                $this->action->end_at = $_POST['end_at'];
                if (isset($this->action->end_at{0})) {
                    if (($this->action->end_at = DateTime::createFromFormat('d.m.Y', $_POST['end_at'])) === false) {
                        $this->errors['end_at'] = 'Дата не верного формата';
                    } elseif (!isset($this->errors['start_at']) && $this->action->end_at < $this->action->start_at) {
                        $this->errors['end_at'] = 'Дата окончания не может быть меньше даты начала';
                    }
                    if(!isset($this->errors['start_at'])){
                        $this->action->end_at = $this->action->end_at->format('d.m.Y');
                    }
                } else {
                    $this->errors['end_at'] = 'Если акция не бесконечная, дата окончания не может быть пустой';
                }
            } else {
                $this->action->end_at = null;
            }
            if(!isset($this->errors['start_at'])){
                $this->action->start_at = $this->action->start_at->format('d.m.Y');
            }
            $this->action->visible = isset($_POST['visible']);
            if(empty($this->action->main_image) || !empty($_FILES['main_image']['tmp_name'])) {
                if (!empty($_FILES['main_image']['tmp_name'])) {
                    $check = getimagesize($_FILES['main_image']['tmp_name']);
                    if ($check === false) {
                        $this->errors['main_image'] = 'Файл должен быть изображением';
                    }
                } else {
                    $this->errors['main_image'] = 'Выберите файл';
                }
            }
            if(empty($this->action->detail_image) || !empty($_FILES['detail_image']['tmp_name'])) {
                if (!empty($_FILES['detail_image']['tmp_name'])) {
                    $check = getimagesize($_FILES['detail_image']['tmp_name']);
                    if ($check === false) {
                        $this->errors['detail_image'] = 'Файл должен быть изображением';
                    }
                } else {
                    $this->errors['detail_image'] = 'Выберите файл';
                }
            }
            if(sizeof($this->errors) === 0) {
                if(empty($this->action->main_image) || !empty($_FILES['main_image']['tmp_name'])) {
                    $imageFileType = pathinfo($_FILES['main_image']['name'], PATHINFO_EXTENSION);
                    $this->action->main_image = md5(time()) . '.' . $imageFileType;
                    if (!move_uploaded_file($_FILES['main_image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].App::ACTION_MAIN_IMAGE_DIR. $this->action->main_image)) {
                        $this->errors['main_image'] = 'При загрузке файла произошла ошибка. Попробуйте снова';
                    }
                }
                if(empty($this->action->detail_image) || !empty($_FILES['detail_image']['tmp_name'])) {
                    $imageFileType = pathinfo($_FILES['detail_image']['name'], PATHINFO_EXTENSION);
                    $this->action->detail_image = md5(time()) . '.' . $imageFileType;
                    if (!move_uploaded_file($_FILES['detail_image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].App::ACTION_DETAIL_IMAGE_DIR. $this->action->detail_image)) {
                        $this->errors['detail_image'] = 'При загрузке файла произошла ошибка. Попробуйте снова';
                    }
                }
                if(sizeof($this->errors) === 0){
                    $this->action->start_at = DateTime::createFromFormat('d.m.Y', $this->action->start_at)->format('Y-m-d H:i:s');
                    if(!empty($this->action->end_at)) {
                        $this->action->end_at = DateTime::createFromFormat('d.m.Y', $this->action->end_at)->format('Y-m-d H:i:s');
                    }
                    if($this->action->save()) {
                        $this->goToRoute('actions');
                    }
                } else {
                    $this->errors['global'] = 'При сохранении акции произошла ошибка. Попробуйте снова';
                }
            }
        }
        $this->render();
    }

    public function removeAction(){
        if(!$this->checkAuth()){
            $this->goToRoute('auth');
        }
        if(!isset($_POST['id'])){
            return $this->errorJSONResponse('Недостаточно параметров');
        }
        $action = new Actions($_POST['id']);
        if($action->id == -1){
            return $this->errorJSONResponse('Не удалось найти акцию', 501);
        }
        $action->removed = 1;
        if(!$action->save()){
            return $this->errorJSONResponse('Не удалось удалить акцию', 502);
        }
        return $this->successJSONResponse('Акция успешно удалена');
    }

    public function playPauseAction(){
        if(!$this->checkAuth()){
            $this->goToRoute('auth');
        }
        if(!isset($_POST['id'], $_POST['status'])){
            return $this->errorJSONResponse('Недостаточно параметров');
        }
        $action = new Actions($_POST['id']);
        if($action->id == -1){
            return $this->errorJSONResponse('Не удалось найти акцию', 501);
        }
        $action->visible = $_POST['status'];
        if(!$action->save()){
            return $this->errorJSONResponse('Не удалось изменить статус', 502);
        }
        return $this->successJSONResponse('Статус успешно изменён');
    }

    public function getActive(){
        $actions = Actions::getActive();
        return $this->successJSONResponse('Все активные акции', $actions);
    }
}