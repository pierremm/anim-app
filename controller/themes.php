<?php

/**
 * User: Pierremm
 * Date: 09/07/19
 * Version 1.0
 */


// Gestions des opérations sur les thèmes
try {

    // Récupérer ou initialiser l'identifiant
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

    $theme = new ThemeManager();

    // Créer un thème
    if (isset($_POST['ajouterTheme'])  && !isset($_GET['modifier'])) {
        $theme->ajouterTheme($_POST['nom']);
        header('location:index.php?themes');
    }


    // Modifier un thème
    if (isset($_POST['modifierTheme']) && isset($_GET['modifier'])) {
        $theme->modifierTheme($_POST['id'], $_POST['nom']);
        header('location:index.php?themes');
    }


    // Supprimer un thème
    if (isset($_GET['themes']) && isset($_GET['effacer'])) {
        $id = $_GET['effacer'];
        $theme->effacerTheme($id);
        header('location:index.php?themes');
    }
}

// Si erreur
catch (Exception $e) {
    echo '<div class="catchErreur">';
    require('view/frontend/errorView.php');
    echo '<br />';
    echo 'Détails : ' . $e->getMessage() . '<br />';
    //echo '<a href="/?themes">Retour à la liste</a><br />';
    echo '</div>';
}
