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
        echo "<p>";
        echo '<a href="?partenaires&modifier=' . $partenaire->getId() . '">';
        echo $partenaire->getNom() . ' ';
        echo '</a>';
        echo $partenaire->getTel() . ' ';
        echo $partenaire->getEmail() . ' ';
        $contact = $partenaire->getContact() . ' ';
        echo $contact;
        echo "</p>";
        echo "<hr/>";
    }
    echo '<p><a class="btn btn-light" role="button" href="/?partenaires&ajouter"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un partenaire</a></p>';
}

// Formulaire de modification d'un partenaire
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $partenaire->getId()) {
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $partenaire->getId());
        $form->divers('<div class="form-group">');
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $partenaire->getNom(), $partenaire->getNom());
        $form->divers('</div>');        $form->divers('<div class="form-group">');
        $form->label('Email', 'email');
        $form->input('text', 'email', $partenaire->getEmail(), $partenaire->getEmail());
        $form->divers('</div>');        $form->divers('<div class="form-group">');
        $form->label('Téléphone', 'tel');
        $form->input('text', 'tel', $partenaire->getTel(), $partenaire->getTel());
        $form->divers('</div>');        $form->divers('<div class="form-group">');
        $form->label('Contact', 'contact');
        $form->input('text', 'contact', $partenaire->getContact(), $partenaire->getContact());
        $form->divers('</div>');        $form->divers('<div class="form-group">');
        $form->input('submit', 'modifierPartenaire', 'Modifier');
        $form->divers('</div>');        echo $form->render();
        echo "<hr/>";
        echo '<p><a class="btn btn-light" role="button" href="?partenaires&effacer=' . $partenaire->getId() . '"  onclick="return checkDelete()" ><i class="fa fa-times"></i>&nbsp;&nbsp;Supprimer ce partenaire</a></p>';
        echo "<hr/>";
        echo '<p><a class="btn btn-light" role="button" href="/?partenaires"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des partenaires</a></p>';
    } else if ($_GET['modifier'] !== $partenaire->getId()) {
        echo '<p>Il n\'y a aucun partenaire.</p>';
        echo '<p><a class="btn btn-light" role="button" href="/?partenaires"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des partenaires</a></p>';
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
    echo '<p><a class="btn btn-light" role="button" href="/?partenaires"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des partenaires</a></p>';
}

// Supprimer un établissement
if (isset($_GET['effacer']) && $_GET['effacer'] !== $partenaire->getId()) {
    echo '<p>Il n\'y a aucun partenaire.</p>';
    echo '<p><a class="btn btn-light" role="button" href="/?partenaires"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des partenaires</a></p>';
}


?>
<!-- FIN PARTENAIRES -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
