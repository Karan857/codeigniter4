<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Controllers\Template;

class Attractions extends BaseController{

    // หน้าสถานที่ท่องเที่ยว
    public function Index()
    {
        if (!session()->get('logged_in'))
        {
            return redirect()->to('/login');
        }

        $productModel = new ProductModel();
        $products = $productModel->findAll();

        return (new Template())->Render('Attractions/Index',
            array(
                'title' => 'รายการสินค้า',
                'products' => $products
            )
        );
    }
}