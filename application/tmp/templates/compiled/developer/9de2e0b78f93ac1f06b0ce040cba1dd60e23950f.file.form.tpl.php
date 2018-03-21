<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:56:25
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/register/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2083128675ab104f9d6c0c6-34449123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9de2e0b78f93ac1f06b0ce040cba1dd60e23950f' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/register/form.tpl',
      1 => 1521544982,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2083128675ab104f9d6c0c6-34449123',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'component' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab104f9d827e4_95522281',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab104f9d827e4_95522281')) {function content_5ab104f9d827e4_95522281($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-register-master-form', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser')),$_smarty_tpl);?>




<form method="POST" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
">
    <?php echo smarty_function_hook(array('run'=>'registration_begin'),$_smarty_tpl);?>


    <?php echo smarty_function_component(array('_default_short'=>'field.text','name'=>"name",'label'=>"Ваше имя (ФИО)",'rules'=>array('required'=>true,'minlength'=>'3')),$_smarty_tpl);?>

    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'auth'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.text','name'=>"login",'label'=>"Логин",'rules'=>array('required'=>true,'minlength'=>'3','remote'=>$_tmp1."ajax-validate-login")),$_smarty_tpl);?>

    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'freelancer'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.text','name'=>"email_or_number",'label'=>"Email или Номер телефона",'rules'=>array('required'=>true,'minlength'=>'3','remote'=>$_tmp2."ajax-validate-email-or-number")),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'field.text','type'=>"password",'name'=>"pass",'classes'=>"pass_field",'rules'=>array('required'=>true,'minlength'=>'5'),'label'=>"Придумайте пароль"),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'field.captcha-recaptcha','classes'=>"fl-reg-recaptcha"),$_smarty_tpl);?>

    <?php ob_start();?><?php echo smarty_function_router(array('page'=>'info/oferta'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.checkbox','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-polz",'rules'=>array('required'=>true),'label'=>" Принять <a class='js-polz-modal-toggle' data-lsmodaltoggle-modal = 'polz-modal' href='".$_tmp3."'>пользовательское соглашение</a>",'name'=>"offer"),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'modal','title'=>'Пользовательское соглашение','content'=>'Lorem ipsum...','id'=>'polz-modal','classes'=>'js-polz-modal'),$_smarty_tpl);?>

    <?php echo smarty_function_component(array('_default_short'=>'button','type'=>'submit','text'=>"Продолжить",'mods'=>"primary large"),$_smarty_tpl);?>

</form><?php }} ?>