<?php

/**
 * Controller des routes des lieux
 *
 * User: Pierremm
 * Date: 01/06/2020
 * Version 1.0
 */


try {
    // Récupérer ou initialiser l'identifiant d'un lieu
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

    // Instanciation de la classe 
    $lieux = new LieuManager();

    // Créer un lieu
    if (isset($_POST['ajouterLieu'])  && !isset($_GET['modifier'])) {
        $lieux->ajouterLieu($_POST['nom'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['contact']);
        header('location:index.php?lieux');
    }

    // Modifier un lieu
    if (isset($_POST['modifierLieu']) && isset($_GET['modifier'])) {
        $lieux->modifierLieu($_POST['id'], $_POST['nom'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['contact']);
        header('location:index.php?lieux');
    }

    // Supprimer un lieu
    if (isset($_GET['lieux']) && isset($_GET['effacer'])) {
        $id = $_GET['effacer'];
        $lieux->effacerLieu($id);
        header('location:index.php?lieux');
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
    echo '<a href="/?lieux">Retour à la liste des lieux</a><br />';
    echo '</div>';
}
