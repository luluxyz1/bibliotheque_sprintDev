<?php

require_once "includes/dbh.inc.php";
require_once "includes/config_session.inc.php";
require_once "includes/admin/signup_view.inc.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["librarian_username"])) {
    header("location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libraire Dashboard</title>
    <link href="output.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-4xl">LIBRAIRE DASHBOARD </h1><br>

    <?php
    if (isset($_SESSION["librarian_username"])) {
        echo "Bonjour, " .  $_SESSION['librarian_username'];
    } else {
        echo "Bonjour, libraire";
    }
    ?>

    <form action="includes/librarian/logout.inc.php" method="post">
        <button type="submit">Se déconnecter</button>
    </form>
</body>

<script src="output.js"></script>

</html>