<?php

/**
 * Controller des routes des projets
 *
 * User: Pierremm
 * Date: 01/06/2020
 * Version 1.0
 */


try {
    // Récupérer ou initialiser l'identifiant d'un projet
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

    // Instanciation de la classe 
    $projets = new ProjetManager();

    // Créer un projet
    if (isset($_POST['ajouterProjet'])  && !isset($_GET['modifier'])) {
        $projets->ajouterProjet($_POST['nom']);
        header('location:index.php?projets');
    }

    // Modifier un projet
    if (isset($_POST['modifierProjet']) && isset($_GET['modifier'])) {
        $projets->modifierProjet($_POST['id'], $_POST['nom']);
        header('location:index.php?projets');
    }

    // Supprimer un projet
    if (isset($_GET['projets']) && isset($_GET['effacer'])) {
        $id = $_GET['effacer'];
        $projets->effacerProjet($id);
        header('location:index.php?projets');
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
    echo '<a href="/?projets">Retour à la liste des projets</a><br />';
    echo '</div>';
}
