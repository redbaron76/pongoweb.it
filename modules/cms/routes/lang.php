<?php

return array(

    'GET /cms/lang/(:any?)' => array('name' => 'lang', 'before' => 'auth', 'do' => function($key = 'it') {
        
        //Assegna nuova lingua e ritorna in pag Info
        Session::put('LANG_KEY', $key);
        return Redirect::to_info_list();
        
    }),
        
        


);