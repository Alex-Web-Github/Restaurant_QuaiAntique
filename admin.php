<?php
session_start();
require_once('./libs/utils.php');
require_once('./libs/pdo.php');
require_once('./src/dishe.php');
require_once('./src/booking.php');
require_once('./src/user.php');
// Initialisation des messages d'erreur et de succès si besoin
$errors = [];
$messages = [];

// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (is_admin() == false) {
    header('location: ./index.php');
}

// Je récupère tous les plats depuis la BDD avec cette fonction
$pdo = dbConnect();
$dishes = getDishes($pdo);
$bookings = getBookings($pdo);
$users = getUsers($pdo);
$pdo = dbClose();

require('./templates/admin.php');
