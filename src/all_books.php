<?php

session_start();

require_once "includes/dbh.inc.php"; // Chemin vers votre fichier dbh.inc.php

$query_all_books = "SELECT * FROM livre";
$stmt_all_books = $pdo->prepare($query_all_books);
$stmt_all_books->execute();
$all_books = $stmt_all_books->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les livres - Bibliothèque</title>
    <link rel="stylesheet" href="output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>


<body>

    <header class="flex bg-gray-800 text-white p-4">
        <div class="flex w-full">
            <a href="index.php">
                <h1 class="text-4xl flex justify-center items-center"> Bibliothèque </h1>
            </a>
        </div>
        <!-- Barre de recherche pour les livres -->
        <div class="flex w-full justify-end items-center">
            <form class="flex" action="search_book.php" method="post">
                <input class=" text-black w-96 border-2 rounded-xl border-black" type="text" name="key" placeholder="Rechercher un livre, un auteur, un genre...">
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
        <h1 class="flex justify-center items-center text-3xl py-2 w-auto underline">Tous les livres</h1>
        <?php
        foreach ($all_books as $book) {

            echo '<a href="selected_book.php?id=' . $book['id_livre'] . '" class="text-3xl py-2 w-auto">' . $book['nom_livre'] . '</a>';
        }
        ?>
    </div>

</body>

<script src="output.js"></script>

</html>