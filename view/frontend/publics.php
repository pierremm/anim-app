<?php $title = 'Publics'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- PUBLICS -->

<?php
$publicManager = new PublicsManager();
$publics = $publicManager->lireTousPublics();
$public = $publicManager->lirePublic($id);


// Liste des publics
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($publics as $public) {
        echo "<p>";
        echo '<a href="?publics&modifier=' . $public->getId() . '">';
        echo $public->getNom() . ' ';
        echo '</a>';
        echo "</p>";
        echo "<hr/>";
    }
    echo '<p><a class="btn btn-light" role="button" href="/?publics&ajouter"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un public</a></p>';
}

// Formulaire de modification d'un public
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $public->getId()) {
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $public->getId());
        $form->divers('<div class="form-group">');
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $public->getNom(), $public->getNom());
        $form->divers('</div>');        $form->divers('<div class="form-group">');
        $form->input('submit', 'modifierPublic', 'Modifier');
        echo $form->render();
        echo "<hr/>";
        echo '<p><a class="btn btn-light" role="button" href="?publics&effacer=' . $public->getId() . '"  onclick="return checkDelete()" ><i class="fa fa-times"></i>&nbsp;&nbsp;Supprimer ce public</a></p>';
        echo "<hr/>";
        echo '<p><a class="btn btn-light" role="button" href="/?publics"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des publics</a></p>';
    } else if ($_GET['modifier'] !== $public->getId()) {
        echo '<p>Il n\'y a aucun public.</p>';
        echo '<p><a class="btn btn-light" role="button" href="/?publics"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des publics</a></p>';
    }
}


// Formulaire d'ajout d'un public
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->divers('<div class="form-group">');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('</div>');    $form->divers('<div class="form-group">');
    $form->input('submit', 'ajouterPublic', 'Ajouter');
    $form->divers('</div>');    echo $form->render();
    echo "<hr/>";
    echo '<p><a class="btn btn-light" role="button" href="/?publics"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des publics</a></p>';
}

// Supprimer un public
if (isset($_GET['effacer']) && $_GET['effacer'] !== $public->getId()) {
    echo '<p>Il n\'y a aucun public.</p>';
    echo '<p><a class="btn btn-light" role="button" href="/?publics"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des publics</a></p>';
}


?>
<!-- FIN PUBLICS -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
