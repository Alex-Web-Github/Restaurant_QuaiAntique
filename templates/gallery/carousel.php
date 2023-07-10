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

        <!-- Bouton "Réserver" -->
        <div class="container text-center mt-5">
            <a class="btn btn-primary btn-lg mx-3 text-white" href="./booking.php" type="button">Réserver une table</a>
        </div>
        <!-- Fin Bouton "Réserver" -->
    </div>
</section>