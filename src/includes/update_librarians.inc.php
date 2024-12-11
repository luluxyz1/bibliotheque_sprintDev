<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {



    $id_bibliothecaire = $_POST["id_bibliothecaire"];
    $username = $_POST["username"];
    $email = $_POST["email"];


    try {

        require_once "dbh.inc.php";


        $query = "UPDATE librarian SET username = :username, email = :email WHERE id_bibliothecaire = :id_bibliothecaire;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(["username" => $username, "email" => $email, "id_bibliothecaire" => $id_bibliothecaire]);


        $pdo = null;
        $stmt = null;



        header("Location: ../admin_dashboard/manageLibrarians.php?update_Librarians=success");
        die();
    } catch (PDOException $e) {
        echo "Erreur (concernant update_Librarians.inc.php):  " . $e->getMessage();
        die();
    }
} else {
    header("Location: ../admin_dashboard/manageLibrarians.php?update_Librarians=failed");
    die();
}
