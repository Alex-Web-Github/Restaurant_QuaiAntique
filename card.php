<?php
session_start();
require_once('./templates/header-pages.php');

?>

<!--
<hr class="hr-custom">
-->

<section class="container mt-5 mb-3">

    <!-- Titre -->
    <h2 class="text-center">Nos spécialités</h2>

    <!-- Les Filtres -->
    <div class="row mt5">
        <ul id="filters" class="">
            <li><a href="#">Tout</a></li>
            <li>Entrées</li>
            <li>Plats</li>
            <li>Desserts</li>
        </ul>
    </div>
    <!-- Les plats -->
    <div id="gallery" class="row mt-5 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">

        <!-- Un plat -->
        <div class="col ">
            <div class="card mb-3">
                <h4 class="card-header fst-italic">Douceur d'Hiver </h4>
                <div class="card-body py-3">
                    <p class="card-text fst-italic">Panna cotta de foie gras, magret de canard séché et chutney aux fruits.</p>
                    <p class="card-text"><small class="text-muted">19 Euros</small></p>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card mb-3">
                <h4 class="card-header fst-italic">Douceur d'Hiver </h4>
                <div class="card-body py-3">
                    <p class="card-text fst-italic">Panna cotta de foie gras, magret de canard séché et chutney aux fruits.</p>
                    <p class="card-text"><small class="text-muted">19 Euros</small></p>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card mb-3">
                <h4 class="card-header fst-italic">Douceur d'Hiver </h4>
                <div class="card-body py-3">
                    <p class="card-text fst-italic">Panna cotta de foie gras, magret de canard séché et chutney aux fruits.</p>
                    <p class="card-text"><small class="text-muted">19 Euros</small></p>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card mb-3">
                <h4 class="card-header fst-italic">Douceur d'Hiver </h4>
                <div class="card-body py-3">
                    <p class="card-text fst-italic">Panna cotta de foie gras, magret de canard séché et chutney aux fruits.</p>
                    <p class="card-text"><small class="text-muted">19 Euros</small></p>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card mb-3">
                <h4 class="card-header fst-italic">Douceur d'Hiver </h4>
                <div class="card-body py-3">
                    <p class="card-text fst-italic">Panna cotta de foie gras, magret de canard séché et chutney aux fruits.</p>
                    <p class="card-text"><small class="text-muted">19 Euros</small></p>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card mb-3">
                <h4 class="card-header fst-italic">Douceur d'Hiver </h4>
                <div class="card-body py-3">
                    <p class="card-text fst-italic">Panna cotta de foie gras, magret de canard séché et chutney aux fruits.</p>
                    <p class="card-text"><small class="text-muted">19 Euros</small></p>
                </div>
            </div>
        </div>


    </div>

    </div>
</section>

<?php
require_once('./templates/footer.php');
?>