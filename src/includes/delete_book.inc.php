<?php

if ($SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id_livre"];

    try {

        require_once "dbh.inc.php";
        require_once "delete_book.contr.inc.php";

        delete_book($id);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: ../index.php");
    exit();
}
