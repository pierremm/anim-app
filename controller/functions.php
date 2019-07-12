<?php

/**
 * User: Pierremm
 * Date: 08/07/19
 * Version 1.0
 */
function __myautoload($classname)
{
    require_once('Model/' . $classname . '.php');
}

spl_autoload_register('__myautoload');

