<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:32:09
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-dashboard/blocks/block.stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14612875875a4e48f9b37593-65840245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39942fb5d4238b1f4b9670c54563d7e9ccfd8c4c' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-dashboard/blocks/block.stats.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
    '555c8e0c632fb002f1f1bd7b78c30daa55642d24' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/block/block.tpl',
      1 => 1493631838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14612875875a4e48f9b37593-65840245',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'title' => 0,
    'titleUrl' => 0,
    'content' => 0,
    'list' => 0,
    'tabs' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e48f9b750b9_91676737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e48f9b750b9_91676737')) {function content_5a4e48f9b750b9_91676737($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-block', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('title','titleUrl','content','show','footer','list','tabs','mods','classes','attributes')),$_smarty_tpl);?>



    <?php $_smarty_tpl->tpl_vars['classes'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['classes']->value)." js-admin-block-stats", null, 0);?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." nopadding", null, 0);?>
    <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable($_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['index']['new_items'], null, 0);?>
    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'admin:p-dashboard.block-stats-content'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['tabs'] = new Smarty_variable(array('classes'=>'js-tabs-block','tabs'=>array(array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['graph']['period_bar'][PluginAdmin_ModuleStats::TIME_INTERVAL_TODAY],'url'=>$_tmp1."ajax-get-new-items-block",'content'=>$_tmp2,'attributes'=>array('data-param-filter[newly_added_items_period]'=>PluginAdmin_ModuleStats::TIME_INTERVAL_TODAY)),array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['graph']['period_bar'][PluginAdmin_ModuleStats::TIME_INTERVAL_YESTERDAY],'url'=>$_tmp3."ajax-get-new-items-block",'attributes'=>array('data-param-filter[newly_added_items_period]'=>PluginAdmin_ModuleStats::TIME_INTERVAL_YESTERDAY)),array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['graph']['period_bar'][PluginAdmin_ModuleStats::TIME_INTERVAL_WEEK],'url'=>$_tmp4."ajax-get-new-items-block",'attributes'=>array('data-param-filter[newly_added_items_period]'=>PluginAdmin_ModuleStats::TIME_INTERVAL_WEEK)),array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['graph']['period_bar'][PluginAdmin_ModuleStats::TIME_INTERVAL_MONTH],'url'=>$_tmp5."ajax-get-new-items-block",'attributes'=>array('data-param-filter[newly_added_items_period]'=>PluginAdmin_ModuleStats::TIME_INTERVAL_MONTH)))), null, 0);?>


<?php $_smarty_tpl->tpl_vars['show'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['show']->value)===null||$tmp==='' ? true : $tmp), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['show']->value){?>
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
        
        <?php if ($_smarty_tpl->tpl_vars['title']->value){?>
            <header class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-header">
                
                    <h3 class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-title">
                        <?php if ($_smarty_tpl->tpl_vars['titleUrl']->value){?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['titleUrl']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                        <?php }?>
                    </h3>
                
            </header>
        <?php }?>

        

        
        <?php if ($_smarty_tpl->tpl_vars['content']->value){?>
            
                <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-content">
                    
                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                    
                </div>
            
        <?php }?>

        

        
        <?php if (is_array($_smarty_tpl->tpl_vars['list']->value)){?>
            <?php echo smarty_function_component(array('_default_short'=>'item','template'=>'group','params'=>$_smarty_tpl->tpl_vars['list']->value),$_smarty_tpl);?>

        <?php }elseif($_smarty_tpl->tpl_vars['list']->value){?>
            <?php echo $_smarty_tpl->tpl_vars['list']->value;?>

        <?php }?>

        
        <?php if (is_array($_smarty_tpl->tpl_vars['tabs']->value)){?>
            <?php echo smarty_function_component(array('_default_short'=>'tabs','classes'=>'js-tabs-block','params'=>$_smarty_tpl->tpl_vars['tabs']->value),$_smarty_tpl);?>

        <?php }elseif($_smarty_tpl->tpl_vars['tabs']->value){?>
            <?php echo $_smarty_tpl->tpl_vars['tabs']->value;?>

        <?php }?>

        
        <?php if ($_smarty_tpl->tpl_vars['footer']->value){?>
            
                <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-footer">
                    
                        <?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

                    
                </div>
            
        <?php }?>

        
    </div>
<?php }?><?php }} ?>