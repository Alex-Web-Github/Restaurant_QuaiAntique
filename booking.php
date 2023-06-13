<?php
session_start();
require_once('./libs/config.php');
require_once('./libs/pdo.php');
require_once('./src/booking.php');

// Initialisation des variables
$errors = [];
$messages = [];
$capacity = '';

// On vérifie que le formulaire a bien été soumis
if (!empty($_POST)) {
    // Vérification si les champs sont définis et NON vides
    if (
        isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['date']) && !empty($_POST['date'])
        && isset($_POST['seats']) && !empty($_POST['seats'])
        && isset($_POST['hour']) && !empty($_POST['hour'])
        && isset($_POST['allergies'])
    ) {

        // On nettoie les données envoyées
        $date = strip_tags($_POST['date']);
        $seats = strip_tags($_POST['seats']);
        $name = strip_tags($_POST['name']);
        $hour = strip_tags($_POST['hour']);
        $allergies = strip_tags($_POST['allergies']);

        // traitement des données du formulaire 
        $pdo = dbConnect();
        $result = addBooking($pdo, $date, $seats, $name, $hour, $allergies);
        // Ci-dessous pour afficher les places disponibles juste après une réservation
        $capacity = getCapacity($pdo, $date);

        if ($result == 'ok') {
            $messages[] = 'Merci pour votre réservation, à bientôt !';
        } else {
            $errors[] = 'Pas assez de couverts disponibles à cette date';
        }
    } else {
        // 
        if (isset($_POST['date']) && !empty($_POST['date'])) {
            $pdo = dbConnect();
            $capacity = getCapacity($pdo, $_POST['date']);
        }
        $errors[] = 'Le formulaire est incomplet';
    }
}
$pdo = dbClose();

require('./templates/booking.php');
