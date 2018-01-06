<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:35:44
         compiled from "/var/www/profimaster/application/frontend/components/media/uploader/uploader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:239996915a4e49d0b01628-58860075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83f3672113927c240dbbc059c448abf0b9aa3b6d' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/media/uploader/uploader.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
    'b9279ff6cf40d9451e73d1e4fd07ce2e0db12877' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/uploader/uploader.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '239996915a4e49d0b01628-58860075',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'useFilter' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49d0b30c50_22044435',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49d0b30c50_22044435')) {function content_5a4e49d0b30c50_22044435($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_json')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.json.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-uploader', null, 0);?>


    <?php echo smarty_function_component_define_params(array('params'=>array('show','useFilter','mods','classes','attributes')),$_smarty_tpl);?>


    <?php $_smarty_tpl->tpl_vars['show'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['show']->value)===null||$tmp==='' ? true : $tmp), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['useFilter'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['useFilter']->value)===null||$tmp==='' ? true : $tmp), null, 0);?>

    <?php echo smarty_function_component_define_params(array('params'=>array('targetType','targetId','targetTmp')),$_smarty_tpl);?>


    <?php ob_start();?><?php echo smarty_function_json(array('var'=>$_smarty_tpl->tpl_vars['targetType']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_json(array('var'=>$_smarty_tpl->tpl_vars['targetId']->value),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_json(array('var'=>$_smarty_tpl->tpl_vars['targetTmp']->value),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['attributes'] = new Smarty_variable(array_merge((($tmp = @$_smarty_tpl->tpl_vars['attributes']->value)===null||$tmp==='' ? array() : $tmp),array('data-param-target_type'=>$_tmp1,'data-param-target_id'=>$_tmp2,'data-param-target_tmp'=>$_tmp3)), null, 0);?>


<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    
    <?php echo smarty_function_hook(array('run'=>'uploader_begin'),$_smarty_tpl);?>


    
        
        <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'upload-area','classes'=>'js-uploader-area','inputClasses'=>'js-uploader-file','inputName'=>'filedata'),$_smarty_tpl);?>


        
        <?php echo smarty_function_hook(array('run'=>'uploader_area_after'),$_smarty_tpl);?>


        
        <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-wrapper ls-clearfix">
            
            <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-aside js-uploader-aside is-empty">
                
                <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'uploader.info.empty'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'blankslate','text'=>$_tmp1,'classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-aside-empty js-uploader-aside-empty"),$_smarty_tpl);?>


                
                <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-aside-blocks js-uploader-blocks">
                    
                        <?php echo smarty_function_component(array('_default_short'=>'uploader','template'=>'block.info'),$_smarty_tpl);?>

                    
    
    <?php echo smarty_function_component(array('_default_short'=>'media','template'=>'uploader-block.insert.image'),$_smarty_tpl);?>


    
    <?php echo smarty_function_component(array('_default_short'=>'media','template'=>'uploader-block.photoset'),$_smarty_tpl);?>


                </div>
            </div>

            
            <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-content js-uploader-content ls-clearfix">
                
                <?php echo smarty_function_hook(array('run'=>'uploader_content_begin'),$_smarty_tpl);?>


                
                <?php if ($_smarty_tpl->tpl_vars['useFilter']->value){?>
                    <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'uploader.filter.uploaded'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'uploader.filter.all'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'actionbar','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-filter js-uploader-filter",'items'=>array(array('buttons'=>array(array('text'=>$_tmp2,'classes'=>'active js-uploader-filter-item','attributes'=>array('data-filter'=>'uploaded')),array('text'=>$_tmp3,'classes'=>'js-uploader-filter-item','attributes'=>array('data-filter'=>'all')))))),$_smarty_tpl);?>

                <?php }?>

                
                <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'uploader.attach.empty'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'blankslate','visible'=>false,'text'=>$_tmp4,'mods'=>'no-background','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-list-blankslate js-uploader-list-blankslate"),$_smarty_tpl);?>


                
                <ul class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-file-list js-uploader-list"></ul>

                <?php echo smarty_function_component(array('_default_short'=>'pagination','template'=>'ajax','mods'=>'small','attributes'=>array('style'=>'display: none'),'classes'=>'js-uploader-list-pagination'),$_smarty_tpl);?>


                
                <?php echo smarty_function_hook(array('run'=>'uploader_content_end'),$_smarty_tpl);?>

            </div>
        </div>
    

    
    <?php echo smarty_function_hook(array('run'=>'uploader_end'),$_smarty_tpl);?>

</div><?php }} ?>