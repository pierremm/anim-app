<?php $title = 'Thèmes'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- QUALITES -->

<?php
$themeManager = new ThemeManager();
$themes = $themeManager->lireTousThemes();
$theme = $themeManager->lireTheme($id);


// Liste des thèmes
if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {
    foreach ($themes as $theme) {
        echo $theme->getId() . ' ';
        echo ' <a href="?themes&modifier=' . $theme->getId() . '">';
        echo $theme->getNom() . ' ';
        echo '</a>';
        echo "<hr/>";
    }
    echo '<a href="/?themes&ajouter">Ajouter un thème</a>';
}

// Formulaire de modification d'un thème
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $theme->getId()) {
        $form = new Formulaire('', 'POST');
        $form->input('hidden', 'id', $theme->getId());
        $form->label('Nom', 'nom');
        $form->input('text', 'nom', $theme->getNom(), $theme->getNom());
        $form->divers('<br />');
        $form->input('submit', 'modifierTheme', 'Modifier');
        echo $form->render();
        echo "<hr/>";
        echo '<a href="?themes&effacer=' . $theme->getId() . '"  onclick="return checkDelete()" >Supprimer ce thème</a><br />';
        echo "<hr/>";
        echo '<a href="/?themes&ajouter">Ajouter un thème</a><br />';
        echo '<a href="/?themes">Retour à la liste</a>';
    } else if ($_GET['modifier'] !== $theme->getId()) {
        echo 'Il n\'y a aucun thème qui correspond.<br />';
        echo '<a href="/?themes">Retour à la liste</a>';
    }
}


// Formulaire d'ajout d'une theme
if (isset($_GET['ajouter'])) {
    $form = new Formulaire('', 'POST');
    $form->label('Nom', 'nom');
    $form->input('text', 'nom');
    $form->divers('<br />');
    $form->input('submit', 'ajouterTheme', 'Ajouter');
    echo $form->render();
    echo "<hr/>";
    echo '<a href="/?themes">Retour à la liste</a>';
}

// Supprimer une theme
if (isset($_GET['effacer']) && $_GET['effacer'] !== $theme->getId()) {
    echo 'Il n\'y a aucun thème qui correspond.<br />';
    echo '<a href="/?themes">Retour à la liste</a>';
}


?>
<!-- FIN QUALITES -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
