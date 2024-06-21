<div class="container">
    <form method="post" action="<?= base_url(); ?>manage/create/submit" enctype="multipart/form-data">
        <h3 class="my-3">เพิ่มสถานที่ท่องเที่ยว</h3>
        <div class="mb-3">
            <label for="name" class="form-label">ชื่อสถานที่ท่องเที่ยว</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">คำอธิบาย</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">ตำแหนงที่ตั้ง</label>
            <textarea class="form-control" name="location" id="location"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">ราคา</label>
            <textarea class="form-control" name="price" id="price"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">อัปโหลดรูปภาพ</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">เพิ่มสถานที่ท่องเที่ยว</button>
            <a class="btn btn-secondary" href="<?= base_url(); ?>manage">กลับไปหน้ารายการ</a>
        </div>
    </form>
</div>