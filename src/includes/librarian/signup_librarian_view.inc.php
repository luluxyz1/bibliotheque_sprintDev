<?php

declare(strict_types=1);

function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];

        echo '<br>';
        foreach ($errors as $error) {
            echo '<p class="font-logo text-red-600">' . $error . '</p>';
        }



        unset($_SESSION["errors_signup"]);   
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>'; 
        echo '<p class="bg-green-300 p-3 font-logo text-black"> Inscription réussie. Veuillez à présent vous connecter</p>';
    
    }
}


function signup_inputs() {

    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
         echo '<input type="text" name="username" placeholder="Nom d\'utilisateur" class="p-3 w-1/2 border border-black bg-transparent mb-3" value="' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '<input type="text" name="username" placeholder="Nom d\'utilisateur" class="p-3 w-1/2 border border-black bg-transparent mb-3 ">';
    }

    echo '<input type="password" name="password" placeholder="Mot de passe" class="p-3 w-1/2 border border-black bg-transparent mb-3 ">';

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input type="text" name="email" placeholder="Adresse e-mail" class="p-3 w-1/2 border border-black bg-transparent mb-3 " value="' . $_SESSION["signup_data"]["email"] . '">';
   } else {
       echo '<input type="text" name="email" placeholder="Adresse e-mail" class="p-3 w-1/2 border border-black bg-transparent mb-3 ">';
   }


}