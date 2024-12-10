<?php
session_start();


require_once "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple HTML Page</title>
    <link rel="stylesheet" href="output.css">
</head>

<body class="h-full w-full">
    <?php
    if (isset($_SESSION["user_username"])) {
        echo '<h1 class="font-title text-2xl">' .   "Bonjour, " . $_SESSION["user_username"] . '</h1>';
    } else {

        echo '<h1 class="font-title text-2xl">Bienvenue dans notre bibliothèque.</h1>';
    }
    ?>
    <div class="flex flex-col">

        <?php
        if (isset($_SESSION["user_username"])) {
            echo '<form action="includes/users/logout.inc.php" method="post">';
            echo '<button type="submit">Se déconnecter</button>';
            echo '</form>';
        } else {
            echo '<a class="underline hover:text-red-600" href="includes/users/login.php">Connexion utilisateur</a>';
            echo '<a class="underline hover:text-red-600" href="includes/librarian/librarian_login.php">Connexion libraire</a>';
            echo '<a class="underline hover:text-red-600" href="includes/admin/admin_login.php">Connexion administrateur</a>';
        }
        ?>



    </div>
</body>

<script src="output.js"></script>

</html>