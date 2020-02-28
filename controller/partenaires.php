<?php

/**
 * Controller des routes des partenires
 *
 * User: Pierremm
 * Date: 11/07/19
 * Version 1.0
 */


try {
    // Récupérer ou initialiser l'identifiant d'un' partenaire
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

    // Instanciation de la classe 
    $partenaire = new PartenaireManager();

    // Créer un partenaire
    if (isset($_POST['ajouterPartenaire'])  && !isset($_GET['modifier'])) {
        $partenaire->ajouterPartenaire($_POST['nom'], $_POST['tel'], $_POST['email'], $_POST['contact']);
        header('location:index.php?partenaires');
    }

    // Modifier un partenaire
    if (isset($_POST['modifierPartenaire']) && isset($_GET['modifier'])) {
        $partenaire->modifierPartenaire($_POST['id'], $_POST['nom'], $_POST['tel'], $_POST['email'], $_POST['contact']);
        header('location:index.php?partenaires');
    }

    // Supprimer un partenaire
    if (isset($_GET['partenaires']) && isset($_GET['effacer'])) {
        $id = $_GET['effacer'];
        $partenaire->effacerPartenaire($id);
        header('location:index.php?partenaires');
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
    echo '<a href="/?partenaires">Retour à la liste des partenaires</a><br />';
    echo '</div>';
}
