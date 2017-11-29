<!doctype html>

<?php 
include "lib/config.php";

  ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Foundry Multi-purpose HTML Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/ytplayer.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
    </head>
    <body class="scroll-assist">

        <div class="main-container">
            <section class="fullscreen">
                <div class="container v-align-transform">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            
          <?php $email = $_GET['email'];
              $kode = $_GET['kode'];
              $username = $_GET['username'];
              $cari = mysql_query("SELECT * FROM user WHERE email = '$email' AND kd_aktivasi = '$kode' AND username = '$username'");
              if (mysql_num_rows($cari) == 0) { ?>
              <div class="feature text-center">
                                <i class="ti-check-box icon icon-lg mb24 mb-xs-0"></i>
                                
                                <h1 class="large">ERROR! ANDA BELUM MENDAFTARKAN AKUN ANDA!!</h1>
                                <p class="mb40 mb-xs-24">silahkan silahkan daftar.
                                    <a href="home.php">Back to home page</a>
                                </p> <?php
                            } else{
               $aktif = mysql_query("UPDATE user SET aktif = 'Y' WHERE email = '$email' AND kd_aktivasi = '$kode' AND username = '$username'");

                if ($aktif) {?>
                            <div class="feature text-center">
                                <i class="ti-check-box icon icon-lg mb24 mb-xs-0"></i>
                                
                                <h1 class="large">Akun anda telah di aktivasi</h1>
                                <p class="mb40 mb-xs-24">silahkan login.
                                    <a href="home.php">Back to home page</a>
                                </p>
                                <?php } else {    } } ?>
                                <ul class="list-inline social-list">
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-sm ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-sm ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-sm ti-dribbble"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-sm ti-vimeo-alt"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="embelish-icons">
                        <i class="ti-pencil-alt"></i>
                        <i class="ti-check"></i>
                        <i class="ti-envelope"></i>
                        <i class="ti-announcement"></i>
                        <i class="ti-signal"></i>
                        <i class="ti-pulse"></i>
                        <i class="ti-marker"></i>
                        <i class="ti-layout"></i>
                        <i class="ti-ruler-alt-2"></i>
                        <i class="ti-eye"></i>
                        <i class="ti-signal"></i>
                        <i class="ti-pulse"></i>
                    </div>
                </div>
                <!--end of container-->
            </section>

            <?php include 'footer.php';?>

        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/flickr.js"></script>
        <script src="js/flexslider.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/masonry.min.js"></script>
        <script src="js/twitterfetcher.min.js"></script>
        <script src="js/spectragram.min.js"></script>
        <script src="js/ytplayer.min.js"></script>
        <script src="js/countdown.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/parallax.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>