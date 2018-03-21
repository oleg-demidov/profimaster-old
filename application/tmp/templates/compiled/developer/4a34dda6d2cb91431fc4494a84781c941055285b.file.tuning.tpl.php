<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 19:56:39
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/user/settings/tuning.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15267003825aa92a1752f9b4-87792193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a34dda6d2cb91431fc4494a84781c941055285b' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/user/settings/tuning.tpl',
      1 => 1510819643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15267003825aa92a1752f9b4-87792193',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'aTimezoneList' => 0,
    'timezone' => 0,
    'aLang' => 0,
    'timezoneLang' => 0,
    'timezones' => 0,
    '_aRequest' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa92a1758a778_62869727',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa92a1758a778_62869727')) {function content_5aa92a1758a778_62869727($_smarty_tpl) {?><?php if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
?>


<?php echo smarty_function_hook(array('run'=>'user_settings_tuning_begin'),$_smarty_tpl);?>


<form action="<?php echo smarty_function_router(array('page'=>'settings'),$_smarty_tpl);?>
tuning/" method="POST" enctype="multipart/form-data">
    <?php echo smarty_function_hook(array('run'=>'form_settings_tuning_begin'),$_smarty_tpl);?>


    <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'hidden.security-key'),$_smarty_tpl);?>


    <fieldset>
        <legend><?php echo smarty_function_lang(array('name'=>'user.settings.tuning.email_notices'),$_smarty_tpl);?>
</legend>

        <div class="ls-field-checkbox-group">
            <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.tuning.fields.new_topic'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'settings_notice_new_topic','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettingsNoticeNewTopic()!=0,'noMargin'=>true,'label'=>$_tmp1),$_smarty_tpl);?>


            <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.tuning.fields.new_comment'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'settings_notice_new_comment','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettingsNoticeNewComment()!=0,'noMargin'=>true,'label'=>$_tmp2),$_smarty_tpl);?>


            <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.tuning.fields.new_talk'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'settings_notice_new_talk','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettingsNoticeNewTalk()!=0,'noMargin'=>true,'label'=>$_tmp3),$_smarty_tpl);?>

            <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_email_response','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_email_response')!=0,'noMargin'=>true,'label'=>"При отзыве"),$_smarty_tpl);?>


            <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.tuning.fields.reply_comment'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'settings_notice_reply_comment','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettingsNoticeReplyComment()!=0,'noMargin'=>true,'label'=>$_tmp4),$_smarty_tpl);?>


            <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.tuning.fields.new_friend'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'settings_notice_new_friend','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettingsNoticeNewFriend()!=0,'noMargin'=>true,'label'=>$_tmp5),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->getStrRole()=="master"){?>
                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_email_order','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_email_order')!=0,'noMargin'=>true,'label'=>"При  новом личном заказе"),$_smarty_tpl);?>

                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_email_orders','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_email_orders')!=0,'noMargin'=>true,'label'=>"При  новых заказах Вашей специальности"),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_email_bid','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_email_bid')!=0,'noMargin'=>true,'label'=>"При новом отклике на заказ"),$_smarty_tpl);?>

                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_email_order_start','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_email_order_start')!=0,'noMargin'=>true,'label'=>"При старте заказа"),$_smarty_tpl);?>

            <?php }?>
        </div>
    </fieldset>
        
    
    
        
    <fieldset id="settings_tuning">
        <legend>Уведомления на панели</legend>

        <div class="ls-field-checkbox-group">
            <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'panel_notify_talk','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_panel_talk')!=0,'noMargin'=>true,'label'=>"При новом сообщении"),$_smarty_tpl);?>

            <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_panel_response','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_panel_response')!=0,'noMargin'=>true,'label'=>"При отзыве"),$_smarty_tpl);?>


            <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->getStrRole()=="master"){?>
                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_panel_order','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_panel_order')!=0,'noMargin'=>true,'label'=>"При  новом личном заказе"),$_smarty_tpl);?>

                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_panel_orders','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_panel_orders')!=0,'noMargin'=>true,'label'=>"При  новых заказах Вашей специальности"),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_panel_order_start','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_panel_order_start')!=0,'noMargin'=>true,'label'=>"При старте заказа"),$_smarty_tpl);?>

                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_panel_bid','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_panel_bid')!=0,'noMargin'=>true,'label'=>"При новом отклике на заказ"),$_smarty_tpl);?>

            <?php }?>
        </div>
    </fieldset>

    <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->isNotifySms()){?>
    <fieldset>
        <legend>Уведомления на смс</legend>

        <div class="ls-field-checkbox-group">
            <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'sms_notify_talk','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_sms_talk')!=0,'noMargin'=>true,'label'=>"При новом сообщении"),$_smarty_tpl);?>

                     
            <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_sms_response','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_sms_response')!=0,'noMargin'=>true,'label'=>"При отзыве"),$_smarty_tpl);?>


            <?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value->getStrRole()=="master"){?>
                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_sms_order','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_sms_order')!=0,'noMargin'=>true,'label'=>"При  новом личном заказе"),$_smarty_tpl);?>

                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_sms_orders','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_sms_orders')!=0,'noMargin'=>true,'label'=>"При  новых заказах Вашей специальности"),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_sms_bid','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_sms_bid')!=0,'noMargin'=>true,'label'=>"При новом отклике на заказ"),$_smarty_tpl);?>

                <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'checkbox','name'=>'notify_sms_order_start','checked'=>$_smarty_tpl->tpl_vars['oUserCurrent']->value->getSettings('notify_sms_order_start')!=0,'noMargin'=>true,'label'=>"При старте заказа"),$_smarty_tpl);?>

            <?php }?>
            
        </div>
    </fieldset>
    <?php }else{ ?>
        <?php echo smarty_function_component(array('_default_short'=>'freelancer:market','text'=>"Включить SMS уведомления",'sTargetType'=>"role",'iTargetId'=>((string)$_smarty_tpl->tpl_vars['oUserCurrent']->value->getStrRole())."_notify_sms"),$_smarty_tpl);?>

        <div style="margin: 20px;"></div>
    <?php }?>
    
    <fieldset>
        <legend><?php echo smarty_function_lang(array('name'=>'user.settings.tuning.general'),$_smarty_tpl);?>
