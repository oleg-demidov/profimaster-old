<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 14:46:52
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-plugin/plugin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14622425645ab0ca7cd709e7-46008021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '761ab866ecae578b24d7d7c946b5cf520e56c3f1' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-plugin/plugin.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14622425645ab0ca7cd709e7-46008021',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'plugin' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'aLang' => 0,
    'updates' => 0,
    'info' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab0ca7cdc8885_11392909',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab0ca7cdc8885_11392909')) {function content_5ab0ca7cdc8885_11392909($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-plugin', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('plugin','updates','mods','classes','attributes')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['plugin']->value->getActive()){?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." activated", null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." deactivated", null, 0);?>
<?php }?>

<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    
    <img class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-image" src="<?php echo $_smarty_tpl->tpl_vars['plugin']->value->getLogo();?>
">

    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-body">
        
        <h2 class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-title">
            
            <?php if ($_smarty_tpl->tpl_vars['plugin']->value->getActive()&&$_smarty_tpl->tpl_vars['plugin']->value->getOwnSettingsPageUrl()){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value->getOwnSettingsPageUrl();?>
" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['settings_tip'];?>
"><?php echo $_smarty_tpl->tpl_vars['plugin']->value->getName();?>
</a>
            <?php }else{ ?>
                <?php echo $_smarty_tpl->tpl_vars['plugin']->value->getName();?>

            <?php }?>
        </h2>

        <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-info-main">
            
            <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-version">v<?php echo $_smarty_tpl->tpl_vars['plugin']->value->getVersion();?>
</div>

            
            <span class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-author">
                от <span class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-author-name"><?php echo $_smarty_tpl->tpl_vars['plugin']->value->getAuthor();?>
</span>
            </span>
        </div>

        
        <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-desc ls-text">
            <?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['plugin']->value->getDescription()), ENT_QUOTES, 'UTF-8', true);?>

        </div>

        
        <?php if ($_smarty_tpl->tpl_vars['updates']->value&&isset($_smarty_tpl->tpl_vars['updates']->value[$_smarty_tpl->tpl_vars['plugin']->value->getCode()])){?>
            <?php $_smarty_tpl->tpl_vars['info'] = new Smarty_variable($_smarty_tpl->tpl_vars['updates']->value[$_smarty_tpl->tpl_vars['plugin']->value->getCode()], null, 0);?>
            <?php $_smarty_tpl->tpl_vars['text'] = new Smarty_variable("<a href=\"".((string)$_smarty_tpl->tpl_vars['info']->value->getUrlDownload())."\" target=\"_blank\">".((string)$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['new_version_avaible'])." <b>".((string)$_smarty_tpl->tpl_vars['info']->value->getVersion())."</b></a>", null, 0);?>

            <?php echo smarty_function_component(array('_default_short'=>'admin:alert','text'=>$_smarty_tpl->tpl_vars['text']->value,'mods'=>'info'),$_smarty_tpl);?>

        <?php }?>

        
        <ul class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-info">
            <li class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-info-item">
                <?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'folder-o'),$_smarty_tpl);?>
 /plugins/<?php echo $_smarty_tpl->tpl_vars['plugin']->value->getCode();?>
/
            </li>

            <?php if ($_smarty_tpl->tpl_vars['plugin']->value->getHomepage()){?>
                <li class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-info-item">
                    <?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'home'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['plugin']->value->getHomepage();?>

                </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['plugin']->value->getInstallInstructionsText()){?>
                <li class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-info-item">
                    <?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'question-circle'),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value->getInstallInstructionsUrl();?>
">Инструкция по установке</a>
                </li>
            <?php }?>
        </ul>
    </div>

    
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-actions">
        <?php if ($_smarty_tpl->tpl_vars['plugin']->value->getActive()){?>
            
            <?php echo smarty_function_component(array('_default_short'=>'admin:button','mods'=>'block','url'=>$_smarty_tpl->tpl_vars['plugin']->value->getConfigSettingsPageUrl(),'text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['config'],'attributes'=>array('title'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['config_tip'])),$_smarty_tpl);?>


            
            <?php echo smarty_function_component(array('_default_short'=>'admin:button','mods'=>'block','url'=>$_smarty_tpl->tpl_vars['plugin']->value->getDeactivateUrl(),'text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['deactivate'],'attributes'=>array('title'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['deactivate'])),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_component(array('_default_short'=>'admin:button','mods'=>'block','url'=>$_smarty_tpl->tpl_vars['plugin']->value->getActivateUrl(),'text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['activate'],'attributes'=>array('title'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['activate'])),$_smarty_tpl);?>

        <?php }?>

        
        <?php if ($_smarty_tpl->tpl_vars['plugin']->value->getApplyUpdate()&&$_smarty_tpl->tpl_vars['plugin']->value->getActive()){?>
            <?php echo smarty_function_component(array('_default_short'=>'admin:button','mods'=>'block','url'=>$_smarty_tpl->tpl_vars['plugin']->value->getApplyUpdateUrl(),'text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['apply_update'],'attributes'=>array('title'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['apply_update'])),$_smarty_tpl);?>

        <?php }?>

        
        <?php echo smarty_function_component(array('_default_short'=>'admin:button','mods'=>'block','url'=>$_smarty_tpl->tpl_vars['plugin']->value->getRemoveUrl(),'text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['remove'],'attributes'=>array('title'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['plugins']['list']['remove'],'data-question-title'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['remove_confirm']),'classes'=>'js-question'),$_smarty_tpl);?>

    </div>
</div>
<?php }} ?>