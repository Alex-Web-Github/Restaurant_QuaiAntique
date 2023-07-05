<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>
<section class="d-flex flex-column ">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col col-lg-8">
                <!-- Titre -->
                <h2 class="text-center">Formulaire d'inscription</h2>
                <!-- Formulaire d'inscription'  -->
                <div class="container mt-5">
                    <form action="" method="POST">
                        <div class="row justify-content-center">
                            <div class="col-md-6 mb-3">
                                <label class="for-label" for="firstname">Votre Prénom</label>
                                <input class="form-control" type="text" name="firstname" id="firstname" value="<?php if (isset($_POST['firstname'])) {
                                                                                                                    echo $_POST['firstname'];
                                                                                                                } ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="for-label" for="lastname">Votre Nom</label>
                                <input class="form-control" type="text" name="lastname" id="lastname" value="<?php if (isset($_POST['lastname'])) {
                                                                                                                    echo $_POST['lastname'];
                                                                                                                } ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="for-label" for="email">Votre E-mail</label>
                                <input class="form-control" type="email" name="email" id="email" value="<?php if (isset($_POST['email'])) {
                                                                                                            echo $_POST['email'];
                                                                                                        } ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="for-label" for="password">Votre Mot de Passe</label>
                                <input class="form-control" type="password" name="password" id="password" value="<?php if (isset($_POST['password'])) {
                                                                                                                        echo $_POST['password'];
                                                                                                                    } ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="for-label" for="allergies">Vos allergies éventuelles</label>
                                <input class="form-control" type="text" name="allergies" id="allergies" value="<?php if (isset($_POST['allergies'])) {
                                                                                                                    echo $_POST['allergies'];
                                                                                                                } ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="for-label" for="guest">Nombre habituel de couverts</label>
                                <select id="guest" name="guest" class="form-select">
                                    <option value="1" <?php if (isset($_POST['guest']) && ($_POST['guest'] == '1')) {
                                                            echo 'selected';
                                                        } ?>>1</option>
                                    <option value="2" <?php if (isset($_POST['guest']) && ($_POST['guest'] == '2')) {
                                                            echo 'selected';
                                                        } ?>>2</option>
                                    <option value="3" <?php if (isset($_POST['guest']) && ($_POST['guest'] == '3')) {
                                                            echo 'selected';
                                                        } ?>>3</option>
                                    <option value="4" <?php if (isset($_POST['guest']) && ($_POST['guest'] == '4')) {
                                                            echo 'selected';
                                                        } ?>>4</option>
                                    <option value="5" <?php if (isset($_POST['guest']) && ($_POST['guest'] == '5')) {
                                                            echo 'selected';
                                                        } ?>>5</option>
                                    <option value="6" <?php if (isset($_POST['guest']) && ($_POST['guest'] == '6')) {
                                                            echo 'selected';
                                                        } ?>>6</option>
                                    <option value="7" <?php if (isset($_POST['guest']) && ($_POST['guest'] == '7')) {
                                                            echo 'selected';
                                                        } ?>>7</option>
                                    <option value="8" <?php if (isset($_POST['guest']) && ($_POST['guest'] == '8')) {
                                                            echo 'selected';
                                                        } ?>>8</option>
                                    <option value="9" <?php if (isset($_POST['guest']) && ($_POST['guest'] == '9')) {
                                                            echo 'selected';
                                                        } ?>>9</option>
                                    <option value="10" <?php if (isset($_POST['guest']) && ($_POST['guest'] == '10')) {
                                                            echo 'selected';
                                                        } ?>>10</option>
                                </select>
                            </div>
                            <div class="col mt-3 mb-3 text-left">
                                <input type="submit" class="btn btn-primary my-3" value="Je m'inscris">
                            </div>
                            <div class="container d-flex justify-content-between align-items-center">
                                <div><a href="./login.php" class="btn btn-outline-primary my-3">Je me connecte</a>
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

?>