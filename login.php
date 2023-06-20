<?php
session_start();
require_once('./libs/config.php');
require_once('./models/users.php');

$errors = [];
$messages = [];
// Pour rendre la page 'login.php' inaccessible si l'utilisateur est déjà connecté
if (isset($_SESSION['user'])) {
    header('location: ./profil.php');
}

$users = new Users;
$check = '';

// On vérifie que le formulaire a bien été soumis
if (!empty($_POST)) {
    // Vérification du bon remplissage des champs ET avec des champs non vides
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        // Vérification si l'email est bien un email (le type 'email' n'est pas suffisant car modifiable en Front avec l'inspecteur de code)
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Format d\'Email invalide';
        } else {
            // Email valide, on lance ensuite la vérification du Password
            // Vérification du Password
            $check = $users->verifyUserLoginPassword($_POST['email'], $_POST['password']);
            $errors[] = $check;
        }
    } else {
        $errors[] = 'Formulaire incomplet';
    }
}

require_once('./templates/login.php');
