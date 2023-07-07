<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>ABC Tots - Giáo dục, trường học, mẫu giáo, mầm non, trường công, trường quốc tế, trường dân lập...</title>
  <meta name='keywords' content='ABC Tots - Giáo dục, trường học, mẫu giáo, mầm non, trường công, trường quốc tế, trường dân lập...'/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font files -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700%7CNunito:400,700,900" rel="stylesheet">
  <link href="fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
  <link href="fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">
  <!-- Fav icons -->
  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- style CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/jquery.mmenu.all.css" rel="stylesheet" type="text/css"/>
  <!-- plugins CSS -->
  <link href="css/plugins.css" rel="stylesheet">
  <!-- Colors CSS -->
  <link href="styles/maincolors.css" rel="stylesheet">
  <!-- LayerSlider CSS -->
  <link rel="stylesheet" href="vendor/layerslider/css/layerslider.css">
  <script type="text/javascript" src="js/jquery.mmenu.all.js"></script>
</head>

<body id="top">
  <?php include"header.php";?>
  <div class="conten">
    <div id="preloader">
      <div class="container h-100">
         <div class="row h-100 justify-content-center align-items-center">
            <div class="preloader-logo">
               <!-- spinner -->
               <div class="spinner">
                  <div class="dot1"></div>
                  <div class="dot2"></div>
               </div>
            </div>
            <!--/preloader logo -->
         </div>
         <!--/row -->
      </div>
      <!--/container -->
   </div>
   <?php
   if (isset($_GET["page"]))
   {
      $page=$_GET["page"];
      $page.=".php";
      if($page=="index.php")
         $page="trangchu.php";
      $page = str_replace("http","XXX",$page);
      $page = str_replace("https","XXX",$page);
      $page = str_replace("ftp","XXX",$page);
      $page = str_replace("ftps","XXX",$page);
      if (is_file($page))
         include $page;
      else include "404.php";
   }
   else 
      include "trangchu.php";
   ?>
   <div class="clr"></div>
</div>
<?php include"footer.php";?>
<!-- jequery plugins -->
<!-- Bootstrap core & Jquery -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Custom Js -->
<script src="js/custom.js"></script>
<script src="js/plugins.js"></script>
<!-- Prefix free -->
<script src="js/prefixfree.min.js"></script>
<!-- number counter script -->
<script src="js/counter.js"></script>
<!-- maps -->
<script src="js/map.js"></script>
<!-- GreenSock -->
<script src="vendor/layerslider/js/greensock.js"></script>
<!-- LayerSlider script files -->
<script src="vendor/layerslider/js/layerslider.transitions.js"></script>
<script src="vendor/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<script src="vendor/layerslider/js/layerslider.load.js"></script>
<script type="text/javascript" src="js/jquery.mmenu.all.js"></script>
</body>
</html>


