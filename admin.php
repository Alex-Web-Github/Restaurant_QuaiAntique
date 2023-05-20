<?php
session_start();
// Rendre la page 'admin.php' inaccessible si l'utilisateur n'est pas connecté OU si connecté en tant que 'client'
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] == 'client') {
    header('location: ./index.php');
}

require_once('./lib/dishe.php');
require_once('./lib/pdo.php');
$titlePage = 'Administration';
require_once('./templates/header-pages.php');


$errors = [];
$messages = [];

// Je récupère tous les plats depuis la BDD avec cette fonction
$dishes = getDishes($pdo);
?>

<!-- Affichage des messages d'erreur et de confirmation -->
<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success">
        <?= $message; ?>
    </div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
    <div class="text-center alert alert-danger">
        <?= $error; ?>
    </div>
<?php } ?>

<!-- Barre d'Administration -->
<section>
    <div class="px-3 py-2 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">

                    <li>
                        <a href="./admin.php#dishes" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                            </svg>
                            Les Plats
                        </a>
                    </li>
                    <li>
                        <a href="./admin.php#photos" class="nav-link text-white ">
                            <svg class="bi d-block mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                            Les photos
                        </a>
                    </li>

                    <li>
                        <a href="./admin.php#menus" class="nav-link text-white ">
                            <svg class="bi d-block mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                            </svg>
                            Les Menus
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- CRUD des plats proposés -->
<section class="d-flex flex-column">
    <div class="container ">
        <div id="dishes" class="row mt-5 justify-content-center">

            <div class="col-12 col-lg-10 mt-5 ">
                <!-- Titre -->
                <h2 class="text-center">Gestion des plats de la carte</h2>

                <!-- Liste des plats -->
                <div class="row mt-5 py-3">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Catégorie</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Description</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">

                            <?php foreach ($dishes as $key => $dishe) { ?>
                                <tr>
                                    <th scope="row"><?= $dishe['id']; ?></th>
                                    <td><?= $dishe['category']; ?></td>
                                    <td><?= $dishe['title']; ?></td>
                                    <td><?= $dishe['description']; ?></td>
                                    <td><?= $dishe['price']; ?></td>
                                    <td class="d-grid gap-2 d-md-block">

                                        <a type="button" class="btn btn-outline-primary" href="./readDishe.php?id=<?= $dishe['id']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
                <div class="row justify-content-between py-3">
                    <div class="col col-md-5">
                        <a href="./index.php" class="btn btn-outline-primary">Retour à la page d'accueil</a>
                    </div>
                    <div class="col text-end col-md-5">
                        <a href="./addDishe.php" class="btn btn-outline-info">Ajouter un plat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CRUD des photos de la galerie -->
<section class="d-flex flex-column">
    <div class="container ">
        <div id="photos" class="row mt-5 justify-content-center">
            <div class="col-12 col-lg-10 mt-5 ">
                <!-- Titre -->
                <h2 class="text-center">Gestion de la galerie de photos</h2>
                <!-- Liste des photos -->
                <div class="row mt-5 py-3">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">URL</th>
                                <th scope="col">Aperçu</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">#1</th>
                                <td>photo-gallery-1</td>
                                <td>URL</td>
                                <td>Aperçu</td>
                                <td class="d-grid gap-2 d-md-block">
                                    <a type="button" class="btn btn-outline-primary disabled " href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-between py-3">
                    <div class="col col-md-5">
                        <a href="#" class="btn btn-outline-primary">Retour à la page d'accueil</a>
                    </div>
                    <div class="col text-end col-md-5">
                        <a href="#" class="btn btn-outline-info disabled">Ajouter une photo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CRUD des menus -->
<section class="d-flex flex-column">
    <div class="container ">
        <div id="menus" class="row mt-5 justify-content-center">
            <div class="col-12 col-lg-10 mt-5 ">
                <!-- Titre -->
                <h2 class="text-center">Gestion des menus affichés</h2>
                <!-- Liste des photos -->
                <div class="row mt-5 py-3">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Description</th>
                                <th scope="col">Tarif midi</th>
                                <th scope="col">Tarif soir</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">#1</th>
                                <td>Menu du Marché</td>
                                <td>Menu concocté avec les ingrédients de saison, achetés au marché Bio.</td>
                                <td>14 €</td>
                                <td>20 €</td>
                                <td class="d-grid gap-2 d-md-block">
                                    <a type="button" class="btn btn-outline-primary disabled " href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-between py-3">
                    <div class="col col-md-5">
                        <a href="#" class="btn btn-outline-primary">Retour à la page d'accueil</a>
                    </div>
                    <div class="col text-end col-md-5">
                        <a href="#" class="btn btn-outline-info disabled">Ajouter un menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
require_once('./templates/footer.php');
?>