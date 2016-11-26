<?php
/* Smarty version 3.1.30, created on 2016-11-26 13:38:06
  from "D:\OpenServer\domains\otakoyiTest\app\views\templates\layouts\_footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583957fe873807_40112530',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afcbc5b241d6d1b9be6651110bd49d3f421d18cc' => 
    array (
      0 => 'D:\\OpenServer\\domains\\otakoyiTest\\app\\views\\templates\\layouts\\_footer.tpl',
      1 => 1480152618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583957fe873807_40112530 (Smarty_Internal_Template $_smarty_tpl) {
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
                <?php echo '<?php ';?>require views_path().'forms/login_form.php' <?php echo '?>';?>
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
