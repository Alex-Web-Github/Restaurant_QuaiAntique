<?php
session_start();
require_once('./libs/utils.php');
require_once('./models/dishe.php');
require_once('./models/disheManager.php');

$errors = [];
$messages = [];

// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (is_admin() == false) {
    header('location: ./index.php');
}

$manager = new DisheManager();
$dishe = new Dishe();

// Vérification si il y a bien une variable $id passée en GET et qu'elle n'est pas vide
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // "Nettoyage" l'Id envoyé
    $id = strip_tags($_GET['id']);
    $dishe = $manager->readDisheById($id);
} else {
    // URL invalide
    header('location: ./404.php');
}

require_once('./templates/readDishe.php');
