<?php
     ob_start();
     session_start();
     include 'lib/config.php';
     include 'lib/rupiah.php';

     include 'lib/show-product.php';
 ?>






<?php

    if (isset($_GET['page'])) {
        $thispage = $_GET['page'];
    }
    else{
        $thispage = 1;

    }

    if (isset($_GET['category'])) {
        $cat = $_GET['category'];
    }
    else{
        $cat = 1;

    }
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    else{
        $search = 1;

    }
?>







<!doctype html>
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

        <?php include 'header.php';?>
        
        <div class="main-container">
            <section class="page-title page-title-2 image-bg overlay">
                <div class="background-image-holder">
                    <img alt="Background Image" class="background-image" src="img/wide-1.jpg" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="uppercase mb8">
                            SHOP                       
                            </h2>
                            <p class="lead mb0">Curated, Must-Have Products</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <ol class="breadcrumb breadcrumb-2">
                                <li>
                                    <a href="home">Home</a>
                                </li>
                                <li>
                                    <a href="shop">Shop</a>
                                </li>
                                <li class="active">Shop Sidebar</li>
                            </ol>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3 pb-xs-40 pb-sm-64">
                            <div class="row">


                            <!--
                                <div class="col-md-4 col-sm-4 masonry-item col-xs-12">
                                    <div class="select-option">
                                        <i class="ti-angle-down"></i>
                                        <select>
                                            <option selected value="Default">Sort By</option>
                                            <option value="Small">Highest Price</option>
                                            <option value="Medium">Lowest Price</option>
                                            <option value="Larger">Newest Items</option>
                                        </select>
                                    </div>
                                </div>
                            -->


                                <div class="col-md-12 text-right">
                                    <span class="input-lh">Displaying 8 of 8 results</span>
                                </div>
                            </div>
                            <!--end of row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr>
                                </div>
                            </div>
                            <!--end of row-->
                            <div class="row masonry">







<?php

    $limit = 12;
    $start = ($thispage * $limit) - $limit;



    if (isset($_GET['category'])) {

          $query = mysql_query("
            SELECT
                barang.barang_id,
                barang.harga,
                barang.qty,
                barang.gambar,
                barang.nm_brg,
                merk.nama as nama_merk
            FROM
                barang
                INNER JOIN merk ON (barang.merk_id = merk.merk_id)
            WHERE
                barang.kategori_id = '$cat' GROUP BY barang.kd_brg
            LIMIT
                $start, $limit
        ");


        while($result=mysql_fetch_array($query)){
                $id = $result['barang_id'];
                $nama = $result['nm_brg'];
                $qty = $result['qty'];
                $harga = $result['harga'];
                $nama_merk = $result['nama_merk'];
                $img1 = $result['gambar'];
                $gambar = explode("&&", $img1);

                $harga = format_rupiah($harga);

                $key = "whutger917328";
                $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $id, MCRYPT_MODE_CBC, md5(md5($key))));
?>

                                    <div class="col-md-4 col-sm-4 masonry-item col-xs-12">
                                        <div class="image-tile outer-title text-center">
                                            <a href="single-product.php?show=<?php echo "$id"; ?>">
                                                <img alt="Pic" class="product-thumb" src="img/<?php echo "$gambar[0]"; ?>" />
                                        
                                            <div class="title">
                                                <h5 class="mb0"><?php echo "$nama_merk"; ?>
                                                    <br /> <?php echo "$nama"; ?></h5>
                                                <span class="display-block mb16">Rp. <?php echo "$harga"; ?></span>
                                            </div>    </a>
                                        </div>
                                    </div>
                                    <!--end three col-->

<?php 
        }
    }

    else if (isset($_GET['search'])) {
$q = $_GET['search'];
        $query = mysql_query("
            SELECT
                barang.barang_id,
                barang.harga,
                barang.qty,
                barang.gambar,
                barang.nm_brg,
                merk.nama as nama_merk
            FROM
                barang
                INNER JOIN merk ON (barang.merk_id = merk.merk_id)
            WHERE
                barang.nm_brg like '%$q%' or merk.nama like '%$q%' GROUP BY barang.kd_brg
            LIMIT
                $start, $limit
        ");


        while($result=mysql_fetch_array($query)){
                $id = $result['barang_id'];
                $nama = $result['nm_brg'];
                $qty = $result['qty'];
                $harga = $result['harga'];
                $nama_merk = $result['nama'];
                $img1 = $result['gambar'];
                $gambar = explode("&&", $img1);

                $harga = format_rupiah($harga);

                $key = "whutger917328";
                $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $id, MCRYPT_MODE_CBC, md5(md5($key))));
?>

                                    <div class="col-md-4 col-sm-4 masonry-item col-xs-12">
                                        <div class="image-tile outer-title text-center">
                                            <a href="single-product.php?show=<?php echo "$id"; ?>">
                                                <img alt="Pic" class="product-thumb" src="img/<?php echo "$gambar[0]"; ?>" />
                                            
                                            <div class="title">
                                                <h5 class="mb0"><?php echo "$nama_merk"; ?>
                                                    <br /> <?php echo "$nama"; ?></h5>
                                                <span class="display-block mb16">Rp. <?php echo "$harga"; ?></span>
                                            </div></a>
                                        </div>
                                    </div>
                                    <!--end three col-->

<?php 
        }
    }else{

        $query = mysql_query("
            SELECT
                barang.barang_id,
                barang.harga,
                barang.qty,
                barang.image1,
                barang.nm_brg,
                merk.nama as nama_merk
            FROM
                barang
                INNER JOIN merk ON (barang.merk_id = merk.merk_id)
           GROUP BY barang.kd_brg
            LIMIT
                $start, $limit
        ");


        while($result=mysql_fetch_array($query)){
                $id = $result['barang_id'];
                $nama = $result['nm_brg'];
                $qty = $result['qty'];
                $harga = $result['harga'];
                $nama_merk = $result['nama_merk'];
                $img1 = $result['image1'];

                $harga = format_rupiah($harga);

                $key = "whutger917328";
                $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $id, MCRYPT_MODE_CBC, md5(md5($key))));
?>

                                    <div class="col-md-4 col-sm-4 masonry-item col-xs-12">
                                        <div class="image-tile outer-title text-center">
                                            <a href="single-product.php?show=<?php echo "$id"; ?>">
                                                <img alt="Pic" class="product-thumb" src="img/<?php echo "$img1"; ?>" />
                                            
                                            <div class="title">
                                                <h5 class="mb0"><?php echo "$nama_merk"; ?>
                                                    <br /> <?php echo "$nama"; ?></h5>
                                                <span class="display-block mb16">Rp. <?php echo "$harga"; ?></span>
                                            </div></a>
                                        </div>
                                    </div>
                                    <!--end three col-->

<?php 
        }
    }
