<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:45:05
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/banner/banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15270398205a4e3df1aa1025-82303599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '026addaeafbadf3be64a8b10c1c1a713e019c77c' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/banner/banner.tpl',
      1 => 1506250280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15270398205a4e3df1aa1025-82303599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3df1aaac67_70701108',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3df1aaac67_70701108')) {function content_5a4e3df1aaac67_70701108($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-banner', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('sUrl')),$_smarty_tpl);?>


<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-cont">
        <h1>Стань мастером и зарабатывай вместе с <br><img src="<?php echo Plugin::GetWebPath('freelancer');?>
frontend/components/banner/img/logo.png"/></h1>
        <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-button"><?php ob_start();?><?php echo smarty_function_router(array('page'=>"user/register_master/step1"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','url'=>$_tmp1,'mods'=>"large warning",'text'=>"Стать мастером"),$_smarty_tpl);?>

        <br>Получай заказы от лучших заказчиков казнета</div>
        <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-button"><?php ob_start();?><?php echo smarty_function_router(array('page'=>"user/register_employer/reg"),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','url'=>$_tmp2,'mods'=>"large primary",'text'=>"Стать заказчиком"),$_smarty_tpl);?>

        <br>Выбирай лучших исполнителей твоих заказов</div>
        
    </div>
</div>
    <?php }} ?>