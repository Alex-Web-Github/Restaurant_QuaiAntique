<?php $title = 'Gestion de la Carte'; ?>

<?php ob_start(); ?>
<article class="d-flex vh-100">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-10">
                <!-- Titre -->
                <h2 class="text-center">Catégorie : "<?= $dishe->getCategory() ?>"</h2>
                <!-- Affichage du plat sélectionné -->
                <div class="row mt-5">
                    <?php
                    include('./templates/dishe/dishe_partial.php');
                    ?>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6">
                        <a href="./admin.php" class="btn btn-outline-primary">Retour tableau de bord</a>
                    </div>
                    <div class="col-6 mt-3 mt-sm-0 col-sm-3">
                        <a href="./updateDishe.php?id=<?= $dishe->getId() ?>" class="btn btn-outline-info">Modifier</a>
                    </div>
                    <div class="col-6 mt-3 mt-sm-0 col-sm-3">
                        <a href="./deleteDishe.php?id=<?= $dishe->getId() ?>" class="btn btn-outline-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require_once('./templates/layout.php'); ?>