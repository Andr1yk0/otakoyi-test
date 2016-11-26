<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 16.11.2016
 * Time: 1:24
 */

namespace App\core;
use App\View;

class BaseController {
    protected $view;
    protected $request;
    public $validation_rules;
    public $access_rules = array();
    function __construct(Request $request){
        $this->view = new View();
        $this->request = $request;
    }

    function goHome(){
        header("Location: /");
    }

    /**
     * @param array $data
     * @param array $rules
     * @return Validator
     */
    function validate(array $data, array $rules=array()){
        $validator = new Validator();
        if(empty($rules)){
            $rules = $this->validation_rules;
        }
        $validator->validate($data, $rules);
        return $validator;
    }

}