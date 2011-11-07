<ul class="nav">
	<?php if(isset($error_login)): ?>
	<li><span class="label warning"><?php echo $error_login ?></span></li>
	<?php else: ?>
	<li><a href="<?php echo Config::get('application.url') ?>"><?php echo Lang::line('cms::cms.homepage')->get(Session::get('LANG_KEY')) ?></a></li>
	<li class="active"><a href="<?php echo Config::get('application.url') . Config::get('cms::cms.path') ?>"><?php echo Lang::line('cms::cms.loginnow')->get(Session::get('LANG_KEY')) ?></a></li>
	<?php endif; ?>
</ul>
<form action="/cms/login" method="post" class="pull-right">
	<input class="input-medium" type="text" placeholder="<?php echo Lang::line('cms::cms.username')->get(Session::get('LANG_KEY')) ?>" name="email" />
	<input class="input-medium" type="password" placeholder="<?php echo Lang::line('cms::cms.password')->get(Session::get('LANG_KEY')) ?>" name="password" />
	<button class="btn" type="submit"><?php echo Lang::line('cms::cms.enter')->get(Session::get('LANG_KEY')) ?></button>
</form>