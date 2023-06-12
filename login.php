<?php
session_start();
include_once('./libs/pdo.php');
require_once('./src/user.php');

$errors = [];
$messages = [];
// Pour rendre la page 'login.php' inaccessible si l'utilisateur est déjà connecté
if (isset($_SESSION['user'])) {
    header('location: ./profil.php');
}

// On vérifie que le formulaire a bien été soumis
if (!empty($_POST)) {
    // Vérification du bon remplissage des champs ET avec des champs non vides
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        // Vérification si l'email est bien un email (le type 'email' n'est pas suffisant car modifiable en Front avec l'inspecteur de code)
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Format d\'Email invalide';
        } else {
            // Email valide, on lance ensuite la vérification du Password
            // Connexion à la BDD 
            $pdo = dbConnect();
            // Vérification du Password
            $check = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
            $errors[] = $check;
        }
    } else {
        $errors[] = 'Formulaire incomplet';
    }
}
$pdo = dbClose();

require('./templates/login.php');
