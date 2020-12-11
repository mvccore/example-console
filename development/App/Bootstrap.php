<?php

namespace App;

class Bootstrap
{
	public static function Init () {
		// patch core to use extended request class for cli
		\MvcCore\Application::GetInstance()->SetRequestClass('\\MvcCore\\Ext\\Request\\Cli');

		// patch core to use extended debug class
		\MvcCore\Application::GetInstance()->SetDebugClass('\\MvcCore\\Ext\\Debug\\Tracy');
		
		// set up application routes without custom names, defined basicly as Controller::Action
		\MvcCore\Router::GetInstance([
			'Index:Index'			=> [
				'pattern'			=> "#^/$#",
				'reverse'			=> '/',
			],
			'CdCollection:Index'	=> [
				'pattern'			=> "#^/albums$#",
				'reverse'			=> '/albums',
			],
			'CdCollection:Create'	=> [
				'pattern'			=> "#^/create#",
				'reverse'			=> '/create',
			],
			'CdCollection:Edit'	=> [
				'pattern'			=> "#^/edit/([0-9]*)#",
				'reverse'			=> '/edit/{%id}',
				'params'			=> ['id' => 0,],
			],
		]);
	}
}
