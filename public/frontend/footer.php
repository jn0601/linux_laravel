@extends('layout')
@section('footer')

<!--/ page-wrapper -->
<svg version="1.1" id="footer-divider"  class="secondary" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
viewBox="0 0 1440 126" xml:space="preserve" preserveAspectRatio="none slice">
<path class="st0" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<!-- ==== footer ==== -->
<footer class="bg-secondary text-light">
   <div class="container">
      <!-- row -->
      <div class="row">
         <div class="col-lg-4 text-center">
            <!-- logo -->
            <img src="img/logo_light.png"  class="logo-footer img-fluid" alt=""/>
            <h2 style="display:none">Tên công ty</h2>
            <h3 style="display:none">Thông tin</h3>
            <h4 class="mt-3" style="font-size: 1.5em;font-weight: 600;">Theo dõi bản tin của chúng tôi</h4>
            <!-- Mailist Form -->				
            <div id="mc_embed_signup">
               <!-- your mailist address in the line bellow -->
               <form action="//listname.list-manage.com/subscribe/post?u=04e646927a196552aaee78a7b&amp;id=0dae358e08" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll">
                     <div class="mc-field-group">
                        <div class="input-group">
                           <input class="form-control input-lg required email" type="email" value="" name="EMAIL" placeholder="Email của bạn ở đây" id="mce-EMAIL">
                           <span class="input-group-btn">
                              <button class="btn btn-tertiary" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">Đăng ký</button>
                           </span>
                        </div>
                        <!-- Subscription results -->
                        <div id="mce-responses" class="mailchimp">
                           <div class="alert alert-danger response" id="mce-error-response"></div>
                           <div class="alert alert-success response" id="mce-success-response"></div>
                        </div>
                     </div>
                     <!-- /mc-fiel-group -->									
                  </div>
                  <!-- /mc_embed_signup_scroll -->
               </form>
               <!-- /form ends -->
            </div>
            <!-- /mc_embed_signup -->		  
         </div>
         <!--/ col-lg -->
         <div class="col-lg-4 text-center res-margin">
            <h4 style="font-size: 1.5em;font-weight: 600;">Liên hệ chúng tôi</h4>
            <ul class="list-unstyled mt-3">
               <li class="mb-1"><i class="fas fa-phone margin-icon "></i>1900 9477</li>
               <li class="mb-1"><i class="fas fa-envelope margin-icon"></i><a href="mailto:admin@demo.web30s.vn">admin@demo.web30s.vn</a></li>
               <li><i class="fas fa-map-marker margin-icon"></i>344 Huỳnh Tấn Phát, Tân Thuận Tây, Q.7, HCM</li>
            </ul>
            <!--/ul -->
            <!-- Start Social Links -->
            <ul class="social-list text-center list-inline mt-2">
               <li class="list-inline-item"><a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
               <li class="list-inline-item"><a title="Twitter" href="#"><i class="fab fa-twitter"></i></a></li>
               <li class="list-inline-item"><a  title="Instagram" href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
            <!-- /End Social Links -->
         </div>
         <!--/ col-lg -->
         <div class="col-lg-4 text-center">
            <h4 style="font-size: 1.5em;font-weight: 600;"> Giờ làm việc </h4>
            <ul class="list-unstyled mt-3">
               <li class="mb-1">Từ Thứ Hai đến Thứ Sáu</li>
               <li class="mb-1"> Mở cửa từ 9 giờ sáng - 6 giờ tối</li>
               <li class="mb-1">Ngày lễ - Đóng cửa</li>
               <li>Cuối tuần - Đã đóng cửa </li>
            </ul>
            <!--/ul -->
         </div>
         <!--/ col-lg -->
      </div>
      <!--/ row-->
      <hr/>
      <div class="row">
         <div class="credits col-sm-12">
            <p>
              <a href="https://web30s.vn/" title="Thiết kế website" target="_blank">Sản phẩm của</a>
              <a href="https://web30s.vn/" target="_blank"><img src="img/web30s.png"></a>
              <a href="https://pavietnam.vn/" title="Thiết kế website" target="_blank">Cung cấp bởi P.A Việt Nam</a>
           </p>
        </div>
     </div>
     <!--/row-->
  </div>
  <!--/ container -->
  <!-- Go To Top Link -->
  <div class="page-scroll hidden-sm hidden-xs">
   <a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
</div>
</footer>
@endsection