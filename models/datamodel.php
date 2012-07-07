<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of datamodel
 *
 * @author michel
 */
class dataModel {

    private $_dal;

    public function dataModel($database=null) {
        $this->setData(database::singleton());
    }

    private function setData($dal = null) {
        $this->_dal = $dal;
    }
    
    public function getData() {
        return $this->_dal;
    }
    
    public function getDomain() {
        $domain = new config();
        return $domain->getConfig("site_url");
    }
}

?>
