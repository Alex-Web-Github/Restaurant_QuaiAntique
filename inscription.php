<?php
$errors = [];
$messages = [];
session_start();
// Rendre la page 'inscription.php' inaccessible si l'utilisateur est déjà connecté
if (isset($_SESSION['user'])) {
    header('location: ./profil.php');
}

require_once('./lib/user.php');


// On vérifie que le formulaire a bien été soumis
if (!empty($_POST)) {

    // Vérification du bon remplissage des champs ET avec des champs non vides
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        // Vérification si l'email est bien un email (le type 'email' n'est pas suffisant car modifiable en Front avec l'inspecteur de code)
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email invalide';
        }
        require_once('./lib/pdo.php');

        $res = addUser($pdo, $_POST['email'], $_POST['password']);
        if ($res) {
            $messages[] = 'Merci pour votre inscription !';

            // On connectera l'utilisateur ...

        } else {
            $errors[] = 'Une erreur s\'est produite lors de votre inscription';
        }
    }
} else {
    $errors[] = 'Formulaire incomplet';
}

include_once('./templates/header-pages.php');
?>

<section class="d-flex flex-column vh-100 ">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center">

                <!-- Titre -->
                <h2 class="text-center">Formulaire d'inscription</h2>

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

                <!-- Formulaire d'inscription'  -->
                <div class="container mt-5">

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="for-label" for="email">Votre E-mail</label>
                            <input class="form-control" type="email" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label class="for-label" for="password">Votre Mot de Passe</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Je m'inscris">
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
</section>


<?php
include_once('./templates/footer.php');
?>