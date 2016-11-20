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
        $this->setAppOptions();
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

    private function setAppOptions(){
        if($this->getLocalConfigs('debug')){
            ini_set('display_errors','On');
        }else{
            ini_set('display_errors','Off');
        }
    }

    /**
     *
     * source http://stackoverflow.com/questions/2257597/reliable-user-browser-detection-with-php
     * @return string
     */
    static function getClientBrowserName(){
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
            return 'Internet explorer';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
            return 'Internet explorer';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'OPR') !== FALSE)
            return "Opera";
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
            return 'Firefox';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
            return 'Google Chrome';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
            return "Safari";
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
            return "Opera Mini";
        else
            return 'Не визначено';
    }
}