<body>
    <div class="contract_2">
        <h1>รายละเอียดการจองรถยนต์</h1>
        <?php if ($product['image'] != '' && file_exists($product['image'])) : ?>
            <img class="p-8 rounded-t-lg w-full h-[200px] bg-cover border-gray-200 shadow-sm shadow-gray-500/50 shadow-bottom mb-5 object-fit" src="<?= $product['image']; ?>" alt="image" />
        <?php endif ?> <form action="<?= site_url('product/reserve'); ?>" enctype="multipart/form-data" method="post">
            <div class="container">
                <div>
                    <h1>ข้อมูลส่วนตัวผู้ซื้อ</h1>
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">

                    <div>
                        <label for="fullname">ชื่อ-นามสกุล</label>
                        <input type="text" id="fullname" name="fullname" value="<?= $user['name']; ?>" required>
                    </div>
                    <div>
                        <label for="phone">เบอร์โทรศัพท์</label>
                        <input type="tel" id="phone" name="phone" value="<?= $user['phone_number']; ?>" required>
                    </div>
                    <div>
                        <label for="email">อีเมล</label>
                        <input type="email" id="email" name="email" value="<?= $user['email']; ?>" required>
                    </div>
                    <div>
                        <label for="address">ที่อยู่</label>
                        <textarea id="address" name="address" rows="4" required></textarea>
                    </div>
                </div>
                <div>
                    <h1>รายละเอียดรถยนต์</h1>
                    <div>
                        <label for="car_model">รุ่นรถ</label>
                        <input type="text" id="car_model" name="car_model" value="<?= $product['name'] ?> " readonly>
                    </div>
                    <div>
                        <label for="car_model">รายละเอียด</label>
                        <input type="text" id="car_model" name="car_model" value="<?= $product['desc'] ?>" readonly>
                    </div>
                    <div>
                        <label for="car_model">แบรนด์</label>
                        <input type="text" id="car_model" name="car_model" value="<?= $product['brand'] ?>" readonly>
                    </div>
                    <div>
                        <label for="car_model">ราคา</label>
                        <input type="text" id="car_model" name="car_model" value="<?= $product['price']  ?>" readonly>
                    </div>


                </div>
            </div>

            <div class="contract">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">ฉันได้อ่านและยอมรับ <a href="terms_url" target="_blank" required>ข้อตกลงและเงื่อนไข</a></label>
            </div>
            <button type="submit">จองรถ</button>


        </form>
    </div>

    <script>
        <?php if (session()->has('status')) : ?>
            Swal.fire({
                title: <?= json_encode(session()->getFlashdata('status') ? "จองรถยนต์สำเร็จ" : "จองรถยนต์ไม่สำเร็จ!") ?>,
                text: <?= json_encode(session()->getFlashdata('status') ? "จองสำเร็จ" : "จองไม่สำเร็จ") ?>,
                icon: <?= json_encode(session()->getFlashdata('status') ? "success" : "error") ?>,
            }).then(() => {
                window.location.reload();
            });
        <?php endif; ?>
    </script>
</body>

</html>