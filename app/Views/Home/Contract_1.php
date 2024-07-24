<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .container {
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
    }

    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:disabled {
        background-color: #cccccc;
        cursor: not-allowed;
    }
    </style>
</head>

<body>
    <!-- <?php if (!$existingReservation) : ?>
    <a href="<?= base_url('product/' . $rowProduct['product_id'] . '/contact_1'); ?>">ทำสัญญา</a>
    <?php else : ?>
    <button type="submit">จองไปแล้ว บักหัวดอ</button>
    <?php endif; ?> -->
    <div class="container">
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
            <button id="proceedButton" disabled>ดำเนินการต่อ</button>
        </div>
    </div>

    <script>
    const agreeCheckbox = document.getElementById('agreeCheckbox');
    const proceedButton = document.getElementById('proceedButton');

    agreeCheckbox.addEventListener('change', function() {
        proceedButton.disabled = !this.checked;
    });

    proceedButton.addEventListener('click', function() {
        if (agreeCheckbox.checked) {
            window.location.href = "<?= base_url('product/' . $rowProduct['product_id'] . '/contact_2'); ?>";
        }
    });
    </script>
</body>

</html>