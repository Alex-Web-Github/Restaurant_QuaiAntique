<?php
session_start();
require_once('./lib/dishe.php');
require_once('./lib/pdo.php');
$errors[] = "";
$messages[] = "";

if ($_POST) {
    // Vérification si les champs sont définis et NON vides
    if (
        isset($_POST['category']) && !empty($_POST['category'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['description']) && !empty($_POST['description'])
        && isset($_POST['price']) && !empty($_POST['price'])
    ) {
        // On nettoie les données envoyées
        $category = strip_tags($_POST['category']);
        $title = strip_tags($_POST['title']);
        $description = strip_tags($_POST['description']);
        $price = strip_tags($_POST['price']);

        // traitement des données du formulaire
        require_once('./lib/pdo.php');
        addDishe($pdo, $category, $title, $description, $price);
        // Message de confirmation
        $messages[] = 'Votre plat à été ajouté.';
        require_once('./lib/close-pdo.php');
        // Redirection vers page d'Accueil
        header('location: ./admin.php');
    } else {
        $errors[] = 'Le formulaire est incomplet';
    }
}
$titlePage = 'Gestion des Plats';
require_once('./templates/header-pages.php');
?>


<!-- Affichage des messages d'erreur et de confirmation -->
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

<section class="d-flex vh-100">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-10">
                <!-- Titre -->
                <h2 class="text-center">Ajouter un plat</h2>

                <!-- Formulaire d'ajout de plat  -->

                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="for-label" for="category">Catégorie du plat</label>
                        <input class="form-control" type="text" name="category" id="category">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="title">Intitulé du plat</label>
                        <input class="form-control" type="text" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="description">Description</label>
                        <input class="form-control" type="text" name="description" id="title">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="price">Tarif</label>
                        <input class="form-control" type="" name="price" id="price">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enregistrer ce plat">
                </form>

                <p class="px-2 py-3">
                    <a href="./admin.php">Retour page Admin.</a>
                </p>
            </div>

        </div>
    </div>

</section>

<?php
require_once('./templates/footer.php');
?>