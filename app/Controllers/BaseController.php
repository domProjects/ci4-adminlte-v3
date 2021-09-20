<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Libraries\Template;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
	/**
	 * @var Config
	 */
	protected $configApp;
	protected $configTpl;

	/**
	 * Instance of the main Request object.
	 *
	 * @var CLIRequest|IncomingRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Parameters for view components
	 *
	 * @var array
	 */
	protected $data = [];

	/**
	 * Constructor.
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		// Preload any models, libraries, etc, here.

		// E.g.: $this->session = \Config\Services::session();

		// Import config file
		$this->configApp = config('App');
		$this->configTpl = config('AppTpl');

		// Define language
		$this->data['locale'] = $request->getLocale();
		$this->data['supportedLocales'] = $request->config->supportedLocales;

		// \Config\App
		$this->data['charset'] = $this->configApp->charset;
		$this->data['lang'] = $request->getLocale();
	}

	/**
	 * Renders this page
	 *
	 * @param string $view The view file to render
	 */
	protected function _render(string $view)
	{
		$template = new Template();

		// Add class in <body>
		$this->data['bodyClass'] = $template->addBodyClass();

		// Add class in <nav> .main-header
		$this->data['navbarClass'] = $template->addNavbarClass();

		// Add class in <aside> .main-sidebar
		$this->data['asideNavbarClass'] = $template->addAsideNavbarClass();

		// Add class in <ul> .nav-sidebar
		$this->data['sidebarMenuClass'] = $template->addSidebarMenuClass();

		// Add brand elements
		$this->data['brand'] = $template->addSidebarMenuBrand();

		// Add brand elements
		$this->data['sidebarUserPanel'] = $template->addSidebarUserPanel();

		// Add brand elements
		$this->data['sidebarSearchForm'] = $template->addSidebarSearchForm();

		// Merge data[]
		$data = $this->data;

		// Assemble the browser page
		echo view($view, $data);
	}
}
