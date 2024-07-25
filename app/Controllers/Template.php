<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ReserveModel;
use App\Models\ProductModel;

class Template extends BaseController
{
    public function Render($view, $data = []): string
    {
        if (session()->get('logged_in')) {
            $rowUser = (new UserModel())->find(session()->get('user_id'));
            $data['loggedUser'] = $rowUser;

            $reserveModel = new ReserveModel();
            $reservedProducts = $reserveModel->where('user_id', session()->get('user_id'))->findAll();

            $productModel = new ProductModel();
            $detailedCart = [];

            foreach ($reservedProducts as $reservedProduct) {
                $productDetails = $productModel->find($reservedProduct['product_id']);
                if ($productDetails) {
                    $detailedCart[] = [
                        'product_id' => $reservedProduct['product_id'],
                        'name' => $productDetails['name'],
                        'price' => $productDetails['price'],
                        'image' => base_url() . $productDetails['preview_image']
                    ];
                }
            }

            $data['cart'] = $detailedCart;
        }

        $data['template'] = array(
            'head' => view('Template/Head', $data),
            'menu' => view('Template/Menu', $data),
            'footer' => view('Template/Footer', $data),
            'content' => view($view, $data)
        );
        return view('Template/Layout', $data);
    }
}
