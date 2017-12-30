{**
 * Добавление о себе
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    {$sFields}
    <h1>Описание о себе</h1>
    <form action="" method="post">
        {* Местоположение *}
        {component 'field' template='geo'
            classes   = 'js-field-geo-default'
            name      = 'geo'
            label     = {lang name='user.settings.profile.fields.place.label'}
            countries = $aGeoCountries
            regions   = $aGeoRegions
            cities    = $aGeoCities
            place     = $oGeoTarget} 
        
        {* Контакты *}
        
        {* Шаблон пользовательского поля (userfield) *}
        {function name=userfield}
            <div class="ls-mb-15 js-user-field-item" {if ! $field}id="user-field-template" style="display:none;"{/if}>
                <select name="profile_user_field_type[]">
                    {foreach $aUserFieldsContact as $fieldAll}
                        <option value="{$fieldAll->getId()}" {if $field && $fieldAll->getId() == $field->getId()}selected{/if}>
                            {$fieldAll->getTitle()|escape}
                        </option>
                    {/foreach}
                </select>

                <input type="text" name="profile_user_field_value[]" value="{if $field}{$field->getValue()|escape}{/if}" class="ls-width-200">
                {component 'icon' icon='remove' classes='js-user-field-item-remove' attributes=[ title => {lang name='common.remove'} ]}
            </div>
        {/function}

        

        <fieldset class="js-user-fields">
            <legend>{lang name='user.settings.profile.contact'}</legend>

            {* Список пользовательских полей, шаблон определен в начале файла *}
            <div class="js-user-field-list ls-mb-15">
                {foreach $aUserFieldsValues as $contact}
                    {call userfield field=$contact}
                {foreachelse}
                    {component 'blankslate' classes='js-user-fields-empty' text=$aLang.common.empty}
                {/foreach}
            </div>

            {if $aUserFieldsContact}
                {component 'button' type='button' classes='js-user-fields-submit' text=$aLang.common.add}
            {/if}
        </fieldset><br>
        <input type="submit" value="Save">
    </form>
    {* Скрытое пользовательское поле для вставки через js *}
    {* Вынесено за пределы формы, чтобы не передавалось при отправке формы *}
    {call userfield field=false}
{/block}