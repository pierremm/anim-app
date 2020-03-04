<?php $title = 'Projets'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- PROJETS -->

<?php
$projetManager = new ProjetManager();
$projets = $projetManager->lireTousProjets();
$projet = $projetManager->lireProjet($id);


// Liste des projets
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($projets as $projet) {
        echo "<p>";
        echo '<a href="?projets&modifier=' . $projet->getId() . '">';
        echo $projet->getNom() . ' ';
        echo '</a>';
        echo "</p>";
        echo "<hr/>";
    }
    echo '<p><a class="btn btn-light" role="button" href="/?projets&ajouter"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un projet</a></p>';
}

// Formulaire de modification d'un projet

// Si il n'y a l'identifiant
if (isset($_GET['modifier'])) {
    // Si il n'y a pas d'identifiant valable
    if (!empty($_GET['modifier'])) {
        // Si il y a un identifiant valable
        if ($_GET['modifier'] == $projet->getId()) {
            $form = new Formulaire('', 'POST');
            $form->input('hidden', 'id', $projet->getId());
            $form->divers('<div class="form-group">');
            $form->label('Nom', 'nom');
            $form->input('text', 'nom', $projet->getNom(), $projet->getNom());
            $form->divers('</div>');
            $form->divers('<div class="form-group">');
            $form->input('submit', 'modifierProjet', 'Modifier');
            $form->divers('</div>');
            echo $form->render();
            echo "<hr/>";
            echo '<p><a class="btn btn-light" role="button" href="?projets&effacer=' . $projet->getId() . '"  onclick="return checkDelete()" ><i class="fa fa-times"></i>&nbsp;&nbsp;Supprimer ce projet</a></p>';
            echo "<hr/>";
            echo '<p><a class="btn btn-light" role="button" href="/?projets"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des projets</a></p>';
        } 
        // Si il n'y a pas d'identifiant valable
        else if ($_GET['modifier'] !== $projet->getId()) {
            echo '<p>Il n\'y a aucun projet qui corresponde.</p>';
            echo '<p><a class="btn btn-light" role="button" href="/?projets"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des projets</a></p>';
        }
        // Si il n'y a pas d'identifiant indiqué
    } else {
        echo '<p>Il n\'y a pas de projet précisé.</p>';
        echo '<p><a class="btn btn-light" role="button" href="/?projets"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des projets</a></p>';
    }
}


// Formulaire d'ajout d'un projet
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->divers('<div class="form-group">');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('</div>');
    $form->divers('<div class="form-group">');
    $form->input('submit', 'ajouterProjet', 'Ajouter');
    $form->divers('</div>');
    echo $form->render();
    echo "<hr/>";
    echo '<p><a class="btn btn-light" role="button" href="/?projets"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des projets</a></p>';
}

// Supprimer un projet
if (isset($_GET['effacer']) && $_GET['effacer'] !== $projet->getId()) {
    echo '<p>Il n\'y a aucun projet.</p>';
    echo '<p><a class="btn btn-light" role="button" href="/?projets"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des projets</a></p>';
}


?>
<!-- FIN PROJETS -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
