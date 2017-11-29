<?php
include "config.php";
// echo ini_get('display_errors');
error_reporting(0);
	
	$supplier_id = mysql_escape_string($_POST["supplier_id"]);
	$namaSupplier = mysql_escape_string($_POST["namaSupplier"]);
	$alamatSupplier = mysql_escape_string($_POST["alamatSupplier"]);
	$telpSupplier = mysql_escape_string($_POST["telpSupplier"]);	
	// $interval = mysql_escape_string($_POST["interval"]);	
	$last_update = date("Y-m-d", strtotime($_POST["last_update"]));
	

if(!empty($supplier_id)){

	$sql = "update supplier set namaSupplier='$namaSupplier', alamatSupplier='$alamatSupplier', telpSupplier='$telpSupplier',last_update='$last_update' where supplier_id=$supplier_id";
	$query =mysql_query($sql);	

}elseif($_POST["del_id"]){
		$sql = "delete from supplier where supplier_id=$_POST[del_id]";
		$query =mysql_query($sql);	
}else{
	
	// $sql = "insert into supplier (namaSupplier, alamatSupplier,   telpSupplier, interval, last_update) values('$namaSupplier', '$alamatSupplier', '$telpSupplier', $interval, '$last_update')";
	$sql = "insert into supplier (namaSupplier, alamatSupplier,   telpSupplier,  last_update) values('$namaSupplier', '$alamatSupplier', '$telpSupplier', '$last_update')";
	$query =mysql_query($sql);				
}

if($query){
	echo "<script>
			alert('berhasil anda simpan');
			window.location.href=('supplier.php');
		</script>";
}else{
	echo "<script>
			alert('gagal anda simpan');
			window.location.href=('supplier.php');
		</script>";
}

?>