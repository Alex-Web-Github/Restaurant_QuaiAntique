<?php
// Connexion à la BDD avec l'objet PDO
try {
    $pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'root', '');
    //echo 'Connexion à la BDD réussie !';
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    die();
}
