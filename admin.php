<?php
session_start();
// Initialisation des messages d'erreur et de succès si besoin
$errors = [];
$messages = [];

// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] == 'client') {
    header('location: ./index.php');
}

require_once('./src/pdo.php');
require_once('./src/dishe.php');
require_once('./src/booking.php');
require_once('./src/user.php');

// Je récupère tous les plats depuis la BDD avec cette fonction
$dishes = getDishes($pdo);
$bookings = getBookings($pdo);
$users = getUsers($pdo);

require('./templates/admin.php');
