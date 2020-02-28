<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>


<!-- ACCUEIL -->


<!-- FIN ACCUEIL -->

<?php

$content = ob_get_clean();

require('view/frontend/template.php'); 