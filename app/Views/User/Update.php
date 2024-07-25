<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขผู้ใช้งาน</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto mt-10 px-4">
        <form method="post" action="<?= base_url(); ?>user/update/submit" class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto">
            <input type="hidden" name="id" value="<?= $rowUser['user_id']; ?>">
            <h3 class="text-2xl font-semibold mb-6">แก้ไขผู้ใช้งาน</h3>

            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">ชื่อผู้ใช้งาน</label>
                <input type="text" class="form-control w-full p-3 border rounded-md" disabled name="username" id="username" value="<?= $rowUser['username']; ?>" placeholder="Enter username">
                <input type="text" class="form-control w-full p-3 border rounded-md" hidden name="username" id="username" value="<?= $rowUser['username']; ?>" placeholder="Enter username">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">ชื่อ นามสกุล</label>
                <input type="text" class="form-control w-full p-3 border rounded-md" name="name" id="name" value="<?= $rowUser['name']; ?>" placeholder="Enter full name">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">อีเมล</label>
                <input type="email" class="form-control w-full p-3 border rounded-md" name="email" id="email" value="<?= $rowUser['email']; ?>" placeholder="Enter email">
            </div>

            <div class="mb-4">
                <label for="phoneNumber" class="block text-gray-700 font-medium mb-2">เบอร์โทรศัพท์</label>
                <input type="text" class="form-control w-full p-3 border rounded-md" name="phoneNumber" id="phoneNumber" value="<?= $rowUser['phone_number']; ?>" placeholder="Enter phone number">
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-medium mb-2">ที่อยู่</label>
                <input type="text" class="form-control w-full p-3 border rounded-md" name="address" id="address" value="<?= $rowUser['address']; ?>" placeholder="Enter phone number">
            </div>

            <div class="flex space-x-4">
                <button class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600" type="submit">แก้ไขผู้ใช้งาน</button>
                <a class="btn btn-secondary bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600" href="<?= base_url(); ?>user">กลับไปหน้ารายการ</a>
            </div>
        </form>
    </div>

</body>

</html>