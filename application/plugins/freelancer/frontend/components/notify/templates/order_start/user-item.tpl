{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'freelancer-user-email'}
{component_define_params params=[ 'oUser' ]}


<table style="width: 100%; margin-top: 30px;">
    <tr>
        <td colspan="2" style="padding: 2px 10px;"><h3 style="margin:0;"><a style="color: #337784;" class="{$component}-title" href="{$oUser->getUserWebPath()}">{$oUser->getProfileName()}</a></h3></td>
    </tr>
    
</table>

