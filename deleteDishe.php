<?php
session_start();
require_once('./libs/config.php');
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
// Vérification si Id existe et n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // "Nettoyage" de l'Id envoyé
    $id = strip_tags($_GET['id']);
    $manager->readDisheById($id);
    $check = $manager->deleteDishe($id);
    if ($check) {
        // Message de confirmation
        $messages[] = 'Le plat a bien été supprimé';
    } else {
        $errors[] = 'Une erreur est survenue pendant la suppression';
    }
} else {
    // Cet URL est invalide 
    header('location: ./404.php');
}

require_once('./templates/deleteDishe.php');
