<?php

/**
 * Définition de la classe animation
 *
 * User: Pierremm
 * Date: 01/06/2020
 * Version 1.0
 */


/** 
 * Défintion de l'entité abstraite (instanciée dans les classes)
 */
abstract class Entity
{
    /** 
     * Hydratation
     * 
     * Assigner des valeurs aux attributs souhaités
     * 
     * Le formulaire remplit les attributs de l'objet avec les valeurs entrées
     * 
     * Sert à assigner des valeurs aux attributs de la classe 
     * c-a-d- sans devoir appeler les setters
     */
    protected function hydrate($values)
    {
        foreach ($values as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }

    /** 
     * Vérification des chaînes de caractères
     */
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
