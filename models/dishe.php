<?php
require_once('models/model.php');

// Pour afficher UN plat selon son Id
class Dishe
{
    use Model;

    public function getDisheById(int $id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM dishes WHERE id= :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        }

        $dishe = null;
        if ($stmt->execute()) {
            $dishe = $stmt->fetchObject();
            if (!is_object($dishe)) {
                $dishe = null;
            }
        }
        return $dishe;
    }

    public function updateDishe(int $id, string $category, string $title, string $description, string $price)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('UPDATE dishes SET category= :category, title= :title, description= :description, price= :price WHERE id= :id;');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        }
        $dishe = [];
        if ($stmt->execute()) {
            $dishe = $stmt->fetchObject();
            if (!is_object($dishe)) {
                $dishe = null;
            }
        }
        return $dishe;
    }

    public function addDishe(string $category, string $title, string $description, string $price)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('INSERT INTO dishes(`category`, `title`, `description`, `price`) VALUES (:category, :title, :description, :price)');

            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        }
        $dishe = [];
        if ($stmt->execute()) {
            $dishe = $stmt->fetchObject();
            if (!is_object($dishe)) {
                $dishe = null;
            }
        }
        return $dishe;
    }

    public function deleteDishe(int $id)
    {
        // D'abord vérifier que l'Id existe
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM dishes WHERE id= :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        }
        $dishe = [];
        if ($stmt->execute()) {
            $dishe = $stmt->fetchObject();
            if (!is_object($dishe)) {
                $dishe = null;
                header('location: ./404.php');
            } else {
                // Il existe bien, on peut alors EFFACER le plat correspondant
                $stmt = $this->pdo->prepare('DELETE FROM dishes WHERE id= :id');
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $dishe = [];
                if ($stmt->execute()) {
                    $dishe = $stmt->fetchObject();
                    if (!is_object($dishe)) {
                        $dishe = null;
                    }
                }
                return $dishe;
                $messages[] = 'Ce plat a été supprimé';
            }
        }
    }
}
