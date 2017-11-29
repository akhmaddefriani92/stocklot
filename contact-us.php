
<?php
    ob_start();
    session_start();
?>

<!doctype html>
<html lang="en">
    <head>
    <!-- Smartsupp Live Chat script -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/59ab67dbc28eca75e461dccc/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
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
                            <h3 class="uppercase mb0">Contact Us</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <ol class="breadcrumb breadcrumb-2">
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="#">Pages</a>
                                </li>
                                <li class="active">Contact</li>
                            </ol>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="p0">
                <div class="map-holder pt160 pb160">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.606338515815!2d106.97614841476887!3d-6.183408795523447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698bb9baf0e9bf%3A0x1a6a3ac1144b0bb2!2sVape+Harapan+Indah+(Bekasi)+Maskoh!5e0!3m2!1sid!2s!4v1504404453025" width="1200" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-5">
                            <h4 class="uppercase">Get In Touch</h4>
                            <p>
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                            </p>
                            <hr>
                            <p>
                                438 Marine Parade
                                <br /> Elwood, Victoria
                                <br /> P.O Box 3184
                            </p>
                            <hr>
                            <p>
                                <strong>E:</strong> hello@foundry.net
                                <br />
                                <strong>P:</strong> +614 3948 2726
                                <br />
                            </p>
                        </div>
                        <div class="col-sm-6 col-md-5 col-md-offset-1">
                            <form class="form-email" data-success="Thanks for your submission, we will be in touch shortly." data-error="Please fill all fields correctly.">
                                <input type="text" class="validate-required" name="name" placeholder="Your Name" />
                                <input type="text" class="validate-required validate-email" name="email" placeholder="Email Address" />
                                <textarea class="validate-required" name="message" rows="4" placeholder="Message"></textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
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