<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
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
        <h1 class="text-2xl"> Inscription </h1>

        <div>

            <form action="includes/signup.inc.php" method="post">
                <input placeholder="Prénom" class="border-black border-2 m-1" type="text" name="prenom" id="prenom">
                <input placeholder="Nom" class="border-black border-2 m-1" type="text" name="nom" id="nom">
                <input placeholder="Email" class="border-black border-2 m-1" type="text" name="email" id="email">
                <input placeholder="Mot de passe" class="border-black border-2 m-1" type="password" name="password" id="password">
                <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">S'inscrire</button>
            </form>
        </div>
    </div>
</body>
<script src="output.js"></script>

</html>