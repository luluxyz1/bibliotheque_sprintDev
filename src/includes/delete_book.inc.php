<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id_livre"];

    try {

        require_once "dbh.inc.php";
        require_once "add_book.contr.inc.php";


        $sql = "DELETE FROM livre WHERE id_livre = ?";


        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: ../index.php");
    exit();
}
