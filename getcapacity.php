<?php
require_once('./src/pdo.php');

$q = $_GET['q'];

$sql = "SELECT SUM(couverts) FROM `bookings` WHERE date = :q";
$query = $pdo->prepare($sql);
$query->bindParam(':q', $q, PDO::PARAM_STR);
$query->execute();

$results = $query->fetch();

//$seatCapacity = 20 - $results['SUM(couverts)'];

if (!$results['SUM(couverts)']) {
    // Aucune réservations trouvées, on affiche la capacité maxi de couverts
    die('20');
} else { ?>

    <!-- Je fixe la capacité maxi à 20 couverts et on affiche le nombre de couverts restants -->
    <?= 20 - $results['SUM(couverts)']; ?>

<?php
} ?>