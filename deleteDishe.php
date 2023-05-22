<?php
session_start();
require_once('./lib/dishe.php');
require_once('./lib/pdo.php');
$titlePage='Gestion des plats';
require_once('./templates/header-pages.php');

$errors = [];
$messages = [];

// Vérification si Id existe et n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    // "Nettoyage" l'Id envoyé
    $id = strip_tags($_GET['id']);
    $dishe = deleteDishe($pdo, $id);
} else {
    $errors[] = 'Cet URL est invalide !';
    //header('location: ./admin.php');
}

?>

<!-- Affichage des messages d'erreur et de confirmation -->
<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success">
        <?= $message; ?>
    </div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
    <div class="text-center alert alert-danger">
        <?= $error; ?>
    </div>
<?php } ?>

<section class="d-flex vh-100">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-10">
                <!-- Titre -->
                <h2 class="text-center">Supprimer un plat</h2>

                <!-- Affichage du plat -->
                <div class="row mt-5">
                    <?php
                    include('./templates/dishe_partial.php');
                    ?>
                </div>
                <p class="px-2 py-3">
                    <a href="./admin.php">Retour page Admin.</a>
                    <a href="./updateDishe.php?id=<?= $dishe['id']; ?>">Modifier</a>
                    <a href="./deleteDishe.php?id=<?= $dishe['id']; ?>">Supprimer</a>
                </p>
            </div>

        </div>
    </div>
</section>
<?php
require_once('./templates/footer.php');
?>