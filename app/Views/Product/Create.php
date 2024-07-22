<div class="container mx-auto px-4 py-8">
    <form method="post" action="<?= base_url(); ?>product/create/submit" enctype="multipart/form-data"
        class="max-w-2xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h3 class="text-2xl font-bold mb-6 text-gray-800">เพิ่มรถยนต์</h3>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">ชื่อรุ่น</label>
            <input type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="name" id="name">
        </div>

        <div class="mb-4">
            <label for="desc" class="block text-gray-700 text-sm font-bold mb-2">รายละเอียด</label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="desc" id="desc" rows="3"></textarea>
        </div>

        <div class="mb-4">
            <label for="year" class="block text-gray-700 text-sm font-bold mb-2">ปี</label>
            <input type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="year" id="year">
        </div>
        <div class="mb-4">
            <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">แบรนด์</label>
            <input type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="brand" id="brand">
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">ราคา</label>
            <input type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="price" id="price">
        </div>

        <div class="mb-6">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">อัปโหลดรูปภาพ</label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="file" name="image" id="image">
        </div>

        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                เพิ่มรถยนต์
            </button>
            <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                href="<?= base_url(); ?>product">
                กลับไปหน้ารายการ
            </a>
        </div>
    </form>
</div>