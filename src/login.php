<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="output.css" rel="stylesheet">
    <link src="output.js" rel="script">
</head>

<body>
    <div>
        <h1 class="text-4xl"> Bibliothèque </h1><br>
        <h1 class="text-2xl"> Connexion </h1>

        <div>

            <form action="includes/login.inc.php" method="post">
                <input placeholder="Email" class="border-black border-2 m-1" type="text" name="email" id="email">
                <input placeholder="Mot de passe" class="border-black border-2 m-1" type="password" name="password" id="password">
                <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">Se connecter</button>
            </form>
            <a href="signup.php">Pas encore inscrit ?</a>
            <?php check_login_errors(); ?>

        </div>
    </div>
</body>
<script src="output.js"></script>

</html>