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
        	<section>
                <div class="container">
                    <div class="row">




		<?php

			require_once 'lib/config.php';
			require_once 'lib/show-cart.php';


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

	?>

	                        <div class="foundry_modal text-center" data-time-delay="0" onclick="javascript:window.location='home.php'">
	                            <h2>Order berhasil</h2>
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
				echo "Form submission not found";
			}
		?>




					</div>
				</div>
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