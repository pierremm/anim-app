<?php

/**
 * Définition de la classe Animation
 *
 * User: Pierremm
 * Date: 01/06/2020
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
    private $animateurUn;
    private $animateurDeux;
    private $animateurTrois;
    private $animateurQuatre;
    private $animateurCinq;
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
    public function getAnimateurUn()
    {
        return $this->animateurUn;
    }
    public function getAnimateurDeux()
    {
        return $this->animateurDeux;
    }
    public function getAnimateurTrois()
    {
        return $this->animateurTrois;
    }
    public function getAnimateurQuatre()
    {
        return $this->animateurQuatre;
    }
    public function getAnimateurCinq()
    {
        return $this->animateurCinq;
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
     * @param integer $animateurUn
     */
    public function setAnimateurUn($animateurUn): void
    {
        if (filter_var($animateurUn, FILTER_VALIDATE_INT)) {
            $this->animateurUn = $animateurUn;
        }
    }
    /**
     * @param integer $animateurDeux
     */
    public function setAnimateurDeux($animateurDeux): void
    {
        if (filter_var($animateurDeux, FILTER_VALIDATE_INT)) {
            $this->animateurDeux = $animateurDeux;
        }
    }

    /**
     * @param integer $animateurTrois
     */
    public function setAnimateurTrois($animateurTrois): void
    {
        if (filter_var($animateurTrois, FILTER_VALIDATE_INT)) {
            $this->animateurTrois = $animateurTrois;
        }
    }
    /**
     * @param integer $animateurQuatre
     */
    public function setAnimateurQuatre($animateurQuatre): void
    {
        if (filter_var($animateurQuatre, FILTER_VALIDATE_INT)) {
            $this->animateurQuatre = $animateurQuatre;
        }
    }
    /**
     * @param integer $animateurCinq
     */
    public function setAnimateurCinq($animateurCinq): void
    {
        if (filter_var($animateurCinq, FILTER_VALIDATE_INT)) {
            $this->animateurCinq = $animateurCinq;
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
