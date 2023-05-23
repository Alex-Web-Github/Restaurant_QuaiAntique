<?php
//
// Requête pour afficher TOUS les utilisateurs
//
function getUsers(PDO $pdo)
{
    $sql = "SELECT * FROM `users` ";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(pdo::FETCH_ASSOC);
}

//
// Pour ajouter d'un nouvel utilisateur
//
function addUser(PDO $pdo, string $email, string $password)
{
    $sql = "INSERT INTO `users`(`email`, `password`, `role`) VALUES (:email, :password, :role);";

    $query = $pdo->prepare($sql);

    // Hash du MdP (voir aussi 'Argon2id' selon la version de PHP)
    $password = password_hash($password, PASSWORD_DEFAULT);

    $role = 'client'; // Valeur par défaut

    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);

    return $user = $query->execute();

    // On récupère l'Id du dernier utiisateur
    $id = $pdo->lastInsertId();

    // on stocke ses infos dans un cookie de Session (pas le MdP !!!)
    $_SESSION['user'] = [
        "id" => $id,
        "email" => $email,
        "role" => $role,
    ];
    //Redirection vers la page Profil
    header('location: ./login.php');
}
//
// Pour vérifier si la personne est déjà inscrite ou pas
//
function verifyUserLoginPassword(PDO $pdo, string $email, string $password)
{
    $errors = [];
    $messages = [];
    
    // On sélectionne le $user dont l'email est celui envoyé par le formulaire : si son password correspond à celui envoyé c'est OK sinon -> message d'erreur.
    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");

    // Requête préparée avec bindParam
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    // la fonction "password_verify" ci-dessous permet de vérifier le mot de passe rentré avec celui "hashé" en BDD
    if (!$user) {
        $errors[] = 'L\'utilisateur et/ou le mot de passe sont incorrects';
    } else {
        // Utilisateur existe, on vérifie ensuite le mot de passe
        if (!password_verify($password, $user['password'])) {
            $errors[] = 'L\'utilisateur et/ou le mot de passe sont incorrects';
        } else {
            // Ici les identifiants sont corrects, on peut stocker ses infos dans un cookie de Session (pas le MdP !!!)
            $_SESSION['user'] = [
                "id" => $user['id'],
                "email" => $user['email'],
                "role" => $user['role'],
            ];

            // Redirection vers la page 'admin.php' si c'est un Admin...
            if ($_SESSION['user']['role'] == 'admin') {
                header('location: ./admin.php');
            } else {
                // Sinon vers la page profil.php si c'est un Client)
                header('location: ./profil.php');
            }
        }
    }
    // Gestion des messages d'erreurs/succès
    if (!empty($errors) || (!empty($messages))) {
        include_once('./lib/error-manager.php');
    }
}
