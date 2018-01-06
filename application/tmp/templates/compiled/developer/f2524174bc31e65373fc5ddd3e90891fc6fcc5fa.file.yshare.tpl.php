<?php /* Smarty version Smarty-3.1.13, created on 2018-01-03 17:20:22
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/yshare/yshare.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3235284445a4cbc769ee9d9-31203355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2524174bc31e65373fc5ddd3e90891fc6fcc5fa' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/yshare/yshare.tpl',
      1 => 1513156438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3235284445a4cbc769ee9d9-31203355',
  'function' => 
  array (
    'get_params_share' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'params' => 0,
    'pkey' => 0,
    'value' => 0,
    'label' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4cbc769f5556_03028626',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4cbc769f5556_03028626')) {function content_5a4cbc769f5556_03028626($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
?><?php echo smarty_function_component_define_params(array('params'=>array()),$_smarty_tpl);?>


<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js" async="async"></script>

<?php if (!function_exists('smarty_template_function_get_params_share')) {
    function smarty_template_function_get_params_share($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['get_params_share']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['pkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['params']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['pkey']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
        data-<?php echo $_smarty_tpl->tpl_vars['pkey']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"
    <?php } ?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<div><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</div>
<div class="ya-share2" 
    <?php smarty_template_function_get_params_share($_smarty_tpl,array());?>
></div><?php }} ?>