<?php $title = 'Thèmes'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- THEMES -->

<?php
$themeManager = new ThemeManager();
$themes = $themeManager->lireTousThemes();
$theme = $themeManager->lireTheme($id);


// Liste des thèmes
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($themes as $theme) {
        echo "<p>";
        echo '<a href="?themes&modifier=' . $theme->getId() . '">';
        echo $theme->getNom() . ' ';
        echo '</a>';
        echo "</p>";
        echo "<hr/>";
    }
    echo '<p><a class="btn btn-light" role="button" href="/?themes&ajouter"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un thème</a></p>';
}

// Formulaire de modification d'un thème
// Si il n'y a l'identifiant
if (isset($_GET['modifier'])) {
    // Si il n'y a pas d'identifiant valable
    if (!empty($_GET['modifier'])) {
        // Si il y a un identifiant valable
    if ($_GET['modifier'] == $theme->getId()) {
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $theme->getId());
        $form->divers('<div class="form-group">');
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $theme->getNom(), $theme->getNom());
        $form->divers('</div>');
        $form->divers('<div class="form-group">');
        $form->input('submit', 'modifierTheme', 'Modifier');
        $form->divers('</div>');        echo $form->render();
        echo "<hr/>";
        echo '<p><a class="btn btn-light" role="button" href="?themes&effacer=' . $theme->getId() . '"  onclick="return checkDelete()" ><i class="fa fa-times"></i>&nbsp;&nbsp;Supprimer ce thème</a></p>';
        echo "<hr/>";
        echo '<p><a class="btn btn-light" role="button" href="/?themes"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des thèmes</a></p>';
    }
    // Si il n'y a pas d'identifiant valable
    else if ($_GET['modifier'] !== $theme->getId()) {
        echo '<p>Il n\'y a aucun thème qui corresponde.</p>';
        echo '<p><a class="btn btn-light" role="button" href="/?themes"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des thèmes</a></p>';
    }
    // Si il n'y a pas d'identifiant indiqué
} else {
    echo '<p>Il n\'y a pas de thème précisé.</p>';
    echo '<p><a class="btn btn-light" role="button" href="/?themes"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des thèmes</a></p>';
}
}


// Formulaire d'ajout d'un thème
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->divers('<div class="form-group">');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('</div>');    $form->divers('<div class="form-group">');
    $form->input('submit', 'ajouterTheme', 'Ajouter');
    $form->divers('</div>');    echo $form->render();
    echo "<hr/>";
    echo '<p><a class="btn btn-light" role="button" href="/?themes"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des thèmes</a></p>';
}

// Supprimer une theme
if (isset($_GET['effacer']) && $_GET['effacer'] !== $theme->getId()) {
    echo '<p>Il n\'y a aucun thème.</p>';
    echo '<p><a class="btn btn-light" role="button" href="/?themes"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des thèmes</a></p>';
}


?>
<!-- FIN THEMES -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
