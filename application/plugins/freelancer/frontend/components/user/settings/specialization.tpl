{**
 * Настройка уведомлений
 *}

{* @hook Начало формы с настройками уведомлений *}


<form action="{router page='settings'}specialization/" method="POST" enctype="multipart/form-data">
    {hook run='user_settings_specialization_begin'}
    
    {insert name="block" block="specialization" params=[
        'plugin' => 'freelancer', 
        'target' => $oUserCurrent, 
        'entity' => 'ModuleUser_EntityUser' ]}
        
    
    {hook run='user_settings_specialization_end' oUser=$oUserCurrent}
    
    {if !$oUserCurrent->isRoleMasterNeogrSpecialization()}
        {component 'freelancer:market' text="Добавить специализации" sTargetType="role" iTargetId="master_neogr_specialization"}
    {/if}
    {component 'button' text=$aLang.common.save mods='primary'}
</form>
