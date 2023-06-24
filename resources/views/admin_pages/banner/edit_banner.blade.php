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
			<div class="col-md-12 col-sm-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Danh mục <small>banner</small></h2>
						<ul class="nav navbar-right panel_toolbox">
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
					@foreach($edit_banner_categories as $key => $edit_value)
						<form class="" action="{{URL::to('/update-banner-categories/'.$edit_value->id)}}" method="post" novalidate>
							{{ csrf_field() }}
							<!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
							</p> -->
							<span class="section">Thông tin chi tiết</span>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Tên danh mục<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" value="{{$edit_value->name}}" name="name" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="vd: Banner trang chủ" required="required" />
								</div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Mô tả<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<textarea required="required" value="{{$edit_value->desc}}" name='desc'></textarea></div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Nội dung<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<textarea required="required" value="{{$edit_value->content}}" name='content'></textarea></div>
							</div>
							<!-- <div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Seo description<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" value="{{$edit_value->banner_categories_seo_desc}}" name="banner_categories_seo_desc" class='optional' name="occupation" data-validate-length-range="5,15" type="text" /></div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Seo keywords<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" value="{{$edit_value->banner_categories_seo_key}}" name="banner_categories_seo_key" class='optional' name="occupation" data-validate-length-range="5,15" type="text" /></div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Seo slug<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" value="{{$edit_value->banner_categories_seo_slug}}" name="banner_categories_seo_slug" id="convert_slug" class='optional' name="occupation" data-validate-length-range="5,15" type="text" /></div>
							</div> -->
							<!-- <div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" name="email" class='email' required="required" type="email" /></div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Confirm email address<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="email" class='email' name="confirm_email" data-validate-linked='email' required='required' /></div>
							</div> -->
							<!-- <div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Number <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="number" class='number' name="number" data-validate-minmax="10,100" required='required'></div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" class='date' type="date" name="date" required='required'></div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Time<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" class='time' type="time" name="time" required='required'></div>
							</div> -->
							
							<!-- <div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="password" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />
									
									<span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
										<i id="slash" class="fa fa-eye-slash"></i>
										<i id="eye" class="fa fa-eye"></i>
									</span>
								</div>
							</div> -->
							
							<!-- <div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Repeat password<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="password" name="password2" data-validate-linked='password' required='required' /></div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" /></div>
							</div> -->
							
							<!-- <div class="form-group row">
								<label class="control-label col-md-3 col-sm-3 ">Kiểu hiển thị</label>
								<div class="col-md-9 col-sm-9 ">
									<select name="banner_categories_status" class="form-control">
										<option value="0">Ẩn</option>
										<option value="1">Hiện</option>
									</select>
								</div>
							</div> -->
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection