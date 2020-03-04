<?php $title = 'Animations'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- Page des animations -->

<?php
$animationManager = new AnimationManager();
$animations = $animationManager->lireToutesAnimations();
$animation = $animationManager->lireAnimation($id);
$themeManager = new ThemeManager();
$themes = $themeManager->lireTousThemes();
$theme = $themeManager->lireTheme($id);
$projetManager = new ProjetManager();
$projets = $projetManager->lireTousProjets();
$projet = $projetManager->lireProjet($id);
$partenaireManager = new PartenaireManager();
$partenaires = $partenaireManager->lireTousPartenaires();
$partenaire = $partenaireManager->lirePartenaire($id);
$etablissementManager = new EtablissementManager();
$etablissements = $etablissementManager->lireTousEtablissements();
$etablissement = $etablissementManager->lireEtablissement($id);
$lieuManager = new LieuManager();
$lieux = $lieuManager->lireTousLieux();
$lieu = $lieuManager->lireLieu($id);
$publicManager = new PublicsManager();
$publics = $publicManager->lireTousPublics();
$public = $publicManager->lirePublic($id);

$demiJournees = 0;
$demiJournees = $animation->getMatthias() + $animation->getNoelie() + $animation->getBenevoles();



// Liste des animations

if (!isset($_GET['modifier']) && !isset($_GET['ajouter'])  && !isset($_GET['effacer'])) {

    // Appel de la fonction dans le manager
    $listeToutesAnimations = $animationManager->listeToutesAnimations();

    echo '<hr />';
    echo '<p><a class="btn btn-light" role="button" href="/?animations&ajouter"><i class="fa fa-plus"></i>&nbsp;&nbsp;Créer une animation</a></p>';
}


// Formulaire de modification d'une animation

// Si il n'y a l'identifiant
if (isset($_GET['modifier'])) {
    // Si il n'y a pas d'identifiant valable
    if (!empty($_GET['modifier'])) {
        // Si il y a un identifiant valable
        if ($_GET['modifier'] == $animation->getId()) {
?>
            <form action="" method="POST">
                <input type="hidden" name="id" value=<?php echo $animation->getId() ?>>

                <fieldset>
                    <legend>Animation</legend>
                    <div class="row">
                        <div class="col-6 col-sm-4 form-group">
                            <label for="date">Date*</label>
                            <input type="date" class='form-control' name="dateAnim" id="dateAnim" required value="<?php echo $animation->getDateAnim() ?>"> <small>(année/mois/jour)</small>
                        </div>
                        <div class="col-sm-8">
                            <label for="nom">Nom* </label>
                            <input type="text" class='form-control' name="nom" id="nom" required value="<?php echo $animation->getNom() ?> ">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Détails</legend>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="theme">Thème</label>
                            <select class='form-control' name="theme">
                                <?php foreach ($themes as $theme) : ?>
                                    <option value=<?= $theme->getId() ?> <?php if ($theme->getId() == $animation->getTheme()) echo " selected" ?>>
                                        <?= $theme->getNom() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="projet">Projet</label>
                            <select class='form-control' name="projet">
                                <?php foreach ($projets as $projet) : ?>
                                    <option value=<?= $projet->getId() ?> <?php if ($projet->getId() == $animation->getProjet()) echo " selected" ?>>
                                        <?= $projet->getNom() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="partenaires">Partenaires</label>
                            <select class='form-control' name="partenaires">
                                <?php foreach ($partenaires as $partenaire) : ?>
                                    <option value=<?= $partenaire->getId() ?> <?php if ($partenaire->getId() == $animation->getPartenaires()) echo " selected" ?>>
                                        <?= $partenaire->getNom() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="etablissement">Etablissement</label>
                            <select class='form-control' name="etablissement">
                                <?php foreach ($etablissements as $etablissement) : ?>
                                    <option value=<?= $etablissement->getId() ?> <?php if ($etablissement->getId() == $animation->getEtablissement()) echo " selected" ?>>
                                        <?= $etablissement->getNom() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="lieu">Lieu</label>
                            <select class='form-control' name="lieu">
                                <?php foreach ($lieux as $lieu) : ?>
                                    <option value=<?= $lieu->getId() ?> <?php if ($lieu->getId() == $animation->getLieu()) echo " selected" ?>>
                                        <?= $lieu->getNom() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Public</legend>
                    <div class="row">
                        <div class="col-8 col-md-4 form-group">
                            <label for="public">Public</label>
                            <select class='form-control' name="public">
                                <?php foreach ($publics as $public) : ?>
                                    <option value=<?= $public->getId() ?> <?php if ($public->getId() == $animation->getPublic()) echo " selected" ?>>
                                        <?= $public->getNom() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="effectif">Effectif</label>
                            <input type="number" class='form-control' name="effectif" id="effectif" value=<?php echo $animation->getEffectif() ?>>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Animateurs <small>(demi-journées)</small></legend>
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="matthias">Matthias</label>
                            <input type="text" class='form-control' name="matthias" value="<?php echo $animation->getMatthias() ?>">
                        </div>
                        <div class="col-4 form-group">
                            <label for="noelie">Noëlie</label>
                            <input type="text" class='form-control' name="noelie" value="<?php echo $animation->getNoelie() ?>">
                        </div>
                        <div class="col-4 form-group">
                            <label for="benevoles">Bénévoles</label>
                            <input type="text" class='form-control' name="benevoles" value="<?php echo $animation->getBenevoles() ?>">
                        </div>
                    </div>
                    <input type="hidden" name="demiJournees" id="demiJournees" value=<?php echo $demiJournees ?>>
                </fieldset>

                <fieldset>
                    <legend>Notes</legend>
                    <div class="form-group">
                        <textarea class='form-control' name="notes" placeholder="<?php echo $animation->getNotes() ?>"><?php echo $animation->getNotes() ?></textarea>
                    </div>
                </fieldset>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="modifierAnimation" value="Modifier" />
                </div>
            </form>
            <hr />
            <p><a class="btn btn-light" role="button" href="?animations&effacer=<?php echo $animation->getId() ?>" onclick="return checkDelete()"><i class="fa fa-times"></i>&nbsp;&nbsp;Supprimer cette animation</a></p>
            <hr />
            <p><a class="btn btn-light" role="button" href="/?animations"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des animations</a></p>
    <?php

        }
        // Si il n'y a pas d'identifiant valable
        else if ($_GET['modifier'] !== $animation->getId() || empty($_GET['modifier'])) {
            echo '<p>Il n\'y a aucune animation qui corresponde.</p>';
            echo '<p> <a class="btn btn-light" role="button" href="/?animations"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des animations</a></p>';
        }
    }
    // Si il n'y a pas d'identifiant indiqué
    else {
        echo '<p>Il n\'y a pas d\'animation précisée.</p>';
        echo '<p> <a class="btn btn-light" role="button" href="/?animations"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des animations</a></p>';
    }
}

