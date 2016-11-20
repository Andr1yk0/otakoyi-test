<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 16.11.2016
 * Time: 1:37
 */
namespace App;

use App\core\App;

class View {
    public $layout;
    function __construct(){
        $this->layout = BASE_PATH.'/views/layouts/main.php';
    }

    public function make($path, array $data=[]){
        $content = $this->render($path, $data);
        require_once $this->layout;
    }

    public function makePartial($path,array $data=[])
    {
        return $this->render($path, $data);
    }

    private function render($path, array $data){
        if(!empty($data)){
            extract($data);
        }
        ob_start();
        require BASE_PATH.'views/'.$path;
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }
}