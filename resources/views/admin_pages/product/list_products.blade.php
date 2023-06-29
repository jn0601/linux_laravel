@extends('admin_layout')
@section('admin_content')

<div class="banner_categories_height" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Danh sách <small>Sản phẩm</small></h3>
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
            <h2>Danh sách sản phẩm</h2>
            <ul class="nav navbar-right panel_toolbox">
              <!-- <a href="#" class="btn btn-success"> Lưu</a>
              <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá</a> -->
              <a href="#" class="btn btn-success"> Lưu </a>
              <a href="{{URL::to('/add-products')}}" class="btn btn-primary"> Thêm sản phẩm </a>
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
                  <th>Hình ảnh</th>
                  <th>Tên sản phẩm</th>
                  <th>Thuộc danh mục</th>
                  <!-- <th>Tiêu biểu</th> -->
                  <th>Hoạt động</th>
                  <th>Hiển thị</th>
                  <th>Chỉnh sửa </th>
                </tr>
              </thead>
              <tbody>
                @foreach($list_product as $key => $product)
                <tr>
                  <td>
                    <div class=" display_order col-md-6 col-sm-6" style="max-width: 70px; width: 70px; padding: 0;">
                      <input class="form-control" name="name" data-validate-words="2" name="display_order"
                        value="{{$product->display_order}}" />
                    </div>
                  </td>
                  <td>
                    <img src="public/backend/uploads/products/{{ $product->image }}" height="auto"
                      width="80">
                  </td>
                  <td>
                    <a>{{ $product->name }}</a>
                    <br />
                    <!-- <small>Created 01.01.2015</small> -->
                  </td>
                  
                  <td class="project_progress">
                    <!-- duyệt table phụ -->
                    @foreach($product_cate as $key => $sub_cate)
                      <!-- nếu tìm thấy id product -->
                      @if($sub_cate->product_id == $product->id)
                      <!-- tìm tên danh mục ở table danh mục -->
                        @foreach($list_product_cate as $key => $cate)
                          @if($cate->id == $sub_cate->category_id)
                            <span style="color: green">- {{$cate->name}}</span><br>
                          @endif
                      @endforeach
                      @endif
                    @endforeach
                  </td>
                  <td><span class="text-ellipsis">
                      <?php if ($product->status == 1) { ?>
                      <a href="{{URL::to('/unactive-product-status/'.$product->id)}}"><span class="fa fa-toggle-on"
                          style="font-size: 25px;"></span></a>
                      <?php } else { ?>
                      <a href="{{URL::to('/active-product-status/'.$product->id)}}"><span class="fa fa-toggle-off"
                          style="font-size: 25px;"></span></a>
                      <?php } ?>
                    </span>
                  </td>
                  <td><span class="text-ellipsis">
                      <?php if ($product->display_menu == 1) { ?>
                      <a href="{{URL::to('/unactive-product-display-menu/'.$product->id)}}"><span
                          class="fa fa-toggle-on" style="font-size: 25px;"></span></a>
                      <?php } else { ?>
                      <a href="{{URL::to('/active-product-display-menu/'.$product->id)}}"><span
                          class="fa fa-toggle-off" style="font-size: 25px;"></span></a>
                      <?php } ?>
                    </span>
                  </td>
                  <td>
                    <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                    <a href="{{URL::to('/edit-products/'.$product->id)}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                      href="{{URL::to('/delete-products/'.$product->id)}}"
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
      {!!$list_product->links()!!}
    </div>
  </div>
</div>
</div>

@endsection