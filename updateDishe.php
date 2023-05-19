<?php
session_start();
require_once('./lib/dishe.php');
require_once('./lib/pdo.php');
$errors[] = "";
$messages[] = "";

// ON fait d'abord les vérifications avant d'envoyer les modifications
if ($_POST) {

    // Vérification si les champs sont définis et NON vides
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['category']) && !empty($_POST['category'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['description']) && !empty($_POST['description'])
        && isset($_POST['price']) && !empty($_POST['price'])
    ) {
        // On nettoie les données envoyées
        $id = strip_tags($_POST['id']);
        $category = strip_tags($_POST['category']);
        $title = strip_tags($_POST['title']);
        $description = strip_tags($_POST['description']);
        $price = strip_tags($_POST['price']);

        // traitement des données du formulaire
        require_once('./lib/pdo.php');
        updateDishe($pdo, $id, $category, $title, $description, $price);
        // Message de confirmation
        $messages[] = 'Votre plat à été modifié.';

        //require_once('./lib/close-pdo.php');

        // Redirection vers page d'Accueil
        header('location: ./admin.php');
    } else {
        $errors[] = 'Le formulaire est incomplet';
    }
}

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

<!--
<hr class="hr-custom">
-->
<!-- Affichage des messages d'erreur et de confirmation 
<?php
foreach ($messages as $message) { ?>
    <div class="alert alert-success" role="alert">
        <?= $message; ?>
    </div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
    <div class="text-center alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
<?php }
?>
-->

<section class="d-flex vh-100">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-10">
                <!-- Titre -->
                <h2 class="text-center">Mettre à jour un plat</h2>

                <!-- Formulaire d'ajout de plat  -->
                <!-- On préremplit les valeurs du formulaire avec celles du plat sélectionné -->
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="for-label" for="category">Catégorie du plat</label>
                        <input class="form-control" type="text" name="category" id="category" value="<?= $dishe['category'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="title">Intitulé du plat</label>
                        <input class="form-control" type="text" name="title" id="title" value="<?= $dishe['title'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="description">Description</label>
                        <input class="form-control" type="text" name="description" id="description" value="<?= $dishe['description'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="price">Tarif</label>
                        <input class="form-control" type="text" name="price" id="price" value="<?= $dishe['price'] ?>">
                    </div>
                    <!-- Important !!! -->
                    <input type="hidden" name="id" id="id" value="<?= $dishe['id'] ?>">
                    <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
                    <p class="px-2 py-3">
                    <a href="./admin.php">Retour page Admin.</a>
                </p>
                </form>

            </div>

        </div>
    </div>

</section>

<?php
require_once('./templates/footer.php');
?>