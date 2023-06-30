@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Thêm sản phẩm</h3>
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
						<h2><i class="fa fa-bars"></i> Sản phẩm </h2>
						<ul class="nav navbar-right panel_toolbox">
							<a href="{{URL::to('/list-products')}}" class="btn btn-primary"> Quay lại </a>
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
						<form class="" enctype="multipart/form-data" action="{{URL::to('/save-products')}}"
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
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tên sản phẩm<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="name" placeholder="vd: CPU AMD"
													required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Mã sản phẩm<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="code" placeholder="vd: RX7900xt"
													required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Mô tả<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor1" rows="8"
													required="required" name='desc'></textarea>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Nội dung<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor2" rows="10"
													required="required" name='content'></textarea>
											</div>
										</div>
										<!-- <div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">root_id<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="root_id" required="required" />
											</div>
										</div> -->
										
										<!-- <div class="field item form-group">
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
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Giá gốc<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input type="number" class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="price" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Giá bán<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input type="number" class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="price_sale" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="seo_name" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tags<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="tags" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta title<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="meta_title" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta
												description<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="meta_desc" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta
												keyword<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="meta_keyword" required="required" />
											</div>
										</div>
										<input type="hidden" class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="root_id" required="required" />
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Chọn danh mục
												</label>
											<div class="col-md-10 col-sm-10  ">
												<div class="x_panel">
												  <div class="x_title">
													<h2>Danh sách <small>danh mục</small></h2>
													<ul class="nav navbar-right panel_toolbox">
													  <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
													  </li>
													  <li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
														</li>
													  <li><a class="close-link"><i class="fa fa-close"></i></a>
													  </li>
													</ul>
													<div class="clearfix"></div>
												  </div>
												  <div class="x_content">
								  
													<div class="">
													  <ul class="to_do">
														<label style="font-weight: bold; color: red;">DANH MỤC CẤP 1<span class="required"></span></label>
														@foreach($product_cate_1 as $key => $level1)
														<li>
														  <p>
															<input type="checkbox" name="product_categories[]" value="{{$level1->id}}" class="flat"> {{$level1->name}} </p>
														</li>
														@endforeach
														<label style="font-weight: bold; color: green;">DANH MỤC CẤP 2<span class="required"></span></label>
														@foreach($product_cate_2 as $key => $level2)
														<li>
														  <p>
															<input type="checkbox" name="product_categories[]" value="{{$level2->id}}" class="flat"> {{$level2->name}} </p>
														</li>
														@endforeach
														<label style="font-weight: bold; color: blue;">DANH MỤC CẤP 3<span class="required"></span></label>
														@foreach($product_cate_3 as $key => $level3)
														<li>
														  <p>
															<input type="checkbox" name="product_categories[]" value="{{$level3->id}}" class="flat"> {{$level3->name}} </p>
														</li>
														@endforeach
													  </ul>
													</div>
												  </div>
												</div>
											  </div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Chọn thuộc tính
												</label>
											<div class="col-md-10 col-sm-10  ">
												<div class="x_panel">
												  <div class="x_title">
													<h2>Danh sách <small>thuộc tính</small></h2>
													<ul class="nav navbar-right panel_toolbox">
													  <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
													  </li>
													  <li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
														</li>
													  <li><a class="close-link"><i class="fa fa-close"></i></a>
													  </li>
													</ul>
													<div class="clearfix"></div>
												  </div>
												  <div class="x_content">
								  
													<div class="">
													  <ul class="to_do">
														
														<li>
														  <p>
															<input type="checkbox" name="options[]" value="1" class="flat"> Sản phẩm mới </p>
														</li>
														
														
														<li>
														  <p>
															<input type="checkbox" name="options[]" value="2" class="flat"> Sản phẩm nổi bật </p>
														</li>
														
														<li>
														  <p>
															<input type="checkbox" name="options[]" value="3" class="flat"> Sản phẩm đặc biệt </p>
														</li>

														<li>
															<p>
															  <input type="checkbox" name="options[]" value="4" class="flat"> Sản phẩm hot </p>
														  </li>

														  <li>
															<p>
															  <input type="checkbox" name="options[]" value="5" class="flat"> Sản phẩm khuyến mãi </p>
														  </li>
													  </ul>
													</div>
												  </div>
												</div>
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
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align ">Kiểu hiển
												thị</label>
											<div class="col-md-10 col-sm-10 ">
												<select name="display_menu" class="form-control">
													<option value="0">Ẩn</option>
													<option selected value="1">Hiện</option>
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
											<label class="col-form-label col-md-2 col-sm-2  label-align">Product
												Name<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="name2"
													placeholder="ex: CPU Intel" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label
												class="col-form-label col-md-2 col-sm-2  label-align">Description<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor3" rows="8"
													required="required" name='desc2'></textarea>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Content<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<textarea style="resize: none; width: 100%" id="ckeditor4" rows="10"
													required="required" name='content2'></textarea>
											</div>
										</div>

										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Seo name<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="seo_name2" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Tags<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="tags2" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta title<span
													class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="meta_title2" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta
												description<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="meta_desc2" required="required" />
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2  label-align">Meta
												keyword<span class="required">*</span></label>
											<div class="col-md-10 col-sm-10">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="meta_keyword2" required="required" />
											</div>
										</div>

										<div class="ln_solid"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 offset-md-3">
									<button type='submit' name="save_products"
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