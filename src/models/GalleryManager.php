<?php
require_once('./src/models/Model.php');

class GalleryManager
{
    use Model;

    function readAllGallery()
    {
        $stmt = $this->pdo->query('SELECT * FROM galleries');
        while ($data = $stmt->fetch(pdo::FETCH_ASSOC)) {
            $gallery = new Gallery();
            $gallery->setId($data['id']);
            $gallery->setName($data['gal_name']);
            $gallery->setDescription($data['gal_description']);
            $gallery->setFile($data['gal_file']);
            $galleries[] = $gallery;
        }
        if (!empty($galleries)) {
            return $galleries;
        }
    }

    public function addGallery(Gallery $gallery)
    {
        $stmt = $this->pdo->prepare('INSERT INTO galleries(`gal_name`, `gal_description`, `gal_file`) VALUES (:name, :description, :file)');
        $stmt->bindValue(':name', $gallery->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $gallery->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':file', $gallery->getFile(), PDO::PARAM_STR);
        $check = $stmt->execute();
        // Pour vérifier le succès de l'insertion
        return $check;
    }

    public function readGalleryById(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM galleries WHERE id= :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(pdo::FETCH_ASSOC);
        if (!empty($data)) {
            $gallery = new Gallery();
            $gallery->setId($id);
            $gallery->setName($data['gal_name']);
            $gallery->setDescription($data['gal_description']);
            $gallery->setFile($data['gal_file']);
            return $gallery;
        } else {
            // l'ID n'existe pas
            header('location: ./404.php');
        }
    }

    public function updateGallery(Gallery $gallery)
    {
        $stmt = $this->pdo->prepare('UPDATE galleries SET gal_name= :name, gal_description= :description, gal_file= :file WHERE id= :id;');
        $stmt->bindValue(':id', $gallery->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':name', $gallery->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $gallery->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':file', $gallery->getFile(), PDO::PARAM_STR);
        $check = $stmt->execute();
        // Pour vérifier le succès de l'Update
        return $check;
    }

    // Effacement de l"enregistrement dans la BDD
    public function deleteGallery(int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM galleries WHERE id= :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $check = $stmt->execute();
        // Pour vérifier le succès du Delete
        return $check;
    }
}
