<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author michel
 */
class users {
    
    private $_userID;
    private $_userName;
    private $_userFamilyName;
    private $_userGender;
    private $_photo;
    
    public function users($_userID = null, 
                                  $_userName = null, 
                                  $_userFamilyName = null, 
                                  $_photo = null,
                                  $_userGender = null) {
        
        if($_userID != null) $this->setUserId($_userID);
        if($_userName != null) $this->setUserName($_userName);
        if($_userFamilyName != null) $this->setUserFamilyName($_userFamilyName);
        if($_userGender != null) $this->setGender($_userGender);
        if($_photo != null) $this->setPhoto($_photo);
    }
    
    private function setUserId($value = null) {
        $this->_userID = $value;
    }
    
    private function setGender($value = null) {
        $this->_userGender = $value;
    }
    
    private function setUserName($value = null) {
        $this->_userName = $value;
    }
    
    private function setUserFamilyName($value = null) {
        $this->_userFamilyName = $value;
    }
    
    private function setPhoto($value = null) {
        if($value == null) {
            if($this->_userGender == "male") $this->_photo = "male.jpg";
            else  $this->_photo = "female.jpg";
        } else { $this->_photo = $value; }
    }
    
    
    
}

?>
