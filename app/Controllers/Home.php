<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ReserveModel;
use App\Models\UserModel;

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

    public function Product()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        foreach ($products as &$product) {
            $product['price'] = number_format($product['price']);
        }
        $template = new Template();
        return $template->Render(
            'Home/Product',
            array(
                'title' => 'หน้าแสดงรายการรถยนต์',
                'products' => $products
            )
        );
    }

    public function Test()
    {
        $template = new Template();
        return $template->Render(
            'Home/Test',
            array(
                'title' => 'หน้าtest'
            )
        );
    }

    public function Detail($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if (empty($id)) {
            return redirect()->to('/product');
        }

        $productModel = new ProductModel();
        $rowProduct = $productModel->find($id);

        if (empty($rowProduct)) {
            return redirect()->to('/product');
        }

        $reserveModel = new ReserveModel();
        $userId = session()->get('user_id');
        // ตรวจสอบว่าผู้ใช้งานได้จองรถยนต์นี้หรือไม่
        $existingReservation = $reserveModel
            ->where('product_id', $id)
            ->where('user_id', $userId)
            ->countAllResults() > 0;

        return (new Template())->Render(
            'Home/ProductDetail',
            array(
                'title' => 'รายละเอียดรถยนต์',
                'rowProduct' => $rowProduct,
                'existingReservation' => $existingReservation
            )
        );
    }
    public function Reserve()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $productId = $this->request->getPost('product_id');
        $userId = $this->request->getPost('user_id');

        $data = [
            'product_id' => $productId,
            'user_id' => $userId
        ];

        $reserveModel = new ReserveModel();
        $reserveModel->insert((object)$data);

        session()->setFlashdata('status', true);

        return redirect()->to('product/' . $productId);
    }

    public function Cart()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');
        $reserveModel = new ReserveModel();
        $productModel = new ProductModel();

        // ดึงข้อมูลการจองทั้งหมดของผู้ใช้
        $reservations = $reserveModel->where('user_id', $userId)->findAll();

        // Create an array to hold detailed product information
        $detailedReservations = [];

        foreach ($reservations as $reservation) {
            $productId = $reservation['product_id'];
            $product = $productModel->find($productId);

            // Add product details to reservation
            if ($product) {
                $reservation['product_name'] = $product['name'];
                $reservation['product_desc'] = $product['desc'];
                $reservation['product_price'] = $product['price'];
                $reservation['product_year'] = $product['year'];
                $reservation['product_brand'] = $product['brand'];
                $reservation['product_image'] = $product['image'];
            }

            $detailedReservations[] = $reservation;
        }

        return (new Template())->Render(
            'Home/cart',
            array(
                'title' => 'รายละเอียดจองรถยนต์',
                'reservations' => $detailedReservations
            )
        );
    }

    public function Contract_1($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if (empty($id)) {
            session()->setFlashdata('alert_message', 'ไม่พบ ID ของสินค้า');
            return redirect()->to('/product');
        }

        $productModel = new ProductModel();
        $rowProduct = $productModel->find($id);

        $userModel = new UserModel();
        $users = $userModel->find(session()->get('user_id'));

        if (empty($rowProduct)) {
            session()->setFlashdata('alert_message', 'ไม่พบสินค้าที่ต้องการ');
            return redirect()->to('/product');
        }

        return (new Template())->Render(
            'Home/Contract_1',
            array(
                'title' => 'ข้อตกลงและเงื่อนไข',
                'product' => $rowProduct,
                'user' => $users  
            )
        );
    }

    public function Contract_2($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if (empty($id)) {
            session()->setFlashdata('alert_message', 'ไม่พบ ID ของสินค้า');
            return redirect()->to('/product');
        }

        $productModel = new ProductModel();
        $rowProduct = $productModel->find($id);



        $userModel = new UserModel();
        $users = $userModel->find(session()->get('user_id'));




        if (empty($rowProduct)) {
            return redirect()->to('/product');
        }

        return (new Template())->Render(
            'Home/Contract_2',
            array(
                'title' => 'ข้อตกลงและเงื่อนไข',
                'product' => $rowProduct,
                'user' => $users
            )
        );
    }
}