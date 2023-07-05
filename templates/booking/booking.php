<?php $title = 'Réservation'; ?>

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
                        <p class="fw-bold m-0" id="seatCapacity" style="color: #906427;">

                            <?php if ($capacity == []) {
                                echo 'choisir une date...';
                            } else {
                                echo $capacity;
                            } ?>
                        </p>
                    </div>
                </div>

                <!-- Formulaire de réservation  -->
                <div class="container mt-5">
                    <form action="" method="POST">
                        <div class="row justify-content-center">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="name">Votre Nom</label>
                                <input class="form-control" type="text" name="name" id="name" value="<?php if (is_client() || is_admin()) {
                                                                                                            echo $_SESSION['user']['lastname'];
                                                                                                        } else {
                                                                                                            if (isset($_POST['lastname'])) {
                                                                                                                echo $_POST['lastname'];
                                                                                                            }
                                                                                                        } ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="date">Date souhaitée</label>
                                <input onchange="showCapacity(this.value);" class="form-control" type="date" name="date" id="date" value="<?php if (isset($_POST['date'])) {
                                                                                                                                                echo $_POST['date'];
                                                                                                                                            } ?>">
                            </div>

                            <div class=" col-md-6 mb-3">
                                <label class="form-label" for="seat">Nombre de couverts</label>
                                <select id="seat" name="seat" class="form-select">

                                    <option value="1" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '1') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '1') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>1</option>
                                    <option value="2" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '2') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '2') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>2</option>
                                    <option value="3" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '3') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '3') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>3</option>
                                    <option value="4" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '4') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '4') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>4</option>
                                    <option value="5" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '5') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '5') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>5</option>
                                    <option value="6" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '6') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '6') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>6</option>
                                    <option value="7" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '7') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '7') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>7</option>
                                    <option value="8" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '8') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '8') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>8</option>
                                    <option value="9" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '9') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '9') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>9</option>
                                    <option value="10" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '10') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '10') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>10</option>
                                    <option value="11" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '11') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '11') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>11</option>
                                    <option value="12" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '12') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '12') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>12</option>
                                    <option value="13" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '13') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '13') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>13</option>
                                    <option value="14" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '14') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '14') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>14</option>
                                    <option value="15" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '15') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '15') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>15</option>
                                    <option value="16" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '16') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '16') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>16</option>
                                    <option value="17" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '17') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '17') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>17</option>
                                    <option value="18" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '18') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '18') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>18</option>
                                    <option value="19" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '19') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '19') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>19</option>
                                    <option value="20" <?php if ((is_client() || is_admin()) && $_SESSION['user']['guest'] == '20') {
                                                            echo 'selected';
                                                        } else {
                                                            if (isset($_POST['guest']) && $_POST['guest'] == '20') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>20</option>



                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="hour">Heure d'arrivée</label>
                                <select id="hour" name="hour" class="form-select">

                                    <option value="12h00-12h15" <?php if (isset($_POST['hour']) && ($_POST['hour'] == '12h00-12h15')) {
                                                                    echo 'selected';
                                                                } ?>>12h00-12h15</option>
                                    <option value="12h15-12h30" <?php if (isset($_POST['hour']) && ($_POST['hour'] == '12h15-12h30')) {
                                                                    echo 'selected';
                                                                } ?>>12h15-12h30</option>
                                    <option value="12h30-12h45" <?php if (isset($_POST['hour']) && ($_POST['hour'] == '12h30-12h45')) {
                                                                    echo 'selected';
                                                                } ?>>12h30-12h45</option>
                                    <option value="12h45-13h00" <?php if (isset($_POST['hour']) && ($_POST['hour'] == '12h45-13h00')) {
                                                                    echo 'selected';
                                                                } ?>>12h45-13h00</option>
                                    <option value="13h00-13h15" <?php if (isset($_POST['hour']) && ($_POST['hour'] == '13h00-13h15')) {
                                                                    echo 'selected';
                                                                } ?>>13h00-13h15</option>
                                    <option value="13h15-13h30" <?php if (isset($_POST['hour']) && ($_POST['hour'] == '13h15-13h30')) {
                                                                    echo 'selected';
                                                                } ?>>13h15-13h30</option>
                                    <option value="13h30-13h45" <?php if (isset($_POST['hour']) && ($_POST['hour'] == '13h30-13h45')) {
                                                                    echo 'selected';
                                                                } ?>>13h30-13h45</option>
                                    <option value="13h45-14h00" <?php if (isset($_POST['hour']) && ($_POST['hour'] == '13h45-14h00')) {
                                                                    echo 'selected';
                                                                } ?>>13h45-14h00</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="allergies">Eventuelle(s) allergie(s) à mentionner?</label>
                                <input class="form-control" type="text" name="allergies" id="allergies" placeholder="non" value="<?php if (is_client() || is_admin()) {
                                                                                                                                        echo $_SESSION['user']['allergies'];
                                                                                                                                    } else {
                                                                                                                                        if (isset($_POST['allergies'])) {
                                                                                                                                            echo $_POST['allergies'];
                                                                                                                                        }
                                                                                                                                    } ?>">
                            </div>
                            <div class="col mt-3 mb-3 text-left">
                                <input type="submit" class="btn btn-primary" value="Je réserve mon repas">
                            </div>
                            <div class="container d-flex  justify-content-between align-items-center">
                                <div><a href="./login.php" class="btn btn-outline-primary my-3">Je me connecte</a>
                                </div>

                                <div><a href="./index.php">Revenir sur le site</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<!-- AJout du script en AJAX pour voir les places restantes suivant une date -->
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