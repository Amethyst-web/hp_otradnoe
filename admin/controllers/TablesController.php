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

class TablesController extends BaseController
{
    public function beforeAction(){
        if(!$this->checkAuth()){
            $this->goToRoute('auth');
        }
    }

    public function indexAction(){
        $this->currentPage = 'tables';
        $this->from = new DateTime(!empty($_GET['from']) ? $_GET['from'] : 'now');
        $this->to = !empty($_GET['to']) ? new DateTime($_GET['to']) : null;
        $this->tables = TableRequests::getAllForPeriod($this->from, $this->to);
        $this->render();
    }
}