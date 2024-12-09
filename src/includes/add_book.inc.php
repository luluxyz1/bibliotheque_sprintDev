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

        $query = "INSERT INTO livre (nom_livre, auteur_livre, annee_livre, tome_livre, genre_livre, etat_livre) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$titre, $auteur, $annee, $tome, $genre, $etat]);

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php?add_book=success");
        die();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: ../index.php?add_book=error");
    exit();
}
