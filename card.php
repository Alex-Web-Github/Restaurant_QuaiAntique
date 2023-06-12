<?php
session_start();
include_once('./libs/pdo.php');
require_once('./src/dishe.php');
// Initialisation des messages d'erreur et de succès
$errors = [];
$messages = [];

$pdo = dbConnect();
$dishes = getDishes($pdo);
$pdo = dbClose();
?>

<?php require('./templates/card.php'); ?>