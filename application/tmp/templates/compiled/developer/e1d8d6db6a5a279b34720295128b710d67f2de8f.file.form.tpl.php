<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:16:12
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/media/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19313972665a46320cbfcff0-21803886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1d8d6db6a5a279b34720295128b710d67f2de8f' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/media/form.tpl',
      1 => 1502161865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19313972665a46320cbfcff0-21803886',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oTarget' => 0,
    'aMedias' => 0,
    'oMedia' => 0,
    'aLang' => 0,
    'iNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a46320cc13838_53735340',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a46320cc13838_53735340')) {function content_5a46320cc13838_53735340($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php echo smarty_function_component_define_params(array('params'=>array('oTarget')),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['oTarget']->value){?>
    <?php $_smarty_tpl->tpl_vars['aMedias'] = new Smarty_variable($_smarty_tpl->tpl_vars['oTarget']->value->media->getMedia(), null, 0);?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("media_items", null, null); ob_start(); ?>
        <div class="media_items">
        <?php  $_smarty_tpl->tpl_vars['oMedia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oMedia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMedias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oMedia']->key => $_smarty_tpl->tpl_vars['oMedia']->value){
$_smarty_tpl->tpl_vars['oMedia']->_loop = true;
?>
            <a class="js-lbx" href="<?php echo $_smarty_tpl->tpl_vars['oMedia']->value->getFileWebPath();?>
">
                <div class="but_close" id="<?php echo $_smarty_tpl->tpl_vars['oMedia']->value->getId();?>
">X</div>
                <img src="<?php echo $_smarty_tpl->tpl_vars['oMedia']->value->getFileWebPath100x100crop();?>
">
            </a>
        <?php } ?>
        </div>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php ob_start();?><?php echo Smarty::$_smarty_vars['capture']['media_items'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['text']['media']['image'];?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['text']['media']['add'];?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'button','type'=>'button','text'=>$_tmp3,'classes'=>'user-media-mymodal-toggle','attributes'=>array('data-lsmodaltoggle-modal'=>"media_modal_user")),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','content'=>$_tmp1,'title'=>$_tmp2,'footer'=>$_tmp4),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars['iNum'] = new Smarty_variable(1, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['oMedia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oMedia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMedias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oMedia']->key => $_smarty_tpl->tpl_vars['oMedia']->value){
$_smarty_tpl->tpl_vars['oMedia']->_loop = true;
?>
        <input type="hidden" name="media[<?php echo $_smarty_tpl->tpl_vars['iNum']->value;?>
]" class="attach_media" value="<?php echo $_smarty_tpl->tpl_vars['oMedia']->value->getId();?>
">
        <?php $_smarty_tpl->tpl_vars['iNum'] = new Smarty_variable($_smarty_tpl->tpl_vars['iNum']->value+1, null, 0);?>
    <?php } ?>
     <?php echo smarty_function_component(array('_default_short'=>'field.hidden','classes'=>"media_ids"),$_smarty_tpl);?>

<?php }?>

<?php }} ?>