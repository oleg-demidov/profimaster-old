{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'freelancer-resp-email'}
{component_define_params params=[ 'oResponse' ]}


<table style="width: 100%;">
    <tr>
        <td  style="padding: 2px 10px;font-size: 14px;">{$oResponse->getCropText()}</td>
        
    </tr>
    <tr>
        <td style="padding: 2px 10px;">
            {component 'freelancer:email.button' text="Подробнее" url={router page ="user/{$oResponse->getTargetId()}/responses"}}
        </td>
    </tr>
    
</table>

