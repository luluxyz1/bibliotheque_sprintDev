<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id_livre"];
    $titre = $_POST["nom_livre"];
    $auteur = $_POST["auteur_livre"];
    $annee = $_POST["annee_livre"];
    $tome = $_POST["tome_livre"];
    $genre = $_POST["genre_livre"];
    $etat = $_POST["etat_livre"];

    try {

        require_once "dbh.inc.php";

        $id = $_POST["id_livre"];

        $query = "DELETE FROM livre WHERE id_livre = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php?delete_book=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant delete_book.inc.php):  " . $e->getMessage();
    }
} else {
    header("Location: ../index.php");
    die();
}
