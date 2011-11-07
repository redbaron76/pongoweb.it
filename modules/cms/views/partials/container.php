<div class="content">
	<div class="row page-header">
		<div class="span11">
			<h1><?php echo Config::get('application.name') ?> <small>| <?php echo Lang::line('cms::cms.slogan')->get(Session::get('LANG_KEY')) ?></small></h1>
		</div>
		<?php if($search):?>
		<div class="span5">
			<form>
				<input id="search-input" class="span5" type="text" placeholder="<?php echo Lang::line('cms::cms.searchcontent')->get(Session::get('LANG_KEY')) ?>" />
			</form>
		</div>
		<?php endif; ?>
	</div>
	<div class="row">
		<div class="span16">
			<?php echo $content ?>
		</div>
	</div>
</div>