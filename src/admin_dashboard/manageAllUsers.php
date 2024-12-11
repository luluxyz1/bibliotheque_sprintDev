<?php

require_once __DIR__ . "/../includes/dbh.inc.php";
require_once __DIR__ . "/../includes/config_session.inc.php";
require_once __DIR__ . "/../includes/admin/signup_view.inc.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["admin_username"])) {
    header("location: ../index.php");
    exit;
}

$query_users = $pdo->query("SELECT * FROM users")->fetchAll();
$query_librarians = $pdo->query("SELECT * FROM librarian")->fetchAll();
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




    <!-- Ajouter un utilisateur -->
    <div class="flex flex-col justify-center items-center h-1/2 w-full ">
        <div class="flex flex-row">
            <div class=" flex-col flex justify-center items-center">



                <div class="flex-col flex items-center justify-center">
                    <h1 class="text-2xl">Admin </h1>
                    <form class="flex flex-col justify-center" action="../includes/admin/signup.inc.php" method="post">
                        <input placeholder="Nom d'utilisateur" class=" border-2 m-1" type="text" name="username" id="username">
                        <input placeholder="Email" class=" border-2 m-1" type="text" name="email" id="email">
                        <input placeholder="Mot de passe" class=" border-2 m-1" type="password" name="password" id="password">
                        <button class=" border-2 m-1 hover:bg-green-600 transition:2s hover:text-white animate-fade" type="submit">Ajouter un nouvel Admin</button>
                    </form>
                </div>
            </div>


            <div class=" flex-col flex justify-center items-center">
                <h1 class="text-2xl"> Libraire </h1>

                <div class="flex-col flex items-center justify-center">
                    <form class="flex flex-col justify-center" action="../includes/librarian/signup_librarian.inc.php" method="post">
                        <input placeholder="Nom d'utilisateur" class=" border-2 m-1" type="text" name="username" id="username">
                        <input placeholder="Email" class=" border-2 m-1" type="text" name="email" id="email">
                        <input placeholder="Mot de passe" class=" border-2 m-1" type="password" name="password" id="password">
                        <button class=" border-2 m-1 hover:bg-green-600 transition:2s hover:text-white animate-fade" type="submit">Ajouter un nouveau Libraire</button>
                    </form>
                </div>
            </div>
        </div>




    </div>

    <br>

    <!-- Tous les admins -->
    <div class="flex flex-col py-6 justify-center items-center">
        <h1 class="text-3xl underline flex justify-center items-start font-bold p-6"> Tous les Admins </h1>
        <table class="table-auto">
            <thead>
                <th class="border ">ID</th>
                <th class="border ">Nom d'utilisateur</th>
                <th class="border ">Mot de passe (hash)</th>
                <th class="border ">Email</th>
                <th class="border ">Date d'Inscription <br>(YYYY-MM-DD)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query_admins as $admin) : ?>
                    <tr>

                        <td class="border ">
                            <input type="text" name="id_admin" value="<?= $admin['id_admin'] ?>" readonly>
                        </td>
                        <td class="border">
                            <input type="text" name="username" value="<?= $admin['username'] ?>" required>
                        </td>
                        <td>
                            <input type="text" name="password" value="<?= $admin['password'] ?>" disabled>
                        </td>
                        <td class="border ">
                            <input type="text" name="email" value="<?= $admin['email'] ?>" required>
                        </td>
                        <td class="border ">
                            <input type="text" name="date_inscription" value="<?= $admin['date_creation'] ?>" readonly>
                        </td>




                    </tr>
                    <tr>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Tous les libraires -->
    <div class="flex flex-col py-6 justify-center items-center">
        <h1 class=" text-3xl underline flex justify-center items-start font-bold p-6"> Tous les Libraires </h1>

        <table class="table-auto">
            <thead>
                <th class="border ">ID</th>
                <th class="border ">Nom d'utilisateur</th>
                <th class="border ">Mot de passe (hash)</th>
                <th class="border ">Email</th>
                <th class="border ">Date d'Inscription <br>(YYYY-MM-DD)</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($query_librarians as $librarian) : ?>
                    <tr>
                        <td class="border ">
                            <input type="text" name="id" value="<?= $librarian['id_bibliothecaire'] ?>" readonly>
                        </td>
                        <td class="border ">
                            <input type="text" name="username" value="<?= $librarian['username'] ?>" required>
                        </td>
                        <td>
                            <input type="text" name="password" value="<?= $librarian['password'] ?>" disabled>
                        </td>
                        <td class="border ">
                            <input type="text" name="email" value="<?= $librarian['email'] ?>" required>
                        </td>
                        <td class="border ">
                            <input type="text" name="date_inscription" value="<?= $librarian['date_inscription'] ?>" readonly>
                        </td>
                    </tr>
                    <tr>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Tous les utilisateurs -->
    <div class="flex flex-col py-6 justify-center items-center">
        <h1 class=" text-3xl underline flex justify-center items-start font-bold p-6"> Tous les Utilisateurs </h1>

        <table class="table-auto">
            <thead>
                <th class="border ">ID</th>
                <th class="border ">Nom d'utilisateur</th>
                <th class="border ">Mot de passe (hash)</th>
                <th class="border ">Email</th>
                <th class="border ">Date d'Inscription <br>(YYYY-MM-DD)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query_users as $user) : ?>
                    <tr>

                        <td class="border ">
                            <input type="text" name="id" value="<?= $user['id_user'] ?>" readonly>
                        </td>
                        <td class="border ">
                            <input type="text" name="username" value="<?= $user['username'] ?>" required>
                        </td>
                        <td>
                            <input type="text" name="password" value="<?= $user['password'] ?>" disabled>
                        </td>
                        <td class="border ">
                            <input type="text" name="email" value="<?= $user['email'] ?>" required>
                        </td>
                        <td class="border ">
                            <input type="text" name="date_inscription" value="<?= $user['date_inscription'] ?>" readonly>
                        </td>


                    </tr>
                    <tr>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
<script src="../output.js"></script>

</html>