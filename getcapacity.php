<?php
require_once('./libs/config.php');
require_once('./models/booking.php');

$booking = new Booking();
$capacity = [];

$q = $_GET['q'];
$capacity = $booking->getCapacity($q);
// Puis renvoyer en AJAX le nb de places restantes (à la date $q) sur la page booking.php 
echo $capacity;
