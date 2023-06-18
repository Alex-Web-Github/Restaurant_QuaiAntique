<?php
session_start();
require_once('./libs/config.php');
require_once('./libs/pdo.php');
require_once('./models/dishe.php');
// Initialisation des messages d'erreur et de succès
$errors = [];
$messages = [];

$pdo = dbConnect();
$dishes = getDishes($pdo);
$pdo = dbClose();
?>

<?php require('./templates/card.php'); ?>