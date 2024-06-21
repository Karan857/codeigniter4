<?php

namespace App\Controllers;
use App\Models\FoodModel;
use App\Controllers\Template;

class Food extends BaseController{

    // หน้าสถานที่ท่องเที่ยว
    public function Index()
    {
        if (!session()->get('logged_in'))
        {
            return redirect()->to('/login');
        }

        $FoodModel = new FoodModel();
        $Foods = $FoodModel->findAll();

        return (new Template())->Render('Food/Index',
            array(
                'title' => 'รายการสินค้า',
                'Foods' => $Foods
            )
        );
    }
}