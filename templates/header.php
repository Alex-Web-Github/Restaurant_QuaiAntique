<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/styles.css" />
    <title>Quai Antique | Chambéry - Savoie</title>
</head>

<body style="padding : 0;">

    <nav class="navbar navbar-expand-lg navbar-togglable fixed-top navbar-dark" style="background: linear-gradient(180deg, rgba(0,0,0,0.8) 80%, rgba(255,255,255,0) 100%);">
        <div class="container">

            <!-- Navbar brand (mobile) -->
            <a class="navbar-brand d-lg-none" href="./index.php">Quai Antique</a>

            <!-- Navbar toggler -->
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar collapse -->
            <div class="navbar-collapse collapse" id="navbarCollapse">

                <!-- Navbar nav -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="./index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./index.php#about">Le Chef</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./index.php#menus">Les Menus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">La Carte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Réservation</a>
                    </li>
                </ul>

                <!-- Navbar brand -->
                <a class="navbar-brand d-none d-lg-flex mx-lg-auto" href="./index.html">
                    <img src="/assets/img/logo-quai-antique.png" alt="logo restaurant Quai Antique" width="auto" ; height="60px" ;>
                </a>

                <!-- Navbar nav -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="./login.php">Connexion</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <header style="background: rgb(2,0,36); background: linear-gradient(180deg, rgba(0,0,0,1) 80%, rgba(57,44,30,1) 100%); position: relative; z-index: 0;">
        <div class="d-flex flex-column min-vh-100 pt-10 pt-md-8 pb-7 pb-md-0">
            <div class="container my-auto">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 text-center">

                        <!-- pré-titre -->
                        <h5 class="text-white">
                            <span class="text-secondary fw-light">Spécialités Savoyardes</span> depuis 1950
                        </h5>

                        <!-- Titre -->
                        <h1 class="display-1 text-white mb-4">
                            Quai Antique
                        </h1>

                        <!-- Sous-titre -->
                        <p class="text-center fw-lighter text-white mb-7">
                            Vivez une expérience gastronomique inoubliable.
                        </p>

                        <!-- Buttons -->
                        <div class="mt-5 d-grid gap-4 d-sm-block">
                            <a class="btn btn-primary text-white" href="./booking.php" type="button">Réserver une table</a>
                            <a class="btn btn-outline-secondary" href="./card.php" type="button">Voir la carte</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100vh; overflow: hidden; z-index: -100;">
            <div style="background-position: 50% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(/assets/img/photo1-resto.webp); height: 100%; overflow: hidden; pointer-events: none; margin-top: 0px; opacity: 0.6;"></div>
        </div>
    </header>

    <main>