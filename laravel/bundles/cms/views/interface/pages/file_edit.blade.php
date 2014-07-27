<div class="row">
	<div class="span1">
		@if (MEDIA_TYPE($file_ext) == 'img')
		<a href="{{$file_path}}" class="thumbnail fancy" rel="tooltip" data-original-title="{{$file_name}}">							
			<img src="{{$file_thumb}}" width="50" heigth="50" alt="">							
		</a>
		@else
		<a href="{{$file_path}}" class="thumbnail" rel="tooltip" data-original-title="{{$file_name}}">							
			<img src="/bundles/cms/img/{{$file_ext}}_ico.png" width="100" heigth="100" alt="">							
		</a>
		@endif
	</div>
	<div class="span9">
		<h2>{{$title}}</h2>
		{{$file_name}}
	</div>	
	<div class="span2">
		<a href="{{action('cms::file')}}" class="btn btn-inverse pull-right">
			<i class="icon-arrow-left icon-white"></i>
			{{LL('cms::button.back', CMSLANG)}}
		</a>
	</div>
</div>

<div class="row space">
	<div class="span12">

		<div class="row">
			<div class="span2 side tabbable tabs-left">
				
				<ul class="nav nav-tabs">
					<li class="active"><a href="#text" data-toggle="tab">{{LL('cms::form.texts', CMSLANG)}}</a></li>
					<li><a href="#available" data-toggle="tab">{{LL('cms::form.available', CMSLANG)}}</a></li>
					<li><a href="#filename" data-toggle="tab">{{LL('cms::form.filename', CMSLANG)}}</a></li>
				</ul>

			</div>
			<div class="span10 body">
				
				<div class="tab-content">

					<!-- TEXTS FORM TAB -->
					<div class="tab-pane active" id="text">
						@if($is_image)
							{{Form::open(action('cms::ajax_file@save_image_text'), 'POST', array('class' => 'form-vertical', 'id' => 'form_text')) . "\n"}}
							{{Form::hidden('file_id', $file_id, array('class' => 'file_id')) . "\n"}}
								<fieldset>

									<legend>{{LL('cms::form.file_texts_legend', CMSLANG)}}</legend>

									<div class="control-group" rel="filetext_alt">
										{{Form::label('lang', LL('cms::form.select_lang', CMSLANG), array('class' => 'control-label')) . "\n"}}
										<div class="controls">
											{{Form::select('file_lang', $langs, LANG, array('class' => 'lang', 'id' => 'file_lang'))}}
										</div>
									</div>

									<div class="control-group" rel="filetext_alt">
										{{Form::label('filetext_alt', LL('cms::form.filetext_alt', CMSLANG), array('class' => 'control-label')) . "\n"}}
										<div class="controls">
											{{Form::textarea('filetext_alt', $filetext_alt, array('class' => 'span6', 'id' => 'filetext_alt', 'rows' => 3)) . "\n"}}
										</div>
									</div>

									<div class="control-group" rel="filetext_title">
										{{Form::label('filetext_title', LL('cms::form.filetext_title', CMSLANG), array('class' => 'control-label')) . "\n"}}
										<div class="controls">
											{{Form::textarea('filetext_title', $filetext_title, array('class' => 'span6', 'id' => 'filetext_title', 'rows' => 3)) . "\n"}}
										</div>
									</div>

									<div class="form-actions">
										<a href="#" class="btn btn-success save_form" rel="form_text">
											<i class="icon-ok icon-white"></i>
											{{LL('cms::button.save_continue', CMSLANG)}}
										</a>
										<a href="{{action('cms::file')}}" class="btn btn-danger save_form" rel="form_text">
											<i class="icon-ok icon-white"></i>
											{{LL('cms::button.save_exit', CMSLANG)}}
										</a>
										<a href="{{action('cms::file')}}" class="btn">
											<i class="icon-remove"></i>
											{{LL('cms::button.page_exit', CMSLANG)}}
										</a>
									</div>

								</fieldset>
							{{Form::close()}}
						@else
							{{Form::open(action('cms::ajax_file@save_file_text'), 'POST', array('class' => 'form-vertical', 'id' => 'form_text')) . "\n"}}
							{{Form::hidden('file_id', $file_id, array('class' => 'file_id')) . "\n"}}
								<fieldset>

									<legend>{{LL('cms::form.file_texts_legend', CMSLANG)}}</legend>

									<div class="control-group" rel="filetext_alt">
										{{Form::label('lang', LL('cms::form.select_lang', CMSLANG), array('class' => 'control-label')) . "\n"}}
										<div class="controls">
											{{Form::select('file_lang', $langs, LANG, array('class' => 'lang', 'id' => 'file_lang'))}}
										</div>
									</div>

									<div class="control-group" rel="filetext_alt">
										{{Form::label('filetext_label', LL('cms::form.filetext_label', CMSLANG), array('class' => 'control-label')) . "\n"}}
										<div class="controls">
											{{Form::text('filetext_label', $filetext_label, array('class' => 'span6', 'id' => 'filetext_label', 'rows' => 3)) . "\n"}}
										</div>
									</div>

									<div class="control-group" rel="filetext_title">
										{{Form::label('filetext_title', LL('cms::form.filetext_title', CMSLANG), array('class' => 'control-label')) . "\n"}}
										<div class="controls">
											{{Form::textarea('filetext_title', $filetext_title, array('class' => 'span6', 'id' => 'filetext_title', 'rows' => 3)) . "\n"}}
										</div>
									</div>

									<div class="form-actions">
										<a href="#" class="btn btn-success save_form" rel="form_text">
											<i class="icon-ok icon-white"></i>
											{{LL('cms::button.save_continue', CMSLANG)}}
										</a>
										<a href="{{action('cms::file')}}" class="btn btn-danger save_form" rel="form_text">
											<i class="icon-ok icon-white"></i>
											{{LL('cms::button.save_exit', CMSLANG)}}
										</a>
										<a href="{{action('cms::file')}}" class="btn">
											<i class="icon-remove"></i>
											{{LL('cms::button.page_exit', CMSLANG)}}
										</a>
									</div>

								</fieldset>
							{{Form::close()}}
						@endif
					</div>

					<!-- TEXTS FORM TAB -->
					<div class="tab-pane" id="available">
						{{Form::open(action('cms::ajax_file@save_available'), 'POST', array('class' => 'form-vertical', 'id' => 'form_available')) . "\n"}}
						{{Form::hidden('file_id', $file_id, array('class' => 'file_id')) . "\n"}}
							<fieldset>

								<legend>{{LL('cms::form.file_available_legend', CMSLANG)}}</legend>


									<ul class="unstyled page-list">
										
										<?php $c = 0; ?>

										@forelse($file_pages as $page)

											<?php if($c == 0) $lang = $page->lang; ?>
											<?php
												if($page->lang != $lang) {
											 		$lang = $page->lang;
											 		$c = 0;
											 	}
											?>

											@if($c == 0)										
											<li class="divider">
												<h4>{{CONF('cms::settings.langs', $lang)}}</h4>
											</li>
											@endif


											<li>
												
												<div class="control-group">
													<div class="controls">
														<label class="checkbox">
															<?php 
																if(!empty($page->files)) {															
																	foreach($page->files as $file) {
																		$valid = ($file->pivot->cmsfile_id == $file_id) ? true : false;
																		if($file->pivot->cmsfile_id == $file_id) break;
																	}
																} else {
																	$valid = false;
																}															
															?>
															{{Form::checkbox('page_id[]', $page->id, $valid)}}
															@for ($i=0; $i < substr_count($page->slug, '/') - 1; $i++)
															<i class="icon-chevron-right"></i>
															@endfor
															{{$page->name}}
														</label>
													</div>
												</div>

											</li>
											
											<?php $c++;	?>

										@empty
											<li>{{LL('cms::alert.list_empty', CMSLANG)}}</li>
										@endforelse
									</ul>

								<div class="form-actions">
									<a href="#" class="btn btn-success save_form" rel="form_available">
										<i class="icon-ok icon-white"></i>
										{{LL('cms::button.save_continue', CMSLANG)}}
									</a>
									<a href="{{action('cms::file')}}" class="btn">
										<i class="icon-remove"></i>
										{{LL('cms::button.page_exit', CMSLANG)}}
									</a>
								</div>

							</fieldset>
						{{Form::close()}}
					</div>

					<!-- FILENAME FORM TAB -->
					<div class="tab-pane" id="filename">
						{{Form::open(action('cms::ajax_file@save_filename'), 'POST', array('class' => 'form-vertical', 'id' => 'form_filename')) . "\n"}}
						{{Form::hidden('file_id', $file_id, array('class' => 'file_id')) . "\n"}}
							<fieldset>

								<legend>{{LL('cms::form.file_filename_legend', CMSLANG)}}</legend>

								<div class="control-group" rel="file_name">
									{{Form::label('file_name', LL('cms::form.filename', CMSLANG), array('class' => 'control-label')) . "\n"}}
									<div class="controls">
										{{Form::text('file_name', MEDIA_NOEXT($file_name), array('class' => 'span4', 'id' => 'file_name')) . "\n"}}
										<span class="help-inline">.{{$file_ext}}</span>
									</div>
								</div>

								<div class="form-actions">
									<a href="#" class="btn btn-success save_form" rel="form_filename">
										<i class="icon-ok icon-white"></i>
										{{LL('cms::button.save_continue', CMSLANG)}}
									</a>
									<a href="{{action('cms::file')}}" class="btn">
										<i class="icon-remove"></i>
										{{LL('cms::button.page_exit', CMSLANG)}}
									</a>
								</div>

							</fieldset>
						{{Form::close()}}
					</div>

				</div>

			</div>
		</div>

	</div>
</div>