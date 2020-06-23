<?php

/**
 * User: pierremm
 * Date: 01/06/2020
 * Version: 1.0
 */
class Theme  extends Entity
{

    /**
     * @var mixed  initialisation des variables
     */
    private $id;
    private $nom;



    /**
     * Default constructor
     * Méthode appelée à l'instanciation de la classe
     */

    /**
     * Création du tableau
     */
    public function __construct($tab = null)
    {
        /**
         *  Hydrate : assigne les valeurs au tableau
         */
        if (is_array($tab)) {
            $this->hydrate($tab);
            // echo '<pre>';
            // var_dump($tab);
            // echo '</pre>';
        }
    }

    /**
     * Getters
     * 
     * Modifient ou ajustent une valeur avant de la renvoyer
     */

    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }



    /**
     * Setters
     * 
     * Vérifient avant de stocker dans la base SQL
     * 
     * Héritage des fonctions
     * ex: verifString <- Entity
     */

    /**
     * @param integer $id
     */
    public function setId($id): void
    {
        if (filter_var($id, FILTER_VALIDATE_INT)) {
            $this->id = $id;
            $this->id = $this->verifString($id, 11);
        }
    }

    /**
     * @param string $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $this->verifString($nom, 50);
    }
}
