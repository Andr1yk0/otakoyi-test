<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 18.11.2016
 * Time: 1:46
 */

namespace App\core;


class Session {
    static function start(){
        session_start();
    }

    static function set($name, $value){
        $_SESSION[$name]=$value;
    }

    static function get($name){
        return isset($_SESSION[$name])?$_SESSION[$name]:null;
    }

    static function remove($name){
        unset($_SESSION[$name]);
    }


}