<?php
session_start();
require_once('./libs/config.php');
require_once('./libs/utils.php');
require_once('./src/models/Dishe.php');
require_once('./src/models/DisheManager.php');
require_once('./src/models/Booking.php');
require_once('./src/models/BookingManager.php');
require_once('./src/models/User.php');
require_once('./src/models/UserManager.php');

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
$manager = new BookingManager();
$bookings = $manager->readAllBooking();

// Afficher tous les utilisateurs enregistrés
$manager = new UserManager();
$users = $manager->readAllUser();

require_once('./templates/admin.php');
