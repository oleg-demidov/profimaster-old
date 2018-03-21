<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 22:41:51
         compiled from "/var/www/profimaster/framework/frontend/components/tabs/docs/guide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17367752975aa950cf519e38-53399238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4fdcb041fbbedf2a9f422326a5fc7e1d41559af' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/tabs/docs/guide.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17367752975aa950cf519e38-53399238',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa950cf523d08_44507317',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa950cf523d08_44507317')) {function content_5aa950cf523d08_44507317($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><p>Табы.</p>

<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Использование'));?>


<p>Для базового использования нужно указать массив с табами в параметре <code>tabs</code> и прописать класс к которому будет привязываться jquery-виджет <code>lsTabs</code>.</p>

<script>
    domReady(function() {
        $('.js-my-tabs').lsTabs();
    });
</script>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'tabs','classes'=>'js-my-tabs','tabs'=>array(array('text'=>'Tab 1','content'=>'Tab 1. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, explicabo!','isActive'=>true),array('text'=>'Tab 2','content'=>'Tab 2. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui expedita, quibusdam voluptas quia numquam provident nobis rem quam hic eum.'))),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
<script>
    jQuery(function($) {
        $('.js-my-tabs').lsTabs();
    });
</script>

{component 'tabs' classes='js-my-tabs' tabs=[
    [ text => 'Tab 1', content => 'Lorem ipsum...' ],
    [ text => 'Tab 2', content => 'Lorem ipsum...' ]
]}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>
<?php }} ?>