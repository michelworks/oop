<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pageController
 *
 * @author michel
 */
class pageController {
   
   public $model;
   public $view;
   public $getVars;
    
   public function pageController (dataModel & $dataModel, $getvars = null) 
   {
        $this->model =& $dataModel;
        if (!empty ($getvars))
            $this->getVars = $getvars;
   }
   
   public function getDomain()
   {
       return $this->model->getDomain();
   }
    public function getModel()
   {
       return $this->model;
   }
}

?>
