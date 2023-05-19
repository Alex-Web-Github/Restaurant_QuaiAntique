<?php
session_start();
include_once('./templates/header-pages.php');
?>

<section class="d-flex flex-column vh-100">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center">

                <!-- Titre -->
                <h2 class="text-center">Votre Profil Utilisateur</h2>
                <div class="row mt-5">
                    <p class="fw-bold">Votre Email : <?= $_SESSION['user']['email']; ?></p>
                </div>

                <div class="row g-4 mt-3">
                    <?php if ($_SESSION['user']['role'] === 'admin') { ?>
                        <a type="button" class="btn btn-primary" href="./admin.php">Voir le Tableau de bord</a>
                    <?php } ?>
                    <a type="button" class="btn btn-outline-primary" href="./index.php">Aller sur le site</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include('./templates/footer.php');
?>