<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.12.2015
 * Time: 21:26
 */

namespace controllers;

use models\Actions;

class actionController extends BaseController
{
    public function indexAction(){
        if(!$this->checkAuth()){
            $this->goToRoute('auth');
        }
        $this->currentPage = 'actions';

        $this->render();
    }
}