<?php error_reporting(0);
session_start();
if (ISSET($_SESSION['kasirlogin']))
{
//Tidak ada event, dalam artian menghindari jump page  		
}
else
header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Chain Responsive Bootstrap3 Admin</title>

        <link href="css/style.default.css" rel="stylesheet">
        <link href="css/morris.css" rel="stylesheet">
        <link href="css/select2.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <?php include "config.php";?>
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="index.html" class="logo">
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
                        <?php
						$query5 = mysql_query("select * from barang where qty = '10' order by barang_id asc");
						while ($ambildata = mysql_fetch_array($query5)){
						?>                        
                        <div class="btn-group btn-group-list btn-group-notification">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span class="badge">!</span>
                            </button>
                            <div class="dropdown-menu pull-right">
                                <a href="home.php?page=edit&&nama=<?php echo $ambildata['nm_brg']; ?>" class="link-right"><i class="fa fa-search"></i></a>
                                <h5>Notification</h5>
                                <ul class="media-list dropdown-list">
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="images/<?php echo $ambildata['image1'] ;?>" alt="">
                                        <div class="media-body">
                                          <strong>Stock <?php echo $ambildata['nm_brg']; ?> Tersisa 10</strong> Silahkan Cek Data Barang Anda Sekarang                      <small class="date"><i class="fa fa-clock-o"></i> 15 minutes ago</small>
                                        </div>
                                    </li>
                                </ul>

                                <div class="dropdown-footer text-center">
                                    <a href="" class="link">See All Notifications</a>
                                </div>
                            </div><!-- dropdown-menu -->
                        </div><!-- btn-group -->
                                <?php } ?>
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
            <div class="mainwrapper">
                <div class="leftpanel">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="profile.html">
                            <img class="img-circle" src="images/photos/profile.png" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                              <?php include "pages/kasir_login.php"; ?>
                            </h4>
                        </div>
                    </div><!-- media -->
                    
                    <h5 class="leftpanel-title">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="home.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                        
                        <li class="parent"><a href=""><i class="fa fa-suitcase"></i><span>KATALOG</span></a>
                            <ul class="children">
                                <li><a href="home_kasir.php?page=produk">Produk</a></li>
                                <li><a href="tambahproduk.php">Tambah Produk</a></li>
                               	<li><a href="home.php_kasir?page=supplier">Supplier</a></li>
                            </ul>
                        </li>
                        <li class="parent"><a href=""><i class="fa fa-suitcase"></i><span>Order</span></a>
                            <ul class="children">
                                <li><a href="home_kasir.php?page=order">Order Masuk</a></li>
                                <li><a href="home_kasir.php?page=kirim">Order Dikonfirmasi</a></li>
                               	
                            </ul>
                        </li>
                        <li class="activete"><a href="home_kasir.php?page=customer"><i class="fa fa-suitcase"></i> <span>USER</span></a>
                         
                        </li>
                        <li class="activete"><a href="home_kasir.php?page=konfirmasi"><i class="fa fa-suitcase"></i> <span>Notifikasi</span></a></li>
                        <li class="parent"><a href=""><i class="fa fa-suitcase"></i><span>Kasir</span></a>
                            <ul class="children">
                                <li><a href="home.php?page=jualbarang">Penjualan Barang</a></li>
                                <li><a href="home.php?page=belibarang">Pembelian Barang</a></li>
                                <li><a href="home.php?page=stokopname">Stock Opname</a></li>

                               
                            </ul>
                        </li>

                        <li class="parent"><a href=""><i class="fa fa-bars"></i> <span>Laporan</span></a>
                            <ul class="children">
                                <li><a href="home.php?page=LaporanPenjualanOnline">Laporan Penjualan Online</a></li>
                                <li><a href="home.php?page=LaporanPenjualanOffline">Laporan Penjualan Offline</a></li>

                            </ul>
                        </li>
                        
                    </ul>
                    
                </div><!-- leftpanel -->
                
                <?php
				$pages_dir = 'pages';
				if(!empty($_GET['page'])){
				$pages = scandir($pages_dir, 0);
				unset($pages[0], $pages[1]);
 
				$p = $_GET['page'];
				if(in_array($p.'.php', $pages)){
				include($pages_dir.'/'.$p.'.php');
				} else {
					echo 'Halaman tidak ditemukan! :(';
						}
				} else {
					include($pages_dir.'/dashboard.php');
				}
				?>
                    
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        
        <script src="js/flot/jquery.flot.min.js"></script>
        <script src="js/flot/jquery.flot.resize.min.js"></script>
        <script src="js/flot/jquery.flot.spline.min.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/raphael-2.1.0.min.js"></script>
        <script src="js/bootstrap-wizard.min.js"></script>
        <script src="js/select2.min.js"></script>

        <script src="js/custom.js"></script>
        <script src="js/dashboard.js"></script>

    </body>
</html>
