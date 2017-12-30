<?php

class PluginFreelancer_ModulePortfolio extends ModuleORM
{
    protected $mapper;
    
    protected $aBehaviors=array(
        'favourites' => 'PluginFreelancer_ModuleFavourites_BehaviorModule'
    );

    public function Init() {
        parent::Init();
         $this->mapper = Engine::GetMapper(__CLASS__);
    }
    
    public function GetCountWorksByUserId($iUserId) {
        return $this->mapper->GetCountItemsByFilter(['user_id' => $iUserId], 
                "PluginFreelancer_ModulePortfolio_EntityWork");
    }
    
}