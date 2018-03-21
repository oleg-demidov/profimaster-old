<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 19:34:05
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/skin/default/components/auth/registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19335684675aa924cd28f772-22859501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6351468e209b3d5171f596e5e543a91438913a30' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/skin/default/components/auth/registration.tpl',
      1 => 1501238150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19335684675aa924cd28f772-22859501',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sRole' => 0,
    'sName' => 0,
    'sEmailOrNumber' => 0,
    'sPass' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa924cd2a8c67_11089463',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa924cd2a8c67_11089463')) {function content_5aa924cd2a8c67_11089463($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
?><form method="POST" class="js-freelancer-form-validate">
    <div class="center_form">
    <?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['sRole']->value=='master'){?><?php echo "primary";?><?php }?><?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>"fauth/register/master"),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['sRole']->value=='employer'){?><?php echo "primary";?><?php }?><?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>"fauth/register/employer"),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','template'=>'group','label'=>"Выберете вашу роль",'buttons'=>array(array('text'=>'Мастер','mods'=>"large ".$_tmp1,'url'=>$_tmp2),array('text'=>'Заказщик','mods'=>"large ".$_tmp3,'url'=>$_tmp4))),$_smarty_tpl);?>

    </div>
    <div class="choose_form">
        <div class="fields_register">
            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sName']->value;?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_router(array('page'=>'auth'),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.text','label'=>"Имя",'value'=>$_tmp5,'name'=>"login",'rules'=>array('required'=>true,'minlength'=>'3','remote'=>$_tmp6."ajax-validate-login")),$_smarty_tpl);?>

            
            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sEmailOrNumber']->value;?>
<?php $_tmp7=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.text','label'=>"Email или Номер",'value'=>$_tmp7,'name'=>"email_or_number",'rules'=>array('required'=>true,'trigger'=>'input')),$_smarty_tpl);?>

            
            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sPass']->value;?>
<?php $_tmp8=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.text','label'=>"Пароль",'type'=>"password",'value'=>$_tmp8,'name'=>"password",'rules'=>array('required'=>true,'minlength'=>'5','trigger'=>'input'),'inputClasses'=>'js-input-password-reg'),$_smarty_tpl);?>

            
            <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'captcha','captchaType'=>Config::Get('sys.captcha.type'),'captchaName'=>'user_signup','name'=>'captcha','label'=>$_smarty_tpl->tpl_vars['aLang']->value['auth']['labels']['captcha']),$_smarty_tpl);?>

        </div>
        <div class="social_register">
            <div>
             <?php echo smarty_function_hook(array('run'=>'freelancer_form_registration_begin'),$_smarty_tpl);?>

             </div>
        </div>
    </div>
    
    <?php echo smarty_function_component(array('_default_short'=>'button','text'=>"Зарегистрироваться",'mods'=>"large primary"),$_smarty_tpl);?>

</form><?php }} ?>