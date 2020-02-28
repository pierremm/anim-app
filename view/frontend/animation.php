<?php $title = 'Créer une animation'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


        <!-- ... -->
        <form action="index.php?action=addAnimation&amp;id=<?= $post['id'] ?>" method="post">
            <fieldset>
                  <legend>Date(s)</legend>
                  <div>
                  <label for="nomAnimation">Nom du projet</label>
                  <input type="text" id="nomAnimation" name="nomAnimation">
              </div>
              <div>
                <label for="dateDebut">Du </label>
                <input type="date" id="dateDebut" name="dateDebut">
                <label for="dateFin">au </label>
                <input type="date" id="dateFin" name="dateFin">
                </div>
                <div>
                    <label for="Durée">Nombre demi-journée</label>
                    <input type="number" id="dureeAnimation" name="dureeAnimation" value="1">

                </div>
            </fieldset>
            <fieldset>
                  <legend>Détails</legend>
                <select>
                    <option selected>Thème</option>
                    <option value="theme1"></option>
                </select>
                <select>
                    <option selected>Projet</option>
                    <option value="projet1"></option>
                </select>
                <select>
                    <option selected>Partenaire</option>
                    <option value="partenainre1"></option>
                </select>
                <select>
                    <option selected>Ville</option>
                    <option value="ville1"></option>
                </select>
            </fieldset>
            <fieldset>
                  <legend>Public</legend>
                  <div>
                <input type="checkbox" rel="public" name="publicPrimaire" /><label for="publicPrimaire">Primaires</label>
                <input type="checkbox" rel="public" name="publicCollege" /><label for="publicCollege">Collègiens</label>
                <input type="checkbox" rel="public" name="publicLycee" /><label for="publicLycee">Lycéens</label>
                <input type="checkbox" rel="public" name="publicTous" /><label for="publicTous">Grand Public</label>
            </div>
            <div>
                <label for="effectif">Effectif</label>
                <input type="number" id="nomAnimation" name="nomAnimation">
            </div>
        </fieldset>
            <fieldset>
                  <legend>Animateurs</legend>
                <input type="checkbox" rel="animateurs" name="Matthias" /><label for="Matthias">Matthias</label>
                <input type="checkbox" rel="animateurs" name="Noëlie" /><label for="Noëlie">Noëlie</label>
                <input type="number" name="benevoles"><label for="benevoles">Bénévoles</label>
            </fieldset>

         <div>
                <label for="comment">Notes</label><br />
                <textarea id="notes" name="notes"></textarea>
            </div>
            <div>
                <input type="submit" value="Ajouter"/>
            </div>
        </form>

        <!-- ... -->


        <?php $content = ob_get_clean(); ?>

        <?php require('view/frontend/template.php'); ?>
