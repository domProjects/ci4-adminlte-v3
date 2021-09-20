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