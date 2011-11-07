<?php

    $hash = array();
    foreach($value as $object) {
        $hash[$object->id] = array('object' => $object);
    }
    
    //echo print_r($hash,true);
    
    $tree = array();
    foreach($hash as $id => &$node)
    {
        if ($parent = $node['object']->top_id)
            $hash[$parent]['children'][] =& $node;
        else
            $tree[] =& $node;
    }
    unset($node, $hash);
    
    // render tree
    function render_tree($tree)
    {
        foreach($tree as $node)
        {
            render_node($node);
        }
    }
    
    // render tree node
    function render_node($node, $level = 0)
    {
        $tot = 15;
        
        echo '<div class="cat-box span'.($tot-$level).' offset'.$level.'">', "\n";
        echo '<p><strong>' . $node['object']->name . '</strong>';
        if($node['object']->is_menu) echo ' | MENU ';
        echo ' | slug: ' . $node['object']->slug;
        echo '</p>';
        echo '<span><a href="'.URL::to_cat_mod(array($node['object']->id)).'" class="btn small">'. Lang::line('cms::cms.modify')->get(Session::get('LANG_KEY')) .'</a>', "\n";
		echo '<a href="'.URL::to_cat_del(array($node['object']->id)).'" class="btn small danger">'. Lang::line('cms::cms.delete')->get(Session::get('LANG_KEY')) .'</a></span>', "\n";
        echo '</div>', "\n";
        
        if (isset($node['children']))
        {
            foreach($node['children'] as $node)
            {
                render_node($node, $level+1);
            }
        }
    }
    


?>
                    
                    <div class="row">
						<div class="span14">
							<h2><?php echo $h2 ?></h2>
						</div>
						<div class="span2">
							<a href="<?php echo URL::to_cat_new() ?>" class="btn primary pull-right"><?php echo Lang::line('cms::cms.additem')->get(Session::get('LANG_KEY')) ?></a>
						</div>
					</div>
					<div class="row">
						<div class="span16">							
                            <?php render_tree($tree) ?>                            
						</div>
					</div>