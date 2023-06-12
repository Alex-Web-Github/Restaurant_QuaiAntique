<?php
function dbConnect()
{
    try {
        $pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'root', '');
        return $pdo;
    } catch (PDOException $e) {
        return ('Erreur : ' . $e->getMessage());
        die();
    }
}

function dbClose()
{
    return $pdo = null;
}
