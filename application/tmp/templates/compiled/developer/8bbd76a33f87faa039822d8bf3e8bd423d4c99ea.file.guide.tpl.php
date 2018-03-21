<?php /* Smarty version Smarty-3.1.13, created on 2018-03-18 15:47:41
         compiled from "/var/www/profimaster/framework/frontend/components/item/docs/guide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17431276605aae35bd7298a3-47238076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bbd76a33f87faa039822d8bf3e8bd423d4c99ea' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/item/docs/guide.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17431276605aae35bd7298a3-47238076',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aae35bd73e810_68457274',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aae35bd73e810_68457274')) {function content_5aae35bd73e810_68457274($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<p>TODO</p>

<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Использование'));?>


<p>TODO</p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'item','title'=>'Lorem ipsum dolor sit amet','desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus vero esse necessitatibus sed atque nobis laudantium, nemo pariatur natus modi.','image'=>array('path'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getProfileAvatarPath(100))),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_code', null, null); ob_start(); ?>
{component 'item'
    title='Lorem ipsum...'
    desc='Lorem ipsum...'
    image=[
        'path' => $oUserCurrent->getProfileAvatarPath(100)
    ]}
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php smarty_template_function_test_example($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['test_example_content'],'code'=>Smarty::$_smarty_vars['capture']['test_example_code']));?>





<?php smarty_template_function_test_heading($_smarty_tpl,array('text'=>'Группированные списки'));?>


<p>TODO</p>

<?php $_smarty_tpl->_capture_stack[0][] = array('test_example_content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'item','template'=>'group','items'=>array(array('desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, non!'),array('desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, non! consectetur adipisicing elit. Repellat, non!','title'=>'Lorem ipsum dolor sit amet'),array('desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, non! consectetur adipisicing elit. Repellat, non!','title'=>'Lorem ipsum dolor sit amet','image'=>array('path'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getProfileAvatarPath(100))),array('desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, non! consectetur adipisicing elit. Repellat, non!','title'=>'Lorem ipsum dolor sit amet','image'=>array('path'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getProfileAvatarPath(100))))),$_smarty_tpl);?>

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
<?php }} ?>