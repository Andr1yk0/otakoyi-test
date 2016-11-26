<?php
/* Smarty version 3.1.30, created on 2016-11-27 00:02:31
  from "D:\OpenServer\domains\otakoyiTest\app\views\templates\forms\record_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5839ea574ee798_47807496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f75dd83b0f8425b3f9c94f343ce14f3001395d6f' => 
    array (
      0 => 'D:\\OpenServer\\domains\\otakoyiTest\\app\\views\\templates\\forms\\record_form.tpl',
      1 => 1480190496,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5839ea574ee798_47807496 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_assignInScope('update_mode', isset($_smarty_tpl->tpl_vars['record']->value));
$_smarty_tpl->_assignInScope('captcha_img', \App\core\App::buildCaptcha()->inline());
?>
<form action="<?php if ($_smarty_tpl->tpl_vars['update_mode']->value) {
echo ('/records/update/').($_smarty_tpl->tpl_vars['record']->value->id);
} else {
echo '/records/store';
}?>" id="record_form">
    <fieldset class="form-group">
        <label>Ім'я</label>
        <input value="<?php if ($_smarty_tpl->tpl_vars['update_mode']->value) {
echo $_smarty_tpl->tpl_vars['record']->value->name;
}?>" class="form-control" name="name" type="text">
    </fieldset>
    <fieldset class="form-group">
        <label>Електронна адреса</label>
        <input value="<?php if ($_smarty_tpl->tpl_vars['update_mode']->value) {
echo $_smarty_tpl->tpl_vars['record']->value->email;
}?>" class="form-control" name="email" type="email">
    </fieldset>
    <fieldset class="form-group">
        <label>Сайт</label>
        <input value="<?php if ($_smarty_tpl->tpl_vars['update_mode']->value) {
echo $_smarty_tpl->tpl_vars['record']->value->website;
}?>" class="form-control" name="website" type="text">
    </fieldset>

    <?php if (!$_smarty_tpl->tpl_vars['update_mode']->value) {?>
        <img class="captcha" src="<?php echo $_smarty_tpl->tpl_vars['captcha_img']->value;?>
">
        <a href="/site/captcha" class="btn btn-default captcha_reload"><i class="fa fa-refresh fa-2x"></i></a>
        <fieldset class="form-group">
            <label>Введіть код з картинки </label>
            <input class="form-control input-sm" name="captcha" type="text">
        </fieldset>
    <?php }?>


    <input type="submit" class="form-control btn btn-success" value="Зберегти">
</form><?php }
}
