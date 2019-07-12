<?php
require_once('controller/functions.php');
require_once('controller/personnes.php');
require_once('controller/qualites.php');
require_once('controller/lieux.php');


// Lancement des routes
try {
    // Affichages
    if (isset($_GET['animation'])) {
        require_once('view/frontend/animation.php');
    }
    else if (isset($_GET['personnes'])) {
        require_once('view/frontend/personnes.php');
    }
    else if (isset($_GET['qualites'])) {
        require_once('view/frontend/qualites.php');
    }
    else if (isset($_GET['lieux'])) {
        require_once('view/frontend/lieux.php');
    }
    else if (isset($_GET['etablissements'])) {
        require_once('view/frontend/etablissements.php');
    }
    else if (isset($_GET['partenaires'])) {
        require_once('view/frontend/partenaires.php');
    }
    else if (isset($_GET['themes'])) {
        require_once('view/frontend/themes.php');
    }
    else if (isset($_GET['projets'])) {
        require_once('view/frontend/projets.php');
    }
    else if (isset($_GET['publics'])) {
        require_once('view/frontend/publics.php');
    }
    // Affichage page d'accueil
    else {
        require_once('view/frontend/accueil.php');
    }
}

// Si erreur
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    require('view/frontend/errorView.php');
}
