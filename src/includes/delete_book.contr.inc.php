<?php

declare(strict_types=1);

function delete_book(int $id): void
{
    require_once "dbh.inc.php";

    $sql = "DELETE FROM livre WHERE id_livre = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header("Location: ../index.php?delete_book=success");
    exit();  
}
