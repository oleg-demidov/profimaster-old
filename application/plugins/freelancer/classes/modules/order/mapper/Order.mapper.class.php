<?php

class PluginFreelancer_ModuleOrder_MapperOrder extends MapperORM
{
    public function GetUserByPermission($sPermissionCode)
    {
        $sql = "SELECT
                    ru.user_id
                FROM " . Config::Get('db.table.rbac_permission') . " as p
                JOIN " . Config::Get('db.table.rbac_role_permission') . " as rp ON rp.permission_id = p.id 
                JOIN " . Config::Get('db.table.rbac_role') . " as r ON rp.role_id = r.id
                JOIN " . Config::Get('db.table.rbac_role_user') . " as ru ON ru.role_id = rp.role_id 
                WHERE p.state = 1 AND  r.state = 1 AND p.code = ?;";
        if ($aRows = $this->oDb->selectCol($sql, $sPermissionCode)) {
            return $aRows;
        }
        return array();
    }  
    
    public function GetCountOrdersByUserId($iUserId) {
        $sql = "SELECT  count(*)
                FROM " . Config::Get('plugin.freelancer.table.order') . "
                WHERE user_id = ?d";
        if ($iCount = $this->oDb->selectCell($sql, $iUserId)) {
            return $iCount;
        }
        return 0;
    }
    
    public function GetCountOrdersByMasterId($iUserId) {
        $sql = "SELECT  count(*)
                FROM " . Config::Get('plugin.freelancer.table.order') . "
                WHERE master_id = ?d";
        if ($iCount = $this->oDb->selectCell($sql, $iUserId)) {
            return $iCount;
        }
        return 0;
    }
    public function GetCountDoneOrdersByMasterId($iUserId) {
        $sql = "SELECT  count(*)
                FROM " . Config::Get('plugin.freelancer.table.order') . "
                WHERE master_id = ?d AND  status = 'done'";
        if ($iCount = $this->oDb->selectCell($sql, $iUserId)) {
            return $iCount;
        }
        return 0;
    }
    
    public function GetCountResponseByUserId($iUserId) {
        $sql = "SELECT  count(*)
                FROM " . Config::Get('plugin.freelancer.table.response') . "
                WHERE user_id = ?d";
        if ($iCount = $this->oDb->selectCell($sql, $iUserId)) {
            return $iCount;
        }
        return 0;
    }
}