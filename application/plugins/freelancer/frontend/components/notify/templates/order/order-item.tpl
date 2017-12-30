{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'freelancer-order-email'}
{component_define_params params=[ 'oOrder' ]}


<table style="width: 100%; margin-top: 30px;">
    <tr>
        <td colspan="2" style="padding: 2px 10px;"><h3 style="margin:0;"><a style="color: #337784;" class="{$component}-title" href="{$oOrder->_getUrlView()}">{$oOrder->getTitle()}</a></h3></td>
    </tr>
    <tr>
        {$aSpecializations = $oOrder->category->getCategories()}
        <td style="padding: 2px 10px;">{(sizeof($aSpecializations))?$aSpecializations[0]->getDescription():""}</td>
        <td style="padding: 2px 10px;text-align: right;">{($oOrder->getBudjet())?$oOrder->getBudjet():'Договорная'}</td>
    </tr>
    <tr>
        <td colspan="2"  style="padding: 2px 10px;font-size: 13px;">{$oOrder->getCropText()}</td>
    </tr>
    
</table>

