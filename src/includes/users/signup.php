<?php
require_once "../config_session.inc.php";
require_once "signup_view.inc.php";
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
    <div class="flex-col flex justify-center items-center">
        <h1 class="text-4xl"> Bibliothèque </h1><br>
        <h1 class="text-2xl"> Inscription </h1>

        <div class="flex-col flex items-center justify-center">
            <form class="flex flex-col justify-center" action="signup.inc.php" method="post">
                <input placeholder="Prénom" class="border-black border-2 m-1" type="text" name="prenom" id="prenom">
                <input placeholder="Nom" class="border-black border-2 m-1" type="text" name="nom" id="nom">
                <input placeholder="Nom d'utilisateur" class="border-black border-2 m-1" type="text" name="username" id="username">
                <input placeholder="Email" class="border-black border-2 m-1" type="text" name="email" id="email">
                <input placeholder="Mot de passe" class="border-black border-2 m-1" type="password" name="password" id="password">
                <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">S'inscrire</button>
            </form>
            <a href="login.php">Déjà inscrit ?</a>
        </div>
    </div>
</body>
<script src="../../output.js"></script>

</html>