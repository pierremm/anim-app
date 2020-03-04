<?php
session_start();

require_once('controller/functions.php');
require_once('controller/animations.php');
require_once('controller/themes.php');
require_once('controller/projets.php');
require_once('controller/partenaires.php');
require_once('controller/etablissements.php');
require_once('controller/lieux.php');
require_once('controller/publics.php');


// Lancement des routes
try {
    if (isset($_SESSION['username'])) {

        if (isset($_GET['accueil'])) {
            require_once('view/frontend/accueil.php');
        } else if (isset($_GET['animations'])) {
            require_once('view/frontend/animations.php');
        } else if (isset($_GET['themes'])) {
            require_once('view/frontend/themes.php');
        } else if (isset($_GET['projets'])) {
            require_once('view/frontend/projets.php');
        } else if (isset($_GET['partenaires'])) {
            require_once('view/frontend/partenaires.php');
        } else if (isset($_GET['etablissements'])) {
            require_once('view/frontend/etablissements.php');
        } else if (isset($_GET['lieux'])) {
            require_once('view/frontend/lieux.php');
        } else if (isset($_GET['publics'])) {
            require_once('view/frontend/publics.php');
        } else if (isset($_GET['synthese'])) {
            require_once('view/frontend/synthese.php');
        } else if (isset($_GET['logout'])) {
            require_once('view/frontend/login.php');
        } else if (isset($_GET['pages'])) {
            require_once('view/frontend/pages.php');
        }
        // Affichage page d'accueil
        else {
            require_once('view/frontend/animations.php');
        }
    } else {
        require_once('view/frontend/login.php');
    }
}

// Si erreur
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    require('view/frontend/errorView.php');
}
