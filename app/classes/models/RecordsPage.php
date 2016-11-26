<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 18.11.2016
 * Time: 13:37
 */

namespace App\models;

use App\core\Db;

class RecordsPage {
    public $sorting_columns = array(
        'name'=>"Ім'я",
        'email'=>'Електронна адреса',
        'created_at'=>'Дата створення'
    );
    public $sorting_orders = array(
        'ASC'=>'Зростання',
        'DESC'=>'Спадання'
    );

    public $records_per_page = 5;
    public $sorting_by;
    public $sorting_order;
    public $offset = 0;
    public $records_on_page = array();
    public $records_amount;

    function __construct($sorting_column='created_at', $sorting_order = 'DESC', $offset=0){
        if(array_key_exists($sorting_column,$this->sorting_columns)){
            $this->sorting_by = $sorting_column;
        }

        if(array_key_exists($sorting_order, $this->sorting_orders)){
            $this->sorting_order = $sorting_order;
        }
        $this->offset = $offset;
        $this->records_on_page = Db::table('records')->orderBy($this->sorting_by,$this->sorting_order)
            ->limit($this->records_per_page,$this->offset)->get();
        $this->records_amount = Db::table('records')->getOne(array('count(*) as amount'))->amount;
    }
}