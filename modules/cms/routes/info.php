<?php
	
return array(
    
    'GET /cms/info' => array('name' => 'info_list', 'before' => 'auth', 'do' => function() {
       
        $title = Lang::line('cms::menu.info') . ' | ' . Config::get('cms::cms.name');
		$search = false;
		$test = $title;
        
        $page = View::make('cms::pages/info_list');
		$page->bind('test', $test);
		$page->bind('h2', Lang::line('cms::title.info')->get(Session::get('LANG_KEY')));
		
        $view = View::of_cms()->bind('title', $title);
        $view->container = View::make('cms::partials/container', array('search' => $search, 'content' => $page));
            
        return $view;
    
    }),        
);