<div class="container">
    <form method="post" action="<?= base_url(); ?>product/create/submit" enctype="multipart/form-data">
        <h3 class="my-3">เพิ่มร้านอาหาร</h3>
        <div class="mb-3">
            <label for="name" class="form-label">ชื่อร้าน</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">รายละเอียดร้าน</label>
            <textarea class="form-control" name="desc" id="desc"></textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">ตำแหน่งที่ตั้ง</label>
            <textarea class="form-control" name="location" id="location"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">อัปโหลดรูปภาพ</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">เพิ่มร้านอาหาร</button>
            <a class="btn btn-secondary" href="<?= base_url(); ?>product">กลับไปหน้ารายการ</a>
        </div>
    </form>
</div>