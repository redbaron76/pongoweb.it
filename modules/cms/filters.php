<?php

return array(
    
    // Se loggato, torna alla pagina Info
    'logged' => function()
	{
		return (Auth::check()) ? Redirect::to_info_list() : null;
	},
	
	// Quando loggato, carico variabili globali in sessione
	'credentials' => function()
	{
		if (Auth::check()) {
			//Save session credentials
			Session::put('EMAIL', Auth::user()->email);
			Session::put('USERNAME', Auth::user()->username);
			Session::put('LANG_KEY', Config::get('application.language'));
		}
	},

);
