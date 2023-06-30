<?php
require_once('./src/models/Model.php');

class User
{
    use Model;

    private $id;
    private $email;
    private $password;
    private $role;

    // Mise en place de nos GETTERS
    public function getId()
    {
        return $this->id;
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

    // Mise en place de nos SETTERS
    public function setId($id)
    {
        if ($id > 0) {
            $this->id = $id;
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
}
