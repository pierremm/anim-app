<?php
/**
 * User: Pierremm
 * Date: 08/07/19
 * Version: 1.0
 */

abstract class Manager
{
   protected $db = null;

   public function __construct()
   {
        $this->db = NEW PDO('mysql:host=localhost;dbname=bie_app;charset=utf8',
            'root','root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   }

}