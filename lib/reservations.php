<?php
//
// Pour AJOUTER une réservation à la BDD
//
function addBooking(PDO $pdo, string $date, int $seats, string $name, string $hour, string $allergies)
{
    $sql = "INSERT INTO `bookings`(`date`, `couverts`, `nom`, `hour`, `allergies`) VALUES (:date, :seats, :name, :hour, :allergies)";

    $query = $pdo->prepare($sql);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':seats', $seats, PDO::PARAM_INT);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':hour', $hour, PDO::PARAM_STR);
    $query->bindParam(':allergies', $allergies, PDO::PARAM_STR);

    $query->execute();
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
