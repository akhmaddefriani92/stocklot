<?php 
error_reporting(0);
session_start();
if (!ISSET($_SESSION['adminlogin'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        
        <link href="css/jquery-ui-1.10.3.css" rel="stylesheet" />
        <link href="css/style.datatables.css" rel="stylesheet" />
        <link href="css/style.default.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
        <link href="css/toggles.css" rel="stylesheet" />
        <link href="css/colorpicker.css" rel="stylesheet" />
        <link href="css/dropzone.css" rel="stylesheet" />
        <link href="css/jquery.tagsinput.css" rel="stylesheet" />
        <link href="css/morris.css" rel="stylesheet">
        <link href="css/select2.css" rel="stylesheet" />
        
        <!--    <link rel="stylesheet" type="text/css" href="css/jquery-editable.css" > -->


        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <!-- <script src="js/jquery-migrate-1.2.1.min.js"></script> -->
        <script src="js/bootstrap.min.js"></script>
        
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>
        <script src="js/dataTables.responsive.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/jquery.autogrow-textarea.js"></script>
        <script src="js/jquery.mousewheel.js"></script>
        <script src="js/jquery.tagsinput.min.js"></script>
        <script src="js/toggles.min.js"></script>
        <script src="js/bootstrap-timepicker.min.js"></script>
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/jquery.poshytip.js"></script>
            <script src="js/jquery-editable-poshytip.min.js"></script>
             <!-- JqueryUI untuk autocomplete cari barang pada cek harga --> 
            <script type="text/javascript" src="js/jquery-ui.min-ac.js"></script>

        <script src="js/select2.min.js"></script>
        <script src="js/colorpicker.js"></script>
        <script src="js/dropzone.min.js"></script>
    
        <!-- <script src="js/custom.js"></script> -->
    </head>

    <body>
        <?php 
        include "config.php";
        ?>
        
        <header>
            <div class="headerwrapper collapsed">
                <div class="header-left">
                    <a href="dashboard.php" class="logo">
                        <img src="images/logo.png" alt="" /> 
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                    
                    <div class="pull-right">
                                         
                        <div class="btn-group btn-group-list btn-group-notification">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span class="badge">!</span>
                            </button>
                            <div class="dropdown-menu pull-right">
                           <i class="fa fa-search"></i></a>
                                <h5>Notification</h5>
                                <ul class="media-list dropdown-list">
                                <?php
                        $query5 = mysql_query("SELECT * FROM barang left join size on barang.size_id = size.size_id where qty < '10' order by barang_id asc");
                        while ($ambildata = mysql_fetch_array($query5)){

                        ?>     
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="../img/<?php echo $ambildata['image1'] ;?>" alt="">
                                        <div class="media-body">
                                          <strong>Stock <?php echo $ambildata['nm_brg']; ?> ukuran <?php echo $ambildata['size']; ?> Tersisa <?php echo $ambildata['qty']; ?></strong> Silahkan Cek Data Barang Anda Sekarang                      <small class="date"><i class="fa fa-clock-o"></i> 15 minutes ago</small>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>

                                <div class="dropdown-footer text-center">
                                    <a href="" class="link">See All Notifications</a>
                                </div>
                            </div><!-- dropdown-menu -->
                        </div><!-- btn-group -->
                                
                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-star"></i> Activity Log</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                              <li class="divider"></li>
                              <li><a href="sigout.php"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                            </ul>
                        </div><!-- btn-group -->
                        
                    </div><!-- pull-right -->
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>
        
        <section>
            <div class="mainwrapper  collapsed">
                <div class="leftpanel">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="#">
                           <img class="img-circle" src="images/photos/man.png" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading" style="margin-left: 10px;">
                              <?php
                               // include "pages/user.php"; 
                                if(isset($_SESSION['adminlogin'])) {
                                    echo "<Font color=\"Black\">Hallo ".$_SESSION['adminlogin']."</font>";
                                }
                               ?>
                            </h4>
                        </div>
                    </div><!-- media -->
                    
                    <h5 class="leftpanel-title">Navigation Menu</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="activete"><a href="dashboard.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                        
                        <li class="parent"><a href=""><i class="fa fa-archive"></i><span>KATALOG</span></a>
                            <ul class="children">
                                <li><a href="produk.php">Produk</a></li>
                                <li><a href="tambahproduk.php">Tambah Produk</a></li>
                               	<li><a href="supplier.php">Supplier</a></li>
                            </ul>
                        </li>
                        <li class="parent"><a href=""><i class="fa fa-shopping-cart"></i><span>Order</span></a>
                            <ul class="children">
                                <li><a href="order.php">Order Masuk</a></li>
                                <li><a href="kirim.php">Order Dikonfirmasi</a></li>
                               	
                            </ul>
                        </li>
                        <li class="parent"><a href=""><i class="fa fa-users"></i><span>Pengguna</span></a>
                            <ul class="children">
                                <li><a href="users_admin.php">Admin/Kasir</a></li>
                                <li><a href="users.php">User</a></li>
                            </ul>
                        </li>                         
                        </li>
                        <li class="activete"><a href="konfirmasi.php"><i class="fa fa-bell"></i> <span>Notifikasi</span></a></li>
                        <li class="parent"><a href=""><i class="fa fa-file"></i><span>Kasir</span></a>
                            <ul class="children">
                                <li><a href="lap_penjualan.php">Penjualan Barang</a></li>
                                <li><a href="lap_pembelian.php">Pembelian Barang</a></li>
                                <li><a href="lapstockopname.php">Stock Opname</a></li>
                                <li><a href="jualbarangweb.php">Jual Barang</a></li>
                               
                            </ul>
                        </li>
                       <!--  <li class="parent"><a href=""><i class="fa fa-bars"></i> <span>Laporan</span></a>
                            <ul class="children">
                                <li><a href="home.php?page=LaporanPenjualanOnline">Laporan Penjualan Online</a></li>
                                <li><a href="home.php?page=LaporanPenjualanOffline">Laporan Penjualan Offline</a></li>
                            </ul>
                        </li> -->
                        
                    </ul>
                    
                </div><!-- leftpanel -->
