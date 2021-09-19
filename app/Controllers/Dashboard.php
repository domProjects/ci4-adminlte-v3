<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->_render('dashboard');
    }
}
