<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:56:47
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/email/email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2082108765ab1050f820f14-22762491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cef3f22d0df363a6a32460a211c57c0e1e9e4704' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/email/email.tpl',
      1 => 1510110010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2082108765ab1050f820f14-22762491',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LS' => 0,
    'backgroundColor' => 0,
    'headerBackgroundColor' => 0,
    'headerTitleColor' => 0,
    'headerDescriptionColor' => 0,
    'contentBackgroundColor' => 0,
    'contentTextColor' => 0,
    'sTitle' => 0,
    'content' => 0,
    'footerBackgroundColor' => 0,
    'footerTextColor' => 0,
    'footerLinkColor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab1050f848c35_05725742',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab1050f848c35_05725742')) {function content_5ab1050f848c35_05725742($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
?>

<?php $_smarty_tpl->tpl_vars['backgroundColor'] = new Smarty_variable('F4F4F4', null, 0);?>           

<?php $_smarty_tpl->tpl_vars['containerBorderColor'] = new Smarty_variable('D0D6E8', null, 0);?>      

<?php $_smarty_tpl->tpl_vars['headerBackgroundColor'] = new Smarty_variable('3993a3', null, 0);?>     
<?php $_smarty_tpl->tpl_vars['headerTitleColor'] = new Smarty_variable('FFFFFF', null, 0);?>          
<?php $_smarty_tpl->tpl_vars['headerDescriptionColor'] = new Smarty_variable('B8C5E1', null, 0);?>    

<?php $_smarty_tpl->tpl_vars['contentBackgroundColor'] = new Smarty_variable('FFFFFF', null, 0);?>    
<?php $_smarty_tpl->tpl_vars['contentTitleColor'] = new Smarty_variable('000000', null, 0);?>         
<?php $_smarty_tpl->tpl_vars['contentTextColor'] = new Smarty_variable('4f4f4f', null, 0);?>          

<?php $_smarty_tpl->tpl_vars['footerBackgroundColor'] = new Smarty_variable('fafafa', null, 0);?>     
<?php $_smarty_tpl->tpl_vars['footerTextColor'] = new Smarty_variable('949fa3', null, 0);?>           
<?php $_smarty_tpl->tpl_vars['footerLinkColor'] = new Smarty_variable('949fa3', null, 0);?>           


<?php $_smarty_tpl->tpl_vars['imagesDir'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['LS']->value->Component_GetWebPath('email'))."/images", null, 0);?>

<?php echo smarty_function_component_define_params(array('params'=>array('sTitle','content')),$_smarty_tpl);?>



<table width="100%" align="center" bgcolor="#<?php echo $_smarty_tpl->tpl_vars['backgroundColor']->value;?>
" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
    <tr><td>
        <br />
        <br />

        
        <table width="573" align="center" cellpadding="0" cellspacing="0" style=" font: normal 13px/1.4em Verdana, Arial; color: #4f4f4f; border: 1px solid #3993a3;
    border-radius: 5px 5px 0 0;">
            
            <tr>
                <td>
                    <table width="100%" bgcolor="#<?php echo $_smarty_tpl->tpl_vars['headerBackgroundColor']->value;?>
" cellpadding="50" cellspacing="0" style="border-collapse: collapse;">
                        <tr>
                            <td style="    padding: 20px;width: 1px;">
                            <div style="
                                width: 70px;
                                height: 70px;
                                background: #fff;
                                border-radius: 5px;
                                color: #3993a3;
                                font-size: 85px;
                                line-height: 74px;
                                font-family: monospace;
                                text-indent: 8px;
                                position: relative;
                                -webkit-transform: scaleX(-1);
                                -moz-transform: scaleX(-1);
                                -o-transform: scaleX(-1);
                                -ms-transform: scaleX(-1);
                                transform: scaleX(-1);
                            ">P<div style="
                                position: absolute;
                                width: 10px;
                                height: 22px;
                                background: #fecc00;
                                top: 43px;
                                right: 22px;
                                -webkit-transform: skewX(33deg);
                                -moz-transform: skewX(33deg);
                                -o-transform: skewX(33deg);
                                -ms-transform: skewX(33deg);
                                transform: skewX(33deg);
                            "></div></div>
                                                        </td>
                            <td style="    padding: 20px;font-size: 11px; line-height: 1em;">
                                <span style="font: normal 29px Arial, sans-serif; line-height: 1em; color: #<?php echo $_smarty_tpl->tpl_vars['headerTitleColor']->value;?>
"><strong><?php echo Config::Get('view.name');?>
</strong></span>
                                <br>
                                <span style="color: #<?php echo $_smarty_tpl->tpl_vars['headerDescriptionColor']->value;?>
"><?php echo Config::Get('view.description');?>
</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            
            <tr>
                <td>
                    <table width="100%" cellpadding="50" cellspacing="0" bgcolor="#<?php echo $_smarty_tpl->tpl_vars['contentBackgroundColor']->value;?>
" style="border-collapse: collapse;">
                        <tr>
                            <td style="    padding: 15px;" valign="top">
                                <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; font: normal 13px/1.4em Verdana, Arial; color: #<?php echo $_smarty_tpl->tpl_vars['contentTextColor']->value;?>
;">
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['sTitle']->value){?>
                                        <tr>
                                            <td valign="top">
                                                <span style="font: normal 19px Arial; line-height: 1.3em; color: #e0ac38;font-weight: bolder;padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['sTitle']->value;?>
</span>
                                            </td>
                                        </tr>
                                        <tr><td height="10"><div style="line-height: 0;"></div></td></tr>
                                    <?php }?>

                                    
                                    <tr>
                                        <td style="    font-size: 12px;"  valign="top">
                                            
                                            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    
                    <table width="100%" bgcolor="#<?php echo $_smarty_tpl->tpl_vars['footerBackgroundColor']->value;?>
" cellpadding="20" cellspacing="0" style="border-collapse: collapse; font: normal 11px Verdana, Arial; line-height: 1.3em; color: #<?php echo $_smarty_tpl->tpl_vars['footerTextColor']->value;?>
;">
                        <tr>
                            <td style="background: #f1f1f1;" valign="center">
                                <a href="<?php echo Router::GetPath('/');?>
" style="color: #<?php echo $_smarty_tpl->tpl_vars['footerLinkColor']->value;?>
 !important;"><?php echo Config::Get('view.name');?>
</a>
                                &nbsp;&nbsp;
                                <a href="<?php echo Router::GetPath('settings/tuning');?>
" style="color: #<?php echo $_smarty_tpl->tpl_vars['footerLinkColor']->value;?>
 !important;">Настроить оповещения</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br />
        <br />
    </td></tr>
</table><?php }} ?>