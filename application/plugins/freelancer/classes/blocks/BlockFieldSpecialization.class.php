<?php

class PluginFreelancer_BlockFieldSpecialization extends Block
{
    /**
     * Запуск обработки
     */
    public function Exec()
    {
        $sEntity = $this->GetParam('entity');
        $oTarget = $this->GetParam('target');
        $sTargetType = $this->GetParam('target_type');

        if (!$oTarget) {
            $oTarget = Engine::GetEntity($sEntity);
        }

        $aBehaviors = $oTarget->GetBehaviors();
        foreach ($aBehaviors as $oBehavior) {
            if ($oBehavior instanceof ModuleCategory_BehaviorEntity) {
                /**
                 * Если в параметрах был тип, то переопределяем значение. Это необходимо для корректной работы, когда тип динамический.
                 */
                if ($sTargetType) {
                    $oBehavior->setParam('target_type', $sTargetType);
                }
                /**
                 * Нужное нам поведение - получаем список текущих категорий
                 */
                $specializationSelected = [];
                foreach($oBehavior->getCategories() as $oCategory){
                    $specializationSelected[] = $oCategory->getId();
                }
                $this->Viewer_Assign('specializationSelected', $specializationSelected, true);
                /**
                 * Загружаем параметры
                 */
                $aParams = $oBehavior->getParams();
                $this->Viewer_Assign('params', $aParams, true);
                /**
                 * Загружаем список доступных категорий
                 */
                $this->Viewer_Assign('aSpecializations',
                    $this->Category_LoadTreeOfCategory(['type_id' => 2]), true);
                
                $this->Viewer_Assign('label','Категория', true);
                break;
            }
        }

        $this->SetTemplate('component@freelancer:specialization.tree');
    }
}