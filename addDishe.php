<?php
session_start();
require_once('./src/dishe.php');
$errors = [];
$messages = [];

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
        require_once('./src/pdo.php');
        addDishe($pdo, $category, $title, $description, $price);
        // Message de confirmation
        $messages[] = 'Votre plat à été ajouté.';
        require_once('./src/close-pdo.php');
        
        // Redirection vers page d'Accueil
        header('location: ./admin.php');
    } else {
        $errors[] = 'Le formulaire est incomplet';
    }

}

require_once('./templates/addDishe.php');
