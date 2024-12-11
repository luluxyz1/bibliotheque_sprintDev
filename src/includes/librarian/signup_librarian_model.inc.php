<?php

declare(strict_types=1);

function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM librarian WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(object $pdo, string $email)
{
    $query = "SELECT username FROM librarian WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $password, string $email,  string $username)
{
    $query = "INSERT INTO librarian (username, password, email) VALUES (:username, :password, :email);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12,
    ];
    $hashedpassword = password_hash($password, PASSWORD_BCRYPT, $options);


    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashedpassword);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}
