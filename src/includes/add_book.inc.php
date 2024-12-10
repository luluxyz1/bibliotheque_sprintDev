<?php
session_start();

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

        // Check if the book already exists
        $checkQuery = "SELECT COUNT(*) FROM livre WHERE nom_livre = ? AND auteur_livre = ? AND annee_livre = ? AND tome_livre = ? AND genre_livre = ? AND etat_livre = ?";
        $checkStmt = $pdo->prepare($checkQuery);
        $checkStmt->execute([$titre, $auteur, $annee, $tome, $genre, $etat]);
        $bookExists = $checkStmt->fetchColumn();

        if ($bookExists > 0) {
            $_SESSION['book_exists'] = "Le livre existe déjà.";
            header("Location: ../manageBook.php");
            exit();
        }

        // Insert the new book
        $query = "INSERT INTO livre (nom_livre, auteur_livre, annee_livre, tome_livre, genre_livre, etat_livre) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$titre, $auteur, $annee, $tome, $genre, $etat]);

        $pdo = null;
        $stmt = null;

        $_SESSION['book_exists'] = "Livre ajouté avec succès.";
        header("Location: ../manageBook.php");
        die();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    $_SESSION['book_exists'] = "Erreur lors de l'ajout du livre.";
    header("Location: ../manageBook.php");
    exit();
}
