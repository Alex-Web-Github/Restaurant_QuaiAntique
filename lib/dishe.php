<?php
//
// Pour SUPPRIMER un plat par Id depuis la BDD
//
function deleteDishe(PDO $pdo, int $id)
{
    $sql = "SELECT * FROM `dishes` WHERE id= :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $dishe = $query->fetch();

    // On vérifie si le plat existe dans la BDD
    if (!$dishe) {
        $errors[] = 'Cet Id n\'existe pas !';
        header('location: ./index.php');
    }
    // Il existe bien, on peut alors l'effacer
    $sql = "DELETE FROM `dishes` WHERE id= :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $query->fetch();

    $messages[] = 'Ce plat a été supprimé.';
    header('location: ./admin.php');
}

//
// Pour AJOUTER un nouveau plat
//
function addDishe(PDO $pdo, string $category, string $title, string $description, string $price)
{
    $sql = "INSERT INTO `dishes`(`category`, `title`, `description`, `price`) VALUES (:category, :title, :description, :price)";

    $query = $pdo->prepare($sql);
    $query->bindParam(':category', $category, PDO::PARAM_STR);
    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_INT);

    $query->execute();
}
//
// Pour UPDATE un plat selon son Id
//
function updateDishe(PDO $pdo, int $id, string $category, string $title, string $description, string $price)
{
    $sql = "UPDATE `dishes` SET `category`= :category,`title`= :title,`description`= :description,`price`= :price WHERE `id`= :id;";

    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':category', $category, PDO::PARAM_STR);
    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);

    $query->execute();
}

//
// Pour LIRE TOUS les plats depuis la BDD
//
function getDishes(PDO $pdo)
{
    $sql = "SELECT * FROM `dishes`";
    $query = $pdo->prepare($sql);
    $query->execute();
    // stockage dans un tableau associatif
    return $query->fetchAll(pdo::FETCH_ASSOC);
}

//
// Pour LIRE un plat par ID depuis la BDD
//
function getDisheById(PDO $pdo, int $id)
{
    $sql = "SELECT * FROM `dishes` WHERE id= :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    // Stockage dans un tableau associatif
    return $query->fetch();
}
