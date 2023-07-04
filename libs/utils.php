<?php
function is_admin()
{
    return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
}

function is_client()
{
    return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'client');
}

function deleteFileFromUpload(string $fileToDelete)
// Effacer le fichier d'une photo sur le répertoire '_GALLERY_IMG_PATH_' (./upload') du serveur
{
    unlink(_GALLERY_IMG_PATH_ . $fileToDelete);
}

function slugify($text, string $divider = '-')
// Fonction pour uniformiser les slugs et "cleaner" les noms de fichiers (-> Trouvé sur le web)
{
    // Replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    // Transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // Trim
    $text = trim($text, $divider);
    // Remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);
    // Lowercase
    $text = strtolower($text);
    // Check if it is empty
    if (empty($text)) {
        return 'n-a';
    }
    // Return result
    return $text;
}
