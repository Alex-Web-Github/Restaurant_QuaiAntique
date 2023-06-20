<?php
require_once('models/model.php');

// Pour afficher TOUS les plats
class Dishes
{
    use Model;

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
