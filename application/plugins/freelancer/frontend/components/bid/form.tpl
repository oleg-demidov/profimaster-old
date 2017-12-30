{$component = 'fl-bid-form'}

{component_define_params params=[ 'oOrder','editorSet', 'mods', 'classes', 'attributes','oBid' ]}

{* Форма *}
<form method           = "post"
      class            = "js-add-bid-form {$component} {cmods name=$component mods=$mods} {$classes}"
      enctype          = "multipart/form-data"
      data-id={if $oBid}{$oBid->getId()}{else}0{/if}
      {cattr list=$attributes}>
    {block 'bid-form'}
        {* @hook Начало формы комментирования *}
        {hook run='bid_form_begin' params=$params}

        {block 'bid-form-fields'}
            {* Скрытые поля *}
            {*component 'field' template='hidden' name='reply' value='0' inputClasses='js-bid-form-id'*}
            {if $oOrder}
                {component 'field' template='hidden' name='order_id' value=$oOrder->getId()}
            {/if}
            {if $oBid}
                {component 'field' template='hidden' name='bid_id' value=$oBid->getId()}
            {/if}

            {if $oBid}{$sText  = $oBid->getText()}{/if}
            {* Текст комментария *}
            {component 'editor'
                set             = $editorSet|default:'light'
                name            = 'bid_text'
                inputClasses    = 'js-bid-form-text'
                help            = false
                mediaTargetType = 'bid'
                value=$sText}
            {if $oBid}{$iPrice  = $oBid->getPrice()}{/if}
            {component 'field' template='text' name='price' label="Предложить свою цену" note='Договорная цена: оставить пустым' value=$iPrice}<br>
        {/block}

        {* @hook Хук расположенный после полей формы и перед кнопками управления формой *}
        {hook run='bid_form_fields_after' params=$params}

        {**
         * Кнопки
         *}
        {if !$oBid}
            {* Кнопка добавления *}
            {component 'button' name='submit_bid' text=$aLang.common.add mods='primary' classes='js-bid-form-submit'}
        {else}
            {* Кнопки редактирования *}
            {component 'button' name='submit_bid' text=$aLang.common.save mods='primary' classes='js-bid-form-update-submit'}
            {*component 'button' name='submit_comment' type='button' text=$aLang.common.cancel classes='js-comment-form-update-cancel ls-fl-r'*}
        {/if}
        {* Кнопка превью текста *}
        {*component 'button' text=$aLang.common.preview_text type='button' classes='js-bid-form-preview'*}

        {* @hook Конец формы комментирования *}
        {hook run='bid_form_end' params=$params}
    {/block}
</form>
    
