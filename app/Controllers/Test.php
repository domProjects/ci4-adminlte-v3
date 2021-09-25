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
		// Define title page
		$this->titlePage = 'Test';

		// Renders this page
		$this->_render('test');
	}

	public function one()
	{
		// Define title page
		$this->titlePage = 'One';

		// Define Breadcrumb item for this page
		$this->breadcrumbItems['function'] = ['One' => 'one'];

		// Renders this page
		$this->_render('test');
	}

	public function two()
	{
		// Define title page
		$this->titlePage = 'Two';

		// Define Breadcrumb item for this page
		$this->breadcrumbItems['function'] = ['Two' => 'two'];

		// Renders this page
		$this->_render('test');
	}
}
