<?php /* Smarty version Smarty-3.1.13, created on 2018-01-02 18:21:13
         compiled from "/var/www/profimaster/framework/frontend/components/confirm/docs/guide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4596955135a4b79398bc2c9-32222759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd38eaad83725db6a2030175d72bd095f2b817b17' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/confirm/docs/guide.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4596955135a4b79398bc2c9-32222759',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4b79398c8449_22427030',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4b79398c8449_22427030')) {function content_5a4b79398c8449_22427030($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Подтверждение действия'));?>


<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <script>
        domReady(function() {
            $('.js-my-confirm').lsConfirm({
                message: "Are you sure?"
            });

            $('.js-my-confirm-callback').lsConfirm({
                message: "Are you sure?",
                onconfirm: function () {
                    alert("Confirmed!");
                },
                oncancel: function () {
                    alert("Canceled!");
                }
            });
        });
    </script>

    <?php echo smarty_function_component(array('_default_short'=>'button','text'=>"Delete (url)",'url'=>"/",'classes'=>"js-my-confirm"),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'button','text'=>"Delete (callback)",'classes'=>"js-my-confirm-callback"),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
<script>
    jQuery(function($) {
        $('.js-my-confirm').lsConfirm({
            message: "Are you sure?"
        });

        $('.js-my-confirm-callback').lsConfirm({
            message: "Are you sure?",
            onconfirm: function () {
                alert("Confirmed!");
            },
            oncancel: function () {
                alert("Canceled!");
            }
        });
    });
</script>

{component 'button' text="Delete (url)" url="/" classes="js-my-confirm"}
{component 'button' text="Delete (callback)" classes="js-my-confirm-callback"}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>
<?php }} ?>