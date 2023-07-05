<?php $title = 'Profil'; ?>

<?php ob_start(); ?>
<section class="container d-flex flex-column">

    <div class="row mt-5 ">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">

            <!-- Titre -->
            <h2 class="text-center">Bienvenue
                <span class="fw-normal fs-4"><?= $_SESSION['user']['firstname']; ?></span>
                <span class="fw-normal fs-4"><?= $_SESSION['user']['lastname']; ?></span>
            </h2>
            <div class="row mt-5">
                <p class="fw-bold">- Votre profil utilisateur est : <span class="fw-light"><?= $_SESSION['user']['role']; ?></span></p>
            </div>
            <div class="row">
                <p class="fw-bold">- Votre Email : <span class="fw-light"><?= $_SESSION['user']['email']; ?></span></p>
            </div>
            <div class="row">
                <p class="fw-bold">- Vos allergies déclarées :
                    <span class="fw-light"><?= $_SESSION['user']['allergies']; ?></span>
                </p>
            </div>
            <div class="row">
                <p class="fw-bold">- Votre nombre habituel de couverts :
                    <span class="fw-light"><?= $_SESSION['user']['guest']; ?></span>
                </p>
            </div>

            <div class="row g-4 mt-3">
                <?php if ($_SESSION['user']['role'] === 'admin') { ?>
                    <a type="button" class="btn btn-primary" href="./admin.php">Voir le Tableau de bord</a>
                <?php } ?>
                <a type="button" class="btn btn-outline-primary" href="./index.php">Aller sur le site</a>
            </div>
        </div>
    </div>

</section>
<?php $content = ob_get_clean(); ?>

<?php require_once('./templates/layout.php'); ?>