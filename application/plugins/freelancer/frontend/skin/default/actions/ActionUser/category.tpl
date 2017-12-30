{**
 * Добавление категории
 *
 *}

{extends "layouts/layout.base.tpl"}
{block 'layout_content' append}
    <h1>Выбрать категории</h1>
    <form action="" method="post">
    {insert name="block" block="fieldCategory" params=[  'target' => $oAnketa, 'entity' => 'PluginAnketa_ModuleAnketa_EntityAnketa']}
    <input type="submit">
    </form>
{/block}