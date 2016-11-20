<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 20.11.2016
 * Time: 10:57
 */

namespace App\controllers;


use App\core\App;
use App\core\BaseController;

class SiteController extends BaseController{
    function captcha(){
        echo App::buildCaptcha()->inline();
    }
}