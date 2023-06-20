<?php $title = 'Gestion de la Carte'; ?>
<?php ob_start(); ?>
<article>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-lg-10 mt-5 ">
                <div class="row justify-content-between py-3">
                    <div class="col col-md-5">
                        <a href="./admin.php" class="btn btn-outline-primary">Retour tableau de bord</a>
                    </div>
                    <div class="col text-end col-md-5">
                        <a href="./addDishe.php" class="btn btn-outline-info">Ajouter un plat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<?php $content = ob_get_clean(); ?>

<?php require_once('./templates/layout.php'); ?>