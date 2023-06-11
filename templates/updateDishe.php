<?php $title = 'Gestion de la Carte'; ?>

<?php ob_start(); ?>
<header style="background: rgb(2,0,36); background: linear-gradient(180deg, rgba(0,0,0,1) 80%, rgba(57,44,30,1) 100%); position: relative; z-index: 0; max-height: 60vh;">
    <div class="d-flex flex-column h-100 pt-10 pt-md-8 pb-7 pb-md-0">
        <div class="container" style="margin-top: 7rem;">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 text-center">
                    <!-- Titre -->
                    <h1 class="display-1 text-white mb-4">
                        <?= $title ?>
                    </h1>

                </div>
            </div>
        </div>
    </div>
    <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100;">
        <div style="background-position: 50% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(./assets/img/photo1-resto.webp); height: 100%; overflow: hidden; pointer-events: none; margin-top: 0px; opacity: 0.6;"></div>
    </div>
</header>
<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>
<section class="d-flex vh-100">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-10">
                <!-- Titre -->
                <h2 class="text-center">Mettre à jour un plat</h2>

                <!-- Formulaire d'ajout de plat  -->
                <!-- On préremplit les valeurs du formulaire avec celles du plat sélectionné -->
                <form action="" method="POST">
                    <div class="mb-3 mt-5 ">
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
                    <input type="submit" class="btn btn-primary my-3" value="Enregistrer les modifications">
                    <div class="col py-3">
                        <a href="./admin.php">Retour page Admin.</a>
                    </div>
                </form>

            </div>

        </div>
    </div>

</section>
<?php $content = ob_get_clean(); ?>

<?php require('./templates/layout.php'); ?>

?>