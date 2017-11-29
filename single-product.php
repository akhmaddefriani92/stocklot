<?php include 'lib/config.php'; ?>
<?php include 'lib/show-product.php'; ?>

<?php
    ob_start();
    session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php single_product_title(); ?></title>
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

        <?php include 'header.php';?>

        <div class="main-container">

            <section>
                <div class="container">
                    <div class="product-single">


                    <?php single_product(); ?>
                    <!--end of product single-->


                </div>
                <!--end of container-->
            </section>
            <section class="pt20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="uppercase mb80 mb-xs-40">Related Product</h4>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="image-tile outer-title text-center"  style="box-shadow: 10px 12px 20px 0px rgba(46,61,73,0.15); border-radius: 0.375rem; transition: all 0.3s ease;">
                                <a href="#">
                                    <img alt="Pic" class="product-thumb" src="img/shop-product-1.jpg" />
                                </a>
                                <div class="title">
                                    <h5 class="mb0">Adrian
                                        <br /> LambsWool Cap</h5>
                                    <span class="display-block mb16">$49.95</span>
                                </div>
                            </div>
                        </div>
                        <!--end three col-->
                        <div class="col-md-3 col-sm-4">
                            <div class="image-tile outer-title text-center"  style="box-shadow: 10px 12px 20px 0px rgba(46,61,73,0.15); border-radius: 0.375rem; transition: all 0.3s ease;">
                                <a href="#">
                                    <img alt="Pic" class="product-thumb" src="img/shop-product-2.jpg" />
                                </a>
                                <div class="title">
                                    <h5 class="mb0">Stanley
                                        <br /> Leather Wallet</h5>
                                    <span class="display-block mb16">$69.95</span>
                                </div>
                            </div>
                        </div>
                        <!--end three col-->
                        <div class="col-md-3 col-sm-4">
                            <div class="image-tile outer-title text-center"  style="box-shadow: 10px 12px 20px 0px rgba(46,61,73,0.15); border-radius: 0.375rem; transition: all 0.3s ease;">
                                <a href="#">
                                    <img alt="Pic" class="product-thumb" src="img/shop-product-7.jpg" />
                                </a>
                                <div class="title">
                                    <h5 class="mb0">Vladimir
                                        <br />Stainless Flask</h5>
                                    <span class="display-block mb16">$49.95</span>
                                </div>
                            </div>
                        </div>
                        <!--end three col-->
                        <div class="col-md-3 col-sm-4">
                            <div class="image-tile outer-title text-center"  style="box-shadow: 10px 12px 20px 0px rgba(46,61,73,0.15); border-radius: 0.375rem; transition: all 0.3s ease;">
                                <a href="#">
                                    <img alt="Pic" class="product-thumb" src="img/shop-product-3.jpg" />
                                </a>
                                <div class="title">
                                    <h5 class="mb0">Luka
                                        <br />Vintage Camera</h5>
                                    <span class="display-block mb16">$259</span>
                                </div>
                            </div>
                        </div>
                        <!--end three col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>



<?php

    if (isset($_POST['option'])) {

        $link = $_GET['show'];

        // it will never let you open index(login) page if session is set
        if ( isset($_SESSION['user'])!="" ) {


            $user_id = $_SESSION['user'];
            
            $nama = $_POST['nama'];
            $kdbrg = $_POST['kdbrg'];
            $size_id = $_POST['option'];
            $warna_id = $_POST['warna_id'];

            $qty = trim($_POST['qty']);
            $qty = strip_tags($qty);
            $qty = htmlspecialchars($qty);

            $query = mysql_query("SELECT * FROM barang WHERE kd_brg='$kdbrg' AND warna_id='$warna_id' AND size_id='$size_id'");
         


            if($query === FALSE) { 
                die(mysql_error());
            }

            while($result=mysql_fetch_array($query)) {
                $barang_id = $result['barang_id'];
                $harga = $result['harga'];

                $sub_total = ($harga * $qty);
               $cart = mysql_query("SELECT * FROM cart WHERE user_id = $user_id and barang_id = $barang_id");
               $adacart = mysql_num_rows($cart);
               $isicart = mysql_fetch_array($cart);
               $hargacart = $isicart['sub_total'];
               $qtycart = $isicart['qty'];
               $totqty = ($qty + $qtycart);

            $total = ($sub_total + $hargacart);
               if ($adacart != 0) { 
                $tambah = "UPDATE cart SET sub_total = $total, qty = $totqty WHERE barang_id = $barang_id AND user_id = $user_id ";

                $update = mysql_query($tambah);

                $key = "whutger917328";
                $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $barang_id, MCRYPT_MODE_CBC, md5(md5($key))));


                if ($update === TRUE) {

?>

                        <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='home.php'">
                            <h2>Berhasil</h2>
                            <p>
                               Produk anda telah ditambahkan ke dalam keranjang belanja.
                            </p>
                        </div> 

<?php

                }

                else{
?>
                        <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='home.php'">
                            <h2>Gagal</h2>
                            <p>
                                Produk anda gagal ditambahkan ke dalam keranjang belanja.
                            </p>

<?php
        
    
         }   }else  if ($adacart == 0){
                $query2 = "INSERT INTO cart VALUES('','$barang_id','$qty','$sub_total','$user_id')";

                $insert = mysql_query($query2);

                $key = "whutger917328";
                $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $barang_id, MCRYPT_MODE_CBC, md5(md5($key))));


                if ($insert === TRUE) {

?>

                        <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='home.php'">
                            <h2>Berhasil</h2>
                            <p>
                                Produk anda telah ditambahkan ke dalam keranjang belanja.
                            </p>
                        </div>

<?php

                }

                else{
?>
                        <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='home.php'">
                            <h2>Gagal</h2>
                            <p>
                                Produk anda gagal ditambahkan ke dalam keranjang belanja.
                            </p>
<?php                }  
            }
        }}

        else{
?>
                        <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='login.php'">
                            <h2>Gagal</h2>
                            <p>
                                Harap sign in terlebih dahulu.
                            </p>
                        </div>
<?php
        }
    }

    else{
    }
?>



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
<?php ob_end_flush(); ?>