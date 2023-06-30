<?php
session_start();
require_once('./libs/config.php');
require_once('./src/models/Booking.php');
require_once('./src/models/BookingManager.php');

// Initialisation des variables
$errors = [];
$messages = [];
$capacity = [];

$manager = new BookingManager();

// On vérifie que le formulaire a bien été soumis
if (!empty($_POST)) {
    // Vérification si les champs sont définis et NON vides
    if (
        isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['date']) && !empty($_POST['date'])
        && isset($_POST['seat']) && !empty($_POST['seat'])
        && isset($_POST['hour']) && !empty($_POST['hour'])
        && isset($_POST['allergies'])
    ) {
        // On nettoie les données envoyées
        $date = strip_tags($_POST['date']);
        $seat = strip_tags($_POST['seat']);
        $name = strip_tags($_POST['name']);
        $hour = strip_tags($_POST['hour']);
        $allergies = strip_tags($_POST['allergies']);

        // Vérification de la capacité en couverts
        $capacity = $manager->getCapacity($date);

        if ($seat > $capacity) {
            $errors[] = 'Pas assez de couverts disponibles à cette date';
        } else {
            $newBooking = new Booking();
            $newBooking->setDate($date);
            $newBooking->setSeat($seat);
            $newBooking->setName($name);
            $newBooking->setHour($hour);
            $newBooking->setAllergies($allergies);
            // Enregistrement de la réservation en BDD 
            $manager->addBooking($newBooking);

            // Pour afficher les places disponibles juste APRÈS une réservation
            if (isset($_POST['date']) && !empty($_POST['date'])) {
                $capacity = $manager->getCapacity($_POST['date']);
            }

            // Message de confirmation de la réservation
            $messages[] = 'Merci pour votre réservation, à bientôt !';
        }
    } else {

        $errors[] = 'Le formulaire est incomplet';
    }
}

require_once('./templates/booking/booking.php');
