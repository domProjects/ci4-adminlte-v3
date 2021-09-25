<?php

namespace App\Controllers;

class Test extends BaseController
{
	public function __construct()
	{
		// Default Breadcrumb of this controller
		$this->breadcrumbItems['controller'] = ['Test' => 'test'];
	}

	public function index()
	{
		$this->_render('test');
	}

	public function one()
	{
		$this->breadcrumbItems['function'] = ['One' => 'one'];

		$this->_render('test');
	}

	public function two()
	{
		$this->breadcrumbItems['function'] = ['Two' => 'two'];

		$this->_render('test');
	}
}
