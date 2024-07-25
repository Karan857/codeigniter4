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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        thead {
            background-color: #f4f4f4;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><?= $title; ?></h1>
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Year</th>
                    <th>Brand</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation) : ?>
                    <tr>
                        <td><?= $reservation['product_id'] ?></td>
                        <td><?= $reservation['product_name'] ?></td>
                        <td><?= $reservation['product_desc'] ?></td>
                        <td><?= number_format($reservation['product_price'], 2) ?> ฿</td>
                        <td><?= $reservation['product_year'] ?></td>
                        <td><?= $reservation['product_brand'] ?></td>
                        <td><img src="<?= base_url($reservation['product_image']) ?>" alt="Product Image"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>