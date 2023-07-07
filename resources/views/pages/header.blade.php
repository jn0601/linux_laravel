@extends('layout')
@section('header')
<nav id="main-nav" class="navbar-expand-xl fixed-top">
   <div class="row">
      <!-- Start Top Bar -->
      <div class="container-fluid top-bar" >
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <!-- Start Contact Info -->
                  <ul class="contact-details float-left">
                     <li><i class="fa fa-map-marker"></i>344 Huỳnh Tấn Phát, Tân Thuận Tây, Quận 7, HCM</li>
                     <li><i class="fa fa-envelope"></i><a href="mailto:admin@demo.web30s.vn">admin@demo.web30s.vn</a></li>
                     <li><i class="fa fa-phone"></i>1900 9477</li>
                  </ul>
                  <!-- End Contact Info -->
                  <!-- Start Social Links -->
                  <ul class="social-list float-right list-inline">
                     <li class="list-inline-item"><a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li class="list-inline-item"><a title="Twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                     <li class="list-inline-item"><a  title="Instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                     <li class="list-inline-item"><a href="#" title="Tiếng Việt"><img src="img/vn.png" alt="Tiếng Việt"></a></li>
                     <li class="list-inline-item"><a href="#" title="American"><img src="img/eng.png" alt="American"></a></li>
                  </ul>
                  <!-- /End Social Links -->
               </div>
               <!-- col-md-12 -->
            </div>
            <!-- /row -->
         </div>
         <!-- /container -->
      </div>
      <!-- End Top bar -->
      <!-- Navbar Starts -->
      <div class="navbar container-fluid">
         <div class="container ">
            <!-- logo -->
            <a class="nav-brand" href="index.php">
               <img src="img/logo.png" alt="" class="img-fluid">
            </a>
            @yield('menu_mobile')
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <!-- menu item -->
                  <li class="nav-item active">
                     <a class="nav-link" href="index.php">Trang chủ
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?page=gioithieu">Giới thiệu</a>
                  </li>
                  <!-- menu item -->
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="index.php?page=dichvu" id="services-dropdown">
                        Dịch vụ
                     </a>
                     <div class="dropdown-menu dropdown" aria-labelledby="services-dropdown">
                        <a class="dropdown-item" href="index.php?page=dichvu">Dành cho trẻ <i class="fas fa-caret-right"></i></a>
                        <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown">
                           <a class="dropdown-item" href="index.php?page=dichvu-view">Nhà trẻ</a>
                           <a class="dropdown-item" href="index.php?page=dichvu-view">Trại hè</a>
                           <a class="dropdown-item" href="index.php?page=dichvu-view">Quan tâm trẻ</a>
                           <a class="dropdown-item" href="index.php?page=dichvu-view">Các lớp học</a>
                           <a class="dropdown-item" href="index.php?page=dichvu-view">Các hoạt động</a>
                        </div>
                        <a class="dropdown-item" href="index.php?page=dichvu-view">Dành cho  phụ huynh</a>
                     </div>
                  </li>
                  <!-- menu item -->
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?page=doingu">Đội ngũ</a>
                  </li>
                  <!-- menu item -->
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="gallery-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tin tức
                     </a>
                     <div class="dropdown-menu" aria-labelledby="gallery-dropdown">
                        <a class="dropdown-item" href="index.php?page=tintuc">Tin tức trường học</a>
                        <a class="dropdown-item" href="index.php?page=tintuc">Tin khuyến mãi</a>
                     </div>
                  </li>
                  <!-- menu item -->
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="gallery-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thư viện
                     </a>
                     <div class="dropdown-menu" aria-labelledby="gallery-dropdown">
                        <a class="dropdown-item" href="index.php?page=hinhanh">Thư viện hình ảnh</a>
                        <a class="dropdown-item" href="index.php?page=video">Thư viện video</a>
                     </div>
                  </li>
                  <!-- menu item -->
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?page=lienhe">Liên hệ</a>
                  </li>
               </ul>
               <!--/ul -->
            </div>
            <!--collapse -->
         </div>
         <!-- /container -->
      </div>
      <!-- /navbar -->
   </div>
   <!--/row -->
</nav>
      <!-- /nav -->
@endsection