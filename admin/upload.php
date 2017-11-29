 <?php 

include "config.php";
if (isset($_FILES['files']) != NULL){
  $idbrg = $_POST['idbrg'];

$gambar = $_FILES['files']['name'];
$gambar_arr = implode("&&", $gambar);

$query = mysql_query("SELECT kd_brg FROM barang WHERE barang_id = $idbrg GROUP BY kd_brg");
$hasil = mysql_fetch_array($query);
$kdbrg = $hasil['kd_brg'];
$query2 = mysql_query("UPDATE barang SET gambar = '$gambar_arr' WHERE kd_brg = '$kdbrg'") or die(mysql_error());
   foreach($_FILES['files']['tmp_name'] as $key => $tmp_name) {
      move_uploaded_file($tmp_name, "../img/$gambar[$key]");
    }
header('Location: produk.php');
 }
?>