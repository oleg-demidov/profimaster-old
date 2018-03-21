<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 14:33:00
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/order/order-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6612289585aa8de3c8d9932-09659363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06a0658ae574a65abca18d42fe3e087907f4b878' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/order/order-item.tpl',
      1 => 1510485010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6612289585aa8de3c8d9932-09659363',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'oOrder' => 0,
    'aSpecializations' => 0,
    'oSpecialization' => 0,
    'key' => 0,
    'oGeo' => 0,
    'aMedia' => 0,
    'oMedia' => 0,
    'aImages' => 0,
    'oMaster' => 0,
    'oUserCurrent' => 0,
    'mods' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa8de3c95c5b0_37052489',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa8de3c95c5b0_37052489')) {function content_5aa8de3c95c5b0_37052489($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
?>
 <?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-order-item', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oOrder','mods','back')),$_smarty_tpl);?>



<?php $_smarty_tpl->_capture_stack[0][] = array('title', null, null); ob_start(); ?>
    <a class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-title" href="<?php echo $_smarty_tpl->tpl_vars['oOrder']->value->_getUrlView();?>
"><?php echo $_smarty_tpl->tpl_vars['oOrder']->value->getTitle();?>
</a> 
    
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:order.status','oOrder'=>$_smarty_tpl->tpl_vars['oOrder']->value),$_smarty_tpl);?>

    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-budjet"><?php echo $_smarty_tpl->tpl_vars['oOrder']->value->getBudjet() ? $_smarty_tpl->tpl_vars['oOrder']->value->getBudjet() : 'Договорная';?>
</div>
    
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
    <?php echo smarty_function_component(array('_default_short'=>'text','text'=>$_smarty_tpl->tpl_vars['oOrder']->value->getCropText()),$_smarty_tpl);?>

    <div class="ls-grid-row <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-spec-geo">
        <div class="ls-grid-col ls-grid-col-6">
        <?php $_smarty_tpl->_capture_stack[0][] = array('specializations', null, null); ob_start(); ?>
            <?php $_smarty_tpl->tpl_vars['aSpecializations'] = new Smarty_variable($_smarty_tpl->tpl_vars['oOrder']->value->category->getCategories(), null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['oSpecialization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oSpecialization']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['aSpecializations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oSpecialization']->key => $_smarty_tpl->tpl_vars['oSpecialization']->value){
$_smarty_tpl->tpl_vars['oSpecialization']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['oSpecialization']->key;
?>
                <?php echo $_smarty_tpl->tpl_vars['oSpecialization']->value->getTitle();?>

                <?php if ($_smarty_tpl->tpl_vars['aSpecializations']->value[$_smarty_tpl->tpl_vars['key']->value+1]){?>
                    ,&nbsp;
                <?php }?>
            <?php } ?>
            <?php ob_start();?><?php echo sizeof($_smarty_tpl->tpl_vars['aSpecializations']->value);?>
