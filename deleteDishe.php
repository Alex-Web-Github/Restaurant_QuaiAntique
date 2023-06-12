<?php
session_start();
include_once('./libs/utils.php');
include_once('./libs/pdo.php');
require_once('./src/dishe.php');
$errors = [];
$messages = [];

// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (is_admin() == false) {
    header('location: ./index.php');
}

// Vérification si Id existe et n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // "Nettoyage" de l'Id envoyé
    $id = strip_tags($_GET['id']);
    $pdo = dbConnect();
    $dishe = deleteDishe($pdo, $id);
    $pdo = dbClose();
} else {
    // Cet URL est invalide 
    header('location: ./404.php');
}
