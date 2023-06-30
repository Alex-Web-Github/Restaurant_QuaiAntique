<?php
require_once('./src/models/Model.php');
class Booking
{
    use Model;

    private $id;
    private $date;
    private $seat;
    private $name;
    private $hour;
    private $allergies;

    // Mise en place de nos GETTERS
    public function getId()
    {
        return $this->id;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getSeat()
    {
        return $this->seat;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getHour()
    {
        return $this->hour;
    }
    public function getAllergies()
    {
        return $this->allergies;
    }

    // Mise en place de nos SETTERS
    public function setId($id)
    {
        if ($id > 0) {
            $this->id = $id;
        }
    }
    public function setDate($date)
    {
        if (is_string($date)) {
            $this->date = $date;
        }
    }
    public function setSeat($seat)
    {
        if (is_numeric($seat)) {
            $this->seat = $seat;
        }
    }
    public function setName($name)
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }
    public function setHour($hour)
    {
        if (is_string($hour)) {
            $this->hour = $hour;
        }
    }
    public function setAllergies($allergies)
    {
        if (is_string($allergies)) {
            $this->allergies = $allergies;
        }
    }
}
