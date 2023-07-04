<?php
session_start();
require_once('./libs/config.php');
require_once('./libs/utils.php');
require_once('./src/models/Gallery.php');
require_once('./src/models/GalleryManager.php');

$errors = [];
$messages = [];

// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (is_admin() == false) {
    header('location: ./index.php');
}

$manager = new GalleryManager();
// Vérification si Id existe et n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // "Nettoyage" de l'Id envoyé
    $id = strip_tags($_GET['id']);
    $galleryToDelete = $manager->readGalleryById($id);

    $check = $manager->deleteGallery($id);
    if ($check) {
        // Message de confirmation
        $messages[] = 'L\'image a bien été supprimée de la BDD';
    } else {
        $errors[] = 'Une erreur est survenue pendant la suppression de L\'image de la BDD';
    }

    // Effacement de l'ancien fichier sur le serveur (voir utils.php)
    deleteFileFromUpload($galleryToDelete->getFile());
    if (is_dir($galleryToDelete->getFile())) {
        // Message de d'erreur
        $errors[] = 'L\'ancien fichier n\'a pas pu être effacé sur le serveur';
    }
} else {
    // Cet URL est invalide 
    header('location: ./404.php');
}

require_once('./templates/gallery/deleteGallery.php');
