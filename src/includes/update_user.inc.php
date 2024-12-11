<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {



    $id_user = $_POST["id_user"];
    $username = $_POST["username"];
    $email = $_POST["email"];


    try {

        require_once "dbh.inc.php";


        $query = "UPDATE users SET username = :username, email = :email WHERE id_user = :id_user;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(["username" => $username, "email" => $email, "id_user" => $id_user]);


        $pdo = null;
        $stmt = null;



        header("Location: ../admin_dashboard/manageUsers.php?update_users=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant update_users.inc.php):  " . $e->getMessage();
        die();
    }
} else {
    header("Location: ../admin_dashboard/manageLibrarians.php?update_users=failed");
    die();
}
