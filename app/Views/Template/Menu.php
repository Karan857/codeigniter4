<nav class="bg-gradient-to-r from-teal-800 to-fuchsia-700 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-red-600 text-4xl font-bold ">
            Car &<span class="text-orange-500 relative"> B &nbsp;
                <i class="fas fa-bomb text-3xl ml-2 text-yellow-300 hover:text-yellow-500 hover:scale-150 hover:rotate-90 hover:text-12xl transition absolute hover:left-[500px]" style="left:27px ; top:10px ">
                </i>
                mb</span>

        </div>

        <?php if (session()->get('logged_in')) : ?>
            <div class="hidden md:flex space-x-4">
                <?php if (session()->get('role') == 'admin') : ?>
                    <a href="<?= base_url('home'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/')) ? 'text-yellow-200 font-bold' : ''; ?>">หน้าแรก</a>
                    <a href="<?= base_url('admin/product'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/product')) ? 'text-yellow-200 font-bold' : ''; ?>">จัดการสินค้า</a>
                    <a href="<?= base_url('user'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/user')) ? 'text-yellow-200 font-bold' : ''; ?>">รายชื่อ</a>
                <?php else : ?>
                    <a href="<?= base_url('home'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/home') || current_url() == base_url('/index.php/')) ? 'text-yellow-200 font-bold' : ''; ?>">หน้าแรก</a>
                    <a href="<?= base_url('product'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/product')) ? 'text-yellow-200 font-bold' : ''; ?>">รถยนต์</a>
                    <a href="<?= base_url('test'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/test')) ? 'text-yellow-200 font-bold' : ''; ?>">test</a>
                <?php endif; ?>
            </div>

            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <a href="<?= base_url('cart'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/home') || current_url() == base_url('product/chart/')) ? 'text-yellow-200 font-bold' : ''; ?>">รายการจอง</a>

                <button type="button" class="flex text-sm" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <i class="far fa-bars text-2xl text-white"></i>
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">
                            <?= $loggedUser['name']; ?>
                        </span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400"><?php echo $loggedUser['email']; ?>
                        </span>

                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="<?= base_url('logout'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>
                </div>
            </div>

        <?php else : ?>
            <a class="bg-yellow-400 text-teal-800 px-4 py-2 rounded-full font-semibold hover:bg-yellow-300 transition" href="<?= base_url('login'); ?>">
                Login
            </a>
        <?php endif; ?>
    </div>
</nav>