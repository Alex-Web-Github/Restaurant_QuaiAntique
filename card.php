<?php
session_start();
// config.php -> afficher horaires dans le Footer
require_once('./libs/config.php');
require_once('./models/dishes.php');
// Initialisation des messages d'erreur et de succès
$errors = [];
$messages = [];

$dishes = new Dishes();
$dishes = $dishes->getDishes();
?>

<?php require_once('./templates/cards-list.php'); ?>