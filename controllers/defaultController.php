<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:41
 */

namespace controllers;

use models\TableRequests;
use DateTime;

class defaultController extends BaseController
{
    public function indexAction(){
        $this->render();
    }
}