<?php

/**
 * Affichage des actus du site bie.fr
 *
 * User: Pierremm
 * Date: 01/03/2020
 * Version 1.0
 */



echo '<div class="content">';

// Source du fichier XML wordpress
$url = 'http://www.bie.fr/feed';


// Vérification de l'URL
$invalidurl = false;
if (@simplexml_load_file($url)) {
    $feeds = simplexml_load_file($url);
} else {
    $invalidurl = true;
    echo "<div class=\"alert alert-warning\" role=\"alert\">
          </div>";
}


// Insertion des données
$i = 0;
if (!empty($feeds)) {

    // Récupération 
    $site = $feeds->channel->title;
    $sitelink = $feeds->channel->link;

    // Boucle sur les champs
    foreach ($feeds->channel->item as $item) {

        $title = $item->title;
        $link = $item->link;
        $description = $item->description;
        $postDate = $item->pubDate;
        $pubDate = date('D, d M Y', strtotime($postDate));

        // Nombre d'actus à afficher
        if ($i >= 5) break;
?>
        <div class="post">
            <p><a class="feed_title" target="_blank'
    " href="<?php echo $link; ?>"><?php echo $title; ?></a><br />
                <span><small><?php echo $pubDate; ?></small></span><br />
                <?php
                // Implode retourne une chaîne depuis les éléments d'un tableau
                echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "...";
                ?>
                <a href="<?php echo $link; ?>">Lire...</a></p>
            <hr />
        </div>
        </div>

    <?php
        $i++;
    } 
     // Fin de la boucle sur les champs
     ?>


<?php   }

// Si les champs sont vides
// else {
//         if (!$invalidurl) {
//             echo "<div class=\"alert alert-warning\" role=\"alert\">
//             Pas de résultats.
//           </div>";
//    }
// }
// var_dump($feeds);

?>
<p><strong><a class="feed_title" target="_blank" href="https://www.bie.fr/blog/">Toutes les actus</a></strong></p>
<p><a class="btn btn-light" role="button" href="https://www.bie.fr/wp-admin/post-new.php" target="_blank"><i class="fa fa-plus"></i>&nbsp;&nbsp;Créer une actu</a></p>
</div>