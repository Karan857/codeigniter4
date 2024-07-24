<style>
    .file-input-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .file-input-box {
        width: 100px;
        height: 100px;
        border: 2px solid black;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .file-input-box input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .file-input-box span {
        font-size: 2rem;
    }

    .file-input-box img {
        max-width: 100%;
        max-height: 100%;
        display: none;
    }

    .file-input-label {
        text-align: center;
        font-size: 0.875rem;
    }
</style>

<div class="container mx-auto px-4 py-8">
    <form method="post" action="<?= base_url(); ?>admin/product/update/submit" enctype="multipart/form-data" class="max-w-2xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input type="hidden" name="id" value="<?= $rowProduct['product_id']; ?>">
        <h3 class="text-2xl font-bold mb-6 text-gray-800">แก้ไขข้อมูลรถยนต์</h3>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">ชื่อรุ่น</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" value="<?= $rowProduct['name']; ?>">
        </div>

        <div class="mb-4">
            <label for="desc" class="block text-gray-700 text-sm font-bold mb-2">รายละเอียด</label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="desc" id="desc" rows="3"><?= $rowProduct['desc']; ?></textarea>
        </div>

        <div class="mb-4">
            <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">แบรนด์</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="brand" id="brand" value="<?= $rowProduct['brand']; ?>">
        </div>

        <div class="mb-4">
            <label for="year" class="block text-gray-700 text-sm font-bold mb-2">ปี</label>
            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="year" id="year" min="1900" max="<?= date('Y'); ?>" value="<?= $rowProduct['year']; ?>">
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">ราคา</label>
            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="price" id="price" min="0" step="1" value="<?= $rowProduct['price']; ?>">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">อัปโหลดรูปภาพ</label>
            <div class="file-input-container flex justify-between">
                <div>
                    <div class="file-input-box">
                        <input type="file" name="preview_image" id="preview_image" onchange="previewImage(event, this)" />
                        <span style="<?= $rowProduct['preview_image'] ? 'display: none;' : ''; ?>">+</span>
                        <img src="<?= base_url() . $rowProduct['preview_image']; ?>" alt="Preview" style="<?= $rowProduct['preview_image'] ? 'display: block;' : ''; ?>">
                    </div>
                    <div class="file-input-label">ภาพตัวอย่างรถ</div>
                </div>

                <div>
                    <div class="file-input-box">
                        <input type="file" name="car_color1" id="car_color1" onchange="previewImage(event, this)" />
                        <span style="<?= $rowProduct['color_image1'] ? 'display: none;' : ''; ?>">+</span>
                        <img src="<?= base_url() . $rowProduct['color_image1']; ?>" alt="Car Color 1" style="<?= $rowProduct['color_image1'] ? 'display: block;' : ''; ?>">
                    </div>
                    <div class="file-input-label">สีรถยนต์ 1</div>
                </div>

                <div>
                    <div class="file-input-box">
                        <input type="file" name="car_color2" id="car_color2" onchange="previewImage(event, this)" />
                        <span style="<?= $rowProduct['color_image2'] ? 'display: none;' : ''; ?>">+</span>
                        <img src="<?= base_url() . $rowProduct['color_image2']; ?>" alt="Car Color 2" style="<?= $rowProduct['color_image2'] ? 'display: block;' : ''; ?>">
                    </div>
                    <div class="file-input-label">สีรถยนต์ 2</div>
                </div>

                <div>
                    <div class="file-input-box">
                        <input type="file" name="inside_image" id="inside_image" onchange="previewImage(event, this)" />
                        <span style="<?= $rowProduct['inside_image'] ? 'display: none;' : ''; ?>">+</span>
                        <img src="<?= base_url() . $rowProduct['inside_image']; ?>" alt="Inside Image" style="<?= $rowProduct['inside_image'] ? 'display: block;' : ''; ?>">
                    </div>
                    <div class="file-input-label">ภายในรถยนต์</div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                แก้ไขข้อมูลรถยนต์
            </button>
            <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="<?= base_url(); ?>admin/product">
                กลับไปหน้ารายการ
            </a>
        </div>
    </form>
</div>

<script>
    function previewImage(event, inputElement) {
        const file = inputElement.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const fileInputBox = inputElement.closest('.file-input-box');
                const img = fileInputBox.querySelector('img');
                const span = fileInputBox.querySelector('span');
                img.src = e.target.result;
                img.style.display = 'block';
                span.style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    }
</script>
