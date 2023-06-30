<?php
require_once('./src/models/Model.php');
// Pour afficher UN plat selon son Id
class Dishe
{
    use Model;

    private $id;
    private $category;
    private $title;
    private $description;
    private $price;

    // Mise en place de nos GETTERS
    public function getId()
    {
        return $this->id;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getPrice()
    {
        return $this->price;
    }

    // Mise en place de nos SETTERS
    public function setId($id)
    {
        if ($id > 0) {
            $this->id = $id;
        }
    }
    public function setCategory($category)
    {
        if (is_string($category)) {
            $this->category = $category;
        }
    }
    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->title = $title;
        }
    }
    public function setDescription($description)
    {
        if (is_string($description)) {
            $this->description = $description;
        }
    }
    public function setPrice($price)
    {
        if (is_string($price)) {
            $this->price = $price;
        }
    }
}
