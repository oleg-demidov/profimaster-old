<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 20:07:46
         compiled from "/var/www/profimaster/application/plugins/admin/frontend/components/p-user/charts/chart.location.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6103465195aa92cb2a505a7-13075960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e62c84fb780fb0cf9121118ed6fe25328e7b01b' => 
    array (
      0 => '/var/www/profimaster/application/plugins/admin/frontend/components/p-user/charts/chart.location.tpl',
      1 => 1493631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6103465195aa92cb2a505a7-13075960',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'total' => 0,
    'component' => 0,
    'sorting' => 0,
    'section' => 0,
    'aLang' => 0,
    'aNormalViewLivingStats' => 0,
    'dataItem' => 0,
    'oEnt' => 0,
    'iPercentage' => 0,
    'aShortViewLivingStats' => 0,
    'aItemRecord' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa92cb2a9f676_62092907',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa92cb2a9f676_62092907')) {function content_5aa92cb2a9f676_62092907($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_request_filter')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.request_filter.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-chart-location', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('data','total','section','sorting')),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['data']->value&&$_smarty_tpl->tpl_vars['data']->value['collection']&&count($_smarty_tpl->tpl_vars['data']->value['collection'])>0){?>
    
    <?php $_smarty_tpl->tpl_vars['aShortViewLivingStats'] = new Smarty_variable(array_splice($_smarty_tpl->tpl_vars['data']->value['collection'],Config::Get('plugin.admin.users.max_items_in_living_users_stats')), null, 0);?>
    
    <?php $_smarty_tpl->tpl_vars['aNormalViewLivingStats'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value['collection'], null, 0);?>

    
    <script>
        var totalUsersCount = <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
;
    </script>

    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 ls-clearfix">
        
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin/users/stats'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_request_filter(array('name'=>array('living_sorting'),'value'=>array('alphabetic')),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['sorting']->value=='alphabetic'){?><?php echo "active";?><?php }?><?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'admin/users/stats'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_request_filter(array('name'=>array('living_sorting'),'value'=>array(null)),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['sorting']->value=='top'){?><?php echo "active";?><?php }?><?php $_tmp6=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'admin:button.group','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-sort",'buttons'=>array(array('text'=>'A-z','url'=>$_tmp1.$_tmp2,'classes'=>"js-ajax-load ".$_tmp3),array('text'=>'3-2-1','url'=>$_tmp4.$_tmp5,'classes'=>"js-ajax-load ".$_tmp6))),$_smarty_tpl);?>


        
        <h3 class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-title page-sub-header">
            <?php if ($_smarty_tpl->tpl_vars['section']->value=='countries'){?>
                <?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['countries'];?>
 <?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['and_text'];?>

                <a href="<?php echo smarty_function_router(array('page'=>'admin/users/stats'),$_smarty_tpl);?>
<?php echo smarty_function_request_filter(array('name'=>array('living_section'),'value'=>array('cities')),$_smarty_tpl);?>
" class="js-ajax-load"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['cities'];?>
</a>
            <?php }elseif($_smarty_tpl->tpl_vars['section']->value=='cities'){?>
                <a href="<?php echo smarty_function_router(array('page'=>'admin/users/stats'),$_smarty_tpl);?>
<?php echo smarty_function_request_filter(array('name'=>array('living_section'),'value'=>array(null)),$_smarty_tpl);?>
" class="js-ajax-load"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['countries'];?>
</a>
                <?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['and_text'];?>
 <?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['cities'];?>

            <?php }?>
        </h3>

        <table class="ls-table <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-data">
            
            <?php  $_smarty_tpl->tpl_vars['dataItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dataItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aNormalViewLivingStats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dataItem']->key => $_smarty_tpl->tpl_vars['dataItem']->value){
$_smarty_tpl->tpl_vars['dataItem']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['iPercentage'] = new Smarty_variable(number_format($_smarty_tpl->tpl_vars['dataItem']->value['count']*100/$_smarty_tpl->tpl_vars['total']->value,2,'.',''), null, 0);?>
                <?php $_smarty_tpl->tpl_vars['oEnt'] = new Smarty_variable($_smarty_tpl->tpl_vars['dataItem']->value['entity'], null, 0);?>

                <tr>
                    <td class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-label" title="<?php echo $_smarty_tpl->tpl_vars['dataItem']->value['count'];?>
 <?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['users'];?>
">
                        
                        <?php if ($_smarty_tpl->tpl_vars['oEnt']->value){?>
                            
                            <?php if ($_smarty_tpl->tpl_vars['oEnt']->value->getType()=='country'){?>
                                <span class="flag styled flag-<?php echo strtolower($_smarty_tpl->tpl_vars['oEnt']->value->getCode());?>
"></span>
                            <?php }?>
                            <a href="<?php echo smarty_function_router(array('page'=>'people'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['oEnt']->value->getType();?>
/<?php echo $_smarty_tpl->tpl_vars['oEnt']->value->getId();?>
/"
                               target="_blank"
                               class="<?php echo $_smarty_tpl->tpl_vars['oEnt']->value->getType();?>
 <?php if ($_smarty_tpl->tpl_vars['oEnt']->value->getType()=='country'){?><?php echo $_smarty_tpl->tpl_vars['oEnt']->value->getCode();?>
<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['oEnt']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
</a>
                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['dataItem']->value['item'];?>

                        <?php }?>
                    </td>
                    
                    <td class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-count">
                        <?php echo $_smarty_tpl->tpl_vars['dataItem']->value['count'];?>

                    </td>
                    
                    <td class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-percentages percent" title="<?php echo $_smarty_tpl->tpl_vars['dataItem']->value['count'];?>
 <?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['users'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['iPercentage']->value;?>
%
                    </td>

                    <td>
                        <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-bar" title="<?php echo $_smarty_tpl->tpl_vars['dataItem']->value['count'];?>
 <?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['users_stats']['users'];?>
">
                            <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-bar-value" style="width: <?php echo $_smarty_tpl->tpl_vars['iPercentage']->value;?>
%;"></div>
                        </div>
                    </td>
                </tr>
            <?php } ?>

            
            <?php if ($_smarty_tpl->tpl_vars['aShortViewLivingStats']->value&&count($_smarty_tpl->tpl_vars['aShortViewLivingStats']->value)>0){?>
                <tr class="chart-bar-location-custom">
                    <td class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-label">
                        <select id="admin_users_stats_living_stats_short_view_select" class="width-full">
                            <?php  $_smarty_tpl->tpl_vars['aItemRecord'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aItemRecord']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aShortViewLivingStats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aItemRecord']->key => $_smarty_tpl->tpl_vars['aItemRecord']->value){
$_smarty_tpl->tpl_vars['aItemRecord']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['aItemRecord']->value['count'];?>
"><?php echo $_smarty_tpl->tpl_vars['aItemRecord']->value['item'];?>
</option>
                            <?php } ?>
                        </select>
                    </td>
                    <td class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-count" id="admin_users_stats_living_stats_short_view_count"></td>
                    <td class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-percentages" id="admin_users_stats_living_stats_short_view_percentage"></td>
                    <td></td>
                </tr>
            <?php }?>
        </table>
    </div>
<?php }?><?php }} ?>