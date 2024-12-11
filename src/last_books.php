<?php

session_start();

require_once "includes/dbh.inc.php"; // Chemin vers votre fichier dbh.inc.php

$query_last_books = "SELECT * FROM livre ORDER BY id_livre DESC LIMIT 5";
$stmt_last_books = $pdo->prepare($query_last_books);
$stmt_last_books->execute();
$last_books = $stmt_last_books->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Derniers ajouts - Bibliothèque</title>
    <link rel="stylesheet" href="output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="text-black">

    <header class="flex bg-gray-800 text-white p-4">
        <div class="flex w-full">
            <a href="index.php">
                <h1 class="text-4xl flex justify-center items-center"> Bibliothèque </h1>
            </a>
        </div>
        <!-- Barre de recherche pour les livres -->
        <div class="flex w-full justify-end items-center">
            <form class="flex" action="search_book.php" method="post">
                <input class="w-96 border-2 text-black rounded-xl border-black" type="text" name="key" placeholder="Rechercher un livre, un auteur, un genre...">
                <button class="mx-4 underline hover:font-bold" type="submit" name="submit">Recherche</button>
            </form>
        </div>
        <div class="flex w-72 justify-center items-center">
            <!-- Si l'utilisateur est connecté, alors on affiche "Bonjour [username]". Sinon, on affiche "Bienvenue dans notre bibliothèque.". -->
            <div class="flex flex-col">
                <?php
                if (isset($_SESSION["user_username"])) {
                    echo '<form action="includes/logout.inc.php" method="post">';
                    echo '<h1 class="font-title text-sm">' .   "Bonjour, " . $_SESSION["user_username"] . '</h1>';
                    echo '<button type="submit" class="underline hover:font-bold">Se déconnecter</button>';
                    echo '</form>';
                } else {
                    echo '<a class="flex underline hover:text-red-600  justify-center items-center" href="includes/users/login.php">Connexion</a>';
                }
                ?>
            </div>
        </div>

    </header>


    <div class="flex flex-col w-auto h-auto">
        <h1 class=" flex justify-center items-center text-3xl py-2 w-auto underline">Derniers ajouts</h1>
        <div class="flex flex-col">
            <?php
            foreach ($last_books as $book) {
                echo '<div class="flex m-4 p-2 w-96 border-2 border-red-600 flex-col">';
                echo '<h1 class="text-2xl">' . $book["nom_livre"] . '</h1>';
                echo '<h1 class="text-xl">' . $book["auteur_livre"] . '</h1>';
                echo '<h1 class="text-lg">' . $book["genre_livre"] . '</h1>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

</body>

</html>