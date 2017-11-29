<?php
     ob_start();
     session_start();
     require_once 'lib/config.php';
     require_once 'lib/rupiah.php';
     require_once 'lib/ongkir.php';
     require_once 'lib/show-product.php';
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






                            <?php
                                $fill_status = get_user($user_id);

                               

                                    $query = mysql_query("SELECT * FROM user WHERE user_id = '$user_id'");

                                    while($result=mysql_fetch_array($query)){
                                        $fname = $result['firstname']; 
                                        $lname = $result['lastname']; 
                                        $hp = $result['hp']; 
                                        $gender = $result['gender']; 
                                        $alamat = $result['alamat'];
                                        $kecamatan = $result['kecamatan'];
                                        $kota = $result['kota'];  
                                        $provinsi = $result['provinsi']; 
                                        $kode_pos = $result['kode_pos']; 

                                        $tgl = $result['tanggal_lahir'];
                                        $tgl = explode('-',$tgl);

                                        $year = $tgl[0];
                                        $month = $tgl[1];
                                        $day = $tgl[2];


                                        if ($month == "01") {
                                            $month_name = "Januari";
                                        }
                                        else if ($month == "02") {
                                            $month_name = "Februari";
                                        }
                                        else if ($month == "03") {
                                            $month_name = "Maret";
                                        }
                                        else if ($month == "04") {
                                            $month_name = "April";
                                        }
                                        else if ($month == "05") {
                                            $month_name = "Mei";
                                        }
                                        else if ($month == "06") {
                                            $month_name = "Juni";
                                        }
                                        else if ($month == "07") {
                                            $month_name = "Juli";
                                        }
                                        else if ($month == "08") {
                                            $month_name = "Agustus";
                                        }
                                        else if ($month == "09") {
                                            $month_name = "September";
                                        }
                                        else if ($month == "10") {
                                            $month_name = "Oktober";
                                        }
                                        else if ($month == "11") {
                                            $month_name = "November";
                                        }
                                        else if ($month == "12") {
                                            $month_name = "Desember";
                                        }
                            ?>





                                       


                          

                        
                                        <form method="POST" action="checkout.php">
                                         <input type="hidden" id="berat" name="berat" value="<?php berat($user_id);?>">
                                       
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Nama Depan:</span>
                                                <input type="text" name="fname" pattern="[A-Za-z\s]{3,32}" required />
                                            </div>
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Nama Belakang:</span>
                                                <input type="text" name="lname" pattern="[A-Za-z\s]{3,32}" required />
                                            </div>

                                           
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Handphone:</span>
                                                <input type="text" name="hp" pattern="[0-9]{11,13}" placeholder="ex: 08xx xxxx xxxx" maxlength="13" required />
                                            </div>
                                            <div class="input-with-label col-sm-12 text-left">
                                                <span>Alamat:</span>
                                                <input type="text" name="address" pattern="[A-Za-z0-9-_\.\s]{10,100}" required />
                                            </div>
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Kecamatan:</span>
                                                <input type="text" name="kec" pattern="[A-Za-z-_\.\s]{2,50}" required />
                                            </div>
                                            <div class="input-with-label col-sm-6 text-left">
                                                <span>Kode Pos:</span>
                                                <input type="text" name="pos" pattern="[0-9]{2,6}" required />
                                            </div>
                                            <div class="col-sm-6 input-with-label text-left">
                                                <span>PROVINSI:</span>
                                                <div class="select-option">
                                                    <i class="ti-angle-down"></i>
                                                
                                                        
                                                        <?php get_city(); ?>                                        
                                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-6 input-with-label text-left">
                                                <span>KOTA:</span>
                                                <div class="select-option">
                                                    <i class="ti-angle-down"></i>
                                                   <select id="kabupaten" name="kabupaten"></select><br><br>
                                                </div>
                                            </div>
                                             <div class="col-sm-6 input-with-label text-left">
                                                <span>Jasa Kurir:</span>
                                                <div class="select-option">
                                                    <i class="ti-angle-down"></i>
                                                   <select id="kurir" name="kurir">
                                                       <option>Pilih Jasa Kurir</option>
                                                       <option value="jne">JALUR NUGRAHA EKAKURIR (JNE)</option>
                                                       <option value="tiki">TIKI</option>
                                                       <option value="pos">POS INDONESIA</option>
                                                   </select><br><br>
                                                </div>
                                            </div>
                                        <input type="submit"  value="Submit Order" name="next"> </form>

                            <?php
                                }
                            ?>

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


    $prov_id = prov_id($provinsi);
    $kota_id = city_id($kota);


    //Setting Ongkir Otomatis Memanfaat akun starter RajaOngkir.Com
    $SetPropinsi = "6"; //9 Propinsi Jawa Barat
    $AsalKiriman = "155"; //115 Kota Bekasi Jawa Barat
    $TujuanKiriman = "$kota_id"; //419 Kab Sleman Yk
    $BeratProduk = "1"; //1kg Berat Produk
    $TipeOngkir = "jne"; //Jenis Ongkir jne / tiki / pos
    $APIKeyRaja = "b29c3386486cbce212be9e03338ae102"; //API Key Raja

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://rajaongkir.com/api/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=$AsalKiriman&destination=$TujuanKiriman&weight=$BeratProduk&courier=$TipeOngkir",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $APIKeyRaja"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;

        $ongkoskirim = "0";
        $ongkir_rp = format_rupiah($ongkoskirim);
    }

    else {
        $hasil = json_decode($response, true);
    
        for($i=0; $i<count($hasil['rajaongkir']['results'][0]['costs']); $i++){
    
            for($ix=0; $ix<count($hasil['rajaongkir']['results'][0]['costs'][$i]['cost']); $ix++){

                $service = $hasil['rajaongkir']['results'][0]['costs'][$i]['service'];
                $harga = ($hasil['rajaongkir']['results'][0]['costs'][$i]['cost'][$ix]['value']*$BeratProduk);


                if ($service == "REG") {
                    $ongkoskirim = $harga;

                    $ongkir_rp = format_rupiah($ongkoskirim);
                }
            }
        }
    }
