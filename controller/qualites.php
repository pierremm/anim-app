<?php

/**
 * User: Pierremm
 * Date: 09/07/19
 * Version 1.0
 */


// Gestions des opérations sur les Qualités
try {

    // Récupérer ou initialiser l'identifiant
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

    $qualite = new QualiteManager();

    // Créer une qualité
    if (isset($_POST['ajouterQualite'])  && !isset($_GET['modifier'])) {
        $qualite->ajouterQualite($_POST['nom']);
        header('location:index.php?qualites');
    }


    // Modifier une qualite
    if (isset($_POST['modifierQualite']) && isset($_GET['modifier'])) {
        $qualite->modifierQualite($_POST['id'], $_POST['nom']);
        header('location:index.php?qualites');
    }


    // Supprimer une qualite
    if (isset($_GET['qualites']) && isset($_GET['effacer'])) {
        $id = $_GET['effacer'];
        $qualite->effacerQualite($id);
        header('location:index.php?qualites');
    }
}

// Si erreur
catch (Exception $e) {
    echo '<div class="catchErreur">';
    require('view/frontend/errorView.php');
    echo '<br />';
    echo 'Détails : ' . $e->getMessage() . '<br />';
    //echo '<a href="/?qualites">Retour à la liste</a><br />';
    echo '</div>';
}
