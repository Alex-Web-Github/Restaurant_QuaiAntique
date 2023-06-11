<?php $title = 'Page 404'; ?>

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
<section class="container ">
    <div class="row py-3 md-py-5">
        <div class="text-center col-12 col-md-10 col-lg-10 my-3 my-md-5 mx-auto">

            <!-- Titre -->
            <h2>Désolé...</br>La page que vous essayez d'afficher n'existe pas</h2>
            <div class="mt-5">
                <a href="./index.php" class="btn btn-primary">Retour à la page d'accueil</a>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('./templates/layout.php'); ?>