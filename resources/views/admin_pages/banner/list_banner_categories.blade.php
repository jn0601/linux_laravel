@extends('admin_layout')
@section('admin_content')

<div class="banner_categories_height" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Danh sách <small>Danh mục</small></h3>
      </div>

      <!-- <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div> -->
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách danh mục</h2>
            <ul class="nav navbar-right panel_toolbox">
              <!-- <a href="#" class="btn btn-success"> Lưu</a>
              <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá</a> -->
              <a href="#" class="btn btn-success"> Lưu </a>
              <a href="{{URL::to('/add-banner-categories')}}" class="btn btn-primary"> Thêm danh mục </a>
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                    class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
              </li>
              <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> -->
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <!-- <p>Simple table with project listing with progress and editing options</p> -->

            <!-- start project list -->
            <table class="list_banner_categories table table-striped projects bulk_action" id="myTable">
              <thead>
                <tr>
                  <th style="width: 20%;">Số thứ tự</th>
                  <th>Tên danh mục</th>
                  <!-- <th>Mô tả</th> -->
                  <!-- <th>
                    <input type="checkbox" id="check-all" class="flat">
                  </th> -->
                  <!-- <th>Hiển thị</th> -->
                  <th style="width: 20%">Chỉnh sửa </th>
                </tr>
              </thead>
              <tbody>
                @foreach($list_banner_categories as $key => $banner_cate)
                <tr>
                  <td>
                    <div class=" display_order col-md-6 col-sm-6" style="width: 80px;">
                      <input class="form-control" name="name" data-validate-words="2" name="display_order"
                        value="{{$banner_cate->display_order}}" />
                    </div>
                  </td>
                  <td>
                    <a>{{ $banner_cate->name }}</a>
                    <br />
                    <!-- <small>Created 01.01.2015</small> -->
                  </td>

                  <td>
                    <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                    <a href="{{URL::to('/edit-banner-categories/'.$banner_cate->id)}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này ko?')"
                      href="{{URL::to('/delete-banner-categories/'.$banner_cate->id)}}"
                      class="btn btn-danger btn-xs btn-sm"><i class="fa fa-trash-o"></i> Xoá</a>
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>
            <!-- end project list -->

          </div>

        </div>
      </div>
    </div>
  </div>
  {{-- {!!$list_banner_categories->links()!!} --}}


</div>

</div>

@endsection