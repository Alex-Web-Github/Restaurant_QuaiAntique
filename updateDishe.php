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

// On fait d'abord les vérifications avant d'envoyer les modifications
if ($_POST) {
    // Vérification si les champs sont définis et NON vides
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['category']) && !empty($_POST['category'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['description']) && !empty($_POST['description'])
        && isset($_POST['price']) && !empty($_POST['price'])
    ) {
        // On nettoie les données envoyées
        $id = strip_tags($_POST['id']);
        $category = strip_tags($_POST['category']);
        $title = strip_tags($_POST['title']);
        $description = strip_tags($_POST['description']);
        $price = strip_tags($_POST['price']);

        // traitement des données du formulaire
        $newDishe = new Dishe();
        $newDishe->setId($id);
        $newDishe->setCategory($category);
        $newDishe->setTitle($title);
        $newDishe->setDescription($description);
        $newDishe->setPrice($price);

        $check = $manager->updateDishe($newDishe);
        if ($check) {
            // Message de confirmation
            $messages[] = 'Votre plat à été modifié.';
        } else {
            $errors[] = 'Une erreur est survenue pendant la modification';
        }
    } else {
        // Il manque des champs
        $errors[] = 'Le formulaire est incomplet';
    }
}

// Vérification si il y a bien une variable $id passée en GET et qu'elle n'est pas vide
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // "Nettoyage" l'Id envoyé
    $id = strip_tags($_GET['id']);
    $dishe = $manager->readDisheById($id);
} else {
    // URL invalide
    header('location: ./404.php');
}

require_once('./templates/updateDishe.php');
