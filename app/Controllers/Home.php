<?php

namespace App\Controllers;

use App\Controllers\Template;

class Home extends BaseController
{
    public function Index()
    {
        $template = new Template();
        return $template->Render('Home/Index',
            array(
                'title' => 'หน้าหลัก'
            )
        );
    }
}
