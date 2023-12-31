@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Cập nhật menu</h3>
			</div>

			<!-- <div class="title_right">
				<div class="col-md-5 col-sm-5 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div> -->
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12  ">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-bars"></i> Menu</h2>
						<ul class="nav navbar-right panel_toolbox">
							<a href="{{URL::to('/admin/list-menus')}}" class="btn btn-primary btn-sm"> Quay lại </a>
							<!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
							</li> -->
						</ul>
						<div class="clearfix"></div>
					</div>

                    @foreach($edit_menus as $key => $edit_value)
					<div class="x_content">
						<form class="" enctype="multipart/form-data" 
                        action="{{URL::to('/admin/update-menus/'.$edit_value->id)}}"
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
                                        @foreach($edit_menus_vn as $key => $edit_value2)
										<!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
							</p> -->
										<span class="section">Thông tin chi tiết</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tên menu<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="slug" onkeyup="ChangeToSlug();" 
                                                value="{{$edit_value2->name}}" data-validate-length-range="6"
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
                                                <br>
												<img src="{{URL::to('public/backend/uploads/menus/'.$edit_value->icon)}}"
													height="100" width="100">
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="convert_slug" 
                                                value="{{$edit_value2->seo_name}}" data-validate-length-range="6"
													data-validate-words="2" name="seo_name" required="required" />
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

										<input type="hidden" class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="root_id" required="required" />
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Chọn menu
												cha</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="parent_id" class="select2_group form-control">
                                                    <!-- nếu là danh mục cha -->
													@if($edit_value->parent_id == 0)
													    <option selected value="0">Menu cha</option>
                                                        <!-- danh sách các danh mục khác -->
														<optgroup label="Menu cấp 1"></optgroup>
														@foreach($menus as $key => $menu)
															@if($menu->parent_id == 0)
																<option style="color: red;" value="{{$menu->id}}">Cấp 1. {{$menu->name}}</option>
															@endif
														@endforeach
														<optgroup label="Menu cấp 2"></optgroup>
														@foreach($menus as $key => $menu)
                                                            @if($menu->parent_id != 0)
                                                                @foreach($menus as $key => $grand_menu)
                                                                    @if($menu->parent_id == $grand_menu->id)
                                                                        @foreach($menus as $key => $parent_menu)
                                                                            @if($menu->parent_id == $parent_menu->id)
                                                                                @if($parent_menu->parent_id == 0)
                                                                                    <option style="color: green" value="{{$menu->id}}">Cấp 2. {{$menu->name}}
                                                                                    </option>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
														@endforeach
                                                    @else
                                                        <option value="0">Menu cha</option>
                                                        <optgroup label="Menu cấp 1"></optgroup>
                                                        @foreach($menus as $key => $menu)
															@if($menu->parent_id == 0)
                                                                @if($edit_value->parent_id == $menu->id)
																    <option selected style="color: red;" value="{{$menu->id}}">Cấp 1. {{$menu->name}}</option>
                                                                @else
                                                                <option style="color: red;" value="{{$menu->id}}">Cấp 1. {{$menu->name}}</option>
                                                                @endif
                                                            @endif
														@endforeach
                                                        <optgroup label="Menu cấp 2"></optgroup>
                                                        @foreach($menus as $key => $menu)
                                                            @foreach($menus_2_3 as $key => $menu2_3)
                                                                @if($menu2_3->parent_id == $menu->id && $menu->parent_id == 0)
                                                                    @if($edit_value->parent_id == $menu2_3->id)
                                                                        <option selected style="color: green" value="{{$menu2_3->id}}">Cấp 2. {{$menu2_3->name}}</option>
                                                                    @else
                                                                        <option  style="color: green" value="{{$menu2_3->id}}">Cấp 2. {{$menu2_3->name}}
                                                                        </option>
                                                                    @endif
                                                                @endif  
                                                            @endforeach
                                                        @endforeach
                                                    @endif


														
												</select>
											</div>
										</div>

										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Chọn kiểu dữ liệu</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="type" class="form-control">
													@if($edit_value->type == 0){
														<option selected value="0">Trang chủ</option>
														<option value="10">Giới thiệu</option>
														<option value="1">Sản phẩm</option>
														<option value="2">Tin tức</option>
														<option value="3">Banner</option>
														<option value="4">Danh mục banner</option>
														<option value="5">Danh mục tin tức</option>
														<option value="6">Danh mục sản phẩm</option>
														<option value="20">Liên hệ</option>
													}
													@elseif($edit_value->type == 1){
														<option value="0">Trang chủ</option>
														<option value="10">Giới thiệu</option>
														<option selected value="1">Sản phẩm</option>
														<option value="2">Tin tức</option>
														<option value="3">Banner</option>
														<option value="4">Danh mục banner</option>
														<option value="5">Danh mục tin tức</option>
														<option value="6">Danh mục sản phẩm</option>
														<option value="20">Liên hệ</option>
													}
													@elseif($edit_value->type == 2){
														<option value="0">Trang chủ</option>
														<option value="10">Giới thiệu</option>
														<option  value="1">Sản phẩm</option>
														<option selected value="2">Tin tức</option>
														<option value="3">Banner</option>
														<option value="4">Danh mục banner</option>
														<option value="5">Danh mục tin tức</option>
														<option value="6">Danh mục sản phẩm</option>
														<option value="20">Liên hệ</option>
													}
													@elseif($edit_value->type == 3){
														<option value="0">Trang chủ</option>
														<option value="10">Giới thiệu</option>
														<option  value="1">Sản phẩm</option>
														<option value="2">Tin tức</option>
														<option selected value="3">Banner</option>
														<option value="4">Danh mục banner</option>
														<option value="5">Danh mục tin tức</option>
														<option value="6">Danh mục sản phẩm</option>
														<option value="20">Liên hệ</option>
													}
													@elseif($edit_value->type == 4){
														<option value="0">Trang chủ</option>
														<option value="10">Giới thiệu</option>
														<option  value="1">Sản phẩm</option>
														<option value="2">Tin tức</option>
														<option value="3">Banner</option>
														<option selected value="4">Danh mục banner</option>
														<option value="5">Danh mục tin tức</option>
														<option value="6">Danh mục sản phẩm</option>
														<option value="20">Liên hệ</option>
													}
													@elseif($edit_value->type == 5){
														<option value="0">Trang chủ</option>
														<option value="10">Giới thiệu</option>
														<option  value="1">Sản phẩm</option>
														<option value="2">Tin tức</option>
														<option value="3">Banner</option>
														<option value="4">Danh mục banner</option>
														<option selected value="5">Danh mục tin tức</option>
														<option value="6">Danh mục sản phẩm</option>
														<option value="20">Liên hệ</option>
													}
													@elseif($edit_value->type == 10){
														<option value="0">Trang chủ</option>
														<option selected value="10">Giới thiệu</option>
														<option value="1">Sản phẩm</option>
														<option value="2">Tin tức</option>
														<option value="3">Banner</option>
														<option value="4">Danh mục banner</option>
														<option value="5">Danh mục tin tức</option>
														<option value="6">Danh mục sản phẩm</option>
														<option value="20">Liên hệ</option>
													}
													@elseif($edit_value->type == 20){
														<option value="0">Trang chủ</option>
														<option selected value="10">Giới thiệu</option>
														<option value="1">Sản phẩm</option>
														<option value="2">Tin tức</option>
														<option value="3">Banner</option>
														<option value="4">Danh mục banner</option>
														<option value="5">Danh mục tin tức</option>
														<option value="6">Danh mục sản phẩm</option>
														<option selected value="20">Liên hệ</option>
													}
													@else
													{
														<option value="0">Trang chủ</option>
														<option value="10">Giới thiệu</option>
														<option value="1">Sản phẩm</option>
														<option value="2">Tin tức</option>
														<option value="3">Banner</option>
														<option value="4">Danh mục banner</option>
														<option value="5">Danh mục tin tức</option>
														<option selected value="6">Danh mục sản phẩm</option>
														<option value="20">Liên hệ</option>
													}
													@endif
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Chọn kiểu menu</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="is_folder" class="form-control">
													@if($edit_value->is_folder == 1){
														<option value="0">Menu liên kết</option>
														<option selected value="1">Menu thư mục</option>
													}
													@else{
														<option selected value="0">Menu liên kết</option>
														<option  value="1">Menu thư mục</option>
													}
													@endif
												</select>
												
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Kiểu hiển
												thị</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="is_horizontal" class="form-control">
													@if($edit_value->is_horizontal == 1){
													<option  value="0">Menu bình thường</option>
													<option selected value="1">Các menu con hiển thị theo hàng ngang</option>
													}
													@else{
														<option selected value="0">Menu bình thường</option>
														<option value="1">Các menu con hiển thị theo hàng ngang</option>
													}
													@endif
												</select>
												
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Kiểu hoạt
												động</label>
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
										@foreach($edit_menus_en as $key => $edit_value2)
										<span class="section">Details</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Menu
												Name<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="slug2" onkeyup="ChangeToSlug();" 
                                                value="{{$edit_value2->name}}" data-validate-length-range="6"
													data-validate-words="2" name="name2"
													placeholder="ex: Homepage Banner" required="required" />
											</div>
										</div>
										

										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" id="convert_slug2" 
                                                value="{{$edit_value2->seo_name}}" data-validate-length-range="6"
													data-validate-words="2" name="seo_name2" required="required" />
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
									<button type='submit' name="save_menus"
										class="btn btn-primary btn-sm">Cập nhật</button>
									<button type='reset' class="btn btn-success btn-sm">Tạo lại</button>
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