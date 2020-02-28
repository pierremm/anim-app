<?php

/**
 * User: Pierremm
 * Date: 08/07/19
 * Version: 1.0
 */

abstract class Manager
{

   /**
    * @var mixed  initialisation de la variable de connexion
    */
   protected $db = null;

   /**
    * Default constructor
    * Méthode appelée à l'instanciation de la classe
    */

   /**
    * Connexion à la base de données et assignement à la variable
    */
   public function __construct()
   {
        $this->db = NEW PDO('mysql:host=uzn.myd.infomaniak.com;dbname=uzn_app;charset=utf8',
            'uzn_webmasterbie','gavess64!400',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   }

}