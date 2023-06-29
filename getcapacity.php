<?php
require_once('./libs/config.php');
require_once('./models/bookingManager.php');

$manager = new BookingManager();
$capacity = [];

$q = $_GET['q'];
$capacity = $manager->getCapacity($q);
// Puis renvoyer en AJAX le nb de places restantes (à la date $q) sur la page booking.php 
echo $capacity;
