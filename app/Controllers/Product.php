<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Product extends BaseController
{

    // index
    public function Index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Restrict access to admin only
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/'); // Redirect to a different page if not admin
        }

        $productModel = new ProductModel();
        $products = $productModel->findAll();

        return (new Template())->Render(
            'Product/Index',
            array(
                'title' => 'รายการสินค้า',
                'products' => $products
            )
        );
    }

    //create
    public function Create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return (new Template())->Render(
            'Product/Create',
            array(
                'title' => 'เพิ่มรถยนต์'
            )
        );
    }

    // หน้า submit create
    public function SubmitCreate()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $name = $this->request->getPost('name');
        $desc = $this->request->getPost('desc');
        $price = $this->request->getPost('price');
        $year = $this->request->getPost('year');
        $brand = $this->request->getPost('brand');
        $image = $this->request->getFile('image');

        $message = array();

        if (empty($name)) $message[] = 'ชื่อรุ่น';

        if (!empty($message)) {
            return (new Template())->Render(
                'Product/SubmitCreate',
                array(
                    'title' => 'เพิ่มรถยนต์',
                    'error' => true,
                    'message' => 'กรอกข้อมูล ' . join(', ', $message) . ' ให้ครบถ้วน'
                )
            );
        }

        $insertData = array(
            'name' => $name,
            'desc' => $desc,
            'price' => $price,
            'year' => $year,
            'brand' => $brand,
        );

        if ($image->isValid() && !$image->hasMoved()) {
            $validationRule = array(
                'image' => array(
                    'label' => 'ไฟล์รูปภาพ',
                    'rules' => array(
                        'uploaded[image]',
                        'is_image[image]',
                        'mime_in[image,image/jpg,image/jpeg,image/png,image/gif,image/webp]',
                        'max_size[image,10485760]' // 10 MB
                    )
                )
            );

            if (!$this->validateData([], $validationRule)) {
                return (new Template())->Render(
                    'Product/SubmitCreate',
                    array(
                        'title' => 'เพิ่มรถยนต์',
                        'error' => true,
                        'message' => $this->validator->getErrors()
                    )
                );
            }

            $newName = $image->getRandomName();
            $image->move('uploads', $newName);
            $insertData['image'] = 'uploads/' . $newName;
        }

        $productModel = new ProductModel();

        // Ensuring $insertData is an array
        if (is_array($insertData)) {
            $insert = $productModel->insert((object)$insertData); // Cast array to object
        }

        if ($insert) {
            return (new Template())->Render(
                'Product/SubmitCreate',
                array(
                    'title' => 'เพิ่มรถยนต์',
                    'error' => false,
                    'message' => 'เพิ่มรถยนต์เรียบร้อยแล้ว'
                )
            );
        }

        return (new Template())->Render(
            'Product/SubmitCreate',
            array(
                'title' => 'เพิ่มรถยนต์',
                'error' => true,
                'message' => 'เพิ่มรถยนต์ไม่สำเร็จ'
            )
        );
    }



    // หน้าฟอร์มในการแก้ไขสินค้า
    public function Update($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if (empty($id)) {
            return redirect()->to('/product');
        }


        $rowProduct = (new ProductModel())->find($id);

        if (empty($rowProduct)) {
            return redirect()->to('/Product');
        }

        return (new Template())->Render(
            'Product/Update',
            array(
                'title' => 'แก้ไขรถยนต์',
                'rowProduct' => $rowProduct
            )
        );
    }


    // หน้า submit ฟอร์มแก้ไขสินค้า
    public function SubmitUpdate()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $desc = $this->request->getPost('desc');
        $year = $this->request->getPost('year');
        $brand = $this->request->getPost('brand');
        $price = $this->request->getPost('price');
        $image = $this->request->getFile('image');

        $image = $this->request->getFile('image');


        $productModel = new ProductModel();
        $rowProduct = $productModel->find($id);
        if (empty($rowProduct)) {
            return (new Template())->Render(
                'Product/SubmitUpdate',
                array(
                    'title' => 'แก้ไขรถยนต์',
                    'error' => true,
                    'message' => 'ไม่พบรถยนต์ที่ต้องการแก้ไข',
                    'id' => $id
                )
            );
        }

        $message = array();

        if (empty($name))
            $message[] = 'ชื่อรถยนต์';

        if (!empty($message)) {
            return (new Template())->Render(
                'Product/SubmitUpdate',
                array(
                    'title' => 'แก้ไขรถยนต์',
                    'error' => true,
                    'message' => 'กรอกข้อมูล ' . join(', ', $message) . ' ให้ครบถ้วน',
                    'id' => $id
                )
            );
        }

        $updateData = array(
            'name' => $name,
            'desc' => $desc,
            'brand' => $brand,
            'year' => $year,
            'price' => $price,
        );

        if ($image->isValid() && !$image->hasMoved()) {
            $validationRule = array(
                'image' => array(
                    'label' => 'ไฟล์รูปภาพ',
                    'rules' => array(
                        'uploaded[image]',
                        'is_image[image]',
                        'mime_in[image, image/jpg,image/jpeg,image/png,image/gif,image/webp]',
                        'max_size[image, 10485760]' // 10 MB
                    )
                )
            );
            if (!$this->validateData([], $validationRule)) {
                return (new Template())->Render(
                    'Product/SubmitCreate',
                    array(
                        'title' => 'เพิ่มรถยนต์',
                        'error' => false,
                        'message' => $this->validator->getErrors()
                    )
                );
            }

            $newName = $image->getRandomName();
            $image->move('uploads', $newName);
            $updateData['image'] = 'uploads/' . $newName;

            if ($rowProduct['image'] != '' && file_exists($rowProduct['image'])) {
                unlink($rowProduct['image']);
            }
        }

        $update = $productModel->update($id, $updateData);
        if ($update) {
            return (new Template())->Render(
                'Product/SubmitUpdate',
                array(
                    'title' => 'แก้ไขรถยนต์',
                    'error' => false,
                    'message' => 'แก้ไขรถยนต์เรียบร้อยแล้ว'
                )
            );
        }

        return (new Template())->Render(
            'Product/SubmitUpdate',
            array(
                'title' => 'แก้ไขรถยนต์',
                'error' => true,
                'message' => 'แก้ไขรถยนต์ไม่สำเร็จ',
                'id' => $id
            )
        );
    }

    // หน้าลบสินค้า
    public function Delete($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $productModel = new ProductModel();
        $rowProduct = $productModel->find($id);
        if (empty($rowProduct)) {
            return (new Template())->Render(
                'Product/Delete',
                array(
                    'title' => 'ลบรถยนต์',
                    'error' => true,
                    'message' => 'ไม่พบรถยนต์ที่ต้องการลบ'
                )
            );
        }

        if ($rowProduct['image'] != '' && file_exists($rowProduct['image'])) {
            unlink($rowProduct['image']);
        }

        $delete = $productModel->delete($id);
        if ($delete) {
            return (new Template())->Render(
                'Product/Delete',
                array(
                    'title' => 'ลบรถยนต์',
                    'error' => false,
                    'message' => 'ลบรถยนต์เรียบร้อยแล้ว'
                )
            );
        }

        return (new Template())->Render(
            'Product/Delete',
            array(
                'title' => 'ลบรถยนต์',
                'error' => true,
                'message' => 'ลบรถยนต์ไม่สำเร็จ'
            )
        );
    }
}
