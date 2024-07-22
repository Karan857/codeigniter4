<body>
    <div class="container">
        <h1>ข้อมูลส่วนตัวผู้ซื้อ</h1>
        <form action="<?= site_url('product/reserve'); ?>" enctype="multipart/form-data" method="post">
            <!-- id -->
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
            <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">

            <div class="form-group">
                <label for="fullname"></label>
                <input type="text" id="fullname" name="fullname" value="<?= $user['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">เบอร์โทรศัพท์</label>
                <input type="tel" id="phone" name="phone" value="<?= $user['phone_number']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">อีเมล</label>
                <input type="email" id="email" name="email" value="<?= $user['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">ที่อยู่</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>

            <!-- ข้อมูลการจองรถ -->
            <div class="form-group">
                <label for="car_model">รุ่นรถ</label>
                <input type="text" id="car_model" name="car_model" value="<?= $product['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="car_model">รายละเอียด</label>
                <input type="text" id="car_model" name="car_model" value="<?= $product['desc'] ?>" required>
            </div>
            <div class="form-group">
                <label for="car_model">แบรนด์</label>
                <input type="text" id="car_model" name="car_model" value="<?= $product['brand'] ?>" required>
            </div>
            <div class="form-group">
                <label for="car_model">ราคา</label>
                <input type="text" id="car_model" name="car_model" value="<?= $product['price']  ?>" required>
            </div>

            <div class="form-group">
                <label for="pickup_date">วันที่ต้องการรับรถ</label>
                <input type="date" id="pickup_date" name="pickup_date" required>
            </div>
            <div class="form-group">
                <label for="return_date">วันที่ต้องการส่งคืนรถ</label>
                <input type="date" id="return_date" name="return_date" required>
            </div>

            <!-- ข้อตกลงและเงื่อนไข -->
            <div class="form-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">ฉันได้อ่านและยอมรับ <a href="terms_url"
                        target="_blank">ข้อตกลงและเงื่อนไข</a></label>
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