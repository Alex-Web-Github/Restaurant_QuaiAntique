<?php $title = 'Gestion de la Galerie'; ?>

<?php ob_start(); ?>
<section class="d-flex vh-100">
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-10">
                <!-- Titre -->
                <h2 class="text-center">Ajouter une image à la Galerie</h2>

                <!-- Formulaire d'ajout d'image à la Galerie  -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-5">
                        <label class="for-label" for="filename">Nom de l'image</label>
                        <input class="form-control" type="text" name="filename" id="filename" value="<?php $_POST['filename'] ?? null ?>">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="description">Description</label>
                        <input class="form-control" type="text" name="description" id="description" value="<?= $_POST['description'] ?? null ?>">
                    </div>
                    <div class="mb-3">
                        <label class="for-label" for="uploaded_file">Fichier à télécharger</label>
                        <input class="form-control" type="file" name="uploaded_file" id="uploaded_file" value="">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enregistrer l'image">
                </form>

                <p class="px-2 py-3">
                    <a href="./admin.php">Retour page Admin.</a>
                </p>
            </div>

        </div>
    </div>

</section>
<?php $content = ob_get_clean(); ?>

<?php require_once('./templates/layout.php'); ?>