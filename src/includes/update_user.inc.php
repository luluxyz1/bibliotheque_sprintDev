<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once "dbh.inc.php";

    $id = $_POST["id_user"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $username = $_POST["username"];
    $email = $_POST["email"];

    try {

        $query = "UPDATE users SET nom = ?, prenom = ?, username = ?, email = ? WHERE id_user = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$nom, $prenom, $username, $email, $id]);

        $pdo = null;
        $stmt = null;

        header("Location: ../admin_dashboard/manageAllUsers.php?update_user=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant update_user.inc.php):  " . $e->getMessage();
    }
} else {
    header("Location: ../admin_dashboard/manageAllUsers.php");
    die();
}
