<?php $title = 'Réservation'; ?>

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
<section class="d-flex flex-column ">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col col-lg-8">

                <!-- Titre -->
                <h2 class="text-center">Faites votre réservation</h2>

                <div class="container mt-5 text-center rounded border border-1 border-secondary">
                    <div class="col my-2 my-sm-3">
                        Places disponibles :
                        <p class="fw-bold m-0" id="seatCapacity" style="color: #906427;">choisir une date...</p>
                    </div>
                </div>

                <!-- Formulaire de réservation  -->
                <div class="container mt-5">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="name">Votre Nom</label>
                                <input class="form-control" type="text" name="name" id="name">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="date">Date souhaitée</label>
                                <input onchange="showCapacity(this.value);" class="form-control" type="date" name="date" id="date">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="seats">Nombre de couverts</label>
                                <select id="seats" name="seats" class="form-select">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected>4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="hour">Heure d'arrivée</label>
                                <select id="hour" name="hour" class="form-select" aria-label=".form-select-lg example">

                                    <option value="12h00-12h15" selected>12h00-12h15</option>
                                    <option value="12h15-12h30">12h15-12h30</option>
                                    <option value="12h30-12h45">12h30-12h45</option>
                                    <option value="12h45-13h00">12h45-13h00</option>
                                    <option value="13h00-13h15">13h00-13h15</option>
                                    <option value="13h15-13h30">13h15-13h30</option>
                                    <option value="13h30-13h45">13h30-13h45</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="allergies">Eventuelle(s) allergie(s) à mentionner?</label>
                                <input class="form-control" type="text" name="allergies" id="allergies" placeholder="non">
                            </div>
                            <div>
                            </div>
                        </div>
                        <div class="row my-sm-3">
                            <div class="col-12 col-md-4 mt-3">
                                <input type="submit" class="btn btn-primary" value="Je réserve">
                            </div>
                            <div class="col-12 col-md-8 mt-3">
                                <a href="./login.php" type="button" class="btn btn-outline-primary ">Je me connecte</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <a href="./inscription.php" class="">Je ne suis pas encore inscrit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('./templates/layout.php'); ?>