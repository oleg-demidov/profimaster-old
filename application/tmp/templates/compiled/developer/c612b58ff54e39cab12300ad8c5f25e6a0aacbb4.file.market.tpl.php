<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:16:12
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/market/market.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13574480485a46320caaa194-01133496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c612b58ff54e39cab12300ad8c5f25e6a0aacbb4' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/market/market.tpl',
      1 => 1510735953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13574480485a46320caaa194-01133496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'text' => 0,
    'component' => 0,
    'sTargetType' => 0,
    'iTargetId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a46320cab99a5_08352662',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a46320cab99a5_08352662')) {function content_5a46320cab99a5_08352662($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-market', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('sTargetType','iTargetId','text')),$_smarty_tpl);?>


<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['text']->value)===null||$tmp==='' ? "Купить Pro" : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['sTargetType']->value)===null||$tmp==='' ? "index" : $tmp);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['iTargetId']->value)===null||$tmp==='' ? 0 : $tmp);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','text'=>$_tmp1,'icon'=>'credit-card','type'=>"button",'mods'=>'success','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-button js-".((string)$_smarty_tpl->tpl_vars['component']->value)."-modal-toggle",'attributes'=>array('data-params-target-type'=>$_tmp2,'data-params-target-id'=>$_tmp3,'data-lsmodaltoggle-modal'=>"js-".((string)$_smarty_tpl->tpl_vars['component']->value)."-modal")),$_smarty_tpl);?>



<?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>"spinner",'mods'=>'spin 2x','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-loader"),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'modal','title'=>"Купить привилегии",'content'=>$_tmp4,'id'=>"js-".((string)$_smarty_tpl->tpl_vars['component']->value)."-modal",'classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-modal"),$_smarty_tpl);?>

    <?php }} ?>