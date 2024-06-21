<div class="container">
    <form method="post" action="<?= base_url(); ?>product/update/submit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $rowProduct['food_id']; ?>">
        <h3 class="my-3">แก้ไขร้านอาหาร</h3>
        <div class="mb-3">
            <label for="name" class="form-label">ชื่อร้านอาหาร</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $rowProduct['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">รายละเอียดร้านอาหาร</label>
            <textarea class="form-control" name="desc" id="desc"><?= $rowProduct['desc']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">ตำแหน่งที่ตั้ง</label>
            <input type="number" class="form-control" name="location" id="location" min="0" step="1" value="<?= $rowProduct['location']; ?>">
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
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">แก้ไขร้านอาหาร</button>
            <a class="btn btn-secondary" href="<?= base_url(); ?>product">กลับไปหน้ารายการ</a>
        </div>
    </form>
</div>