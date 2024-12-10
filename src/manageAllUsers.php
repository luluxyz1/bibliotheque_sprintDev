<?php

require_once "includes/dbh.inc.php";
require_once "includes/config_session.inc.php";
require_once "includes/admin/signup_view.inc.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["admin_username"])) {
    header("location: index.php");
    exit;
}

$products = $pdo->query("SELECT * FROM livre")->fetchAll();
$genres = $pdo->query("SELECT DISTINCT nom FROM genre")->fetchAll(PDO::FETCH_COLUMN);
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <link src="output.js" rel="script">
    <title>Gestion des livres - Bibliothèque</title>
</head>

<body>

    <H1 class="underline text-red-600"> Bonjour, <?= $_SESSION["admin_username"] ?> </H1>
    <a href="admin_dashboard.php" class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade">Retour</a>

    <div class="flex-col flex justify-center items-center">
        <h1 class="text-4xl"> Bibliothèque </h1><br>

        <h1 class="text-2xl"> Ajouter un livre </h1>
    </div>


    <div class="flex justify-center items-center w-full ">
        <div class=" flex-col flex justify-center items-center">

            <h1 class="text-2xl">Admin </h1>

            <div class="flex-col flex items-center justify-center">
                <form class="flex flex-col justify-center" action="includes/admin/signup.inc.php" method="post">
                    <input placeholder="Prénom" class="border-black border-2 m-1" type="text" name="prenom" id="prenom">
                    <input placeholder="Nom" class="border-black border-2 m-1" type="text" name="nom" id="nom">
                    <input placeholder="Nom d'utilisateur" class="border-black border-2 m-1" type="text" name="username" id="username">
                    <input placeholder="Email" class="border-black border-2 m-1" type="text" name="email" id="email">
                    <input placeholder="Mot de passe" class="border-black border-2 m-1" type="password" name="password" id="password">
                    <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">S'inscrire</button>
                </form>
            </div>
        </div>

        <br>

        <div class=" flex-col flex justify-center items-center">
            <h1 class="text-2xl"> Libraire </h1>

            <div class="flex-col flex items-center justify-center">
                <form class="flex flex-col justify-center" action="includes/admin/signup_librarian.inc.php" method="post">
                    <input placeholder="Prénom" class="border-black border-2 m-1" type="text" name="prenom" id="prenom">
                    <input placeholder="Nom" class="border-black border-2 m-1" type="text" name="nom" id="nom">
                    <input placeholder="Nom d'utilisateur" class="border-black border-2 m-1" type="text" name="username" id="username">
                    <input placeholder="Email" class="border-black border-2 m-1" type="text" name="email" id="email">
                    <input placeholder="Mot de passe" class="border-black border-2 m-1" type="password" name="password" id="password">
                    <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">S'inscrire</button>
                </form>
            </div>
        </div>

        <br>

        <div class=" flex-col flex justify-center items-center">
            <h1 class="text-2xl">Utilisateurs </h1>

            <div class="flex-col flex items-center justify-center">
                <form class="flex flex-col justify-center" action="includes/admin/signup_user.inc.php" method="post">
                    <input placeholder="Prénom" class="border-black border-2 m-1" type="text" name="prenom" id="prenom">
                    <input placeholder="Nom" class="border-black border-2 m-1" type="text" name="nom" id="nom">
                    <input placeholder="Nom d'utilisateur" class="border-black border-2 m-1" type="text" name="username" id="username">
                    <input placeholder="Email" class="border-black border-2 m-1" type="text" name="email" id="email">
                    <input placeholder="Mot de passe" class="border-black border-2 m-1" type="password" name="password" id="password">
                    <button class="border-black border-2 m-1 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="output.js"></script>

</html>