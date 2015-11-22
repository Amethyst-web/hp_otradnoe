<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:41
 */

namespace controllers;


class TablesController extends BaseController
{
    public function beforeAction(){
        if(!$this->checkAuth()){
            $this->redirect('/auth');
        }
    }

    public function indexAction(){
        $this->render();
    }
}