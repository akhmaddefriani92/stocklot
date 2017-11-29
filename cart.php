<?php
     ob_start();
     session_start();
     require_once 'lib/config.php';
     
     // if session is not set this will redirect to login page
     if( !isset($_SESSION['user']) ) {
      header("Location: home.php");
      exit;
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
            <section class="page-title page-title-4 bg-secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="uppercase mb0">Shopping Cart</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <ol class="breadcrumb breadcrumb-2">
                                <li>
                                    <a href="home.php">Home</a>
                                </li>
                                <li>
                                    <a href="shop.php">Shop</a>
                                </li>
                                <li class="active">Cart</li>
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
                        <div class="col-md-9 col-md-offset-0 col-sm-10 col-sm-offset-1">
                            <table class="table cart mb48">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php show_cart(); ?>


                                </tbody>
                            </table>
                        </div>
                        <!--end of items-->
                        <div class="col-md-3 col-md-offset-0 col-sm-10 col-sm-offset-1">

                            <hr class="mt40">
                            <div class="mt16 mb16">
                                <h5 class="uppercase">Your Order Total</h5>
                                <table class="table">


                                <?php total_cart(); ?>


                                    
                                </table>
                                <form method="post" action="pengiriman.php">
                                    <input type="hidden" name="total" value="<?php total(); ?>">
                                    <input type="submit" value="Proceed To Checkout" name="checkout" />
                                </form>
                            </div>
                        </div>
                        <!--end of totals-->
                    </div>
                    <!--end of row-->
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