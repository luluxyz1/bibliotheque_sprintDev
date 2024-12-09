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




        $query = "UPDATE livre SET nom_livre = :nom_livre, auteur_livre = :auteur_livre, annee_livre = :annee_livre, tome_livre = :tome_livre, genre_livre = :genre_livre, etat_livre = :etat_livre WHERE id_livre = :id_livre";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nom_livre', $titre);
        $stmt->bindParam(':auteur_livre', $auteur);
        $stmt->bindParam(':annee_livre', $annee);
        $stmt->bindParam(':tome_livre', $tome);
        $stmt->bindParam(':genre_livre', $genre);
        $stmt->bindParam(':etat_livre', $etat);
        $stmt->bindParam(':id_livre', $id);
        $stmt->execute();
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
