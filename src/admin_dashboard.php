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

<body class="flex">
    <div class="flex bg-yellow-200 h-screen w-1/2">
        <div class="w-full h-full ">
            <div class="flex flex-col justify-start items-center">
                <h1 class="text-4xl py-3 font-bold ">Bibliothèque</h1>

                <h2 class="text-xl font-thin">Dashboard (Admin)</h2>
                <br>
                <hr class="border-1 w-48 border-black">
                <br>
                <?php ?><p class="font-bold"><?php echo $_SESSION['admin_username']; ?></p><?php ?>
                <form action="includes/logout.inc.php" method="post">
                    <button type="submit" class="hover:font-bold font-thin underline">Se déconnecter</button>
                </form>
            </div>
            <br><br>
            <div class="flex flex-col justify-start mx-6 items-start">
                <a class="text-black hover:font-semibold hover:underline" href="admin_dashboard/manageBook.php">Gestion des livres</a>
                <br>
                <hr class="border-1 w-1/2 border-black">
                <br>
                <a class="hover:font-semibold hover:underline" href="admin_dashboard/manageAllUsers.php">Gestions des utilisateurs</a>
                <br>
                <hr class="border-1 w-1/2 border-black">
                <br>

            </div>
        </div>


    </div>
    <div class="flex w-full bg-[url('../images/bibliotheque.jpg')] bg-cover bg-no-repeat">

    </div>





</body>
<script src="output.js"></script>

</html>