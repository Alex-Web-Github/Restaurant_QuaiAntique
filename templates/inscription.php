<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>
<section class="d-flex flex-column ">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center">

                <!-- Titre -->
                <h2 class="text-center">Formulaire d'inscription</h2>

                <!-- Formulaire d'inscription'  -->
                <div class="container mt-5">

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="for-label" for="email">Votre E-mail</label>
                            <input class="form-control" type="email" name="email" id="email" value="<?php if (isset($_POST['email'])) {
                                                                                                        echo $_POST['email'];
                                                                                                    } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="for-label" for="password">Votre Mot de Passe</label>
                            <input class="form-control" type="password" name="password" id="password" value="<?php if (isset($_POST['password'])) {
                                                                                                                    echo $_POST['password'];
                                                                                                                } ?>">
                        </div>
                        <input type="submit" class="btn btn-primary my-3" value="Je m'inscris">
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('./templates/layout.php'); ?>

?>