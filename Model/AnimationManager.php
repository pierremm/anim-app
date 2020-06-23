<?php

/**
 * User: Pierremm
 * Date: 01/06/2020
 * Version: 1.0
 */

class AnimationManager extends Manager
{

    public function lireToutesAnimations()
    {
        /**
         * Récupération des données de la base
         */
        $sql = "SELECT * 
                FROM animations ORDER BY dateAnim DESC";
        $req = $this->db->query($sql);

        // Création d'un tableau pour chaque animation (ligne) stockée dans la base
        $arrayAnimations = array();
        while ($ligne = $req->fetch()) {
            $arrayAnimations[] = new Animation($ligne);
        }
        return $arrayAnimations;
    }

    public function faireSynthese($year)
    {
        /**
         * Récupération des données de la base
         */

        $year = $_GET['annee'];
        $sql = "SELECT * FROM animations WHERE `dateAnim` BETWEEN '$year-01-01' AND '$year-12-31' ORDER BY dateAnim DESC";
        $req = $this->db->query($sql);

        // Création d'un tableau pour chaque animation (ligne) stockée dans la base
        $arrayAnimations = array();
        while ($ligne = $req->fetch()) {
            $arrayAnimations[] = new Animation($ligne);
        }
        return $arrayAnimations;
    }


    public function lireAnimation($id)
    {
        // Récupération des données de la base selon l'identifiant de l'animation
        $sql = "SELECT * 
                FROM animations
                WHERE id = :id
                ";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        // Renvoie l'animation correspondante
        return new Animation($req->fetch());
    }



    //--------------------------------------------- LISTE DES ANIMATIONS

