<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
<section class="d-flex flex-column ">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 ">
                <!-- Titre -->
                <h2 class="text-center">Formulaire de connexion</h2>
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

                        <div class="mt-3 mb-3 text-left">
                            <input type="submit" class="btn btn-primary my-3" value="Me connecter">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div><a href="./inscription.php" class="btn btn-outline-primary my-3">Créer un compte</a>
                            </div>
                            <div><a href="./index.php">Revenir sur le site</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require_once('./templates/layout.php'); ?>