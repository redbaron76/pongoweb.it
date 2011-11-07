<?php

class Image {
        
        /**
        * Generate a new thumbnail HTML image.
        *
        * @param  string  $url
        * @param  string  $alt
        * @param  array   $attributes
        * @return string
        */
        public static function generate($url, $alt = '', $attributes = array())
        {
                $attributes['alt'] = static::entities($alt);        
                return '<img src="'.URL::to(HTML::entities(URL::to_asset($url))).'"'.HTML::attributes($attributes).'>';
        }

}