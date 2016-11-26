<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 16.11.2016
 * Time: 1:37
 */
namespace App;

use App\core\App;
use Smarty;


class View extends Smarty{
    public $layout;
    function __construct(){
        parent::__construct();
        $this->template_dir = BASE_PATH.'/app/views/templates/';
        $this->compile_dir = BASE_PATH.'/app/views/templates_c/';
        $this->debugging = true;
        $this->layout = 'layouts/main.tpl';
    }

    public function make($tpl, array $data=array()){
        $this->assignTemplateVariables($data);
        $this->assign('content',$tpl);
        $this->display($this->layout);

    }

    private function assignTemplateVariables($data){
        if(!empty($data)) {
            foreach ($data as $var => $val) {
                $this->assign($var, $val);
            }
        }
        $this->setGlobalTemplateVariables();
    }

    public function makePartial($tpl,array $data=array())
    {
        $this->assignTemplateVariables($data);
        return $this->fetch($tpl);
    }

    private function setGlobalTemplateVariables(){
        $this->assign('is_admin',App::isAdmin());
    }

}