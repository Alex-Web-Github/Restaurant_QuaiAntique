<?php
session_start();

$titlePage = 'Connexion';
include_once('./templates/header-pages.php');

$errors = [];
$messages = [];

// Pour rendre la page 'login.php' inaccessible si l'utilisateur est déjà connecté
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
        // Connexion à la BDD 
        require_once('./lib/pdo.php');
        $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);

        // Redirection vers la page 'admin.php' si c'est un Admin, sinon vers la page profil.php (dans si c'est un client)
        if ($_SESSION['user']['role'] == 'admin') {
            header('location: ./admin.php');
        } else {
            header('location: ./profil.php');
        }
    } else {
        $errors[] = 'Formulaire incomplet';
    }

    // Gestion des messages d'erreurs/succès
    if (!empty($errors) || (!empty($messages))) {
        include_once('./lib/error-manager.php');
    }
}

?>

<section class="d-flex flex-column ">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center">

                <!-- Titre -->
                <h2 class="text-center">Formulaire de connexion</h2>

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
                        <input type="submit" class="btn btn-primary my-3" value="Me connecter">
                        <div class="col py-3">
                            <a href="./inscription.php">Je ne suis pas encore inscrit</a>
                        </div>
                        
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