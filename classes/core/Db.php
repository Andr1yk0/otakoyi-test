<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 16.11.2016
 * Time: 12:41
 */

namespace App\core;


class Db {
    private static $instance = null;
    private static $pdo = null;
    private $table = null;
    private $query = '';
    private function __construct(){
        $db_configs = App::getLocalConfigs('db');
        $dsn = 'mysql:host='.$db_configs['host'].';dbname='.$db_configs['db_name'].';charset=utf8';
        self::$pdo = new \PDO($dsn,$db_configs['user'],$db_configs['password']);
        self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
    }

    public static function connect(){
        if(self::$instance===null){
            self::$instance = new self;
        }
    }

    /**
     * Повертає створений екземпляр класу Query
     *
     * @param $table - назва таблиці
     * @return Query
     */
    public static function table($table){
        $instance = static::$instance;
        $instance->table = $table;
        $instance->query = '';
        return $instance;
    }

    function insert(array $data){
        $col_names_arr = array_keys($data);
        $col_names = implode(', ', $col_names_arr);
        $val_markers = ':'.implode(', :',$col_names_arr);
        $stmt = self::$pdo->prepare("insert into $this->table($col_names) values ($val_markers)");
        $res = $stmt->execute($data);
        return $res;
    }

    function update($data){
        $columns = array_keys($data);
        $params_string = '';
        foreach ($columns as $column){
            $params_string .= " ".$column." = :$column,";
        }
        $params_string = rtrim($params_string,',');
        $this->query = " update $this->table set $params_string ".$this->query;
        $stmt = self::$pdo->prepare($this->query);
        $stmt->execute($data);
    }

    function where($column, $comp, $value){
        $this->query .= " where $column $comp $value ";
        return $this;
    }

    function limit($number, $offset=0){
        $this->query .= " limit $offset, $number ";
        return $this;
    }

    function delete(){
        $this->query = "delete from $this->table ".$this->query;
        return self::$pdo->query($this->query);
    }

    function orderBy($column,$order='ASC'){
        $this->query .= " order by $column $order ";
        return $this;
    }

    function get(array $cols=['*']){
        $cols = implode(', ', $cols);
        $this->query = "select $cols from $this->table"." ".$this->query;
        $stmt = self::$pdo->query($this->query);
        return $stmt->fetchAll();
    }

    function getOne(array $cols=['*']){
        $res = $this->get($cols);
        return $res[0];
    }


}