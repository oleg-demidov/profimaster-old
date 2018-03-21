<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 10:35:35
         compiled from "/var/www/profimaster/application/frontend/components/user/settings/invite.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12739121305aa8a69755e844-62530028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb8c6f00713fbfbbbf390baea02809f514adc6fa' => 
    array (
      0 => '/var/www/profimaster/application/frontend/components/user/settings/invite.tpl',
      1 => 1493631808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12739121305aa8a69755e844-62530028',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'iCountInviteAvailable' => 0,
    'sReferralLink' => 0,
    'iCountInviteUsed' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa8a6975731c4_62621803',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa8a6975731c4_62621803')) {function content_5aa8a6975731c4_62621803($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>

<div class="note ls-mb-20">
    <?php echo smarty_function_lang(array('name'=>'user.settings.invites.note'),$_smarty_tpl);?>

</div>


<?php echo smarty_function_hook(array('run'=>'user_settings_invite_begin'),$_smarty_tpl);?>


<p>
    <?php if (Config::Get('general.reg.invite')){?>
        <?php echo smarty_function_lang(array('name'=>'user.settings.invites.available'),$_smarty_tpl);?>
:
        <strong>
            <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->isAdministrator()){?>
                <?php echo smarty_function_lang(array('name'=>'user.settings.invites.many'),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo $_smarty_tpl->tpl_vars['iCountInviteAvailable']->value;?>

            <?php }?>
        </strong>
    <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['sReferralLink']->value){?>
            <?php echo smarty_function_lang(array('name'=>'user.settings.invites.referral_link'),$_smarty_tpl);?>
:<br/>
            <strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sReferralLink']->value, ENT_QUOTES, 'UTF-8', true);?>
</strong>
        <?php }?>

    <?php }?>
    <br />

    <?php echo smarty_function_lang(array('name'=>'user.settings.invites.used'),$_smarty_tpl);?>
: <strong><?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.invites.used_empty'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['iCountInviteUsed']->value ? $_smarty_tpl->tpl_vars['iCountInviteUsed']->value : $_tmp1;?>
</strong>
</p>

<form action="" method="POST" enctype="multipart/form-data">
    <?php echo smarty_function_hook(array('run'=>'form_settings_invite_begin'),$_smarty_tpl);?>


    
    <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.invites.fields.email.note'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.invites.fields.email.label'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'invite_mail','placeholder'=>'e-mail','note'=>$_tmp2,'label'=>$_tmp3),$_smarty_tpl);?>


    <?php echo smarty_function_hook(array('run'=>'form_settings_invite_end'),$_smarty_tpl);?>


    
    <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'hidden.security-key'),$_smarty_tpl);?>


    
    <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.invites.fields.submit.text'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'button','mods'=>'primary','text'=>$_tmp4),$_smarty_tpl);?>

</form>


<?php echo smarty_function_hook(array('run'=>'user_settings_invite_end'),$_smarty_tpl);?>
<?php }} ?>