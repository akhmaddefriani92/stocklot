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
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="#">Shop</a>
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
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <a href="#" class="remove-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove from cart">
                                                <i class="ti-close"></i>
                                            </a>
                                        </th>
                                        <td>
                                            <a href="#">
                                                <img alt="Product" class="product-thumb" src="img/shop-product-1.jpg" />
                                            </a>
                                        </td>
                                        <td>
                                            <span>Adrian - Pure Labswool Cap</span>
                                        </td>
                                        <td>
                                            <span>1</span>
                                        </td>
                                        <td>
                                            <span>$49.95</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <a href="#" class="remove-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove from cart">
                                                <i class="ti-close"></i>
                                            </a>
                                        </th>
                                        <td>
                                            <a href="#">
                                                <img alt="Product" class="product-thumb" src="img/shop-product-2.jpg" />
                                            </a>
                                        </td>
                                        <td>
                                            <span>Stanley - Leather Wallet</span>
                                        </td>
                                        <td>
                                            <span>1</span>
                                        </td>
                                        <td>
                                            <span>$69.95</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <a href="#" class="remove-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove from cart">
                                                <i class="ti-close"></i>
                                            </a>
                                        </th>
                                        <td>
                                            <a href="#">
                                                <img alt="Product" class="product-thumb" src="img/shop-product-4.jpg" />
                                            </a>
                                        </td>
                                        <td>
                                            <span>Logan - Canvas Backpack</span>
                                        </td>
                                        <td>
                                            <span>1</span>
                                        </td>
                                        <td>
                                            <span>$119.95</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form class="thirds text-center mb-xs-24">
                                <h5 class="uppercase">Add a coupon code</h5>
                                <input type="text" placeholder="Coupon Code" />
                                <input class="hollow" type="submit" value="Apply" />
                            </form>
                        </div>
                        <!--end of items-->
                        <div class="col-md-3 col-md-offset-0 col-sm-10 col-sm-offset-1">
                            <div class="mb24">
                                <h5 class="uppercase">Calculate Shipping</h5>
                                <div class="select-option">
                                    <i class="ti-angle-down"></i>
                                    <select>
                                        <option selected value="Default">Select Country</option>
                                        <option value="aus">Australia</option>
                                        <option value="ind">India</option>
                                        <option value="uk">United Kingdom</option>
                                        <option value="usa">United States</option>
                                    </select>
                                </div>
                                <!--end select-->
                                <form>
                                    <input class="hollow" type="submit" value="Calculate Shipping" />
                                </form>
                            </div>
                            <div class="mb24">
                                <h5 class="uppercase">Your Order Total</h5>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Cart Subtotal</th>
                                            <td>$239.85</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Shipping</th>
                                            <td>$36.50</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Order Total</th>
                                            <td>
                                                <strong>$276.35</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form>
                                    <input type="submit" value="Proceed To Checkout" />
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