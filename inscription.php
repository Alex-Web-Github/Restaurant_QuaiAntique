<?php
session_start();
require_once('./libs/config.php');
require_once('./src/models/User.php');
require_once('./src/models/UserManager.php');

// Initialisation des 'Array' des messages d'erreur et de succès
$errors = [];
$messages = [];

$manager = new UserManager();

// Rendre la page 'inscription.php' inaccessible si l'utilisateur est déjà connecté
if (isset($_SESSION['user'])) {
    header('location: ./profil.php');
}
// On vérifie que le formulaire a bien été soumis
if (!empty($_POST)) {
    // Vérification du bon remplissage des champs ET avec des champs non vides
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        // Vérification si l'email est bien un email (le type 'email' n'est pas suffisant car modifiable en Front avec l'inspecteur de code)
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email invalide';
        } else {

            // Alors on peut commencer l'inscription du nouvel utilisateur dans la BDD
            $newUser = new User();
            $newUser->setEmail($_POST['email']);
            $newUser->setPassword($_POST['password']);

            $res = $manager->addUser($newUser);

            if ($res) {
                // Vérification si l'inscription s'est bien déroulée
                $messages[] = 'Merci pour votre inscription ! Vous pouvez vous connecter';
            } else {
                // Problème durant l'insertion en BDD
                $errors[] = 'Une erreur s\'est produite lors de votre inscription';
            }
        }
    } else {
        // Problème de remplissage des champs ET/OU des champs sont vides
        $errors[] = 'Formulaire incomplet';
    }
}

require_once('./templates/inscription.php');
