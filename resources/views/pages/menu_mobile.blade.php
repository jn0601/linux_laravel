@extends('header')
@section('menu_mobile')

<div class="mobile-menu-area">
    <div class="pagewrap">
      <div id="content_menu_mobile">
        <div class="header_mid_mobile flex">
          <div class="header_menu_mobile">
            <a href="#menu" class="menu-bar" aria-role="button"><i class="fa fa-bars"></i></a>
          </div>
          <nav id="menu">
            <a href="#" class="menu-bar" aria-role="button"><i class="fa fa-times"></i></a>
            <p class="dropdown-btn single">
              <a href="index.php">Trang chủ</a> 
            </p>
            <p class="dropdown-btn single">
              <a href="index.php?page=gioithieu">Giới thiệu</a> 
            </p>
            <!---->
            <p class="dropdown-btn">
              <a href="index.php?page=dichvu">Dịch vụ</a>
              <a class="icon"><i class="fa fa-caret-down"></i></a>
            </p>
            <div class="dropdown-container">
              <p class="dropdown-btn">
                <a href="index.php?page=dichvu">Dành cho trẻ</a>
                <a class="icon"><i class="fa fa-caret-down"></i></a>
              </p>
              <div class="dropdown-container">
                <p class="dropdown-btn single">
                  <a href="index.php?page=dichvu-view">Nhà trẻ</a>
                </p>
                <p class="dropdown-btn single">
                  <a href="index.php?page=dichvu-view">Trại hè</a>
                </p>
                <p class="dropdown-btn single">
                  <a href="index.php?page=dichvu-view">Quan tâm trẻ</a>
                </p>
                <p class="dropdown-btn single">
                  <a href="index.php?page=dichvu-view">Các lớp học</a>
                </p>
                <p class="dropdown-btn single">
                  <a href="index.php?page=dichvu-view">Các hoạt động</a>
                </p>
              </div>
              <p class="dropdown-btn">
                <a href="index.php?page=batdongsan">Dành cho phụ huynh</a>
              </p>
            </div>
            <!---->
            <p class="dropdown-btn single">
              <a href="index.php?page=doingu">Đội ngũ</a>
            </p>
  
            <!---->
            <p class="dropdown-btn">
              <a href="index.php?page=tintuc">Tin tức</a>
              <a class="icon"><i class="fa fa-caret-down"></i></a>
            </p>
            <div class="dropdown-container">
              <p class="dropdown-btn single">
                <a href="index.php?page=tintuc">Tin tức trường học</a>
              </p>
              <p class="dropdown-btn single">
                <a href="index.php?page=tintuc">Tin khuyến mãi</a>
              </p>
            </div>
  
            <!---->
            <p class="dropdown-btn">
              <a href="#" title="Thư viện">Thư viện</a>
              <a class="icon"><i class="fa fa-caret-down"></i></a>
            </p>
            <div class="dropdown-container">
              <p class="dropdown-btn single">
                <a href="index.php?page=hinhanh" title="Thư viện hình ảnh">Thư viện hình ảnh</a>
              </p>
              <p class="dropdown-btn single">
                <a href="index.php?page=video" title="Thư viện video">Thư viện video</a>
              </p>
            </div>
            <!---->
            <p class="dropdown-btn single">
              <a href="index.php?page=lienhe" title="Liên hệ đặt bàn">Liên hệ</a>
            </p>
  
  
          </nav>
        </div>
      </div>
    </div>
  </div>
  
  <script>
  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;
  
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
    dropdownContent.style.display = "none";
    } else {
    dropdownContent.style.display = "block";
    }
    });
  }
  </script>
@endsection