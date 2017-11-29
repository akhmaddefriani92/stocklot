<?php include "config.php";
include "function.php";
include "library.php";

$session = $_SESSION['supplier_id'];
				  $barcode = $_POST['barcode'];
				  $qtybrg = $_POST['jumBarang'];
				  $hargajualbaru = $_POST['hargaJualBaru'];
				  $hargabelibaru = $_POST['hargaBeliBaru'];
				  $expired = $_POST['tglExpire'];
				   $true =  $adaBeli = 0;
   $cek = mysql_query("SELECT * from tmp_detail_beli where supplier_id = '$session' and barcode = '$barcode'")or die (mysql_error());
   $adaBeli = mysql_num_rows($cek);
                  if ($_POST['barcode'] <> 0) {
                     if ($adaBeli != 0) {
                      echo"tai kuda";
                     } else {
                         echo "babi anjang";
                     }}

				  				 ?>