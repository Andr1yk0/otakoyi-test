<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 16.11.2016
 * Time: 20:10
 */

namespace App\controllers;


use App\core\App;
use App\core\BaseController;
use App\core\Db;
use App\core\Request;
use App\core\Validator;

class TestingController extends BaseController
{
    function index()
    {
        $cont = new RecordsController(new Request());
        $res = $cont->validate(array('captcha'=>'sllldf'));
    }
}