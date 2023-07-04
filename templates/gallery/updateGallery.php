<?php $title = 'Gestion de la Galerie'; ?>

<?php ob_start(); ?>
<section class="d-flex vh-100">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-10">
                <!-- Titre -->
                <h2 class="text-center">Détails de l'image n° <?= $gallery->getId() ?></h2>

                <!-- Formulaire d'ajout d'image à la Galerie  -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-5">
                        <label class="for-label" for="filename">Nom de l'image</label>
                        <input class="form-control" type="text" name="filename" id="filename" value="<?= $gallery->getName() ?>">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="description">Description</label>
                        <input class="form-control" type="text" name="description" id="description" value="<?= $gallery->getDescription() ?>">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="uploaded_file">Fichier à télécharger</label>
                        <input class="form-control" type="file" name="uploaded_file" id="uploaded_file" value="<?= $gallery->getFile() ?>">
                    </div>

                    <div class="row">
                        <div class="col mt-3 mb-3">
                            <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
                        </div>
                        <div class="col mt-3 mb-3">
                            <a href="./deleteGallery.php?id=<?= $gallery->getId() ?>" class="btn btn-outline-danger">Supprimer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <a href="./admin.php" class="">Retour tableau de bord</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require_once('./templates/layout.php'); ?>