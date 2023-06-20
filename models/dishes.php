<?php
// Pour afficher TOUS les plats
class Dishes
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

    function getDishes()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM dishes');
        }
        $dishes = [];
        while ($dishe = $stmt->fetchObject()) {
            $dishes[] = $dishe;
        }
        return $dishes;
    }
}
