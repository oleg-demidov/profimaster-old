
{$component = 'fl-register-master'}
{component_define_params params=[ 'oUser']}

<form method="POST">
{hook run="freelancer_search_form" assign='contentReturn' }
{$contentReturn}

{component 'editor'
    label ="Описание ваших услуг"
    rows = 5
    type = "visual"
    set             = $editorSet|default:'light'
    name            = 'about'
    inputClasses    = 'js-about-text'
    help            = true
    value=$sText}
                
{*component 'field.textarea' label="Описание услуг" name="about" note="Опишите подробнее ваши услуги" rows="10"*}
{component 'button' type='submit' text="Далее" mods="primary large"}
</form>