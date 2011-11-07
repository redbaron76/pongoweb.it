<?php

return array(	
	
	/*
	|-------------------------------------------------------------------------------
	| IMAGE Routes (Class Image)
	|-------------------------------------------------------------------------------
	*/
	
	'GET /img/(:num)/(:num)/(:any)/(:any)' => array('name' => 'showimg', 'needs' => 'php-thumb', 'do' => function($width = 100, $height = 100, $type = "re", $fileName = "noimg.jpg") {
		
		$file = Config::get('application.img_path').$fileName;
		
		if (!file_exists($file))
		{
		     // handle missing images however you want... perhaps show a default image??  Up to you...
		} else {			
			$thumb = PhpThumbFactory::create($file);			
			switch ($type) {
				case 're':
					$thumb->resize($width, $height);
					break;
				case 'ap':
					$thumb->adaptiveResize($width, $height);
					break;
				case 'cc':
					$thumb->cropFromCenter($width, $height);
					break;
				default:
					$thumb->resize($width, $height);
			}			
			$thumb->show();			
		}
	
	}),
	
	'GET /img/(:num)/(:num)/(:num)/(:num)/(:any)' => array('name' => 'vancrop', 'needs' => 'php-thumb', 'do' => function($x, $y, $width = 100, $height = 100, $fileName = "noimg.jpg") {
		
		$file = Config::get('application.img_path').$fileName;
		
		if (!file_exists($file))
		{
		     // handle missing images however you want... perhaps show a default image??  Up to you...
		} else {			
			$thumb = PhpThumbFactory::create($file);
			$thumb->crop($x, $y, $width, $height);
			$thumb->show();			
		}
	
	}),

);