</legend>

        <?php  $_smarty_tpl->tpl_vars['timezone'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['timezone']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aTimezoneList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['timezone']->key => $_smarty_tpl->tpl_vars['timezone']->value){
$_smarty_tpl->tpl_vars['timezone']->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars['timezoneLang'] = new Smarty_variable($_smarty_tpl->tpl_vars['aLang']->value['date']['timezones'][$_smarty_tpl->tpl_vars['timezone']->value], null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['timezoneLang']->value){?>
                <?php $_smarty_tpl->createLocalArrayVariable('timezones', null, 0);
$_smarty_tpl->tpl_vars['timezones']->value[] = array('value'=>$_smarty_tpl->tpl_vars['timezone']->value,'text'=>$_smarty_tpl->tpl_vars['timezoneLang']->value);?>
            <?php }?>
        <?php } ?>

        <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.tuning.fields.timezone.label'),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'select','name'=>'settings_general_timezone','label'=>$_tmp6,'items'=>$_smarty_tpl->tpl_vars['timezones']->value,'selectedValue'=>$_smarty_tpl->tpl_vars['_aRequest']->value['settings_general_timezone']),$_smarty_tpl);?>

    </fieldset>

    
    <?php echo smarty_function_hook(array('run'=>'user_settings_tuning_end'),$_smarty_tpl);?>


    <?php echo smarty_function_component(array('_default_short'=>'button','text'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['save'],'mods'=>'primary'),$_smarty_tpl);?>

</form>

<?php echo smarty_function_hook(array('run'=>'settings_tuning_end'),$_smarty_tpl);?>
<?php }} ?>