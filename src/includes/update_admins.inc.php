<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {



    $id_admin = $_POST["id_admin"];
    $username = $_POST["username"];
    $email = $_POST["email"];


    try {

        require_once "dbh.inc.php";


        $query = "UPDATE admin SET username = :username, email = :email WHERE id_admin = :id_admin;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(["username" => $username, "email" => $email, "id_admin" => $id_admin]);


        $pdo = null;
        $stmt = null;



        header("Location: ../admin_dashboard/manageAdmins.php?update_admin=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant update_admins.inc.php):  " . $e->getMessage();
        die();
    }
} else {
    header("Location: ../admin_dashboard/manageAdmins.php?update_admin=failed");
    die();
}
