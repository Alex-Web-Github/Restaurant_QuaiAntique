<?php $title = 'Gestion des réservations'; ?>

<?php
if (is_null($booking)) {
    header('location: ./404.php');
} else {

    ob_start(); ?>
    <section class="d-flex vh-100">
        <div class="container ">
            <div class="row mt-5 justify-content-center">
                <div class="col-12 col-md-10">
                    <!-- Titre -->
                    <h2 class="text-center">Détails de la réservation n° <?= $booking->getId() ?></h2>

                    <!-- Affichage places disponibles-->
                    <div class="container mt-5 text-center rounded border border-1 border-secondary">
                        <div class="col my-2 my-sm-3">
                            Places disponibles :
                            <p class="fw-bold m-0" id="seatCapacity" style="color: #906427;">

                                <?php if ($capacity == []) {
                                    echo 'choisir une date...';
                                } else {
                                    echo $capacity;
                                } ?>
                            </p>
                        </div>
                    </div>
                    <!-- Affichage places disponibles-->

                    <div class="container mt-5">
                        <!-- START FORM -->
                        <form action="" method="POST">
                            <div class="row justify-content-center">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="name">Votre Nom</label>
                                    <input class="form-control" type="text" name="name" id="name" value="<?= $booking->getName() ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="date">Date souhaitée</label>
                                    <input onchange="showCapacity(this.value);" class="form-control" type="date" name="date" id="date" value="<?= $booking->getDate() ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="seat">Nombre de couverts</label>
                                    <select id="seat" name="seat" class="form-select">
                                        <option value="1" <?php if ($booking->getSeat() == '1') {
                                                                echo 'selected';
                                                            } ?>>1</option>
                                        <option value="2" <?php if ($booking->getSeat() == '2') {
                                                                echo 'selected';
                                                            } ?>>2</option>
                                        <option value="3" <?php if ($booking->getSeat() == '3') {
                                                                echo 'selected';
                                                            } ?>>3</option>
                                        <option value="4" <?php if ($booking->getSeat() == '4') {
                                                                echo 'selected';
                                                            } ?>>4</option>
                                        <option value="5" <?php if ($booking->getSeat() == '5') {
                                                                echo 'selected';
                                                            } ?>>5</option>
                                        <option value="6" <?php if ($booking->getSeat() == '6') {
                                                                echo 'selected';
                                                            } ?>>6</option>
                                        <option value="7" <?php if ($booking->getSeat() == '7') {
                                                                echo 'selected';
                                                            } ?>>7</option>
                                        <option value="8" <?php if ($booking->getSeat() == '8') {
                                                                echo 'selected';
                                                            } ?>>8</option>
                                        <option value="9" <?php if ($booking->getSeat() == '9') {
                                                                echo 'selected';
                                                            } ?>>9</option>
                                        <option value="10" <?php if ($booking->getSeat() == '10') {
                                                                echo 'selected';
                                                            } ?>>10</option>
                                        <option value="11" <?php if ($booking->getSeat() == '11') {
                                                                echo 'selected';
                                                            } ?>>11</option>
                                        <option value="12" <?php if ($booking->getSeat() == '12') {
                                                                echo 'selected';
                                                            } ?>>12</option>
                                        <option value="13" <?php if ($booking->getSeat() == '13') {
                                                                echo 'selected';
                                                            } ?>>13</option>
                                        <option value="14" <?php if ($booking->getSeat() == '14') {
                                                                echo 'selected';
                                                            } ?>>14</option>
                                        <option value="15" <?php if ($booking->getSeat() == '15') {
                                                                echo 'selected';
                                                            } ?>>15</option>
                                        <option value="16" <?php if ($booking->getSeat() == '16') {
                                                                echo 'selected';
                                                            } ?>>16</option>
                                        <option value="17" <?php if ($booking->getSeat() == '17') {
                                                                echo 'selected';
                                                            } ?>>17</option>
                                        <option value="18" <?php if ($booking->getSeat() == '18') {
                                                                echo 'selected';
                                                            } ?>>18</option>
                                        <option value="19" <?php if ($booking->getSeat() == '19') {
                                                                echo 'selected';
                                                            } ?>>19</option>
                                        <option value="20" <?php if ($booking->getSeat() == '20') {
                                                                echo 'selected';
                                                            } ?>>20</option>




                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="hour">Heure d'arrivée</label>
                                    <select id="hour" name="hour" class="form-select">

                                        <option value="12h00-12h15" <?php if ($booking->getHour() == '12h00-12h15') {
                                                                        echo 'selected';
                                                                    } ?>>12h00-12h15</option>
                                        <option value="12h15-12h30" <?php if ($booking->getHour() == '12h15-12h30') {
                                                                        echo 'selected';
                                                                    } ?>>12h15-12h30</option>
                                        <option value="12h30-12h45" <?php if ($booking->getHour() == '12h30-12h45') {
                                                                        echo 'selected';
                                                                    } ?>>12h30-12h45</option>
                                        <option value="12h45-13h00" <?php if ($booking->getHour() == '12h45-13h00') {
                                                                        echo 'selected';
                                                                    } ?>>12h45-13h00</option>
                                        <option value="13h00-13h15" <?php if ($booking->getHour() == '13h00-13h15') {
                                                                        echo 'selected';
                                                                    } ?>>13h00-13h15</option>
                                        <option value="13h15-13h30" <?php if ($booking->getHour() == '13h15-13h30') {
                                                                        echo 'selected';
                                                                    } ?>>13h15-13h30</option>
                                        <option value="13h30-13h45" <?php if ($booking->getHour() == '13h30-13h45') {
                                                                        echo 'selected';
                                                                    } ?>>13h30-13h45</option>
                                        <option value="13h45-14h00" <?php if ($booking->getHour() == '13h45-14h00') {
                                                                        echo 'selected';
                                                                    } ?>>13h45-14h00</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="allergies">Eventuelle(s) allergie(s) à mentionner?</label>
                                    <input class="form-control" type="text" name="allergies" id="allergies" placeholder="non" value="<?= $booking->getAllergies() ?>">
                                </div>
                                <!-- Important !!! -->
                                <input type="hidden" name="id" id="id" value="<?= $booking->getId() ?>">
                                <!-- Important !!! -->
                            </div>
                            <div class="row">
                                <div class="col mt-3 mb-3">
                                    <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
                                </div>
                                <div class="col mt-3 mb-3">
                                    <a href="./deleteBooking.php?id=<?= $booking->getId() ?>" class="btn btn-outline-danger">Supprimer</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <a href="./admin.php" class="">Retour tableau de bord</a>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM -->
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $content = ob_get_clean();
}
?>
<?php ob_start(); ?>
<!-- Ajout du script en AJAX pour voir les places restantes suivant une date -->
<script>
    function showCapacity(str) {
        if (str == "") {
            document.getElementById("seatCapacity").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("seatCapacity").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getcapacity.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>
<?php $script = ob_get_clean(); ?>

<?php require_once('./templates/layout.php'); ?>