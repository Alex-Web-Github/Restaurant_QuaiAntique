<?php
require_once('./src/models/Model.php');

class User
{
    use Model;

    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $role;
    private $allergies;
    private $guest;

    // Mise en place de nos GETTERS
    public function getId()
    {
        return $this->id;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastName()
    {
        return $this->lastname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getAllergies()
    {
        return $this->allergies;
    }
    public function getGuest()
    {
        return $this->guest;
    }

    // Mise en place de nos SETTERS
    public function setId($id)
    {
        if ($id > 0) {
            $this->id = $id;
        }
    }
    public function setFirstname($firstname)
    {
        if (is_string($firstname)) {
            $this->firstname = $firstname;
        }
    }
    public function setLastname($lastname)
    {
        if (is_string($lastname)) {
            $this->lastname = $lastname;
        }
    }
    public function setEmail($email)
    {
        if (is_string($email)) {
            $this->email = $email;
        }
    }
    public function setPassword($password)
    {
        if (is_string($password)) {
            $this->password = $password;
        }
    }
    public function setRole($role)
    {
        if (is_string($role)) {
            $this->role = $role;
        }
    }
    public function setAllergies($allergies)
    {
        if (is_string($allergies)) {
            $this->allergies = $allergies;
        }
    }
    public function setGuest($guest)
    {
        if (is_numeric($guest)) {
            $this->guest = $guest;
        }
    }
}
