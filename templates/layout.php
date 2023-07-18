<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="shortcut icon" type="image/png" href="favicon.png" />
    <title>Restaurant Quai Antique | Chambéry - Savoie</title>
</head>

<body style="padding : 0;">
    <!----- NAVIGATION ----->
    <nav class="navbar navbar-expand-lg navbar-togglable fixed-top navbar-dark" style="background: #191715e3;">
        <div class="container">

            <!-- MOBILE Navbar brand -->
            <a class="navbar-brand d-lg-none" href="./index.php">
                <img src="./assets/img/Logo_Quai-Antique-gold.png" alt="logo restaurant Quai Antique" width="auto" height="30px">
            </a>

            <!-- Navbar toggler -->
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar collapse -->
            <div class="navbar-collapse collapse" id="navbarCollapse">

                <!-- Navbar nav LEFT -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./index.php#about">Le Chef</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./index.php#menus">Les Menus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./card.php">La Carte</a>
                    </li>
                </ul>

                <!-- Navbar nav RIGHT -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./booking.php">Réservation</a>
                    </li>
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <li class="nav-item"><a href="./login.php" class="nav-link">
                                Connexion</a></li>
                    <?php } else { ?>
                        <li class="nav-item ">
                        <li class="nav-item"><a href="./logout.php" class="nav-link">Déconnexion</a></li>
                        <a href="./profil.php" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg></a>
                        </li>
                    <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!----- HEADER ----->
    <?php if (isset($header)) {
        // Affichage d'un Header spécifique s'il existe (comme sur la page Accueil)
        echo $header;
    } else {
        // Affichage du Header générique
        require_once('./templates/header-page.php');
    } ?>

    <main>
        <?php
        // Gestion des messages d'erreurs/succès
        if (!empty($errors) || (!empty($messages))) {
            include('./libs/error-manager.php');
        }
        ?>

        <?= $content ?>

    </main>

    <!----- FOOTER ----->
    <footer class="py-7 py-md-9 ">
        <div class="container-fluid  bg-success">
            <div class="container-lg mt-5 py-4 px-3">
                <div class="row gx-6">
                    <!-- presentation -->
                    <div class="col-12 col-md-4 px-md-5 mb-3 mb-md-0">
                        <h5 class="text-white-75 fw-light pb-2">
                            Quai Antique
                        </h5>
                        <p class="text-white-75 fw-lighter mb-6">
                            Restaurant gastronomique en Savoie à Chambéry. Produits locaux et goût de la qualité : vivez une expérience gastronomique avec le Chef Michant.
                        </p>
                    </div>

                    <!-- contact -->
                    <div class="col-12 col-md-4 col-sm-6 px-md-5">
                        <h5 class="text-white-75 fw-light pb-2">
                            Nous contacter
                        </h5>
                        <ul class="list-unstyled mb-3">
                            <li class="d-flex mb-2">
                                <div class="me-2 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#906427" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                    </svg></div><span class="text-white-75 fw-lighter">1 rue du centre</br>73000 CHAMBÉRY</span>
                            </li>
                            <li class="d-flex mb-2">
                                <div class="me-2 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#906427" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg></div><span class="text-white-75 fw-lighter">04.01.02.03.04</span>
                            </li>
                            <li class="d-flex">
                                <div class="me-2 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#906427" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                    </svg></div><span class="text-white-75 fw-lighter">contact@quai-antique.fr</span>
                            </li>
                        </ul>

                    </div>
                    <!-- open hours -->
                    <div class="col-12 col-md-4 col-sm-6 px-md-5">
                        <h5 class="text-white-75 pb-2 fw-light">
                            Heures d'ouvertures
                        </h5>
                        <!-- Les horaires sont définis dans une Constante, voir 'config.php' -->
                        <?php foreach (OPENING_HOURS as $key => $hours) { ?>
                            <div class="mb-3">
                                <div class="text-white-75 fw-lighter"><?= $key ?></div>
                                <div class="text-white-75 fw-lighter font-serif"><?= $hours ?></div>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bg-dark text-center">
            <div class="col-12 ">
                <p class="text-white-75 my-1 text-xs fw-lighter">Quai Antique © 2023 | AlexCréationsWeb</p>
            </div>
        </div>

    </footer>

    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/aos.js"></script>
    <script src="./js/main.js"></script>
    <script>
        AOS.init({
            duration: 1600,
            easing: "ease-in-out",
            once: true,
        });
    </script>
    <!-- Pour ne pas insérer le script AJAX de 'booking.php' à toutes les pages -->
    <?php if (isset($script)) {
        echo $script;
    } ?>

</body>

</html>