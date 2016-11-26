<?php
/* Smarty version 3.1.30, created on 2016-11-26 13:35:10
  from "D:\OpenServer\domains\otakoyiTest\app\views\templates\layouts\_header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5839574e8cd175_43173246',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c4d975755add0c47a2de278297c77f9af6ded44' => 
    array (
      0 => 'D:\\OpenServer\\domains\\otakoyiTest\\app\\views\\templates\\layouts\\_header.tpl',
      1 => 1480152618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5839574e8cd175_43173246 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <title></title>


</head>
<body>
<div class="container-fluid">
    <div class="row">
        <header>
            <?php echo '<?php ';?>if (\App\core\App::isAdmin()): <?php echo '?>';?>
            <div class="text-right">
                <span>Ви увійшли як Admin </span>
                <a href="/auth/logout" class="btn btn-warning">Вийти</a>
            </div>

            <?php echo '<?php ';?>else: <?php echo '?>';?>
            <button class="btn btn-default pull-right" data-toggle="modal" data-target="#login_modal">Вхід</button>
            <?php echo '<?php ';?>endif <?php echo '?>';?>
        </header>
    </div><?php }
}
