<?php
session_start();

require_once "includes/dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id_livre"];
    // date retour = intervalle de 15 jours à partir de la date d'emprunt
    $date_retour = date('Y-m-d', strtotime($_POST["date_emprunt"] . ' + 15 days'));
    $date_emprunt = date('Y-m-d', strtotime($_POST["date_emprunt"]));

    try {

        $query = "UPDATE book SET etat_livre = ?, id_user = ?, date_emprunt = ?, date_retour = ? WHERE id_livre = ?;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(["Réservé", $_SESSION["user_id"], $date_emprunt, $date_retour, $id]);

        $pdo = null;
        $stmt = null;

        header("Location: ../search_book.php?borrow_book=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant borrow_book.inc.php):  " . $e->getMessage();
    }
} else {
    header("Location: ../search_book.php?borrow_book=failed");
    die();
}
