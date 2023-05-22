<?php
session_start();

require_once('./lib/reservations.php');
// Initialisation des messages d'erreur et de succès
$errors = [];
$messages = [];


// On vérifie que le formulaire a bien été soumis
if (!empty($_POST)) {
    // Vérification si les champs sont définis et NON vides
    if (
        isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['date']) && !empty($_POST['date'])
        && isset($_POST['seats']) && !empty($_POST['seats'])
        && isset($_POST['hour']) && !empty($_POST['hour'])
        && isset($_POST['allergies'])
    ) {
        //tentative pour empêcher la réservation au dessus du quota fixé (20places), mais mon code ne fonctionne pas...
        //include('./getcapacity.php');
        //if ($_POST['seats'] > $data) {
        // Demande de couverts > nb de places restantes
        //$errors[] = 'Réservation impossible.';
        //}

        // On nettoie les données envoyées
        $date = strip_tags($_POST['date']);
        $seats = strip_tags($_POST['seats']);
        $name = strip_tags($_POST['name']);
        $hour = strip_tags($_POST['hour']);
        $allergies = strip_tags($_POST['allergies']);

        // traitement des données du formulaire
        include_once('./lib/pdo.php');
        addBooking($pdo, $date, $seats, $name, $hour, $allergies);

        // Message de confirmation
        $messages[] = 'Votre réservation est enregistrée. Merci et à bientôt chez nous !';
        require_once('./lib/close-pdo.php');
        //Redirection vers page d'Accueil
        //header('location: ./index.php');
    } else {
        $errors[] = 'Le formulaire est incomplet';
    }
}
$titlePage = 'Réservation';
include_once('./templates/header-pages.php');

?>

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

<section class="d-flex flex-column ">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col col-lg-8">

                <!-- Gestion des messages d'erreurs/succès -->
                <?php if (($errors) || (($messages))) {
                    include_once('./lib/error-manager.php');
                }
                ?>

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
                            <!--
                                <input class="form-control" type="number" name="seats" id="seats" value="4" min="1" max="20">
                            </div>
-->
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

<?php
include_once('./templates/footer.php');
?>