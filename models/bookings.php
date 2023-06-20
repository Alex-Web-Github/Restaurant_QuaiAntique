<?php
require_once('models/model.php');
class Bookings
{
    use Model;
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
