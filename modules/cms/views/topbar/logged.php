<?php
    //Obtain actual language
    $langs = Config::get('cms::cms.languages');
    $lang_key = Session::get('LANG_KEY');
    $language = $langs[$lang_key];
?>

<ul class="nav">
    <?php foreach($nav as $url => $label): ?>
    <li<?php echo Utility::urlactive($url,array('class' => 'active')) ?>><a href="<?php echo Config::get('cms::cms.path') . $url ?>"><?php echo $label ?></a></li>
    <?php endforeach ?>
</ul>

<ul class="nav">
    <li class="dropdown" data-dropdown="dropdown">
        <a class="dropdown-toggle" href="#"><?php echo Lang::line('cms::cms.language')->get(Session::get('LANG_KEY')) ?></a>
        <ul class="dropdown-menu">
            <?php foreach($languages as $url => $label): ?>
            <li><a href="<?php echo Config::get('cms::cms.path') . '/lang/'. $url ?>"><?php echo $label ?></a></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li><span class="label warning"><?php echo $language ?></span></li>
</ul>

<ul class="nav secondary-nav">
    <li><span class="label"><?php echo Lang::line('cms::cms.user')->get(Session::get('LANG_KEY')) ?></span></li>
    <li class="dropdown" data-dropdown="dropdown">						
        <a class="dropdown-toggle" href="#"><?php echo ucfirst(Session::get('USERNAME')) ?></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo Config::get('cms::cms.path') . '/logout' ?>"><?php echo Lang::line('cms::cms.logout')->get(Session::get('LANG_KEY')) ?></a></li>
        </ul>
    </li>
</ul>       