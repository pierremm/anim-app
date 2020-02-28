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
        // Boucle qualités
        $qualitesSelect = array();
        foreach ($qualites as $quality) {
            $qualiteSelect[$quality->getId()] = $quality->getNom();
            if ($quality->getId() == $personne->getQualite()) {
                echo  $quality->getNom();
            }
        }
        echo "<hr/>";
    }
    echo '<a href="/?personnes&ajouter">Ajouter une personne</a>';
}

// Formulaire de modification d'une personne
if (isset($_GET['modifier'])) {
    if ($_GET['modifier'] == $personne->getId()) {
        ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $personne->getId() ?>" placeholder="<?php echo $personne->getId() ?>" /><br />
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="<?php echo $personne->getNom() ?>" placeholder="<?php echo $personne->getNom() ?>" /><br />
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="<?php echo $personne->getPrenom() ?>" placeholder="<?php $personne->getPrenom() ?>" /><br />
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $personne->getEmail() ?>" placeholder="<?php echo $personne->getEmail() ?>" /><br />
            <label for="tel">Téléphone</label>
            <input type="text" name="tel" value="<?php echo $personne->getTel() ?>" placeholder="<?php echo $personne->getTel() ?>" /><br />
            <select name="qualite">
                <?php
                // Boucle sur les qualités
                $qualitesSelect = array();
                foreach ($qualites as $quality) {
                    $qualiteSelect[$quality->getId()] = $quality->getNom();
                    if ($quality->getId() == $personne->getQualite()) {
                        echo '<option value="' .  $quality->getId() . '" selected> ' . $quality->getNom() . '</option>';
                    } else
                        echo '<option value="' .  $quality->getId() . '">' . $quality->getNom() . '</option>';
                }
            ?>
        </select><br />
        <input type="submit" name="modifierPersonne" value="Modifier" />
        </form>
        <?php
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
?>

<form action="" method="POST">
            <input type="hidden" name="id" value="" placeholder="" /><br />
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="" placeholder="" /><br />
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="" placeholder="" /><br />
            <label for="email">Email</label>
            <input type="email" name="email" value="" placeholder="" /><br />
            <label for="tel">Téléphone</label>
            <input type="text" name="tel" value="" placeholder="" /><br />
            <select name="qualite">
                <?php
                // Boucle sur les qualités
                $qualitesSelect = array();
                foreach ($qualites as $quality) {
                    $qualiteSelect[$quality->getId()] = $quality->getNom();
                    echo '<option value="' .  $quality->getId() . '">' . $quality->getNom() . '</option>';
                }
            ?>
        </select><br />
        <input type="submit" name="ajouterPersonne" value="Modifier" />
        </form>
        <?php
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
