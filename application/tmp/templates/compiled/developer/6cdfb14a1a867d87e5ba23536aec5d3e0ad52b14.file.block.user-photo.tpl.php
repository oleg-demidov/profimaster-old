<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:36
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/user/blocks/block.user-photo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1132732395ab2074c1f6f22-78214003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cdfb14a1a867d87e5ba23536aec5d3e0ad52b14' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/user/blocks/block.user-photo.tpl',
      1 => 1514979250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1132732395ab2074c1f6f22-78214003',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserProfile' => 0,
    'oUser' => 0,
    'session' => 0,
    'aLang' => 0,
    'date' => 0,
    'component' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab2074c216182_25384317',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab2074c216182_25384317')) {function content_5ab2074c216182_25384317($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_date_format')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.date_format.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-user-photo', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser','mods','classes','attributes')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['oUser'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['oUserProfile']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['oUser']->value : $tmp), null, 0);?>
<?php $_smarty_tpl->_capture_stack[0][] = array('block_content', null, null); ob_start(); ?>
    <?php $_smarty_tpl->tpl_vars['session'] = new Smarty_variable($_smarty_tpl->tpl_vars['oUser']->value->getSession(), null, 0);?>

    
    <?php if ($_smarty_tpl->tpl_vars['session']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['oUser']->value->isOnline()&&time()-strtotime($_smarty_tpl->tpl_vars['session']->value->getDateLast())<60*5){?>
            <div class="user-status user-status--online"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['user']['status']['online'];?>
</div>
        <?php }else{ ?>
            <div class="user-status user-status--offline">
                <?php ob_start();?><?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['session']->value->getDateLast(),'hours_back'=>"12",'minutes_back'=>"60",'day_back'=>"8",'now'=>"60*5",'day'=>"day H:i",'format'=>"j F в G:i"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['date'] = new Smarty_variable(mb_strtolower($_tmp1, 'UTF-8'), null, 0);?>

                <?php if ($_smarty_tpl->tpl_vars['oUser']->value->getProfileSex()!='woman'){?>
                    <?php echo smarty_function_lang(array('name'=>'user.status.was_online_male','date'=>$_smarty_tpl->tpl_vars['date']->value),$_smarty_tpl);?>

                <?php }else{ ?>
                    <?php echo smarty_function_lang(array('name'=>'user.status.was_online_female','date'=>$_smarty_tpl->tpl_vars['date']->value),$_smarty_tpl);?>

                <?php }?>
            </div>
        <?php }?>
    <?php }?>

    <?php echo smarty_function_component(array('_default_short'=>'photo','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)." js-user-photo",'hasPhoto'=>$_smarty_tpl->tpl_vars['oUser']->value->getProfileFoto(),'editable'=>$_smarty_tpl->tpl_vars['oUser']->value->isAllowEdit(),'targetId'=>$_smarty_tpl->tpl_vars['oUser']->value->getId(),'url'=>$_smarty_tpl->tpl_vars['oUser']->value->getUserWebPath(),'photoPath'=>$_smarty_tpl->tpl_vars['oUser']->value->getProfileFotoPath(),'photoAltText'=>$_smarty_tpl->tpl_vars['oUser']->value->getDisplayName()),$_smarty_tpl);?>

        
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:user.block.actions'),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo smarty_function_component(array('_default_short'=>'block','mods'=>'user-photo','content'=>Smarty::$_smarty_vars['capture']['block_content']),$_smarty_tpl);?>

    
<?php }} ?>