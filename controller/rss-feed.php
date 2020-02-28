<div class="content">

    <!-- <form method="post" action="">
        <input type="text" name="feedurl" placeholder="Enter website feed URL">&nbsp;<input type="submit" value="Submit" name="submit">
    </form> -->
    <?php

    $url = 'https://www.bie.fr/feed';
    //  if(isset($_POST['submit'])){
    //    if($_POST['feedurl'] != ''){
    //      $url = $_POST['feedurl'];
    //    }
    //  }


    $invalidurl = false;
    if (@simplexml_load_file($url)) {
        $feeds = simplexml_load_file($url);
        // } else {
        //     $invalidurl = true;
        //     echo "<div class=\"alert alert-warning\" role=\"alert\">
        //     Flux RSS non valide.
        //   </div>";
    }


    $i = 0;
    if (!empty($feeds)) {

        $site = $feeds->channel->title;
        $sitelink = $feeds->channel->link;

        //   echo "<h1>".$site."</h1>";
        foreach ($feeds->channel->item as $item) {

            $title = $item->title;
            $link = $item->link;
            $description = $item->description;
            $postDate = $item->pubDate;
            $pubDate = date('D, d M Y', strtotime($postDate));


            if ($i >= 5) break;
    ?>
            <div class="post">
                <!-- <div class="post-head"> -->
                <p><a class="feed_title" target="_blank'
                " href="<?php echo $link; ?>"><?php echo $title; ?></a><br />
                    <span><small><?php echo $pubDate; ?></small></span><br />
                    <!-- </div>
     <div class="post-content"> -->
                    <?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?> <a href="<?php echo $link; ?>">Lire...</a></p>
                <hr />
            </div>
</div>

<?php
            $i++;
        } ?>


<?php   }
    // else {
    //         if (!$invalidurl) {
    //             echo "<div class=\"alert alert-warning\" role=\"alert\">
    //             Pas de résultats.
    //           </div>";
    //    }
    // }
    //var_dump($feeds);
?>
<p><strong><a class="feed_title" target="_blank" href="https://www.bie.fr/blog/">Toutes les actus</a></strong></p>
<p><a class="btn btn-light" role="button" href="https://www.bie.fr/wp-admin/post-new.php" target="_blank"><i class="fa fa-plus"></i>&nbsp;&nbsp;Créer une actu</a></p>
</div>