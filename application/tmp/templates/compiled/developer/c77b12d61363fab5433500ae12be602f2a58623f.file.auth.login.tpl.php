<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:44:48
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/auth/auth.login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19073468335a4e3de00b0e19-67806990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c77b12d61363fab5433500ae12be602f2a58623f' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/auth/auth.login.tpl',
      1 => 1506506589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19073468335a4e3de00b0e19-67806990',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'redirectUrl' => 0,
    'PATH_WEB_CURRENT' => 0,
    'sEmailOrNumber' => 0,
    'aLang' => 0,
    'showExtra' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3de00ce347_40432107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3de00ce347_40432107')) {function content_5a4e3de00ce347_40432107($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('redirectUrl','showExtra')),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['redirectUrl'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['redirectUrl']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['PATH_WEB_CURRENT']->value : $tmp), null, 0);?>

<?php echo smarty_function_hook(array('run'=>'login_begin'),$_smarty_tpl);?>


<form action="<?php echo smarty_function_router(array('page'=>'auth/login'),$_smarty_tpl);?>
" method="post" class="js-form-validate js-freelancer-auth-login-form">
    <?php echo smarty_function_hook(array('run'=>'form_login_begin'),$_smarty_tpl);?>


    
    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sEmailOrNumber']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.text','label'=>"Логин, Email или Номер",'value'=>$_tmp1,'name'=>"email_or_number",'rules'=>array('required'=>true,'trigger'=>'input')),$_smarty_tpl);?>


    
    <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'password','type'=>'password','rules'=>array('required'=>true,'minlength'=>'2'),'label'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['labels']['password']),$_smarty_tpl);?>


    
    <?php if (Config::Get('general.login.captcha')){?>
        <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'captcha','captchaType'=>Config::Get('sys.captcha.type'),'captchaName'=>'user_auth','name'=>'captcha','label'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['labels']['captcha']),$_smarty_tpl);?>

    <?php }?>

    
    <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'remember','label'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['login']['form']['fields']['remember']['label'],'checked'=>true),$_smarty_tpl);?>


    <?php echo smarty_function_hook(array('run'=>'form_login_end'),$_smarty_tpl);?>


    <?php if ($_smarty_tpl->tpl_vars['redirectUrl']->value){?>
        <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'hidden','name'=>'return-path','value'=>$_smarty_tpl->tpl_vars['redirectUrl']->value),$_smarty_tpl);?>

    <?php }?>

    <?php echo smarty_function_component(array('_default_short'=>'button','name'=>'submit_login','mods'=>'primary','text'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['login']['form']['fields']['submit']['text']),$_smarty_tpl);?>

</form>

<?php if ($_smarty_tpl->tpl_vars['showExtra']->value){?>
    <div class="ls-pt-20">
        <a href="<?php echo smarty_function_router(array('page'=>'auth/register'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['auth']['registration']['title'];?>
</a><br />
        <a href="<?php echo smarty_function_router(array('page'=>'auth/password-reset'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['auth']['reset']['title'];?>
</a>
    </div>
<?php }?>

<?php echo smarty_function_hook(array('run'=>'login_end'),$_smarty_tpl);?>
<?php }} ?>