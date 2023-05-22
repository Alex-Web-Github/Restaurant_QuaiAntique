<?php
session_start();
require_once('./templates/header-home.php');
require_once('./lib/pdo.php');
?>

<hr class="hr-custom">

<section class="mb-3">
  <div class="container">
    <h2 class="text-center">Nos spécialités</h2>

    <div class="row gy-3 mt-5  row-cols-1 row-cols-md-2 row-cols-lg-3">
      <div class="col text-center px-3"><img class="img-fluid rounded" data-toggle="tooltip" data-placement="bottom" title="La tartiflette-au-reblochon-et-aux-lardons" src="./upload/tartiflette-au-reblochon-et-aux-lardons.webp" alt="tartiflette-au-reblochon-et-aux-lardons"></div>
      <div class="col text-center px-3"><img class="img-fluid rounded" data-toggle="tooltip" data-placement="bottom" title="le Potchon" src="./upload/potchon.webp" alt="potchon"></div>
      <div class="col text-center px-3"><img class="img-fluid rounded" data-toggle="tooltip" data-placement="bottom" title="Les crozets-savoyards" src="./upload/crozets-savoyard.webp" alt="crozets-savoyards"></div>
      <div class="col text-center px-3"><img class="img-fluid rounded" data-toggle="tooltip" data-placement="bottom" title="La fondue aux 3 fromages" src="./upload/fondue-trois-fromages.webp" alt="fondue aux 3 fromages"></div>
      <div class="col text-center px-3"><img class="img-fluid rounded" data-toggle="tooltip" data-placement="bottom" title="La tarte-aux-myrtilles" src="./upload/tarte-aux-myrtilles-facile.webp" alt="tarte-aux-myrtilles"></div>
      <div class="col text-center px-3"><img class="img-fluid rounded" data-toggle="tooltip" data-placement="bottom" title="La tartiflette-aux-endives" src="./upload/tartiflette-aux-endives.webp" alt="tartiflette-aux-endives"></div>
    </div>
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
    <h2 class="text-center">Le Chef Arnaud MICHANT</h2>

    <!-- Contenu -->
    <div class="row mt-5 justify-content-center align-items-center">
      <div class="col-md-8 px-5 py-2">
        <p class="fs-5">Le Chef Arnaud Michant aime passionnément les produits - et les producteurs - de la Savoie. </br>Le Quai Antique est installé à Chambéry et propose au déjeuner comme au dîner une expérience gastronomique, à travers une cuisine sans artifice.
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
    <h2 class="text-center">Les Menus</h2>

    <!-- Contenu -->
    <div class="row mx-0 mt-5 row-cols-1 row-cols-md-3 g-4">

      <!-- Menu du Marché -->
      <div class="col">
        <div class="card">
          <h4 class="card-header">MENU DU MARCHÉ</h4>
          <img src="./assets/img/photo1-resto.webp" class="card-img-top img-fluid" alt="Menu du Marché">
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
          <h4 class="card-header">MENU SAVOYARD</h4>
          <img src="./assets/img/photo1-resto.webp" class="card-img-top img-fluid" alt="Menu Savoyard">
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
          <h4 class="card-header">MENU GOURMET</h4>
          <img src="./assets/img/photo1-resto.webp" class="card-img-top img-fluid" alt="Menu Gourmet">
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

<?php
require_once('./templates/footer.php');
?>