<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    try {

        require_once "../dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        //gestion des erreurs
        $errors = [];

        // Vérifie si les champs sont vides
        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Veuillez remplir tous les champs.";
        }

        // Récupère l'utilisateur à partir du nom d'utilisateur
        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Le nom d'utilisateur est incorrect.";
        }
        if (!is_username_wrong($result) && is_password_wrong($password, $result["password"])) {
            $errors["login_incorrect"] = "Le mot de passe est incorrect.";
        }


        require_once '../config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;


            header("Location: librarian_login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["librarian_id"] = $result["id"];
        $_SESSION["librarian_username"] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: ../../librarian_dashboard.php?login=success");
        $pdo = null;
        $stmt = null;







        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../login.php");
    die();
}
