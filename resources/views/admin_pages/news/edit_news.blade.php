@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Cập nhật tin tức</h3>
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
						<h2><i class="fa fa-bars"></i> Tin tức </h2>
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

					@foreach($edit_news as $key => $edit_value)
					<div class="x_content">
						<form class="" enctype="multipart/form-data"
							action="{{URL::to('/update-news/'.$edit_value->id)}}" method="post" novalidate>
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
										@foreach($edit_news_vn as $key => $edit_value2)
										<span class="section">Thông tin chi tiết</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tên tin tức<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="slug" onkeyup="ChangeToSlug();" value="{{$edit_value2->name}}"
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
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Hình ảnh<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input type="file" class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="img" required="required" />
												<br>
												<img src="{{URL::to('public/backend/uploads/news/'.$edit_value->image)}}"
													height="100" width="100">
											</div>
										</div><br>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="convert_slug" value="{{$edit_value2->seo_name}}"
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
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Chọn danh mục</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="category_id" class="form-control">
													<!-- nếu là không có danh mục -->
													@if($edit_value->category_id == 0)
														<option selected value="0">Không có danh mục</option>
														<!-- danh sách các danh mục khác -->
														<optgroup label="Danh mục cấp 1"></optgroup>
														@foreach($news_lv1 as $key => $lv1)
															@if($lv1->id != $edit_value->id)
																<option style="color: red;" value="{{$lv1->id}}">Cấp 1. {{$lv1->name}}</option>
															@endif
														@endforeach
														<optgroup label="Danh mục cấp 2"></optgroup>
														@foreach($news_lv2 as $key => $lv2)
															<option style="color: green;" value="{{$lv2->id}}">Cấp 2. {{$lv2->name}}</option>
														@endforeach
													@else
													<option value="0">Không có danh mục</option>
													<!-- danh sách các danh mục khác -->
													<optgroup label="Danh mục cấp 1"></optgroup>
															<!-- nếu là danh mục cấp 2 hoặc cấp 3 -->
															@foreach($news_lv1 as $key => $lv1)
																@if($lv1->id == $edit_value->category_id)
																	<option style="color: red;" selected value="{{$lv1->id}}">Cấp 1. {{$lv1->name}}</option>
																@else
																	<option style="color: red;" value="{{$lv1->id}}">Cấp 1. {{$lv1->name}}</option>
																@endif
															@endforeach
															<optgroup label="Danh mục cấp 2"></optgroup>
															@foreach($news_lv2 as $key => $lv2)
																@if($lv2->id == $edit_value->category_id)
																	<option style="color: green;" selected value="{{$lv2->id}}">Cấp 2. {{$lv2->name}}</option>
																@else
																	<option style="color: green;" value="{{$lv2->id}}">Cấp 2. {{$lv2->name}}</option>
																@endif
															@endforeach
                              <optgroup label="Danh mục cấp 3"></optgroup>
															@foreach($news_lv3 as $key => $lv3)
																@if($lv3->id == $edit_value->category_id)
																	<option style="color: blue;" selected value="{{$lv3->id}}">Cấp 3. {{$lv3->name}}</option>
																@else
																	<option style="color: blue;" value="{{$lv3->id}}">Cấp 3. {{$lv3->name}}</option>
																@endif
															@endforeach
													@endif
													
													<!-- <option value="0">Không có danh mục</option> -->
													
												</select>
											</div>
										</div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-2 col-sm-2  label-align ">Chọn thuộc
                          tính
                      </label>
                      <div class="col-md-10 col-sm-10  ">
                          <div class="x_panel">
                              <div class="x_title">
                                  <h2>Danh sách <small>thuộc tính</small></h2>
                                  <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i
                                                  class="fa fa-chevron-down"></i></a>
                                      </li>
                                      <li class="dropdown">
                                          <a href="#" class="dropdown-toggle"
                                              data-toggle="dropdown" role="button"
                                              aria-expanded="false"><i
                                                  class="fa fa-wrench"></i></a>
                                      </li>
                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                  </ul>
                                  <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                  
                                  <div class="">
                                      <ul class="to_do background">
                                          @if (strpos($string_values, '1') !== false)
                                          <li>
                                              <p>
                                                  <input type="checkbox" checked name="options[]"
                                                      value="1" class="flat"> Tin tức mới
                                              </p>
                                          </li>
                                          @else
                                          <li>
                                              <p>
                                                  <input type="checkbox" name="options[]"
                                                      value="1" class="flat"> Tin tức mới
                                              </p>
                                          </li>
                                          @endif

                                          @if (strpos($string_values, '2') !== false)
                                          <li>
                                              <p>
                                                  <input type="checkbox" checked name="options[]"
                                                      value="2" class="flat"> Tin tức nổi bật
                                              </p>
                                          </li>
                                          @else
                                          <li>
                                              <p>
                                                  <input type="checkbox" name="options[]"
                                                      value="2" class="flat"> Tin tức nổi bật
                                              </p>
                                          </li>
                                          @endif

                                          @if (strpos($string_values, '3') !== false)
                                          <li>
                                              <p>
                                                  <input type="checkbox" checked name="options[]"
                                                      value="3" class="flat"> Tin tức đặc biệt
                                              </p>
                                          </li>
                                          @else
                                          <li>
                                              <p>
                                                  <input type="checkbox" name="options[]"
                                                      value="3" class="flat"> Tin tức đặc biệt
                                              </p>
                                          </li>
                                          @endif

                                          @if (strpos($string_values, '4') !== false)
                                          <li>
                                              <p>
                                                  <input type="checkbox" checked name="options[]"
                                                      value="4" class="flat"> Tin tức hot
                                              </p>
                                          </li>
                                          @else
                                          <li>
                                              <p>
                                                  <input type="checkbox" name="options[]"
                                                      value="4" class="flat"> Tin tức hot
                                              </p>
                                          </li>
                                          @endif
                                      </ul>
                                  </div>
                              </div>
                          </div>
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

										<div class="ln_solid"></div>
										@endforeach
									</div>
								</div>
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									<div class="x_content">
										@foreach($edit_news_en as $key => $edit_value2)
										<span class="section">Details</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Category
												Name<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="slug2" onkeyup="ChangeToSlug();" value="{{$edit_value2->name}}"
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
												<input class="form-control" id="convert_slug2" value="{{$edit_value2->seo_name}}"
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
									<button type='submit' name="save_news" class="btn btn-primary">Cập
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