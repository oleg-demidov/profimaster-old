<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 21:36:11
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/footer/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14760627975a4e49ebf252b1-69135146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bc9938e225496a9836224213c854a81fa57f5a9' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/footer/footer.tpl',
      1 => 1514541977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14760627975a4e49ebf252b1-69135146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'aLang' => 0,
    'oUserCurrent' => 0,
    'sMenuHeadItemSelect' => 0,
    'aItems' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e49ec0009c0_29234212',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e49ec0009c0_29234212')) {function content_5a4e49ec0009c0_29234212($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-footer', null, 0);?>
<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
    <div class="ls-grid-row <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-inside">
        <div class="ls-grid-col ls-grid-col-4">
            <a class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-logo" href="<?php echo smarty_function_router(array('page'=>'index'),$_smarty_tpl);?>
">
                <img src="<?php echo Plugin::GetTemplateWebPath('freelancer');?>
assets/images/logo.png"> Profimaster.kz</a>
                <br>
            <?php echo smarty_function_hook(array('run'=>'copyright'),$_smarty_tpl);?>

        </div>
        <div class="ls-grid-col ls-grid-col-4">
            <?php ob_start();?><?php echo smarty_function_router(array('page'=>'order/search'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'user/search'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'info'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'community'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'info'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['aItems'] = new Smarty_variable(array(array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['menu']['orders'],'classes'=>"fl-nav-item",'icon'=>'list','url'=>$_tmp1,'name'=>'order_search'),array('text'=>$_smarty_tpl->tpl_vars['aLang']->value['plugin']['freelancer']['menu']['masters'],'classes'=>"fl-nav-item",'icon'=>'address-card-o','url'=>$_tmp2,'name'=>'master_search'),array('text'=>"Информация",'classes'=>"fl-nav-item",'icon'=>'info','url'=>$_tmp3,'name'=>'info'),array('text'=>"Сообщество",'classes'=>"fl-nav-item",'icon'=>'users','url'=>$_tmp4,'name'=>'blog'),array('text'=>"Партнерcкая программа",'classes'=>"fl-nav-item",'icon'=>'money','url'=>$_tmp5."manager",'name'=>'manager_info')), null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
                <?php ob_start();?><?php echo smarty_function_router(array('page'=>'manager'),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aItems', null, 0);
$_smarty_tpl->tpl_vars['aItems']->value[] = array('text'=>"Моя партнерка",'classes'=>"fl-nav-item",'icon'=>'link','url'=>$_tmp6.((string)$_smarty_tpl->tpl_vars['oUserCurrent']->value->getLogin()),'name'=>'manager_profile');?>
            <?php }?>
            <?php echo smarty_function_component(array('_default_short'=>'nav','hook'=>'footer','activeItem'=>$_smarty_tpl->tpl_vars['sMenuHeadItemSelect']->value,'mods'=>'stacked footer','items'=>$_smarty_tpl->tpl_vars['aItems']->value),$_smarty_tpl);?>

        </div>
        <div class="ls-grid-col ls-grid-col-4">
            <h4>Контакты</h4>
            <b>notify@profimaster.kz</b>
        </div>
    </div>
</div>
<?php }} ?>