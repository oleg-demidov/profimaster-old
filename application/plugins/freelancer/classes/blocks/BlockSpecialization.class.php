<?php

class PluginFreelancer_BlockSpecialization extends Block
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
                $aSpecializations = [];
                if($specPost = getRequest('specialization')){
                    $aSpecializations = array_keys($this->Category_GetCategoryItemsByFilter(['id in' => $specPost, '#index-from-primary']));
                }elseif(!sizeof($_REQUEST)){                    
                    $aSpecializationsBeh = $oBehavior->getCategories();
                    if(is_array($aSpecializationsBeh)){
                        foreach($aSpecializationsBeh as $oBeh){
                            $aSpecializations[] = $oBeh->getId();
                        }
                    }
                }
                $this->Viewer_Assign('specializationSelected', $aSpecializations, true);
                /**
                 * Загружаем параметры
                 */
                $aParams = $oBehavior->getParams();
                $this->Viewer_Assign('params', $aParams, true);
                /**
                 * Загружаем список доступных категорий
                 */
                /*$this->Viewer_Assign('categories',
                    $this->Category_GetCategoriesTreeByTargetType($oBehavior->getCategoryTargetType()), true);*/
                $oCategoryType = $this->Category_GetTypeByTargetType($oBehavior->getCategoryTargetType());
                
                $sEntityName = strtolower( Engine::GetEntityName($oTarget) );
                $sTableTarget = MapperORM::GetTableName(Engine::GetEntity('Category_Target'));
                
                $aFilter = [
                    'type_id' => $oCategoryType->getId(),
                    '#join' => [
                        "LEFT JOIN $sTableTarget as ct ON ct.category_id = t.id AND ct.object_type = ?" => 
                        [$sEntityName]
                    ],
                    '#select' => "t.*, count(ct.id) as count_target",
                    '#group' => 'id'
                 ];
                $this->Viewer_Assign('specializations',$this->Category_LoadTreeOfCategory($aFilter), true);
                break;
            }
        }
        if(!$sComponent = $this->GetParam('component')){
            $sComponent = 'specialization-tabs';
        }
        $this->SetTemplate('component@freelancer:'.$sComponent);
    }
}