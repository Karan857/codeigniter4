<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900">

    <div class="h-screen flex flex-col justify-center items-center relative">
        <div class="bg-cover bg-center w-full h-full"
            style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6)), url('https://th.bing.com/th/id/R.2a22e56cac919db775f744a314e08659?rik=CgcVGMZ8wH3iYw&riu=http%3a%2f%2fnationalinterest.org%2ffiles%2fstyles%2fmain_image_on_posts%2fpublic%2fmain_images%2ftankbiathlon2016final-28.jpg%3fitok%3dLNCwsreD&ehk=kG5QK%2fqLIPCt%2bhLSuMN881K1OfQ1J%2f35F1SEFXMld0Y%3d&risl=&pid=ImgRaw&r=0')">
            <div class="w-full h-full flex items-center justify-center flex-col">
                <h1 class="text-white text-4xl font-bold text-center">GET YOUR DESIRED CAR IN REASONABLE PRICE</h1>
                <p class="text-center text-white m-6 text-xl">We have many cars in our store</p>
            </div>
        </div>

        <div
            class="absolute w-3/4 m-[50px] h-[250px] bg-white bottom-[-100px] rounded-3xl shadow-sm shadow-gray-500/50 p-8">
            <form class="grid grid-cols-2 gap-4" method="GET">
                <div>
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900">Select Year</label>
                    <select id="year" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">All years</option>
                        <?php
                        $uniqueYears = array_unique(array_column($products, 'year'));
                        sort($uniqueYears);
                        foreach ($uniqueYears as $year) :
                        ?>
                        <option value="<?= $year; ?>"
                            <?= (isset($_GET['year']) && $_GET['year'] == $year) ? 'selected' : ''; ?>>
                            <?= $year; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="make" class="block mb-2 text-sm font-medium text-gray-900">Select Brand</label>
                    <select id="make" name="make"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">All brands</option>
                        <?php
                        $uniqueBrands = array_unique(array_column($products, 'brand'));
                        sort($uniqueBrands);
                        foreach ($uniqueBrands as $brand) :
                        ?>
                        <option value="<?= $brand; ?>"
                            <?= (isset($_GET['make']) && $_GET['make'] === $brand) ? 'selected' : ''; ?>>
                            <?= $brand; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex">
                    <label for="min_price" class="block mb-2 text-sm font-medium text-gray-900 m-3">Low price</label>
                    <input type="number" name="min_price" id="min_price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5"
                        value="<?= isset($_GET['min_price']) ? $_GET['min_price'] : '' ?>">
                    <label for="max_price" class="block mb-2 text-sm font-medium text-gray-900 m-3">High price </label>
                    <input type="number" name="max_price" id="max_price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5"
                        value="<?= isset($_GET['max_price']) ? $_GET['max_price'] : '' ?>">
                </div>
                <div></div>
                <div class="col-span-2">
                    <div class="text-center">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 text-center">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-[100px] text-center">
        <h1 class="text-3xl font-bold mt-[100px] text-white">Store Car</h1>
        <hr class="w-[100px] mx-auto mt-2 my-[30px]" style="border: 2px solid blue;">

        <div class="grid grid-cols-4 gap-5 mx-[50px] my-3">
            <?php
            $selectedBrand = isset($_GET['make']) ? $_GET['make'] : '';
            $selectedYear = isset($_GET['year']) ? $_GET['year'] : '';
            $minPrice = isset($_GET['min_price']) && $_GET['min_price'] !== '' ? intval($_GET['min_price']) : 0;
            $maxPrice = isset($_GET['max_price']) && $_GET['max_price'] !== '' ? intval($_GET['max_price']) : PHP_INT_MAX;

            foreach ($products as $product) :
                $productPrice = intval(str_replace(',', '', $product['price']));
                if (
                    (empty($selectedBrand) || strtolower($product['brand']) === strtolower($selectedBrand)) &&
                    (empty($selectedYear) || $product['year'] == $selectedYear) &&
                    ($productPrice >= $minPrice && $productPrice <= $maxPrice)
                ) :
            ?>
            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <?php if ($product['preview_image'] != '' && file_exists($product['preview_image'])) : ?>
                <img class="p-8 rounded-t-lg w-full h-[200px] bg-cover border-gray-200 shadow-sm shadow-gray-500/50 shadow-bottom mb-5 object-fit"
                    src="<?= $product['preview_image']; ?>" alt="image" />
                <?php endif ?>
                <div class="px-5 pb-3 text-start">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <?= $product['brand']; ?> &nbsp;<?= $product['name']; ?>
                    </h5>
                    <p class="text-md tracking-tight text-gray-600 dark:text-white">ปี <?= $product['year']; ?></p>
                    <p class="text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                        <?= $product['price']; ?> บาท
                    </p>
                    <p class="text-md text-gray-900 dark:text-white mb-5"><?= $product['desc']; ?></p>

                    <a href="<?= 'product/' . $product['product_id']; ?>"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-end float-end mb-2">
                        เพิ่มเติม
                    </a>


                </div>
            </div>
            <?php
                endif;
            endforeach;
            ?>
        </div>
    </div>

    <script>
    function me() {
        alert("ระบบปิดปรับปรุง เปิดให้บริการปี 2570");
    }
    </script>

</body>

</html>