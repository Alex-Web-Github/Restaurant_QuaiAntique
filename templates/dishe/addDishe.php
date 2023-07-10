<?php $title = 'Gestion de la Carte'; ?>

<?php ob_start(); ?>
<section class="d-flex vh-100">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-10">
                <!-- Titre -->
                <h2 class="text-center">Ajouter un plat</h2>

                <!-- Formulaire d'ajout de plat  -->

                <form action="" method="POST">
                    <div class="mb-3 mt-5">
                        <label class="for-label" for="category">Catégorie du plat</label>
                        <input class="form-control" type="text" name="category" id="category" value="<?= $_POST['category'] ?? null ?>">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="title">Intitulé du plat</label>
                        <input class="form-control" type="text" name="title" id="title" value="<?= $_POST['title'] ?? null ?>">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="description">Description</label>
                        <input class="form-control" type="text" name="description" id="title" value="<?= $_POST['description'] ?? null ?>">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="price">Tarif</label>
                        <input class="form-control" type="" name="price" id="price" value="<?= $_POST['price'] ?? null ?>">
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
<?php $content = ob_get_clean(); ?>

<?php require_once('./templates/layout.php'); ?>