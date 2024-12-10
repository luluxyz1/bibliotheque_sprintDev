<?php

require_once "../dbh.inc.php"

try {

    $query_allUsers = "SELECT * FROM users";
    $stmt_allUsers = $pdo->prepare($query_allUsers);
    $stmt_allUsers->execute();
    $allUsers = $stmt_allUsers->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt_allUsers = null;

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard - Utilisateurs</title>
        <link rel="stylesheet" href="../../output.css">
        <script src="../../output.js"></script>
    </head>

    <body>
        <table>

            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Nom d'utilisateur</th>
                <th>Email</th>
                <th>Mot de passe</th>
            </tr>

            <?php foreach ($allUsers as $user) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['prenom']; ?></td>
                    <td><?php echo $user['nom']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
