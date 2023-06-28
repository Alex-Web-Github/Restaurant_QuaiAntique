<?php
session_start();
require_once('./libs/config.php');
require_once('./libs/utils.php');
require_once('./models/bookings.php');
require_once('./models/users.php');
require_once('./models/dishe.php');
require_once('./models/disheManager.php');
// Initialisation des messages d'erreur et de succès si besoin
$errors = [];
$messages = [];

// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (is_admin() == false) {
    header('location: ./index.php');
}

// Afficher tous les plats de la Carte
$manager = new DisheManager();
$dishes = $manager->readAllDishe();

// Afficher toutes les réservations
// $bookings = new Bookings();
// $bookings = $bookings->getBookings();

// Afficher tous les utilisateurs enregistrés
// $users = new Users();
// $users = $users->getUsers();

require_once('./templates/admin.php');
