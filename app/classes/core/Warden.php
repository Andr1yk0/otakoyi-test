<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 20.11.2016
 * Time: 14:56
 */

namespace App\core;


class Warden {
    static function onlyAdmin()
    {
        return App::isAdmin();
    }

    static function onlyGuest()
    {
        return !App::isAdmin();
    }
}