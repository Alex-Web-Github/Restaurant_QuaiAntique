<?php
// Connexion à la BDD avec l'objet PDO
try {
    $pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'root', '');
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    die();
}
