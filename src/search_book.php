<?php
session_start();
require_once "includes/dbh.inc.php";

// On vérifie si la barre de recherche est vide ou non. Si elle est vide, on redirige l'utilisateur vers la page d'accueil. 
// Sinon, on récupère la valeur de la barre de recherche et on effectue une requête SQL pour chercher les livres correspondants.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["key"])) {
        header("Location: index.php");
        die();
    } else {
        $key = $_POST["key"];
        $query = "SELECT * FROM livre WHERE nom_livre LIKE :key OR auteur_livre LIKE :key OR genre_livre LIKE :key";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['key' => '%' . $key . '%']);
        $books = $stmt->fetchAll();
    }
} else {
    $query = "SELECT * FROM livre";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $books = $stmt->fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $key; ?> - Bibliotheque</title>
    <link rel="stylesheet" href="output.css">
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

    <!-- Si l'utilisateur est connecté, alors on affiche "Bonjour [username]". 
     Sinon, on affiche "Bienvenue dans notre bibliothèque.". -->




    <!-- Affichage des livres correspondants à la recherche -->
    <div>
        <?php
        if ($books) {
        ?>
            <br>
            <h1 class="w-full flex justify-center items-center"> Voici les livres correspondants à votre recherche </h1>
            <br>
            <div>
                <?php
                foreach ($books as $book) {
                    if ($book) {
                ?> <div class="flex text-black justify-end items-center w-96 flex-col border-2 border-black  hover:bg-brown-200 m-4 p-4">


                            <button type="submit" name="id_livre" value="<?php echo $book["id_livre"]; ?>" class="text-xl">
                                <?php echo $book["nom_livre"]; ?>
                                <br>
                                <h1 class="text-sm"><?php echo $book["auteur_livre"]; ?></h1>
                                <h1 class="text-sm"><?php echo $book["genre_livre"]; ?></h1>
                            </button>
                            <?php if ($book["etat_livre"] == "Disponible") { ?>
                                <h1 class=" text-green-600 p-2 rounded-lg">Disponible</h1>

                            <?php } else if ($book["etat_livre"] === "Indisponible") { ?>
                                <h1 class=" text-red-600 p-2 rounded-lg">Indisponible</h1>

                                <?php } else {
                                if ($book["etat_livre"] === "Réservé") { ?>
                                    <h1 class=" text-yellow-600 p-2 rounded-lg">Réservé</h1>
                                    <button class="border-2 border-black p-2 rounded-lg hover:bg-black hover:text-white" type="submit" name="id_livre" value="<?php echo $book["id_livre"]; ?>">Réserver</button>


                                <?php } ?>



                            <?php } ?>



                        </div>
            <?php
                    }
                }
            } else {
                echo "Aucun livre trouvé, veuillez réessayer.";
            }
            ?>

            </div>
    </div>


    </div>
</body>

<script src="output.js"></script>

</html>