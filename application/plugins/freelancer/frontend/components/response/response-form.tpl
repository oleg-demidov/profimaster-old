{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-response-form'}
{component_define_params params=[ 'oResponse', 'mods','back' ]}
{component 'freelancer:user.middle' oUser=$oMaster}
<form method="POST" class="{$component}">

{$aItems = [["text"=>"Не выбрано", 'value'=>0]]}
{if {$aOrders|@sizeof}}
    {foreach $aOrders as $oOrder}
        {$aItems[] = [
            'text' => $oOrder->getTitle(),
            'value'=> $oOrder->getId()
         ]}
    {/foreach}
    {if $oOrder}
        {$selectedValue= $oOrder->getId()}
    {/if}
    {component 'field.select' name="order_id" items=$aItems selectedValue=$selectedValue label="Выбрать заказ"}
    
{/if}

{component 'freelancer:response.stars' 
    count=5 
    selected={$oResponse->getRaiting()}}
    
{component 'editor'
    label="Текст отзыва"
    set             = $editorSet|default:'light'
    name            = 'text'
    inputClasses    = 'js-response-form-text'
    help            = false
    value={($oResponse)?$oResponse->getText():''}}
    
{component 'freelancer:media.form' oTarget=$oResponse}   

{component 'button' text="Сохранить отзыв" mods="primary"}

</form>
{component 'freelancer:media' oUser=$oUserCurrent}