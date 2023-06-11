<?php
session_start();
require_once('./src/booking.php');

// Initialisation des messages d'erreur et de succès
$errors = [];
$messages = [];

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
        include_once('./src/pdo.php');
        addBooking($pdo, $date, $seats, $name, $hour, $allergies);

        // Message de confirmation
        $messages[] = 'Votre réservation est enregistrée. Merci et à bientôt chez nous !';
        require_once('./src/close-pdo.php');
    } else {

        $errors[] = 'Le formulaire est incomplet';
    }
}
require('./templates/booking.php');
?>

<script>
    function showCapacity(str) {
        if (str == "") {
            document.getElementById("seatCapacity").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("seatCapacity").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getcapacity.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>