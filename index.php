<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function($class)
{
   if (strpos($class, 'Controller') > -1) {
       if (file_exists('controllers/'.$class.'.php')) {
           require_once 'controllers/'.$class.'.php';
       }
   } elseif (file_exists('models/.'.$class.'.php')) {
       require_once 'models/'.$class.'.php';
   } else {
       require_once 'core/'.$class.'.php';
   }
});

$core = new Core();
$core-> run();