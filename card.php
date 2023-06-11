<?php
session_start();
// Initialisation des messages d'erreur et de succès
$errors = [];
$messages = [];

require_once('./src/dishe.php');
require_once('./src/pdo.php');
$dishes = getDishes($pdo);
?>

<?php require('./templates/card.php'); ?>