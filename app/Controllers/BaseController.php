<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

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

		// load helper
		helper('template');

		// Define language
		$this->data['locale'] = $request->getLocale();
		$this->data['supportedLocales'] = $request->config->supportedLocales;

		// \Config\App
		$this->data['charset'] = $this->configApp->charset;
		$this->data['lang'] = $this->configApp->charset;
	}

	/**
	 * Renders this page
	 *
	 * @param string $view The view file to render
	 */
	protected function _render(string $view)
	{
		// \Config\App
		$this->data['charset'] = $this->configApp->charset;

		// Add class in <body>
		$headerFixed = ($this->configTpl->headerFixed !== false) ? $this->configTpl->headerFixedClass : null;
		$sidebarCollapsed = ($this->configTpl->sidebarCollapsed !== false) ? $this->configTpl->sidebarCollapsedClass : null;
		$sidebarFixed = ($this->configTpl->sidebarFixed !== false) ? $this->configTpl->sidebarFixedClass : null;
		$sidebarMini = ($this->configTpl->sidebarMini !== false) ? $this->configTpl->sidebarMiniClass : null;
		$sidebarMiniMd = ($this->configTpl->sidebarMiniMd !== false) ? $this->configTpl->sidebarMiniMdClass : null;
		$sidebarMiniXs = ($this->configTpl->sidebarMiniXs !== false) ? $this->configTpl->sidebarMiniXsClass : null;
		$footerFixed = ($this->configTpl->footerFixed !== false) ? $this->configTpl->footerFixedClass : null;

		$bodyClassArray = [$headerFixed, $sidebarCollapsed, $sidebarFixed, $sidebarMini, $sidebarMiniMd, $sidebarMiniXs, $footerFixed];
		$bodyClassResult = addOptionsClass($bodyClassArray);


		// Add class in <nav> .main-header
		$headerDopdownOffset = ($this->configTpl->headerDopdownOffset !== false) ? $this->configTpl->headerDopdownOffsetClass : null;
		$headerBorder = ($this->configTpl->headerBorder !== false) ? $this->configTpl->headerBorderClass : null;

		$navbarClassArray = [$headerDopdownOffset, $headerBorder];
		$navbarClassResult = addOptionsClass($navbarClassArray);


		// Add class in <aside> .main-sidebar
		$sidebarNoExpand = ($this->configTpl->sidebarNoExpand !== false) ? $this->configTpl->sidebarNoExpandClass : null;

		$asideNavbarClassArray = [$sidebarNoExpand];
		$asideNavbarClassResult = addOptionsClass($asideNavbarClassArray);


		// Add class in <ul> .nav-sidebar
		$sidebarFlatStyle = ($this->configTpl->sidebarFlatStyle !== false) ? $this->configTpl->sidebarFlatStyleClass : null;
		$sidebarLegacyStyle = ($this->configTpl->sidebarLegacyStyle !== false) ? $this->configTpl->sidebarLegacyStyleClass : null;
		$sidebarCompact = ($this->configTpl->sidebarCompact !== false) ? $this->configTpl->sidebarCompactClass : null;
		$sidebarChildIndent = ($this->configTpl->sidebarChildIndent !== false) ? $this->configTpl->sidebarChildIndentClass : null;
		$sidebarChildHideCollapse = ($this->configTpl->sidebarChildHideCollapse !== false) ? $this->configTpl->sidebarChildHideCollapseClass : null;

		$sidebarMenuClassArray = [$sidebarFlatStyle, $sidebarLegacyStyle, $sidebarCompact, $sidebarChildIndent, $sidebarChildHideCollapse];
		$sidebarMenuClassResult = addOptionsClass($sidebarMenuClassArray);


		// Prepare data
		$this->data['bodyClass'] = $bodyClassResult;
		$this->data['navbarClass'] = $navbarClassResult;
		$this->data['asideNavbarClass'] = $asideNavbarClassResult;
		$this->data['sidebarMenuClass'] = $sidebarMenuClassResult;

		// Merge data[]
		$data = $this->data;

		// Assemble the browser page
		echo view($view, $data);
	}
}
