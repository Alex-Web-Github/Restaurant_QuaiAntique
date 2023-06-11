<?php
session_start();
require_once('./src/dishe.php');
$errors = [];
$messages = [];

// Vérification si Id existe et n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // "Nettoyage" de l'Id envoyé
    $id = strip_tags($_GET['id']);
    require_once('./src/pdo.php');
    $dishe = deleteDishe($pdo, $id);
    require_once('./src/close-pdo.php');
} else {
    // Cet URL est invalide 
    header('location: ./404.php');
}
