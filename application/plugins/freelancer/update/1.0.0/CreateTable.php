<?php


/**
 * Description of CreateTable
 *
 * @author oleg
 */

class PluginFreelancer_Update_CreateTable extends ModulePluginManager_EntityUpdate {
	/**
	 * Выполняется при обновлении версии
	 */
    private $aDumps = [
        'prefix_freelancer_balance_transaction' => 'dump_transaction',
        'prefix_freelancer_order_bid' => 'dump_bid',
        'prefix_freelancer_order' => 'dump_order',
        'prefix_freelancer_freelancer_response' => 'dump_response',
        'prefix_freelancer_portfolio_work' => 'dump_work',
        'prefix_freelancer_notify' => 'dump_notify',
        'prefix_freelancer_sms' => 'dump_sms',
        'prefix_freelancer_market_action' => 'dump_action',
        'prefix_freelancer_settings' => 'dump_settings'
    ];


    public function up() {        
        $this->exportSQL(Plugin::GetPath(__CLASS__).'update/1.0.0/dump_user.sql');
        foreach($this->aDumps as $sTable => $sFile){
            if(!$this->exportDump($sTable, $sFile)){
                return false;
            }
        }
        
	return true;
    }
    
    protected function exportDump($sTable, $sFile) {
        if (!$this->isTableExists($sTable)) {
            $sResult = $this->exportSQL(Plugin::GetPath(__CLASS__).'update/1.0.0/'.$sFile.'.sql');
            $this->Logger_Notice(serialize($sResult));             
        }
        return true;
    }
    
    protected function removeTable($sTable) {
        if ($this->isTableExists($sTable)){
            return $this->exportSQLQuery("DROP TABLE IF EXISTS $sTable");
        }
    }

    /**
     * Выполняется при откате версии
     */
    public function down() {
        foreach($this->aDumps as $sTable => $sFile){
            $aResult = $this->removeTable($sTable);
            $this->Logger_Notice(serialize($aResult));
        }
    }
}