<?php
class Core {
    public function run()
    {
        $url = explode('index.php', $_SERVER['PHP_SELF']);

        $url = end($url);

        if (!empty($url)) {
            
            $url = explode('/', $url);
            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {
                $currentController = $url[0].'Controller';
                array_shift($url);
            } else{
                $currentController = 'homeController';
            }

            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }

            if(count($url) > 0 ) {
                $params = $url;
            } else {
                $params = [];
            }

        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
            $params = [];
        }
        
        require_once 'core/Controller.php';

        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }
}