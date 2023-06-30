<?php
session_start();
require_once('./libs/config.php');
require_once('./libs/utils.php');
require_once('./src/models/Booking.php');
require_once('./src/models/BookingManager.php');

$errors = [];
$messages = [];

// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (is_admin() == false) {
    header('location: ./index.php');
}

// Vérification si il y a bien une variable $id passée en GET et qu'elle n'est pas vide
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // "Nettoyage" l'Id envoyé
    $id = strip_tags($_GET['id']);
    $manager = new BookingManager();
    $booking = $manager->readBookingById($id);
    // Nb de couverts restants à la date considérée
    $date = $booking->getDate();
    $capacity = $manager->getCapacity($date);

    // On fait d'abord les vérifications avant d'envoyer les modifications
    if ($_POST) {
        // Vérification si les champs sont définis et NON vides
        if (
            isset($_POST['id']) && !empty($_POST['id'])
            && isset($_POST['date']) && !empty($_POST['date'])
            && isset($_POST['seat']) && !empty($_POST['seat'])
            && isset($_POST['name']) && !empty($_POST['name'])
            && isset($_POST['hour']) && !empty($_POST['hour'])
            && isset($_POST['allergies']) && !empty($_POST['allergies'])
        ) {
            // On nettoie les données envoyées
            $id = strip_tags($_POST['id']);
            $date = strip_tags($_POST['date']);
            $seat = strip_tags($_POST['seat']);
            $name = strip_tags($_POST['name']);
            $hour = strip_tags($_POST['hour']);
            $allergies = strip_tags($_POST['allergies']);

            // Nb de couverts restants sans tenir compte de la réservation déjà faite
            $newCapacity = $capacity + $booking->getSeat();

            // Vérification nb de couverts restants sans tenir compte de la réservation actuelle
            // Nécessaire pour pouvoir valider la demande de modification
            if ($seat > $newCapacity) {
                $errors[] = 'Passssss assez de couverts disponibles à cette date';
            } else {
                // Mise à jour de la réservation 
                $modifiedBooking = new Booking();
                $modifiedBooking->setId($id);
                $modifiedBooking->setDate($date);
                $modifiedBooking->setSeat($seat);
                $modifiedBooking->setName($name);
                $modifiedBooking->setHour($hour);
                $modifiedBooking->setAllergies($allergies);

                $check = $manager->updateBooking($modifiedBooking);
                if ($check) {
                    // Message de confirmation
                    $messages[] = 'Votre réservation à été modifié.';
                } else {
                    $errors[] = 'Une erreur est survenue pendant la modification';
                }

                // Pour afficher les places disponibles juste APRÈS une réservation
                if (isset($_POST['date']) && !empty($_POST['date'])) {
                    $capacity = $manager->getCapacity($_POST['date']);
                }
            }
        } else {
            // Il manque des champs
            $errors[] = 'Le formulaire est incomplet';
        }
    }
} else {
    // URL invalide
    header('location: ./404.php');
}

require_once('./templates/booking/updateBooking.php');
