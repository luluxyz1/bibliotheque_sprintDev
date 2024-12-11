<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id_admin"];

    try {

        require_once "dbh.inc.php";



        $query = "DELETE FROM admin WHERE id_admin = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);

        $pdo = null;
        $stmt = null;

        header("Location: ../admin_dashboard/manageAdmins.php?=deleteadmin=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant delete_admin.inc.php):  " . $e->getMessage();
    }
} else {
    header("Location: ../admin_dashboard/manageAdmins.php?deleteadmin=faileda");
    die();
}
