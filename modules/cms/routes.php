<?php
	
return array(
		
		// CREATE CMS Admin user
		'GET /cms/setup' => array('name' => 'setup', 'before' => 'logged', 'do' => function()
		{		
			
			$user = Cms\User::where('is_admin', '=', 1)->first();
			if(!isset($user)) $user = new Cms\User;
			$user->email = Config::get('cms::cms.admin_login');
			$user->password = Hash::make(Config::get('cms::cms.admin_password'));
			$user->username = Config::get('cms::cms.admin_login');
			$user->is_admin = 1;
			$user->save();		
			return Redirect::to_login();
			//print_r($user);
		}),
		
		//CMS Home Page
		'GET /cms' => array('name' => 'login', 'before' => 'logged', 'do' => function()
		{
			$title = 'Esegui il login';
			
			$view = View::of_cms()
                ->bind('title', $title)
                ->bind('container', '');
                
			return $view;
		}),
		
        
		/*
        |--------------------------------------------------------------------------
        | Authentication Routes
        |--------------------------------------------------------------------------
        */
        
        //CMS Login POST
        'POST /cms/login' => array('after' => 'credentials', function()
        {
            //Se autorizzato, vado a Info
            if (Auth::login(Input::get('email'), Input::get('password'))) {
                return Redirect::to_info_list();
            //Se non autorizzato, torno al login con errore
            } else {
                return Redirect::to_login()->with('error_login', Lang::line('cms::cms.loginfailed'));
            }            
            
        }),
        
        //CMS Logout
        'GET /cms/logout' => array('name' => 'logout', function()
        {
            Auth::logout();            
            return Redirect::to_login();
        }),
	
);