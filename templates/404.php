<?php $title = 'Page 404'; ?>

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