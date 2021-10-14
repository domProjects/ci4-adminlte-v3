<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Libraries\Breadcrumb;
use App\Libraries\Menu;
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
	 *
	 */
	protected $configApp;

	/**
	 *
	 */
	protected $configTemplate;

	/**
	 *
	 */
	//protected $configMenu;

	/**
	 *
	 */
	protected $menu;

	/**
	 *
	 * @var string
	 */
	protected $titlePage;

	/**
	 *
	 */
	protected $breadcrumb;

	/**
	 *
	 * @var array
	 */
	protected $breadcrumbItems = [];

	/**
	 *
	 */
	protected $template;

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
		$this->configTemplate = config('AppTemplate');
		//$this->configMenu = config('AppMenu');

		// Define language
		$this->data['locale'] = $request->getLocale();
		$this->data['supportedLocales'] = $request->config->supportedLocales;

		// \Config\App
		$this->data['charset'] = $this->configApp->charset;
		$this->data['lang'] = $request->getLocale();

		// Add template
		$this->template = new Template();

		// Add menu
		$this->menu = new Menu();
		$this->data['menu'] = $this->menu->generate();

		// Add breadcrumb
		$this->breadcrumb = new Breadcrumb();
		$this->breadcrumb->setTemplate($this->configTemplate->breadcrumbTemplate);
		// Add default items
		$this->breadcrumbItems['root'] = ['Dashboard' => '/'];
	}

	/**
	 * Render Breadcrumb
	 */
	protected function _renderBreadcrumb()
	{
		if (isset($this->breadcrumbItems['controller'])  && is_array($this->breadcrumbItems['controller']))
		{
			if (isset($this->breadcrumbItems['function']) && is_array($this->breadcrumbItems['function']))
			{
				$breadcrumpFunction = $this->breadcrumbItems['function'];
			}
			else
			{
				$breadcrumpFunction = [];
			}

			// Merge breadcrumbItems
			$mergeControllerFunction = array_merge($this->breadcrumbItems['controller'], $breadcrumpFunction);
			$mergeRootControllerFunction = array_merge($this->breadcrumbItems['root'], $mergeControllerFunction);

			// Add items
			$this->breadcrumb->addItems($mergeRootControllerFunction);

			// Generate breadcrumb
			return $this->breadcrumb->generate();
		}
	}

	/**
	 * Renders this page
	 *
	 * @param string $view The view file to render
	 */
	protected function _render(string $view)
	{
		// Add class in <body>
		$this->data['bodyClass'] = $this->template->addBodyClass();

		// Add class in <nav> .main-header
		$this->data['navbarClass'] = $this->template->addNavbarClass();

		// Add class in <aside> .main-sidebar
		$this->data['asideNavbarClass'] = $this->template->addAsideNavbarClass();

		// Add class in <ul> .nav-sidebar
		$this->data['sidebarMenuClass'] = $this->template->addSidebarMenuClass();

		// Add brand elements
		$this->data['brand'] = $this->template->addSidebarMenuBrand();

		// Add brand elements
		$this->data['sidebarUserPanel'] = $this->template->addSidebarUserPanel();

		// Add brand elements
		$this->data['sidebarSearchForm'] = $this->template->addSidebarSearchForm();

		// Add title page
		$this->data['titlePage'] = $this->titlePage;

		// Add breadcrumb elements
		$this->data['breadcrumb'] = $this->configTemplate->breadcrumbHide !== true ? $this->_renderBreadcrumb() : null;

		// Merge data[]
		$data = $this->data;

		// Assemble the browser page
		echo view($view, $data);
	}
}
