<?php
class Controller {
    public function loadView($viewName, $viewData = array()){
        
        include 'views/'.$viewName.'.php';
    }

    public function loadTemplate($viewName, $viewData = array()){

        include 'view/template.php';
    }

    public function loadViewInTemplate($viewName, $viewAction, $viewData = array()){

        extract($viewData);
        include 'views/'.$viewName.'.php';
    }
}