?>



                            </div>
                            <!--end of row-->
                            <div class="text-center mt40">
                                <ul class="pagination">





                        <?php
                            $limit = 12;
                            $start = ($thispage * $limit) - $limit;


                            if (!isset($_GET['category'])) {


                                $count = mysql_query("SELECT * FROM barang GROUP BY kd_brg");

                                $pagecount = mysql_num_rows($count);

                                $lastpage = ceil($pagecount / $limit);
                                $startpage = 1;
                                $nextpage = $thispage + 1;
                                $prevpage = $thispage - 1;
                        ?>



                        <?php   if ($thispage != $startpage) { ?>
                                        <li>
                                            <a href="?page=<?php echo $startpage ?>&category=<?php echo $cat ?>" aria-label="First">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                        <?php   }   ?>


                        <?php   if ($thispage >= 2) { ?>
                                        <li>
                                            <a href="?page=<?php echo $prevpage ?>&category=<?php echo $cat ?>" aria-label="Previous">
                                                <span aria-hidden="true">&lt;</span>
                                            </a>
                                        </li>
                        <?php   }   ?>


                                        <li class="active">
                                            <a><?php echo $thispage ?></a>
                                        </li>


                        <?php   if ($thispage != $lastpage) { ?>
                                        <li>
                                            <a href="?page=<?php echo $nextpage ?>&category=<?php echo $cat ?>" aria-label="Next">
                                                <span aria-hidden="true">&gt;</span>
                                            </a>
                                        </li>
                        <?php   }   ?>


                        <?php   if ($thispage != $lastpage) { ?>
                                        <li>
                                            <a href="?page=<?php echo $lastpage ?>&category=<?php echo $cat ?>" aria-label="Last">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                        <?php   }   
                            }

















                            else{


                                $count = mysql_query("SELECT * FROM barang WHERE kategori_id = '$cat' GROUP BY kd_brg");

                                $pagecount = mysql_num_rows($count);

                                $lastpage = ceil($pagecount / $limit);
                                $startpage = 1;
                                $nextpage = $thispage + 1;
                                $prevpage = $thispage - 1;
                        ?>



                        <?php   if ($thispage != $startpage) { ?>
                                        <li>
                                            <a href="?page=<?php echo $startpage ?>&category=<?php echo $cat ?>" aria-label="First">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                        <?php   }   ?>


                        <?php   if ($thispage >= 2) { ?>
                                        <li>
                                            <a href="?page=<?php echo $prevpage ?>&category=<?php echo $cat ?>" aria-label="Previous">
                                                <span aria-hidden="true">&lt;</span>
                                            </a>
                                        </li>
                        <?php   }   ?>


                                        <li class="active">
                                            <a><?php echo $thispage ?></a>
                                        </li>


                        <?php   if ($thispage != $lastpage) { ?>
                                        <li>
                                            <a href="?page=<?php echo $nextpage ?>&category=<?php echo $cat ?>" aria-label="Next">
                                                <span aria-hidden="true">&gt;</span>
                                            </a>
                                        </li>
                        <?php   }   ?>


                        <?php   if ($thispage != $lastpage) { ?>
                                        <li>
                                            <a href="?page=<?php echo $lastpage ?>&category=<?php echo $cat ?>" aria-label="Last">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                        <?php   }   
                            }
                        ?>







                                </ul>
                            </div>
                        </div>
                        <!--end of nine col-->
                        <div class="col-md-3 col-md-pull-9" style="margin-top: 14px;">
                            <div class="widget">
                                <h6 class="title" style="color: #47b475;">Shop Categories</h6>
                                <hr>
                                <ul class="link-list">
                                   <?php kategori(); ?>
                                </ul>
                            </div>
                            <!--end of widget-->
                            <div class="widget">
                                <h6 class="title" style="color: #47b475;">Popular Items</h6>
                                <hr>
                                <ul class="cart-overview">
                                   <?php terlarissamping(); ?>
                                </ul>
                            </div>
                            <!--end of widget-->
                            <div class="widget">
                                <h6 class="title" style="color: #47b475;">Returns Policy</h6>
                                <hr>
                                <p>
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem antium doloremque laudantium, totam rem aperiam, eaque ipsa quae.
                                </p>
                            </div>
                            <!--end of widget-->
                        </div>
                        <!--end of sidebar-->
                    </div>
                    <!--end of container row-->
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
<?php ob_end_flush(); ?>