?>








<?php
    require_once 'lib/show-cart.php';


    if (isset($_POST['checkout'])) {
        $total = $_POST['total'];

        if ($total == "") { 
?>


            <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='shop.php'">
                <h2>Keranjang anda kosong</h2>
                <p>Silahkan pilih produk terlebih dahulu.</p>
            </div>


<?php
        }

        $total = $total + $ongkoskirim;

        $total_rp = format_rupiah($total);
    }
?>








                        <div class="col-md-4 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12 pt32 pb8" style="background-color: #fff; border: 1px solid #f1f1f1; box-shadow: 10px 12px 20px 0px rgba(46,61,73,0.15); border-radius: 0.375rem; transition: all 0.3s ease;">
                            <div class="text-center">
                                <h4 class="uppercase" style="color: #47b475;">Order Summary</h4>
                            </div>

                            <table class="table">
                                <tbody>
                                    <?php show_checkout(); ?>
                                </tbody>
                            </table>

                           
                                <a class="btn btn-lg" href="cart.php" style="width: 100%;" />Back To Cart</a>
                              

                                 <input type="hidden" form="form-check" id="berat" name="berat" value="<?php berat($user_id); ?>">
                                 <input type="hidden" form="form-check" id="asal" name="asal" value="54">
                                 <input type="text" form="form-check" id="ongkir" name="ongkir">
                                <input type="hidden" form="form-check" name="total" value="">
                                <input type="submit" form="form-check" class="" value="Submit Order" name="next">
                    
                        </div>
                    </div>
                </div>        </form>
                <!--end of container-->




        <?php


            if (isset($_POST['confirmorder'])) {

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];

                $day = $_POST['day'];
                $month = $_POST['month'];
                $year = $_POST['year'];
                $birthday = $year . '-' . $month . '-' . $day;

                $gender = $_POST['gender'];
                $hp = $_POST['hp'];
                $address = $_POST['address'];
                $kec = $_POST['kec'];
                $pos = $_POST['pos'];
                $kota = $_POST['kota'];
                $prov = $_POST['prov'];


                $ongkir = $_POST['ongkir'];
                $total = $_POST['total'];
                $user_id = $_SESSION['user'];

                $datenow = date("Y-m-d");



                // Begin generate order number
                $digit = 3;
                $digits = rand(pow(10, $digit-1), pow(10, $digit)-1);

                $today = date("ymd");
                $rand = strtoupper(substr(uniqid(sha1($id_user)),0,2));
                $unique = $today . $rand;

                $no_order = 'ORD' . $unique . '-' . $digits;
                // End generate order number


                // Combine the total with 3 digits random number
                $total_rand = $total + $digits;


                $query = "INSERT INTO `order` VALUES('','$no_order','$datenow','$total_rand','$user_id','1')";
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

                    $update = mysql_query("UPDATE user SET firstname = '$fname', lastname = '$lname', hp = '$hp', tanggal_lahir = '$birthday', gender = '$gender', alamat = '$address', kota = '$kota', provinsi = '$prov', kecamatan = '$kec', kode_pos = '$pos' WHERE user_id = '$user_id'") or die(mysql_error());


                    if ($insert === TRUE) { 
                        $user_id = $_SESSION['user'];
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
$mail->MsgHTML("Terima kasih telah telah memesan di stocklot <br> nomor pesanan anda adalah  $nopesan, Silahkan melakukan pembayaran dengan transfer sejumlah $jumlah dan melakukan notifikasi <br>

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
         <script type="text/javascript">

    $(document).ready(function(){
        $('#provinsi').change(function(){

            //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
            var value = document.getElementById("provinsi").value;
            var split = value.split("&&");
            var v1 = split[0];
            var v2 = split[1];
       

            $.ajax({
                type : 'GET',
                url : 'http://localhost/stocklot/cek_kabupaten.php',
                data :  'prov_id=' + v1,
                    success: function (data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                    $("#kabupaten").html(data);
                }
            });
        });

        $("#kurir").click(function(){
            //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
            var asal = $('#asal').val();
            var kab = $('#kabupaten').val();
            var kurir = $('#kurir').val();
            var berat = $('#berat').val();

            $.ajax({
                type : 'POST',
                url : 'http://localhost/stocklot/cek_ongkir.php',
                data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
                    success: function (data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
                    $("#ongkir").text(data);
                   
                }
            });
        });
    });
     
</script>
<script> 
function hitung2() {
var a = $(".subtotal").val();
var b = $(".ongkir").val();
c = a + b; //a kali b
$(".total").val(c);
}
</script>
    </body>
</html>
<?php ob_end_flush(); ?>