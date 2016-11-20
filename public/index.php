<?php
define('BASE_PATH', __DIR__.'/../');
require_once __DIR__ . '/../vendor/autoload.php';

$app = new App\core\App();
$app->start();
