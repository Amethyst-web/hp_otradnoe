<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 22.11.2015
 * Time: 13:07
 */

namespace controllers;

class AuthController extends BaseController
{
    protected function render($layout = 'authLayout', $view = null){
        parent::render($layout, $view);
    }

    public function indexAction(){
        $this->render();
    }
}