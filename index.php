<?php session_start();
require_once('./libs/config.php');
require_once('./src/models/Gallery.php');
require_once('./src/models/GalleryManager.php');
?>

<!-- DÉBUT du Header spécifique à la page d'Accueil -->
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
          <div class="mt-5 d-grid gap-4 d-sm-block mx-5 mx-sm-0" data-aos="custom-animation" data-aos-delay="4600">
            <a class="btn btn-primary mx-3 text-white" href="./booking.php" type="button">Réserver une table</a>
            <a class="btn btn-secondary mx-3" href="./card.php" type="button">Découvrez notre carte</a>
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
<!-- FIN du Header spécifique à la page d'Accueil -->

<!-- DÉBUT du contenu de la page d'Accueil -->
<?php ob_start(); ?>

<!-- DÉBUT Inclusion du code du Carousel d'images -->
<?php
$manager = new GalleryManager();
$galleries = $manager->readAllGallery();
include('./templates/gallery/carousel.php');
?>
<!-- FIN Inclusion du code du Carousel d'images -->

<!-- DÉBUT Section A Propos -->
<hr class="hr-custom">
<section id="about" class="mb-3">
  <div class="container">
    <!-- Titre -->
    <h2 class="text-center" data-aos="custom-animation">Le Chef Arnaud MICHANT</h2>

    <!-- Contenu -->
    <div class="row mt-5 justify-content-center align-items-center">
      <div class="col-md-8  px-3 px-md-5 py-2" data-aos="fade-up" data-aos-delay="0">
        <p class="lead">Le Chef Arnaud Michant aime passionnément les produits - et les producteurs - de la Savoie. </br>Le Quai Antique est installé à Chambéry et propose au déjeuner comme au dîner une expérience gastronomique, à travers une cuisine sans artifice.
          </br>Plus encore que ses deux autres restaurants, Arnaud Michant le voit comme une promesse d’un voyage dans son univers culinaire.
        </p>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200"><img class="img-fluid rounded" src="./assets/img/photo-chef-michant.webp" alt="Le Chef Arnaud Michant"></div>

    </div>
  </div>
</section>
<!-- FIN Section A Propos -->

<!-- DÉBUT Section des Menus -->
<hr class="hr-custom">
<section id="menus" class="mb-3">
  <div class="container">
    <!-- Titre -->
    <h2 class="text-center" data-aos="custom-animation">Les Menus</h2>

    <div class="row mx-0 mt-5 row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      <?php
      // Bouclage sur la constante "MENUS_DATA" du fichier config.php 
      foreach (MENUS_DATA as $key => $values) {
        if (is_Array($values)) { ?>

          <!-- DÉBUT affichage d'un menu -->
          <div class="col">
            <div class="card" data-aos="<?= $values['data-aos'] ?>" data-aos-delay="<?= $values['data-aos-delay'] ?>">
              <h4 class="card-header text-center"><?= $key ?></h4>
              <img src="<?= $values['img_path'] ?>" class="img-fluid" alt="<?= $key ?>">
              <div class="card-body py-3">
                <p class="text-center fst-italic"><?= $values['description'] ?></p>
                <h5 class="card-title ">Formule dîner</h5>
                <h6 class="card-subtitle mb-2 text-muted">Entrée + Plat + Dessert : <?= $values['evening-price'] ?> €</h6>
                <p class="card-text">Du lundi au Samedi soir</p>
                <h5 class="card-title">Formule déjeuner</h5>
                <h6 class="card-subtitle mb-2 text-muted">Entrée + Plat ou plat + Dessert : <?= $values['noon-price'] ?> €</h6>
                <p class="card-text">Du lundi au Samedi midi</p>
              </div>
            </div>
          </div>
          <!-- FIN affichage d'un menu -->

      <?php }
      }
      ?>
    </div>

  </div>
  </div>
</section>
<!-- FIN Section des Menus -->

<?php $content = ob_get_clean(); ?>
<!-- FIN du contenu de la page d'Accueil -->

<?php require_once('./templates/layout.php'); ?>