    public function listeToutesAnimations()
    {
        // Compte du nombre d'animations
        $total = $this->db->query(' SELECT COUNT(*) FROM animations')->fetchColumn();

        // Limite d'animations par page
        $limit = 20;

        // Nombre de pages en fonction du total
        $pages = ceil($total / $limit);

        // Page affichée
        $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
            'options' => array(
                'default'   => 1,
                'min_range' => 1,
            ),
        )));

        // Calcul du décalage pour la requête
        $offset = ($page - 1)  * $limit;

        // Affichage début / fin
        $start = $offset + 1;
        $end = min(($offset + $limit), $total);

        // Affichage page précédente
        $prevlink = ($page > 1) ? '
        <li class="page-item">
            <a href="?animations&page=1" class="page-link" title="Première page">
                &laquo;
            </a>
        </li>
        <li class="page-item">
            <a href="?animations&page=' . ($page - 1) . '" class="page-link"  title="Page précédente">
                &lsaquo;
            </a>
        </li>'
            :
            '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>
        <li class="page-item disabled"><span class="page-link">&lsaquo;</span></li>';

        // Affichage page suivante
        $nextlink = ($page < $pages) ? '<li class="page-item"><a href="?animations&page=' . ($page + 1) . '"  class="page-link"  title="Page suivante">&rsaquo;</a></li> <li class="page-item"><a href="?animations&page=' . $pages . '"  class="page-link" title="Dernière page">&raquo;</a></li>' : '<li class="page-item disabled"><span class="page-link">&rsaquo;</span></li> <li class="page-item disabled"><span class="page-link">&raquo;</span></li>';


        // Prepare la requête
        $stmt = $this->db->prepare(' SELECT  * FROM animations ORDER BY dateAnim DESC LIMIT :limit OFFSET :offset ');
        // Affecte aux variables pdo les valeurs contenues dans les variables
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        // Si il y a des résultats
        if ($stmt->rowCount() > 0) {
            // Retourne un tableau associatif des résultats
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $animation = new IteratorIterator($stmt);
            // Affichage des résultats
            foreach ($animation as $row) {
                echo '<p> ';
                echo '<small> ';
                echo $this->lireAnimation($row['id'])->getDateAnim();
                echo '</small> ';
                echo '<a href="?animations&modifier=' . $row['id'] . '">';
                echo $this->lireAnimation($row['id'])->getNom();
                echo '</a> ';
                echo '<br /> ';
                echo '<small>Effectif : ' . $this->lireAnimation($row['id'])->getEffectif() . '</small> - <small>Demi-Journées : ' . $this->lireAnimation($row['id'])->getDemiJournees() . '</small>';
                echo '</p> ';
                echo '<hr /> ';
            }
            // Si pas de résultat
        } else {
            echo '<p>aucune animation</p>';
        }



        // Affichage du nombre de pages/animations
        echo '<div id="pagination" class="row justify-content-center text-center">';
        echo '<ul class="pagination">';
        echo  $prevlink;
        echo '<li class="page-item"><a class="page-link disabled"> ' . ' Page ' . $page . ' / ' . $pages . '</a></li>';
        echo $nextlink;
        echo '</ul>';
        echo '</div>';

        // Nombre d'animations
        echo '<div id="pagination" class="row justify-content-center text-center">';
        echo '<p>';
        echo $total . ' animations';
        echo '</p>';
        echo '</div>';
    }
    //---------------------------------------------FIN PAGINATION





    public function ajouterAnimation($nom, $dateAnim, $theme, $projet, $partenaires, $etablissement, $lieu, $public, $effectif, $demiJournees, $animateurUn, $animateurDeux, $animateurTrois, $animateurQuatre, $animateurCinq, $benevoles, $notes)
    {

        // Affectation de la valeur null si champ vide
        $effectif = !empty($effectif) ? $effectif : null;
        $demiJournees = !empty($demiJournees) ? $demiJournees : null;
        $animateurUn = !empty($animateurUn) ? $animateurUn : null;
        $animateurDeux = !empty($animateurDeux) ? $animateurDeux : null;
        $animateurTrois = !empty($animateurTrois) ? $animateurTrois : null;
        $animateurQuatre = !empty($animateurQuatre) ? $animateurQuatre : null;
        $animateurCinq = !empty($animateurCinq) ? $animateurCinq : null;
        $benevoles = !empty($benevoles) ? $benevoles : null;

        // Requête sql
        $sql = "  INSERT INTO animations (nom,dateAnim,theme,projet,partenaires,etablissement,lieu,public,effectif,demiJournees,animateurUn,animateurDeux,animateurTrois,animateurQuatre,animateurCinq,benevoles,notes) 
                VALUES(:nom,:dateAnim,:theme,:projet,:partenaires,:etablissement,:lieu, :public,:effectif,:demiJournees,:animateurUn,:animateurDeux,:animateurTrois,:animateurQuatre,:animateurCinq,:benevoles,:notes)";

        // Prépare la requête
        $req = $this->db->prepare($sql);

        // Affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue("nom", $nom, PDO::PARAM_STR);
        $req->bindValue("dateAnim", $dateAnim, PDO::PARAM_STR);
        // $req->bindValue("dateAnim", $dateAnim->format("Y-m-d"), PDO::PARAM_STR);
        $req->bindValue("theme", $theme, PDO::PARAM_STR);
        $req->bindValue("projet", $projet, PDO::PARAM_STR);
        $req->bindValue("partenaires", $partenaires, PDO::PARAM_STR);
        $req->bindValue("etablissement", $etablissement, PDO::PARAM_STR);
        $req->bindValue("lieu", $lieu, PDO::PARAM_STR);
        $req->bindValue("public", $public, PDO::PARAM_STR);
        $req->bindValue("effectif", $effectif, PDO::PARAM_STR);
        $req->bindValue("demiJournees", $demiJournees, PDO::PARAM_STR);
        $req->bindValue("animateurUn", $animateurUn, PDO::PARAM_STR);
        $req->bindValue("animateurDeux", $animateurDeux, PDO::PARAM_STR);
        $req->bindValue("animateurTrois", $animateurTrois, PDO::PARAM_STR);
        $req->bindValue("animateurQuatre", $animateurQuatre, PDO::PARAM_STR);
        $req->bindValue("animateurCinq", $animateurCinq, PDO::PARAM_STR);
        $req->bindValue("benevoles", $benevoles, PDO::PARAM_STR);
        $req->bindValue("notes", $notes, PDO::PARAM_STR);


        // Effectue la requete
        $req->execute();
    }


    public function modifierAnimation($id, $nom, $dateAnim, $theme, $projet, $partenaires, $etablissement, $lieu, $public, $effectif, $demiJournees, $animateurUn, $animateurDeux, $animateurTrois, $animateurQuatre, $animateurCinq, $benevoles, $notes)
    {

        // Affectation de la valeur null si champ vide
        $effectif = !empty($effectif) ? $effectif : null;
        //$demiJournees = !empty($demiJournees) ? $demiJournees : null;
        $animateurUn = !empty($animateurUn) ? $animateurUn : null;
        $animateurDeux = !empty($animateurDeux) ? $animateurDeux : null;
        $animateurTrois = !empty($animateurTrois) ? $animateurTrois : null;
        $animateurQuatre = !empty($animateurQuatre) ? $animateurQuatre : null;
        $animateurCinq = !empty($animateurCinq) ? $animateurCinq : null;
        $benevoles = !empty($benevoles) ? $benevoles : null;

        // Requête sql
        $sql = "UPDATE animations
                  SET nom=:nom,dateAnim=:dateAnim,theme=:theme,projet=:projet,partenaires=:partenaires,etablissement=:etablissement,lieu=:lieu,public=:public,effectif=:effectif,demiJournees=:demiJournees,animateurUn=:animateurUn,animateurDeux=:animateurDeux,animateurTrois=:animateurTrois,animateurQuatre=:animateurQuatre,animateurCinq=:animateurCinq,benevoles=:benevoles,notes=:notes
                  WHERE id=:id";

        // Prépare la requete
        $req = $this->db->prepare($sql);

        // Affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->bindValue("nom", $nom, PDO::PARAM_STR);
        $req->bindValue("dateAnim", $dateAnim, PDO::PARAM_STR);
        //$req->bindValue("dateAnim", $dateAnim->format("Y-m-d"), PDO::PARAM_STR);
        $req->bindValue("theme", $theme, PDO::PARAM_STR);
        $req->bindValue("projet", $projet, PDO::PARAM_STR);
        $req->bindValue("partenaires", $partenaires, PDO::PARAM_STR);
        $req->bindValue("etablissement", $etablissement, PDO::PARAM_STR);
        $req->bindValue("lieu", $lieu, PDO::PARAM_STR);
        $req->bindValue("public", $public, PDO::PARAM_STR);
        $req->bindValue("effectif", $effectif, PDO::PARAM_STR);
        $req->bindValue("demiJournees", $demiJournees, PDO::PARAM_STR);
        $req->bindValue("animateurUn", $animateurUn, PDO::PARAM_STR);
        $req->bindValue("animateurDeux", $animateurDeux, PDO::PARAM_STR);
        $req->bindValue("animateurTrois", $animateurTrois, PDO::PARAM_STR);
        $req->bindValue("animateurQuatre", $animateurQuatre, PDO::PARAM_STR);
        $req->bindValue("animateurCinq", $animateurCinq, PDO::PARAM_STR);
        $req->bindValue("benevoles", $benevoles, PDO::PARAM_STR);
        $req->bindValue("notes", $notes, PDO::PARAM_STR);


        //execute la requete
        $req->execute();
    }


    public function effacerAnimation($id)
    {
        $this->db->exec('DELETE FROM animations WHERE id = ' . $id);
    }


    public function sommeThemes()
    {
        // Calcul du nombre d'animations enregistrées
        $sql = "SELECT demiJournees FROM animations";
        $req = $this->db->query($sql);
        $somme = array();
        while ($ligne = $req->fetch()) {
            $somme[] = new Animation($ligne);
        }
        return $somme;
    }
}
