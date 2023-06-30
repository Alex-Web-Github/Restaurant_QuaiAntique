<?php

trait Model
{
    private $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(dsn:'mysql:dbname=quai_antique;host=localhost;charset=utf8mb4',username: 'root',password: '');
        } catch (PDOException $e) {
            exit('Erreur : ' . $e->getMessage());
        }
    }
}
