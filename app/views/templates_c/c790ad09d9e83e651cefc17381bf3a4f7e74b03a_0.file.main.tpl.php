<?php
/* Smarty version 3.1.30, created on 2016-11-26 16:11:44
  from "D:\OpenServer\domains\otakoyiTest\app\views\templates\layouts\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58397c000795a0_23353287',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c790ad09d9e83e651cefc17381bf3a4f7e74b03a' => 
    array (
      0 => 'D:\\OpenServer\\domains\\otakoyiTest\\app\\views\\templates\\layouts\\main.tpl',
      1 => 1480162303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:forms/login_form.tpl' => 1,
  ),
),false)) {
function content_58397c000795a0_23353287 (Smarty_Internal_Template $_smarty_tpl) {
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
            <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
                <div class="text-right">
                    <span>Ви увійшли як Admin </span>
                    <a href="/auth/logout" class="btn btn-warning">Вийти</a>
                </div>
            <?php } else { ?>
                <button class="btn btn-default pull-right" data-toggle="modal" data-target="#login_modal">Вхід</button>
            <?php }?>
        </header>
    </div>
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

</div>
<div class="modal fade" tabindex="-1" role="dialog" id="login_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Вхід</h4>
            </div>
            <div class="modal-body">
                <?php $_smarty_tpl->_subTemplateRender("file:forms/login_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="record_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<div class="hidden_elements hidden">
    <div class="form_error">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        <span class="error_text"></span>
    </div>
</div>
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"><?php echo '</script'; ?>
>
<!--    <?php echo '<script'; ?>
 src="/public/js/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/main.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
