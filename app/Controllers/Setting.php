<?php

namespace App\Controllers;

class Setting extends BaseController
{
	public function __construct()
	{
		// Default Breadcrumb of this controller
		$this->breadcrumbItems['controller'] = ['Setting' => 'setting'];
	}

	public function index()
	{
		$this->_render('setting');
	}
}
