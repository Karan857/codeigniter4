<body>
    <div class="detail">
        <div class="container">
            <div class="image">
                <img src="<?= base_url($rowProduct['image']); ?>" alt="image">
            </div>

            <div class="content">
                <p>Car &
                    <span> B &nbsp;&nbsp;
                        <i class="fas fa-bomb"></i>
                        mb
                    </span>
                </p>

                <p>รุ่น: <?= $rowProduct['year'] ?></p>
                <p>ยี่ห้อ: <?= $rowProduct['brand'] ?></p>
                <p>ราคา: <?= $rowProduct['price'] ?> บาท</p>
                <p>รายละเอียด: <?= $rowProduct['desc'] ?></p>



                <?php if (!$existingReservation) : ?>
                    <a href="<?= base_url('product/' . $rowProduct['product_id'] . '/contact_1'); ?>">ทำสัญญา</a>
                <?php else : ?>
                    <button type="submit">จองไปแล้ว บักหัวดอ</button>
                <?php endif; ?>



            </div>
        </div>
    </div>


</body>

</html>