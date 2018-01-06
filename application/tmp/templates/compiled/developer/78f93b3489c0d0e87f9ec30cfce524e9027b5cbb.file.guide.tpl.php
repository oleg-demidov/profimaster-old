<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:30:48
         compiled from "/var/www/profimaster/framework/frontend/components/lightbox/docs/guide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8161352475a46357868e360-76605831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78f93b3489c0d0e87f9ec30cfce524e9027b5cbb' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/lightbox/docs/guide.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8161352475a46357868e360-76605831',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4635786960e1_50137472',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4635786960e1_50137472')) {function content_5a4635786960e1_50137472($_smarty_tpl) {?><p>Увеличение и просмотр изображений.</p>

<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Использование'));?>


<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <script>
        domReady(function() {
            $('.js-my-lightbox').lsLightbox();
        });
    </script>

    <a href="<?php echo $_smarty_tpl->tpl_vars['oUserCurrent']->value->getProfileFotoPath();?>
" class="js-my-lightbox">
        <img src="<?php echo $_smarty_tpl->tpl_vars['oUserCurrent']->value->getProfileAvatarPath(100);?>
">
    </a>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
<script>
    jQuery(function($) {
        $('.js-my-lightbox').lsLightbox();
    });
</script>

<a href="large_image.jpg" class="js-my-lightbox">
    <img src="small_image.jpg">
</a>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>
<?php }} ?>