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
        $this->layout = views_path().'layouts/main.php';
    }

    public function make($path, array $data=array()){
        $content = $this->render($path, $data);
        require_once $this->layout;
    }

    public function makePartial($path,array $data=array())
    {
        return $this->render($path, $data);
    }

    private function render($path, array $data){
        if(!empty($data)){
            extract($data);
        }
        ob_start();
        require views_path().$path;
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }
}