<?php
	
return array(
    
    // Lista categorie
    'GET /cms/categories' => array('name' => 'cat_list', 'before' => 'auth', 'do' => function() {
       
        $title = Lang::line('cms::menu.categories') . ' | ' . Config::get('cms::cms.name');

        $search = false;
        $view = 'cms::pages/categories_list';
        $value = DB::table('categories')->get();
		
        //Creo la vista di pagina (/views/pages)
        $page = View::make($view);
		$page->bind('value', $value);        
        $page->bind('h2', Lang::line('cms::title.categories')->get(Session::get('LANG_KEY')));
		
        //Creo container al quale passo titolo, form ricerca(si/no) e vista di pagina
        $view = View::of_cms()->bind('title', $title);
        $view->container = View::make('cms::partials/container', array('search' => $search, 'content' => $page));
            
        return $view;
    
    }),
    
    
    // Nuova categoria
    'GET /cms/categories/new' => array('name' => 'cat_new', 'before' => 'auth', 'do' => function() {
       
        $title = Lang::line('cms::menu.categories') . ' | ' . Config::get('cms::cms.name');
            
        //Nuova categoria
        $search = false;
        $view = 'cms::pages/categories_new';
        $value = 'new';
        $option_table = Cms\Table::select_table();
        $option_top = Cms\Category::select_top_cat();
		
        //Creo la vista di pagina (/views/pages)
        $page = View::make($view);
		$page->bind('value', $value);
        $page->bind('h2', Lang::line('cms::title.categories_new')->get(Session::get('LANG_KEY')));
        $page->bind('option_table', $option_table);
        $page->bind('option_top', $option_top);
        $page->bind('errors', Session::get('errors'));
		
        //Creo container al quale passo titolo, form ricerca(si/no) e vista di pagina
        $view = View::of_cms()->bind('title', $title);
        $view->container = View::make('cms::partials/container', array('search' => $search, 'content' => $page));
            
        return $view;
    
    }),
    
    // POST Nuova categoria
    'POST /cms/categories/new' => array('before' => 'auth, csrf', 'do' => function() {
        
        //Imposto regole di lavidazione
        $rules = array(
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories'
        );
        
        $messages = array(
            'required' => 'Questo campo è obbligatorio.',
            'unique' => 'Questo dato è già esistente',
        );
        
        //Confronto regole impostate con input $_POST arrivato dal form
        $validator = Validator::make(Input::get(), $rules, $messages);            
        
        //Se la validazione non passa, torno al form portandomi dietro l'array error con gli errori
        if ( ! $validator->valid())
        {
            return Redirect::to_cat_new()->with('errors', $validator->errors);
        }
        
        $newwin = Input::get('new_window');
        if(!isset($newwin)) $newwin = '0';
        
        //Istanzio oggetto model
        $category = new Cms\Category;
        
        //Passo attributi ricevuti dal form al Model
        $category->fill(array(
                          'name' => Input::get('name'),
                          'slug' => Input::get('slug'),
                          'top_id' => Input::get('top_id'),
                          'redirect' => Input::get('redirect'),
                          'new_window' =>  $newwin,
                          'is_menu' => Input::get('is_menu'),
                          'order_id' => Input::get('order_id'),
                          'view_id' => Input::get('view_id'),
                          ));
        //Salvo
        $category->save();
        
        return Redirect::to_cat_list();
    }),
    
    // Modifica categoria
    'GET /cms/categories/mod/(:num)' => array('name' => 'cat_mod', 'before' => 'auth', 'do' => function($catid) {
       
        $title = Lang::line('cms::menu.categories') . ' | ' . Config::get('cms::cms.name');
            
        //Modifica categoria
        $search = false;
        $view = 'cms::pages/categories_edit';
        $value = 'edit';
		
        //Creo la vista di pagina (/views/pages)
        $page = View::make($view);
		$page->bind('value', $value);
        $page->bind('h2', Lang::line('cms::title.categories')->get(Session::get('LANG_KEY')));
		
        //Creo container al quale passo titolo, form ricerca(si/no) e vista di pagina
        $view = View::of_cms()->bind('title', $title);
        $view->container = View::make('cms::partials/container', array('search' => $search, 'content' => $page));
            
        return $view;
    
    }),
    
    // Modifica categoria
    'GET /cms/categories/del/(:num)' => array('name' => 'cat_del', 'before' => 'auth', 'do' => function($catid) {
       
        $title = Lang::line('cms::menu.categories') . ' | ' . Config::get('cms::cms.name');
            
        //Modifica categoria
        $search = false;
        $view = 'cms::pages/categories_edit';
        $value = 'edit';
		
        //Creo la vista di pagina (/views/pages)
        $page = View::make($view);
		$page->bind('value', $value);
        $page->bind('h2', Lang::line('cms::title.categories')->get(Session::get('LANG_KEY')));
		
        //Creo container al quale passo titolo, form ricerca(si/no) e vista di pagina
        $view = View::of_cms()->bind('title', $title);
        $view->container = View::make('cms::partials/container', array('search' => $search, 'content' => $page));
            
        return $view;
    
    }),
    
);