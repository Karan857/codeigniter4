<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .Cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .Cart-table thead {
            background-color: #f4f4f4;
        }

        .Cart-table th,
        .Cart-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .Cart-table th {
            background-color: #007bff;
            color: white;
        }

        .Cart-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .Cart-table img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }

        .cancel-btn{
            background-color: red;
            color: white;
            border-radius: 5px;
            width: 100px;
            height: 30px;
            padding: 3px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><?= $title; ?></h1>
        <table class="Cart-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Year</th>
                    <th>Brand</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $index => $reservation) : ?>
                    <tr>
                        <td><?= $index += 1 ?></td>
                        <td><?= $reservation['product_name'] ?></td>
                        <td><?= $reservation['product_desc'] ?></td>
                        <td><?= number_format($reservation['product_price'], 2) ?> ฿</td>
                        <td><?= $reservation['product_year'] ?></td>
                        <td><?= $reservation['product_brand'] ?></td>
                        <td><img src="<?= base_url($reservation['product_image']) ?>" alt="Product Image"></td>
                        <td>
                            <form action="<?= base_url('cart/delete') ?>" method="post">
                                <input type="hidden" name="id" value="<?= $reservation['product_id'] ?>">
                                <button type="submit" class="cancel-btn">ยกเลิกการจอง</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>