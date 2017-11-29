<?php
     ob_start();
     session_start();
     require_once 'lib/config.php';
     
     // it will never let you open index(login) page if session is set
    if ( isset($_SESSION['user'])!="" ) {
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
            <section class="cover fullscreen image-bg overlay">
                <div class="background-image-holder">
                    <img alt="image" class="background-image" src="img/home20.jpg" />
                </div>
                <div class="container v-align-transform">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
                            <div class="feature bordered text-center">
                                <h4 class="uppercase">Login Here</h4>




                <?php
                            $error = false;
                ?>

                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="text-left" method="post">
                                    <input class="mb0" type="text" name="email" placeholder="email"  value="<?php echo $email; ?>" />
                                    <input class="mb0" type="password" name="password" placeholder="password" />

                <?php
                            if( isset($_POST['login-check']) ) { 
                                $email = trim($_POST['email']);
                                $email = strip_tags($email);
                                $email = htmlspecialchars($email);

                                $pass = trim($_POST['password']);
                                $pass = strip_tags($pass);
                                $pass = htmlspecialchars($pass);

                                if (empty($email) || empty($pass)) {

                                    $error = true;
                ?>

                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Error!</strong> Email atau password kosong, silahkan diisi terlebih dahulu.
                                    </div>

                <?php
                                }                               

                                else {

                                    $password = hash('sha256', $pass); // password hashing using SHA256

                                    $query = mysql_query("SELECT * FROM user WHERE email='$email' AND password = '$password'");
                                    $row=mysql_fetch_array($query); 
                                    $aktif = $row['aktif'];
                                    $count = mysql_num_rows($query);

                                    if( $count == 0 ){
                                        $error = true;
                ?>

                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Error!</strong> Email atau Password salah.
                                        </div>

                <?php
                                    }


                                    if( $count == 1 && $aktif == Y && $error == false ) {

                                        $_SESSION['user'] = $row['user_id'];
                                        $_SESSION['username'] = $row['username'];
                                        $_SESSION['firstname'] = $row['firstname'];
                                        $_SESSION['email'] = $row['email'];

                                        $succes = true;
                                    } else { 
                                    ?> <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Error!</strong> AKUN ANDA BELUM DI AKTIFKAN, SILAHKAN CEK EMAIL ANDA.
                                        </div> <?php
                                    }
                                }
                            }
                ?>




                                    <input type="submit" name="login-check" value="Login" />
                                </form>
                                <p class="mb0">Forgot your password?
                                    <a href="#">Click Here To Reset</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>



<?php
    if ($succes == true) {

        $uname = $_SESSION['username'];
?>

        <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='home.php'">
            <h2>Selamat datang, <?php echo "$uname"; ?></h2>
            <p>Selamat berbelanja.</p>
        </div>

<?php
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