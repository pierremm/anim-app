<?php $title = 'Qualités'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- QUALITES -->

<?php
$qualiteManager = new QualiteManager();
$qualites = $qualiteManager->lireToutesQualites();
$qualite = $qualiteManager->lireQualite($id);


// Liste des Qualités
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($qualites as $qualite) {
        echo $qualite->getId() . ' ';
        echo ' <a href="?qualites&modifier=' . $qualite->getId() . '">';
        echo $qualite->getNom() . ' ';
        echo '</a>';
        echo "<hr/>";
    }
    echo '<a href="/?qualites&ajouter">Ajouter une qualité</a>';
}

// Formulaire de modification d'une qualite
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $qualite->getId()) {
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $qualite->getId());
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $qualite->getNom(), $qualite->getNom());
        $form->divers('<br />');
        $form->input('submit', 'modifierQualite', 'Modifier');
        echo $form->render();
        echo "<hr/>";
        echo '<a href="?qualites&effacer=' . $qualite->getId() . '"  onclick="return checkDelete()" >Supprimer cette qualité</a><br />';
        echo "<hr/>";
        echo '<a href="/?qualites&ajouter">Ajouter une qualité</a><br />';
        echo '<a href="/?qualites">Retour à la liste</a>';
    } else if ($_GET['modifier'] !== $qualite->getId()) {
        echo 'Il n\'y a aucune qualité qui correspond.<br />';
        echo '<a href="/?qualites">Retour à la liste</a>';
    }
}


// Formulaire d'ajout d'une qualite
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('<br />');
    $form->input('submit', 'ajouterQualite', 'Ajouter');
    echo $form->render();
    echo "<hr/>";
    echo '<a href="/?qualites">Retour à la liste</a>';
}

// Supprimer une qualite
if (isset($_GET['effacer']) && $_GET['effacer'] !== $qualite->getId()) {
    echo 'Il n\'y a aucune qualité qui correspond.<br />';
    echo '<a href="/?qualites">Retour à la liste</a>';
}


?>
<!-- FIN QUALITES -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
