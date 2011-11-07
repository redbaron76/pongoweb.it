<?php
    
namespace Cms;
use \Eloquent;

class Table extends Eloquent {
    
    public static $timestamps = false;
    
    public static function select_table() {
        
        $views = array(0 => 'SELEZIONA DALLA LISTA');
        
        foreach (self::all() as $view) {
            $views[$view->id] = $view->name;
        }
        
        return $views;
    }
    
}