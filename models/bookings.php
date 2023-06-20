<?php
class Bookings
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

    // Afficher TOUTES les réservations
    public function getBookings()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM bookings');
        }
        $bookings = [];
        while ($booking = $stmt->fetchObject()) {
            $bookings[] = $booking;
        }
        return $bookings;
    }
}