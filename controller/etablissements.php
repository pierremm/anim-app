<?php

/**
 * Controller des routes des établissements
 *
 * User: Pierremm
 * Date: 01/06/2020
 * Version 1.0
 */


try {
    // Récupérer ou initialiser l'identifiant d'un établissement
    if (isset($_GET['modifier'])) {
        $id = $_GET['modifier'];
    } else {
        $id = '';
    }

    // Instanciation de la classe 
    $etablissement = new EtablissementManager();

    // Créer un établissement
    if (isset($_POST['ajouterEtablissement'])  && !isset($_GET['modifier'])) {
        $etablissement->ajouterEtablissement($_POST['nom'], $_POST['tel'], $_POST['email'], $_POST['contact']);
        header('location:index.php?etablissements');
    }

    // Modifier un établissement
    if (isset($_POST['modifierEtablissement']) && isset($_GET['modifier'])) {
        $etablissement->modifierEtablissement($_POST['id'], $_POST['nom'], $_POST['tel'], $_POST['email'], $_POST['contact']);
        header('location:index.php?etablissements');
    }


    // Supprimer un établissement
    if (isset($_GET['etablissements']) && isset($_GET['effacer'])) {
        $id = $_GET['effacer'];
        $etablissement->effacerEtablissement($id);
        header('location:index.php?etablissements');
    }
}

/** 
 * si erreur
 */
catch (Exception $e) {
    echo '<div class="catchErreur">';
    require('view/frontend/errorView.php');
    echo '<br />';
    echo 'Détails : ' . $e->getMessage() . '<br />';
    echo '<a href="/?etablissements">Retour à la liste des établissements</a><br />';
    echo '</div>';
}
