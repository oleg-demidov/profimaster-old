<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:17:56
         compiled from "/var/www/profimaster/application/frontend/components/media/panes/pane.url.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20055856625ab2072430da57-09720811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '509531d7874199789ccb2b6ce3afe9167073e025' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/media/panes/pane.url.tpl',
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
  'nocache_hash' => '20055856625ab2072430da57-09720811',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab2072431ae68_35266967',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab2072431ae68_35266967')) {function content_5ab2072431ae68_35266967($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
    <?php echo smarty_function_component_define_params(array('params'=>array('id')),$_smarty_tpl);?>


    <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable('tab-media-url', null, 0);?>


<div class="ls-media-pane-content js-media-pane-content">
    
    <form method="post" action="" enctype="multipart/form-data" class="ls-mb-20 js-media-url-form">
        
        
        

        
        <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'media.url.fields.url.label'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'url','inputClasses'=>'js-media-url-form-url','label'=>$_tmp1),$_smarty_tpl);?>

    </form>

    <div class="ls-mb-15 js-media-url-image-preview" style="display: none"></div>

    <div class="js-media-url-settings-blocks">
        <?php echo smarty_function_component(array('_default_short'=>'media','template'=>'uploader-block.insert.image','useSizes'=>false),$_smarty_tpl);?>

    </div>

</div>

<div class="ls-media-pane-footer">
    
    <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'media.url.submit_insert'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','mods'=>'primary','classes'=>'js-media-url-submit-insert','text'=>$_tmp1),$_smarty_tpl);?>


    <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'media.url.submit_upload'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','mods'=>'primary','classes'=>'js-media-url-submit-upload','text'=>$_tmp2),$_smarty_tpl);?>


</div><?php }} ?>