<?php /* Smarty version Smarty-3.1.13, created on 2017-12-30 14:57:20
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/manager/invites-users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15539467885a4754f07371f9-35136995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa45e83cdcd8554de9384d9fbf03a4735fe12c1e' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/manager/invites-users.tpl',
      1 => 1511485715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15539467885a4754f07371f9-35136995',
  'function' => 
  array (
    'get_specializations' => 
    array (
      'parameter' => 
      array (
        'oUser' => 0,
      ),
      'compiled' => '',
    ),
    'get_geo' => 
    array (
      'parameter' => 
      array (
        'oUser' => 0,
      ),
      'compiled' => '',
    ),
    'get_pay' => 
    array (
      'parameter' => 
      array (
        'oUser' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'oUser' => 0,
    'aSpecializations' => 0,
    'oSpec' => 0,
    'sTitleSpec' => 0,
    'oGeo' => 0,
    'sGeoUrl' => 0,
    'component' => 0,
    'aUsersInvite' => 0,
    'oUserInvite' => 0,
    'paging' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4754f07662a4_61183694',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4754f07662a4_61183694')) {function content_5a4754f07662a4_61183694($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-invites-users', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('aUsersInvite')),$_smarty_tpl);?>


    
<?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?><?php if (!function_exists('smarty_template_function_get_specializations')) {
    function smarty_template_function_get_specializations($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['get_specializations']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php if ($_smarty_tpl->tpl_vars['oUser']->value){?>
        <?php $_smarty_tpl->tpl_vars['aSpecializations'] = new Smarty_variable($_smarty_tpl->tpl_vars['oUser']->value->category->getCategories(), null, 0);?>
        <?php if (!sizeof($_smarty_tpl->tpl_vars['aSpecializations']->value)){?>
            Не выбрано
        <?php }?>
        <?php  $_smarty_tpl->tpl_vars['oSpec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oSpec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aSpecializations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oSpec']->key => $_smarty_tpl->tpl_vars['oSpec']->value){
$_smarty_tpl->tpl_vars['oSpec']->_loop = true;
?>
            <a href='<?php echo smarty_function_router(array('page'=>"user/search/?specialization[]=".((string)$_smarty_tpl->tpl_vars['oSpec']->value->getId())),$_smarty_tpl);?>
'>
            <?php $_smarty_tpl->tpl_vars['sTitleSpec'] = new Smarty_variable($_smarty_tpl->tpl_vars['oSpec']->value->getDescription() ? $_smarty_tpl->tpl_vars['oSpec']->value->getDescription() : $_smarty_tpl->tpl_vars['oSpec']->value->getTitle(), null, 0);?><?php echo $_smarty_tpl->tpl_vars['sTitleSpec']->value;?>
</a><br>
        <?php } ?>            
    <?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?><?php if (!function_exists('smarty_template_function_get_geo')) {
    function smarty_template_function_get_geo($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['get_geo']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php if ($_smarty_tpl->tpl_vars['oUser']->value){?>
        <?php $_smarty_tpl->tpl_vars['oGeo'] = new Smarty_variable($_smarty_tpl->tpl_vars['oUser']->value->ygeo->getGeo(), null, 0);?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>"user/search?ygeo=".((string)$_smarty_tpl->tpl_vars['oGeo']->value->getId())),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['sGeoUrl'] = new Smarty_variable($_tmp1, null, 0);?>
        <?php if (!sizeof($_smarty_tpl->tpl_vars['oGeo']->value)){?>
            Не выбрано
        <?php }else{ ?>
            <a href='<?php echo $_smarty_tpl->tpl_vars['sGeoUrl']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['oGeo']->value->getGeoRegionName();?>
</a>
        <?php }?>
    <?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?><?php if (!function_exists('smarty_template_function_get_pay')) {
    function smarty_template_function_get_pay($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['get_pay']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php if ($_smarty_tpl->tpl_vars['oUser']->value){?>
        <?php $_smarty_tpl->tpl_vars['oGeo'] = new Smarty_variable($_smarty_tpl->tpl_vars['oUser']->value->ygeo->getGeo(), null, 0);?>
        <?php ob_start();?><?php echo smarty_function_router(array('page'=>"user/search?ygeo=".((string)$_smarty_tpl->tpl_vars['oGeo']->value->getId())),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['sGeoUrl'] = new Smarty_variable($_tmp2, null, 0);?>
        <?php if (!sizeof($_smarty_tpl->tpl_vars['oGeo']->value)){?>
            Не выбрано
        <?php }else{ ?>
            <a href='<?php echo $_smarty_tpl->tpl_vars['sGeoUrl']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['oGeo']->value->getGeoRegionName();?>
</a>
        <?php }?>
    <?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<table class="ls-table <?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
        <tr>
            <th>
                Пользователь
            </th>
            <th>
             Специализация
            </th>
            <th>
            Местоположение
            </th>   
            <th>
            Оплачено
            </th>
        </tr>
        
<?php  $_smarty_tpl->tpl_vars['oUserInvite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oUserInvite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aUsersInvite']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oUserInvite']->key => $_smarty_tpl->tpl_vars['oUserInvite']->value){
$_smarty_tpl->tpl_vars['oUserInvite']->_loop = true;
?>
    <tr>
        <td>
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:user.small','oUser'=>$_smarty_tpl->tpl_vars['oUserInvite']->value,'attributes'=>array('title'=>"Дата регистрации ".((string)$_smarty_tpl->tpl_vars['oUserInvite']->value->getDateRegister()))),$_smarty_tpl);?>

        </td>
        <td>
        <?php smarty_template_function_get_specializations($_smarty_tpl,array('oUser'=>$_smarty_tpl->tpl_vars['oUserInvite']->value));?>

        </td>
        <td>
        <?php smarty_template_function_get_geo($_smarty_tpl,array('oUser'=>$_smarty_tpl->tpl_vars['oUserInvite']->value));?>

        </td> 
        <td>
        <?php echo $_smarty_tpl->tpl_vars['oUserInvite']->value->getPaySumm();?>
 <?php echo Config::Get('plugin.freelancer.market.str_currency');?>

        </td>
    </tr>
<?php } ?>

</table>

<?php echo smarty_function_component(array('_default_short'=>'pagination','total'=>+$_smarty_tpl->tpl_vars['paging']->value['iCountPage'],'current'=>+$_smarty_tpl->tpl_vars['paging']->value['iCurrentPage'],'url'=>((string)$_smarty_tpl->tpl_vars['paging']->value['sBaseUrl'])."/page__page__/".((string)$_smarty_tpl->tpl_vars['paging']->value['sGetParams']),'classes'=>'js-pagination-invites'),$_smarty_tpl);?>
<?php }} ?>