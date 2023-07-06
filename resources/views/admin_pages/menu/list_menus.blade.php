@extends('admin_layout')
@section('admin_content')

<div class="banner_categories_height" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Danh sách <small>Menu</small></h3>
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
            <h2>Danh sách Menu</h2>
            <ul class="nav navbar-right panel_toolbox">
              <!-- <a href="#" class="btn btn-success btn-sm"> Lưu</a>
              <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá</a> -->
              <a href="#" class="btn btn-success btn-sm"> Lưu </a>
              <a href="{{URL::to('/admin/add-menus')}}" class="btn btn-primary btn-sm"> Thêm menu </a>
              <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                    class="fa fa-wrench"></i></a>
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
          <div class="x_content">

            <!-- <p>Simple table with project listing with progress and editing options</p> -->

            <!-- start project list -->
            <table class="list_banners table table-striped projects bulk_action" id="myTable">
              <thead>
                <tr>
                  <th style="width: 14%;">Số thứ tự</th>
                  <th>Icon</th>
                  <th>Tên menu</th>
                  <th>Menu cha</th>
                  <th>Hoạt động</th>
                  <th>Chỉnh sửa </th>
                </tr>
              </thead>
              <tbody>
                @foreach($list_menus as $key => $menu)
                <tr>
                  <td>
                    <div class=" display_order col-md-8 col-sm-8" style="max-width: 70px; width: 70px; padding: 0;">
                      <input class="form-control" name="name" data-validate-words="2" name="display_order"
                        value="{{$menu->display_order}}" />
                    </div>
                  </td>
                  <td>
                    <img src="{{URL::to('public/backend/uploads/menus/'.$menu->icon)}}" height="auto"
                      width="80">
                  </td>
                  <td>
                    <a>{{ $menu->name }}</a>
                    <br />
                    <!-- <small>Created 01.01.2015</small> -->
                  </td>
                  
                  <td class="project_progress">
                    <!-- level 1 -->
                    @if($menu->parent_id == 0)
                    <span style="color: red"> -----------</span>
                    <!-- level 2 or 3 -->
                    @else
                      <!-- level 2 -->
                        @foreach($list_menus as $key => $grand_menu)
                          @if($menu->parent_id == $grand_menu->id)
                            @foreach($list_menus as $key => $parent_menu)
                              @if($menu->parent_id == $parent_menu->id)
                                @if($parent_menu->parent_id == 0)
                                <span style="color: green">{{$grand_menu->name}}
                                </span>
                                @else
                                <span style="color: blue">{{$parent_menu->name}}
                                </span>
                                @endif
                              @endif
                            @endforeach
                          @endif
                        @endforeach
                    @endif
                  </td>
                  <td><span class="text-ellipsis">
                      <?php if ($menu->status == 1) { ?>
                      <a href="{{URL::to('/admin/unactive-menus-status/'.$menu->id)}}"><span class="fa fa-toggle-on"
                          style="font-size: 25px;"></span></a>
                      <?php } else { ?>
                      <a href="{{URL::to('/admin/active-menus-status/'.$menu->id)}}"><span class="fa fa-toggle-off"
                          style="font-size: 25px;"></span></a>
                      <?php } ?>
                    </span>
                  </td>
                  <td>
                    <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                    <a href="{{URL::to('/admin/edit-menus/'.$menu->id)}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                      href="{{URL::to('/admin/delete-menus/'.$menu->id)}}"
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
      {{--{!!$list_news_cate->links()!!} --}}
    </div>
  </div>
</div>
</div>

@endsection