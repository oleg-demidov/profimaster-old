<?php

class PluginFreelancer_ModuleFavourites_BehaviorEntity extends Behavior
{
    protected $oUserCurrent;

    /**
     * Дефолтные параметры
     *
     * @var array
     */
    protected $aParams = array(
        'target_type'                    => '',
    );
    /**
     * Список хуков
     *
     * @var array
     */
    protected $aHooks = array(
        'after_save'     => 'CallbackAfterSave',
        'before_delete'   => 'CallbackBeforeDelete',
    );

    /**
     * Инициализация
     */
    protected function Init()
    {
        //parent::Init();
        $this->oUserCurrent = $this->User_GetUserCurrent();
    }

    
    /**
     * Коллбэк
     * Выполняется после сохранения сущности
     */
    public function CallbackAfterSave()
    {
        $oFavoriteTarget = $this->getFavourite();
        //$this->Logger_Notice(serialize($this->oObject->_getDataOne('is_favourite' )));
        if($this->oObject->_getDataOne('is_favourite' ) and !$oFavoriteTarget){
            $oFavoriteTarget = Engine::GetEntity('Favourite',
                array(
                    'target_id'      => $this->oObject->_getPrimaryKeyValue(),
                    'user_id'        => $this->oUserCurrent->getId(),
                    'target_type'    => $this->getTargetType(),
                    'target_publish' => $this->oObject->getPublish()
                )
            );
            if($this->Favourite_AddFavourite($oFavoriteTarget)){
                $this->Message_AddNoticeSingle($this->Lang_Get('favourite.notices.add_success'),
                    $this->Lang_Get('common.attention'));
            }else{
                $this->Message_AddErrorSingle("Не могу добавить в избранное",
                    $this->Lang_Get('common.error.error'));
            }
        }
        
        if(!$this->oObject->_getDataOne('is_favourite' ) and $oFavoriteTarget){
            if($this->Favourite_DeleteFavourite($oFavoriteTarget)){
                $this->Message_AddNoticeSingle($this->Lang_Get('favourite.notices.remove_success'),
                        $this->Lang_Get('common.attention'));
            }
        }
    }

    /**
     * Коллбэк
     * Выполняется после удаления сущности
     */
    public function CallbackBeforeDelete()
    {
        $this->Favourite_DeleteFavouriteByTargetId($this->oObject->_getPrimaryKeyValue(), $this->getTargetType());
    }
    
    public function getFavourite()
    {
        if(!$this->oUserCurrent){
            return 0;
        }
        return $oFavoriteTarget = $this->Favourite_GetFavourite(
            $this->oObject->_getPrimaryKeyValue(), 
            $this->getTargetType(),
            $this->oUserCurrent->getId());
    }  
    
    public function getCountFavourite()
    {
        return $this->PluginFreelancer_Favourites_GetCountFavouritesForTarget(
                $this->oUserCurrent->getId(), 
                $this->oObject->_getPrimaryKeyValue(), 
                $this->getTargetType());
    }
    
    public function getTargetType()
    {
        return strtolower(Engine::GetEntityName($this->oObject));
    }
    
    public function getEntityClass() {
        return Engine::GetEntityClass($this->oObject);
    }
    

}