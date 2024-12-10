<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    try {

        require_once "dbh.inc.php";

        $id_user = $_POST["id_user"];
        $id_admin = $_POST["id_admin"];
        $id_bibliothecaire = $_POST["id_bibliothecaire"];

        if ($id_admin) {
        }
        $query = "DELETE FROM users WHERE id_user = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);

        $pdo = null;
        $stmt = null;

        header("Location: ../admin_dashboard/manageAllUsers.php?delete_user=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant delete_user.inc.php):  " . $e->getMessage();
    }
} else {
    header("Location: ../admin_dashboard/manageAllUsers.php");
    die();
}
