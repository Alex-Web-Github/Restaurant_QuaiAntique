<?php $title = 'Nos spécialités'; ?>

<?php ob_start(); ?>
<section class="container mt-5 mb-3">

  <!-- Titre -->
  <h2 class="text-center">Découvrez nos plats</h2>

  <!-- Les Filtres -->
  <div class="row mt-5 justify-content-center mt5">
    <ul id="filters" class="nav nav-pills justify-content-center mb-6">
      <li class="filter-list-item nav-item"><a id="all" class="nav-link active">Tout</a></li>
      <li class="filter-list-item nav-item"><a id="entrées" class="nav-link">Entrées</a></li>
      <li class="filter-list-item nav-item"><a id="plats" class="nav-link">Plats</a></li>
      <li class="filter-list-item nav-item"><a id="desserts" class="nav-link">Desserts</a></li>
    </ul>
    <!-- Les plats -->
    <div id="cards-gallery" class="row mt-5 row-cols-1 row-cols-sm-2 row-cols-md-3  g-4">
      <?php foreach ($dishes as $dishe) {
        include('./templates/dishe/dishe_partial.php'); ?>
      <?php } ?>
    </div>
  </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require_once('./templates/layout.php'); ?>