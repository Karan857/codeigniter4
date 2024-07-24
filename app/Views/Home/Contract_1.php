<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .contract-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .agreement {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        .checkbox-container {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .checkbox-container input {
            margin-right: 10px;
        }

        .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
        }

        button {
            padding: 10px 20px;
            background-color: #cccccc;
            color: white;
            border: none;
            cursor: not-allowed;
        }

        button.enabled {
            background-color: #4CAF50;
            cursor: pointer;
        }

        button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <div class="contract_2">
        <h1>รายละเอียดการจองรถยนต์</h1>
        <?php if ($product['preview_image'] != '' && file_exists($product['preview_image'])) : ?>
            <img class="p-8 rounded-t-lg w-full h-full bg-cover border-gray-200 shadow-sm shadow-gray-500/50 shadow-bottom mb-5 object-fit" src="<?= base_url().$product['preview_image']; ?>" alt="image" />
        <?php endif ?>
        <form action="<?= site_url('product/reserve'); ?>" enctype="multipart/form-data" method="post">
            <div class="container ms-0">
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
            <br>
            <hr>
            <br>
            <div class="contract-container mt-5">
                <h1>ข้อตกลงและเงื่อนไขการจองรถ</h1>
                <div class="agreement">
                    <p>กรุณาอ่านข้อตกลงและเงื่อนไขด้านล่างนี้อย่างละเอียดก่อนดำเนินการจองรถ:</p>
                    <ol>
                        <li>ผู้จองต้องมีอายุไม่ต่ำกว่า 20 ปีบริบูรณ์</li>
                        <li>ผู้จองต้องมีใบอนุญาตขับขี่รถยนต์ที่ถูกต้องและไม่หมดอายุ</li>
                        <li>รถยนต์ที่จองต้องได้รับการใช้ภายในประเทศเท่านั้น</li>
                        <li>ผู้จองต้องรับผิดชอบค่าใช้จ่ายที่เกิดขึ้นทั้งหมดในระหว่างการใช้งานรถยนต์</li>
                        <li>ข้อตกลงนี้มีผลบังคับใช้ตั้งแต่วันที่จองจนถึงวันที่ส่งคืนรถยนต์</li>
                    </ol>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" id="agreeCheckbox">
                    <label for="agreeCheckbox">ฉันได้อ่านและยอมรับข้อตกลงและเงื่อนไข</label>
                </div>
                <div class="button-container">
                    <button id="proceedButton" type="submit" disabled>ดำเนินการต่อ</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const agreeCheckbox = document.getElementById('agreeCheckbox');
        const proceedButton = document.getElementById('proceedButton');

        agreeCheckbox.addEventListener('change', function() {
            if (this.checked) {
                proceedButton.disabled = false;
                proceedButton.classList.add('enabled');
            } else {
                proceedButton.disabled = true;
                proceedButton.classList.remove('enabled');
            }
        });
    </script>

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