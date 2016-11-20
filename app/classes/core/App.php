<?php
namespace App\core;

use Gregwar\Captcha\CaptchaBuilder;

class App {
    private static $local_configs = array();
    private static $common_configs = array();
    static $user = null;
    public function __construct(){
        self::$common_configs = include BASE_PATH.'/app/configs/common.php';
        self::$local_configs = include BASE_PATH."/app/configs/local.php";
    }

    public function start(){
        Db::connect();
        Session::start();
        $router = new Router(self::getCommonConfigs('router'));
        $router->callAction();
    }

    static function isAdmin(){
        return Session::get('user_id')?true:false;
    }

    static function getLocalConfigs($name){
        return isset(self::$local_configs[$name])?self::$local_configs[$name]:false;
    }

    static function getCommonConfigs($name){
        return isset(self::$common_configs[$name])?self::$common_configs[$name]:false;
    }

    static function buildCaptcha(){
        $captcha = new CaptchaBuilder();
        $captcha->build();
        Session::add('captcha_phrase',$captcha->getPhrase());
        return $captcha;
    }

    static function getClientIp(){
        $ip = 'Не визначено';
        if ($_SERVER['HTTP_CLIENT_IP'])
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        else if($_SERVER['HTTP_X_FORWARDED_FOR'])
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if($_SERVER['HTTP_X_FORWARDED'])
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        else if($_SERVER['HTTP_FORWARDED_FOR'])
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        else if($_SERVER['HTTP_FORWARDED'])
            $ip = $_SERVER['HTTP_FORWARDED'];
        else if($_SERVER['REMOTE_ADDR'])
            $ip = $_SERVER['REMOTE_ADDR'];

        return $ip;
    }

    static function getClientBrowserName(){
        return get_browser()->browser;
    }
}