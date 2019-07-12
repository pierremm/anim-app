<?php $title = 'Qualités'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- QUALITES -->

<?php
$publicManager = new PubliqManager();
$publics = $publicManager->lireTousPublics();
$public = $publicManager->lirePublic($id);


// Liste des Qualités
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($publics as $public) {
        echo $public->getId() . ' ';
        echo ' <a href="?publics&modifier=' . $public->getId() . '">';
        echo $public->getNom() . ' ';
        echo '</a>';
        echo "<hr/>";
    }
    echo '<a href="/?publics&ajouter">Ajouter un public</a>';
}

// Formulaire de modification d'une public
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $public->getId()) {
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $public->getId());
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $public->getNom(), $public->getNom());
        $form->divers('<br />');
        $form->input('submit', 'modifierPublic', 'Modifier');
        echo $form->render();
        echo "<hr/>";
        echo '<a href="?publics&effacer=' . $public->getId() . '"  onclick="return checkDelete()" >Supprimer ce public</a><br />';
        echo "<hr/>";
        echo '<a href="/?publics&ajouter">Ajouter un public</a><br />';
        echo '<a href="/?publics">Retour à la liste</a>';
    } else if ($_GET['modifier'] !== $public->getId()) {
        echo 'Il n\'y a aucun public qui correspond.<br />';
        echo '<a href="/?publics">Retour à la liste</a>';
    }
}


// Formulaire d'ajout d'une public
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('<br />');
    $form->input('submit', 'ajouterPublic', 'Ajouter');
    echo $form->render();
    echo "<hr/>";
    echo '<a href="/?publics">Retour à la liste</a>';
}

// Supprimer une public
if (isset($_GET['effacer']) && $_GET['effacer'] !== $public->getId()) {
    echo 'Il n\'y a aucun public qui correspond.<br />';
    echo '<a href="/?publics">Retour à la liste</a>';
}


?>
<!-- FIN QUALITES -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
