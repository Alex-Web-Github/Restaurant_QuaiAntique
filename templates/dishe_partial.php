<div class="col" data-<?= $dishe->getCategory() ?>>
    <div class="card h-100 mb-3">
        <h4 class="card-header fst-italic"><?= $dishe->getTitle() ?></h4>
        <div class="card-body py-3">
            <p class="card-text fst-italic"><?= $dishe->getDescription() ?>.</p>
        </div>
        <div class="card-footer">
            <p class="card-text"><small class=""><?= $dishe->getPrice() ?> Euros</small></p>
        </div>
    </div>
</div>