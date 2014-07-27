<div class="row">
	<div class="span10">
		<h2>{{$title}}</h2>
	</div>
	<div class="span2">
		<a href="{{action('cms::gallery')}}" class="btn btn-inverse pull-right">
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
					<li class="active"><a href="#gallery" data-toggle="tab">{{LL('cms::form.gallery', CMSLANG)}}</a></li>
					<li><a href="#order" data-toggle="tab">{{LL('cms::form.gallery_order', CMSLANG)}}</a></li>
				</ul>

			</div>
			<div class="span10 body">
				
				<div class="tab-content">

					<!-- GALLERY FORM TAB -->
					<div class="tab-pane active" id="gallery">

						<legend>{{LL('cms::form.gallery_legend', CMSLANG)}}</legend>

						<div class="row">
							{{Form::open(action('cms::ajax_gallery@save_gallery'), 'POST', array('class' => 'form-vertical', 'id' => 'form_gallery')) . "\n"}}
							{{Form::hidden('gallery_id', $gallery_id, array('class' => 'gallery_id', 'id' => 'gallery_id')) . "\n"}}
							<div class="span4 nobottom">
								
									<fieldset>

										<div class="control-group" rel="gallery_name">
											{{Form::label('gallery_name', LL('cms::form.gallery_name', CMSLANG), array('class' => 'control-label')) . "\n"}}
											<div class="controls">
												{{Form::text('gallery_name', $gallery_name, array('class' => 'span3', 'id' => 'gallery_name')) . "\n"}}
											</div>
										</div>

										<div class="control-group">
											{{Form::label('thumb', LL('cms::form.thumb_type', CMSLANG), array('class' => 'control-label')) . "\n"}}
											<div class="controls">
												{{Form::select('gallery_thumb', $gallery_thumbs, $gallery_thumb)}}
											</div>
										</div>										

									</fieldset>

							</div>
							<div class="span6">
								<h4>{{LL('cms::title.gallery_files', CMSLANG)}}</h4>
								<div class="trans-box hspace loading">
									<table class="table table-striped fixed v-middle listing">
										<col width="15%">
										<col width="75%">
										<col width="10%">
										<tbody>
											@forelse($files->results as $file)
											<tr>
												<td>
													<a href="{{$file->path}}" class="thumbnail fancy" rel="tooltip" data-original-title="{{$file->name}}">							
														<img src="{{$file->thumb}}" width="50" heigth="50" alt="">							
													</a>
												</td>
												<td class="v-middle">{{$file->name}}</td>
												<td>
													<?php 
														if(!empty($files_select)) {															
															foreach($files_select as $image) {
																$valid = ($image->pivot->cmsfile_id == $file->id) ? true : false;
																if($image->pivot->cmsfile_id == $file->id) break;
															}
														} else {
															$valid = false;
														}															
													?>
													{{Form::checkbox('file_id[]', $file->id, $valid)}}
												</td>
											</tr>
											@empty
											<tr>
												<td colspan="3">
													{{LL('cms::alert.list_empty', CMSLANG)}}
												</td>
											</tr>
											@endforelse

											<tr class="navigation">
												<td colspan="3" class="row space">
													<div class="toright">
														{{$files->next()}}
													</div>
												</td>
											</tr>

										</tbody>

									</table>
								</div>
							</div>
							{{Form::close()}}
						</div>
						
						<div class="row">
							<div class="span10">
								<div class="form-actions">
									<a href="#" class="btn btn-success save_form" rel="form_gallery">
										<i class="icon-ok icon-white"></i>
										{{LL('cms::button.save_continue', CMSLANG)}}
									</a>
									<a href="{{action('cms::gallery')}}" class="btn btn-danger save_form" rel="form_gallery">
										<i class="icon-ok icon-white"></i>
										{{LL('cms::button.save_exit', CMSLANG)}}
									</a>
									<a href="{{action('cms::gallery')}}" class="btn">
										<i class="icon-remove"></i>
										{{LL('cms::button.page_exit', CMSLANG)}}
									</a>
								</div>
							</div>
						</div>

					</div>

					<div class="tab-pane" id="order">

						<legend>{{LL('cms::form.gallery_legend_order', CMSLANG)}}</legend>

						<ul class="thumbnails sortable">

						@forelse ($files_select as $file)
							<li class="span1" id="{{$gallery_id}}_{{$file->id}}">
								<a href="{{$file->path}}" class="thumbnail fancy" data-original-title="{{$file->name}}" rel="tooltip">
									<img src="{{$file->thumb}}" width="50" heigth="50" alt="">							
								</a>
							</li>
						@empty
							<li>
								{{LL('cms::alert.list_empty', CMSLANG)}}
							</li>
						@endforelse
	
						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>







