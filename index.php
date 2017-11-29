<?php include 'lib/config.php'; ?>
<?php include 'lib/show-product.php'; ?>

<?php
    ob_start();
    session_start();
?>

<!doctype html>
<html lang="en">
    <head> 
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
        <meta charset="utf-8">
        <title>Stockloot.id | Reseller sepatu anda</title>
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
            <section class="cover fullscreen image-slider slider-all-controls controls-inside parallax">
                <ul class="slides">
                    <li class="overlay image-bg bg-light">
                        <div class="background-image-holder">
                            <img alt="image" class="background-image" src="img/home23.jpg" />
                        </div>
                        <div class="container v-align-transform">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1 text-center">
                                    <h1 class="mb40 mb-xs-16 large">Sleek, Intuitive &amp; Performant,
                                        <br /> It's your design toolkit.</h1>
                                    <h6 class="uppercase mb16">A performance focussed template.</h6>
                                    <p class="lead mb40">
                                        Build beautiful, contemporary sites in just moments
                                        <br />with Foundry and Variant Page Builder.
                                    </p>
                                    <a class="btn btn-lg btn-filled" href="#">Start Exploring</a>
                                </div>
                            </div>
                            <!--end of row-->
                        </div>
                        <!--end of container-->
                    </li>
                    <li class="overlay image-bg">
                        <div class="background-image-holder">
                            <img alt="image" class="background-image" src="img/home22.jpg" />
                        </div>
                        <div class="container v-align-transform">
                            <div class="row">
                                <div class="col-sm-offset-1 text-center col-sm-10">
                                    <h1 class="mb40 mb-xs-16 large">Foundry brings your content to life in stunning clarity</h1>
                                    <h6 class="uppercase mb16">A complete block-based solution</h6>
                                    <p class="lead mb40">
                                        Build beautiful, contemporary sites in just moments
                                        <br />with Foundry and Variant Page Builder.
                                    </p>
                                    <a class="btn btn-lg btn-white" href="#">Start Exploring</a>
                                </div>
                            </div>
                            <!--end of row-->
                        </div>
                        <!--end of container-->
                    </li>
                </ul>
            </section>


        <!--
            <section class="pt40 pb0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h6 class="uppercase mb0">Free shipping on all orders over £50 for the month of October</h6>
                        </div>
                    </div>
                </div>
            </section>
            <section class="pt40 pb0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="image-tile inner-title title-center text-center">
                                <a href="#">
                                    <img alt="Pic" src="img/fashion2.jpg" />
                                    <div class="title">
                                        <h4 class="uppercase mb0">Fall Lookbook</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="image-tile inner-title title-center text-center">
                                <img alt="Pic" src="img/fashion3.jpg" />
                                <div class="title">
                                    <div class="modal-container">
                                        <div class="play-button btn-modal inline"></div>
                                        <div class="foundry_modal no-bg">
                                            <iframe data-provider="vimeo" data-video-id="63344039" data-autoplay="1" allowfullscreen="allowfullscreen"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        -->


            <section class="pt96 pb0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center mb40">
                            <h6 class="uppercase mb0">Recent Arrivals This Month</h6>
                        </div>
                    </div>
                </div>
            </section>
            <section class="pt24 pb0">
                <div class="container">
                    <div class="row">
                        
                        <?php home(); ?>
                        <!--end three col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="pt96 pb0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="image-tile inner-title title-center text-center">
                                <a href="#">
                                    <img alt="Pic" src="img/fashion4.jpg" />
                                    <div class="title">
                                        <h4 class="uppercase mb0">Sustainability</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="image-tile inner-title title-center text-center">
                                <a href="#">
                                    <img alt="Pic" src="https://images.unsplash.com/photo-1439789246184-86fd68529829?q=80&fm=jpg&s=9b5281bedc9e4ce2e40216c99715f5e5" />
                                    <div class="title">
                                        <h4 class="uppercase mb0">#foundrylife</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section class="pt96 pb0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center mb40">
                            <h6 class="uppercase mb0">Our Popular Products</h6>
                        </div>
                    </div>
                </div>
            </section>
            <section class="pt24 pb80">
                <div class="container">
                    <div class="row">
                        
                        <?php home(); ?>
                        <!--end three col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>



            <section class="pt80 pb80 pt-xs-60 pb-xs-60 bg-light" style="background: linear-gradient(160deg, #02CCBA 0%, #AA7ECD 100%); transform-origin: left bottom;">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 pt104 pb104 pt-sm-48 pb-sm-64" style="background-color: #fff; border: 1px solid #f1f1f1; box-shadow: 10px 12px 20px 0px rgba(46,61,73,0.15); border-radius: 0.375rem; transition: all 0.3s ease;">


                        <div class="row">
                            <div class="col-md-6 col-sm-10 col-md-offset-0 col-sm-offset-1 pb-sm-24 text-center pt8">
                                <h6 class="uppercase mb0">Get The News of our Lates Product</h6>
                                <hr class="col-md-5 col-md-push-3 hidden-sm hidden-xs">
                            </div>
                            <div class="col-md-6 col-sm-10 col-md-offset-0 col-sm-offset-1 col-md-pull-1">
                                <form class="form-newsletter halves" data-success="Thanks for your registration, we will be in touch shortly." data-error="Please fill all fields correctly.">
                                
                                    <input type="text" name="email" class="mb0 validate-email validate-required  signup-email-field" placeholder="Email Address" />
                                    <button type="submit" class="mb0">Subscribe</button>

                                    <iframe srcdoc="<!-- Begin MailChimp Signup Form --><link href=&quot;https://cdn-images.mailchimp.com/embedcode/classic-081711.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot;><style type=&quot;text/css&quot;> #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }   /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.     We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */</style><div id=&quot;mc_embed_signup&quot;><form action=&quot;//mrare.us8.list-manage.com/subscribe/post?u=77142ece814d3cff52058a51f&amp;id=94d040322a&quot; method=&quot;post&quot; id=&quot;mc-embedded-subscribe-form&quot; name=&quot;mc-embedded-subscribe-form&quot; class=&quot;validate&quot; target=&quot;_blank&quot; novalidate>    <div id=&quot;mc_embed_signup_scroll&quot;>   <h2>Subscribe to our mailing list</h2><div class=&quot;indicates-required&quot;><span class=&quot;asterisk&quot;>*</span> indicates required</div><div class=&quot;mc-field-group&quot;>    <label for=&quot;mce-EMAIL&quot;>Email Address  <span class=&quot;asterisk&quot;>*</span></label>   <input type=&quot;email&quot; value=&quot;&quot; name=&quot;EMAIL&quot; class=&quot;required email&quot; id=&quot;mce-EMAIL&quot;></div><div class=&quot;mc-field-group&quot;>  <label for=&quot;mce-FNAME&quot;>First Name </label>    <input type=&quot;text&quot; value=&quot;&quot; name=&quot;FNAME&quot; class=&quot;&quot; id=&quot;mce-FNAME&quot;></div><div class=&quot;mc-field-group&quot;> <label for=&quot;mce-LNAME&quot;>Last Name </label> <input type=&quot;text&quot; value=&quot;&quot; name=&quot;LNAME&quot; class=&quot;&quot; id=&quot;mce-LNAME&quot;></div>   <div id=&quot;mce-responses&quot; class=&quot;clear&quot;>      <div class=&quot;response&quot; id=&quot;mce-error-response&quot; style=&quot;display:none&quot;></div>     <div class=&quot;response&quot; id=&quot;mce-success-response&quot; style=&quot;display:none&quot;></div>   </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->    <div style=&quot;position: absolute; left: -5000px;&quot;><input type=&quot;text&quot; name=&quot;b_77142ece814d3cff52058a51f_94d040322a&quot; tabindex=&quot;-1&quot; value=&quot;&quot;></div>    <div class=&quot;clear&quot;><input type=&quot;submit&quot; value=&quot;Subscribe&quot; name=&quot;subscribe&quot; id=&quot;mc-embedded-subscribe&quot; class=&quot;button&quot;></div>    </div></form></div><script type='text/javascript' src='https://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script><!--End mc_embed_signup-->" class="mail-list-form">
                                    </iframe>
                                </form>
                            </div>
                        </div>
                        <!--end of row-->
                    </div>
                </div>
                <!--end of container-->
            </section>

            <?php include 'footer.php';?>
            
        </div>

        
    <!--
        <div class="modal-strip bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <i class="ti-announcement icon icon-sm pull-left color-primary"></i>
                        <p class="mb0 pull-left">
                            <strong>Foundry 1.9.9 Update</strong> Improved page management and syncing navs in Variant - plus Twitter feeds are back!</p>
                        <a class="btn btn-sm btn-filled mb0" href="variant/builder.html">Get The DIscount</a>
                    </div>
                </div>
        </div>
    -->


        <!--end modal strip-->
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