<?php $title = 'Personnes'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- PERSONNES -->

<?php
$personneManager = new PersonneManager();
$personnes = $personneManager->lireToutesPersonnes();
$personne = $personneManager->lirePersonne($id);

$qualiteManager = new QualiteManager();
$qualites = $qualiteManager->lireToutesQualites();
$qualite = $qualiteManager->lireQualite($id);



echo "<pre>";
//var_dump($qualite->lireToutesQualites());
echo "</pre>";



// Liste des Personnes
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($personnes as $personne) {
        echo $personne->getId() . ' ';
        echo ' <a href="?personnes&modifier=' . $personne->getId() . '">';
        echo $personne->getNom() . ' ';
        echo $personne->getPrenom() . ' ';
        echo '</a>';
        echo $personne->getTel() . ' ';
        echo $personne->getEmail() . ' ';
        $qualite = $personne->getQualite() . ' ';
        echo $qualite;
        echo "<hr/>";
    }
    echo '<a href="/?personnes&ajouter">Ajouter une personne</a>';
}

// Formulaire de modification d'une personne
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $personne->getId()) { 
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $personne->getId());
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $personne->getNom(), $personne->getNom());
        $form->divers('<br />');
        $form->label('Prénom', 'prenom');
        $form->input('text', 'prenom', $personne->getPrenom(), $personne->getPrenom());
        $form->divers('<br />');
        $form->label('Email', 'email');
        $form->input('text', 'email', $personne->getEmail(), $personne->getEmail());
        $form->divers('<br />');
        $form->label('Téléphone', 'tel');
        $form->input('text', 'tel', $personne->getTel(), $personne->getTel());
        $form->divers('<br />');
        $form->label('Qualité', 'qualite');
        // Boucle sur les qualités
        echo '<select>';
        $qualitesSelect = array();
        foreach ($qualites as $quality) {
            $qualiteSelect[$quality->getId()] = $quality->getNom();
            echo '<option value ='.  $quality->getId() .'>'. $quality->getNom() . '</option>';
        }
        //$form->select('qualites', $qualitesSelect, $personne->getQualite());
        //$form->input('number', 'qualite', $personne->getQualite(), $personne->getQualite());
        $form->divers('<br />');
        $form->input('submit', 'modifierPersonne', 'Modifier');
        echo $form->render();
        echo "<hr/>";
        echo '<a href="?personnes&effacer=' . $personne->getId() . '"  onclick="return checkDelete()" >Supprimer cette personne</a><br />';
        echo "<hr/>";
        echo '<a href="/?personnes&ajouter">Ajouter une personne</a><br />';
        echo '<a href="/?personnes">Retour à la liste</a>';
    } else if ($_GET['modifier'] !== $personne->getId()) {
        echo 'Il n\'y a personne qui correspond.<br />';
        echo '<a href="/?personnes">Retour à la liste</a>';
    }
}


// Formulaire d'ajout d'une personne
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('<br />');
    $form->label('Prénom', 'prenom');
    $form->input('text', 'prenom');
    $form->divers('<br />');
    $form->label('Email', 'email');
    $form->input('text', 'email');
    $form->divers('<br />');
    $form->label('Téléphone', 'tel');
    $form->input('text', 'tel');
    $form->divers('<br />');
    $form->label('Qualité', 'qualite');
    $form->input('number', 'qualite');
    $form->divers('<br />');
    $form->input('submit', 'ajouterPersonne', 'Ajouter');
    echo $form->render();
    echo "<hr/>";
    echo '<a href="/?personnes">Retour à la liste</a>';
}

// Supprimer une personne
if (isset($_GET['effacer']) && $_GET['effacer'] !== $personne->getId()) {
    echo 'Il n\'y a personne qui correspond.<br />';
    echo '<a href="/?personnes">Retour à la liste</a>';
}


?>
<!-- FIN PERSONNES -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
