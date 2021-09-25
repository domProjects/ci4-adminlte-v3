<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function __construct()
	{
		// Default Breadcrumb of this controller
		$this->breadcrumbItems['controller'] = ['Dashboard' => '/'];
	}

	public function index()
	{
		$this->_render('dashboard');
	}
}
