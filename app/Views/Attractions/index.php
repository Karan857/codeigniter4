<div class="container d-flex justify-content-center align-items-center flex-column ">


    <?php foreach ($products as $index => $row): ?>
        <div class="card  mt-5" style="width: 80%;">
            <div class="card-body  d-flex justify-content-center align-items-center flex-column">
                <img src="<?= $row['image']; ?>" alt="" style="width: 400px;" class="mb-3">
                <h5 class="card-title"><?= $row['name']; ?></h5>
                <p class="card-text p-5">&nbsp;<?= $row['description']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>

        
    </div> 

</div>