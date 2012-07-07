<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of appfactory
 *
 * @author michel
 */

require_once 'app/levelcontroller.php';
class appFactory {
    
    private $_pageView;
    
    public  function appFactory() {
        
    }
    
    public function getAppFactory( $view, dataModel $dataModel, & $params) {

		
        switch ($view) {
            case "login":
                $controller = new LoginController($dao,$params );
                $this->_pageView = new LoginView($controller);
                break;
            case "level":   
                $controller = new levelController($dataModel, $params);
                $this->_pageView = new levelView($controller);
                break;
            case "index":
                echo "this is a test";
                break;
            default:
                break;
        }
        
       
    }
    
    public function getView() {
            return $this->_pageView;
        }
}
?>
