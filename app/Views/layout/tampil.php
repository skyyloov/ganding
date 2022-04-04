<!DOCTYPE html>
<html lang="en">
<head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title><?= $tittle; ?></title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      
      <!-- Bootstrap CSS -->
      <script src="bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="bower_components/sweetalert2/dist/sweetalert2.min.css">

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="css/calendar.css">

      <!-- site icon -->
       <link rel="icon" href="<?= base_url('/img/gandingrbg.png'); ?>" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?= base_url('/css/bootstrap.min.css'); ?>" />
      <!-- site css -->
      <link rel="stylesheet" href="<?= base_url('/style.css'); ?>" />
      <!-- responsive css -->
      <link rel="stylesheet" href="<?= base_url('/css/responsive.css'); ?>" />
      <!-- color css -->
      <link rel="stylesheet" href="<?= base_url('/css/colors.css'); ?>" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="<?= base_url('/css/bootstrap-select.css'); ?>" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="<?= base_url('/css/perfect-scrollbar.css'); ?>" />
      <!-- custom css -->
      <link rel="stylesheet" href="<?= base_url('/css/custom.css'); ?>" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                  </div>
               <div class="sidebar_blog_3">
                  <ul class="list-unstyled components">
                  <li class="active">
                  <a href="<?= base_url('halamanutama/'); ?>"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                     </li>
                     <li><a href="<?= base_url('cust/'); ?>"><i class="fa fa-users orange_color"></i> <span>Customer</span></a></li>
                     <li>
                        <a href="<?= base_url('pocust/'); ?>"><i class="fa fa-diamond purple_color"></i> <span>PO Customer</span></a>
                     </li>
                     <li><a href="<?= base_url('mrp/'); ?>"><i class="fa fa-table purple_color2"></i> <span>MRP</span></a></li>
                     <li>
                        <a href="<?= base_url('purchasing/'); ?>" ><i class="fa fa-object-group blue2_color"></i> <span>Purchasing</span></a>
                     </li>
                     <li><a href="<?= base_url('wh/'); ?>"><i class="fas fa-warehouse"></i> <span>Warehouse RM</span></a></li>
                     <li>
                     <a href="<?= base_url('/warehousefg'); ?>" class=""><i class="fas fa-check blue2_color"></i> <span>Warehouse FG</span></a>
                     </li>
                     <li>
                     <a href="<?= base_url('production/'); ?>"><i class="fa fa-product-hunt red_color"></i> <span>Production</span></a>
                     </li>
                     <li><a href="<?= base_url('delivery/'); ?>"><i class="fas fa-shipping-fast blue2_color"></i> <span>Delivery</span></a></li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>

                        <div class="right_topbar">
                           <div class="icon_info">

                           </div>
                           <div class="icon_info">
                              <ul>
                                 <li><a href="<?= base_url('/home/logout/'); ?>"><i class="fa fa-sign-out">Out</i></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a><span class=""><i class="fa fa-user"></i>Admin</span></a>
                                   
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->

                  
                  <?= $this->renderSection('contet'); ?>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                       
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('/js/jquery.min.js'); ?>"></script>
      <script src="<?= base_url('/js/popper.min.js'); ?>"></script>
      <script src="<?= base_url('/js/bootstrap.min.js'); ?>"></script>
      <!-- wow animation -->
      <script src="<?= base_url('/js/animate.js'); ?>"></script>
      <!-- select country -->
      <script src="<?= base_url('/js/bootstrap-select.js'); ?>"></script>
      <!-- owl carousel -->
      <script src="<?= base_url('/js/owl.carousel.js'); ?>"></script> 
      <!-- chart js -->
      <script src="<?= base_url('/js/Chart.min.js'); ?>"></script>
      <script src="<?= base_url('/js/Chart.bundle.min.js'); ?>"></script>
      <script src="<?= base_url('/js/utils.js'); ?>"></script>
      <script src="<?= base_url('/js/analyser.js'); ?>"></script>
      <!-- nice scrollbar -->
      <script src="<?= base_url('/js/perfect-scrollbar.min.js'); ?>"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="<?= base_url('/js/custom.js'); ?>"></script>
      <script src="<?= base_url('/js/chart_custom_style1.js'); ?>"></script>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>

   </body>
</html>