<?php
/**
 * Created by PhpStorm.
 * User: ANDRIY
 * Date: 16.11.2016
 * Time: 17:17
 */

namespace App\controllers;


use App\core\App;
use App\core\BaseController;
use App\core\Db;
use App\models\RecordsPage;

class RecordsController extends BaseController
{

    public $access_rules = [
        'onlyAdmin' => ['edit','delete','update']
    ];
    public $validation_rules = [
        'captcha' => 'captcha|required',
        'email' => 'email|required',
        'name' => 'required'
    ];

    function index()
    {
        if (!empty($_POST)) {
            $page = new RecordsPage($_POST['column'], $_POST['sorting_order'], $_POST['offset']);
            echo $this->view->makePartial('elements/_table.php', [
                'page' => $page
            ]);
        } else {
            $page = new RecordsPage();
            $this->view->make('main/index.php', [
                'page' => $page
            ]);
        }
    }

    function create()
    {
        echo $this->view->makePartial('forms/record_form.php');
    }

    function store()
    {
        $input_data = $this->request->post();
        $validator = $this->validate($input_data);
        if (!$validator->passed()) {
            echo json_encode(['errors' => $validator->errors]);
        } else {
            unset($input_data['captcha']);
            $input_data['browser'] = App::getClientBrowserName();
            $input_data['ip'] = App::getClientIp();
            Db::table('records')->insert($input_data);
            echo $this->view->makePartial('elements/_table.php', [
                'page' => new RecordsPage(),
            ]);
        }
    }

    function edit($id)
    {
        $record = Db::table('records')->where('id', '=', $id)->getOne();
        echo $this->view->makePartial('forms/record_form.php', [
            'record' => $record
        ]);
    }

    function delete($id)
    {
        Db::table('records')->where('id', '=', $id)->delete();
    }

    function update($id)
    {
        $input_data = $this->request->post();
        $validator = $this->validate($input_data);
        if (!$validator->passed()) {
            echo json_encode(['errors' => $validator->errors]);
        } else {
            Db::table('records')->where('id', '=', $id)->update($input_data);
            echo $this->view->makePartial('elements/_table.php', [
                'page' => new RecordsPage(),
            ]);
        }
    }
}