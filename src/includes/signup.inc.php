<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $pwd = $_POST["password"];
    $email = $_POST["email"];


    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";


        //gestion des erreurs
        $errors = [];

        if (is_input_empty($pwd, $email, $prenom, $nom)) {
            $errors["empty_input"] = "Veuillez remplir tous les champs.";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Adresse e-mail invalide.";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Adresse e-mail déjà enregistrée.";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../signup.php");
            die();
        }


        create_user($pdo, $pwd, $email, $prenom, $nom);

        header("refresh:2;url=../login.php?signup=succes");


        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../signup.php");
    die();
}
