<?php
session_start();
// config.php -> afficher horaires dans le Footer
require_once('./libs/config.php');
require_once('./models/dishe.php');
require_once('./models/disheManager.php');
// Initialisation des messages d'erreur et de succès
$errors = [];
$messages = [];

$manager = new DisheManager();
$dishes = $manager->readAllDishe();
if (empty($dishes)) {
    $messages = "Il n'existe aucun plat dans la Carte";
}
?>

<?php require_once('./templates/cards-list.php'); ?>