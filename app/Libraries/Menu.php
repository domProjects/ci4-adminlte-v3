<?php

namespace App\Libraries;

use Config\Services as AppServices;

class Menu
{
	/**
	 * Menu config
	 *
	 * @var bool
	 */
	public $configMenu;

	/**
	 * Template layout template
	 *
	 * @var array
	 */
	public $template;

	/**
	 * Newline setting
	 *
	 * @var string
	 */
	public $newline = "\n";

	//
	public function __construct($config = [])
	{
		// load config file
		$this->configMenu = config('AppMenu');

		// initialize config
		foreach ($config as $key => $val)
		{
			$this->template[$key] = $val;
		}
	}

	/**
	 * Set the template
	 *
	 * @param  array $template
	 * @return boolean
	 */
	public function setTemplate($template)
	{
		if (! is_array($template))
		{
			return false;
		}

		$this->template = $template;
		return true;
	}

	/**
	 * Generate menu
	 *
	 * @return string
	 */
	public function generate()
	{
		// Compile and validate the template date
		$this->_compileTemplate();

		// Construct menu
		return $this->_fetchMenu($this->configMenu->menuItems);
	}

	/**
	 * Construct menu
	 *
	 * @param  array $items
	 * @return string
	 */
	protected function _fetchMenu(array $items)
	{
		$out = null;

		foreach ($items as $key => $value)
		{
			$url = $this->_formatUrl($value['url']);

			$isOpenItem = isset($value['submenu']) ? $this->_isOpenItem($url) : null;

			$out .= '<li class="' . $this->template['menu_item_class'] . $isOpenItem . '">' . $this->newline;
			$out .= '<a href="' . $url . '" class="' . $this->template['menu_anchor_class'] . $this->_isActiveAnchor($url) . '">' . $this->newline;
			$out .= '<i class="nav-icon fas ' . $value['icon'] . '"></i>' . $this->newline;
			$out .= $this->template['menu_text_open'];
			$out .= $value['text'];

			if (isset($value['badge']))
			{
				$type = null;
				$text = null;

				foreach ($value['badge'] as $k)
				{
					$type = $value['badge']['type'];
					$text = $value['badge']['text'];
				}

				$out .= '<span class="right badge badge-' . $type . '">' . $text . '</span>';
			}

			if (isset($value['submenu']))
			{
				$out .= $this->template['menu_arrow_submenu'];	
			}

			$out .= $this->template['menu_text_close'] . $this->newline;
			$out .= '</a>' . $this->newline;

			if (isset($value['submenu']))
			{
				$out .= '<ul class="nav nav-treeview">' . $this->newline;
				$out .= $this->_fetchMenu($value['submenu']);
				$out .= '</ul>' . $this->newline;
			}

			$out .= '</li>' . $this->newline;
		}

		return $out;
	}

	/**
	 * Format url
	 *
	 * @return string
	 */
	protected function _formatUrl(string $url)
	{
		if ($url !== '#')
		{
			$locale = AppServices::request()->getLocale();
			$url = site_url($locale . '/' . $url);
		}
		else
		{
			$url = $url;
		}

		return $url;
	}

	/**
	 * Add active class
	 *
	 * @return void
	 */
	protected function _isActiveAnchor(string $url)
	{
		$uriCurrent = new \CodeIgniter\HTTP\URI(current_url());
		$uriCurrent->setSilent(true);

		$uriMenu = new \CodeIgniter\HTTP\URI(site_url($url));
		$uriMenu->setSilent(true);

		$class = $this->template['menu_anchor_class_active'];

		if (($uriMenu->getTotalSegments() == 1 && $uriMenu->getSegment(2) == null) && $uriCurrent->getSegment(2) == null)
		{
			return ' ' . $class;
		}
		elseif (($uriMenu->getTotalSegments() == 2 && $uriMenu->getSegment(2) !== null) && ($uriMenu->getSegment(2) == $uriCurrent->getSegment(2)))
		{
			return ' ' . $class;
		}
		elseif (($uriMenu->getTotalSegments() == 3 && $uriMenu->getSegment(2) !== null) && ($uriMenu->getSegment(3) == $uriCurrent->getSegment(3)))
		{
			return ' ' . $class;
		}
		else
		{
			return null;
		}
	}

	/**
	 * Add menu open class
	 *
	 * @return void
	 */
	protected function _isOpenItem(string $url)
	{
		$uriCurrent = new \CodeIgniter\HTTP\URI(current_url());
		$uriCurrent->setSilent(true);

		$uriMenu = new \CodeIgniter\HTTP\URI(site_url($url));
		$uriMenu->setSilent(true);

		if (($uriMenu->getTotalSegments() == 2 && $uriMenu->getSegment(2) !== null) && ($uriMenu->getSegment(2) == $uriCurrent->getSegment(2)))
		{
			return ' ' . $this->template['menu_item_open'];
		}
		else
		{
			return null;
		}
	}

	/**
	 * Compile Template
	 *
	 * @return void
	 */
	protected function _compileTemplate()
	{
		if ($this->template === null)
		{
			$this->template = $this->_defaultTemplate();
			return;
		}

		foreach ($this->_defaultTemplate() as $field => $template)
		{
			if (! isset($this->template[$field]))
			{
				$this->template[$field] = $template;
			}
		}
	}

	/**
	 * Default Template
	 *
	 * @return array
	 */
	protected function _defaultTemplate()
	{
		return [
			'menu_item_class'          => 'nav-item',
			'menu_item_open'           => 'menu-is-opening menu-open',
			'menu_anchor_class'        => 'nav-link',
			'menu_anchor_class_active' => 'active',
			'menu_text_open'           => '<p>',
			'menu_text_close'          => '</p>',
			'menu_arrow_submenu'       => '<i class="right fas fa-angle-left"></i>'
		];
	}
}
