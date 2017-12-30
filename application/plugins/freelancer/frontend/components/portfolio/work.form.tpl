{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}
 {$component = 'fl-portfolio-work-form'}
{component_define_params params=[ 'oWork','aOrders', 'mods','back' ]}

<form method="POST" class="{$component}">
    
{$aItems = [['text' => 'Нет', 'value' => '']]}
{foreach $aOrders as $oOrder}
    {$aItems[] = ['text' => $oOrder->getTitle(), 'value' => $oOrder->getId()]}
{/foreach}
{component 'field.select' items=$aItems label="Заказ" name="order_id" selectedValue=$oWork->getOrerId()}

{component 'field.text' name="title" label="Заголовок" value={($oWork)?$oWork->getTitle():''}}    

{component 'editor'
    label="Описание"
    set             = $editorSet|default:'light'
    name            = 'text'
    inputClasses    = 'js-portfolio-work-form-text'
    help            = false
    value={($oWork)?$oWork->getText():''}}
    
{component 'freelancer:media.form' oTarget=$oWork}   

{component 'button' text="Сохранить" mods="primary"}

</form>
{component 'freelancer:media' oUser=$oUserCurrent}