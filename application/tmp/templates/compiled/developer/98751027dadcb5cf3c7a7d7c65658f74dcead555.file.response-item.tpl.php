<?php /* Smarty version Smarty-3.1.13, created on 2018-01-01 16:47:34
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/response/response-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11492751845a4a11c6d6a927-12859895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98751027dadcb5cf3c7a7d7c65658f74dcead555' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/response/response-item.tpl',
      1 => 1502879689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11492751845a4a11c6d6a927-12859895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oResponse' => 0,
    'oOrder' => 0,
    'aMedia' => 0,
    'oMedia' => 0,
    'component' => 0,
    'aImages' => 0,
    'oUserCurrent' => 0,
    'mods' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4a11c6d91b06_16372497',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4a11c6d91b06_16372497')) {function content_5a4a11c6d91b06_16372497($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-response-item', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oResponse','mods')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array('title', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:user.small','oUser'=>$_smarty_tpl->tpl_vars['oResponse']->value->getUser(),'mods'=>"response"),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'admin:p-plugin.star-rating','rating'=>$_smarty_tpl->tpl_vars['oResponse']->value->getRaiting()*20,'mods'=>"response"),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
    <?php $_smarty_tpl->tpl_vars['oOrder'] = new Smarty_variable($_smarty_tpl->tpl_vars['oResponse']->value->getOrder(), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['oOrder']->value){?>
        <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'freelancer:order.mini','oOrder'=>$_smarty_tpl->tpl_vars['oOrder']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','title'=>"Заказ",'content'=>$_tmp1),$_smarty_tpl);?>

    <?php }?>
    <?php $_smarty_tpl->tpl_vars['aMedia'] = new Smarty_variable($_smarty_tpl->tpl_vars['oResponse']->value->media->getMedia(), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['aImages'] = new Smarty_variable(array(), null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['oMedia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oMedia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMedia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oMedia']->key => $_smarty_tpl->tpl_vars['oMedia']->value){
$_smarty_tpl->tpl_vars['oMedia']->_loop = true;
?>
        <?php $_smarty_tpl->createLocalArrayVariable('aImages', null, 0);
$_smarty_tpl->tpl_vars['aImages']->value[] = array('src'=>$_smarty_tpl->tpl_vars['oMedia']->value->getFileWebPath('120x120crop'));?>
    <?php } ?>
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-block-text">
        <?php echo smarty_function_component(array('_default_short'=>'slider','classes'=>"js-".((string)$_smarty_tpl->tpl_vars['component']->value)."-slider ".((string)$_smarty_tpl->tpl_vars['component']->value)."-slider",'images'=>$_smarty_tpl->tpl_vars['aImages']->value),$_smarty_tpl);?>

        <?php echo smarty_function_component(array('_default_short'=>'text','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-text",'text'=>((string)$_smarty_tpl->tpl_vars['oResponse']->value->getText())),$_smarty_tpl);?>

    </div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<?php $_smarty_tpl->_capture_stack[0][] = array('footer', null, null); ob_start(); ?>
    
    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUserCurrent']->value->getId()==$_smarty_tpl->tpl_vars['oResponse']->value->getUserId()){?>
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:response.buttons-edit','oResponse'=>$_smarty_tpl->tpl_vars['oResponse']->value),$_smarty_tpl);?>

    <?php }?>
    
    <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'plus'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'info-list','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-date",'list'=>array(array('label'=>$_tmp2." Добавлено:",'content'=>$_smarty_tpl->tpl_vars['oResponse']->value->getDateCreate()))),$_smarty_tpl);?>

    <div></div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<?php ob_start();?><?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','mods'=>$_smarty_tpl->tpl_vars['mods']->value,'classes'=>$_tmp3." ".((string)$_smarty_tpl->tpl_vars['component']->value)." ",'title'=>Smarty::$_smarty_vars['capture']['title'],'content'=>Smarty::$_smarty_vars['capture']['content'],'footer'=>Smarty::$_smarty_vars['capture']['footer']),$_smarty_tpl);?>

<?php }} ?>