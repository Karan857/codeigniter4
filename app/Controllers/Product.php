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

        foreach ($products as &$product) {
            $product['price'] = number_format($product['price']);
        }

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
        $preview_image = $this->request->getFile('preview_image');
        $color_image1 = $this->request->getFile('car_color1');
        $color_image2 = $this->request->getFile('car_color2');
        $inside_image = $this->request->getFile('inside_image');

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

        if (
            $preview_image->isValid() && !$preview_image->hasMoved() &&
            $color_image1->isValid() && !$color_image1->hasMoved() &&
            $color_image2->isValid() && !$color_image2->hasMoved() &&
            $inside_image->isValid() && !$inside_image->hasMoved()
        ) {

            $validationRule = array(
                'preview_image' => array(
                    'label' => 'ไฟล์รูปภาพ',
                    'rules' => 'uploaded[preview_image]|is_image[preview_image]|mime_in[preview_image,image/jpg,image/jpeg,image/png,image/gif,image/webp]|max_size[preview_image,10485760]'
                ),
                'car_color1' => array(
                    'label' => 'ไฟล์รูปภาพ',
                    'rules' => 'uploaded[car_color1]|is_image[car_color1]|mime_in[car_color1,image/jpg,image/jpeg,image/png,image/gif,image/webp]|max_size[car_color1,10485760]'
                ),
                'car_color2' => array(
                    'label' => 'ไฟล์รูปภาพ',
                    'rules' => 'uploaded[car_color2]|is_image[car_color2]|mime_in[car_color2,image/jpg,image/jpeg,image/png,image/gif,image/webp]|max_size[car_color2,10485760]'
                ),
                'inside_image' => array(
                    'label' => 'ไฟล์รูปภาพ',
                    'rules' => 'uploaded[inside_image]|is_image[inside_image]|mime_in[inside_image,image/jpg,image/jpeg,image/png,image/gif,image/webp]|max_size[inside_image,10485760]'
                )
            );

            if (!$this->validate($validationRule)) {
                return (new Template())->Render(
                    'Product/SubmitCreate',
                    array(
                        'title' => 'เพิ่มรถยนต์',
                        'error' => true,
                        'message' => $this->validator->getErrors()
                    )
                );
            }

            $PnewName = $preview_image->getRandomName();
            $preview_image->move('uploads', 'P_' . $PnewName);
            $C1newName = $color_image1->getRandomName();
            $color_image1->move('uploads', 'C1_' . $C1newName);
            $C2newName = $color_image2->getRandomName();
            $color_image2->move('uploads', 'C2_' . $C2newName);
            $ISnewName = $inside_image->getRandomName();
            $inside_image->move('uploads', 'IS_' . $ISnewName);

            $insertData['preview_image'] = 'uploads/' . 'P_' . $PnewName;
            $insertData['color_image1'] = 'uploads/' . 'C1_' . $C1newName;
            $insertData['color_image2'] = 'uploads/' . 'C2_' . $C2newName;
            $insertData['inside_image'] = 'uploads/' . 'IS_' . $ISnewName;
        } else {
            // Handle invalid files
            return (new Template())->Render(
                'Product/SubmitCreate',
                array(
                    'title' => 'เพิ่มรถยนต์',
                    'error' => true,
                    'message' => 'หนึ่งในไฟล์รูปภาพไม่ถูกต้องหรือมีปัญหาในการอัปโหลด'
                )
            );
        }

        $productModel = new ProductModel();
        $insert = $productModel->insert($insertData); // insertData is already an array

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
        $preview_image = $this->request->getFile('preview_image');
        $color_image1 = $this->request->getFile('car_color1');
        $color_image2 = $this->request->getFile('car_color2');
        $inside_image = $this->request->getFile('inside_image');

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

        $validationRule = array(
            'preview_image' => array(
                'label' => 'ไฟล์รูปภาพ',
                'rules' => 'is_image[preview_image]|mime_in[preview_image,image/jpg,image/jpeg,image/png,image/gif,image/webp]|max_size[preview_image,10485760]'
            ),
            'car_color1' => array(
                'label' => 'ไฟล์รูปภาพ',
                'rules' => 'is_image[car_color1]|mime_in[car_color1,image/jpg,image/jpeg,image/png,image/gif,image/webp]|max_size[car_color1,10485760]'
            ),
            'car_color2' => array(
                'label' => 'ไฟล์รูปภาพ',
                'rules' => 'is_image[car_color2]|mime_in[car_color2,image/jpg,image/jpeg,image/png,image/gif,image/webp]|max_size[car_color2,10485760]'
            ),
            'inside_image' => array(
                'label' => 'ไฟล์รูปภาพ',
                'rules' => 'is_image[inside_image]|mime_in[inside_image,image/jpg,image/jpeg,image/png,image/gif,image/webp]|max_size[inside_image,10485760]'
            )
        );

        // Validate and move preview_image
        if ($preview_image->isValid() && !$preview_image->hasMoved()) {
            if (!$this->validate(array('preview_image' => $validationRule['preview_image']))) {
                return (new Template())->Render(
                    'Product/SubmitUpdate',
                    array(
                        'title' => 'แก้ไขรถยนต์',
                        'error' => true,
                        'message' => $this->validator->getErrors()
                    )
                );
            }
            $PnewName = $preview_image->getRandomName();
            $preview_image->move('uploads', 'P_' . $PnewName);
            $updateData['preview_image'] = 'uploads/P_' . $PnewName;
        }

        // Validate and move car_color1
        if ($color_image1->isValid() && !$color_image1->hasMoved()) {
            if (!$this->validate(array('car_color1' => $validationRule['car_color1']))) {
                return (new Template())->Render(
                    'Product/SubmitUpdate',
                    array(
                        'title' => 'แก้ไขรถยนต์',
                        'error' => true,
                        'message' => $this->validator->getErrors()
                    )
                );
            }
            $C1newName = $color_image1->getRandomName();
            $color_image1->move('uploads', 'C1_' . $C1newName);
            $updateData['color_image1'] = 'uploads/C1_' . $C1newName;
        }

        // Validate and move car_color2
        if ($color_image2->isValid() && !$color_image2->hasMoved()) {
            if (!$this->validate(array('car_color2' => $validationRule['car_color2']))) {
                return (new Template())->Render(
                    'Product/SubmitUpdate',
                    array(
                        'title' => 'แก้ไขรถยนต์',
                        'error' => true,
                        'message' => $this->validator->getErrors()
                    )
                );
            }
            $C2newName = $color_image2->getRandomName();
            $color_image2->move('uploads', 'C2_' . $C2newName);
            $updateData['color_image2'] = 'uploads/C2_' . $C2newName;
        }

        // Validate and move inside_image
        if ($inside_image->isValid() && !$inside_image->hasMoved()) {
            if (!$this->validate(array('inside_image' => $validationRule['inside_image']))) {
                return (new Template())->Render(
                    'Product/SubmitUpdate',
                    array(
                        'title' => 'แก้ไขรถยนต์',
                        'error' => true,
                        'message' => $this->validator->getErrors()
                    )
                );
            }
            $ISnewName = $inside_image->getRandomName();
            $inside_image->move('uploads', 'IS_' . $ISnewName);
            $updateData['inside_image'] = 'uploads/IS_' . $ISnewName;
        }

        // Remove old images if new ones are uploaded
        if (isset($updateData['preview_image']) && file_exists($rowProduct['preview_image'])) {
            unlink($rowProduct['preview_image']);
        }
        if (isset($updateData['car_image1']) && file_exists($rowProduct['color_image1'])) {
            unlink($rowProduct['color_image1']);
        }
        if (isset($updateData['car_image2']) && file_exists($rowProduct['color_image2'])) {
            unlink($rowProduct['color_image2']);
        }
        if (isset($updateData['inside_image']) && file_exists($rowProduct['inside_image'])) {
            unlink($rowProduct['inside_image']);
        }

        // Debugging: Log the updateData array before updating the database
        log_message('debug', 'Update Data: ' . print_r($updateData, true));

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

        if (
            $rowProduct['preview_image'] != '' && file_exists($rowProduct['preview_image']) &&
            $rowProduct['color_image1'] != '' && file_exists($rowProduct['color_image1']) &&
            $rowProduct['color_image2'] != '' && file_exists($rowProduct['color_image2']) &&
            $rowProduct['inside_image'] != '' && file_exists($rowProduct['inside_image'])
        ) {
            unlink($rowProduct['preview_image']);
            unlink($rowProduct['color_image1']);
            unlink($rowProduct['color_image2']);
            unlink($rowProduct['inside_image']);
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
