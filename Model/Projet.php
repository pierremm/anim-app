<?php
/**
 * User: pierremm
 * Date: 09/07/19
 * Version: 1.0
 */
class Projet  extends Entity {

    /**
     * @var mixed  initialisation des variables
     */
    private $id;
    private $nom;



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