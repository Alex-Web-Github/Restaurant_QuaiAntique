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
            $user->setFirstname($data['user_firstname']);
            $user->setLastname($data['user_lastname']);
            $user->setEmail($data['user_email']);
            $user->setPassword($data['user_password']);
            $user->setRole($data['user_role']);
            $user->setAllergies($data['user_allergies']);
            $user->setGuest($data['user_guest']);
            $users[] = $user;
        }
        if (!empty($users)) {
            return $users;
        }
    }

    public function addUser(User $user)
    {
        $stmt = $this->pdo->prepare('INSERT INTO users(`user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_role`, `user_allergies`, `user_guest`) VALUES (:firstname, :lastname, :email, :password, :role, :allergies, :guest);');

        // Récupération du Password de l'objet '$user'
        $password = $user->getPassword();
        // Hash du MdP basé sur l'algo. Bcrypt mais évolutif
        $password = password_hash($password, PASSWORD_DEFAULT);

        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $email = $user->getEmail();
        $role = $user->getRole();
        $allergies = $user->getAllergies();
        $guest = $user->getGuest();

        $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);
        $stmt->bindValue(':allergies', $allergies, PDO::PARAM_STR);
        $stmt->bindValue(':guest', $guest, PDO::PARAM_STR);
        $stmt->execute();

        // On récupère l'Id du dernier utiisateur
        $id = $this->pdo->lastInsertId();

        // On stocke ses infos dans un cookie de Session (SAUF le MdP !!!)
        $_SESSION['user'] = [
            "id" => $id,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "role" => $role,
            "allergies" => $allergies,
            "guest" => $guest,
        ];
        // Redirection vers la page Profil
        header('location: ./login.php');
    }

    public function verifyUserLoginPassword(User $checkUser)
    {
        $checkEmail = $checkUser->getEmail();
        // On sélectionne dans la BDD l'utilisateur dont l'email est celui envoyé par le formulaire : 
        // Si son password correspond à celui envoyé c'est OK sinon -> message d'erreur.
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE user_email = :email');
        $stmt->bindValue(':email', $checkEmail, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(pdo::FETCH_ASSOC);

        if (!$data) {
            return 'L\'utilisateur et/ou le mot de passe sont incorrects';
        }

        $checkPassword = $checkUser->getPassword();
        $password = $data['user_password'];
        if (!password_verify($checkPassword, $password)) {
            // Mauvais Password
            return 'L\'utilisateur et/ou le mot de passe sont incorrects';
        }
        // Les identifiants sont corrects, 
        // On peut stocker les infos dans la Supergobale '$_SESSION[]' (jamais le Password !!!)
        $_SESSION['user'] = [
            "id" => $data['id'],
            "firstname" => $data['user_firstname'],
            "lastname" => $data['user_lastname'],
            "email" => $data['user_email'],
            "role" => $data['user_role'],
            "allergies" => $data['user_allergies'],
            "guest" => $data['user_guest'],
        ];
        header('location: ./profil.php');
    }
}
