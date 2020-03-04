<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>

<!-- ACCUEIL -->

<p><a href="?animations">Voir les animations</a></p>

<!-- FIN ACCUEIL -->

<?php

$content = ob_get_clean();

require('view/frontend/template.php');
