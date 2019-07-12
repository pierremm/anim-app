<?php

/**
 * User: pierremm
 * Date: 08/07/19
 * Version: 1.0
 */

abstract class Entity
{


    protected function hydrate($values)
    {
        foreach ($values as $key => $value) {

            $methodName = 'set' . ucfirst($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }

    protected function verifString($str, $length)
    {
        if (iconv_strlen($str) == 0) {
            return '-';
        } else if (iconv_strlen($str) <= $length) {
            return $str;
        } else {
            return substr($str, 0, $length);
        }
    }
}
