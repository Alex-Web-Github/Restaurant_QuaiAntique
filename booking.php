<?php
session_start();
require_once('./libs/config.php');
require_once('./models/booking.php');

// Initialisation des variables
$errors = [];
$messages = [];
$capacity = [];

$newBooking = new Booking();
$myBooking = [];

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

        // Vérification de la capacité en couverts
        $capacity = $newBooking->getCapacity($date);

        if ($seats > $capacity) {
            $errors[] = 'Pas assez de couverts disponibles à cette date';
        } else {

            // Enregistrement de la réservation en BDD 
            $myBooking = $newBooking->addBooking($date, $seats, $name, $hour, $allergies);

            // Pour afficher les places disponibles juste après une réservation
            if (isset($_POST['date']) && !empty($_POST['date'])) {
                $capacity = $newBooking->getCapacity($_POST['date']);
            }

            // Message de confirmation de la réservation
            $messages[] = 'Merci pour votre réservation, à bientôt !';
        }
    } else {

        $errors[] = 'Le formulaire est incomplet';
    }
}

require_once('./templates/booking.php');
