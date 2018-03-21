<?php /* Smarty version Smarty-3.1.13, created on 2018-03-15 00:51:03
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/user/settings/specialization.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19589691365aa96f177b45a5-84638424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2560dddf06f6d15ffe1a0ae340c4ec509994aeda' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/user/settings/specialization.tpl',
      1 => 1511785615,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19589691365aa96f177b45a5-84638424',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa96f177bf776_70505192',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa96f177bf776_70505192')) {function content_5aa96f177bf776_70505192($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_insert_block')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/insert.block.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>




<form action="<?php echo smarty_function_router(array('page'=>'settings'),$_smarty_tpl);?>
specialization/" method="POST" enctype="multipart/form-data">
    <?php echo smarty_function_hook(array('run'=>'user_settings_specialization_begin'),$_smarty_tpl);?>

    
    <?php echo smarty_insert_block(array('block' => "specialization", 'params' => array('plugin'=>'freelancer','target'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value,'entity'=>'ModuleUser_EntityUser')),$_smarty_tpl);?>

        
    
    <?php echo smarty_function_hook(array('run'=>'user_settings_specialization_end','oUser'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value),$_smarty_tpl);?>

    
    <?php if (!$_smarty_tpl->tpl_vars['oUserCurrent']->value->isRoleMasterNeogrSpecialization()){?>
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:market','text'=>"Добавить специализации",'sTargetType'=>"role",'iTargetId'=>"master_neogr_specialization"),$_smarty_tpl);?>

    <?php }?>
    <?php echo smarty_function_component(array('_default_short'=>'button','text'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['save'],'mods'=>'primary'),$_smarty_tpl);?>

</form>
<?php }} ?>