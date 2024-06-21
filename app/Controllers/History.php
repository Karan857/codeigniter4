<?php

namespace App\Controllers;

use App\Controllers\Template;

class History extends BaseController{
    public function Index()
    {
        $template = new Template();
        return $template->Render('History/Index',
            array(
                'title' => 'History'
            )
        );
    }
}