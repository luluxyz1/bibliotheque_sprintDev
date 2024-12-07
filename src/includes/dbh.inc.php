<?php

$host = "localhost";
$dbName = "bibliotheque_sprintdev";
$dbUsername = "root";
$dbPassword = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    echo "Database connection successful";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
