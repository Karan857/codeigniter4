<div class="container mx-auto px-4 py-8">
    <a href="<?= base_url('product/create'); ?>" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
        เพิ่มรถยนต์
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">ลำดับ</th>
                    <th class="py-2 px-4 border-b">รูปภาพ</th>
                    <th class="py-2 px-4 border-b">ชื่อรุ่น</th>
                    <th class="py-2 px-4 border-b w-1/3">รายละเอียด</th>
                    <th class="py-2 px-4 border-b">แบรนด์</th>
                    <th class="py-2 px-4 border-b">ราคา</th>
                    <th class="py-2 px-4 border-b">แก้ไข</th>
                    <th class="py-2 px-4 border-b">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $index => $row) : ?>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b text-center"><?= ($index + 1); ?></td>
                        <td class="py-2 px-4 border-b">
                            <img src="<?= base_url() . $row['image']; ?>" class="w-24 h-auto object-cover" alt="<?= $row['image']; ?>">
                        </td>
                        <td class="py-2 px-4 border-b"><?= $row['name']; ?></td>
                        <td class="py-2 px-4 border-b"><?= $row['desc']; ?></td>
                        <td class="py-2 px-4 border-b"><?= $row['brand']; ?></td>
                        <td class="py-2 px-4 border-b"><?= $row['price']; ?> บาท</td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="<?= base_url('product/update/' . $row['product_id']); ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                แก้ไข
                            </a>
                        </td>
                        <td class="py-2 px-4 border-b text-center">
                            <button action="delete" data-id="<?= $row['product_id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                ลบ
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = '<?= base_url() . 'product/delete/' ?>' + target.dataset.id;
                }
            });
        }
    });
</script>