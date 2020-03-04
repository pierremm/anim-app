<?php $title = 'Identifiez-vous'; ?>
<?php ob_start(); ?>
<h1><?= $title ?></h1>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

<div class="row justify-content-center">
    <div class="col-sm-7">
        <?php

        $msg = '';

        // Vérification présence des identifiants

        if (
            isset($_POST['login']) && !empty($_POST['username'])
            && !empty($_POST['password'])
        ) {

            // Vérification valeurs des identifiants
            if (
                $_POST['username'] == 'anim' &&
                $_POST['password'] == 'oloron'
            ) {
                // mise en place de la session
                $_SESSION['valid'] = true;
                $_SESSION['username'] = 'anim';

                // redirection vers l'accueil
                header('Location: ?animations');
            } else {
                $msg = '<div class="alert alert-warning" role="alert">Mauvais identifiant ou mot de passe</div>';
            }
        }

        if (isset($_GET['logout'])) {
            unset($_SESSION["username"]);
            unset($_SESSION["password"]);
            echo '<div class="alert alert-success" role="alert">Session terminée</div>';
        }
        ?>
    </div>
</div>
<div class="row justify-content-center text-center">
    <div class="col-sm-7 form-group" >
        <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                        ?>" method="post">
            <?php echo $msg; ?>
            <input type="text" class="form-control" name="username" placeholder="Identifiant" required autofocus></br>
            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required></br>
            <button class="btn btn-primary" type="submit" name="login">Connexion</button>
        </form>
    </div>

</div>


<?php
$content = ob_get_clean();

require('view/frontend/template.php');
