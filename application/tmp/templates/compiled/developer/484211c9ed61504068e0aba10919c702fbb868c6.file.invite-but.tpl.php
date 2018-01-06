<?php /* Smarty version Smarty-3.1.13, created on 2018-01-03 17:20:22
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/manager/invite-but.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2160828965a4cbc769d4a91-87513714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '484211c9ed61504068e0aba10919c702fbb868c6' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/manager/invite-but.tpl',
      1 => 1513154565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2160828965a4cbc769d4a91-87513714',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUser' => 0,
    'oUserCurrent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4cbc769ea657_28754509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4cbc769ea657_28754509')) {function content_5a4cbc769ea657_28754509($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-invite-but', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
    
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'r'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo Router::GetPathRootWeb(false);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'info-list','mods'=>"large long",'list'=>array(array('label'=>"Ссылка для приглашения :",'icon'=>'link','content'=>"<b><a href='".$_tmp1.((string)$_smarty_tpl->tpl_vars['oUser']->value->getId())."'>".$_tmp2."/r/".((string)$_smarty_tpl->tpl_vars['oUser']->value->getId())."</a></b>"))),$_smarty_tpl);?>

    
    <?php ob_start();?><?php echo Plugin::GetTemplateWebPath('freelancer');?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'r'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'freelancer:yshare','label'=>"Поделиться ссылкой в соц сетях",'image'=>$_tmp3."assets/images/logo500.png",'url'=>$_tmp4.((string)$_smarty_tpl->tpl_vars['oUserCurrent']->value->getId()),'title'=>"Profimaster.kz - мастера Казахстана",'description'=>"Новая доска объявлений для мастеров Казахстана. Мы быстро развиваемся. Присоединяйтесь к нашему сообществу.",'services'=>"vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,lj,viber,whatsapp,skype,telegram"),$_smarty_tpl);?>

    
    
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo smarty_function_component(array('_default_short'=>'block','content'=>Smarty::$_smarty_vars['capture']['content']),$_smarty_tpl);?>
<?php }} ?>