<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class AppMenu extends BaseConfig
{
	/**
	 * --------------------------------------------------------------------------
	 * Menu
	 * --------------------------------------------------------------------------
	 *
	 * @var array
	 */
	public $menuItems = [
		[
			'url' => '',
			'text' => 'Dashboard',
			'icon' => 'fa-tachometer-alt',
			'badge' => null,
			'submenu' => null
		],
		[
			'url' => 'setting',
			'text' => 'Setting',
			'icon' => 'fa-cogs',
			'badge' => null,
			'submenu' => null
		],
		[
			'url' => 'test',
			'text' => 'Test Link',
			'icon' => 'fa-vials',
			'badge' => null,
			'submenu' => [
				[
					'url' => 'test/one',
					'text' => 'link test 1',
					'icon' => 'fa-vial',
					'badge' => [
						'type' => 'danger',
						'text' => 'new'
					]
				],
				[
					'url' => 'test/two',
					'text' => 'link test 2',
					'icon' => 'fa-vial',
					'badge' => null
				]
			]
		]
	];
}
