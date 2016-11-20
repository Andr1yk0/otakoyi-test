<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 19.11.2016
 * Time: 11:16
 */

namespace App\core;


class Validator {
    public $errors=[];
    public $error_msg = array();
    function __construct(){
        $this->error_massages = include BASE_PATH."/app/configs/validation.php";
    }

    function passed(){
        return empty($this->errors)?true:false;
    }

     function validate(array $data, array $rules){
        foreach($data as $field=>$value){
            if(isset($rules[$field])){
                $rules_array = explode('|',$rules[$field]);
                $failed_rules = $this->getFailedRules($rules_array,$value);
                if(!empty($failed_rules)){
                    foreach($failed_rules as $rule_name){
                        $this->errors[$field][] = $this->error_massages[$rule_name]?$this->error_massages[$rule_name]:$this->error_massages['default'];
                    }
                }
            }
        }
         return empty($this->errors)?true:$this->errors;
    }

    public function getFailedRules(array $rules_array, $value){
        $failed = array();
        foreach($rules_array as $rule_name){
            if(method_exists($this,$rule_name)){
                if(!$this->$rule_name($value)){
                    $failed[] = $rule_name;

                };
            }

        }
        return $failed;
    }

    public function number($val){
        return ctype_digit($val);
    }

    public function email($val){
        return filter_var($val,FILTER_VALIDATE_EMAIL);
    }

    public function captcha($val){
        return $val===Session::get('captcha_phrase');
    }

    public function required($val){
        return $val?true:false;
    }
}