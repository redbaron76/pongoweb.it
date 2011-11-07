<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <?php echo Asset::styles(); ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    <?php echo Asset::scripts(); ?>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta charset="utf-8">
</head> 
<body>
    <div class="topbar">
        <div class="fill">
            <div class="container">
                <a class="brand" href="<?php echo Config::get('application.url') . Config::get('cms::cms.path') ?>"><?php echo Config::get('cms::cms.name') ?></a>
                <?php echo $topmenu ?>
            </div>
        </div>
    </div>
    
    <div class="container">
        <?php echo $container ?>
        <?php echo $footer ?>
    </div>
</body> 
</html>