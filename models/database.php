<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database
 *
 * @author michel
 */
class database {
    
    private $_host;
    private $_user;
    private $_pass;
    private $_db;
    private $_connect;
    private $_result;
    private static $_singleton = null;
    
   
    protected function __clone() {}

    public function database() {
        $this->_host = "localhost";
        $this->_user = "root";
        $this->_pass = "root";
        $this->_db = "township";
        $this->_connect = $this->dbConnect($this->_host, $this->_user, $this->_pass, $this->_db);
    }
    
    private function dbConnect($_host = null, $_user = null, $_pass = null, $_db = null) {
        $link = mysql_connect($_host, $_user, $_pass);
        if(!$link) die("Can't connect to the server! ".mysql_error());
        mysql_select_db($_db);
        return $link;
    }
    
    public function query($table = null, $conditions = null) {
    
        if($table != null || $conditions != null) {
            $this->_result = mysql_query("SELECT * FROM ".$table." WHERE ".$conditions)
                    OR die("Query error: ".  mysql_error());
          
            if($this->countRows() > 0) return true;
            else return false;
            
        } 
        
        
    }
    
    private function countRows() {
        
        return mysql_num_rows($this->_result);
    }
    
    public function fetchArray() {
        $num = $this->countRows();
        if($num != 0) {
            $rows = array();
            
            while($row = mysql_fetch_array($this->_result,MYSQL_ASSOC))
                $rows[] = $row;

            mysql_free_result($this->_result);
            return $rows;
        }
        
        return false;
    }
    
    public static function singleton(){
        if(!self::$_singleton) self::$_singleton = new self();
        return self::$_singleton;
    }
}

?>
