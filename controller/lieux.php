<?php

/**
 * User: Pierremm
 * Date: 11/07/19
 * Version 1.0
 */


// Gestions des opérations sur les lieux
try {

    // Récupérer ou initialiser l'identifiant
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

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

// Si erreur
catch (Exception $e) {
    echo '<div class="catchErreur">';
    require('view/frontend/errorView.php');
    echo '<br />';
    echo 'Détails : ' . $e->getMessage() . '<br />';
    //echo '<a href="/?lieux">Retour à la liste</a><br />';
    echo '</div>';
}
