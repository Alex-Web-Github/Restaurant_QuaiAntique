<?php
session_start();
require_once('./lib/dishe.php');
require_once('./lib/pdo.php');
//$errors = [];
//$messages = [];

// Vérification si Id existe et n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    // "Nettoyage" l'Id envoyé
    $id = strip_tags($_GET['id']);
    $dishe = getDisheById($pdo, $id);

    // ON vérifie si le plat existe dans la BDD
    if (!$dishe) {
        $errors[] = 'Cet Id n\'existe pas !';
        header('location: ./admin.php');
    } else {
    }
} else {
    $errors[] = 'Cet URL est invalide !';
    header('location: ./admin.php');
}

require_once('./templates/header-pages.php');
?>


<!-- Affichage des messages d'erreur et de confirmation 
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
-->

<section class="d-flex vh-100">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-10">
                <!-- Titre -->
                <h2 class="text-center">Plat sélectionné</h2>

                <!-- Affichage du plat sélectionné -->
                <div class="row mt-5">
                    <?php
                    include('./templates/dishe_partial.php');
                    ?>
                </div>

                <div class="row justify-content-between py-3">
                    <div class="col col-md-5">
                        <a href="./admin.php" class="btn btn-outline-primary">Retour tableau de bord</a>
                    </div>
                    <div class="col text-end col-md-5">
                        <a href="./updateDishe.php?id=<?= $dishe['id']; ?>" class="btn btn-outline-info">Modifier</a>
                        <a href="./deleteDishe.php?id=<?= $dishe['id']; ?>" class="btn btn-outline-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once('./templates/footer.php');
?>