<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 16.11.2016
 * Time: 1:35
 */

namespace App\controllers;


use App\core\BaseController;

class ErrorController extends BaseController {
    function page404(){
        $this->view->make('errors/404.tpl');
    }

    function noRights(){
        $this->view->make('errors/no_rights.tpl');
    }
}