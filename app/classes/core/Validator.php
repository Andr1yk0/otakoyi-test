<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 19.11.2016
 * Time: 11:16
 */

namespace App\core;


class Validator
{
    public $errors = array();


    function passed()
    {
        return empty($this->errors) ? true : false;
    }

    function validate(array $data, array $rules)
    {
        foreach ($data as $field => $value) {
            if (isset($rules[$field])) {
                $rules_array = explode('|', $rules[$field]);
                foreach ($rules_array as $rule_string) {

                    //розбиваємо рядок з правилом на складові (назва методу та його параметри)
                    $rule_array = explode(':', $rule_string);

                    //назва методу
                    $func_name = $rule_array[0];

                    //параметри методу валідації
                    $rule_params = $rule_array;
                    array_shift($rule_params);

                    //формування масиву з параметрами для методу
                    $func_params = $rule_array;
                    $func_params[0] = $value;

                    $res = call_user_func_array(array($this, $func_name), $func_params);
                    if (!$res) {
                        $this->errors[] = new ValidationError($func_name, $field, $rule_params);
                    };
                }
            }
        }
    }

    public function number($val)
    {
        return ctype_digit($val);
    }

    public function email($val)
    {
        return filter_var($val, FILTER_VALIDATE_EMAIL);
    }

    public function captcha($val)
    {
        return $val === Session::get('captcha_phrase');
    }

    public function required($val)
    {
        return $val ? true : false;
    }

    public function max_length($val, $limit)
    {
        return strlen($val) <= intval($limit);
    }

    public function length($val, $len){
        return strlen($val) == intval($len);
    }

    function getValidationResult(){
        if(empty($this->errors)){
            return true;
        }else{
            $res = array();
            foreach($this->errors as $error){
                $res[$error->field][] = $error->error_msg ;
            }
            return $res;
        }
    }
}