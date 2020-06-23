<?php $title = 'Synthèse'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>

<!-- Synthèse des animations -->

<?php
$year = '';
$animationManager = new AnimationManager();
$animations = $animationManager->lireToutesAnimations();
$animation = $animationManager->lireAnimation($id);
$synthese = $animationManager->faireSynthese($year);
$sommeThemes = $animationManager->sommeThemes();
$themeManager = new ThemeManager();
$themes = $themeManager->lireTousThemes();
$theme = $themeManager->lireTheme($id);
$projetManager = new ProjetManager();
$projets = $projetManager->lireTousProjets();
$projet = $projetManager->lireProjet($id);
$partenaireManager = new PartenaireManager();
$partenaires = $partenaireManager->lireTousPartenaires();
$partenaire = $partenaireManager->lirePartenaire($id);
$etablissementManager = new EtablissementManager();
$etablissements = $etablissementManager->lireTousEtablissements();
$etablissement = $etablissementManager->lireEtablissement($id);
$lieuManager = new LieuManager();
$lieux = $lieuManager->lireTousLieux();
$lieu = $lieuManager->lireLieu($id);
$publicManager = new PublicsManager();
$publics = $publicManager->lireTousPublics();
$public = $publicManager->lirePublic($id);



// START ANIMATIONS LIST
if (isset($_GET['synthese'])) {
echo'<p>Sélectionnez une année : <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
    <option value="#" selected>Année</option>
    <option value="?synthese&annee=2020">2020</option>
    <option value="?synthese&annee=2021">2021</option>
    <option value="?synthese&annee=2022">2022</option>
    <option value="?synthese&annee=2023">2023</option>
    <option value="?synthese&annee=2024">2024</option>
    <option value="?synthese&annee=2025">2025</option>
    </select></p>';
};
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    echo '<div class="table">';
    echo '<table id="synthese" class="table table-bordered table-hover"';

    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">&nbsp;</th>';
    echo '<th scope="col">';
    echo '&nbsp;';
    echo '</th>';

    // Themes colspan
    echo '<th scope="col" class="table-success" colspan=';
    $nbrThemes = 0;
    foreach ($themes as $theme) {
        $nbrThemes++;
    }
    echo $nbrThemes;
    echo ' >Thèmes</th>';

    echo '<th scope="col" class="table-info" colspan=7>Détails de l\'animation</th>';
    echo '<th scope="col" class="table-warning" colspan=6>Animateurs</th>';
    echo '<th scope="col">&nbsp;</th>';
    echo '</tr>';

    echo '<tr class="verticalTh">';
    echo '<th scope="col"><span>Nom</span></th>';
    echo '<th scope="col"><span>Date</span></th>';

    // Themes name loop
    foreach ($themes as $theme) {
        echo '<th scope="col" class="themes"><span>' . $theme->getNom() . '</span></th>';
    }
    echo '<th scope="col"><span>Projets</span></th>';
    echo '<th scope="col"><span>Partenaires</span></th>';
    echo '<th scope="col"><span>Etablissement</span></th>';
    echo '<th scope="col"><span>Lieu</span></th>';
    echo '<th scope="col"><span>Public</span></th>';
    echo '<th scope="col"><span>Effectif</span></th>';
    echo '<th scope="col" class="themes"><span>1/2 journées</span></th>';
    echo '<th scope="col" class="themes"><span>Animateur&nbsp;1</span></th>';
    echo '<th scope="col" class="themes"><span>Animateur&nbsp;2</span></th>';
    echo '<th scope="col" class="themes"><span>Animateur&nbsp;3</span></th>';
    echo '<th scope="col" class="themes"><span>Animateur&nbsp;4</span></th>';
    echo '<th scope="col" class="themes"><span>Animateur&nbsp;5</span></th>';
    echo '<th scope="col" class="themes"><span>Autres</span></th>';
    echo '<th scope="col" class="notes"><span>Notes</span></th>';
    echo '</tr>';
    echo '</thead>';


    // Boucle des animations

    echo '<tbody>';

    foreach ($synthese as $animation) {


        echo '<tr>';
        echo ' <th scope="row"><a href="?animations&modifier=' . $animation->getId() . '">';
        echo $animation->getNom();
        echo '</a></td> ';
        echo '<td>' . $animation->getDateAnim() . '</td>';


        // Thèmes boucle headers

        foreach ($themes as $theme) {
            echo '<td id="' .    $theme->getId()  . '" class="themes">';
            if ($animation->getTheme() == $theme->getId()) {

                // Nombres
                echo  $animation->getDemiJournees() . "<br />";
            } else {
                echo '&nbsp;';
            }
            echo '</td>';
        }

        // FIN Thèmes boucle headers



        echo '<td>';
        foreach ($projets as $projet) {
            if ($projet->getId() == $animation->getProjet()) {
                echo $projet->getNom();
            }
        }
        echo '</td>';
        echo '<td>';

        foreach ($partenaires as $partenaire) {
            if ($partenaire->getId() == $animation->getPartenaires()) {
                echo $partenaire->getNom();
            }
        }
        echo '</td>';
        echo '<td>';
        foreach ($etablissements as $etablissement) {
            if ($etablissement->getId() == $animation->getEtablissement()) {
                echo $etablissement->getNom();
            }
        }
        echo '</td>';
        echo '<td>';
        foreach ($lieux as $lieu) {
            if ($lieu->getId() == $animation->getLieu()) {
                echo $lieu->getNom();
            }
        }
        echo '</td>';
        echo '<td>';
        foreach ($publics as $public) {
            if ($public->getId() == $animation->getPublic()) {
                echo $public->getNom();
            }
        }
        echo '</td>';
        echo '<td>' . $animation->getEffectif() . '</td>';
        echo '<td>' . $animation->getDemiJournees() . '</td>';
        echo '<td>' . $animation->getAnimateurUn() . '</td>';
        echo '<td>' . $animation->getAnimateurDeux() . '</td>';
        echo '<td>' . $animation->getAnimateurTrois() . '</td>';
        echo '<td>' . $animation->getAnimateurQuatre() . '</td>';
        echo '<td>' . $animation->getAnimateurCinq() . '</td>';
        echo '<td>' . $animation->getBenevoles() . '</td>';
        echo '<td>' . $animation->getNotes() . '</td>';
        echo '</tr>';
    }
    // Fin boucle des animations


    echo '<tr class="table-light">';
    echo '<td  scope="row" colspan=2 >&nbsp;</td>';



    // Somme des thèmes

    foreach ($themes as $theme) {
        echo '<td id="' . $theme->getId() . '">';

        // Initialise une variable pour chaque thème
        $sommeThemes = 0;
        foreach ($synthese as $animation) {
            if ($animation->getTheme() == $theme->getId()) {
                // Ajoute la valeur à la variable
                $sommeThemes += $animation->getDemiJournees();
            }
        }
        // Affichage de la variable
        echo $sommeThemes;
        echo '</td>';
    }

    echo '<td colspan=5 >&nbsp;</td>';



    // Somme des effectifs

    echo '<td id="' . $theme->getId() . '">';
    // Initialise une variable 
    $sommeEffectif = 0;
    foreach ($synthese as $animation) {
        // Ajoute la valeur à la variable 
        $sommeEffectif += $animation->getEffectif();
    }
    // Affichage de la variable
    echo $sommeEffectif;
    echo '</td>';



    // Somme des demi-journées

    echo '<td id="' . $theme->getId() . '">';
    // Initialise une variable 
    $sommeDemiJournees = 0;
    foreach ($synthese as $animation) {
        // Ajoute la valeur à la variable 
        $sommeDemiJournees += $animation->getDemiJournees();
    }
    // Affichage de la variable
    echo $sommeDemiJournees;
    echo '</td>';




    // Somme des demi-journées animateurUn

    echo '<td id="' . $theme->getId() . '">';
    // Initialise une variable 
    $sommeAnimateurUn = 0;
    foreach ($synthese as $animation) {
        // Ajoute la valeur à la variable 
        $sommeAnimateurUn += $animation->getAnimateurUn();
    }
    // Affichage de la variable
    echo $sommeAnimateurUn;
    echo '</td>';


    // Somme des demi-journées AnimateurDeux

    echo '<td id="' . $theme->getId() . '">';
    // Initialise une variable 
    $sommeAnimateurDeux = 0;
    foreach ($synthese as $animation) {
        // Ajoute la valeur à la variable 
        $sommeAnimateurDeux += $animation->getAnimateurDeux();
    }
    // Affichage de la variable
    echo $sommeAnimateurDeux;
    echo '</td>';


    // Somme des demi-journées AnimateurTrois

    echo '<td id="' . $theme->getId() . '">';
    // Initialise une variable 
    $sommeAnimateurTrois = 0;
    foreach ($synthese as $animation) {
        // Ajoute la valeur à la variable 
        $sommeAnimateurTrois += $animation->getAnimateurTrois();
    }
    // Affichage de la variable
    echo $sommeAnimateurTrois;
    echo '</td>';


    // Somme des demi-journées AnimateurQuatre

    echo '<td id="' . $theme->getId() . '">';
    // Initialise une variable 
    $sommeAnimateurQuatre = 0;
    foreach ($synthese as $animation) {
        // Ajoute la valeur à la variable 
        $sommeAnimateurQuatre += $animation->getAnimateurQuatre();
    }
    // Affichage de la variable
    echo $sommeAnimateurQuatre;
    echo '</td>';


    // Somme des demi-journées AnimateurCinq

    echo '<td id="' . $theme->getId() . '">';
    // Initialise une variable 
    $sommeAnimateurCinq = 0;
    foreach ($synthese as $animation) {
        // Ajoute la valeur à la variable 
        $sommeAnimateurCinq += $animation->getAnimateurCinq();
    }
    // Affichage de la variable
    echo $sommeAnimateurCinq;
    echo '</td>';




    // Somme des demi-journées Bénévoles

    echo '<td id="' . $theme->getId() . '" style="white-space:inherit;">';
    // Initialise une variable 
    $sommeBenevoles = 0;
    foreach ($synthese as $animation) {
        // Ajoute la valeur à la variable 
        $sommeBenevoles += $animation->getBenevoles();
    }
    // Affichage de la variable
    echo $sommeBenevoles;
    echo '</td>';



    echo '<td>&nbsp;</td>';
    echo '</tr>';
    echo '<tbody>';

    echo '</table>';
    echo '</div>';
}

// Fin liste des animations

?>


<!-- Fin de la synthèse->

<?php

$content = ob_get_clean();

require('view/frontend/template.php');
