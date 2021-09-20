<?php

namespace App\Libraries;

class Template
{
	//
	public $config;

	//
	public $bodyClass = [];

	//
	public $navbarClass = [];

	//
	public $asideNavbarClass = [];

	//
	public $sidebarMenuClass = [];

	//
	public $brand = [];

	//
	public $output = null;

	//
	public function __construct()
	{
		$this->config = config('AppTpl');

		$this->bodyClass = [
			[
				'value' => $this->config->headerFixed,
				'class' => $this->config->headerFixedClass
			],
			[
				'value' => $this->config->sidebarCollapsed,
				'class' => $this->config->sidebarCollapsedClass
			],
			[
				'value' => $this->config->sidebarFixed,
				'class' => $this->config->sidebarFixedClass
			],
			[
				'value' => $this->config->sidebarMini,
				'class' => $this->config->sidebarMiniClass
			],
			[
				'value' => $this->config->sidebarMiniMd,
				'class' => $this->config->sidebarMiniMdClass
			],
			[
				'value' => $this->config->sidebarMiniXs,
				'class' => $this->config->sidebarMiniXsClass
			],
			[
				'value' => $this->config->footerFixed,
				'class' => $this->config->footerFixedClass
			]
		];

		$this->navbarClass = [
			[
				'value' => $this->config->headerDopdownOffset,
				'class' => $this->config->headerDopdownOffsetClass
			],
			[
				'value' => $this->config->headerBorder,
				'class' => $this->config->headerBorderClass
			]
		];

		$this->asideNavbarClass = [
			[
				'value' => $this->config->sidebarNoExpand,
				'class' => $this->config->sidebarNoExpandClass
			]
		];

		$this->sidebarMenuClass = [
			[
				'value' => $this->config->sidebarFlatStyle,
				'class' => $this->config->sidebarFlatStyleClass
			],
			[
				'value' => $this->config->sidebarLegacyStyle,
				'class' => $this->config->sidebarLegacyStyleClass
			],
			[
				'value' => $this->config->sidebarCompact,
				'class' => $this->config->sidebarCompactClass
			],
			[
				'value' => $this->config->sidebarChildIndent,
				'class' => $this->config->sidebarChildIndentClass
			],
			[
				'value' => $this->config->sidebarChildHideCollapse,
				'class' => $this->config->sidebarChildHideCollapseClass
			]
		];
	}

	//
	public function addBodyClass()
	{
		return $this->_addOptionsClass($this->bodyClass);
	}

	//
	public function addNavbarClass()
	{
		return $this->_addOptionsClass($this->navbarClass);
	}

	//
	public function addAsideNavbarClass()
	{
		return $this->_addOptionsClass($this->asideNavbarClass);
	}

	//
	public function addSidebarMenuClass()
	{
		return $this->_addOptionsClass($this->sidebarMenuClass);
	}

	//
	public function addSidebarMenuBrand()
	{
		$this->output  = '<a href="' . site_url() . '" class="brand-link">';
		$this->output .= '<img src="' . base_url($this->config->brand['img']) . '" alt="' . $this->config->brand['alt'] . '" class="brand-image img-circle elevation-3" style="opacity: .8">';
		$this->output .= '<span class="brand-text font-weight-light">' . $this->config->brand['text'] . '</span>';
		$this->output .= '</a>';

		return $this->output;
	}

	//
	public function addSidebarUserPanel()
	{
		if ($this->config->sidebarUserPanel !== false)
		{
			$this->output  = '<div class="user-panel mt-3 pb-3 mb-3 d-flex">';
			$this->output .= '<div class="image">';
			$this->output .= '<img src="' . base_url('img/avatar/user2-160x160.jpg') . '" class="img-circle elevation-2" alt="User Image">';
			$this->output .= '</div>';
			$this->output .= '<div class="info">';
			$this->output .= '<a href="#" class="d-block">Alexander Pierce</a>';
			$this->output .= '</div>';
			$this->output .= '</div>';

			return $this->output;
		}
	}

	//
	public function addSidebarSearchForm()
	{
		if ($this->config->sidebarSearchForm !== false)
		{
			$this->output  = '<div class="form-inline">';
			$this->output .= '<div class="input-group" data-widget="sidebar-search">';
			$this->output .= '<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">';
			$this->output .= '<div class="input-group-append">';
			$this->output .= '<button class="btn btn-sidebar">';
			$this->output .= '<i class="fas fa-search fa-fw"></i>';
			$this->output .= '</button>';
			$this->output .= '</div>';
			$this->output .= '</div>';
			$this->output .= '</div>';

			return $this->output;
		}
	}

	//
	protected function _addOptionsClass(array $elements, string $separator = ' ')
	{
		if (is_array($elements))
		{
			foreach ($elements as $key => $value)
			{
				if ($value['value'] !== false)
				{
					$this->output .= $separator.$value['class'];
				}
			}

			return $this->output;
		}
	}
}