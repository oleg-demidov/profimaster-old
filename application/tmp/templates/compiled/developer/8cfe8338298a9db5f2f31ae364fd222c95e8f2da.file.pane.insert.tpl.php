<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:35:44
         compiled from "/var/www/profimaster/application/frontend/components/media/panes/pane.insert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13109220885a4e49d0af4277-02617842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cfe8338298a9db5f2f31ae364fd222c95e8f2da' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/media/panes/pane.insert.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
    'f1ba260635030e314458fa198922b4d56b493b82' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/media/panes/pane.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13109220885a4e49d0af4277-02617842',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49d0affa95_59548697',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49d0affa95_59548697')) {function content_5a4e49d0affa95_59548697($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?>
    <?php echo smarty_function_component_define_params(array('params'=>array('id')),$_smarty_tpl);?>


    <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable('tab-media-insert', null, 0);?>


<div class="ls-media-pane-content js-media-pane-content">
    
    <?php echo smarty_function_component(array('_default_short'=>'media','template'=>'uploader','attributes'=>array('id'=>'media-uploader'),'classes'=>'js-media-uploader','targetParams'=>$_smarty_tpl->tpl_vars['aTargetParams']->value,'targetType'=>$_smarty_tpl->tpl_vars['sMediaTargetType']->value,'targetId'=>$_smarty_tpl->tpl_vars['sMediaTargetId']->value,'targetTmp'=>$_smarty_tpl->tpl_vars['sMediaTargetTmp']->value),$_smarty_tpl);?>


</div>

<div class="ls-media-pane-footer">
    
    <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'media.insert.submit'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','mods'=>'primary','classes'=>'js-media-insert-submit','text'=>$_tmp1),$_smarty_tpl);?>


</div><?php }} ?>