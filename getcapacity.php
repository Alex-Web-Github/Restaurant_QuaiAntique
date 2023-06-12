<?php
include_once('./libs/pdo.php');
include_once('./src/booking.php');

$q = $_GET['q'];
$pdo = dbConnect();
echo getCapacity($pdo, $q);
$pdo = dbClose();
