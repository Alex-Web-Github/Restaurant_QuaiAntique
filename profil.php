<?php
session_start();
require_once('./libs/config.php');
require_once('./libs/utils.php');

// Rends la page inaccessible si l'utilisateur n'est ni un 'Client' ni un 'Admin'
if (is_admin() == false && is_client() == false) {
    header('location: ./index.php');
}
require_once('./templates/profil.php');
