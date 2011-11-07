<?php
	
return array(
    
    'GET /cms/banner' => array('name' => 'banner_list', 'before' => 'auth', 'do' => function() {
       
        $title = Lang::line('cms::menu.banner') . ' | ' . Config::get('cms::cms.name');
		$search = false;
		$test = $title;
        
        $page = View::make('cms::pages/banner_list');
		$page->bind('test', $test);
		$page->bind('h2', Lang::line('cms::title.banner')->get(Session::get('LANG_KEY')));
		
        $view = View::of_cms()->bind('title', $title);
        $view->container = View::make('cms::partials/container', array('search' => $search, 'content' => $page));
            
        return $view;
    
    }),        
);