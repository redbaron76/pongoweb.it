<?php

return array(

    'layouts.cms' => array('name' => 'cms', function($view) {
        
        Asset::add('bootstrap', 'css/bootstrap.css');
        Asset::add('custom', 'css/custom.css', 'bootstrap');
        		    
        if(Auth::check()) {
			Asset::add('dropdown', 'js/bootstrap-dropdown.js');
            $topmenu = 'cms::topbar/logged';
            $nav = Config::get('cms::cms.sections');
            $languages = Config::get('cms::cms.languages');
        } else {
            $topmenu = 'cms::topbar/unlogged';
            $nav = null;
            $languages = Config::get('cms::cms.languages');
        }
		
		//Libreria JS del CMS
		Asset::add('cms', 'js/cms.js');
        
        $view->partial('topmenu', $topmenu, array(
												  'nav' => $nav,
												  'languages' => $languages,
												  'error_login' => Session::get('error_login')
												  ));       
        $view->partial('footer', 'cms::partials/footer');
		
		return $view;
        
    }),

);
