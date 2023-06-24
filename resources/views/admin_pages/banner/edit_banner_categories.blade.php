@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Cập nhật danh mục</h3>
			</div>

			<div class="title_right">
				<div class="col-md-5 col-sm-5 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
					<div class="col-md-12 col-sm-12  ">
						<div class="x_panel">
						<div class="x_title">
							<h2><i class="fa fa-bars"></i> Danh mục <small>Banner</small></h2>
							<ul class="nav navbar-right panel_toolbox">
							<a href="{{URL::to('/list-banner-categories')}}" class="btn btn-primary"> Quay lại </a>
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="#">Settings 1</a>
									<a class="dropdown-item" href="#">Settings 2</a>
								</div>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tiếng Việt</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tiếng Anh</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
							</li> -->
							</ul>
							<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="x_content">
								@foreach($edit_banner_categories as $key => $edit_value)
								@if (count($edit_banner_categories_vn) != 0)
									@foreach($edit_banner_categories_vn as $key => $edit_value2)
									<form class="" action="{{URL::to('/update-banner-categories/'.$edit_value->id)}}" method="post" novalidate>
										{{ csrf_field() }}
										<!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
										</p> -->
										<span class="section">Thông tin chi tiết</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tên danh mục<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->name}}" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="vd: Banner trang chủ" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Mô tả<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor1" rows="8" required="required"  name='desc'>{{$edit_value2->desc}}</textarea></div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Nội dung<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor2" rows="10" required="required"  name='content'>{{$edit_value2->content}}</textarea></div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->seo_name}}" data-validate-length-range="6" data-validate-words="2" name="seo_name"  required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tags<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->tags}}" data-validate-length-range="6" data-validate-words="2" name="tags"  required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta title<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_title}}" data-validate-length-range="6" data-validate-words="2" name="meta_title"  required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta description<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_desc}}" data-validate-length-range="6" data-validate-words="2" name="meta_desc"  required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta keyword<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_keyword}}" data-validate-length-range="6" data-validate-words="2" name="meta_keyword"  required="required" />
											</div>
										</div>
										
										
										<div class="ln_solid">
											<div class="form-group">
												<div class="col-md-6 offset-md-3">
													<button type='submit' name="update_banner_categories" class="btn btn-primary">Lưu</button>
													<button type='reset' class="btn btn-success">Tạo lại</button>
												</div>
											</div>
										</div>
									</form>
									@endforeach
								@else
									<form class="" action="{{URL::to('/save-banner-categories-vn-update/'.$edit_value->id)}}" method="post" novalidate>
								{{ csrf_field() }}
								<!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
								</p> -->
								<span class="section">Thông tin chi tiết</span>
								<div class="field item form-group">
									<label class="col-form-label col-md-2 col-sm-2  label-align">Tên danh mục<span class="required">*</span></label>
									<div class="col-md-10 col-sm-10">
										<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="vd: Banner trang chủ" required="required" />
									</div>
								</div>
								<div class="field item form-group">
									<label class="col-form-label col-md-2 col-sm-2  label-align">Mô tả<span class="required">*</span></label>
									<div class="col-md-10 col-sm-10">
										<textarea style="resize: none; width: 100%" id="ckeditor1" rows="8" required="required" name='desc'></textarea></div>
								</div>
								<div class="field item form-group">
									<label class="col-form-label col-md-2 col-sm-2  label-align">Nội dung<span class="required">*</span></label>
									<div class="col-md-10 col-sm-10">
										<textarea style="resize: none; width: 100%" id="ckeditor2" rows="10" required="required" name='content'></textarea></div>
								</div>
								<div class="field item form-group">
									<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span class="required">*</span></label>
									<div class="col-md-10 col-sm-10">
										<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="seo_name"  required="required" />
									</div>
								</div>
								<div class="field item form-group">
									<label class="col-form-label col-md-2 col-sm-2  label-align">Tags<span class="required">*</span></label>
									<div class="col-md-10 col-sm-10">
										<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="tags"  required="required" />
									</div>
								</div>
								<div class="field item form-group">
									<label class="col-form-label col-md-2 col-sm-2  label-align">Meta title<span class="required">*</span></label>
									<div class="col-md-10 col-sm-10">
										<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="meta_title"  required="required" />
									</div>
								</div>
								<div class="field item form-group">
									<label class="col-form-label col-md-2 col-sm-2  label-align">Meta description<span class="required">*</span></label>
									<div class="col-md-10 col-sm-10">
										<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="meta_desc"  required="required" />
									</div>
								</div>
								<div class="field item form-group">
									<label class="col-form-label col-md-2 col-sm-2  label-align">Meta keyword<span class="required">*</span></label>
									<div class="col-md-10 col-sm-10">
										<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="meta_keyword"  required="required" />
									</div>
								</div>



								
								
								
								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 offset-md-3">
										<button type='submit' name="save_banner_categories" class="btn btn-primary">Thêm</button>
										<button type='reset' class="btn btn-success">Tạo lại</button>
									</div>
								</div>
							</form>
								@endif
								@endforeach
								</div>
							</div>




							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<div class="x_content">
								@foreach($edit_banner_categories as $key => $edit_value)
								@if (count($edit_banner_categories_en) != 0)
									@foreach($edit_banner_categories_en as $key => $edit_value2)
									<form class="" action="{{URL::to('/update-banner-categories-en/'.$edit_value->id)}}" method="post" novalidate>
										{{ csrf_field() }}
										<!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
										</p> -->
										<span class="section">Details</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Category Name<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->name}}" data-validate-length-range="6" data-validate-words="2" name="name2" placeholder="vd: Banner trang chủ" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Description<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor3" rows="8" required="required"  name='desc2'>{{$edit_value2->desc}}</textarea></div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Content<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor4" rows="10" required="required"  name='content2'>{{$edit_value2->content}}</textarea></div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->seo_name}}" data-validate-length-range="6" data-validate-words="2" name="seo_name2"  required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tags<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->tags}}" data-validate-length-range="6" data-validate-words="2" name="tags2"  required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta title<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_title}}" data-validate-length-range="6" data-validate-words="2" name="meta_title2"  required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta description<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_desc}}" data-validate-length-range="6" data-validate-words="2" name="meta_desc2"  required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta keyword<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_keyword}}" data-validate-length-range="6" data-validate-words="2" name="meta_keyword2"  required="required" />
											</div>
										</div>
										
										
										<div class="ln_solid">
											<div class="form-group">
												<div class="col-md-6 offset-md-3">
													<button type='submit' name="update_banner_categories_2" class="btn btn-primary">Save</button>
													<button type='reset' class="btn btn-success">Reset</button>
												</div>
											</div>
										</div>
									</form>
									@endforeach

									@else
											<form class="" action="{{URL::to('/save-banner-categories-en-update/'.$edit_value->id)}}" method="post" novalidate>
									{{ csrf_field() }}
									<!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
									</p> -->
									<span class="section">Details</span>
									<div class="field item form-group">
										<label class="col-form-label col-md-2 col-sm-2  label-align">Category Name<span class="required">*</span></label>
										<div class="col-md-10 col-sm-10">
											<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name2" placeholder="ex: Homepage Banner" required="required" />
										</div>
									</div>
									<div class="field item form-group">
										<label class="col-form-label col-md-2 col-sm-2  label-align">Description<span class="required">*</span></label>
										<div class="col-md-10 col-sm-10">
											<textarea style="resize: none; width: 100%" id="ckeditor3" rows="8" required="required" name='desc2'></textarea></div>
									</div>
									<div class="field item form-group">
										<label class="col-form-label col-md-2 col-sm-2  label-align">Content<span class="required">*</span></label>
										<div class="col-md-10 col-sm-10">
											<textarea style="resize: none; width: 100%" id="ckeditor4" rows="10" required="required" name='content2'></textarea></div>
									</div>
									<div class="field item form-group">
										<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span class="required">*</span></label>
										<div class="col-md-10 col-sm-10">
											<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="seo_name2"  required="required" />
										</div>
									</div>
									<div class="field item form-group">
										<label class="col-form-label col-md-2 col-sm-2  label-align">Tags<span class="required">*</span></label>
										<div class="col-md-10 col-sm-10">
											<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="tags2"  required="required" />
										</div>
									</div>
									<div class="field item form-group">
										<label class="col-form-label col-md-2 col-sm-2  label-align">Meta title<span class="required">*</span></label>
										<div class="col-md-10 col-sm-10">
											<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="meta_title2"  required="required" />
										</div>
									</div>
									<div class="field item form-group">
										<label class="col-form-label col-md-2 col-sm-2  label-align">Meta description<span class="required">*</span></label>
										<div class="col-md-10 col-sm-10">
											<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="meta_desc2"  required="required" />
										</div>
									</div>
									<div class="field item form-group">
										<label class="col-form-label col-md-2 col-sm-2  label-align">Meta keyword<span class="required">*</span></label>
										<div class="col-md-10 col-sm-10">
											<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="meta_keyword2"  required="required" />
										</div>
									</div>
									
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 offset-md-3">
											<button type='submit' name="save_banner_categories_2" class="btn btn-primary">Add</button>
											<button type='reset' class="btn btn-success">Reset</button>
										</div>
									</div>
								</form>
								@endif
								@endforeach
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>

@endsection