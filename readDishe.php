<?php
session_start();
require_once('./src/dishe.php');
$errors = [];
$messages = [];

// Vérification si Id existe et n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // "Nettoyage" l'Id envoyé
    $id = strip_tags($_GET['id']);

    require_once('./src/pdo.php');
    $dishe = getDisheById($pdo, $id);
    require_once('./src/close-pdo.php');

    // On vérifie si le plat existe dans la BDD
    if (!$dishe) {
        // Cet Id n\'existe pas
        header('location: ./404.php');
    }
} else {
    // Cet URL invalide
    header('location: ./404.php');
}
require('./templates/readDishe.php');
