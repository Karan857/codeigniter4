<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModel; 


class Manage extends BaseController
{

    // index
    public function index()
    {
         if (!session()->get('logged_in'))
        {
            return redirect()->to('/login');
        }

        $ProductModel = new ProductModel();
        $product = $ProductModel->findAll();

        return (new Template())->Render('Manage/Index',
            array(
                'title' => 'product',
                'product' => $product
            )
        );
    }

    //create
    public function Create()
    {
        if (!session()->get('logged_in'))
        {
            return redirect()->to('/login');
        }

        return (new Template())->Render('Manage/Create',
            array(
                'title' => 'เพิ่มสถานที่ท่องเที่ยว'
            )
        );
    }

    // หน้า submit create
    public function SubmitCreate()
    {
        if (!session()->get('logged_in'))
        {
            return redirect()->to('/login');
        }

        $name = $this->request->getPost('name');
        $description = $this->request->getPost('description');
        $price = $this->request->getPost('price');
        $location = $this->request->getPost('location');
        $image = $this->request->getFile('image');

        $message = array();

        if (empty($name))
            $message[] = 'ชื่อสถานที่ท่องเที่ยว';

        if (!empty($message))
        {
            return (new Template())->Render('Manage/SubmitCreate',
                array(
                    'title' => 'เพิ่มสถานที่ท่องเที่ยว',
                    'error' => true,
                    'message' => 'กรอกข้อมูล ' . join(', ', $message) . ' ให้ครบถ้วน'
                )
            );
        }

        $insertData = array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'location' => $location,
        );

        if ($image->isValid() && !$image->hasMoved())
        {
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
            if (!$this->validateData([], $validationRule))
            {
                return (new Template())->Render('Manage/SubmitCreate',
                    array(
                        'title' => 'เพิ่มสถานที่ท่องเที่ยว',
                        'error' => false,
                        'message' => $this->validator->getErrors()
                    )
                );
            }

            $newName = $image->getRandomName();
            $image->move('uploads', $newName);
            $insertData['image'] = 'uploads/' . $newName;
        }

        $productModel = new ProductModel();
        $insert = $productModel->insert($insertData);
        if ($insert)
        {
            return (new Template())->Render('Manage/SubmitCreate',
                array(
                    'title' => 'เพิ่มสถานที่ท่องเที่ยว',
                    'error' => false,
                    'message' => 'เพิ่มสถานที่ท่องเที่ยวเรียบร้อยแล้ว'
                )
            );
        }

        return (new Template())->Render('Product/SubmitCreate',
            array(
                'title' => 'เพิ่มสถานที่ท่องเที่ยว',
                'error' => true,
                'message' => 'เพิ่มสถานที่ท่องเที่ยวไม่สำเร็จ'
            )
        );
    }

    // หน้าฟอร์มในการแก้ไขสินค้า
    public function Update($id)
    {
        if (!session()->get('logged_in'))
        {
            return redirect()->to('/login');
        }

        if (empty($id))
        {
            return redirect()->to('/product');
        }

        $rowProduct = (new ProductModel())->find($id);

        if (empty($rowProduct))
        {
            return redirect()->to('/manage');
        }

        return (new Template())->Render('manage/Update',
            array(
                'title' => 'แก้ไขสถานที่ท่องเที่ยว',
                'rowProduct' => $rowProduct
            )
        );
    }


    // หน้า submit ฟอร์มแก้ไขสินค้า
    public function SubmitUpdate()
    {
        if (!session()->get('logged_in'))
        {
            return redirect()->to('/login');
        }

        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $description = $this->request->getPost('description');
        $price = $this->request->getPost('price');
        $location = $this->request->getPost('location');
        $image = $this->request->getFile('image');

        $image = $this->request->getFile('image');

        $productModel = new ProductModel();
        $rowProduct = $productModel->find($id);
        if (empty($rowProduct))
        {
            return (new Template())->Render('manage/SubmitUpdate',
                array(
                    'title' => 'แก้ไขสถานที่ท่องเที่ยว',
                    'error' => true,
                    'message' => 'ไม่พบสถานที่ท่องเที่ยที่ต้องการแก้ไข',
                    'id' => $id
                )
            );
        }

        $message = array();

        if (empty($name))
            $message[] = 'ชื่อสถานที่ท่องเที่ย';

        if (!empty($message))
        {
            return (new Template())->Render('manage/SubmitUpdate',
                array(
                    'title' => 'แก้ไขสถานที่ท่องเที่ย',
                    'error' => true,
                    'message' => 'กรอกข้อมูล ' . join(', ', $message) . ' ให้ครบถ้วน',
                    'id' => $id
                )
            );
        }

        $updateData = array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'location' => $location,
        );

        if ($image->isValid() && !$image->hasMoved())
        {
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
            if (!$this->validateData([], $validationRule))
            {
                return (new Template())->Render('Product/SubmitCreate',
                    array(
                        'title' => 'เพิ่มสถานที่ท่องเที่ย',
                        'error' => false,
                        'message' => $this->validator->getErrors()
                    )
                );
            }

            $newName = $image->getRandomName();
            $image->move('uploads', $newName);
            $updateData['image'] = 'uploads/' . $newName;

            if ($rowProduct['image'] != '' && file_exists($rowProduct['image']))
            {
                unlink($rowProduct['image']);
            }
        }

        $update = $productModel->update($id, $updateData);
        if ($update)
        {
            return (new Template())->Render('Manage/SubmitUpdate',
                array(
                    'title' => 'แก้ไขสถานที่ท่องเที่ย',
                    'error' => false,
                    'message' => 'แก้ไขสถานที่ท่องเที่ยเรียบร้อยแล้ว'
                )
            );
        }

        return (new Template())->Render('Manage/SubmitUpdate',
            array(
                'title' => 'แก้ไขสถานที่ท่องเที่ย',
                'error' => true,
                'message' => 'แก้ไขสถานที่ท่องเที่ยไม่สำเร็จ',
                'id' => $id
            )
        );
    }

    // หน้าลบสินค้า
    public function Delete($id)
    {
        if (!session()->get('logged_in'))
        {
            return redirect()->to('/login');
        }

        $productModel = new ProductModel();
        $rowProduct = $productModel->find($id);
        if (empty($rowProduct))
        {
            return (new Template())->Render('Manage/Delete',
                array(
                    'title' => 'ลบสถานที่ท่องเที่ย',
                    'error' => true,
                    'message' => 'ไม่พบสถานที่ท่องเที่ยที่ต้องการลบ'
                )
            );
        }

        if ($rowProduct['image'] != '' && file_exists($rowProduct['image']))
        {
            unlink($rowProduct['image']);
        }

        $delete = $productModel->delete($id);
        if ($delete)
        {
            return (new Template())->Render('Manage/Delete',
                array(
                    'title' => 'ลบสถานที่ท่องเที่ย',
                    'error' => false,
                    'message' => 'ลบสถานที่ท่องเที่ยเรียบร้อยแล้ว'
                )
            );
        }

        return (new Template())->Render('Manage/Delete',
            array(
                'title' => 'ลบสถานที่ท่องเที่ย',
                'error' => true,
                'message' => 'ลบสถานที่ท่องเที่ยไม่สำเร็จ'
            )
        );
    }

}
