<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 19.11.2016
 * Time: 12:02
 */

namespace App\core;


class Request {
    private $get;
    private $post;
    private $path;
    function __construct(){
        $this->get = $this->sanitize($_GET);
        $this->post = $this->sanitize($_POST);
        $this->path = ltrim($_SERVER['REQUEST_URI'],'/');
    }

    function sanitize($data){
        if(is_array($data)){
            $array = $data;
            foreach($array as $key=>$value){
                $data[$key]=htmlspecialchars(trim($value));
            }
        }
        return $data;
    }


    function get($name=null){
        if($name){
            return $this->get[$name];
        }else{
            return $this->get;
        }
    }

    function post($name=null){
        if($name){
            return $this->post[$name];
        }else{
            return $this->post;
        }
    }

    function getPath(){
        return $this->path;
    }
}