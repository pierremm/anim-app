<?php $title = 'Etablissements'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- ETABLISSEMENTS -->

<?php
$etablissementManager = new EtablissementManager();
$etablissements = $etablissementManager->lireTousEtablissements();
$etablissement = $etablissementManager->lireEtablissement($id);



// Liste des établissements
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($etablissements as $etablissement) {
        echo "<p>";
        echo '<a href="?etablissements&modifier=' . $etablissement->getId() . '">';
        echo $etablissement->getNom() . ' ';
        echo '</a>';
        echo $etablissement->getTel() . ' ';
        echo $etablissement->getEmail() . ' ';
        $contact = $etablissement->getContact() . ' ';
        echo $contact;
        echo "</p>";
        echo "<hr/>";
    }
    echo '<p><a class="btn btn-light" role="button" href="/?etablissements&ajouter"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un établissement</a></p>';
}

// Formulaire de modification d'un établissement
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $etablissement->getId()) {
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $etablissement->getId());
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $etablissement->getNom(), $etablissement->getNom());
        $form->divers('<br />');
        $form->label('Email', 'email');
        $form->input('text', 'email', $etablissement->getEmail(), $etablissement->getEmail());
        $form->divers('<br />');
        $form->label('Téléphone', 'tel');
        $form->input('text', 'tel', $etablissement->getTel(), $etablissement->getTel());
        $form->divers('<br />');
        $form->label('Contact', 'contact');
        $form->input('number', 'contact', $etablissement->getContact(), $etablissement->getContact());
        $form->divers('<br />');
        $form->input('submit', 'modifierEtablissement', 'Modifier');
        echo $form->render();
        echo "<hr/>";
        echo '<p><a class="btn btn-light" role="button" href="?etablissements&effacer=' . $etablissement->getId() . '"  onclick="return checkDelete()" ><i class="fa fa-times"></i>&nbsp;&nbsp;Supprimer cet établissement</a></p>';
        echo "<hr/>";
        echo '<p><a class="btn btn-light" role="button" href="/?etablissements"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des établissements</a></p>';
    } else if ($_GET['modifier'] !== $etablissement->getId()) {
        echo '<p>Il n\'y a aucun établissement.</p>';
        echo '<p><a class="btn btn-light" role="button" href="/?etablissements"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des établissements</a></p>';
    }
}


// Formulaire d'ajout d'un établissement
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
    $form->input('submit', 'ajouterEtablissement', 'Ajouter');
    echo $form->render();
    echo "<hr/>";
    echo '<p><a class="btn btn-light" role="button" href="/?etablissements"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des établissements</a></p>';
}

// Supprimer un établissement
if (isset($_GET['effacer']) && $_GET['effacer'] !== $etablissement->getId()) {
    echo '<p>Il n\'y a aucun établissement.</p>';
    echo '<p><a class="btn btn-light" role="button" href="/?etablissements"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des établissements</a></p>';
}


?>
<!-- FIN ETABLISSEMENTS -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
