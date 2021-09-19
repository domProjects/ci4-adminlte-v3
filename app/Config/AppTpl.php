<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class AppTpl extends BaseConfig
{
	/**
	 * --------------------------------------------------------------------------
	 * Header >> Fixed
	 * --------------------------------------------------------------------------
	 *
	 * add class in <body>
	 *
	 * @var bool
	 * @var string
	 */
	public $headerFixed = true;
	public $headerFixedClass = 'layout-navbar-fixed';

	/**
	 * --------------------------------------------------------------------------
	 * Header >> Dropdown Legacy Offset
	 * --------------------------------------------------------------------------
	 *
	 * add class in <nav> .main-header
	 *
	 * @var bool
	 * @var string
	 */
	public $headerDopdownOffset = true;
	public $headerDopdownOffsetClass = 'dropdown-legacy';

	/**
	 * --------------------------------------------------------------------------
	 * Header >> Border
	 * --------------------------------------------------------------------------
	 *
	 * add class in <nav> .main-header
	 *
	 * @var bool
	 * @var string
	 */
	public $headerBorder = false;
	public $headerBorderClass = 'border-bottom-0';

	/**
	 * --------------------------------------------------------------------------
	 * Sidebar >> Collapsed
	 * --------------------------------------------------------------------------
	 *
	 * add class in <body>
	 *
	 * @var bool
	 * @var string
	 */
	public $sidebarCollapsed = false;
	public $sidebarCollapsedClass = 'sidebar-collapse';

	/**
	 * --------------------------------------------------------------------------
	 * Sidebar >> Fixed
	 * --------------------------------------------------------------------------
	 *
	 * add class in <body>
	 *
	 * @var bool
	 * @var string
	 */
	public $sidebarFixed = true;
	public $sidebarFixedClass = 'layout-fixed';

	/**
	 * --------------------------------------------------------------------------
	 * Sidebar >> Mini
	 * --------------------------------------------------------------------------
	 *
	 * add class in <body>
	 *
	 * @var bool
	 * @var string
	 */
	public $sidebarMini = true;
	public $sidebarMiniClass = 'sidebar-mini';

	public $sidebarMiniMd = false;
	public $sidebarMiniMdClass = 'sidebar-mini-md';

	public $sidebarMiniXs = false;
	public $sidebarMiniXsClass = 'sidebar-mini-xs';

	/**
	 * --------------------------------------------------------------------------
	 * Sidebar >> Flat Style
	 * --------------------------------------------------------------------------
	 *
	 * add class in <ul> .nav-sidebar
	 *
	 * @var bool
	 * @var string
	 */
	public $sidebarFlatStyle = true;
	public $sidebarFlatStyleClass = 'nav-flat';

	/**
	 * --------------------------------------------------------------------------
	 * Sidebar >> Legacy Style
	 * --------------------------------------------------------------------------
	 *
	 * add class in <ul> .nav-sidebar
	 *
	 * @var bool
	 * @var string
	 */
	public $sidebarLegacyStyle = false;
	public $sidebarLegacyStyleClass = 'nav-legacy';

	/**
	 * --------------------------------------------------------------------------
	 * Sidebar >> Compact
	 * --------------------------------------------------------------------------
	 *
	 * add class in <ul> .nav-sidebar
	 *
	 * @var bool
	 * @var string
	 */
	public $sidebarCompact = false;
	public $sidebarCompactClass = 'nav-compact';

	/**
	 * --------------------------------------------------------------------------
	 * Sidebar >> Child Indent
	 * --------------------------------------------------------------------------
	 *
	 * add class in <ul> .nav-sidebar
	 *
	 * @var bool
	 * @var string
	 */
	public $sidebarChildIndent = true;
	public $sidebarChildIndentClass = 'nav-child-indent';

	/**
	 * --------------------------------------------------------------------------
	 * Sidebar >> Child Hide on Collapse
	 * --------------------------------------------------------------------------
	 *
	 * add class in <ul> .nav-sidebar
	 *
	 * @var bool
	 * @var string
	 */
	public $sidebarChildHideCollapse = false;
	public $sidebarChildHideCollapseClass = 'nav-collapse-hide-child';

	/**
	 * --------------------------------------------------------------------------
	 * Sidebar >> Disable Hover/Focus Auto-Expand
	 * --------------------------------------------------------------------------
	 *
	 * add class in <aside> .main-sidebar
	 *
	 * @var bool
	 * @var string
	 */
	public $sidebarNoExpand = false;
	public $sidebarNoExpandClass = 'sidebar-no-expand';

	/**
	 * --------------------------------------------------------------------------
	 * Footer >> Fixed
	 * --------------------------------------------------------------------------
	 *
	 * add class in <body>
	 *
	 * @var bool
	 * @var string
	 */
	public $footerFixed = true;
	public $footerFixedClass = 'layout-footer-fixed';
}
