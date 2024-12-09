<?php

declare(strict_types=1);

function is_input_empty(string $pwd, string $email, string $prenom, string $nom)
{
    if (empty($pwd) || empty($email) || empty($prenom) || empty($nom)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $pwd, string $email,  string $prenom, string $nom)
{
    set_user($pdo, $pwd, $email, $prenom, $nom);
}
