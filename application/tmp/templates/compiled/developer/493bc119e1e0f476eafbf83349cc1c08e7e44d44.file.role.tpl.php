<?php /* Smarty version Smarty-3.1.13, created on 2018-01-03 14:29:46
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/market/role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2998398145a4c947a76c712-75038320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '493bc119e1e0f476eafbf83349cc1c08e7e44d44' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/market/role.tpl',
      1 => 1512140856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2998398145a4c947a76c712-75038320',
  'function' => 
  array (
    'getPayBut' => 
    array (
      'parameter' => 
      array (
        'oRole' => 0,
        'mods' => '',
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'oRole' => 0,
    'aActions' => 0,
    'aUserActions' => 0,
    'mods' => 0,
    'component' => 0,
    'aRolesPay' => 0,
    'oRolePay' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4c947a79b6e4_02345883',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4c947a79b6e4_02345883')) {function content_5a4c947a79b6e4_02345883($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-market-role', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oRole','price')),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['oRole']->value){?>
        <?php $_smarty_tpl->tpl_vars['aRolesPay'] = new Smarty_variable($_smarty_tpl->tpl_vars['oRole']->value->getRolesPay(), null, 0);?>
    <?php }?>
    
    <?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php if (!function_exists('smarty_template_function_getPayBut')) {
    function smarty_template_function_getPayBut($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['getPayBut']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
        <?php if ($_smarty_tpl->tpl_vars['oRole']->value){?>
            <?php ob_start();?><?php echo sizeof($_smarty_tpl->tpl_vars['aActions']->value);?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1&&$_smarty_tpl->tpl_vars['aActions']->value[$_smarty_tpl->tpl_vars['oRole']->value->getId()]&&!$_smarty_tpl->tpl_vars['aUserActions']->value[$_smarty_tpl->tpl_vars['oRole']->value->getId()]){?>
                <?php echo smarty_function_component(array('_default_short'=>'freelancer:market.pay','text'=>$_smarty_tpl->tpl_vars['aActions']->value[$_smarty_tpl->tpl_vars['oRole']->value->getId()]->getTitle(),'sTargetType'=>"action",'iTargetId'=>$_smarty_tpl->tpl_vars['aActions']->value[$_smarty_tpl->tpl_vars['oRole']->value->getId()]->getId(),'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_component(array('_default_short'=>'freelancer:market.pay','text'=>"Купить",'sTargetType'=>"role",'iTargetId'=>$_smarty_tpl->tpl_vars['oRole']->value->getId(),'iCount'=>30,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>

            <?php }?>
        <?php }?>
    <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

    
    <table class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-table">
        <?php  $_smarty_tpl->tpl_vars['oRolePay'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oRolePay']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aRolesPay']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oRolePay']->key => $_smarty_tpl->tpl_vars['oRolePay']->value){
$_smarty_tpl->tpl_vars['oRolePay']->_loop = true;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['oRolePay']->value->getTitle();?>
</td>                
                <td><b><?php echo $_smarty_tpl->tpl_vars['oRolePay']->value->getPrice();?>
</b> <?php echo Config::Get('plugin.freelancer.market.str_currency');?>
/в день</td>
                <td><?php smarty_template_function_getPayBut($_smarty_tpl,array('oRole'=>$_smarty_tpl->tpl_vars['oRolePay']->value));?>
</td>
            </tr>
        <?php } ?>
        <tr>
            <td><b>Все привилегии</b></td>
            <td><b><?php echo $_smarty_tpl->tpl_vars['oRole']->value->getPrice();?>
</b> <?php echo Config::Get('plugin.freelancer.market.str_currency');?>
/в день</td>
            <td><?php smarty_template_function_getPayBut($_smarty_tpl,array('oRole'=>$_smarty_tpl->tpl_vars['oRole']->value,'mods'=>"success large"));?>
</td>
        </tr>
    </table>
       
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>



    <?php echo smarty_function_component(array('_default_short'=>'block','mods'=>"success",'content'=>Smarty::$_smarty_vars['capture']['content'],'classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)),$_smarty_tpl);?>

<?php }} ?>