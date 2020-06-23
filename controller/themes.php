<?php

/**
 * Controller des routes des thèmes
 *
 * User: Pierremm
 * Date: 01/06/2020
 * Version 1.0
 */


try {
    // Récupérer ou initialiser l'identifiant d'un thème
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

    // Instanciation de la classe 
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

/** 
 * Si erreur
 */
catch (Exception $e) {
    echo '<div class="catchErreur">';
    require('view/frontend/errorView.php');
    echo '<br />';
    echo 'Détails : ' . $e->getMessage() . '<br />';
    echo '<a href="/?themes">Retour à la liste des thèmes</a><br />';
    echo '</div>';
}
