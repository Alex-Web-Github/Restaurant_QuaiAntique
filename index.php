<?php session_start();
require_once('./libs/config.php');
require_once('./src/models/Gallery.php');
require_once('./src/models/GalleryManager.php');
?>

<!-- Définition du Header spécique à la page d'Accueil -->

<?php ob_start(); ?>
<header style="background: rgb(2,0,36); background: linear-gradient(180deg, rgba(0,0,0,1) 80%, rgba(57,44,30,1) 100%); position: relative; z-index: 0;">
  <div class="d-flex flex-column min-vh-100 pt-10 pt-md-8 pb-7 pb-md-0">
    <div class="container my-auto">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 text-center">

          <!-- pré-titre -->
          <h4 class="text-white" data-aos="fade-down" data-aos-delay="1600">
            <span class="text-secondary fw-light">Spécialités Savoyardes</span> depuis 1950
          </h4>

          <!--Titre -->
          <h1 class="display-1 text-white mb-4" data-aos="zoom-in">
            Quai Antique
          </h1>

          <!-- Sous-titre -->
          <p class="fs-5 text-center fw-lighter text-white mb-7" data-aos="fade-up" data-aos-delay="2900">
            Vivez une expérience gastronomique inoubliable.
          </p>

          <!-- Buttons -->
          <div class="mt-5 d-grid gap-4 d-sm-block" data-aos="custom-animation" data-aos-delay="4600">
            <a class="btn btn-primary mx-3 text-white" href="./booking.php" type="button">Réserver une table</a>
            <a class="btn btn-outline-light  mx-3" href="./card.php" type="button">Voir la carte</a>
          </div>

        </div>
      </div>
    </div>

  </div>
  <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100vh; overflow: hidden; z-index: -100;">
    <div style="background-position: 50% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(./assets/img/photo1-resto.webp); height: 100%; overflow: hidden; pointer-events: none; margin-top: 0px; opacity: 0.6;"></div>
  </div>
</header>
<?php $header = ob_get_clean(); ?>

<!-- DÉBUT Définition du contenu de la page d'Accueil -->

<?php ob_start(); ?>
<hr class="hr-custom">

<section class="mb-3">
  <div class="container">
    <h2 class="text-center" data-aos="custom-animation">Nos Spécialités</h2>

    <!-- DÉBUT du Carousel -->
    <div class="row mt-5 justify-content-center align-items-center">
      <div class="col col-sm-10 col-md-10 col-lg-6">
        <div id="carouselIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <?php
            $manager = new GalleryManager();
            $galleries = $manager->readAllGallery();
            $count = count($galleries);
            for ($i = 1; $i < $count; $i++) { ?>
              <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>"></button>
            <?php } ?>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
              <img src="./upload/<?= $galleries[0]->getFile() ?>" class="d-block w-100 rounded" data-toggle="tooltip" data-placement="bottom" title="<?= $galleries[0]->getDescription() ?>" alt="<?= $galleries[0]->getDescription() ?>">
            </div>

            <?php for ($i = 1; $i < $count; $i++) { ?>
              <div class="carousel-item " data-bs-interval="2000">
                <img src="./upload/<?= $galleries[$i]->getFile() ?>" class="d-block w-100 rounded" data-toggle="tooltip" data-placement="bottom" title="<?= $galleries[$i]->getDescription() ?>" alt="<?= $galleries[$i]->getDescription() ?>">
              </div>
            <?php
            }

            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- FIN du Carousel -->
  </div>
</section>

<section class="mb-3">
  <div class="container text-center mt-5">
    <a class="btn btn-primary btn-lg mx-3 text-white" href="./booking.php" type="button">Réserver une table</a>
  </div>
</section>
<hr class="hr-custom">

