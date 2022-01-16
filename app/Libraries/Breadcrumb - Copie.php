<?php

namespace App\Libraries;

use Config\Services as AppServices;

class Breadcrumb
{
	/**
	 * Menu config
	 *
	 * @var array
	 */
	public $item;

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


	public function add_item($items)
	{
		foreach ($items as $key => $value)
		{
			$this->item[$value] = [
				'title' => $key,
				'link' => $value
			];
		}
	}

	/**
	 * Generate breadcrumb
	 *
	 * @return string
	 */
	public function generate()
	{
		// Compile and validate the template date
		$this->_compileTemplate();

		// Build the breadcrumb
		$out = $this->template['tag_open'] . $this->newline;

		foreach ($this->item as $key => $value)
		{
			$keys = array_keys($this->item);

			if (end($keys) == $key)
			{
				$out .= $this->template['crumb_active'] . $value['title'] . $this->template['crumb_close'] . $this->newline;
			}
			else
			{
				$out .= $this->template['crumb_open'];
				$out .= anchor($this->_formatUrl($value['link']), $value['title']);
				$out .= $this->template['crumb_close'] . $this->newline;
			}
		}

		$out .= $this->template['tag_close'] . $this->newline;

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
			'tag_open'     => '<ol class="breadcrumb float-sm-right">',
			'tag_close'    => '</ol>',
			'crumb_open'   => '<li class="breadcrumb-item">',
			'crumb_active' => '<li class="breadcrumb-item active">',
			'crumb_close'  => '</li>'
		];
	}
}
