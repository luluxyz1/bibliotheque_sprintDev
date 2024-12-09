<?php

declare(strict_types=1);

function add_book(string $titre, string $auteur, int $annee, int $tome, string $genre, string $etat)
{
    try {

        require_once "dbh.inc.php";

        $sql = "INSERT INTO livre (nom_livre, auteur_livre, annee_livre, tome_livre, genre_livre, etat_livre) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titre, $auteur, $annee, $tome, $genre, $etat]);

        header("Location: ../index.php?add_book=success");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function tome_exists(int $tome): bool
{
    require_once "dbh.inc.php";

    $sql = "SELECT tome_livre FROM livres WHERE tome_livre = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tome]);

    $tome = $stmt->fetch();

    if ($tome) {
        return true;
    } else {
        return false;
    }
}
