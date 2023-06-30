<?php
require_once('./src/models/Model.php');

class BookingManager
{
    use Model;

    public function readAllBooking()
    {
        $stmt = $this->pdo->query('SELECT * FROM bookings');

        while ($data = $stmt->fetch(pdo::FETCH_ASSOC)) {
            $booking = new Booking();
            $booking->setId($data['id']);
            $booking->setDate($data['date']);
            $booking->setSeat($data['seat']);
            $booking->setName($data['name']);
            $booking->setHour($data['hour']);
            $booking->setAllergies($data['allergies']);

            $bookings[] = $booking;
        }
        if (!empty($bookings)) {
            return $bookings;
        }
    }

    public function readBookingByDate(string $date)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM bookings WHERE date = :date');
        $stmt->bindValue(':date', $date, pdo::PARAM_STR);

        while ($data = $stmt->fetch(pdo::FETCH_ASSOC)) {
            $booking = new Booking();
            $booking->setId($data['id']);
            $booking->setDate($date);
            $booking->setSeat($data['seat']);
            $booking->setName($data['name']);
            $booking->setHour($data['hour']);
            $booking->setAllergies($data['allergies']);

            $bookings[] = $booking;
        }
        if (!empty($bookings)) {
            return $bookings;
        }
    }

    public function getCapacity(string $date)
    // Retourne le nb de couverts dispo pour une date donnée
    {
        $stmt = $this->pdo->prepare('SELECT SUM(seat) FROM bookings WHERE date = :q');
        $stmt->bindValue(':q', $date, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchColumn();

        if (!$res) {
            // Aucune réservation existante, on retourne la capacité maxi de couverts
            return SEAT_CAPACITY;
        } else {
            // On retourne le nombre de couverts restants -->
            return (SEAT_CAPACITY - $res);
        }
    }

    public function addBooking(Booking $booking)
    {
        $stmt = $this->pdo->prepare('INSERT INTO bookings(`date`, `seat`, `name`, `hour`, `allergies`) VALUES (:date, :seat, :name, :hour, :allergies)');
        $stmt->bindValue(':date', $booking->getDate(), PDO::PARAM_STR);
        $stmt->bindValue(':seat', $booking->getSeat(), PDO::PARAM_INT);
        $stmt->bindValue(':name', $booking->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':hour', $booking->getHour(), PDO::PARAM_STR);
        $stmt->bindValue(':allergies', $booking->getAllergies(), PDO::PARAM_STR);

        $stmt->execute();
    }

    public function readBookingById(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM bookings WHERE id= :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(pdo::FETCH_ASSOC);
        if (!empty($data)) {
            $booking = new Booking();
            $booking->setId($id);
            $booking->setDate($data['date']);
            $booking->setSeat($data['seat']);
            $booking->setName($data['name']);
            $booking->setHour($data['hour']);
            $booking->setAllergies($data['allergies']);

            return $booking;
        } else {
            // l'ID n'existe pas
            header('location: ./404.php');
        }
    }

    public function updateBooking(Booking $booking)
    {
        $stmt = $this->pdo->prepare('UPDATE bookings SET date= :date, seat= :seat, name= :name, hour= :hour, allergies= :allergies WHERE id= :id;');
        $stmt->bindValue(':id', $booking->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':date', $booking->getDate(), PDO::PARAM_STR);
        $stmt->bindValue(':seat', $booking->getSeat(), PDO::PARAM_INT);
        $stmt->bindValue(':name', $booking->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':hour', $booking->getHour(), PDO::PARAM_STR);
        $stmt->bindValue(':allergies', $booking->getAllergies(), PDO::PARAM_STR);

        $check = $stmt->execute();
        // Pour vérifier le succès de l'Update
        return $check;
    }

    public function deleteBooking(int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM bookings WHERE id= :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $check = $stmt->execute();
        // Pour vérifier le succès du Delete
        return $check;
    }
}
