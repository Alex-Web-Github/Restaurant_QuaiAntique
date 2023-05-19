<?php
$errors = [];
$messages = [];
session_start();
include_once('./templates/header-pages.php');
?>

<section class="d-flex flex-column vh-100 ">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center">

                <!-- Titre -->
                <h2 class="text-center">Votre Profil Utilisateur</h2>
                <p>Email : <?= $_SESSION['user']['email']; ?></p>

                <!-- Affichage des messages d'erreur et de confirmation -->
                <?php foreach ($messages as $message) { ?>
                    <div class="alert alert-success">
                        <?= $message; ?>
                    </div>
                <?php } ?>
                <?php foreach ($errors as $error) { ?>
                    <div class="alert alert-success">
                        <?= $error; ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>

<?php
include('./templates/footer.php');
?>