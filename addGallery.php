<?php
session_start();
require_once('./libs/utils.php');
require_once('./libs/config.php');
require_once('./src/models/Gallery.php');
require_once('./src/models/GalleryManager.php');
$errors = [];
$messages = [];

// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (is_admin() == false) {
    header('location: ./index.php');
}

// Les types MIME autorisés sont stockés dans une variable
$authorizedMimeTypes = [
    'png' => 'image/png',
    'jpg' => 'image/jpg',
    'webp' => 'image/webp',
];

function isUploadSuccessful(array $uploadedFile): bool
{
    return isset($uploadedFile['error']) && $uploadedFile['error'] === UPLOAD_ERR_OK;
}
function isUploadSmallerThan2M(array $uploadedFile): bool
{
    return $uploadedFile['size'] < 2000000;
}
function isMimeTypeAuthorized(array $authorizedMimeTypes, array $uploadedFile): bool
{
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($uploadedFile['tmp_name']);

    return in_array($mimeType, $authorizedMimeTypes, true);
}
function getExtensionFromMimeType(array $authorizedMimeTypes, array $uploadedFile): string
{
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($uploadedFile['tmp_name']);

    if ($extension = array_search($mimeType, $authorizedMimeTypes, true)) {
        return $extension;
    }
    throw new RuntimeException('Le type MIME n\'est lié à aucune extension');
}
function moveUploadedFile(array $uploadedFile, string $uniqFilename): bool
{
    return move_uploaded_file($uploadedFile['tmp_name'], _GALLERY_IMG_PATH_ . $uniqFilename);
}

if ($_POST) {
    try {
        $filename = $_POST['filename'] ?? null;
        $uploadedFile = $_FILES['uploaded_file'] ?? [];
        // Vérification du bon téléchargement et bon format de fichier
        if (!isUploadSuccessful($uploadedFile)) {
            throw new RuntimeException('Le téléchargement a échoué : aucun fichier sélectionné');
        }
        if (!isMimeTypeAuthorized($authorizedMimeTypes, $uploadedFile)) {
            throw new RuntimeException('Le type de fichier n\'est pas supporté');
        }
        // Vérification taille fichier < 2Mo
        if (!isUploadSmallerThan2M($uploadedFile)) {
            throw new RuntimeException('Le fichier dépasse les 2 Mo');
        }
        // Vérifier que le nom de l'image du formulaire ne contient que des caractères autorisés 
        if (!preg_match('/^[\w~]+$/', $filename)) {
            // PROBLEME : n'accepte pas les TIRETS ???!!!! //
            throw new RuntimeException('Le nom de l\'image ne doit pas être vide et ne contenir que des lettres, chiffres, ou des underscores');
        }
        // Vérifier que le champs 'Description' est rempli et non nul
        if (!isset($_POST['description']) || empty($_POST['description'])) {
            throw new RuntimeException('Le champs Description n\'est pas rempli');
        }
        // Vérifications OK, on peut démarrer le téléchargement vers le dossier '/upload' du serveur
        $extension = getExtensionFromMimeType($authorizedMimeTypes, $uploadedFile);
        // uniqid() : génère un identifiant basé sur la date et heure courante en microsecondes. 
        // Utile pour éviter l'écrasement de fichier si le même nom de fichier de photo est utilisé plusieurs fois.
        $uniqFilename = uniqid() . '-' . slugify($filename) . '.' . $extension;

        if (!moveUploadedFile($uploadedFile, $uniqFilename)) {
            throw new RuntimeException('Le téléchargement a échoué ...');
        }

        $messages[] = 'L\'image a bien été téléchargée !';
    } catch (RuntimeException $e) {
        $errors[] = $e->getMessage();
    }

    if (!$errors) {
        // Sauvegarde dans la BDD du chemin vers cette image (qui est stockée physiquement sur le serveur)

        // On nettoie le champs 'Description' envoyées
        $description = strip_tags($_POST['description']);

        // traitement des données du formulaire
        $newGallery = new Gallery();
        $newGallery->setName($filename);
        $newGallery->setDescription($description);
        $newGallery->setFile($uniqFilename);

        $manager = new GalleryManager();
        $check = $manager->addGallery($newGallery);

        if ($check) {
            // Message de confirmation
            $messages[] = 'Votre image est bien enregistrée dans la BDD';
        } else {
            $errors[] = 'Votre image n\'a pas pu être sauvegardée dans la BDD';
        }
    }
}
require_once('./templates/gallery/addGallery.php');
