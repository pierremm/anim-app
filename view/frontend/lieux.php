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
        echo "<p>";
        echo '<a href="?lieux&modifier=' . $lieu->getId() . '">';
        echo $lieu->getNom();
        echo '</a> ';
        echo $lieu->getAdresse() . ' ';
        echo $lieu->getCp() . ' ';
        echo $lieu->getVille() . ' ';
        $contact = $lieu->getContact() . ' ';
        echo $contact;
        echo "</p>";
        echo "<hr/>";
    }
    echo '<p><a class="btn btn-light" role="button" href="/?lieux&ajouter"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un lieu</a></p>';
}

// Formulaire de modification d'un lieu

// Si il n'y a l'identifiant
if (isset($_GET['modifier'])) {
    // Si il n'y a pas d'identifiant valable
    if (!empty($_GET['modifier'])) {
        // Si il y a un identifiant valable
        if ($_GET['modifier'] == $lieu->getId()) {
            $form = new Formulaire('', 'POST');
            $form->input('hidden', 'id', $lieu->getId());
            $form->divers('<div class="form-group">');
            $form->label('Nom', 'nom');
            $form->input('text', 'nom', $lieu->getNom(), $lieu->getNom());
            $form->divers('</div>');
            $form->divers('<div class="form-group">');
            $form->label('Adresse', 'adresse');
            $form->input('text', 'adresse', $lieu->getAdresse(), $lieu->getAdresse());
            $form->divers('</div>');
            $form->divers('<div class="form-group">');
            $form->label('Code Postal', 'cp');
            $form->input('text', 'cp', $lieu->getCp(), $lieu->getCp());
            $form->divers('</div>');
            $form->divers('<div class="form-group">');
            $form->label('Ville', 'ville');
            $form->input('text', 'ville', $lieu->getVille(), $lieu->getVille());
            $form->divers('</div>');
            $form->divers('<div class="form-group">');
            $form->label('Contact', 'contact');
            $form->input('number', 'contact', $lieu->getContact(), $lieu->getContact());
            $form->divers('</div>');
            $form->divers('<div class="form-group">');
            $form->input('submit', 'modifierLieu', 'Modifier');
            echo $form->render();
            echo "<hr/>";
            echo '<p><a class="btn btn-light" role="button" href="?lieux&effacer=' . $lieu->getId() . '"  onclick="return checkDelete()"><i class="fa fa-times"></i>&nbsp;&nbsp;Supprimer ce lieu</a></p>';
            echo "<hr/>";
            echo '<p><a class="btn btn-light" role="button" href="/?lieux"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des lieux</a></p>';
        }
        // Si il n'y a pas d'identifiant valable
        else if ($_GET['modifier'] !== $lieu->getId()) {
            echo '<p>Il n\'y a aucun lieu qui corresponde.</p>';
            echo '<p><a class="btn btn-light" role="button" href="/?lieux"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des lieux</a></p>';
        }
        // Si il n'y a pas d'identifiant indiqué
    } else {
        echo '<p>Il n\'y a pas de lieu précisé.</p>';
        echo '<p><a class="btn btn-light" role="button" href="/?lieux"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des lieux</a></p>';
    }
}


// Formulaire d'ajout d'un lieu
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->divers('<div class="form-group">');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('</div>');
    $form->divers('<div class="form-group">');
    $form->label('Adresse', 'adresse');
    $form->input('text', 'adresse');
    $form->divers('</div>');
    $form->divers('<div class="form-group">');
    $form->label('Code Postal', 'cp');
    $form->input('text', 'cp');
    $form->divers('</div>');
    $form->divers('<div class="form-group">');
    $form->label('Ville', 'ville');
    $form->input('text', 'ville');
    $form->divers('</div>');
    $form->divers('<div class="form-group">');
    $form->label('Contact', 'contact');
    $form->input('number', 'contact');
    $form->divers('</div>');
    $form->divers('<div class="form-group">');
    $form->input('submit', 'ajouterLieu', 'Ajouter');
    echo $form->render();
    $form->divers('</div>');
    echo "<hr/>";
    echo '<p><a class="btn btn-light" role="button" href="/?lieux"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des lieux</a></p>';
}

// Supprimer un lieu
if (isset($_GET['effacer']) && $_GET['effacer'] !== $lieu->getId()) {
    echo 'Il n\'y a aucun lieu.<br />';
    echo '<p><a class="btn btn-light" role="button" href="/?lieux"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des lieux</a></p>';
}


?>
<!-- FIN LIEUX -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
