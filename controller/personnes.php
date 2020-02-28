<?php

/**
 * User: Pierremm
 * Date: 09/07/19
 * Version 1.0
 */


// Gestions des opérations sur les Personnes
try {

    // Récupérer ou initialiser l'identifiant
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

    $personne = new PersonneManager();

    // Créer une personne
    if (isset($_POST['ajouterPersonne'])  && !isset($_GET['modifier'])) {
        $personne->ajouterPersonne($_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['email'], $_POST['qualite']);
        header('location:index.php?personnes');
    }


    // Modifier une personne
    if (isset($_POST['modifierPersonne']) && isset($_GET['modifier'])) {
        $personne->modifierPersonne($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['email'], $_POST['qualite']);
        header('location:index.php?personnes');
    }


    // Supprimer une personne
    if (isset($_GET['personnes']) && isset($_GET['effacer'])) {
        $id = $_GET['effacer'];
        $personne->effacerPersonne($id);
        header('location:index.php?personnes');
    }
}

// Si erreur
catch (Exception $e) {
    echo '<div class="catchErreur">';
    require('view/frontend/errorView.php');
    echo '<br />';
    echo 'Détails : ' . $e->getMessage() . '<br />';
    //echo '<a href="/?personnes">Retour à la liste</a><br />';
    echo '</div>';
}
