<?php
// On définit les variables d'ENVIRONNEMENT
define("DBHOST", "localhost");
define("DBNAME", "quai_antique");
define("DBADMIN", "root");
define("DBPASS", "");

// DSN de connexion
//$dsn = '"mysql:dname=".DBNAME";host=".DBHOST";charset="utf8mb4';

// Connexion à la BDD avec l'objet PDO
try {
   // $pdo = new PDO($dsn, DBADMIN, DBPASS);
    //$pdo->exec('SET NAMES');
    $pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'root', '');
    //echo 'Connexion à la BDD réussie !';
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    die();
}
