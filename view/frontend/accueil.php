<?php $title = 'Accueil'; ?>
<?php 

// Open Buffer : mise en tampon du contenu avant envoi
ob_start(); ?>

<h1><?= $title ?></h1>

<!-- ACCUEIL -->

<p><a href="?animations">Voir les animations</a></p>

<p><strong><a class="btn btn-primary" role="button" a href="?animations">Voir les animations</a></strong></p>
<hr>
<h3>Les actus</h3>
<?php require_once('view/frontend/inc/rss-feed.php'); ?>

<!-- FIN ACCUEIL -->

<?php

// ob_get_clean() removes the buffer (without printing it), and returns its content.
// ob_get_flush() prints the buffer, removes it, and returns its content.
$content = ob_get_clean();

require('view/frontend/template.php');
