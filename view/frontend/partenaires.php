<?php $title = 'Partenaires'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- PARTENAIRES -->

<?php
$partenaireManager = new PartenaireManager();
$partenaires = $partenaireManager->lireTousPartenaires();
$partenaire = $partenaireManager->lirePartenaire($id);



// Liste des partenaires
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($partenaires as $partenaire) {
        echo $partenaire->getId() . ' ';
        echo ' <a href="?partenaires&modifier=' . $partenaire->getId() . '">';
        echo $partenaire->getNom() . ' ';
        echo '</a>';
        echo $partenaire->getTel() . ' ';
        echo $partenaire->getEmail() . ' ';
        $contact = $partenaire->getContact() . ' ';
        echo $contact;
        echo "<hr/>";
    }
    echo '<a href="/?partenaires&ajouter">Ajouter un établissement</a>';
}

// Formulaire de modification d'un partenaire
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $partenaire->getId()) {
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $partenaire->getId());
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $partenaire->getNom(), $partenaire->getNom());
        $form->divers('<br />');
        $form->label('Email', 'email');
        $form->input('text', 'email', $partenaire->getEmail(), $partenaire->getEmail());
        $form->divers('<br />');
        $form->label('Téléphone', 'tel');
        $form->input('text', 'tel', $partenaire->getTel(), $partenaire->getTel());
        $form->divers('<br />');
        $form->label('Contact', 'contact');
        $form->input('number', 'contact', $partenaire->getContact(), $partenaire->getContact());
        $form->divers('<br />');
        $form->input('submit', 'modifierPartenaire', 'Modifier');
        echo $form->render();
        echo "<hr/>";
        echo '<a href="?partenaires&effacer=' . $partenaire->getId() . '"  onclick="return checkDelete()" >Supprimer ce partenaire</a><br />';
        echo "<hr/>";
        echo '<a href="/?partenaires&ajouter">Ajouter un partenaire</a><br />';
        echo '<a href="/?partenaires">Retour à la liste</a>';
    } else if ($_GET['modifier'] !== $partenaire->getId()) {
        echo 'Il n\'y a aucun partenaire qui correspond.<br />';
        echo '<a href="/?partenaires">Retour à la liste</a>';
    }
}


// Formulaire d'ajout d'un partenaire
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('<br />');
    $form->label('Email', 'email');
    $form->input('text', 'email');
    $form->divers('<br />');
    $form->label('Téléphone', 'tel');
    $form->input('text', 'tel');
    $form->divers('<br />');
    $form->label('Contact', 'contact');
    $form->input('number', 'contact');
    $form->divers('<br />');
    $form->input('submit', 'ajouterPartenaire', 'Ajouter');
    echo $form->render();
    echo "<hr/>";
    echo '<a href="/?partenaires">Retour à la liste</a>';
}

// Supprimer un établissement
if (isset($_GET['effacer']) && $_GET['effacer'] !== $partenaire->getId()) {
    echo 'Il n\'y a aucun partenaire qui correspond.<br />';
    echo '<a href="/?partenaires">Retour à la liste</a>';
}


?>
<!-- FIN PARTENAIRES -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
