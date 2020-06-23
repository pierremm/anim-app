<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>

<!-- ACCUEIL -->


<p><strong><a class="btn btn-primary" role="button" a href="?animations">Voir les animations</a></strong></p>
<hr>
<h3>Les actus</h3>
<?php require_once('controller/rss-feed.php'); ?>

<!-- FIN ACCUEIL -->

<?php

$content = ob_get_clean();

require('view/frontend/template.php');
