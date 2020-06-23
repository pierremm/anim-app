<?php

/**
 * Chargement automatique des classes non définies
 * 
 * User: Pierremm
 * Date: 01/06/2020
 * Version 1.0
 */

// OBSOLETE < PHP 7.2
function __myautoload($classname)
{
    require_once('Model/' . $classname . '.php');
}
spl_autoload_register('__myautoload');