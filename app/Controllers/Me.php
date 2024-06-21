<?php

namespace App\Controllers;

use App\Controllers\Template;

class Me extends BaseController{
    public function Index()
    {
        $template = new Template();
        return $template->Render('Me/Index',
            array(
                'title' => 'me-page'
            )
        );
    }
}