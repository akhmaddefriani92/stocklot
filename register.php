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
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="feature bordered text-center">
                                <h4 class="uppercase">Register Here</h4>



                <?php
                            $error = false;
                ?>


                            
                                <form class="text-left" action="" method="post" id="form-reg">
                                    <input type="text" name="uname" placeholder="Username" required />
                <?php
                            if ( isset($_POST['reg']) ) {
                                $uname = trim($_POST['uname']);
                                $uname = strip_tags($uname);
                                $uname = htmlspecialchars($uname);

                                if (empty($uname)) {
                                    $error = true;
                ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Error!</strong> Username cannot be empty.
                                    </div>
                <?php
                                }
                                else if (strlen($uname) < 6) {
                                    $error = true;
                ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Error!</strong> Username must contain at least 6 characters.
                                    </div>
                <?php
                                }

                                else if (!preg_match("/^[a-zA-Z][a-zA-Z0-9-_\.]+$/",$uname)) {
                                    $error = true;
                ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Error!</strong> Username must provide at least 1 letter.
                                    </div>
                <?php
                                }
                            }
                ?>




                                    <input type="text" name="email" placeholder="Email Address" required  />
                <?php
                            if ( isset($_POST['reg']) ) {
                                $email = trim($_POST['email']);
                                $email = strip_tags($email);
                                $email = htmlspecialchars($email);

                                if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
                                    $error = true;
                ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Error!</strong> Please enter your valid email address.
                                    </div>
                <?php
                                }

                                // check email exist or not
                                else {
                                    $query = "SELECT email FROM user WHERE email='$email'";
                                    $result = mysql_query($query);
                                    $count = mysql_num_rows($result);

                                    if($count!=0){
                                        $error = true;
                ?>
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Error!</strong> This email is already used, choose another email.
                                        </div>
                <?php
                                    }
                                }
                            }
                ?>




                                    <input type="password" name="password" placeholder="Password" required />
                <?php
                            if ( isset($_POST['reg']) ) {
                                $pass = trim($_POST['password']);
                                $pass = strip_tags($pass);
                                $pass = htmlspecialchars($pass);

                                if (empty($pass)) {
                                    $error = true;
                ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Error!</strong> Password cannot be empty.
                                    </div>
                <?php
                                }

                                else if (strlen($pass) < 8) {
                                    $error = true;
                ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Error!</strong> Password must contain at least 8 characters.
                                    </div>
                <?php
                                }

                                else if (!preg_match("/(?=.*\d)(?=.*[a-zA-Z])/",$pass)) {
                                    $error = true;
                ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Error!</strong> Password must provide at least 1 letter and 1 Number.
                                    </div>
                <?php
                                }
                            }
                ?>





                                    <input type="submit" value="Register" name="reg" />
                                </form>
                                <p class="mb0">Already have an account? 
                                    <a href="login.php"><ins>sign in here</ins></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>






                <?php

                    if ( isset($_POST['reg']) && $error == false ) {
$kode    = md5(uniqid(rand()));
                        $password = hash('sha256', $pass);


                        $query = mysql_query("INSERT INTO user(username,email,password,kd_aktivasi,aktif) VALUES('$uname','$email','$password','$kode', 'T')") or die(mysql_error());
                         include "classes/class.phpmailer.php";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "gugunews.com"; //host masing2 provider email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "cipto@gugunews.com"; //user email
$mail->Password = "@ciptotampan12"; //password email 
$mail->SetFrom("cipto@gugunews.com","andreas"); //set email pengirim
$mail->Subject = "AKTIVASI REGISTER USER STOCKLOT.ID"; //subyek email
$mail->AddAddress("$email");  //tujuan email
$mail->MsgHTML("Terima kasih telah mendaftar di stocklot.id <br> Tinggal satu langkah lagi untuk mengaktifkan user anda, Silahkan klik tautan di bawah untuk mengaktifkan user anda :<br> <a href='http://localhost/stocklot/active.php?email=$email&kode=$kode&username=$uname'</a>http://localhost/active.php?email=$email&kode=$kode&username=$uname'</a> <br>
 

    StockLot.ID");
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";

                        if ($query) {
                ?>

                        <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='login.php'">
                            <h2>Berhasil</h2>
                            <p>
                               email verifikasi telah di kirim ke <?php echo $email;?> silahkan cek inbox atau spam email anda!
                            </p>
                        </div>

                <?php
                        }

                        else{
                ?>

                        <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='register.php'">
                            <h2>Gagal</h2>
                            <p>
                                Register anda gagal. Silahkan ulangi kembali.
                            </p>
                        </div>

                <?php
                        }
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