<section id="about" class="mb-3">
  <div class="container">
    <!-- Titre -->
    <h2 class="text-center" data-aos="custom-animation">Le Chef Arnaud MICHANT</h2>

    <!-- Contenu -->
    <div class="row mt-5 justify-content-center align-items-center">
      <div class="col-md-8  px-3 px-md-5 py-2">
        <p class="lead">Le Chef Arnaud Michant aime passionnément les produits - et les producteurs - de la Savoie. </br>Le Quai Antique est installé à Chambéry et propose au déjeuner comme au dîner une expérience gastronomique, à travers une cuisine sans artifice.
          </br>Plus encore que ses deux autres restaurants, Arnaud Michant le voit comme une promesse d’un voyage dans son univers culinaire.
        </p>
      </div>
      <div class="col-md-4"><img class="img-fluid rounded" src="./assets/img/photo-chef-michant.webp" alt="Le Chef Arnaud Michant"></div>

    </div>
  </div>
</section>

<hr class="hr-custom">

<section id="menus" class="mb-3">
  <div class="container">
    <!-- Titre -->
    <h2 class="text-center" data-aos="custom-animation">Les Menus</h2>

    <!-- Contenu -->
    <div class="row mx-0 mt-5 row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

      <!-- Menu du Marché -->
      <div class="col">
        <div class="card">
          <h4 class="card-header text-center">MENU DU MARCHÉ</h4>
          <img src="./assets/img/potchon.webp" class="img-fluid" alt="Menu du Marché">
          <div class="card-body py-3">
            <p class="text-center fst-italic">Menu concocté avec les ingrédients de saison, achetés au marché Bio.</p>
            <h5 class="card-title ">Formule dîner</h5>
            <h6 class="card-subtitle mb-2 text-muted">Entrée + Plat + Dessert : 20 €</h6>
            <p class="card-text">Du lundi au Samedi soir</p>
            <h5 class="card-title">Formule déjeuner</h5>
            <h6 class="card-subtitle mb-2 text-muted">Entrée + Plat ou plat + Dessert : 14 €</h6>
            <p class="card-text">Du lundi au Samedi midi</p>
          </div>

        </div>
      </div>

      <!-- Menu du Savoyard -->
      <div class="col">
        <div class="card border-primary">
          <h4 class="card-header text-center">MENU SAVOYARD</h4>
          <img src="./assets/img/fondue-trois-fromages.webp" class="img-fluid" alt="Menu Savoyard">
          <div class="card-body py-3">
            <p class="text-center fst-italic">Fondue ou raclette aux 3 fromages avec charcuterie AOP, vin de Pays.</p>
            <h5 class="card-title">Formule dîner</h5>
            <h6 class="card-subtitle mb-2 text-muted">Entrée + Plat + Dessert : 29 €</h6>
            <p class="card-text">Du lundi au Samedi soir</p>
            <h5 class="card-title">Formule déjeuner</h5>
            <h6 class="card-subtitle mb-2 text-muted">Entrée + Plat ou plat + Dessert : 23 €</h6>
            <p class="card-text">Du lundi au Samedi midi</p>
          </div>
        </div>
      </div>

      <!-- Menu Gourmet -->
      <div class="col">
        <div class="card">
          <h4 class="card-header text-center">MENU GOURMET</h4>
          <img src="./assets/img/tartiflette-au-reblochon-et-aux-lardons.webp" class="img-fluid" alt="Menu Gourmet">
          <div class="card-body py-3">
            <p class="text-center fst-italic">Truite du lac et poulet de Bresse (sauce aux champignons), vin de Pays.</p>
            <h5 class="card-title">Formule dîner</h5>
            <h6 class="card-subtitle mb-2 text-muted">Entrée + Plat + Dessert : 39 €</h6>
            <p class="card-text">Du lundi au Samedi soir</p>
            <h5 class="card-title">Formule déjeuner</h5>
            <h6 class="card-subtitle mb-2 text-muted">Entrée + Plat ou plat + Dessert : 33 €</h6>
            <p class="card-text">Du lundi au Samedi midi</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php $content = ob_get_clean(); ?>
<!-- FIN Définition du contenu de la page d'Accueil -->

<?php require_once('./templates/layout.php'); ?>