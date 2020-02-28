<?php

/**
 * Définition de la classe Animation
 *
 * User: Pierremm
 * Date: 11/07/19
 * Version 1.0
 */


/** 
 * Création de la classe héritée
 */
class Animation  extends Entity
{

    /**
     * @var mixed  initialisation des variables
     */
    private $id;
    private $nom;
    private $dateAnim;
    private $theme;
    private $themes;
    private $projet;
    private $partenaires;
    private $etablissement;
    private $lieu;
    private $public;
    private $effectif;
    private $demiJournees;
    private $matthias;
    private $noelie;
    private $benevoles;
    private $notes;

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
    public function getDateAnim()
    {
        return $this->dateAnim;
    }
    public function getTheme()
    {
        return $this->theme;
    }
    public function getThemes()
    {
        return $this->themes;
    }
    public function getProjet()
    {
        return $this->projet;
    }
    public function getPartenaires()
    {
        return $this->partenaires;
    }
    public function getEtablissement()
    {
        return $this->etablissement;
    }
    public function getLieu()
    {
        return $this->lieu;
    }
    public function getPublic()
    {
        return $this->public;
    }
    public function getEffectif()
    {
        return $this->effectif;
    }
    public function getDemiJournees()
    {
        return $this->demiJournees;
    }
    public function getSumTheme()
    {
        return $this->demiJournees;
    }
    public function getMatthias()
    {
        return $this->matthias;
    }
    public function getNoelie()
    {
        return $this->noelie;
    }
    public function getBenevoles()
    {
        return $this->benevoles;
    }
    public function getNotes()
    {
        return $this->notes;
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
     * @param mixed $dateAnim
     */
    public function setDateAnim($dateAnim): void
    {
        //$this->dateAnim  = date('Y-m-d H:i:s');
        $this->dateAnim = $this->verifString($dateAnim, 13);
    }
    /**
     * @param integer $theme
     */
    public function setTheme($theme): void
    {
        if (filter_var($theme, FILTER_VALIDATE_INT)) {
            $this->theme = $theme;
        }
    }
    /**
     * @param integer $projet
     */
    public function setProjet($projet): void
    {
        if (filter_var($projet, FILTER_VALIDATE_INT)) {
            $this->projet = $projet;
        }
    }
    /**
     * @param integer $partenaires
     */
    public function setPartenaires($partenaires): void
    {
        if (filter_var($partenaires, FILTER_VALIDATE_INT)) {
            $this->partenaires = $partenaires;
        }
    }
    /**
     * @param integer $etablissement
     */
    public function setEtablissement($etablissement): void
    {
        if (filter_var($etablissement, FILTER_VALIDATE_INT)) {
            $this->etablissement = $etablissement;
        }
    }
    /**
     * @param integer $lieu
     */
    public function setLieu($lieu): void
    {
        if (filter_var($lieu, FILTER_VALIDATE_INT)) {
            $this->lieu = $lieu;
        }
    }
    /**
     * @param integer $public
     */
    public function setPublic($public): void
    {
        if (filter_var($public, FILTER_VALIDATE_INT)) {
            $this->public = $public;
        }
    }
    /**
     * @param integer $effectif
     */
    public function setEffectif($effectif): void
    {
        if (filter_var($effectif, FILTER_VALIDATE_INT)) {
            $this->effectif = $effectif;
        }
    }
    /**
     * @param integer $demiJournees
     */
    public function setDemiJournees($demiJournees): void
    {
        if (filter_var($demiJournees, FILTER_VALIDATE_INT)) {
            $this->demiJournees = $demiJournees;
        }
    }
    /**
     * @param integer $matthias
     */
    public function setMatthias($matthias): void
    {
        if (filter_var($matthias, FILTER_VALIDATE_INT)) {
            $this->matthias = $matthias;
        }
    }
    /**
     * @param integer $noelie
     */
    public function setNoelie($noelie): void
    {
        if (filter_var($noelie, FILTER_VALIDATE_INT)) {
            $this->noelie = $noelie;
        }
    }
    /**
     * @param integer $benevoles
     */
    public function setBenevoles($benevoles): void
    {
        if (filter_var($benevoles, FILTER_VALIDATE_INT)) {
            $this->benevoles = $benevoles;
        }
    }
    /**
     * @param string $notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $this->verifString($notes, 50);
    }
}
