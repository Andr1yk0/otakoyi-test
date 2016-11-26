<?php
/* Smarty version 3.1.30, created on 2016-11-26 16:07:48
  from "D:\OpenServer\domains\otakoyiTest\app\views\templates\main\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58397b14438650_07110495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd366eca9e9ceb080befa9e27ed88c109997d19f3' => 
    array (
      0 => 'D:\\OpenServer\\domains\\otakoyiTest\\app\\views\\templates\\main\\index.tpl',
      1 => 1480160875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/_loading.tpl' => 1,
    'file:elements/_table.tpl' => 1,
  ),
),false)) {
function content_58397b14438650_07110495 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'D:\\OpenServer\\domains\\otakoyiTest\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
?>

<div class="row controls">
    <div class="col-sm-5">
        <div class="input-group input-group-sm">
            <span class="input-group-addon">
                Сортувати по стовбцю:
            </span>
            <?php echo smarty_function_html_options(array('name'=>'sorting_column','selected'=>$_smarty_tpl->tpl_vars['page']->value->sorting_by,'class'=>'form-control','id'=>'sorting_column','options'=>$_smarty_tpl->tpl_vars['page']->value->sorting_columns),$_smarty_tpl);?>

        </div>
    </div>
    <div class="col-sm-4">
        <div class="input-group input-group-sm">
            <span class="input-group-addon">
                В порядку:
            </span>
            <?php echo smarty_function_html_options(array('name'=>'sorting_order','selected'=>$_smarty_tpl->tpl_vars['page']->value->sorting_order,'class'=>'form-control','id'=>'sorting_order','options'=>$_smarty_tpl->tpl_vars['page']->value->sorting_orders),$_smarty_tpl);?>

        </div>
    </div>
    <div class="col-sm-3">
        <a href="/records/create" data-describe="Додати запис" class="btn btn-success form-control" id="add_record_btn">Додати запис</a>
    </div>
</div>
<div class="content_wrap">
    <?php $_smarty_tpl->_subTemplateRender("file:elements/_loading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="content">
        <?php $_smarty_tpl->_subTemplateRender("file:elements/_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>
</div>
<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination">
        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = $_smarty_tpl->tpl_vars['page']->value->records_per_page;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['page']->value->records_amount+1 - (0) : 0-($_smarty_tpl->tpl_vars['page']->value->records_amount)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
            <li class="page<?php if ($_smarty_tpl->tpl_vars['i']->value == 0) {
echo ' active';
}?>"><a href="#" data-offset="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value/$_smarty_tpl->tpl_vars['page']->value->records_per_page+1;?>
</a></li>
        <?php }
}
?>

    </ul>
</nav>


<?php }
}
