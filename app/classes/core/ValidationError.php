<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 21.11.2016
 * Time: 18:38
 */

namespace App\core;


class ValidationError
{
    private $rule_name;
    private $rule_params = null;
    private $val_marker = '{val}';
    public $error_msg;
    public $field;

    function __construct($rule_name, $field, array $rule_params=array())
    {
        $massages_arr = App::getCommonConfigs('validation_massages');
        if(isset($massages_arr[$rule_name])){
            $this->error_msg = $this->insertValuesInMassage($massages_arr[$rule_name],$rule_params);
        }else{
            $this->error_msg = $massages_arr['default'];
        }
        $this->rule_name = $rule_name;
        $this->rule_params = $rule_params;
        $this->field = $field;
    }

    function insertValuesInMassage($massage, array $rule_params){
        if(!empty($rule_params)){
            foreach($rule_params as $param){
                $massage = str_replace($this->val_marker, $param, $massage);
            }
        }
        return $massage;
    }
}