<?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?>
                Не выбрано
            <?php }?>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php echo smarty_function_component(array('_default_short'=>'info-list','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-spec",'list'=>array(array('label'=>'Специализация:','icon'=>'list','content'=>Smarty::$_smarty_vars['capture']['specializations']))),$_smarty_tpl);?>

        </div>
        <div class="ls-grid-col ls-grid-col-6 <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-geo">
        <?php $_smarty_tpl->tpl_vars['oGeo'] = new Smarty_variable($_smarty_tpl->tpl_vars['oOrder']->value->ygeo->getGeo(), null, 0);?>    
        <?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['oGeo']->value){?><?php echo (string)$_smarty_tpl->tpl_vars['oGeo']->value->getGeoRegionName();?><?php }else{ ?><?php echo "Не выбрано";?><?php }?><?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'info-list','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-geo",'list'=>array(array('label'=>'Местоположение:','icon'=>'map-marker','content'=>$_tmp2))),$_smarty_tpl);?>

        </div>
    </div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('order_item_content', null, null); ob_start(); ?>
    <div class="order_item_subcontent">
    <?php $_smarty_tpl->tpl_vars['aMedia'] = new Smarty_variable($_smarty_tpl->tpl_vars['oOrder']->value->media->getMedia(), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['aImages'] = new Smarty_variable(array(), null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['oMedia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oMedia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMedia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oMedia']->key => $_smarty_tpl->tpl_vars['oMedia']->value){
$_smarty_tpl->tpl_vars['oMedia']->_loop = true;
?>
        <?php $_smarty_tpl->createLocalArrayVariable('aImages', null, 0);
$_smarty_tpl->tpl_vars['aImages']->value[] = array('src'=>$_smarty_tpl->tpl_vars['oMedia']->value->getFileWebPath('120x120crop'));?>
    <?php } ?>
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-block-text">
        <?php echo smarty_function_component(array('_default_short'=>'slider','classes'=>"js-".((string)$_smarty_tpl->tpl_vars['component']->value)."-slider ".((string)$_smarty_tpl->tpl_vars['component']->value)."-slider",'images'=>$_smarty_tpl->tpl_vars['aImages']->value),$_smarty_tpl);?>

        <?php echo smarty_function_component(array('_default_short'=>'text','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-text",'text'=>((string)$_smarty_tpl->tpl_vars['oOrder']->value->getCropText())),$_smarty_tpl);?>

    </div>
    
    <?php $_smarty_tpl->_capture_stack[0][] = array('master', null, null); ob_start(); ?>
        <?php $_smarty_tpl->tpl_vars['oMaster'] = new Smarty_variable($_smarty_tpl->tpl_vars['oOrder']->value->getMaster(), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['oMaster']->value){?>
            <?php echo smarty_function_component(array('_default_short'=>'freelancer:user.small','oUser'=>$_smarty_tpl->tpl_vars['oMaster']->value),$_smarty_tpl);?>

        <?php }else{ ?>
            Исполнитель не выбран
        <?php }?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'map-marker'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'list'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'plus'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'comments-o'),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'address-card-o'),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'info-list','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-info-list",'list'=>array(array('label'=>$_tmp3." Местоположение:",'content'=>Smarty::$_smarty_vars['capture']['order_geo']),array('label'=>$_tmp4." Спецализация:",'content'=>Smarty::$_smarty_vars['capture']['order_specializations']),array('label'=>$_tmp5." Добавлено:",'content'=>$_smarty_tpl->tpl_vars['oOrder']->value->getDateCreate()),array('label'=>$_tmp6." Откликов:",'content'=>$_smarty_tpl->tpl_vars['oOrder']->value->getCountBids()),array('label'=>$_tmp7." Исполнитель:",'content'=>Smarty::$_smarty_vars['capture']['master']))),$_smarty_tpl);?>

    </div>
    
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array('footer', null, null); ob_start(); ?>
    
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:order.actionbar','oOrder'=>$_smarty_tpl->tpl_vars['oOrder']->value),$_smarty_tpl);?>

    
    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-employer"><?php echo smarty_function_component(array('_default_short'=>'freelancer:user.small','oUser'=>$_smarty_tpl->tpl_vars['oOrder']->value->getUser()),$_smarty_tpl);?>
</div>
    
    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUserCurrent']->value->isAdministrator()){?>
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['oOrder']->value->getId();?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['oOrder']->value->getId();?>
<?php $_tmp9=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','classes'=>"button_bid_list",'template'=>'toolbar','groups'=>array(array('buttons'=>array(array('icon'=>'check','mods'=>'success','classes'=>"js-order-ajax-allow",'text'=>'Подтвердить','attributes'=>array('order_id'=>$_tmp8)),array('icon'=>'remove','mods'=>'danger','classes'=>"js-order-ajax-remove",'text'=>'Удалить','attributes'=>array('order_id'=>$_tmp9)))))),$_smarty_tpl);?>

    <?php }?>
    
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['oOrder']->value->getStatus();?>
<?php $_tmp10=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
<?php $_tmp11=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'block','mods'=>$_smarty_tpl->tpl_vars['mods']->value,'attributes'=>array('event'=>$_tmp10),'classes'=>$_tmp11." ".((string)$_smarty_tpl->tpl_vars['component']->value)." fl-admin-order",'title'=>Smarty::$_smarty_vars['capture']['title'],'footer'=>Smarty::$_smarty_vars['capture']['footer'],'content'=>Smarty::$_smarty_vars['capture']['content']),$_smarty_tpl);?>

<?php }} ?>