<div class="container mx-auto py-10">
    <form class="w-full max-w-md mx-auto bg-white shadow-lg rounded-lg p-8" method="post"
        action="<?= base_url() ?>login/check">
        <h3 class="text-2xl font-bold mb-6 text-gray-800 text-center">เข้าสู่ระบบ</h3>
        <div class="mb-4">
            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
            <input type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="username" id="username">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                name="password" id="password">
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                type="submit">
                เข้าสู่ระบบ
            </button>
        </div>
    </form>
</div>