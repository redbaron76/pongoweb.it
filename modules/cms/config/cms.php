<?php

return array(
	
	/*
	|--------------------------------------------------------------------------
	| Module Name
	|--------------------------------------------------------------------------
	|
	| Name of Module
	|
	*/

	'name' => 'PongoCMS',
	
	/*
	|--------------------------------------------------------------------------
	| Module PATH
	|--------------------------------------------------------------------------
	|
	| Path of module with trailing slash.
	|
	*/

	'path' => '/cms',
	
	/*
	|--------------------------------------------------------------------------
	| Module's sections
	|--------------------------------------------------------------------------
	|
	| Active sections in cms
	|
	*/

	//'sections' => array('/info' => 'Info', '/banner' => 'Banner', '/categories' => 'Categorie'),
	'sections' => array(
						'/info' => Lang::line('cms::menu.info')->get(Session::get('LANG_KEY')),
						'/banner' => Lang::line('cms::menu.banner')->get(Session::get('LANG_KEY')),
						'/categories' => Lang::line('cms::menu.categories')->get(Session::get('LANG_KEY')),
						),
	
	/*
	|--------------------------------------------------------------------------
	| Module's languages
	|--------------------------------------------------------------------------
	|
	| Available cms languages translations
	|
	*/

	'languages' => array('it' => 'Italiano', 'en' => 'English'),
	
	/*
	|--------------------------------------------------------------------------
	| Module's Admin Account
	|--------------------------------------------------------------------------
	|
	| CMS admin account set in /cms/setup
	|
	*/

	'admin_login' 		=> 'admin',
	'admin_password' 	=> 'admin',
	
	/*
	|--------------------------------------------------------------------------
	| Module Copyrights
	|--------------------------------------------------------------------------
	|
	| Copyright
	|
	*/

	'copyright' => 'PongoWeb 2012',
);