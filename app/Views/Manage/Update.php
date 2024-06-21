<div class="container mb-8" >
    <form method="post" action="<?= base_url(); ?>manage/update/submit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $rowProduct['product_id']; ?>">
        <h3 class="my-3">แก้ไขสถานที่ท่องเที่ยว</h3>
        <div class="mb-3">
            <label for="name" class="form-label">ชื่อสถานที่ท่องเที่ยว</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $rowProduct['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">รายละเอียดสถานที่ท่องเที่ยว</label>
            <textarea class="form-control" name="description" id="description"><?= $rowProduct['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label"></label>
            <textarea class="form-control" name="price" id="price"><?= $rowProduct['price']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">ตำแหน่งที่ตั้ง</label>
            <textarea class="form-control" name="location" id="location"><?= $rowProduct['location']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">อัปโหลดรูปภาพ</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <?php if ($rowProduct['image'] != '' && file_exists($rowProduct['image'])): ?>
            <div class="mb-3">
                <img src="<?= base_url() . $rowProduct['image']; ?>" alt="รูปภาพ" width="180">
            </div>
        <?php endif ?>
        <div class="d-grid gap-2 ทข5" >
            <button class="btn btn-primary" type="submit">แก้ไขสถานที่ท่องเที่ยว</button>
            <a class="btn btn-secondary" href="<?= base_url(); ?>manage">กลับไปหน้ารายการ</a>
        </div>
    </form>
</div>