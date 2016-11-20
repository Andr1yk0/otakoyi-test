<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 15.11.2016
 * Time: 23:51
 */
namespace App\core;

use App\controllers\ErrorController;

class Router {
    private $request;
    private $controller, $action, $params=[], $configs=[];

    function __construct($configs){
        $this->request = new Request();
        $this->configs = $configs;
        $this->controller = $configs['default_controller'];
        $this->action = $configs['default_action'];
        $this->parseUrl();
    }

    private function parseUrl(){
        $elements = explode('/',$this->request->getPath());
        if($elements[0]){
            $this->controller = ucfirst($elements[0]).'Controller';
        }

        if($elements[1]){
            $this->action = $elements[1];
        }

        if($elements[2]){
            for($i=2;$i<count($elements);$i++){
                $this->params[] = $elements[$i];
            }
        }
    }

    function callAction(){
        $controller_path = $this->configs['controller_namespace'].$this->controller;
        if(method_exists($controller_path,$this->action)){
            $controller_obj = new $controller_path($this->request);
            if(!$this->isActionAllowed($controller_obj)){
                (new ErrorController($this->request))->noRights();
            }else{
                call_user_func_array(array($controller_obj,$this->action),$this->params);
            }
        }else{
            (new ErrorController($this->request))->page404();
        }
    }

    function isActionAllowed(BaseController $controller){
        if(!empty($controller->access_rules)){
            foreach($controller->access_rules as $rule => $actions){
                if(in_array($this->action,$actions)){
                    return Warden::$rule();
                }
            }
        }
        return true;
    }


}