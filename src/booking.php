<?php
//
// Pour retourner le nb de couverts dispo pour une date donnée
//
function getCapacity(PDO $pdo, string $date)
{
    $sql = "SELECT SUM(couverts) FROM `bookings` WHERE date = :q";
    $query = $pdo->prepare($sql);
    $query->bindParam(':q', $date, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetch();
    if (!$results['SUM(couverts)']) {
        // Aucune réservation existante, on affiche la capacité maxi de couverts
        return SEAT_CAPACITY;
    } else {
        //Je fixe la capacité maxi à 20 couverts et on affiche le nombre de couverts restants -->
        return (SEAT_CAPACITY - $results['SUM(couverts)']);
    }
}
//
// Pour AJOUTER une réservation à la BDD
//
function addBooking(PDO $pdo, string $date, int $seats, string $name, string $hour, string $allergies)
{
    // Vérification du nb de couverts dispo avant d'ajouter la réservation à la BDD
    $seatCapacity = getCapacity($pdo, $date);
    if ($seats > $seatCapacity) {
        return 'Capacity error';
    } else {
        $sql = "INSERT INTO `bookings`(`date`, `couverts`, `nom`, `hour`, `allergies`) VALUES (:date, :seats, :name, :hour, :allergies)";

        $query = $pdo->prepare($sql);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':seats', $seats, PDO::PARAM_INT);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':hour', $hour, PDO::PARAM_STR);
        $query->bindParam(':allergies', $allergies, PDO::PARAM_STR);
        $query->execute();
        return 'ok';
    }
}
//
// Requête pour afficher les réservations pour la date considérée
//
function getBookingsByDate(PDO $pdo, string $q)
{
    $sql = "SELECT * FROM `bookings` WHERE date = :q";
    $query = $pdo->prepare($sql);
    $query->bindParam(':q', $q, PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll(pdo::FETCH_ASSOC);
}
//
// Requête pour afficher TOUTES les réservations pour la date considérée
//
function getBookings(PDO $pdo)
{
    $sql = "SELECT * FROM `bookings` ";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(pdo::FETCH_ASSOC);
}
