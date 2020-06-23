<?php

/**
 * User: pierremm
 * Date: 01/06/2020
 * Version: 1.0
 */
class Lieu  extends Entity
{

    /**
     * @var mixed  initialisation des variables
     */
    private $id;
    private $nom;
    private $adresse;
    private $cp;
    private $ville;
    private $contact;


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
    public function getadresse()
    {
        return $this->adresse;
    }
    public function getcp()
    {
        return $this->cp;
    }
    public function getville()
    {
        return $this->ville;
    }
    public function getcontact()
    {
        return $this->contact;
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
        }
    }

    /**
     * @param string $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $this->verifString($nom, 50);
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $this->verifString($adresse, 255);
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
        $this->cp = $this->verifString($cp, 10);
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $this->verifString($ville, 50);
    }

    /**
     * @param integer $contact
     */
    public function setContact($contact): void
    {
        if (filter_var($contact, FILTER_VALIDATE_INT)) {
            $this->contact = $contact;
        }
    }
}
