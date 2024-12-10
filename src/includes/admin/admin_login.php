<?php
require_once "../config_session.inc.php";
require_once "../admin/signup_view.inc.php";
require_once "../admin/login_view.inc.php";


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="../../output.css" rel="stylesheet">
    <link src="../../output.js" rel="script">
</head>

<body>
    <div>
        <h1 class="text-4xl"> Bibliothèque </h1><br>
        <h1 class="text-2xl"> Connexion </h1>

        <div>
            <h1>Connexion administrateur</h1>
            <form action="../admin/login.inc.php" method="post">
                <input placeholder="Nom d'utilisateur" class="border-black border-2 m-1" type="text" name="username" id="username">
                <input placeholder="Mot de passe" class="border-black border-2 m-1" type="password" name="password" id="password">
                <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit" name="submit">Se connecter</button>
            </form>


            <a href="../users/login.php">Connexion utilisateur</a>
            <a href="../librarian/librarian_login.php">Connexion libraire</a>


            <?php check_login_errors(); ?>
        </div>
    </div>
</body>
<script src="../../output.js"></script>

</html>