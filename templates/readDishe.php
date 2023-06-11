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
                <h2 class="text-center">Catégorie : "<?= $dishe['category'] ?>"</h2>
                <!-- Affichage du plat sélectionné -->
                <div class="row mt-5">
                    <?php
                    include('./templates/dishe_partial.php');
                    ?>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6">
                        <a href="./admin.php" class="btn btn-outline-primary">Retour tableau de bord</a>
                    </div>
                    <div class="col-6 mt-3 mt-sm-0 col-sm-3">
                        <a href="./updateDishe.php?id=<?= $dishe['id']; ?>" class="btn btn-outline-info">Modifier</a>
                    </div>
                    <div class="col-6 mt-3 mt-sm-0 col-sm-3">
                        <a href="./deleteDishe.php?id=<?= $dishe['id']; ?>" class="btn btn-outline-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('./templates/layout.php'); ?>

?>