<?php
require_once('./src/models/Model.php');
class Gallery
{
    use Model;

    private $id;
    private $name;
    private $description;
    private $file;

    // Mise en place de nos GETTERS
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getFile()
    {
        return $this->file;
    }

    
    // Mise en place de nos SETTERS
    public function setId($id)
    {
        if ($id > 0) {
            $this->id = $id;
        }
    }
    public function setName($name)
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }
    public function setDescription($description)
    {
        if (is_string($description)) {
            $this->description = $description;
        }
    }
    public function setFile($filename)
    {
        if (is_string($filename)) {
            $this->file = $filename;
        }
    }
}
