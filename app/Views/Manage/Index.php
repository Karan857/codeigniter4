<div class="container ">
    <a href="<?= base_url('manage/create'); ?>" class="btn btn-primary my-3">เพิ่มสถานที่ท่องเที่ยว</a>
    <table class="table table-hover table-bordered text-center ">
        <thead>
            <tr>
                <th scope="col" class="text-center">ลำดับ</th>
                <th scope="col">สถานที่ท่องเที่ยว</th>
                <th scope="col" width="500">รายละเอียด</th>
                <th scope="col">ข้าเข้า / บาท</th>
                <th scope="col">ตำแหน่งที่ตั้ง</th>
                <th scope="col">รูปภาพ</th>
                <th scope="col" class="text-center" width="60">แก้ไข</th>
                <th scope="col" class="text-center" width="60">ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $index => $row): ?>
                <tr>
                    <th class="text-center" scope="row"><?= ($index + 1); ?></th>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['description']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td><?= $row['location']; ?></td>
                    <td>
                        <img src="<?= base_url() . $row['image']; ?>" width="100" alt="<?= $row['name']; ?>">
                    </td>
                    <td class="text-center">
                        <a href="<?= base_url('manage/update/' . $row['product_id']); ?>" class="btn btn-success">แก้ไข</a>
                    </td>
                    <td class="text-center">
                        <button action="delete" data-id="<?= $row['product_id']; ?>" class="btn btn-danger">ลบ</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
        document.addEventListener('click', function(event) {
            var target = event.target;
            if (target.matches('button[action="delete"]')) {
                event.preventDefault();
                Swal.fire({
                    title: "ยืนยันการลบ?",
                    text: "ต้องการที่จะลบข้อมูลหรือไม่",
                    icon: "question",
                    showCancelButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = '<?= base_url() . 'manage/delete/' ?>' + target.dataset.id;
                    }
                });
            }
        });
    </script>

