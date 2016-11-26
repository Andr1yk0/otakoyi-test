<?php
return array(
    'router'=>array(
        'default_controller'=>'RecordsController',
        'default_action'=>'index',
        'controller_namespace'=>'App\\controllers\\'
    ),
    'login'=>array(
        'email'=>'admin@gmail.com',
        'password'=>'12345'
    ),

    'validation_massages'=>array(
        'default'=>"Не вірно введені дані",
        'required'=>"Поле обов'язкове для заповнення",
        'email'=>"Електронна адреса введана не вірно",
        'max_length'=>"Максимально допустима кількість символів для поля {val}",
        'length'=>"Необхідна кількість символів {val}"
    )
);