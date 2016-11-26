<?php
/* Smarty version 3.1.30, created on 2016-11-26 16:11:44
  from "D:\OpenServer\domains\otakoyiTest\app\views\templates\forms\login_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58397c000bfab9_86869805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be2e1f3c3d39238a65a85e4268a83ad69a2a5ae5' => 
    array (
      0 => 'D:\\OpenServer\\domains\\otakoyiTest\\app\\views\\templates\\forms\\login_form.tpl',
      1 => 1480162303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58397c000bfab9_86869805 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form action="auth/login" method="post">
    <fieldset class="form-group">
        <label>Електронна адреса</label>
        <input type="email" name="email" class="form-control">
    </fieldset>
    <fieldset class="form-group">
        <label>Пароль</label>
        <input type="password" name="password" class="form-control">
    </fieldset>
    <input type="submit" class="form-control btn btn-success" value="Увійти">
</form><?php }
}
