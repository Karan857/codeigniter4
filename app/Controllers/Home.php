<?php

namespace App\Controllers;

use App\Controllers\Template;
use App\Models\ProductModel;


class Home extends BaseController
{
    public function Index()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        foreach ($products as &$product) {
            $product['price'] = number_format($product['price']);
        }
        $template = new Template();
        return $template->Render(
            'Home/Index',
            array(
                'title' => 'หน้าหลัก',
                'products' => $products
            )
        );
    }
    public function List()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        foreach ($products as &$product) {
            $product['price'] = number_format($product['price']);
        }
        $template = new Template();
        return $template->Render(
            'Home/List',
            array(
                'title' => 'หน้าแสดงรายการรถยนต์',
                'products' => $products
            )
        );
    }
}
