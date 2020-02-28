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
        $this->db = NEW PDO('mysql:host=localhost;dbname=bie_app;charset=utf8',
            'root','root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   }

}