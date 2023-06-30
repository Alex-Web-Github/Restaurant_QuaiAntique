<?php
require_once('./src/models/Model.php');

class UserManager
{

    use Model;

    public function readAllUser()
    {
        $stmt = $this->pdo->query('SELECT * FROM users');
        while ($data = $stmt->fetch(pdo::FETCH_ASSOC)) {
            $user = new User();
            $user->setId($data['id']);
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setRole($data['role']);
            $users[] = $user;
        }
        if (!empty($users)) {
            return $users;
        }
    }

    public function addUser(User $user)
    {
        $stmt = $this->pdo->prepare('INSERT INTO users(`email`, `password`, `role`) VALUES (:email, :password, :role);');

        // Récupération du Password de l'objet '$user'
        $password = $user->getPassword();
        // Hash du MdP (voir aussi 'Argon2id' selon la version de PHP)
        $password = password_hash($password, PASSWORD_DEFAULT);

        $email = $user->getEmail();
        $role = 'client'; // Valeur par défaut

        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);
        $stmt->execute();

        // On récupère l'Id du dernier utiisateur
        $id = $this->pdo->lastInsertId();

        // On stocke ses infos dans un cookie de Session (pas le MdP !!!)
        $_SESSION['user'] = [
            "id" => $id,
            "email" => $email,
            "role" => $role,
        ];
        // Redirection vers la page Profil
        header('location: ./login.php');
    }

    public function verifyUserLoginPassword(User $checkUser)
    {
        $checkEmail = $checkUser->getEmail();
        // On sélectionne dans la BDD l'utilisateur dont l'email est celui envoyé par le formulaire : 
        // Si son password correspond à celui envoyé c'est OK sinon -> message d'erreur.
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindValue(':email', $checkEmail, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(pdo::FETCH_ASSOC);

        if (!$data) {
            return 'L\'utilisateur et/ou le mot de passe sont incorrects';
        }

        $checkPassword = $checkUser->getPassword();
        $password = $data['password'];
        if (!password_verify($checkPassword, $password)) {
            // Mauvais Password
            return 'L\'utilisateur et/ou le mot de passe sont incorrects';
        }

        // Les identifiants sont corrects, 
        // On peut stocker les infos dans la Supergobale '$_SESSION[]' (jamais le Password !!!)
        $_SESSION['user'] = [
            "id" => $data['id'],
            "email" => $data['email'],
            "role" => $data['role'],
        ];
        header('location: ./profil.php');
    }
}
