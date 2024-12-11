<?php

require_once "includes/dbh.inc.php"; // Chemin vers votre fichier dbh.inc.php

if (isset($pdo)) {
    echo "Connexion réussie à la base de données.";
} else {
    echo "Erreur : \$pdo n'est pas défini.";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUser = $_POST['id_user'];
    $idLivre = $_POST['id_livre'];
    $dateEmprunt = date('Y-m-d'); // Date actuelle pour l'emprunt

    try {
        // Vérifier si livre déjà emprunté
        $query = "SELECT * FROM emprunt WHERE id_livre = :id_livre AND date_retour IS NULL";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id_livre' => $idLivre]);
        $empruntExistant = $stmt->fetch();

        if ($empruntExistant) {
            echo "Le livre est déjà emprunté.";
            exit;
        }

        // Enregistrer l'emprunt
        $query = "INSERT INTO emprunt (id_user, id_livre, date_emprunt) VALUES (:id_user, :id_livre, :date_emprunt)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'id_user' => $idUser,
            'id_livre' => $idLivre,
            'date_emprunt' => $dateEmprunt
        ]);

        echo "Emprunt enregistré avec succès.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
