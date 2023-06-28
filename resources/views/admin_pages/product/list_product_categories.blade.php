@extends('admin_layout')
@section('admin_content')

<div class="banner_categories_height" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Danh sách <small>Danh mục</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách danh mục sản phẩm</h2>
            <ul class="nav navbar-right panel_toolbox">
              <!-- <a href="#" class="btn btn-success"> Lưu</a>
              <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá</a> -->
              <a href="#" class="btn btn-success"> Lưu </a>
              <a href="{{URL::to('/add-product-categories')}}" class="btn btn-primary"> Thêm danh mục </a>
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
            <table class="list_banners table table-striped projects bulk_action">
              <thead>
                <tr>
                  <th style="width: 14%;">Số thứ tự</th>
                  <th>Tên danh mục</th>
                  <th>Hình ảnh</th>
                  <th>Danh mục cha</th>
                  <th>Tiêu biểu</th>
                  <th>Hoạt động</th>
                  <th>Hiển thị</th>
                  <th>Chỉnh sửa </th>
                </tr>
              </thead>
              <tbody>
                @foreach($list_product_cate as $key => $product_category)
                <tr>
                  <td>
                    <div class=" display_order col-md-6 col-sm-6" style="width: 80px;">
                      <input class="form-control" name="name" data-validate-words="2" name="display_order"
                        value="{{$product_category->display_order}}" />
                    </div>
                  </td>
                  <td>
                    <a>{{ $product_category->name }}</a>
                    <br />
                    <!-- <small>Created 01.01.2015</small> -->
                  </td>
                  <td>
                    <img src="public/backend/uploads/product_categories/{{ $product_category->image }}" height="120"
                      width="200">
                  </td>
                  <td class="project_progress">
                    @if($product_category->parent_id == 0)
                    <span style="color: red"> -----------</span>
                    @else
                      @foreach($product_cate as $key => $sub_cate)
                        @if($sub_cate->id == $product_category->parent_id)
                          <span style="color: green">{{$sub_cate->name}}
                          </span>
                        @else
                          @foreach($product_sub_cate as $key => $sub_cate2)
                            @if($sub_cate2->id == $product_category->parent_id)
                              <span style="color: blue">{{$sub_cate2->name}}
                              </span>
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endif
                  </td>
                  <td><span class="text-ellipsis">
                      <?php if ($product_category->representative == 1) { ?>
                      <a href="{{URL::to('/unactive-representative/'.$product_category->id)}}"><span
                          class="fa fa-toggle-on" style="font-size: 25px;"></span></a>
                      <?php } else { ?>
                      <a href="{{URL::to('/active-representative/'.$product_category->id)}}"><span
                          class="fa fa-toggle-off" style="font-size: 25px;"></span></a>
                      <?php } ?>
                    </span>
                  </td>
                  <td><span class="text-ellipsis">
                      <?php if ($product_category->status == 1) { ?>
                      <a href="{{URL::to('/unactive-status/'.$product_category->id)}}"><span class="fa fa-toggle-on"
                          style="font-size: 25px;"></span></a>
                      <?php } else { ?>
                      <a href="{{URL::to('/active-status/'.$product_category->id)}}"><span class="fa fa-toggle-off"
                          style="font-size: 25px;"></span></a>
                      <?php } ?>
                    </span>
                  </td>
                  <td><span class="text-ellipsis">
                      <?php if ($product_category->display_menu == 1) { ?>
                      <a href="{{URL::to('/unactive-display-menu/'.$product_category->id)}}"><span
                          class="fa fa-toggle-on" style="font-size: 25px;"></span></a>
                      <?php } else { ?>
                      <a href="{{URL::to('/active-display-menu/'.$product_category->id)}}"><span
                          class="fa fa-toggle-off" style="font-size: 25px;"></span></a>
                      <?php } ?>
                    </span>
                  </td>
                  <td>
                    <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                    <a href="{{URL::to('/edit-product-categories/'.$product_category->id)}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa banner này ko?')"
                      href="{{URL::to('/delete-product-categories/'.$product_category->id)}}"
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
  {!!$list_product_cate->links()!!}


</div>

</div>

@endsection