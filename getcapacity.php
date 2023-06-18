<?php
require_once('./libs/config.php');
require_once('./libs/pdo.php');
require_once('./models/booking.php');

$q = $_GET['q'];
$pdo = dbConnect();
echo getCapacity($pdo, $q);
$pdo = dbClose();
