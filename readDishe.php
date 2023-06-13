<?php
session_start();
require_once('./libs/utils.php');
require_once('./libs/pdo.php');
require_once('./src/dishe.php');
$errors = [];
$messages = [];

// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (is_admin() == false) {
    header('location: ./index.php');
}

// Vérification si Id existe et n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // "Nettoyage" l'Id envoyé
    $id = strip_tags($_GET['id']);

    $pdo = dbConnect();
    $dishe = getDisheById($pdo, $id);

    // On vérifie si le plat existe dans la BDD
    if (!$dishe) {
        // Cet Id n\'existe pas
        header('location: ./404.php');
    }
} else {
    // Cet URL invalide
    header('location: ./404.php');
}
$pdo = dbClose();

require('./templates/readDishe.php');
