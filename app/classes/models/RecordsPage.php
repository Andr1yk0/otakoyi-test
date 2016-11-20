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
        array('label'=>"Ім'я", 'name'=>'name'),
        array('label'=>'Електронна адреса', 'name'=>'email'),
        array('label'=>'Дата створення', 'name'=>'created_at')
    );
    public $sorting_orders = array(
        array('label'=>'Зростання','name'=>'ASC'),
        array('label'=>'Спадання','name'=>'DESC'),
    );

    public $records_per_page = 5;
    public $sorting_by;
    public $sorting_order;
    public $offset = 0;
    public $records_on_page = array();
    public $records_amount;

    function __construct($sorting_column_index=2, $sorting_order_index=1, $offset=0){
        if(isset($this->sorting_columns[$sorting_column_index])){
            $this->sorting_by = $this->sorting_columns[$sorting_column_index];
        }

        if(isset($this->sorting_orders[$sorting_order_index])){
            $this->sorting_order = $this->sorting_orders[$sorting_order_index];
        }
        $this->offset = $offset;
        $this->records_on_page = Db::table('records')->orderBy($this->sorting_by['name'],$this->sorting_order['name'])
            ->limit($this->records_per_page,$this->offset)->get();
        $this->records_amount = Db::table('records')->getOne(array('count(*) as amount'))->amount;
    }
}