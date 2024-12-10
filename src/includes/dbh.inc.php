<?php

$host = "localhost";
$dbName = "bibliotheque_sprintdev";
$dbUsername = "root";
$dbPassword = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connecté à '$dbName' sur '$host' avec succès.";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
