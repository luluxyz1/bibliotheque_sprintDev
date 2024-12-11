<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id_user = $_POST["id_user"];

    try {

        require_once "dbh.inc.php";



        $query = "DELETE FROM users WHERE id_user = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id_user]);

        $pdo = null;
        $stmt = null;

        header("Location: ../admin_dashboard/manageUsers.php?=deleteuser=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant delete_user.inc.php):  " . $e->getMessage();
    }
} else {
    header("Location: ../admin_dashboard/manageUsers.php?deleteuser=faileda");
    die();
}
