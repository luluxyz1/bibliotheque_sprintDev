<?php

require_once "../includes/dbh.inc.php";
require_once "../includes/config_session.inc.php";
require_once "../includes/admin/signup_view.inc.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["admin_username"])) {
    header("location: ../index.php");
    exit;
}

$query_admins = $pdo->query("SELECT * FROM admin")->fetchAll();


?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <link src="../output.js" rel="script">
    <title>Gestion des livres - Bibliothèque</title>
</head>

<body class="overflow-x-auto h-full w-full">

    <div class="flex flex-row bg-yellow-200 h-24 w-full">
        <div class="flex flex-col px-6">
            <h1 class="flex text-2xl py-3 underline font-bold ">Bibliothèque</h1>
            <h4 class="font-normal">Dashboard (Admin)</h4>
        </div>
        <div class="flex flex-row justify-center items-center mx-6">
            <a href="../admin_dashboard.php" class="hover:font-bold underline">Accueil</a>
        </div>
        <div class="flex flex-row justify-center items-center mx-6">
            <a href="../admin_dashboard/manageAllUsers.php" class="hover:font-bold underline">Ajout d'utilisateurs</a>
        </div>
        <div class="flex flex-col justify-center mx-6 items-center">
            <a class="text-black hover:font-semibold hover:underline" href="manageBook.php">Livres</a>
        </div>
        <div class="flex flex-col justify-center mx-6 items-center">
            <a class="text-black hover:font-semibold hover:underline" href="manageAdmins.php">Admins</a>
        </div>
        <div class="flex flex-col justify-center mx-6 items-center">
            <a class="text-black hover:font-semibold hover:underline" href="manageLibrarians.php">Libraires</a>
        </div>
        <div class="flex flex-col justify-center mx-6 items-center">
            <a class="text-black hover:font-semibold hover:underline" href="manageUsers.php">Utilisateurs</a>
        </div>
        <div class="flex justify-end items-center w-full mx-6">
            <div class="flex flex-col">
                <p class="font-thin">Bonjour, <?php echo $_SESSION['admin_username']; ?></p>
                <form class="flex justify-end" action="../includes/logout.inc.php" method="post">
                    <button type="submit" class="hover:font-bold underline">Se déconnecter</button>
                </form>

            </div>
        </div>



    </div>


    <!-- Tous les admins -->
    <div class="flex flex-col py-6 justify-center items-center">
        <h1 class="text-3xl underline flex justify-center items-start font-bold p-6"> Tous les Admins <h1>
                <table class="table-auto">
                    <thead>
                        <th class="border ">ID</th>
                        <th class="border ">Nom d'utilisateur</th>
                        <th class="border ">Email</th>
                        <th class="border ">Date d'Inscription <br>(YYYY-MM-DD)</th>
                        <th colspan="2" class="border ">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query_admins as $admin) : ?>
                            <tr>
                                <form action="../includes/update_admins.inc.php" method="post">
                                    <td class="border">
                                        <input type="text" name="id_admin" value="<?= $admin['id_admin'] ?>" readonly>
                                    </td>
                                    <td class="border">
                                        <input type="text" name="username" value="<?= $admin['username'] ?>" required>
                                    </td>
                                    <td class="border ">
                                        <input type="text" name="email" value="<?= $admin['email'] ?>" required>
                                    </td>
                                    <td class="border ">
                                        <input type="text" name="date_inscription" value="<?= $admin['date_creation'] ?>" readonly>
                                    </td>
                                    <td class="border">
                                        <button class=" px-6 hover:bg-black transition:2s hover:text-white animate-fade" type="submit">Modifier</button>
                                    </td>
                                </form>
                                <td class="border">
                                    <form action="../includes/delete_admin.inc.php" method="post">
                                        <input type="hidden" name="id_admin" value="<?= $admin['id_admin'] ?>">
                                        <button class="px-6 hover:bg-red-600 transition:2s hover:text-white animate-fade" type="submit">Supprimer</button>
                                    </form>
                                </td>

                            </tr>
                            <tr>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
    </div>



</body>
<script src="output.js"></script>

</html>