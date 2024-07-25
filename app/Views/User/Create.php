<div class="container mx-auto mt-10 px-4">
    <form method="post" action="<?= base_url(); ?>user/create/submit" class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto">
        <h3 class="text-2xl font-semibold mb-6">เพิ่มผู้ใช้งาน</h3>

        <div class="mb-4">
            <label for="username" class="block text-gray-700 font-medium mb-2">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control w-full p-3 border rounded-md" name="username" id="username" placeholder="Enter username">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">รหัสผ่าน</label>
            <input type="password" class="form-control w-full p-3 border rounded-md" name="password" id="password" placeholder="Enter password">
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">ชื่อ นามสกุล</label>
            <input type="text" class="form-control w-full p-3 border rounded-md" name="name" id="name" placeholder="Enter full name">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">อีเมล</label>
            <input type="email" class="form-control w-full p-3 border rounded-md" name="email" id="email" placeholder="Enter email">
        </div>

        <div class="mb-4">
            <label for="phoneNumber" class="block text-gray-700 font-medium mb-2">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control w-full p-3 border rounded-md" name="phoneNumber" id="phoneNumber" placeholder="Enter phone number">
        </div>
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-medium mb-2">ที่อยู่</label>
            <input type="text" class="form-control w-full p-3 border rounded-md" name="address" id="address" placeholder="Enter phone number">
        </div>

        <div class="flex space-x-4">
            <button class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600" type="submit">เพิ่มผู้ใช้งาน</button>
            <a class="btn btn-secondary bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600" href="<?= base_url(); ?>user">กลับไปหน้ารายการ</a>
        </div>
    </form>
</div>