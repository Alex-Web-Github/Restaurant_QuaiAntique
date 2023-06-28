<?php
require_once('models/model.php');

class DisheManager
{
    use Model;

    function readAllDishe()
    {
        $stmt = $this->pdo->query('SELECT * FROM dishes');

        while ($data = $stmt->fetch(pdo::FETCH_ASSOC)) {
            $dishe = new Dishe();
            $dishe->setId($data['id']);
            $dishe->setCategory($data['category']);
            $dishe->setTitle($data['title']);
            $dishe->setDescription($data['description']);
            $dishe->setPrice($data['price']);
            $dishes[] = $dishe;
        }
        if (!empty($dishes)) {
            return $dishes;
        }
    }

    public function readDisheById(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM dishes WHERE id= :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(pdo::FETCH_ASSOC);
        if (!empty($data)) {
            $dishe = new Dishe();
            $dishe->setId($id);
            $dishe->setCategory($data['category']);
            $dishe->setTitle($data['title']);
            $dishe->setDescription($data['description']);
            $dishe->setPrice($data['price']);

            return $dishe;
        } else {
            // l'ID n'existe pas
            header('location: ./404.php');
        }
    }

    public function addDishe(Dishe $dishe)
    {
        $stmt = $this->pdo->prepare('INSERT INTO dishes(`category`, `title`, `description`, `price`) VALUES (:category, :title, :description, :price)');
        $stmt->bindValue(':category', $dishe->getCategory(), PDO::PARAM_STR);
        $stmt->bindValue(':title', $dishe->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $dishe->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':price', $dishe->getPrice(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updateDishe(Dishe $dishe)
    {
        $stmt = $this->pdo->prepare('UPDATE dishes SET category= :category, title= :title, description= :description, price= :price WHERE id= :id;');
        $stmt->bindValue(':id', $dishe->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':category', $dishe->getCategory(), PDO::PARAM_STR);
        $stmt->bindValue(':title', $dishe->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $dishe->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':price', $dishe->getPrice(), PDO::PARAM_INT);
        $check = $stmt->execute();
        // Pour vérifier le succès de l'Update
        return $check;
    }

    public function deleteDishe(int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM dishes WHERE id= :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $check = $stmt->execute();
        // Pour vérifier le succès du Delete
        return $check;
    }
}
