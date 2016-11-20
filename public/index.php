<?php
define('BASE_PATH', __DIR__.'/../');
require_once BASE_PATH . '/app/helpers.php';
require_once BASE_PATH . '/vendor/autoload.php';

$app = new App\core\App();
$app->start();
