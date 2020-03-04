<?php

/**
 * Chargement automatique des classes non définies
 * 
 * User: Pierremm
 * Date: 08/07/19
 * Version 1.0
 */

// OBSOLETE < PHP 7.2
function __myautoload($classname)
{
    require_once('Model/' . $classname . '.php');
}
spl_autoload_register('__myautoload');


// if (!function_exists('classAutoLoader')) {
//     function classAutoLoader($class)
//     {
//         $class = strtolower($class);
//         // $classFile=$_SERVER['DOCUMENT_ROOT'].'/include/class/'.$class.'.class.php';
//         $classFile = 'Model/' . $class . '.php';
//         if (is_file($classFile) && !class_exists($class)) include $classFile;
//     }
// }
// spl_autoload_register('classAutoLoader');
