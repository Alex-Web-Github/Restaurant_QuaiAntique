<?php
// on ouvre une session pour avoir accès à 'unset()'
session_start();

// Rendre la page 'logout.php' inaccessible si l'utilisateur n'est pas déjà connecté
if (!isset($_SESSION['user'])) {
    header('location: ./login.php');
}

//session_destroy(); NON car ça supprime TOUTES les infos de Session (on peut vouloir garder certains infos de Session, un Panier par exe)
// ici, on n'efface volontairement que les données de la variable $_SESSION['user'] 
unset($_SESSION['user']);

// Retour sur la page d'Accueil
header('location: ./index.php');
