<?php
session_start();
require_once('./libs/config.php');
require_once('./src/models/User.php');
require_once('./src/models/UserManager.php');

$errors = [];
$messages = [];
// Pour rendre la page 'login.php' inaccessible si l'utilisateur est déjà connecté
if (isset($_SESSION['user'])) {
    header('location: ./profil.php');
}

$manager = new UserManager;
//$check = '';

// On vérifie que le formulaire a bien été soumis
if (!empty($_POST)) {
    // Vérification du bon remplissage des champs ET avec des champs non vides
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        // Vérification si l'email est bien un email (le type 'email' n'est pas suffisant car modifiable en Front avec l'inspecteur de code)
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Format d\'Email invalide';
        } else {
            // Email valide, instanciation de $checkUser
            $checkUser = new User();
            $checkUser->setEmail($_POST['email']);
            $checkUser->setPassword($_POST['password']);
            // On lance ensuite la vérification du Password   
            $check = $manager->verifyUserLoginPassword($checkUser);
            $errors[] = $check;
        }
    } else {
        $errors[] = 'Formulaire incomplet';
    }
}

require_once('./templates/login.php');
