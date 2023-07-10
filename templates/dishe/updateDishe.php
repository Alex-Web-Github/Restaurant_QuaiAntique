<?php $title = 'Gestion de la Carte'; ?>

<?php
if (is_null($dishe)) {
    header('location: ./404.php');
} else {

    ob_start(); ?>
    <section class="d-flex vh-100">
        <div class="container ">
            <div class="row mt-5 justify-content-center">
                <div class="col-12 col-md-10">
                    <!-- Titre -->
                    <h2 class="text-center">Mettre à jour un plat</h2>
                    
                    <!-- Formulaire de modification du plat  -->
                    <form action="" method="POST">
                        <!-- On préremplit tous les champs du formulaire avec les valeurs du plat sélectionné par son 'Id' -->
                        <div class="mb-3 mt-5 ">
                            <label class="for-label" for="category">Catégorie du plat</label>
                            <input class="form-control" type="text" name="category" id="category" value="<?= $dishe->getCategory() ?>">
                        </div>
                        <div class="mb-3">
                            <label class="for-label" for="title">Intitulé du plat</label>
                            <input class="form-control" type="text" name="title" id="title" value="<?= $dishe->getTitle() ?>">
                        </div>
                        <div class="mb-3">
                            <label class="for-label" for="description">Description</label>
                            <input class="form-control" type="text" name="description" id="description" value="<?= $dishe->getDescription() ?>">
                        </div>
                        <div class="mb-3">
                            <label class="for-label" for="price">Tarif</label>
                            <input class="form-control" type="text" name="price" id="price" value="<?= $dishe->getPrice() ?>">
                        </div>
                        <!-- Important !!! -->
                        <input type="hidden" name="id" id="id" value="<?= $dishe->getId() ?>">
                        <!-- Important !!! -->
                        <input type="submit" class="btn btn-primary my-3" value="Enregistrer les modifications">
                        <div class="col py-3">
                            <a href="./admin.php">Retour page Admin.</a>
                        </div>
                    </form>
                    <!-- Formulaire de modification du plat  -->
                </div>
            </div>
        </div>
    </section>
<?php $content = ob_get_clean();
}
?>

<?php require_once('./templates/layout.php'); ?>