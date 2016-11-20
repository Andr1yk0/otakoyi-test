<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 16.11.2016
 * Time: 14:00
 */

namespace App\controllers;


use App\core\App;
use App\core\BaseController;
use App\core\Session;

class AuthController extends BaseController{
    public $access_rules = [
        'onlyAdmin'=>['logout'],
        'onlyGuest'=>['login']
    ];
    public function login(){
        $login_data = App::getCommonConfigs('login');
        $input = $this->request->post();
        if($login_data['email']===$input['email']&&$login_data['password']===$input['password'])
            Session::add('user_id',1);
        $this->goHome();

    }
    public function logout()
    {
        Session::remove('user_id');
        $this->goHome();
    }
}