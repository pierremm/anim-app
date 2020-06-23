<?php

/**
 * Controller des routes des animations
 *
 * User: Pierremm
 * Date: 01/06/2020
 * Version 1.0
 */


try {
    // Récupérer ou initialiser l'identifiant d'une animation
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

    // Instanciation de la classe 
    $animation = new AnimationManager();

    // Créer une animation
    if (isset($_POST['ajouterAnimation'])  && !isset($_GET['modifier'])) {
        $animation->ajouterAnimation($_POST['nom'], $_POST['dateAnim'], $_POST['theme'], $_POST['projet'], $_POST['partenaires'], $_POST['etablissement'], $_POST['lieu'], $_POST['public'], $_POST['effectif'], $_POST['demiJournees'], $_POST['animateurUn'], $_POST['animateurDeux'], $_POST['animateurTrois'], $_POST['animateurQuatre'], $_POST['animateurCinq'], $_POST['benevoles'], $_POST['notes']);
        header('location:index.php?animations');
    }

    // Modifier une animation
    if (isset($_POST['modifierAnimation']) && isset($_GET['modifier'])) {
        $animation->modifierAnimation($_POST['id'], $_POST['nom'], $_POST['dateAnim'], $_POST['theme'], $_POST['projet'], $_POST['partenaires'], $_POST['etablissement'], $_POST['lieu'], $_POST['public'], $_POST['effectif'], $_POST['demiJournees'], $_POST['animateurUn'], $_POST['animateurDeux'], $_POST['animateurTrois'], $_POST['animateurQuatre'], $_POST['animateurCinq'], $_POST['benevoles'], $_POST['notes']);
        header('location:index.php?animations');
    }


    // Supprimer une animation
    if (isset($_GET['animations']) && isset($_GET['effacer'])) {
        $id = $_GET['effacer'];
        $animation->effacerAnimation($id);
        header('location:index.php?animations');
    }
}

/** 
 * Si erreur
 */
catch (Exception $e) {
    echo '<div class="catchErreur">';
    require('view/frontend/errorView.php');
    echo '<br />';
    echo 'Détails : ' . $e->getMessage() . '<br />';
    echo '<a href="/?animations">Retour à la liste des animations</a><br />';
    echo '</div>';
}
