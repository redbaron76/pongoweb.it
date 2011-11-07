<?php

class Utility {
        
        /**
        * Generate classes on element if slug matched.
        *
        * @param  string  $slug | url to compare
        * @param  array   $attributes | class to print if matched
        * @return string
        */
        public static function urlactive($slug, $attributes = array())
        {        
            $url = $_SERVER['REQUEST_URI'];
            $url = str_replace(Config::get('cms::cms.path'),'',$url);
            //if($slug == $url) return HTML::attributes($attributes);
            if(substr_count($url,$slug)>0) return HTML::attributes($attributes);
        }

}