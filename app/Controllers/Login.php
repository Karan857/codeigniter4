<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\Template;

class Login extends BaseController
{
    public function Index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $template = new Template();
        return $template->Render(
            'Login/Index',
            array(
                'title' => 'เข้าสู่ระบบ'
            )
        );
    }

    public function Check()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $template = new Template();
        if (empty($username) || empty($password)) {
            return $template->Render(
                'Login/Check',
                array(
                    'title' => 'ตรวจสอบการเข้าสู่ระบบ',
                    'error' => true,
                    'message' => 'กรุณากรอกข้อมูลให้ครบถ้วน'
                )
            );
        }

        $userModel = new UserModel();
        $rowUser = $userModel->where('username', $username)
            ->where('password', $password) // Consider using hashed passwords
            ->first();

        if (empty($rowUser)) {
            return $template->Render(
                'Login/Check',
                array(
                    'title' => 'ตรวจสอบการเข้าสู่ระบบ',
                    'error' => true,
                    'message' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'
                )
            );
        }

        // Set session data including role
        session()->set('logged_in', true);
        session()->set('user_id', $rowUser['user_id']);
        session()->set('role', $rowUser['role']); // Assuming 'role' is a field in the users table

        return $template->Render(
            'Login/Check',
            array(
                'title' => 'ตรวจสอบการเข้าสู่ระบบ',
                'error' => false,
                'message' => 'สวัสดีคุณ ' . $rowUser['name']
            )
        );
    }

    public function Logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
