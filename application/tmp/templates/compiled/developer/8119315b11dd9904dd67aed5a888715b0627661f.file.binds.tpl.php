<?php /* Smarty version Smarty-3.1.13, created on 2018-03-15 00:45:35
         compiled from "/var/www/profimaster/application/plugins/sociality/frontend/components/binds/binds.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8009022735aa96dcf79bac2-46347412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8119315b11dd9904dd67aed5a888715b0627661f' => 
    array (
      0 => '/var/www/profimaster/application/plugins/sociality/frontend/components/binds/binds.tpl',
      1 => 1514898996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8009022735aa96dcf79bac2-46347412',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aSocials' => 0,
    'oSocial' => 0,
    'LIVESTREET_SECURITY_KEY' => 0,
    'aButtonsNames' => 0,
    'but' => 0,
    'sUriPluginSkin' => 0,
    'sSizeButton' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa96dcf7ba741_29651569',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa96dcf7ba741_29651569')) {function content_5aa96dcf7ba741_29651569($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("soc-binds", null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aSocials')),$_smarty_tpl);?>

<fieldset class="js-user-fields">
    <legend>Привязанные социальные сети</legend>
    <?php ob_start();?><?php echo sizeof($_smarty_tpl->tpl_vars['aSocials']->value);?>
<?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?>
        <?php echo smarty_function_component(array('_default_short'=>'blankslate','title'=>"Не привязано"),$_smarty_tpl);?>

    <?php }?>
    <?php  $_smarty_tpl->tpl_vars['oSocial'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oSocial']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aSocials']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oSocial']->key => $_smarty_tpl->tpl_vars['oSocial']->value){
$_smarty_tpl->tpl_vars['oSocial']->_loop = true;
?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>'oauth'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'actionbar','mods'=>"large",'items'=>array(array('buttons'=>array(array('text'=>$_smarty_tpl->tpl_vars['oSocial']->value->getSocialType(),'type'=>'button','mods'=>'primary large'),array('text'=>$_smarty_tpl->tpl_vars['oSocial']->value->getProfileUrl(),'mods'=>"large",'url'=>$_smarty_tpl->tpl_vars['oSocial']->value->getProfileUrl()),array('icon'=>'close','classes'=>"js-bindremove-confirm",'url'=>$_tmp2.((string)$_smarty_tpl->tpl_vars['oSocial']->value->getSocialType())."/remove/?security_ls_key=".((string)$_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value),'mods'=>"large danger",'title'=>'Отвязать'))))),$_smarty_tpl);?>

    <?php } ?>
   
    <legend>Привязать:</legend><br>
    <?php  $_smarty_tpl->tpl_vars['but'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['but']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aButtonsNames']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['but']->key => $_smarty_tpl->tpl_vars['but']->value){
$_smarty_tpl->tpl_vars['but']->_loop = true;
?>
        <a style="margin:2px;" href="<?php echo smarty_function_router(array('page'=>"oauth/".((string)$_smarty_tpl->tpl_vars['but']->value)),$_smarty_tpl);?>
bind" title="<?php echo $_smarty_tpl->tpl_vars['but']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['but']->value;?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['sUriPluginSkin']->value;?>
/img/<?php echo $_smarty_tpl->tpl_vars['but']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['sSizeButton']->value;?>
.png"/></a> 
    <?php } ?>
</fieldset><?php }} ?>