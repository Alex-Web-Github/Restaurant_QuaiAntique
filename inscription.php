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
    if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['allergies'], $_POST['guest']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['guest'])) {

        // Vérification si l'email est bien un email (le type 'email' n'est pas suffisant car modifiable en Front avec l'inspecteur de code)
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email invalide';
        } else {

            // Alors on peut commencer l'inscription du nouvel utilisateur dans la BDD
            $newUser = new User();
            $role = 'client'; // Valeur par défaut
            $firstname = strip_tags($_POST['firstname']);
            $lastname = strip_tags($_POST['lastname']);
            $allergies = strip_tags($_POST['allergies']);
            $guest = strip_tags($_POST['guest']);

            $newUser->setFirstname($firstname);
            $newUser->setLastname($lastname);
            $newUser->setEmail($_POST['email']);
            $newUser->setPassword($_POST['password']);
            $newUser->setRole($role);
            $newUser->setAllergies($allergies);
            $newUser->setGuest($guest);

            $check = $manager->addUser($newUser);

            // Vérification si l'inscription s'est bien déroulée
            if ($check) {
                // Redirection vers la page Profil
                header('location: ./login.php');
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
