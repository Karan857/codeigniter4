<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .cart {
        width: 500px;
        background-color: #353432;
        color: #eee;
        position: fixed;
        top: 0;
        right: -400px;
        /* Initially hidden */
        bottom: 0;
        transition: right 0.3s ease;
        padding: 20px;
        z-index: 8888;
        overflow: scroll;
    }

    .cart::-webkit-scrollbar {
        display: none;
    }

    .cart.open {
        right: 0;
        /* Show cart */
    }

    .nav {
        background: linear-gradient(to right, #008080, #d5006d);
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cart-icon {
        font-size: 24px;
        color: white;
        cursor: pointer;
    }

    .close-btn {
        background-color: red;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .bomb {
        color: yellow;
        display: inline-block;
    }

    .bomb i {
        transform: scale(1);
        transform-origin: center;
        display: inline-block;
    }

    .bomb i:hover {
        animation: me 1s linear infinite;
    }

    @keyframes me {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.5);
        }
    }

    .cart table {
        width: 100%;
        border-collapse: separate;
        /* ใช้ 'collapse' หากไม่ต้องการระยะห่างระหว่างเซลล์ */
        border-spacing: 0 10px;
        /* เพิ่มระยะห่างระหว่างแถว (10px) */
    }
</style>

<nav class="bg-gradient-to-r from-teal-800 to-fuchsia-700 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-red-600 text-4xl font-bold relative">
            Car &<span class="text-orange-500  bomb"> B &nbsp;
                <i class="fas fa-bomb "></i>
                mb</span>

        </div>

        <?php if (session()->get('logged_in')) : ?>
            <div class="hidden md:flex space-x-4">
                <?php if (session()->get('role') == 'admin') : ?>
                    <a href="<?= base_url('home'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/')) ? 'text-yellow-200 font-bold' : ''; ?>">หน้าแรก</a>
                    <a href="<?= base_url('admin/product'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/admin/product')) ? 'text-yellow-200 font-bold' : ''; ?>">จัดการสินค้า</a>
                    <a href="<?= base_url('user'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/user')) ? 'text-yellow-200 font-bold' : ''; ?>">รายชื่อ</a>
                <?php else : ?>
                    <a href="<?= base_url('home'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/home') || current_url() == base_url('/index.php/')) ? 'text-yellow-200 font-bold' : ''; ?>">หน้าแรก</a>
                    <a href="<?= base_url('product'); ?>" class="text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/product')) ? 'text-yellow-200 font-bold' : ''; ?>">รถยนต์</a>

                    <div style="position:relative; display: inline-block;">
                        <p style="position: absolute;
            right: -5px;
            top: -5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 4px;
            font-size: 12px;
            line-height: 1;"><?= $countCart ?></p>
                        <i class="fas fa-shopping-cart cart-icon" id="cart-toggle"></i>
                        <div class="cart" id="cart">
                            <?php if (!empty($cart)) : ?> <table>
                                    <a href="<?=base_url('cart')?>" class="text-white">รายการจองรถทั้งหมด ( <?=$countCart?> )</a>
                                    <thead>
                                        <tr>
                                            <th>รูปภาพ</th>
                                            <th>ชื่อ</th>
                                            <th>ราคา</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $totalPrice = 0; ?>
                                        <?php foreach ($cart as $item) : ?>
                                            <tr>
                                                <td><img style="width:200px" src="<?= $item['image'] ?>">
                                                </td>
                                                <td><?= $item['name'] ?></td>
                                                <td><?= number_format($item['price']) ?> THB</td>
                                                <td>
                                                    <form action="<?= base_url('cart/delete') ?>" method="post">
                                                        <input type="hidden" name="id" value="<?= $item['product_id'] ?>">
                                                        <button type="submit">ยกเลิกการจอง</button>
                                                    </form>
                                                </td>


                                                <?php $totalPrice += $item['price']; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="text-align: left;"><strong>ราคารวม</strong></td>
                                            <td><strong id="total-price"><?= number_format($totalPrice) ?></strong> บาท</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            <?php else : ?>
                                <p>No items in cart.</p>
                            <?php endif; ?>

                            <button class="close-btn" id="close-cart">Close</button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <a href="<?= base_url('cart'); ?>" class="cart text-white hover:text-yellow-200 transition text-xl <?= (current_url() == base_url('/index.php/home') || current_url() == base_url('product/chart/')) ? 'text-yellow-200 font-bold' : ''; ?>">cart
                </a>



                <button type="button" class="flex text-nm" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>

                    <i class="far fa-bars text-2xl text-white "></i>
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

<script>
    const cartToggle = document.getElementById('cart-toggle');
    const cart = document.getElementById('cart');
    const closeCart = document.getElementById('close-cart');

    cartToggle.addEventListener('click', () => {
        cart.classList.toggle('open');
    });

    closeCart.addEventListener('click', () => {
        cart.classList.remove('open');
    });
</script>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .cart {
        width: 400px;
        background-color: transparent;
        backdrop-filter: blur(80px);
        color: red;
        position: fixed;
        top: 0;
        right: -400px;
        /* Initially hidden */
        bottom: 0;
        transition: right 0.3s ease;
        padding: 20px;
        z-index: 8888;
    }

    .cart.open {
        right: 0;
        /* Show cart */
    }

    .nav {
        background: linear-gradient(to right, #008080, #d5006d);
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cart-icon {
        font-size: 24px;
        color: white;
        cursor: pointer;
    }

    .close-btn {
        background-color: red;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }
</style>