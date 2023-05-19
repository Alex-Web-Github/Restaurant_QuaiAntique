<?php
// On définit les variables d'ENVIRONNEMENT
define("DBHOST", "localhost");
define("DBNAME", "quai_antiq");
define("DBADMIN", "root");
define("DBPASS", "");

// DSN de connexion
//$dsn = '"mysql:dname=" . DBNAME . ";host=" . DBHOST';

// Connexion à la BDD avec l'objet PDO
try {
    //$pdo = new PDO($dsn, DBADMIN, DBPASS);
    //$pdo->exec('SET NAMES "utf8"');
    $pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'root', '');
    //echo 'Connexion à la BDD réussie !';
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    die();
}
