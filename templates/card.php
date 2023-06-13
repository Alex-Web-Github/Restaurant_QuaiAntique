<?php $title = 'Nos spécialités'; ?>

<?php ob_start(); ?>
<header style="background: rgb(2,0,36); background: linear-gradient(180deg, rgba(0,0,0,1) 80%, rgba(57,44,30,1) 100%); position: relative; z-index: 0; max-height: 60vh;">
    <div class="d-flex flex-column h-100 pt-10 pt-md-8 pb-7 pb-md-0">
        <div class="container" style="margin-top: 7rem;">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 text-center">
                    <!-- Titre -->
                    <h1 class="display-1 text-white mb-4">
                        <?= $title ?>
                    </h1>

                </div>
            </div>
        </div>
    </div>
    <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100;">
        <div style="background-position: 50% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(./assets/img/photo1-resto.webp); height: 100%; overflow: hidden; pointer-events: none; margin-top: 0px; opacity: 0.6;"></div>
    </div>
</header>
<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>
<section class="container mt-5 mb-3">

    <!-- Titre -->
    <h2 class="text-center">Découvrez nos plats</h2>

    <!-- Les Filtres -->
    <div class="row mt-5 justify-content-center mt5">

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
<?php $content = ob_get_clean(); ?>

<?php require('./templates/layout.php'); ?>