<?php
require_once "includes/dbh.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idEmprunt = $_POST['id_emprunt'];
    $dateRetour = date('Y-m-d'); // Date actuelle pour le retour

    // Mettre à jour la date de retour
    $query = "UPDATE emprunt SET date_retour = :date_retour WHERE id_emprunt = :id_emprunt";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'date_retour' => $dateRetour,
        'id_emprunt' => $idEmprunt
    ]);

    echo "Livre retourné avec succès.";
}
