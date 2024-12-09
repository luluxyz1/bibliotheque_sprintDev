<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once "dbh.inc.php";

    $id = $_POST["id_livre"];
    $titre = $_POST["nom_livre"];
    $auteur = $_POST["auteur_livre"];
    $annee = $_POST["annee_livre"];
    $tome = $_POST["tome_livre"];
    $genre = $_POST["genre_livre"];
    $etat = $_POST["etat_livre"];

    try {




        $query = "UPDATE livre SET nom_livre = ?, auteur_livre = ?, annee_livre = ?, tome_livre = ?, genre_livre = ?, etat_livre = ? WHERE id_livre = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$titre, $auteur, $annee, $tome, $genre, $etat, $id]);


        $pdo = null;
        $stmt = null;



        header("Location: ../index.php?update_book=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant update_book.inc.php):  " . $e->getMessage();
    }
} else {
    header("Location: ../index.php");
    die();
}
