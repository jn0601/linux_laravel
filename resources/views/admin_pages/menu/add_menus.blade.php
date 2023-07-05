@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Thêm menu</h3>
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
						<h2><i class="fa fa-bars"></i> Menu</h2>
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

					<div class="x_content">
						<form class="" enctype="multipart/form-data" action="{{URL::to('/save-menus')}}"
							method="post" novalidate>
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

										<!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
							</p> -->
										<span class="section">Thông tin chi tiết</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tên menu<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="slug" onkeyup="ChangeToSlug();" data-validate-length-range="6"
													data-validate-words="2" name="name" placeholder="vd: CPU AMD"
													required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Icon<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input type="file" class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="img" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="convert_slug" data-validate-length-range="6"
													data-validate-words="2" name="seo_name" required="required" />
											</div>
										</div>
										<input type="hidden" class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="root_id" required="required" />
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Chọn menu
												cha</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="parent_id" class="select2_group form-control">
													<option value="0">Menu cha</option>
													@foreach($list_menus as $key => $menu)
														@if($menu->parent_id == 0)
														<optgroup label="Menu cấp 1"></optgroup>
														<option style="color:red;" value="{{$menu->id}}">Cấp 1. {{$menu->name}}</option>
														@else
															@foreach($list_menus as $key => $grand_menu)
																@if($menu->parent_id == $grand_menu->id)
																	@foreach($list_menus as $key => $parent_menu)
																		@if($menu->parent_id == $parent_menu->id)
																			@if($parent_menu->parent_id == 0)
																			<optgroup label="Menu cấp 2"></optgroup>
																			<option style="color: green" value="{{$menu->id}}">Cấp 2. {{$menu->name}}
																			</option>
																			@endif
																		@endif
																	@endforeach
																@endif
															@endforeach
														@endif
													@endforeach
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Chọn kiểu menu</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="is_folder" class="form-control">
													<option value="0">Menu liên kết</option>
													<option selected value="1">Menu thư mục</option>
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Kiểu hiển
												thị</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="is_horizontal" class="form-control">
													<option selected value="0">Menu bình thường</option>
													<option value="1">Các menu con hiển thị theo hàng ngang</option>
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Kiểu hoạt
												động</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="status" class="form-control">
													<option value="3">Không hoạt động</option>
													<option selected value="1">Hoạt động</option>
												</select>
											</div>
										</div>
										

										<div class="ln_solid"></div>
									</div>
								</div>
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									<div class="x_content">
										
										<span class="section">Details</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Menu
												Name<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="slug2" onkeyup="ChangeToSlug();" data-validate-length-range="6"
													data-validate-words="2" name="name2"
													placeholder="ex: Homepage Banner" required="required" />
											</div>
										</div>
										

										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="convert_slug2" data-validate-length-range="6"
													data-validate-words="2" name="seo_name2" required="required" />
											</div>
										</div>
										

										<div class="ln_solid"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 offset-md-3">
									<button type='submit' name="save_menus"
										class="btn btn-primary">Thêm</button>
									<button type='reset' class="btn btn-success">Tạo lại</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection