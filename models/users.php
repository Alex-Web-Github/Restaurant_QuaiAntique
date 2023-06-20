<?php
class Users
{
    private $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'root', '');
        } catch (PDOException $e) {
            exit('Erreur : ' . $e->getMessage());
        }
    }

    public function getUsers()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM users ');
        }
        $users = [];
        while ($user = $stmt->fetchObject()) {
            $users[] = $user;
        }
        return $users;
    }

    // Pour vérifier si la personne est déjà inscrite ou pas
    public function verifyUserLoginPassword(string $email, string $password): string
    {
        $errors = [];
        $messages = [];

        // On sélectionne le $user dont l'email est celui envoyé par le formulaire : si son password correspond à celui envoyé c'est OK sinon -> message d'erreur.
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        }
        $user = [];
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $user = $stmt->fetch();
        }

        // la fonction "password_verify" ci-dessous permet de vérifier le mot de passe rentré avec celui "hashé" en BDD
        if (!$user) {
            return 'L\'utilisateur et/ou le mot de passe sont incorrects';
        } else {

            // l'Utilisateur existe, on vérifie ensuite son mot de passe
            if (!password_verify($password, $user['password'])) {
                // Mauvais Password
                return 'L\'utilisateur et/ou le mot de passe sont incorrects';
            } else {
                // Les identifiants sont corrects, on peut stocker ses infos dans la Supergobale $_SESSION (surtout pas le MdP !!!)

                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "email" => $user['email'],
                    "role" => $user['role'],
                ];
                header('location: ./profil.php');
            }
        }
    }

    // Pour ajouter d'un nouvel utilisateur
    public function addUser(string $email, string $password)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('INSERT INTO users(`email`, `password`, `role`) VALUES (:email, :password, :role);');
        }

        // Hash du MdP (voir aussi 'Argon2id' selon la version de PHP)
        $password = password_hash($password, PASSWORD_DEFAULT);
        $role = 'client'; // Valeur par défaut

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);

        $user = [];
        if ($stmt->execute()) {
            $user = $stmt->fetch();
        }

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
}
