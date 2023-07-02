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
						<h2><i class="fa fa-bars"></i> Danh mục </h2>
						<ul class="nav navbar-right panel_toolbox">
							<a href="{{URL::previous()}}" class="btn btn-primary"> Quay lại </a>
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
									aria-expanded="false"><i class="fa fa-wrench"></i></a>
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

					@foreach($edit_categories as $key => $edit_value)
					<div class="x_content">
						<form class="" enctype="multipart/form-data"
							action="{{URL::to('/update-news-categories/'.$edit_value->id)}}" method="post" novalidate>
							<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
										aria-controls="home" aria-selected="true">Tiếng Việt</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
										aria-controls="profile" aria-selected="false">Tiếng Anh</a>
								</li>
								<!-- <li class="nav-item">
							<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
						</li> -->
							</ul>

							{{ csrf_field() }}
							<div class="tab-content" id="myTabContent">
								@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
								@php
								$message = Session::get('message');
								if($message){
								echo '<span class="text-alert">'.$message.'</span>';
								Session::put('message',null);
								}
								@endphp

								<div class="tab-pane fade show active" id="home" role="tabpanel"
									aria-labelledby="home-tab">
									<div class="x_content">
										@foreach($edit_categories_vn as $key => $edit_value2)
										<span class="section">Thông tin chi tiết</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tên danh mục<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->name}}"
													data-validate-length-range="6" data-validate-words="2" name="name"
													placeholder="vd: CPU AMD" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Mô tả<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor1" rows="8"
													required="required" name='desc'>{{$edit_value2->desc}}</textarea>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Nội dung<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor2" rows="10"
													required="required"
													name='content'>{{$edit_value2->content}}</textarea>
											</div>
										</div>
										<!-- <div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">root_id<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->root_id}}" data-validate-length-range="6"
													data-validate-words="2" name="root_id" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Level<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="level" required="required" />
											</div>
										</div> -->
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Hình ảnh<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input type="file" class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="img" required="required" />
												<br>
												<img src="{{URL::to('public/backend/uploads/news_categories/'.$edit_value->image)}}"
													height="100" width="100">
											</div>
										</div><br>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->seo_name}}"
													data-validate-length-range="6" data-validate-words="2"
													name="seo_name" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tags<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->tags}}"
													data-validate-length-range="6" data-validate-words="2" name="tags"
													required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta title<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_title}}"
													data-validate-length-range="6" data-validate-words="2"
													name="meta_title" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta
												description<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_desc}}"
													data-validate-length-range="6" data-validate-words="2"
													name="meta_desc" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta
												keyword<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_keyword}}"
													data-validate-length-range="6" data-validate-words="2"
													name="meta_keyword" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Chọn danh mục
												cha</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="parent_id" class="form-control">
													<!-- nếu là danh mục cha -->
													@if($edit_value->parent_id == 0)
														<option selected value="0">Danh mục cha</option>
														<!-- danh sách các danh mục khác -->
														<optgroup label="Danh mục cấp 1"></optgroup>
														@foreach($news_cate as $key => $news_category)
															@if($news_category->id != $edit_value->id)
																<option style="color: red;" value="{{$news_category->id}}">Cấp 1. {{$news_category->name}}</option>
															@endif
														@endforeach
														<optgroup label="Danh mục cấp 2"></optgroup>
														@foreach($news_sub_cate as $key => $sub_cate)
															<option style="color: green;" value="{{$sub_cate->id}}">Cấp 2. {{$sub_cate->name}}</option>
														@endforeach
													@else
													<option value="0">Danh mục cha</option>
													<!-- danh sách các danh mục khác -->
													<optgroup label="Danh mục cấp 1"></optgroup>
															<!-- nếu là danh mục cấp 2 hoặc cấp 3 -->
															@foreach($news_cate as $key => $news_category)
																@if($news_category->id == $edit_value->parent_id)
																	<option style="color: red;" selected value="{{$news_category->id}}">Cấp 1. {{$news_category->name}}</option>
																@else
																	<option style="color: red;" value="{{$news_category->id}}">Cấp 1. {{$news_category->name}}</option>
																@endif
															@endforeach
															<optgroup label="Danh mục cấp 2"></optgroup>
															@foreach($news_sub_cate as $key => $sub_cate)
																@if($sub_cate->id == $edit_value->parent_id)
																	<option style="color: green;" selected value="{{$sub_cate->id}}">Cấp 2. {{$sub_cate->name}}</option>
																@else
																	<option style="color: green;" value="{{$sub_cate->id}}">Cấp 2. {{$sub_cate->name}}</option>
																@endif
															@endforeach
													@endif
													
													<!-- <option value="0">Không có danh mục</option> -->
													
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Tiêu biểu</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="representative" class="form-control">
													@if($edit_value->representative == 1){
													<option value="0">Không</option>
													<option selected value="1">Có</option>
													}
													@else{
													<option selected value="0">Không</option>
													<option value="1">Có</option>
													}
													@endif
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Kiểu hoạt động</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="status" class="form-control">
													@if($edit_value->status == 1){
													<option value="3">Không hoạt động</option>
													<option selected value="1">Hoạt động</option>
													}
													@else{
													<option selected value="3">Không hoạt động</option>
													<option value="1">Hoạt động</option>
													}
													@endif
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Kiểu hiển thị</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="display_menu" class="form-control">
													@if($edit_value->display_menu == 1){
													<option value="0">Ẩn</option>
													<option selected value="1">Hiện</option>
													}
													@else{
													<option selected value="0">Ẩn</option>
													<option value="1">Hiện</option>
													}
													@endif
												</select>
											</div>
										</div>

										<div class="ln_solid"></div>
										@endforeach
									</div>
								</div>
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									<div class="x_content">
										@foreach($edit_categories_en as $key => $edit_value2)
										<span class="section">Details</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Category
												Name<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->name}}"
													data-validate-length-range="6" data-validate-words="2" name="name2"
													placeholder="ex: Homepage Banner" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label
												class="col-form-label col-md-2 col-sm-2  label-align">Description<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor3" rows="8"
													required="required" name='desc2'>{{$edit_value2->desc}}</textarea>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Content<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor4" rows="10"
													required="required"
													name='content2'>{{$edit_value2->content}}</textarea>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->seo_name}}"
													data-validate-length-range="6" data-validate-words="2"
													name="seo_name2" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tags<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->tags}}"
													data-validate-length-range="6" data-validate-words="2" name="tags2"
													required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta title<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_title}}"
													data-validate-length-range="6" data-validate-words="2"
													name="meta_title2" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta
												description<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_desc}}"
													data-validate-length-range="6" data-validate-words="2"
													name="meta_desc2" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta
												keyword<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" value="{{$edit_value2->meta_keyword}}"
													data-validate-length-range="6" data-validate-words="2"
													name="meta_keyword2" required="required" />
											</div>
										</div>

										<div class="ln_solid"></div>
										@endforeach
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 offset-md-3">
									<button type='submit' name="save_news_categories" class="btn btn-primary">Cập
										nhật</button>
									<button type='reset' class="btn btn-success">Tạo lại</button>
								</div>
							</div>
						</form>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection