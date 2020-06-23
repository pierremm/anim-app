<?php

/**
 * Controller des routes des publics
 *
 * User: Pierremm
 * Date: 01/06/2020
 * Version 1.0
 */


try {
    // Récupérer ou initialiser l'identifiant d'un public
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

    // Instanciation de la classe 
    $public = new PublicsManager();

    // Créer un public
    if (isset($_POST['ajouterPublic'])  && !isset($_GET['modifier'])) {
        $public->ajouterPublic($_POST['nom']);
        header('location:index.php?publics');
    }

    // Modifier un public
    if (isset($_POST['modifierPublic']) && isset($_GET['modifier'])) {
        $public->modifierPublic($_POST['id'], $_POST['nom']);
        header('location:index.php?publics');
    }

    //Supprimer un public
    if (isset($_GET['publics']) && isset($_GET['effacer'])) {
        $id = $_GET['effacer'];
        $public->effacerPublic($id);
        header('location:index.php?publics');
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
    echo '<a href="/?publics">Retour à la liste des publics</a><br />';
    echo '</div>';
}
