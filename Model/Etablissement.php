<?php

/**
 * Définition de la classe Etablissement
 *
 * User: Pierremm
 * Date: 01/06/2020
 * Version 1.0
 */


/** 
 * Création de la classe héritée
 */
class Etablissement  extends Entity
{

    /**
     * @var mixed  initialisation des variables
     */
    private $id;
    private $nom;
    private $tel;
    private $email;
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
    public function getTel()
    {
        return $this->tel;
    }
    public function getEmail()
    {
        // Validation email
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return $this->email;
        } else {
            return '';
        }
    }
    public function getContact()
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
     * @param mixed $tel
     */
    public function setTel($tel): void
    {

        $this->tel = $this->verifString($tel, 13);
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $this->verifString($email, 50);
    }

    /**
     * @param integer $contact
     */
    public function setEtablissement($contact): void
    {
        if (filter_var($contact, FILTER_VALIDATE_INT)) {
            $this->contact = $contact;
            $this->contact = $this->verifString($contact, 3);
        }
    }
}
