<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:16:26
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/market/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3609407155a46321ad09865-17325397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6dbc1412627c661790e2a9d4691940caa89cd2fd' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/market/form.tpl',
      1 => 1510824957,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3609407155a46321ad09865-17325397',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
    'oRole' => 0,
    'iCount' => 0,
    'iPrice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a46321ad224e2_64524300',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a46321ad224e2_64524300')) {function content_5a46321ad224e2_64524300($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-market-form', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oRole','iCount','iPrice')),$_smarty_tpl);?>


<form class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
" >
    <?php echo smarty_function_component(array('_default_short'=>'freelancer:market.pay','text'=>"Показать все привилегии",'sTargetType'=>"market",'icon'=>"chevron-left"),$_smarty_tpl);?>

    <table>
        <tr>
            <td>Название привилегии:</td>
            <td><b><?php echo $_smarty_tpl->tpl_vars['oRole']->value->getTitle();?>
</b></td>            
        </tr>
        <tr>
            <td>Колличество дней:</td>
            <td><?php echo smarty_function_component(array('_default_short'=>'freelancer:field.count','value'=>$_smarty_tpl->tpl_vars['iCount']->value,'name'=>"count-days"),$_smarty_tpl);?>
</td>            
        </tr>
        <tr>
            <td>Цена:</td>
            <td><b class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-price"><?php echo $_smarty_tpl->tpl_vars['iPrice']->value;?>
</b> <?php echo Config::Get('plugin.freelancer.market.str_currency');?>
</td>            
        </tr>
        <tr>
            <td colspan='2'><center><em>Чем больше дней, тем больше скидка</em></center></td>            
        </tr>
        <tr>
            <td></td>
            <td><?php echo smarty_function_component(array('_default_short'=>'button','text'=>"Продолжить",'mods'=>"success"),$_smarty_tpl);?>
</td>            
        </tr>
    </table>
    <?php echo smarty_function_component(array('_default_short'=>'field.hidden','name'=>"price",'value'=>$_smarty_tpl->tpl_vars['iPrice']->value),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'field.hidden','name'=>"role-price",'value'=>$_smarty_tpl->tpl_vars['oRole']->value->getPrice()),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'field.hidden','name'=>"role-id",'value'=>$_smarty_tpl->tpl_vars['oRole']->value->getId()),$_smarty_tpl);?>

</form>
    <?php }} ?>