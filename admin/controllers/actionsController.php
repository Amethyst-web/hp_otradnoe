<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.12.2015
 * Time: 21:26
 */

namespace controllers;

use models\Actions;

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
}