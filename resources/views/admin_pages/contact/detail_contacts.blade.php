@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Chi tiết liên hệ</h3>
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
						<h2><i class="fa fa-bars"></i> Liên hệ </h2>
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
						</ul>
						<div class="clearfix"></div>
					</div>

					@foreach($detail_contacts as $key => $detail_value)
					<div class="x_content">
						<div class="col-md-4 col-lg-4 col-sm-5">
							<h2>Tên: {{$detail_value->fullname}}</h2>
							<h2>Địa chỉ: {{$detail_value->address}}</h2>
							<h2>Số điện thoại: {{$detail_value->phone}}</h3>
							<h2>Email: {{$detail_value->email}}</h2>
							<h2>Ngày: {{$detail_value->date_created}}</h2>
						  </div>
						  <div class="col-md-8 col-lg-8 col-sm-7">
							<!-- blockquote -->
							<blockquote>
							<h3>Tiêu đề <br> 
								<cite title="Source Title">{{$detail_value->title}}</cite>
							</h3>
							<h2>Nội dung</h2>
							<p>{{$detail_value->content}}</p>
							</blockquote>
						  </div>
						  <div class="clearfix"></div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection