
<?php
    ob_start();
    session_start();
    require_once 'lib/config.php';
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
                                <li class="active">Notifikasi Pembayaran</li>
                            </ol>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="p0">
                <div class="map-holder pt160 pb160">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3149.4086040735224!2d144.976411!3d-37.87412599999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad66889faebddf1%3A0xcc68084b44a30620!2sRiva+St+Kilda!5e0!3m2!1sen!2sau!4v1427779902899"></iframe>
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
                            <form class="customer-details mb-xs-40" method="post" >
                                <input type="text"  name="order" placeholder="nomor order" />
                                <input type="text"  name="jumlah"  placeholder="jumlah transfer"></input>
                                <select  name="bank"> <option>pilih bank</option>
                               <?php  $query=mysql_query(" SELECT * FROM bank");
                             while($entry=mysql_fetch_array($query))
                                  {
                           echo "<option value='$entry[nama]'>$entry[nama]</option>";
                                  }
                               
                                    ?>
                                    
                                </select>
                        
                                <button name="notif" type="submit">Send Message</button>
                            </form>

                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <?php 
                if (isset($_POST['notif'])) {

                     if ( isset($_SESSION['user'])=="" ) {
                        echo "<script type='text/javascript'>alert('ANDA BELUM LOGIN');</script>";

                        # code...
                    } else{

                    $user = $_SESSION['user'];
                    $noorder = $_POST['order'];
                    $jumlah = $_POST['jumlah'];
                    $bank = $_POST['bank'];
                    $tgl=date('d-m-Y');
                    $query = mysql_query("SELECT * FROM `order` WHERE no_order = '$noorder'");
                    $hasil = mysql_fetch_array($query);
                    $idorder = $hasil['order_id'];
                    if (mysql_num_rows($query) != 0) { 
                      $notif =   mysql_query("INSERT INTO notifikasi VALUES('','$idorder','tgl', '$tgl','$user','$bank','','$jumlah','') ");

                      if ($notif === FALSE) {
                } else if ($notif === TRUE){

                      $query1 = mysql_query("SELECT * FROM user where user_id = $user");
                      $user = mysql_fetch_array($query1);
                      $email = $user['email'];
                      $namauser = $user['fname'];





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
$mail->Subject = "NOTIFIKASI PEMBAYARAN $noorder"; //subyek email
$mail->AddAddress("$email","$namauser");  //tujuan email
$mail->MsgHTML("NOTIFIKASI ANDA UNTUK no order $noorder SUDAH KAMI TERIMA<br>AKAN KAMI KIRIM EMAIL JIKA PEMBAYARAN SUDAH KAMI KONFIRMASI<br> 
 

    StockLot.ID");
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";

 

    ?>

                            <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='home.php'">
                                <h2>Notifikasi telah dikirimkan silahkan menunggu paling lambat 1x24 jam untuk diproses</h2>
                                <p>
                                    Terima kasih.
                                </p>
                            </div>

    <?php

                    }

                    else{
    ?>
                            <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='checkout.php'">
                                <h2>Order gagal</h2>
                                <p>
                                    Maaf, order anda gagal.
                                </p>
    <?php           
                    }  
                
            }  


                     else {  echo "<script type='text/javascript'>alert('NOMOR ORDER TIDAK ADA, SILAHKAN ULANGI');</script>";}
                 }}

           else{
            }
        ?>

<?}
}
                 ?>
                
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