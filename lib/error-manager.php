<!-- Affichage des messages d'erreur et de confirmation -->
<?php foreach ($messages as $message) { ?>
    <div class="text-center alert alert-info">
        <?= $message; ?>
    </div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
    <div class="text-center alert alert-danger">
        <?= $error; ?>
    </div>
<?php } ?>