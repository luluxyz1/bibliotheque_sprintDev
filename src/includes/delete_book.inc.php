<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    try {

        require_once "dbh.inc.php";

        $id = $_POST["id_livre"];

        $query = "DELETE FROM livre WHERE id_livre = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);

        $pdo = null;
        $stmt = null;

        header("Location: ../admin_dashboard/manageBook.php?delete_book=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant delete_book.inc.php):  " . $e->getMessage();
    }
} else {
    header("Location: ../admin_dashboard/manageBook.php");
    die();
}
