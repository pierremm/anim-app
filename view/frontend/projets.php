<?php $title = 'Projets'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- QUALITES -->

<?php
$projetManager = new ProjetManager();
$projets = $projetManager->lireTousProjets();
$projet = $projetManager->lireProjet($id);


// Liste des projets
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($projets as $projet) {
        echo $projet->getId() . ' ';
        echo ' <a href="?projets&modifier=' . $projet->getId() . '">';
        echo $projet->getNom() . ' ';
        echo '</a>';
        echo "<hr/>";
    }
    echo '<a href="/?projets&ajouter">Ajouter un projet</a>';
}

// Formulaire de modification d'un projet
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $projet->getId()) {
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $projet->getId());
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $projet->getNom(), $projet->getNom());
        $form->divers('<br />');
        $form->input('submit', 'modifierProjet', 'Modifier');
        echo $form->render();
        echo "<hr/>";
        echo '<a href="?projets&effacer=' . $projet->getId() . '"  onclick="return checkDelete()" >Supprimer ce projet</a><br />';
        echo "<hr/>";
        echo '<a href="/?projets&ajouter">Ajouter un projet</a><br />';
        echo '<a href="/?projets">Retour à la liste</a>';
    } else if ($_GET['modifier'] !== $projet->getId()) {
        echo 'Il n\'y a aucun projet qui correspond.<br />';
        echo '<a href="/?projets">Retour à la liste</a>';
    }
}


// Formulaire d'ajout d'un projet
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('<br />');
    $form->input('submit', 'ajouterProjet', 'Ajouter');
    echo $form->render();
    echo "<hr/>";
    echo '<a href="/?projets">Retour à la liste</a>';
}

// Supprimer un projet
if (isset($_GET['effacer']) && $_GET['effacer'] !== $projet->getId()) {
    echo 'Il n\'y a aucun projet qui correspond.<br />';
    echo '<a href="/?projets">Retour à la liste</a>';
}


?>
<!-- FIN QUALITES -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