// Formulaire de création d'une animation

// Vérification de la présence de la variable
if (isset($_GET['ajouter'])) {
    ?>
    <form action="" method="POST">
        <input type="hidden" name="id">
        <fieldset>
            <legend>Animation</legend>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 form-group">
                    <label for="date">Date*</label>
                    <input type="date" class='form-control' name="dateAnim" id="dateAnim" required> <small>(année/mois/jour)</small>
                </div>
                <div class="col-sm-8 form-group">
                    <label for="nom">Nom* </label>
                    <input type="text" class='form-control' name="nom" id="nom" required>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Détails</legend>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="theme">Thème</label>
                    <select class='form-control' name="theme">
                        <?php foreach ($themes as $theme) : ?>
                            <option value=<?= $theme->getId() ?>>
                                <?= $theme->getNom() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label for="projet">Projet</label>
                    <select class='form-control' name="projet">
                        <?php foreach ($projets as $projet) : ?>
                            <option value=<?= $projet->getId() ?>>
                                <?= $projet->getNom() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    </select>
                    <label for="partenaires">Partenaires</label>
                    <select class='form-control' name="partenaires">
                        <?php foreach ($partenaires as $partenaire) : ?>
                            <option value=<?= $partenaire->getId() ?>>
                                <?= $partenaire->getNom() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label for="partenaires">Etablissement</label>
                    <select class='form-control' name="etablissement">
                        <?php foreach ($etablissements as $etablissement) : ?>
                            <option value=<?= $etablissement->getId() ?>>
                                <?= $etablissement->getNom() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label for="lieu">Lieu</label>
                    <select class='form-control' name="lieu">
                        <?php foreach ($lieux as $lieu) : ?>
                            <option value=<?= $lieu->getId() ?>>
                                <?= $lieu->getNom() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Public</legend>
            <div class="row">
                <div class="col-8 col-md-4 form-group">
                    <label for="public">Public</label>
                    <select class='form-control' name="public">
                        <?php foreach ($publics as $public) : ?>
                            <option value=<?= $public->getId() ?>>
                                <?= $public->getNom() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-4 form-group">
                    <label for="effectif">Effectif</label>
                    <input type="number" class='form-control' name="effectif" id="effectif">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Animateurs <small>(demi-journées)</small></legend>
            <div class="row">
                <div class="col-4 form-group">
                    <label for="matthias">Matthias</label>
                    <input type="text" class='form-control' name="matthias">
                </div>
                <div class="col-4 form-group">
                    <label for="noelie">Noëlie</label>
                    <input type="text" class='form-control' name="noelie">
                </div>
                <div class="col-4 form-group">
                    <label for="benevoles">Bénévoles</label>
                    <input type="text" class='form-control' name="benevoles">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <div class="form-group">
                <legend>Notes</legend>
                <textarea class="form-control" name="notes"></textarea>
            </div>
        </fieldset>

        <div class="form-group">
            <input type="submit" class='btn btn-primary' name="ajouterAnimation" value="Créer" />
        </div>

    </form>
    <hr />
    <p> <a class="btn btn-light" role="button" href="/?animations"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Liste des animations</a></p>
<?php
}
?>

<!-- Fin de la page -->

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
