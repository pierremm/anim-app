<?php
/**
 * User: pierremm
 * Date: 08/07/19
 * Version: 1.0
 */
class Partenaire  extends Entity {

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
     */
    public function __construct($tab = null)
    {
        if (is_array($tab)) {
            $this->hydrate($tab);
        }
    }



    /**
     * Getters
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
        } 

    }
    public function getContact()
    {
        return $this->contact;
    }


    /**
     * Setters
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
    public function setContact($contact): void
    {
        if (filter_var($contact, FILTER_VALIDATE_INT)) {
            $this->contact = $contact;
        }
    }
}