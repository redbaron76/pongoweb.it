                    <?php if(isset($errors)):
                        //print_r($errors);
                        if($errors->has('name')) $name_error = $errors->first('name', '<p>:message</p>');
                        if($errors->has('slug')) $slug_error = $errors->first('slug', '<p>:message</p>');
                    endif; ?>
                    
                    <div class="row">
						<div class="span14">
							<h2><?php echo $h2 ?></h2>
						</div>
						<div class="span2">
							<a href="<?php echo URL::to_cat_list() ?>" class="btn primary pull-right"><?php echo Lang::line('cms::cms.back')->get(Session::get('LANG_KEY')) ?></a>
						</div>
					</div>
					<div class="row">
						<div class="span16">							
                            
                            <?php echo Form::open(); ?>
                                <?php echo Form::token(); ?>
								<fieldset>
									<div class="clearfix">
										<?php echo Form::label('name', 'Nome categoria'); ?>
										<div class="input">
											<?php echo Form::text('name', Input::old('name'), array('class' => 'span8'));?>
										</div>
                                        <?php if(isset($name_error)):?>
                                        <div class="alert-message block-message error">
                                            <?php echo $name_error; ?>
                                        </div>
                                        <?php endif;?>
									</div>                                        
									<div class="clearfix">
										<?php echo Form::label('slug', 'Slug'); ?>
										<div class="input">
											<?php echo Form::text('slug', Input::old('slug'), array('class' => 'span8'));?>
										</div>
                                        <?php if(isset($slug_error)):?>
                                        <div class="alert-message block-message error">
                                            <?php echo $slug_error; ?>
                                        </div>
                                        <?php endif;?>
									</div>
									<div class="clearfix">
										<?php echo Form::label('top_id', 'Appartiene alla categoria'); ?>
										<div class="input">
											<?php echo Form::select('top_id',$option_top) ?>
										</div>
									</div>
									<div class="clearfix">
										<?php echo Form::label('view_id', 'Tipo di contenuto'); ?>
										<div class="input">
											<?php echo Form::select('view_id',$option_table) ?>
										</div>
									</div>
									<div class="clearfix">
										<?php echo Form::label('order_id', 'Ordine di visualizzazione'); ?>
										<div class="input">
                                            <?php echo Form::text('order_id', Input::old('order_id', 1000), array('class' => 'span1'));?>
										</div>
									</div>
                                    <div class="clearfix">
                                        <?php echo Form::label('redirect', 'Redirect verso URL'); ?>
										<div class="input">
											<?php echo Form::text('redirect', Input::old('redirect'), array('class' => 'span6', 'placeholder' => 'http://')); ?>
                                            <ul class="inputs-list">
												<li>
													<label>
                                                        <?php echo Form::checkbox('new_window', Input::old('new_window', 0)) ?>
														<span><?php echo Lang::line('cms::cms.newwindow')->get(Session::get('LANG_KEY')) ?></span>
													</label>
												</li>
                                            </ul>
										</div>
                                    </div>
									<div class="clearfix">
										<?php echo Form::label('is_menu', 'Voce del menu principale'); ?>
										<div class="input">
											<ul class="inputs-list">
												<li>
													<label>
                                                        <?php echo Form::radio('is_menu', Input::old('is_menu', 1)) ?>
														<span><?php echo Lang::line('cms::cms.yes')->get(Session::get('LANG_KEY')) ?></span>
													</label>
												</li>
												<li>
													<label>
                                                        <?php echo Form::radio('is_menu', Input::old('new_window', 0), true) ?>
														<span><?php echo Lang::line('cms::cms.no')->get(Session::get('LANG_KEY')) ?></span>
													</label>
												</li>
											</ul>
										</div>
									</div>
									<div class="actions">
                                        <?php echo Form::submit(Lang::line('cms::cms.submit')->get(Session::get('LANG_KEY')), array('class' => 'btn primary')) ?>
                                        <?php echo Form::button(Lang::line('cms::cms.cancel')->get(Session::get('LANG_KEY')), array('class' => 'btn', 'type' => 'reset')) ?>
									</div>
								</fieldset>
							<?php echo Form::close(); ?>
                            
						</div>
					</div>