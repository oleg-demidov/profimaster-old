<?php /* Smarty version Smarty-3.1.13, created on 2018-03-18 15:44:45
         compiled from "/var/www/profimaster/framework/frontend/components/block/docs/guide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16561606095aae350d7dc093-05188138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf5eeb29c53f15980c0f02863da960ab9562f1cc' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/block/docs/guide.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16561606095aae350d7dc093-05188138',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aae350d80ae63_20795790',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aae350d80ae63_20795790')) {function content_5aae350d80ae63_20795790($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Использование'));?>


<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'block','title'=>'Block','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, id.'),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
{component 'block' title='Block' content='Lorem ipsum'}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>




<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Цвета'));?>


<p>Модификаторы <code>primary</code> <code>success</code> <code>info</code> <code>warning</code> <code>danger</code></p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'primary','title'=>'Block','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, id.'),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'success','title'=>'Block','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, id.'),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'info','title'=>'Block','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, id.'),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'warning','title'=>'Block','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, id.'),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'danger','title'=>'Block','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, id.'),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
...
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>




<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Списки'));?>


<p>TODO</p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'primary','title'=>'Item group','list'=>array('items'=>array(array('desc'=>'Lorem ipsum dolor sit amet.'),array('desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, eligendi!'),array('desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing.')))),$_smarty_tpl);?>


    <?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'primary','title'=>'Item group + content','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, id.','list'=>array('items'=>array(array('desc'=>'Lorem ipsum dolor sit amet.'),array('desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, eligendi!'),array('desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing.')))),$_smarty_tpl);?>


    <?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'primary','title'=>'Item group + footer','footer'=>'Footer','list'=>array('items'=>array(array('desc'=>'Lorem ipsum dolor sit amet.'),array('desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, eligendi!'),array('desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing.')))),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
TODO
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>




<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Табы'));?>


<p>TODO</p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <script>
        domReady(function() {
            $('.js-myblock').lsBlock();
        });
    </script>

    <?php echo smarty_function_component(array('_default_short'=>'block','classes'=>'js-myblock','title'=>'Tabs','tabs'=>array('classes'=>'js-tabs-block','tabs'=>array(array('text'=>'Tab 1','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, nesciunt.'),array('text'=>'Tab 2','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, nesciunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, nesciunt.')))),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
<script>
    jQuery(function($) {
        $('.js-myblock').lsBlock();
    });
</script>

{component 'block'
    classes='js-myblock'
    title='Tabs'
    tabs=[
        'classes' => 'js-tabs-block',
        'tabs' => [
            [ 'text' => 'Tab 1', 'content' => 'Lorem ipsum...' ],
            [ 'text' => 'Tab 2', 'content' => 'Lorem ipsum...' ]
        ]
    ]}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>
<?php }} ?>