{**
 * Базовый шаблона e-mail'а
 *}

{$backgroundColor = 'F4F4F4'}           {* Цвет фона *}

{$containerBorderColor = 'D0D6E8'}      {* Цвет границ основного контейнера *}

{$headerBackgroundColor = '3993a3'}     {* Цвет фона шапки *}
{$headerTitleColor = 'FFFFFF'}          {* Цвет заголовка в шапке *}
{$headerDescriptionColor = 'B8C5E1'}    {* Цвет описания в шапке *}

{$contentBackgroundColor = 'FFFFFF'}    {* Цвет фона содержимого письма *}
{$contentTitleColor = '000000'}         {* Цвет заголовка *}
{$contentTextColor = '4f4f4f'}          {* Цвет текста *}

{$footerBackgroundColor = 'fafafa'}     {* Цвет фона футера *}
{$footerTextColor = '949fa3'}           {* Цвет текста в футере *}
{$footerLinkColor = '949fa3'}           {* Цвет ссылки в футере *}

{* Путь до папки с изображенями *}
{$imagesDir = "{$LS->Component_GetWebPath('email')}/images"}

{component_define_params params=[ 'sTitle', 'content' ]}

{* Фон *}
<table width="100%" align="center" bgcolor="#{$backgroundColor}" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
    <tr><td>
        <br />
        <br />

        {* Основной контейнер *}
        <table width="573" align="center" cellpadding="0" cellspacing="0" style=" font: normal 13px/1.4em Verdana, Arial; color: #4f4f4f; border: 1px solid #3993a3;
    border-radius: 5px 5px 0 0;">
            {* Шапка *}
            <tr>
                <td>
                    <table width="100%" bgcolor="#{$headerBackgroundColor}" cellpadding="50" cellspacing="0" style="border-collapse: collapse;">
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
                                <span style="font: normal 29px Arial, sans-serif; line-height: 1em; color: #{$headerTitleColor}"><strong>{Config::Get('view.name')}</strong></span>
                                <br>
                                <span style="color: #{$headerDescriptionColor}">{Config::Get('view.description')}</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            {* Контент *}
            <tr>
                <td>
                    <table width="100%" cellpadding="50" cellspacing="0" bgcolor="#{$contentBackgroundColor}" style="border-collapse: collapse;">
                        <tr>
                            <td style="    padding: 15px;" valign="top">
                                <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; font: normal 13px/1.4em Verdana, Arial; color: #{$contentTextColor};">
                                    {* Заголовок *}
                                    {if $sTitle}
                                        <tr>
                                            <td valign="top">
                                                <span style="font: normal 19px Arial; line-height: 1.3em; color: #e0ac38;font-weight: bolder;padding: 10px;">{$sTitle}</span>
                                            </td>
                                        </tr>
                                        <tr><td height="10"><div style="line-height: 0;"></div></td></tr>
                                    {/if}

                                    {* Текст *}
                                    <tr>
                                        <td style="    font-size: 12px;"  valign="top">
                                            {block 'content'}{/block}
                                            {$content}
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    {* Подвал *}
                    <table width="100%" bgcolor="#{$footerBackgroundColor}" cellpadding="20" cellspacing="0" style="border-collapse: collapse; font: normal 11px Verdana, Arial; line-height: 1.3em; color: #{$footerTextColor};">
                        <tr>
                            <td style="background: #f1f1f1;" valign="center">
                                <a href="{Router::GetPath('/')}" style="color: #{$footerLinkColor} !important;">{Config::Get('view.name')}</a>
                                &nbsp;&nbsp;
                                <a href="{Router::GetPath('settings/tuning')}" style="color: #{$footerLinkColor} !important;">Настроить оповещения</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br />
        <br />
    </td></tr>
</table>