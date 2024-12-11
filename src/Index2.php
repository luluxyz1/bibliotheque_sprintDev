<?php
require_once "includes/dbh.inc.php";
if (isset($pdo)) {
    echo "Connexion réussie à la base de données.";
} else {
    echo "Erreur : \$pdo n'est pas défini.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Emprunts</title>
</head>
<body>
    <h1>Gestion des Emprunts</h1>

    <!-- Formulaire pour emprunter -->
    <h2>Emprunter un Livre</h2>
    <form action="borrow.php" method="POST">
        <label for="id_user">ID Utilisateur :</label>
        <input type="number" name="id_user" id="id_user" required>

        <label for="id_livre">ID Livre :</label>
        <input type="number" name="id_livre" id="id_livre" required>

        <button type="submit">Emprunter</button>
    </form>

    <!-- Formulaire pour retourner -->
    <h2>Retourner un Livre</h2>
    <form action="return.php" method="POST">
        <label for="id_emprunt">ID Emprunt :</label>
        <input type="number" name="id_emprunt" id="id_emprunt" required>

        <button type="submit">Retourner</button>
    </form>
</body>
</html>
