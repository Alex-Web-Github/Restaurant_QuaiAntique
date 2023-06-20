<?php
class Booking
{
    private $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'root', '');
        } catch (PDOException $e) {
            exit('Erreur : ' . $e->getMessage());
        }
    }

    // Pour retourner les données d'une réservation à une date spécifique
    ///// A TESTER  /////
    ///
    function getBookingByDate(string $date)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM bookings WHERE date = :date');
            $stmt->bindParam(':date', $date, pdo::PARAM_STR);
        }
        $bookings = [];
        while ($booking = $stmt->fetchObject()) {
            $bookings[] = $booking;
        }
        return $bookings;
    }

    // Pour retourner le nb de couverts dispo pour une date donnée
    public function getCapacity(string $date)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT SUM(couverts) FROM bookings WHERE date = :q');
            $stmt->bindParam(':q', $date, PDO::PARAM_STR);
        }

        if ($stmt->execute()) {
            $res = $stmt->fetchColumn();
        }

        if (!$res) {
            // Aucune réservation existante, on affiche la capacité maxi de couverts
            return SEAT_CAPACITY;
        } else {
            // Je fixe la capacité maxi à 20 couverts et on affiche le nombre de couverts restants -->
            return (SEAT_CAPACITY - $res);
        }
    }

    public function addBooking(string $date, int $seats, string $name, string $hour, string $allergies)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('INSERT INTO bookings(`date`, `couverts`, `nom`, `hour`, `allergies`) VALUES (:date, :seats, :name, :hour, :allergies)');

            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':seats', $seats, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':hour', $hour, PDO::PARAM_STR);
            $stmt->bindParam(':allergies', $allergies, PDO::PARAM_STR);
        }

        $res = [];
        if ($stmt->execute()) {
            $res = $stmt->fetch();
        }
    }
}
