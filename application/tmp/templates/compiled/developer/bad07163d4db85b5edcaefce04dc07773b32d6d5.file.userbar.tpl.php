<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:59
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/userbar/userbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14586511065ab2076373a3f6-62646116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bad07163d4db85b5edcaefce04dc07773b32d6d5' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/userbar/userbar.tpl',
      1 => 1521548910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14586511065ab2076373a3f6-62646116',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'oUserCurrent' => 0,
    'aMenuItems' => 0,
    'iUserCurrentCountTalkNew' => 0,
    'aLang' => 0,
    'LIVESTREET_SECURITY_KEY' => 0,
    'aItems' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab2076377a894_81940116',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab2076377a894_81940116')) {function content_5ab2076377a894_81940116($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("fl-userbar", null, 0);?>
<li class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
    <?php $_smarty_tpl->_capture_stack[0][] = array('pro', null, null); ob_start(); ?>
        <?php echo smarty_function_component(array('_default_short'=>'badge','value'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getPro(),'mods'=>"success"),$_smarty_tpl);?>
        
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->_capture_stack[0][] = array('profile', null, null); ob_start(); ?>
        <?php echo smarty_function_component(array('_default_short'=>'user','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-profile",'template'=>'avatar','size'=>'small','user'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value),$_smarty_tpl);?>
      
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->tpl_vars['aMenuItems'] = new Smarty_variable(array(array('name'=>'profile','html'=>Smarty::$_smarty_vars['capture']['profile']),array('name'=>'-')), null, 0);?>
    <?php if (!$_smarty_tpl->tpl_vars['oUserCurrent']->value->isManager()){?>
    <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'plugin.freelancer.menu.orders'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['aMenuItems'] = new Smarty_variable(array_merge($_smarty_tpl->tpl_vars['aMenuItems']->value,array(array('icon'=>'file-text-o','name'=>'orders','text'=>$_tmp1,'url'=>((string)$_smarty_tpl->tpl_vars['oUserCurrent']->value->getUserWebPath())."orders",'count'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getCountOrders()))), null, 0);?>
    <?php }?>
    <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.profile.nav.messages'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'talk'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.profile.nav.settings'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'settings'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'manager'),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['aMenuItems'] = new Smarty_variable(array_merge($_smarty_tpl->tpl_vars['aMenuItems']->value,array(array('icon'=>'envelope-o','name'=>'talk','text'=>$_tmp2,'url'=>$_tmp3,'count'=>$_smarty_tpl->tpl_vars['iUserCurrentCountTalkNew']->value),array('icon'=>'cogs','name'=>'settings','text'=>$_tmp4,'url'=>$_tmp5),array('icon'=>'money','name'=>'manager','text'=>"Моя партнерка",'url'=>$_tmp6.((string)$_smarty_tpl->tpl_vars['oUserCurrent']->value->getLogin())))), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->isEmployer()){?>
        <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->isCreateOrder()){?>
        
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>'order/add'),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'button','mods'=>"success",'classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-addorder",'text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['menu']['create_order'],'url'=>$_tmp7),$_smarty_tpl);?>
<?php $_tmp8=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aMenuItems', null, 0);
$_smarty_tpl->tpl_vars['aMenuItems']->value[] = array('html'=>$_tmp8);?>
        <?php }else{ ?>
            <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'freelancer:market','text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['menu']['create_order']),$_smarty_tpl);?>
<?php $_tmp9=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aMenuItems', null, 0);
$_smarty_tpl->tpl_vars['aMenuItems']->value[] = array('html'=>$_tmp9);?>        
        <?php }?>
    <?php }?>
    
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'auth'),$_smarty_tpl);?>
<?php $_tmp10=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['aMenuItems'] = new Smarty_variable(array_merge($_smarty_tpl->tpl_vars['aMenuItems']->value,array(array('name'=>'-'),array('icon'=>'sign-out','text'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['logout'],'url'=>$_tmp10."logout/?security_ls_key=".((string)$_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value)))), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['aItems'] = new Smarty_variable(array(array('name'=>'userbar','url'=>((string)$_smarty_tpl->tpl_vars['oUserCurrent']->value->getUserWebPath()),'count'=>((string)$_smarty_tpl->tpl_vars['oUserCurrent']->value->getPro()),'text'=>"<img src=\"".((string)$_smarty_tpl->tpl_vars['oUserCurrent']->value->getProfileAvatarPath(24))."\" alt=\"".((string)$_smarty_tpl->tpl_vars['oUserCurrent']->value->getDisplayName())."\" class=\"".((string)$_smarty_tpl->tpl_vars['component']->value)."-avatar\" /> ".((string)Smarty::$_smarty_vars['capture']['pro']),'menu'=>array('items'=>$_smarty_tpl->tpl_vars['aMenuItems']->value))), null, 0);?>
    
    <?php }else{ ?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>'auth/login'),$_smarty_tpl);?>
<?php $_tmp11=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'auth/register'),$_smarty_tpl);?>
<?php $_tmp12=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['aItems'] = new Smarty_variable(array(array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['login']['title'],'classes'=>'js-modal-toggle-login','url'=>$_tmp11),array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['registration']['title'],'classes'=>'js-modal-toggle-registration','url'=>$_tmp12)), null, 0);?>
    <?php }?>
    
    <?php echo smarty_function_component(array('_default_short'=>'nav','hook'=>'fl_userbar_nav','hookParams'=>array('user'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value),'mods'=>"userbar",'items'=>$_smarty_tpl->tpl_vars['aItems']->value),$_smarty_tpl);?>

  
</li>
<?php }} ?>