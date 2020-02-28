<?php $title = 'Lieux'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- LIEUX -->

<?php
$lieuManager = new LieuManager();
$lieux = $lieuManager->lireTousLieux();
$lieu = $lieuManager->lireLieu($id);



// Liste des Lieux
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($lieux as $lieu) {
        echo $lieu->getId() . ' ';
        echo ' <a href="?lieux&modifier=' . $lieu->getId() . '">';
        echo $lieu->getNom();
        echo '</a> ';
        echo $lieu->getAdresse() . ' ';
        echo $lieu->getCp() . ' ';
        echo $lieu->getVille() . ' ';
        $contact = $lieu->getContact() . ' ';
        echo $contact;
        echo "<hr/>";
    }
    echo '<a href="/?lieux&ajouter">Ajouter un lieu</a>';
}

// Formulaire de modification d'un lieu
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $lieu->getId()) {
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $lieu->getId());
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $lieu->getNom(), $lieu->getNom());
        $form->divers('<br />');
        $form->label('Adresse', 'adresse');
        $form->input('text', 'adresse', $lieu->getAdresse(), $lieu->getAdresse());
        $form->divers('<br />');
        $form->label('Code Postal', 'cp');
        $form->input('text', 'cp', $lieu->getCp(), $lieu->getCp());
        $form->divers('<br />');
        $form->label('Ville', 'ville');
        $form->input('text', 'ville', $lieu->getVille(), $lieu->getVille());
        $form->divers('<br />');
        $form->label('Contact', 'contact');
        $form->input('number', 'contact', $lieu->getContact(), $lieu->getContact());
        $form->divers('<br />');
        $form->input('submit', 'modifierLieu', 'Modifier');
        echo $form->render();
        echo "<hr/>";
        echo '<a href="?lieux&effacer=' . $lieu->getId() . '"  onclick="return checkDelete()" >Supprimer ce lieu</a><br />';
        echo "<hr/>";
        echo '<a href="/?lieux&ajouter">Ajouter un lieu</a><br />';
        echo '<a href="/?lieux">Retour à la liste</a>';
    } else if ($_GET['modifier'] !== $lieu->getId()) {
        echo 'Il n\'y a lieu qui correspond.<br />';
        echo '<a href="/?lieux">Retour à la liste</a>';
    }
}


// Formulaire d'ajout d'un lieu
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('<br />');
    $form->label('Adresse', 'adresse');
    $form->input('text', 'adresse');
    $form->divers('<br />');
    $form->label('Code Postal', 'cp');
    $form->input('text', 'cp');
    $form->divers('<br />');
    $form->label('Ville', 'ville');
    $form->input('text', 'ville');
    $form->divers('<br />');
    $form->label('Contact', 'contact');
    $form->input('number', 'contact');
    $form->divers('<br />');
    $form->input('submit', 'ajouterLieu', 'Ajouter');
    echo $form->render();
    echo "<hr/>";
    echo '<a href="/?lieux">Retour à la liste</a>';
}

// Supprimer un lieu
if (isset($_GET['effacer']) && $_GET['effacer'] !== $lieu->getId()) {
    echo 'Il n\'y a aucun lieu qui correspond.<br />';
    echo '<a href="/?lieux">Retour à la liste</a>';
}


?>
<!-- FIN LIEUX -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
