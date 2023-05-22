<?php
session_start();
$titlePage = 'Nos spécialités';
require_once('./templates/header-pages.php');
require_once('./lib/dishe.php');
require_once('./lib/pdo.php');

$dishes = getDishes($pdo);
?>

<section class="container mt-5 mb-3">

    <!-- Titre -->
    <h2 class="text-center">Découvrez nos plats</h2>

    <!-- Les Filtres -->
    <div class="row mt-5 navbar justify-content-center mt5">

        <ul id="filters" class="nav nav-pills justify-content-center mb-6">
            <li class="nav-item"><a id="all" class="nav-link active">Tout</a></li>
            <li class="nav-item"><a id="entrées" class="nav-link">Entrées</a></li>
            <li class="nav-item"><a id="plats" class="nav-link">Plats</a></li>
            <li class="nav-item"><a id="desserts" class="nav-link">Desserts</a></li>
        </ul>

        <!-- Les plats -->
        <div id="gallery" class="row mt-5 row-cols-1 row-cols-sm-2 row-cols-md-3  g-4">

            <?php foreach ($dishes as $key => $dishe) {
                include('./templates/dishe_partial.php');
            }
            ?>
        </div>
    </div>
</section>

<?php
require_once('./templates/footer.php');
?>