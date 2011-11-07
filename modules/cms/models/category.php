<?php
    
namespace Cms;
use \Eloquent;

class Category extends Eloquent {
    public static $timestamps = true;
    
    public static function select_top_cat() {
        
        $cats = array(0 => 'CATEGORIA PRINCIPALE');
        
        foreach (self::all() as $cat) {
            $cats[$cat->id] = $cat->name;
        }
        
        return $cats;
    }
    
}