<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id_bibliothecaire = $_POST["id_bibliothecaire"];

    try {

        require_once "dbh.inc.php";


        $query = "DELETE FROM librarian WHERE id_bibliothecaire = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id_bibliothecaire]);

        $pdo = null;
        $stmt = null;

        header("Location: ../admin_dashboard/manageLibrarians.php?=deletelibrarian=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant delete_book.inc.php):  " . $e->getMessage();
    }
} else {
    header("Location: ../admin_dashboard/manageLibrarians.php?deletelibrarian=faileda");
    die();
}
