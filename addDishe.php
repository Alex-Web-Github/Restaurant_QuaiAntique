<?php
session_start();
require_once('./libs/utils.php');
require_once('./libs/config.php');
require_once('./src/models/Dishe.php');
require_once('./src/models/DisheManager.php');
$errors = [];
$messages = [];

// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (is_admin() == false) {
    header('location: ./index.php');
}

if ($_POST) {
    // Vérification si les champs sont définis et NON vides
    if (
        isset($_POST['category']) && !empty($_POST['category'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['description']) && !empty($_POST['description'])
        && isset($_POST['price']) && !empty($_POST['price'])
    ) {
        // On nettoie les données envoyées
        $category = strip_tags($_POST['category']);
        $title = strip_tags($_POST['title']);
        $description = strip_tags($_POST['description']);
        $price = strip_tags($_POST['price']);

        // traitement des données du formulaire
        $newDishe = new Dishe();
        $newDishe->setCategory($category);
        $newDishe->setTitle($title);
        $newDishe->setDescription($description);
        $newDishe->setPrice($price);

        $dishes = new DisheManager();
        $dishes->addDishe($newDishe);

        // Message de confirmation
        $messages[] = 'Votre plat à été ajouté.';

        // Redirection vers page d'Accueil
        header('location: ./admin.php');
    } else {
        $errors[] = 'Le formulaire est incomplet';
    }
}

require_once('./templates/dishe/addDishe.php');
