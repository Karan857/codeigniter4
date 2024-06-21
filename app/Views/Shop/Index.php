<div class="container">
    <h1>สินค้า</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="card h-100">
                    <?php if ($product['image'] != '' && file_exists($product['image'])): ?>
                        <img src="<?= $product['image']; ?>" class="card-img-top" alt="รูปภาพ">
                    <?php endif ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name']; ?></h5>
                        <p class="card-text"><?= $product['description']; ?></p>
                        <h5><?= number_to_currency($product['price'], 'THB', 'th-TH'); ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>