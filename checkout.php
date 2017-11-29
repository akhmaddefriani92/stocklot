<?php
     ob_start();
     session_start();
     require_once 'lib/config.php';
     require_once 'lib/rupiah.php';
     require_once 'lib/ongkir.php';
     require_once 'lib/show-product.php';
      require_once 'lib/ongkir.php';


        $digit = 3;
                $digits = rand(pow(10, $digit-1), pow(10, $digit)-1);

          

     $namadepan = $_POST['fname'];

     $namabelakang = $_POST['lname'];

     $hp = $_POST['hp'];

     $alamat = $_POST['address'];

     $berat = $_POST['berat'];

     $kec = $_POST['kec'];

     $asal = 54;

      $namaprov = $_POST['provinsi'];
  $namakot = $_POST['kabupaten'];
     $kota1 = explode("&&", $namakot);

$provinsi1 = explode("&&", $namaprov);
  $kota = $kota1[1];
                $idkot = $kota1[0];
                $prov = $provinsi1[1];
                $idprov = $provinsi1[0];

     $kodepos = $_POST['pos'];

     $kurir = $_POST['kurir'];
     $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$idkot."&weight=".$berat."&courier=".$kurir."",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: ff3835e554a38921c8ed6de4bd41482a"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
$json = json_decode($response, true);

    if ($err) {   echo "cURL Error #:" . $err;
    } else {
        $ongkir = $json['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
    
    }

     // if session is not set this will redirect to login page
     if( !isset($_SESSION['user']) ) {
        header("Location: home.php");
        exit;
     }

     else{
        $user_id = $_SESSION['user'];
     }


     function get_user($user_id){
        $user_id = $user_id;

        $query = mysql_query("SELECT * FROM user WHERE user_id = '$user_id'");
        while($result=mysql_fetch_array($query)){
            $alamat = $result['alamat'];

            if ($alamat == "") {
                $fill_status = false;
            }

            else{
                $fill_status = true;
            }
        }

        return $fill_status;
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

         <!--
            <section class="page-title page-title-4 bg-secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="uppercase mb0">Checkout</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <ol class="breadcrumb breadcrumb-2">
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="#">Shop</a>
                                </li>
                                <li class="active">Checkout</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
        -->
            <section class="pt48 pb48" style="background-color: #f8f8f8;">
                <div class="container">

                    <div class="row">
                        <div class="col-md-8">


                            <div class="row">
                                <div class="col-md-11 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12 pt32 pb16" style="background-color: #fff; border: 1px solid #f1f1f1; box-shadow: 10px 12px 20px 0px rgba(46,61,73,0.15); border-radius: 0.375rem; transition: all 0.3s ease;">
                                    <div class="text-center">
                                        <h4 class="uppercase" style="color: #47b475;">Customer Details</h4>
                                        <hr>
                                    </div>







                      

                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Nama Pengirim: <?php echo "$namadepan";?></span>
                                                <span>Nama Penerima: <?php echo $namabelakang; ?></span>
                                                <span>berat: <?php echo $berat; ?></span>
                                                <span>Handphone:  <?php echo $hp; ?></span>
                                                 <span>Alamat:  <?php echo "$alamat,$kec,$kota,$prov,$kodepos";?></span>
                                                 <span>Kurir:  <?php echo $kurir; ?></span>
                                            </div>
                                            

                                </div>


                                <div class="col-md-11 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12 mt40 pt32 pb8" style="background-color: #fff; border: 1px solid #f1f1f1; box-shadow: 10px 12px 20px 0px rgba(46,61,73,0.15); border-radius: 0.375rem; transition: all 0.3s ease;">
                                    <div class="text-center">
                                        <h4 class="uppercase" style="color: #47b475;">Cart Details</h4>
                                    </div>
                                    <table class="table cart mb12">
                                        <tbody>


                                            <?php show_checkout(); ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>







    








<?php
    require_once 'lib/show-cart.php';



        if ($namabelakang == "") { 
?>


            <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='pengiriman.php'">
                <h2>SILAHKAN ISI PENGIRIMAN TERLEBIH DAHULU</h2>
                <p></p>
            </div>


<?php
        }

        $total = total();
        $totalall = $total + $ongkir + $digits;
    
?>








                        <div class="col-md-4 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12 pt32 pb8" style="background-color: #fff; border: 1px solid #f1f1f1; box-shadow: 10px 12px 20px 0px rgba(46,61,73,0.15); border-radius: 0.375rem; transition: all 0.3s ease;">
                            <div class="text-center">
                                <h4 class="uppercase" style="color: #47b475;">Order Summary</h4>
                            </div>

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Cart Subtotal</th>
                                            <td>Rp <label  id="subtotal" name="subtotal" onchange="hitung2();"><?php total(); ?></label></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Discount</th>
                                            <td>Rp 0</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Ongkos Kirim</th>
                                            <td>Rp   <?php echo $ongkir; ?>  </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">3 Digits Unique</th>
                                            <td> <?php echo $digits?> </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Order Total</th>
                                        <td>Rp <label id="total" name="total" > <?php echo $totalall; ?></label></td>
                                    </tr>
                                </tbody>
                            </table>

                            <form method="post">
                                <a class="btn btn-lg" href="cart.php" style="width: 100%;" />Back To Cart</a>
                                <input type="hidden" name="totalall" id="totalall" value="<?php echo $totalall;?>">
                                <input type="hidden" name="fname" id="fname" value="<?php echo $namadepan;?>">
                                <input type="hidden" name="lname" id="lname" value="<?php echo $namabelakang;?>">
                                <input type="hidden" name="hp" id="hp" value="<?php echo $hp;?>">
                                <input type="hidden" name="alamat" id="alamat"" value="<?php echo $alamat;?>">
                                <input type="hidden" name="kec" id="kec" value="<?php echo $kec;?>">
                                <input type="hidden" name="provinsi" id="provinsi" value="<?php echo $prov;?>">
                                <input type="hidden" name="kota" id="kota" value="<?php echo $kota;?>">
                                <input type="hidden" name="pos" id="pos" value="<?php echo $kodepos;?>">
                                <input type="hidden" name="digit" id="digit" value="<?php echo $digits;?>">


                           
                                <input type="submit" class="" value="Submit Order" name="confirmorder">
                            </form>
                        </div>
                    </div>
                </div>
                <!--end of container-->





        <?php


            if (isset($_POST['confirmorder'])) {
 
               $totalall = $_POST['totalall'];
               $namadepan = $_POST['fname'];
               $namabelakang = $_POST['lname'];
               $hp = $_POST['hp'];
               $alamat = $_POST['alamat'];
               $kec = $_POST['kec'];
               $prov = $_POST['provinsi'];
               $kota = $_POST['kota'];
               $pos = $_POST['pos'];
               $digits = $_POST['digit'];

                $datenow = date("Y-m-d");



                // Begin generate order number
               

                $today = date("ymd");
                $rand = strtoupper(substr(uniqid(sha1($id_user)),0,2));
                $unique = $today . $rand;

                $no_order = 'ORD' . $unique . '-' . $digits;
                // End generate order number


                // Combine the total with 3 digits random number
          

    

  

                $query = "INSERT INTO `order` VALUES('','$no_order','$datenow','$totalall','$user_id','1')";
                $insert = mysql_query($query) or die(mysql_error());

                if ($insert === FALSE) {
                }


                else{
                    $query2 = mysql_query("SELECT * FROM cart WHERE user_id = '$user_id'");

                    while($result=mysql_fetch_array($query2)){
                        $cart_id = $result['cart_id'];
                        $qty = $result['qty'];
                        $sub_total = $result['sub_total'];
                        $barang_id = $result['barang_id'];


                        $query3 = mysql_query("SELECT * FROM barang WHERE barang_id = '$barang_id'");

                        while($result2=mysql_fetch_array($query3)){
                            $harga = $result2['harga'];


                            $query4 = "INSERT INTO `order_detail` VALUES('','$no_order','$cart_id','$barang_id','$harga','$qty','$sub_total')";
                            $insert2 = mysql_query($query4) or die(mysql_error());

                            if ($insert2 === FALSE) {
                            }

                            else{
                            }
                        }
                    }

                    $delete = mysql_query("DELETE FROM cart WHERE user_id = '$user_id'") or die(mysql_error());

                    $update = mysql_query("INSERT INTO alamat VALUES ('', '$no_order', '$namadepan', '$namabelakang', '$alamat','1','$kec','$kota','$prov', '$hp',$user_id)") or die(mysql_error());


                    if ($insert === TRUE) { 
                      

                        $query5 = mysql_query("SELECT * FROM `order` LEFT JOIN order_detail ON `order`.`no_order` = `order_detail`.`no_order` LEFT JOIN user ON `order`.`user_id` = `user`.`user_id` WHERE `order`.`user_id` = $user_id order BY `order`.`order_id` DESC LIMIT 1 ");
                        $email = mysql_fetch_array($query5);
                        $emailcus = $email['email'];
                        $namacus = $email['firstname'];
                        $jumlah = $email['total_order'];
                        $nopesan = $email['no_order'];
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
$mail->Subject = "Pesanan $nopesan Stocklot.id"; //subyek email
$mail->AddAddress("$emailcus","$namacus");  //tujuan email
$mail->MsgHTML("Terima kasih telah telah memesan di stocklot <br> nomor pesanan anda adalah  $nopesan, Silahkan melakukan pembayaran dengan transfer sejumlah $totalall dan melakukan notifikasi <br>

    StockLot.ID");
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";



    ?>

                            <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='home.php'">
                                <h2>Order berhasil</h2> <br>
                                <h2> silahkan cek email anda untuk melanjutkan ke tahap pembayaran</h2>
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
            }



            else{
            }
        ?>




            </section>


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
    <?php include 'footer.php';?>
</html>
<?php ob_end_flush(); ?>