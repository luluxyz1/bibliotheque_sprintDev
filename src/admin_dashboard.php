<?php

require_once "includes/dbh.inc.php";
require_once "includes/config_session.inc.php";
require_once "includes/admin/signup_view.inc.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["admin_username"])) {
    header("location: index.php");
    exit;
}



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
    <h1 class="text-4xl">ADMIN DASHBOARD </h1><br>
    <?php echo "Bonjour, " .  $_SESSION['admin_username']; ?>
    <br><br>
    <div class="flex flex-col">
        <a class="underline text-blue-700" href="../src/includes/users/login.php">Connexion utilisateur</a>
        <a href="../src/includes/librarian/librarian_login.php">Connexion libraire</a>
        <a href="../src/index.php">Page d'accueil</a>

    </div>

    <div>
        <a href="manageBook.php">Livres</a>
        <a href="manageAllUsers.php">Utilisateurs</a>
    </div>
    <form action="includes/users/logout.inc.php" method="post">
        <button type="submit">Se déconnecter</button>
    </form>

</body>
<script src="output.js"></script>

</html>