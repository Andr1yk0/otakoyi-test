<?php
/* Smarty version 3.1.30, created on 2016-11-26 16:21:57
  from "D:\OpenServer\domains\otakoyiTest\app\views\templates\elements\_table.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58397e65158423_59198377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f91f51bd5b31ecaee8cc1db2bce9cbb83f9042f9' => 
    array (
      0 => 'D:\\OpenServer\\domains\\otakoyiTest\\app\\views\\templates\\elements\\_table.tpl',
      1 => 1480162847,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58397e65158423_59198377 (Smarty_Internal_Template $_smarty_tpl) {
?>

<table class="table records">
    <tr>
        <th>Ім'я</th>
        <th>Email</th>
        <th>Cайт</th>
        <th>ip адреса</th>
        <th>браузер</th>
        <th>Дата створення</th>
        <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
            <th></th>
        <?php }?>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page']->value->records_on_page, 'record');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['record']->value->name;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['record']->value->email;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['record']->value->website;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['record']->value->ip;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['record']->value->browser;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['record']->value->created_at;?>
</td>
            <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
                <td>
                    <a href="/records/delete/<?php echo $_smarty_tpl->tpl_vars['record']->value->id;?>
" class="btn btn-xs btn-danger delete_btn">
                        <i class="fa fa-remove"></i>
                    </a>
                    <a href="/records/edit/<?php echo $_smarty_tpl->tpl_vars['record']->value->id;?>
" data-describe="Редагувати запис" class="btn btn-xs btn-warning edit_btn">
                        <i class="fa fa-pencil"></i>
                    </a>
                </td>
            <?php }?>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table><?php }
}
